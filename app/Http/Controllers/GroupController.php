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
        return 'Hello World';
   }
   public function delete(Request $request)
   {
     $group = new Group();
     $group->id = $request->id;
     $group = $group->save();
     return $group;
   }
}
