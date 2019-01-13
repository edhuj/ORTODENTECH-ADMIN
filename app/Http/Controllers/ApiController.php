<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;
use App\Http\Resources\QuestionCollection;
use App\Http\Resources\User as ApiUser;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
