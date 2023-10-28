<?php

use App\Models\Channel;
use App\Models\Message as Message;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunitiesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PostMediaController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\ReactsController;
use App\Http\Controllers\PostTagsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ChannelsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/inviteMail', function () {

    return new \App\Mail\InviteCommunity(auth()->user());
});



Route::get('script', function () {
    foreach (\App\Models\Community::all() as $item) {
        $item->slug = \Str::slug($item->name);
        $item->save();
    }
    dd('script executed!');
});


Route::get('/admin', function () {
    return redirect('login', 301);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['superadmin']);

Route::group(['prefix' => 'communities'], function () {
    Route::get('/', [CommunitiesController::class, 'index'])->name('communities.community.index');
    Route::get('/create', [CommunitiesController::class, 'create'])->name('communities.community.create');
    Route::get('/show/{community}', [CommunitiesController::class, 'show'])->name('communities.community.show');
    Route::get('/{community}/edit', [CommunitiesController::class, 'edit'])->name('communities.community.edit');
    Route::post('/', [CommunitiesController::class, 'store'])->name('communities.community.store');
    Route::put('community/{community}', [CommunitiesController::class, 'update'])->name('communities.community.update');
    Route::delete('/community/{community}', [CommunitiesController::class, 'destroy'])->name('communities.community.destroy');

});

Route::group([
    'prefix' => 'posts',
], function () {
    Route::get('/', [PostsController::class, 'index'])
        ->name('posts.post.index');
    Route::get('/create', [PostsController::class, 'create'])
        ->name('posts.post.create');
    Route::get('/show/{post}', [PostsController::class, 'show'])
        ->name('posts.post.show')->where('id', '[0-9]+');
    Route::get('/{post}/edit', [PostsController::class, 'edit'])
        ->name('posts.post.edit')->where('id', '[0-9]+');
    Route::post('/', [PostsController::class, 'store'])
        ->name('posts.post.store');
    Route::put('post/{post}', [PostsController::class, 'update'])
        ->name('posts.post.update')->where('id', '[0-9]+');
    Route::delete('/post/{post}', [PostsController::class, 'destroy'])
        ->name('posts.post.destroy')->where('id', '[0-9]+');

});

Route::group([
    'prefix' => 'post_media',
], function () {
    Route::get('/', [PostMediaController::class, 'index'])
        ->name('post_media.post_media.index');
    Route::get('/create', [PostMediaController::class, 'create'])
        ->name('post_media.post_media.create');
    Route::get('/show/{postMedia}', [PostMediaController::class, 'show'])
        ->name('post_media.post_media.show')->where('id', '[0-9]+');
    Route::get('/{postMedia}/edit', [PostMediaController::class, 'edit'])
        ->name('post_media.post_media.edit')->where('id', '[0-9]+');
    Route::post('/', [PostMediaController::class, 'store'])
        ->name('post_media.post_media.store');
    Route::put('post_media/{postMedia}', [PostMediaController::class, 'update'])
        ->name('post_media.post_media.update')->where('id', '[0-9]+');
    Route::delete('/post_media/{postMedia}', [PostMediaController::class, 'destroy'])
        ->name('post_media.post_media.destroy')->where('id', '[0-9]+');

});

Route::group([
    'prefix' => 'post_comments',
], function () {
    Route::get('/', [PostCommentsController::class, 'index'])
        ->name('post_comments.post_comment.index');
    Route::get('/create', [PostCommentsController::class, 'create'])
        ->name('post_comments.post_comment.create');
    Route::get('/show/{postComment}', [PostCommentsController::class, 'show'])
        ->name('post_comments.post_comment.show')->where('id', '[0-9]+');
    Route::get('/{postComment}/edit', [PostCommentsController::class, 'edit'])
        ->name('post_comments.post_comment.edit')->where('id', '[0-9]+');
    Route::post('/', [PostCommentsController::class, 'store'])
        ->name('post_comments.post_comment.store');
    Route::put('post_comment/{postComment}', [PostCommentsController::class, 'update'])
        ->name('post_comments.post_comment.update')->where('id', '[0-9]+');
    Route::delete('/post_comment/{postComment}', [PostCommentsController::class, 'destroy'])
        ->name('post_comments.post_comment.destroy')->where('id', '[0-9]+');

});

Route::group([
    'prefix' => 'reacts',
], function () {
    Route::get('/', [ReactsController::class, 'index'])
        ->name('reacts.react.index');
    Route::get('/create', [ReactsController::class, 'create'])
        ->name('reacts.react.create');
    Route::get('/show/{react}', [ReactsController::class, 'show'])
        ->name('reacts.react.show')->where('id', '[0-9]+');
    Route::get('/{react}/edit', [ReactsController::class, 'edit'])
        ->name('reacts.react.edit')->where('id', '[0-9]+');
    Route::post('/', [ReactsController::class, 'store'])
        ->name('reacts.react.store');
    Route::put('react/{react}', [ReactsController::class, 'update'])
        ->name('reacts.react.update')->where('id', '[0-9]+');
    Route::delete('/react/{react}', [ReactsController::class, 'destroy'])
        ->name('reacts.react.destroy')->where('id', '[0-9]+');

});

Route::group([
    'prefix' => 'post_tags',
], function () {
    Route::get('/', [PostTagsController::class, 'index'])
        ->name('post_tags.post_tag.index');
    Route::get('/create', [PostTagsController::class, 'create'])
        ->name('post_tags.post_tag.create');
    Route::get('/show/{postTag}', [PostTagsController::class, 'show'])
        ->name('post_tags.post_tag.show')->where('id', '[0-9]+');
    Route::get('/{postTag}/edit', [PostTagsController::class, 'edit'])
        ->name('post_tags.post_tag.edit')->where('id', '[0-9]+');
    Route::post('/', [PostTagsController::class, 'store'])
        ->name('post_tags.post_tag.store');
    Route::put('post_tag/{postTag}', [PostTagsController::class, 'update'])
        ->name('post_tags.post_tag.update')->where('id', '[0-9]+');
    Route::delete('/post_tag/{postTag}', [PostTagsController::class, 'destroy'])
        ->name('post_tags.post_tag.destroy')->where('id', '[0-9]+');

});

Route::group([
    'prefix' => 'categories',
], function () {
    Route::get('/', [CategoriesController::class, 'index'])
        ->name('categories.category.index');
    Route::get('/create', [CategoriesController::class, 'create'])
        ->name('categories.category.create');
    Route::get('/show/{category}', [CategoriesController::class, 'show'])
        ->name('categories.category.show')->where('id', '[0-9]+');
    Route::get('/{category}/edit', [CategoriesController::class, 'edit'])
        ->name('categories.category.edit')->where('id', '[0-9]+');
    Route::post('/', [CategoriesController::class, 'store'])
        ->name('categories.category.store');
    Route::put('category/{category}', [CategoriesController::class, 'update'])
        ->name('categories.category.update')->where('id', '[0-9]+');
    Route::delete('/category/{category}', [CategoriesController::class, 'index'])
        ->name('categories.category.destroy')->where('id', '[0-9]+');

});

Route::group([
    'prefix' => 'channels',
], function () {
    Route::get('/', [ChannelsController::class, 'index'])
        ->name('channels.channel.index');
    Route::get('/create', [ChannelsController::class, 'create'])
        ->name('channels.channel.create');
    Route::get('/show/{channel}', [ChannelsController::class, 'show'])
        ->name('channels.channel.show')->where('id', '[0-9]+');
    Route::get('/{channel}/edit', [ChannelsController::class, 'edit'])
        ->name('channels.channel.edit')->where('id', '[0-9]+');
    Route::post('/', [ChannelsController::class, 'store'])
        ->name('channels.channel.store');
    Route::put('channel/{channel}', [ChannelsController::class, 'update'])
        ->name('channels.channel.update')->where('id', '[0-9]+');
    Route::delete('/channel/{channel}', [ChannelsController::class, 'index'])
        ->name('channels.channel.destroy')->where('id', '[0-9]+');

});
