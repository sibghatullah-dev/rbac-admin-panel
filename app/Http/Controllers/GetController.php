<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class GetController extends Controller
{
    //
    function list($id=null)
    {
        return $id?User::find($id):User::all();
    }
}
