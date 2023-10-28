<?php

use App\Http\Controllers\EmbedLinkController;
use App\Http\Controllers\InvitedMemberController;
use App\Http\Controllers\MemberApiController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ChannelController;
use App\Http\Controllers\API\CommunityController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PostApiController;
use App\Http\Controllers\ReactsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware([])->get('/user', function (Request $request) {
    auth()->login(\App\Models\User::query()->latest()->first());
    return auth()->user();
});

Route::get('logout', function (Request $request) {

    auth()->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return (new JsonResponse([], 204));

});


Route::get('/browse_communities', [CommunityController::class, 'browse_communities']);

Route::get('/embed_community', [EmbedLinkController::class, 'embed_community']);
Route::get('/getTopMember', [MemberApiController::class, 'getTopMember']);
Route::get('/getContacts', [MessagesController::class, 'getContacts'])->name('api.contacts.get');
Route::get('/fetchMessages', [MessagesController::class, 'fetch'])->name('api.fetch.messages');
Route::get('/loadReplies', [MessagesController::class, 'loadReplies'])->name('api.messages.seen');

Route::post('/verifyToken/{token}', [InvitedMemberController::class, 'verifyToken'])->name('api.verifyToken');
Route::post('/acceptInvitation', [InvitedMemberController::class, 'acceptInvitation'])->name('api.acceptInvitation');

Route::post('comments/{post_id}', [PostApiController::class, 'comments']);

Route::group(['prefix' => 'category'], function () {
    Route::get('/{community_id}', [CategoryController::class, 'index']);

});


Route::group(['prefix' => 'channel'], function () {

    Route::post('/', [ChannelController::class, 'store']);
    Route::post('/{channel_id}', [ChannelController::class, 'update']);
    Route::post('/delete/{channel_id}', [ChannelController::class, 'delete']);
    Route::get('/{community_id}', [ChannelController::class, 'index']);

});

Route::get('bookmarksPosts/{community_id}', [PostApiController::class, 'bookmarksPosts'])->name('posts.post.bookmarksPosts');

Route::group(['prefix' => 'posts'], function () {
    Route::get('/{community_id}', [PostApiController::class, 'index'])->name('posts.post.all_post');

    Route::get('/show/{post}', [PostApiController::class, 'show'])->name('posts.post.show')->where('id', '[0-9]+');

});
Route::get('myPosts', [PostApiController::class, 'myPosts'])->name('posts.post.myPosts');

Route::group(['middleware' => 'auth:sanctum'], function () {


    Route::get('communities', [CommunityController::class, 'index']);

    Route::post('/onboarding/update', [UserController::class, 'onboardingUpdate']);

    Route::post('communities', [CommunityController::class, 'store']);
    Route::post('communities/update/{id}', [CommunityController::class, 'update']);

    Route::post('joinCommunity/{id}', [CommunityController::class, 'joinCommunity']);
    Route::post('leaveCommunity/{id}', [CommunityController::class, 'leaveCommunity']);
    Route::post('inviteMember', [CommunityController::class, 'inviteMember']);

//    Posts

    Route::post('comment', [PostApiController::class, 'comment_add']);

    Route::group(['prefix' => 'posts'], function () {

        Route::get('/create', [PostApiController::class, 'create'])->name('posts.post.create');
        Route::get('/{post}/edit', [PostApiController::class, 'edit'])->name('posts.post.edit')->where('id', '[0-9]+');
        Route::post('/', [PostApiController::class, 'store'])->name('posts.post.store');
        Route::put('post/{post}', [PostApiController::class, 'update'])->name('posts.post.update')->where('id', '[0-9]+');
        Route::delete('/post/{post}', [PostApiController::class, 'destroy'])->name('posts.post.destroy')->where('id', '[0-9]+');

    });

    Route::post('bookmark_post/{id}', [PostApiController::class, 'bookmark_post']);
    Route::post('bookmark_post_list', [PostApiController::class, 'bookmark_post_list']);

    Route::post('remove_post/{id}', [PostApiController::class, 'remove_post']);


    Route::group(['prefix' => 'reacts'], function () {

        Route::post('/', [ReactsController::class, 'store'])->name('reacts.react.store');
        Route::delete('/react/{react}', [ReactsController::class, 'destroy'])->name('reacts.react.destroy')->where('id', '[0-9]+');

    });



    Route::group(['prefix' => 'category'], function () {

        Route::post('/', [CategoryController::class, 'store']);
        Route::post('/{category_id}', [CategoryController::class, 'update']);
        Route::post('/delete/{category_id}', [CategoryController::class, 'delete']);

    });

    Route::post('/member/{community_id}', [MemberApiController::class, 'index']);
    Route::post('/newMember/{community_id}', [MemberApiController::class, 'newMember']);
    Route::post('/remove_member', [MemberApiController::class, 'remove_member']);
    Route::post('/removeInvite', [MemberApiController::class, 'removeInvite']);

    Route::post('/following/{user_id}', [MemberApiController::class, 'following']);
    Route::post('/follow', [MemberApiController::class, 'follow']);
    Route::post('/unfollow', [MemberApiController::class, 'unfollow']);
    Route::post('/getUserInfo/{user_id}', [MemberApiController::class, 'getUserInfo']);
    Route::post('auth/updateProfile', [MemberApiController::class, 'updateProfile']);


    Route::post('/messages', [MessagesController::class, 'sendMessage'])->name('api.send.message');
    Route::post('/reply', [MessagesController::class, 'reply'])->name('api.send.message');
    Route::post('/chat/auth', 'MessagesController@pusherAuth')->name('api.pusher.auth');
    Route::get('/markAsSeen', [MessagesController::class, 'markAsSeen'])->name('api.messages.seen');

    /**
     *  Fetch info for specific id [user/group]
     */
    Route::post('/idInfo', 'MessagesController@idFetchData')->name('api.idInfo');

    /**
     * Send message route
     */
    Route::post('/sendMessage', 'MessagesController@send')->name('api.send.message');

    /**
     * Fetch messages
     */

    /**
     * Download attachments route to create a downloadable links
     */
    Route::get('/download/{fileName}', 'MessagesController@download')->name('api.' . config('chatify.attachments.download_route_name'));

    /**
     * Make messages as seen
     */
    Route::post('/makeSeen', 'MessagesController@seen')->name('api.messages.seen');

    /**
     * Get contacts
     */

    /**
     * Star in favorite list
     */
    Route::post('/star', 'MessagesController@favorite')->name('api.star');

    /**
     * get favorites list
     */
    Route::post('/favorites', 'MessagesController@getFavorites')->name('api.favorites');

    /**
     * Search in messenger
     */
    Route::get('/search', 'MessagesController@search')->name('api.search');

    /**
     * Get shared photos
     */
    Route::post('/shared', 'MessagesController@sharedPhotos')->name('api.shared');

    /**
     * Delete Conversation
     */
    Route::post('/deleteConversation', 'MessagesController@deleteConversation')->name('api.conversation.delete');

    /**
     * Delete Conversation
     */
    Route::post('/updateSettings', 'MessagesController@updateSettings')->name('api.avatar.update');

    /**
     * Set active status
     */
    Route::post('/setActiveStatus', 'MessagesController@setActiveStatus')->name('api.activeStatus.set');


});
