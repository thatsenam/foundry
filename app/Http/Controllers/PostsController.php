<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class PostsController extends Controller
{

    /**
     * Display a listing of the posts.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::with('user','community')->paginate(25);

        return view('posts.index', compact('posts'));
    }



    /**
     * Show the form for creating a new post.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('name','id')->all();
    $communities = Community::pluck('name','id')->all();

        return view('posts.create', compact('users','communities'));
    }

    /**
     * Store a new post in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


            $data = $this->getData($request);

            Post::create($data);

            return redirect()->route('posts.post.index')
                ->with('success_message', 'Post was successfully added.');

    }

    /**
     * Display the specified post.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::with('user','community')->findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $users = User::pluck('name','id')->all();
$communities = Community::pluck('name','id')->all();

        return view('posts.edit', compact('post','users','communities'));
    }

    /**
     * Update the specified post in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {


            $data = $this->getData($request);

            $post = Post::findOrFail($id);
            $post->update($data);

            return redirect()->route('posts.post.index')
                ->with('success_message', 'Post was successfully updated.');

    }

    /**
     * Remove the specified post from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->delete();

            return redirect()->route('posts.post.index')
                ->with('success_message', 'Post was successfully deleted.');
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
                'name' => 'required|nullable|string|min:1|max:255',
            'body' => 'required|string|min:1|nullable',
            'user_id' => 'nullable',
            'community_id' => 'nullable',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
