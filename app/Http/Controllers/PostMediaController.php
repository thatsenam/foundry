<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostMedia;
use Illuminate\Http\Request;
use Exception;

class PostMediaController extends Controller
{

    /**
     * Display a listing of the post medias.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $postMediaObjects = PostMedia::with('post')->paginate(25);

        return view('post_media.index', compact('postMediaObjects'));
    }

    /**
     * Show the form for creating a new post media.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $posts = Post::pluck('name','id')->all();

        return view('post_media.create', compact('posts'));
    }

    /**
     * Store a new post media in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


            $data = $this->getData($request);

            PostMedia::create($data);

            return redirect()->route('post_media.post_media.index')
                ->with('success_message', 'Post Media was successfully added.');

    }

    /**
     * Display the specified post media.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $postMedia = PostMedia::with('post')->findOrFail($id);

        return view('post_media.show', compact('postMedia'));
    }

    /**
     * Show the form for editing the specified post media.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $postMedia = PostMedia::findOrFail($id);
        $posts = Post::pluck('name','id')->all();

        return view('post_media.edit', compact('postMedia','posts'));
    }

    /**
     * Update the specified post media in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {


            $data = $this->getData($request);

            $postMedia = PostMedia::findOrFail($id);
            $postMedia->update($data);

            return redirect()->route('post_media.post_media.index')
                ->with('success_message', 'Post Media was successfully updated.');

    }

    /**
     * Remove the specified post media from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $postMedia = PostMedia::findOrFail($id);
            $postMedia->delete();

            return redirect()->route('post_media.post_media.index')
                ->with('success_message', 'Post Media was successfully deleted.');
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
            'file' => ['file','nullable'],
            'post_id' => 'nullable',
        ];

        $data = $request->validate($rules);
        if ($request->has('custom_delete_file')) {
            $data['file'] = null;
        }
        if ($request->hasFile('file')) {
            $data['file'] = $this->moveFile($request->file('file'));
        }


        return $data;
    }

    /**
     * Moves the attached file to the server.
     *
     * @param Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
    protected function moveFile($file)
    {
        if (!$file->isValid()) {
            return '';
        }

        $path = config('laravel-code-generator.files_upload_path', 'uploads');
        $saved = $file->store('public/' . $path, config('filesystems.default'));

        return substr($saved, 7);
    }
}
