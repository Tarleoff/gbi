<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    function signup(Request $request) {
        $product = User::create($request->all());
        return response()->json($product, 200);
    }

    function delete($id) {
        $user = User::find($id);
        $user->delete();
        return response()->json($user);
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->update($request->all());
        return response()->json($user, 200);
    }
}
