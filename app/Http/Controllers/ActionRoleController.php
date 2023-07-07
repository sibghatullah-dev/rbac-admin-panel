<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\action_role_mapping;
use App\Models\Role;
use \App\Models\Action;
use DB;
use Session;

class ActionRoleController extends Controller
{
    //
   
     public function getAllRoles() {
         $data = Action::all();
         $role =  Session::get('user')->role_id;
        $action = \App\Models\action_role_mapping::where('role_id',$role)->pluck('action_id');
         return view('pages.ActionRoleMapping.ActionRoleLoader',['actions'=>$data,"ac"=>$action]);
    }
    public function getAllRoleswithOrg(Request $request){
         $orgid = $request['org_type'];
         $data =Role::where('roles_organization_id_foreign','=',$orgid)->get();
         return $data;
    }
    public function getActionRole(Request $request) {
        $roleid = $request['role_id'];
        
        $data = action_role_mapping::where('role_id','=',$roleid)->get();
        return $data;
    }
    
    public function setActionRole(Request $request){
        $d = DB::table('action_role_mappings')->where('role_id', $request['role_id'])->delete();
        if($request['a_id']==[]){
            return redirect('/ARMapping');
        }else{
            
        foreach ($request['a_id'] as $selectedOption){
            $ap_mapping = new \App\Models\action_role_mapping();
            $ap_mapping->role_id = $request['role_id'];
            
            $ap_mapping->action_id = $selectedOption;
            $ap_mapping->save();
            //echo $selectedOption."<br>";
        }
        if($ap_mapping){
            return redirect('/ARMapping');
        }else{
            return redirect('/ARMapping');
        }
        }
            
                
    }
}
