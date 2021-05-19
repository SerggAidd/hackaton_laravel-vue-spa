<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;

class UserController extends Controller
{
    /**
     * Get authenticated user.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function current(Request $request)
    {
        return response()->json($request->user());
    }

   
        public function get(Request $request)
        {
              return User :: get();
        }
        public function create(Request $request)
        {
         
              $user = new User();
              $user->name = $request->name;
              $user->age = $request->age;
              $user->email = $request->email;
              $user->group_id = $request->group_id;
              $user = $user->save();
              return $user;
            
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
