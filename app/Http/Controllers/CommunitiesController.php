<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class CommunitiesController extends Controller
{

    /**
     * Display a listing of the communities.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $communities = Community::all();

        return view('communities.index', compact('communities'));
    }

    /**
     * Show the form for creating a new community.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('name', 'id')->all();

        return view('communities.create', compact('users'));
    }

    /**
     * Store a new community in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


        $data = $this->getData($request);

        Community::create($data);

        return redirect()->route('communities.community.index')
            ->with('success_message', 'Community was successfully added.');

    }

    /**
     * Display the specified community.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $community = Community::with('user')->findOrFail($id);

        return view('communities.show', compact('community'));
    }

    /**
     * Show the form for editing the specified community.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $community = Community::findOrFail($id);
        $users = User::pluck('name', 'id')->all();

        return view('communities.edit', compact('community', 'users'));
    }

    /**
     * Update the specified community in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {


        $data = $this->getData($request);

        $community = Community::findOrFail($id);
        $community->update($data);

        return redirect()->route('communities.community.index')
            ->with('success_message', 'Community was successfully updated.');

    }

    /**
     * Remove the specified community from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $community = Community::findOrFail($id);
            $community->delete();

            return redirect()->route('communities.community.index')
                ->with('success_message', 'Community was successfully deleted.');
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
            'name' => 'required|string|min:0|max:255',
            'avatar' => [ 'nullable'],
            'description' => 'nullable',
            'user_id' => 'nullable',
            'color' => 'nullable',
            'style' => 'nullable',
        ];

        $data = $request->validate($rules);
        if ($request->has('custom_delete_avatar')) {
            $data['avatar'] = null;
        }
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $this->moveFile($request->file('avatar'));
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
