<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function get(Request $request)
    {
          return User :: get();
    }
    public function create(Request $request)
    {
     {
          $user = new User();
          $user->name = $request->name;
          $user = $user->save();
          return $user;
        }
    }
    public function edit(Request $request)
    {
          return 'Hello World';
    }
    public function delete(Request $request)
    {
          $res = User::where('id',$request->id)->delete();
          return $res;
    }
         
}
