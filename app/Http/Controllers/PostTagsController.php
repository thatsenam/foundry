<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostTag;
use Illuminate\Http\Request;
use Exception;

class PostTagsController extends Controller
{

    /**
     * Display a listing of the post tags.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $postTags = PostTag::with('post')->paginate(25);

        return view('post_tags.index', compact('postTags'));
    }

    /**
     * Show the form for creating a new post tag.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $posts = Post::pluck('name','id')->all();

        return view('post_tags.create', compact('posts'));
    }

    /**
     * Store a new post tag in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

            
            $data = $this->getData($request);
            
            PostTag::create($data);

            return redirect()->route('post_tags.post_tag.index')
                ->with('success_message', 'Post Tag was successfully added.');

    }

    /**
     * Display the specified post tag.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $postTag = PostTag::with('post')->findOrFail($id);

        return view('post_tags.show', compact('postTag'));
    }

    /**
     * Show the form for editing the specified post tag.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $postTag = PostTag::findOrFail($id);
        $posts = Post::pluck('name','id')->all();

        return view('post_tags.edit', compact('postTag','posts'));
    }

    /**
     * Update the specified post tag in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

            
            $data = $this->getData($request);
            
            $postTag = PostTag::findOrFail($id);
            $postTag->update($data);

            return redirect()->route('post_tags.post_tag.index')
                ->with('success_message', 'Post Tag was successfully updated.');

    }

    /**
     * Remove the specified post tag from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $postTag = PostTag::findOrFail($id);
            $postTag->delete();

            return redirect()->route('post_tags.post_tag.index')
                ->with('success_message', 'Post Tag was successfully deleted.');
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
                'name' => 'string|min:1|max:255|nullable',
            'post_id' => 'nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
