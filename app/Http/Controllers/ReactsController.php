<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\React;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class ReactsController extends Controller
{

    /**
     * Display a listing of the reacts.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $reacts = React::with('user')->paginate(25);

        return view('reacts.index', compact('reacts'));
    }

    /**
     * Show the form for creating a new react.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('name','id')->all();

        return view('reacts.create', compact('users'));
    }

    /**
     * Store a new react in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return string[]
     */
    public function store(Request $request)
    {
        $_data = React::where('type',$request->type)->where('type_id',$request->type_id)->where('user_id',auth()->id())->first();
        if ($_data !=null ){
            $this->destroy($_data->id);

            return ['message'=>"Remove React"];
        }
        else {
            $request->merge([
                'user_id' => auth()->user()->id,
            ]);
            $data = $this->getData($request);
            $react = React::create($data);

            return $react;
        }

    }

    /**
     * Display the specified react.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $react = React::with('type','user')->findOrFail($id);

        return view('reacts.show', compact('react'));
    }

    /**
     * Show the form for editing the specified react.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $react = React::findOrFail($id);
            $users = User::pluck('name','id')->all();

        return view('reacts.edit', compact('react','users'));
    }

    /**
     * Update the specified react in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {


            $data = $this->getData($request);

            $react = React::findOrFail($id);
            $react->update($data);

            return redirect()->route('reacts.react.index')
                ->with('success_message', 'React was successfully updated.');

    }

    /**
     * Remove the specified react from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $react = React::findOrFail($id);
            $react->delete();

            return redirect()->route('reacts.react.index')
                ->with('success_message', 'React was successfully deleted.');
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
             'type' => 'string|min:1|nullable',
            'type_id' => 'nullable',
            'user_id' => 'nullable',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
