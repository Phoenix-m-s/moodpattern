<?php
   
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\topic_scores;
use App\Http\Resources\topic_scores as topic_scoresResource;
use Illuminate\Support\Facades\Validator;
class topic_scoresController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topic_scores = topic_scores::all();
        // dd($topic_scores);
    
        return $this->sendResponse(topic_scoresResource::collection($topic_scores), 'Score retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'user_topics_id' => 'required',
            'approach' => 'required',
            'sensor_words_id' => 'required',
            'score' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $topic_scores = topic_scores::create($input);
   
        return $this->sendResponse(new topic_scoresResource($topic_scores), 'Score created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic_scores = topic_scores::find($id);
  
        if (is_null($topic_scores)) {
            return $this->sendError('Score not found.');
        }
        // dd($topic_scores);
   
        return $this->sendResponse(new topic_scoresResource($topic_scores), 'Score retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $input = $request->all();
        $topic_scores= topic_scores::findOrFail($id);
        $validator = Validator::make($input, [
            'user_topics_id' => 'required',
            'approach' => 'required',
            'sensor_words_id' => 'required',
            'score' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $topic_scores->id =$id ;
        $topic_scores->user_topics_id = $input['user_topics_id'];
        $topic_scores->approach = $input['approach'];
        $topic_scores->sensor_words_id = $input['sensor_words_id'];
        $topic_scores->score = $input['score'];
        $topic_scores->save();

        return $this->sendResponse(new topic_scoresResource($topic_scores), 'Score updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,topic_scores $topic_scores)
    {
        $topic_scores=topic_scores::findOrFail($request->id);

        $topic_scores->delete();
   
        return $this->sendResponse([], 'Score deleted successfully.');
    }
}