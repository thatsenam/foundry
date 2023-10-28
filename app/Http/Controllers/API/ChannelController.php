<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends ChannelsController
{
    public function index()
    {
        $request = \request();
        return Channel::query()->where('community_id', $request->community_id)->latest()->get();
    }

    public function store(Request $request)
    {

        $data = $this->getData($request);
//        dd('i am here 2');

        return Channel::create($data);
    }

    public function update($id, Request $request)
    {
        $data = $this->getData($request);

        $category = Channel::findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        $category = Channel::findOrFail($id);
        $temp = $category;
        $category->delete();

        return $temp;


    }
}
