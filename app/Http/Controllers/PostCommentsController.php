<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class PostCommentsController extends Controller
{

    /**
     * Display a listing of the post comments.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $postComments = PostComment::with('post','user','postcomment')->paginate(25);

        return view('post_comments.index', compact('postComments'));
    }

    /**
     * Show the form for creating a new post comment.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $posts = Post::pluck('name','id')->all();
$users = User::pluck('name','id')->all();
$postComments = PostComment::pluck('id','id')->all();

        return view('post_comments.create', compact('posts','users','postComments'));
    }

    /**
     * Store a new post comment in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

            
            $data = $this->getData($request);
            
            PostComment::create($data);

            return redirect()->route('post_comments.post_comment.index')
                ->with('success_message', 'Post Comment was successfully added.');

    }

    /**
     * Display the specified post comment.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $postComment = PostComment::with('post','user','postcomment')->findOrFail($id);

        return view('post_comments.show', compact('postComment'));
    }

    /**
     * Show the form for editing the specified post comment.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $postComment = PostComment::findOrFail($id);
        $posts = Post::pluck('name','id')->all();
$users = User::pluck('name','id')->all();
$postComments = PostComment::pluck('id','id')->all();

        return view('post_comments.edit', compact('postComment','posts','users','postComments'));
    }

    /**
     * Update the specified post comment in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

            
            $data = $this->getData($request);
            
            $postComment = PostComment::findOrFail($id);
            $postComment->update($data);

            return redirect()->route('post_comments.post_comment.index')
                ->with('success_message', 'Post Comment was successfully updated.');

    }

    /**
     * Remove the specified post comment from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $postComment = PostComment::findOrFail($id);
            $postComment->delete();

            return redirect()->route('post_comments.post_comment.index')
                ->with('success_message', 'Post Comment was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'body' => 'string|min:1|nullable',
            'post_id' => 'nullable',
            'user_id' => 'nullable',
            'post_comment_id' => 'nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
