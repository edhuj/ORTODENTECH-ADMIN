<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;
use App\Answer;
use App\Post;
use App\Location;

use App\Http\Resources\QuestionCollection;
use App\Http\Resources\User as ApiUser;
use App\Http\Resources\Answer as ApiAnswer;
use App\Http\Resources\Post as ApiPost;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      return new QuestionCollection(Question::all());
    }


    public function topics(){
      $questionsGroupedByTopic = Question::all()->groupBy('topic');
      return $questionsGroupedByTopic;
    }

    public function posts(){
      return ApiPost::collection(Post::all());
    }

    public function ranking(){
      return ApiUser::collection(User::all());
    }


    public function store(Request $request)
    {
      if( request('requestType') == 'store_user' ){
        $user = new User;
        $user->firebase_token = request('firebase_token');
        $user->name = request('name');
        $user->email = request('email');
        $user->city = request('city');
        $user->birthday = request('birthday');
        $user->save();

        return new ApiUser($user);
      }

    }

    public function checkUser(Request $request){

      if( request('requestType') == 'check_user' ){
        $user =  User::where('email', request('email'))->get();
        if($user->count() > 0){
          return new ApiUser($user->first());
        }
        else{
          return response()->json([
            'status' => 'error',
            'message' => 'User not found'
          ]);
        }
      }
    }


    public function show($id)
    {
        $user = User::find($id);
        if(is_null($user)){
          return response()->json([
            'status' => 'error',
            'message' => 'User not found'
          ]);
        }
        else{
          return new ApiUser($user);
        }

    }

    public function userAnswers($id){
      $user = User::find($id);
      if(is_null($user)){
        return response()->json([
          'status' => 'error',
          'message' => 'User not found'
        ]);
      }
      else{
        return ApiAnswer::collection($user->answers()->get());
      }
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function checkAnswer(Request $request, $id){
      $question = Question::find($id);
      $user = User::find(request('userid'));
      $message = "Message not defined";
      $answer_state = 0;
      $points_received = 0;
      $status = "ok";

      if(!is_null($question)){
        if(!is_null($user)){
          $user_answer = request('myanswer');
          if($user_answer == 0){
            $message = "Blank";
            $answer_state = 3;
            $points_received = 1;
          }
          elseif($question->answer == $user_answer){
            $message = "Correct";
            $answer_state = 1;
            $points_received = 3;
          }
          else{
            $message = "Incorrect";
            $answer_state = 2;
            $points_received = 0;
          }

          $answer = new Answer();
          $answer->user_id = $user->id;
          $answer->question_id = $question->id;
          $answer->user_answer = $user_answer;
          $answer->answer_state = $answer_state;
          $answer->points_received = $points_received;
          $answer->save();
        }
        else{
          $message = "User not found";
        }
      }
      else{
        $message = "Question not found";
      }


      return response()->json([
        'status'=>$status,
        'message'=>$message,
        'points' =>$points_received
        ]);

    }


    public function saveLocation(Request $request){
      $location = new Location();
      $location('provider') = request('provider');
      $location('accuracy') = request('accuracy');
      $location('latitude') = request('latitude');
      $location('longitude') = request('longitude');

      $location->save();
    }
}
