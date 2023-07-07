<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Role;
use Session;

class RoleController extends Controller
{
    //
    public function show_role(){
        $role =  Session::get('user')->role_id;
        $action = \App\Models\action_role_mapping::where('role_id',$role)->pluck('action_id');
         $permission = \App\Models\action_permission_mapping::where('action_id',9)->pluck('permission_id'); 
        $p_code = \App\Models\Permission::whereIn('id',$permission)->pluck('permission_code');
        return view('pages.ManageRole.RoleList',["message"=>'',"ac"=>$action,"pcode"=>$p_code]);
    }
    
    public function add_role(){
        $role =  Session::get('user')->role_id;
        $action = \App\Models\action_role_mapping::where('role_id',$role)->pluck('action_id');
        return view('pages.ManageRole.AddRole',["ac"=>$action]);
    }

    public function add_role_validation(Request $request){
        $role = new Role();
        $role->role_name = $request['rolename'];
        $role->role_descriptions = $request['roledesc'];
        $role->roles_organization_id_foreign = $request['orgtype'];
        
        if($request['rolename'] && $request['roledesc']){
            $role->save();    
            return redirect('/allrole')->with(["message"=>"Please Enter Organisation name or Description"]);
        
        }else{
            return redirect('/addrole')->with(["message"=>"Please Enter Organisation name or Description"]);
        }
    }
    
    public function delete_role($id){
         $row = Role::where('id',$id)->delete();
        if($row){
            return redirect('/allrole');
        }
    }
    
    
    public function edit_role($id){
          $data = Role::where('id',$id)->first();
          $role =  Session::get('user')->role_id;
        $action = \App\Models\action_role_mapping::where('role_id',$role)->pluck('action_id');
        return view('pages.ManageRole.EditRole',["message"=>"","data"=>$data,"ac"=>$action]);
    }
    
    public function c_edit_role(Request $request, $id){
//        $role = Role::find($id);
//        $role->role_name = $request['orgname'];
//        $Org->role_descriptions = $request['orgdesc'];
//        
        if($request['rolename'] && $request['roledesc']){
            DB::table('role')
            ->where('id', $id)
            ->update(['role_name' => $request['rolename'], 'role_descriptions'=>$request['roledesc'],'roles_organization_id_foreign'=>$request['orgtype']]);    
            return redirect('/allrole')->with(["message"=>"Please Enter Organisation name or Description"]);
        
        }else{
            return redirect('/addrole')->with(["message"=>"Please Enter Organisation name or Description"]);
        }
    }
    
    public function view_role($id) {
        $data = Role::where('id',$id)->first();
        $role =  Session::get('user')->role_id;
        $action = \App\Models\action_role_mapping::where('role_id',$role)->pluck('action_id');
        return view('pages.ManageRole.ViewRole',["message"=>"","data"=>$data,"ac"=>$action]);
    }
}
