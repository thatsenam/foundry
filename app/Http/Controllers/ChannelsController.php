<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\Community;
use Illuminate\Http\Request;
use Exception;

class ChannelsController extends Controller
{

    /**
     * Display a listing of the channels.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $channels = Channel::with('community')->paginate(25);

        return view('channels.index', compact('channels'));
    }

    /**
     * Show the form for creating a new channel.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $communities = Community::pluck('name','id')->all();

        return view('channels.create', compact('communities'));
    }

    /**
     * Store a new channel in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

            
            $data = $this->getData($request);
            
            Channel::create($data);

            return redirect()->route('channels.channel.index')
                ->with('success_message', 'Channel was successfully added.');

    }

    /**
     * Display the specified channel.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $channel = Channel::with('community')->findOrFail($id);

        return view('channels.show', compact('channel'));
    }

    /**
     * Show the form for editing the specified channel.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $channel = Channel::findOrFail($id);
        $communities = Community::pluck('name','id')->all();

        return view('channels.edit', compact('channel','communities'));
    }

    /**
     * Update the specified channel in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

            
            $data = $this->getData($request);
            
            $channel = Channel::findOrFail($id);
            $channel->update($data);

            return redirect()->route('channels.channel.index')
                ->with('success_message', 'Channel was successfully updated.');

    }

    /**
     * Remove the specified channel from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $channel = Channel::findOrFail($id);
            $channel->delete();

            return redirect()->route('channels.channel.index')
                ->with('success_message', 'Channel was successfully deleted.');
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
            'description' => 'string|min:1|max:1000|nullable',
            'community_id' => 'nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
