<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Events\MessageUpdate;
use App\Events\NewReply;
use App\Models\Community;
use App\Models\CommunityUser;
use App\Models\PostComment;
use App\Models\PostMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Message as Message;
use App\Models\FavouriteUser as Favorite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class MessagesController extends Controller
{
    protected $perPage = 100;


    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function sendMessage(Request $request)
    {

        $message = Message::create([
            'type' => $request->input('type'),
            'from_id' => $request->input('from_id'),
            'to_id' => $request->input('to_id'),
            'community_id' => $request->input('community_id'),
            'body' => $request->input('body')
        ]);


        $media = $request->media ?? [];
        $attachments = [];
        foreach ($media as $file) {
            $file_ref = $this->moveFile($file);
            $attachments[] = $file_ref;

        }
        $message->attachment = json_encode($attachments);
        $message->save();

        broadcast(new MessageSent($message))->toOthers();

        return $message;
    }

    public function reply(Request $request)
    {
        $message = Message::create([
            'type' => $request->input('type'),
            'from_id' => $request->input('from_id'),
            'message_id' => $request->input('message_id'),
            'community_id' => $request->input('community_id'),
            'body' => $request->input('body')
        ]);

        broadcast(new NewReply($message))->toOthers();
        $root_message = Message::find($message->message_id);
        broadcast(new MessageUpdate($root_message))->toOthers();
        $message->root_message = $root_message;

        return $message;
    }

    public function fetch(Request $request)
    {
        $from_id = $request->from_id;
        $to_id = $request->to_id;
        $type = $request->type;
//        dd($request->all());
        $messages = [];
        if ($type == 'user') {
            $messages = Message::query()
                ->where('type', $type)
                ->where('from_id', $from_id)
                ->where('to_id', $to_id)
                ->orWhere('from_id', $to_id)
                ->where('type', $type)
                ->where('to_id', $from_id)
                ->latest('created_at')
                ->paginate($request->perPage ?? $this->perPage);

        } elseif ($type == 'channel') {
            $messages = Message::query()
                ->where('type', $type)
                ->where('to_id', $from_id)
                ->latest('created_at')
                ->paginate($request->perPage ?? $this->perPage);
        }
        return Response::json($messages);

    }

    public function markAsSeen(Request $request)
    {
        $from_id = $request->from_id;
        $to_id = \auth()->id();
        $messages = Message::query()
            ->where('from_id', $from_id)
            ->where('to_id', $to_id)
            ->update(['seen' => 1]);
        return $messages;

    }

    public function getContacts(Request $request)
    {
        $to_id = \auth()->id();
        $community_id = $request->community_id;
        $community = Community::find($community_id);

        $user_ids = CommunityUser::query()->where('community_id', $community_id)->get()->pluck('user_id');

        $user_ids = array_filter($user_ids->toArray(), function ($user_id) use ($to_id) {
            return $user_id != $to_id;
        });


//        dd($user_ids, $to_id);

        $users = User::query()
            ->whereIn('id', $user_ids)
            ->get()
            ->map(function ($user) use ($to_id) {
                $from_id = $user->id;
                $messages = Message::query()
                    ->where('seen', false)
                    ->where('type', 'user')
                    ->where('from_id', $from_id)
                    ->where('to_id', $to_id)
                    ->latest('created_at')->get();
                $last_message = optional($messages->first())->only(['body', 'from_id', 'to_id', 'created_at']);
                $unseen_count = count($messages);
                $user->unseen_count = $unseen_count;

                if ($last_message == null) {
                    $message = Message::query()
                        ->where('type', 'user')
                        ->where('from_id', $from_id)
                        ->where('to_id', $to_id)
                        ->orWhere('from_id', $to_id)
                        ->where('to_id', $from_id)
                        ->latest('created_at')->first();
                    $last_message = $message;

                }
                $user->last_message = $last_message;

                $user->last_message_date = optional($last_message)['created_at'];
                return $user->only(['id', 'uid', 'name', 'avatar_url', 'unseen_count', 'last_message', 'last_message_date']);
            })->toArray();
        $users = collect($users);
        $users = $users->sortByDesc('last_message_date')->values();

        return $users;
//        // get all users that received/sent message from/to [Auth user]
//        $users = Message::join('users', function ($join) {
//            $join->on('ch_messages.from_id', '=', 'users.id')
//                ->orOn('ch_messages.to_id', '=', 'users.id');
//        })
//            ->where(function ($q) {
//                $q->where('ch_messages.from_id', Auth::user()->id)
//                    ->orWhere('ch_messages.to_id', Auth::user()->id);
//            })
//            ->where('users.id', '!=', Auth::user()->id)
//            ->select('users.*', DB::raw('MAX(ch_messages.created_at) max_created_at'))
//            ->orderBy('max_created_at', 'desc')
//            ->groupBy('users.id')
//            ->paginate($request->per_page ?? $this->perPage);
//
//        return response()->json([
//            'contacts' => $users->items(),
//            'total' => $users->total() ?? 0,
//            'last_page' => $users->lastPage() ?? 1,
//        ], 200);
    }

    public function loadReplies(Request $request)
    {
        $message = Message::find($request->message_id);
        return optional($message)->replies;

    }

//
//    /**
//     * Authinticate the connection for pusher
//     *
//     * @param Request $request
//     * @return void
//     */
//    public function pusherAuth(Request $request)
//    {
//        // Auth data
//        $authData = json_encode([
//            'user_id' => Auth::user()->id,
//            'user_info' => [
//                'name' => Auth::user()->name
//            ]
//        ]);
//        // check if user authorized
//        if (Auth::check()) {
//            return Chatify::pusherAuth(
//                $request['channel_name'],
//                $request['socket_id'],
//                $authData
//            );
//        }
//        // if not authorized
//        return response()->json(['message' => 'Unauthorized'], 401);
//    }
//
//    /**
//     * Fetch data by id for (user/group)
//     *
//     * @param Request $request
//     * @return \Illuminate\Http\JsonResponse
//     */
//    public function idFetchData(Request $request)
//    {
//        return auth()->user();
//        // Favorite
//        $favorite = Chatify::inFavorite($request['id']);
//
//        // User data
//        if ($request['type'] == 'user') {
//            $fetch = User::where('id', $request['id'])->first();
//            if ($fetch) {
//                $userAvatar = Chatify::getUserWithAvatar($fetch)->avatar;
//            }
//        }
//
//        // send the response
//        return Response::json([
//            'favorite' => $favorite,
//            'fetch' => $fetch ?? [],
//            'user_avatar' => $userAvatar ?? null,
//        ]);
//    }
//
//    /**
//     * This method to make a links for the attachments
//     * to be downloadable.
//     *
//     * @param string $fileName
//     * @return \Illuminate\Http\JsonResponse
//     */
//    public function download($fileName)
//    {
//        $path = config('chatify.attachments.folder') . '/' . $fileName;
//        if (Chatify::storage()->exists($path)) {
//            return response()->json([
//                'file_name' => $fileName,
//                'download_path' => Chatify::storage()->url($path)
//            ], 200);
//        } else {
//            return response()->json([
//                'message' => "Sorry, File does not exist in our server or may have been deleted!"
//            ], 404);
//        }
//    }
//
//    /**
//     * Send a message to database
//     *
//     * @param Request $request
//     * @return JSON response
//     */
//    public function send(Request $request)
//    {
//        // default variables
//        $error = (object)[
//            'status' => 0,
//            'message' => null
//        ];
//        $attachment = null;
//        $attachment_title = null;
//
//        // if there is attachment [file]
//        if ($request->hasFile('file')) {
//            // allowed extensions
//            $allowed_images = Chatify::getAllowedImages();
//            $allowed_files = Chatify::getAllowedFiles();
//            $allowed = array_merge($allowed_images, $allowed_files);
//
//            $file = $request->file('file');
//            // check file size
//            if ($file->getSize() < Chatify::getMaxUploadSize()) {
//                if (in_array(strtolower($file->getClientOriginalExtension()), $allowed)) {
//                    // get attachment name
//                    $attachment_title = $file->getClientOriginalName();
//                    // upload attachment and store the new name
//                    $attachment = Str::uuid() . "." . $file->getClientOriginalExtension();
//                    $file->storeAs(config('chatify.attachments.folder'), $attachment, config('chatify.storage_disk_name'));
//                } else {
//                    $error->status = 1;
//                    $error->message = "File extension not allowed!";
//                }
//            } else {
//                $error->status = 1;
//                $error->message = "File size you are trying to upload is too large!";
//            }
//        }
//
//        if (!$error->status) {
//            // send to database
//            $messageID = mt_rand(9, 999999999) + time();
//            Chatify::newMessage([
//                'id' => $messageID,
//                'type' => $request['type'],
//                'from_id' => Auth::user()->id,
//                'to_id' => $request['id'],
//                'body' => htmlentities(trim($request['message']), ENT_QUOTES, 'UTF-8'),
//                'attachment' => ($attachment) ? json_encode((object)[
//                    'new_name' => $attachment,
//                    'old_name' => htmlentities(trim($attachment_title), ENT_QUOTES, 'UTF-8'),
//                ]) : null,
//            ]);
//
//            // fetch message to send it with the response
//            $messageData = Chatify::fetchMessage($messageID);
//
//            // send to user using pusher
//            Chatify::push('private-chatify', 'messaging', [
//                'from_id' => Auth::user()->id,
//                'to_id' => $request['id'],
//                'message' => Chatify::messageCard($messageData, 'default')
//            ]);
//        }
//
//        // send the response
//        return Response::json([
//            'status' => '200',
//            'error' => $error,
//            'message' => $messageData ?? [],
//            'tempID' => $request['temporaryMsgId'],
//        ]);
//    }
//
//    /**
//     * fetch [user/group] messages from database
//     *
//     * @param Request $request
//     * @return JSON response
//     */

//
//    /**
//     * Make messages as seen
//     *
//     * @param Request $request
//     * @return void
//     */
//    public function seen(Request $request)
//    {
//        // make as seen
//        $seen = Chatify::makeSeen($request['id']);
//        // send the response
//        return Response::json([
//            'status' => $seen,
//        ], 200);
//    }
//
//    /**
//     * Get contacts list
//     *
//     * @param Request $request
//     * @return \Illuminate\Http\JsonResponse response
//     */


//    /**
//     * Put a user in the favorites list
//     *
//     * @param Request $request
//     * @return void
//     */
//    public function favorite(Request $request)
//    {
//        // check action [star/unstar]
//        if (Chatify::inFavorite($request['user_id'])) {
//            // UnStar
//            Chatify::makeInFavorite($request['user_id'], 0);
//            $status = 0;
//        } else {
//            // Star
//            Chatify::makeInFavorite($request['user_id'], 1);
//            $status = 1;
//        }
//
//        // send the response
//        return Response::json([
//            'status' => @$status,
//        ], 200);
//    }
//
//    /**
//     * Get favorites list
//     *
//     * @param Request $request
//     * @return void
//     */
//    public function getFavorites(Request $request)
//    {
//        $favorites = Favorite::where('user_id', Auth::user()->id)->get();
//        foreach ($favorites as $favorite) {
//            $favorite->user = User::where('id', $favorite->favorite_id)->first();
//        }
//        return Response::json([
//            'total' => count($favorites),
//            'favorites' => $favorites ?? [],
//        ], 200);
//    }
//
//    /**
//     * Search in messenger
//     *
//     * @param Request $request
//     * @return \Illuminate\Http\JsonResponse
//     */
//    public function search(Request $request)
//    {
//        $input = trim(filter_var($request['input']));
//        $records = User::where('id', '!=', Auth::user()->id)
//            ->where('name', 'LIKE', "%{$input}%")
//            ->paginate($request->per_page ?? $this->perPage);
//
//        foreach ($records->items() as $index => $record) {
//            $records[$index] += Chatify::getUserWithAvatar($record);
//        }
//
//        return Response::json([
//            'records' => $records->items(),
//            'total' => $records->total(),
//            'last_page' => $records->lastPage()
//        ], 200);
//    }
//
//    /**
//     * Get shared photos
//     *
//     * @param Request $request
//     * @return \Illuminate\Http\JsonResponse
//     */
//    public function sharedPhotos(Request $request)
//    {
//        $images = Chatify::getSharedPhotos($request['user_id']);
//
//        foreach ($images as $image) {
//            $image = asset(config('chatify.attachments.folder') . $image);
//        }
//        // send the response
//        return Response::json([
//            'shared' => $images ?? [],
//        ], 200);
//    }
//
//    /**
//     * Delete conversation
//     *
//     * @param Request $request
//     * @return void
//     */
//    public function deleteConversation(Request $request)
//    {
//        // delete
//        $delete = Chatify::deleteConversation($request['id']);
//
//        // send the response
//        return Response::json([
//            'deleted' => $delete ? 1 : 0,
//        ], 200);
//    }
//
//    public function updateSettings(Request $request)
//    {
//        $msg = null;
//        $error = $success = 0;
//
//        // dark mode
//        if ($request['dark_mode']) {
//            $request['dark_mode'] == "dark"
//                ? User::where('id', Auth::user()->id)->update(['dark_mode' => 1])  // Make Dark
//                : User::where('id', Auth::user()->id)->update(['dark_mode' => 0]); // Make Light
//        }
//
//        // If messenger color selected
//        if ($request['messengerColor']) {
//            $messenger_color = trim(filter_var($request['messengerColor']));
//            User::where('id', Auth::user()->id)
//                ->update(['messenger_color' => $messenger_color]);
//        }
//        // if there is a [file]
//        if ($request->hasFile('avatar')) {
//            // allowed extensions
//            $allowed_images = Chatify::getAllowedImages();
//
//            $file = $request->file('avatar');
//            // check file size
//            if ($file->getSize() < Chatify::getMaxUploadSize()) {
//                if (in_array(strtolower($file->getClientOriginalExtension()), $allowed_images)) {
//                    // delete the older one
//                    if (Auth::user()->avatar != config('chatify.user_avatar.default')) {
//                        $path = Chatify::getUserAvatarUrl(Auth::user()->avatar);
//                        if (Chatify::storage()->exists($path)) {
//                            Chatify::storage()->delete($path);
//                        }
//                    }
//                    // upload
//                    $avatar = Str::uuid() . "." . $file->getClientOriginalExtension();
//                    $update = User::where('id', Auth::user()->id)->update(['avatar' => $avatar]);
//                    $file->storeAs(config('chatify.user_avatar.folder'), $avatar, config('chatify.storage_disk_name'));
//                    $success = $update ? 1 : 0;
//                } else {
//                    $msg = "File extension not allowed!";
//                    $error = 1;
//                }
//            } else {
//                $msg = "File size you are trying to upload is too large!";
//                $error = 1;
//            }
//        }
//
//        // send the response
//        return Response::json([
//            'status' => $success ? 1 : 0,
//            'error' => $error ? 1 : 0,
//            'message' => $error ? $msg : 0,
//        ], 200);
//    }
//
//    /**
//     * Set user's active status
//     *
//     * @param Request $request
//     * @return void
//     */
//    public function setActiveStatus(Request $request)
//    {
//        $update = $request['status'] > 0
//            ? User::where('id', $request['user_id'])->update(['active_status' => 1])
//            : User::where('id', $request['user_id'])->update(['active_status' => 0]);
//        // send the response
//        return Response::json([
//            'status' => $update,
//        ], 200);
//    }
}
