<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserTopicsResource;
use App\Models\userTopics;
use Illuminate\Http\Request;

class UserTopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return userTopics[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        //return userTopics::all();
        $userTopics =  userTopics::all();
        return (UserTopicsResource::collection($userTopics))
            ->additional(['success' => true])
            ->response()
            ->setStatusCode(200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function store(Request $request)
    {

        //

        $request->validate([
            'title' => 'required',
            'topic_type_class_id' => 'required',
            'save_step' => 'required',
            'users_id' => 'required',
        ]);


        $userTopics= userTopics::create($request->all());
        //dd($userTopics);

        return response(['data' => new UserTopicsResource($userTopics), 'message' => 'Created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userTopics  $userTopics
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $userTopics =  userTopics::findOrFail($request->id);

        return response(['data' => new UserTopicsResource($userTopics), 'message' => 'Retrieved successfully'], 200);

        return (UserTopicsResource::collection($id))
            ->additional(['success' => true])
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userTopics  $userTopics
     * @return \Illuminate\Http\Response
     */
    public function edit(userTopics $userTopics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userTopics  $userTopics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $userTopics =  userTopics::findOrFail($request->id);
        $userTopics->update($request->all());

        return response(['data' => new UserTopicsResource($userTopics), 'message' => 'Update successfully'], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userTopics  $userTopics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,userTopics $userTopics)
    {
        $userTopics =  userTopics::findOrFail($request->id);
        $userTopics->delete();

        return response(['data' =>['message' => 'Deleted']],200);
    }
}
