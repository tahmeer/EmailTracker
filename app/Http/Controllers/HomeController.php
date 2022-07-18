<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function sendemail(){
        // $user = User::all('email','id');
        // foreach($user as $item){
        //     dd($item->id);
        // }
        // dd($user->id);
        dispatch(new SendEmail())->delay(now()->addSecond());
        return response()->json(['message'=>'Email Sent Succesfully']);
    }
    function emailimage($email){
        // $item = "syedtahmeerhussainnaqvi";
        // dd("http://127.0.0.1:8000/imagefile/".$email);
        $username = User::where('email',$email)->first();
        $username->name = "Tahmeer Hussain";
        $username->save();
        dd($username);
    }
}
