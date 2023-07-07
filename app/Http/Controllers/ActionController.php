<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Action;

class ActionController extends Controller
{
    //
    public function show_action(){
        return view('pages.action.addaction',["message"=>'']);
    }
    
    public function add_action(Request $request){
        
        $action = new Action();
        $action->action_name = $request['action'];
        $action->action_description = $request['action_description'];
        $action->save();
        
        if($action){
            return "Ok";
        }else{
            return view("pages.action.addaction",["message"=>'Not added try again later']);
        }
    }
}
