<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
   public function get(Request $request)
   {
        return Group :: get();
   }
   public function create(Request $request)
   {
     $group = new Group();
     $group->caption = $request->caption;
     $group = $group->save();
     return $group;
   }
   public function edit(Request $request)
   {
        Group::where('id', $request->id)->update(['caption'=>$request->caption]);
   }            
   public function delete(Request $request)
     {
          $res = Group::where('id',$request->id)->delete();
          return $res;
     }
}















