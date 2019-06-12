<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;
use App\Answer;
use App\Post;
use App\Location;
use App\Hexagon;
use App\SignumRaw;

use Illuminate\Support\Facades\DB;
use App\Http\Resources\QuestionCollection;
use App\Http\Resources\User as ApiUser;
use App\Http\Resources\Answer as ApiAnswer;
use App\Http\Resources\Post as ApiPost;
use App\Http\Resources\SignumRaw as ApiSignum;
use App\Http\Resources\Question as ApiQuestion;
use Carbon\Carbon;
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
      $questionsGroupedByTopic = Question::all()->groupBy(['category', 'topic']);

      return response()->json([
        'requestType' => request('requestType'),
        'data' => $questionsGroupedByTopic
      ]);
    }

    public function posts(){
      return response()->json([
        'requestType' => request('requestType'),
        'data' => ApiPost::collection(Post::all())
      ]);
    }

    public function ranking(){
      return response()->json([
        'requestType' => request('requestType'),
        'data' => ApiUser::collection(User::all())
      ]);
      #return ApiUser::collection(User::all());
    }


    public function store(Request $request)
    {
      if( request('requestType') == 'store_user'){
        $user = new User;
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
        return response()->json([
          'requestType' => request('requestType'),
          'data' => ApiAnswer::collection($user->answers()->get())
        ]);

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
      $location->manufacturer = request('manufacturer');
      $location->model = request('model');
      $location->version_release = request('version_release');
      $location->version_name = request('version_name');

      $location->provider = request('provider');
      $location->accuracy = request('accuracy');
      $location->latitude = request('latitude');
      $location->longitude = request('longitude');

      $location->cdmaDbm = request('cdmaDbm');
      $location->cdmaEcio = request('cdmaEcio');
      $location->evdoDbm = request('evdoDbm');
      $location->evdoEcio = request('evdoEcio');
      $location->evdoSnr = request('evdoSnr');
      $location->gsmBitErrorRate = request('gsmBitErrorRate');
      $location->mLteRsrp = request('mLteRsrp');
      $location->mLteRsrq = request('mLteRsrq');
      $location->mLteRssnr = request('mLteRssnr');
      $location->mLteCqi = request('mLteCqi');

      $location->signal = request('signal');
      $location->level = request('level');
      $location->networkType = request('networkType');
      $location->gpsEnabled = request('gpsEnabled');
      $location->isgsm = request('isgsm');

      $signumRaw = new SignumRaw();
      $signumRaw->manufacturer = request('manufacturer');
      $signumRaw->model = request('model');
      $signumRaw->version_release = request('version_release');
      $signumRaw->version_name = request('version_name');

      $signumRaw->provider = request('provider');
      $signumRaw->accuracy = request('accuracy');
      $signumRaw->latitude = request('latitude');
      $signumRaw->longitude = request('longitude');

      $signumRaw->cdmaDbm = request('cdmaDbm');
      $signumRaw->cdmaEcio = request('cdmaEcio');
      $signumRaw->evdoDbm = request('evdoDbm');
      $signumRaw->evdoEcio = request('evdoEcio');
      $signumRaw->evdoSnr = request('evdoSnr');
      $signumRaw->gsmBitErrorRate = request('gsmBitErrorRate');
      $signumRaw->mLteRsrp = request('mLteRsrp');
      $signumRaw->mLteRsrq = request('mLteRsrq');
      $signumRaw->mLteRssnr = request('mLteRssnr');
      $signumRaw->mLteCqi = request('mLteCqi');

      $signumRaw->signal = request('signal');
      $signumRaw->level = request('level');
      $signumRaw->networkType = request('networkType');
      $signumRaw->gpsEnabled = request('gpsEnabled');
      $signumRaw->isgsm = request('isgsm');
      $signumRaw->signum_hexagon_id = $location->getClosestHexagon()[0]->id;

      $location->save();
      $signumRaw->save();

    }

    public function getManufacturers(){
      return Location::select('manufacturer')->distinct()->get();
    }

    public function queryLocations(Request $request){

      $marcas = $request->input()['so-manufacturer-status'];
      $redes = $request->input()['so-network-status'];

      $networks = array();
      foreach($redes as $red){
        if($red == '4G'){
          array_push($networks, '13');
        }
        if($red == '3G'){
          array_push($networks, '3');
          array_push($networks, '8');
          array_push($networks, '9');
          array_push($networks, '10');
          array_push($networks, '15');
        }
        if($red == '2G'){

        }
        if($red == 'NN'){
          array_push($networks, '0');
        }
      }
      $locations = Location::select('level','latitude','longitude')->whereIn('manufacturer',$marcas)->whereIn('networkType',$networks)->get();

      return $locations;
    }

    public function queryHexagons(Request $request){

      $marcas = $request->input()['so-manufacturer-status'];
      $redes = $request->input()['so-network-status'];

      $networks = array();
      foreach($redes as $red){
        if($red == '4G'){
          array_push($networks, '13');
        }
        if($red == '3G'){
          array_push($networks, '3');
          array_push($networks, '8');
          array_push($networks, '9');
          array_push($networks, '10');
          array_push($networks, '15');
        }
        if($red == '2G'){

        }
        if($red == 'NN'){
          array_push($networks, '0');
        }
      }
      $hexagons = SignumRaw::selectRaw('AVG(level) as average, signum_hexagon_id')->whereIn('manufacturer',$marcas)->whereIn('networkType',$networks)->groupBy('signum_hexagon_id')->where('signum_hexagon_id', '<>', 0)->get();
      return ApiSignum::collection($hexagons);
    }

    public function fullInfo(){
      $locations = Location::all();
      return $locations;
    }

    public function getMatrix(){
      $locations = App\Location::all();
      dump($locations->count());
      foreach ($locations as $location) {

        $sqlQuery = "SELECT id, latitude, longitude, ( 6371 * acos( cos( radians($location->latitude) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($location->longitude) ) + sin( radians($location->latitude) ) * sin( radians( latitude ) ) ) ) AS distance FROM hexagons HAVING distance < 0.51 ORDER BY distance LIMIT 0 , 1";

        $result = DB::select(DB::raw($sqlQuery));

        $signumData = new App\SignumRaw();

        $signumData->manufacturer = $location->manufacturer;
        $signumData->model = $location->model;
        $signumData->version_release = $location->version_release;
        $signumData->version_name = $location->version_name;

        $signumData->provider = $location->provider;
        $signumData->accuracy = $location->accuracy;
        $signumData->latitude = $location->latitude;
        $signumData->longitude = $location->longitude;

        $signumData->cdmaDbm = $location->cdmaDbm;
        $signumData->cdmaEcio = $location->cdmaEcio;
        $signumData->evdoDbm = $location->evdoDbm;
        $signumData->evdoEcio = $location->evdoEcio;
        $signumData->evdoSnr = $location->evdoSnr;
        $signumData->gsmBitErrorRate = $location->gsmBitErrorRate;
        $signumData->mLteRsrp = $location->mLteRsrp;
        $signumData->mLteRsrq = $location->mLteRsrq;
        $signumData->mLteRssnr = $location->mLteRssnr;
        $signumData->mLteCqi = $location->mLteCqi;

        $signumData->signal = $location->signal;
        $signumData->level = $location->level;
        $signumData->networkType = $location->networkType;
        $signumData->gpsEnabled = $location->gpsEnabled;
        $signumData->isgsm = $location->isgsm;


        foreach ($result as $raw) {
          #dump($raw->id);
          #dump($raw->distance);
          $signumData->signum_hexagon_id = $raw->id;
        }

        $signumData->save();
      }
      dump(App\SignumRaw::all()->count());
    }

    public function queryHexagon(){
      $hexagons = SignumRaw::selectRaw('AVG(level) as average, signum_hexagon_id')->groupBy('signum_hexagon_id')->where('signum_hexagon_id', '<>', 0)->get();
      return ApiSignum::collection($hexagons);
    }

    public function hexagonDetail(){
      $id = request('id');
      return SignumRaw::selectRaw('count(id) as counter, avg(level) as average , manufacturer')->where('signum_hexagon_id', $id)->groupBy(['manufacturer'])->get();
    }

    public function internalHexagonDetail(){
      $id = request('id');
      $hexagon = Hexagon::find($id);
      $signums = SignumRaw::all()->where('signum_hexagon_id', $id);

      return response()->json([
        'hexagon'=>$hexagon,
        'signums'=>$signums
        ]);
    }

    public function myLittleHexagons(){
      return Hexagon::where('created_at', '>', Carbon::today()->subDays(5))->get();
    }

}
