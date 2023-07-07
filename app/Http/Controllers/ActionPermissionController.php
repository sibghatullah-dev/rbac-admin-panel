<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use DB;
use Table;
use Session;


class ActionPermissionController extends Controller
{
    //
    public function show_ap(){
        $role =  Session::get('user')->role_id;
        $action = \App\Models\action_role_mapping::where('role_id',$role)->pluck('action_id');
        return view('pages.ActionPermissionMapping.ActionPermissionLoader',["ac"=>$action]);
    }
    
    
    public function getAllPermissions() {
         $data = Permission::all();
         $role =  Session::get('user')->role_id;
        $action = \App\Models\action_role_mapping::where('role_id',$role)->pluck('action_id');
         return view('pages.ActionPermissionMapping.ActionPermissionLoader',['data'=>$data,"ac"=>$action]);
    }
    
    public function getActionPermission(Request $request) {
        $actionid = $request['a_id'];
        $data =DB::table('action_permission_mappings')->select('permission_id')->where('action_id', $actionid)->get();
        return $data;
    }
    
    public function setActionPermission(Request $request){
        $d = DB::table('action_permission_mappings')->where('action_id', $request['a_id'])->delete();
        if($request['p_id']==[]){
            return redirect('/APMapping');
        }else{
            
        foreach ($request['p_id'] as $selectedOption){
            $ap_mapping = new \App\Models\action_permission_mapping();
            $ap_mapping->action_id = $request['a_id'];
        
            $ap_mapping->permission_id = $selectedOption;
            $ap_mapping->save();
            //echo $selectedOption."<br>";
        }
        if($ap_mapping){
            return redirect('/APMapping');
        }else{
            return redirect('/APMapping');
        }
        }
            
                
    }
}
