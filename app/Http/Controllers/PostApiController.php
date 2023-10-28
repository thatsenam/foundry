<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Community;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostMedia;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function index($id, Request $request)
    {
        $category_id = $request->category_id;
        $posts = Post::with(['user'])
            ->where('community_id', $id)
            ->when($category_id != null, function ($query) use ($category_id) {
                return $query->where('category_id', $category_id);
            })
            ->latest()
            ->paginate(20);

        return $posts;
    }
    public function bookmarksPosts($id, Request $request)
    {
        $category_id = $request->category_id;
        $bookmarks = Bookmark::query()->where('user_id',auth()->user()->id)->where('type',Post::class)->pluck('bookmark_id');

        $posts = Post::with(['user'])
            ->find($bookmarks);
//            ->where('community_id', $id);

        return $posts;
    }


    public function myPosts( Request $request)
    {
        $posts = Post::with(['user'])
            ->where('user_id',auth()->id() )
            ->latest()->paginate(10);

        return $posts;
    }

    public function store(Request $request)
    {
        $data = $this->getData($request);
        $media = $request->media ?? [];
//        dd($request->all());
        $post = Post::create($data);
        foreach ($media as $file) {
            $file_ref = $this->moveFile($file);
            PostMedia::create([
                'name' => 'image',
                'file' => $file_ref,
                'post_id' => $post->id
            ]);

        }


        $post->user_id = auth()->id();
        $post->load(['user']);
        $post->save();

//        return Post::with(['user'])->find($post->id);
        return $post;

    }

    public function show($id)
    {
        $post = Post::with('user', 'community')->findOrFail($id);

        return $post;
    }


    public function update($id, Request $request)
    {


        $data = $this->getData($request);

        $post = Post::findOrFail($id);
        $post->update($data);

        return $data;

    }


    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->delete();

            return true;
        } catch (Exception $exception) {

            return false;
        }
    }


    protected function getData(Request $request)
    {
        $rules = [
            'name' => 'nullable|string|min:1|max:255',
            'body' => 'nullable|string|min:1|nullable',
            'user_id' => 'nullable',
            'community_id' => 'nullable',
            'category_id' => 'nullable',
        ];

        $data = $request->validate($rules);


        return $data;
    }

    public function comments($post_id)
    {
        return PostComment::with(['user'])->where('post_id', $post_id)->whereNull('post_comment_id')->latest()->get();
    }

    public function comment_add(Request $request)
    {
        $rules = [
            'body' => 'string|min:1|nullable',
            'post_id' => 'nullable',
            'user_id' => 'nullable',
            'post_comment_id' => 'nullable',
        ];

        $data = $request->validate($rules);
        $comment = PostComment::create($data);
        $comment->load(['user']);
        return $comment;
    }

    public function bookmark_post($post_id)
    {

        $_data = Bookmark::where('type', Post::class)->where('bookmark_id', $post_id)->where('user_id', auth()->id())->first();

        if ($_data) {
            $_data->delete();
        } else {
            $bookmark = new Bookmark();
            $bookmark->user_id = auth()->id();
            $bookmark->bookmark_id = $post_id;
            $bookmark->type = Post::class;
            $bookmark->save();
        }


    }

    public function remove_post($post_id)
    {
        Post::find($post_id)->delete();

        return $post_id;
    }

    public function bookmark_post_list()
    {

        return "bookmark_post_list";
    }


}
