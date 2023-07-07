<?php

namespace App\Http\Controllers;
use App\Models\Organization;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Role;
use DB;
use Session;

class OrganizationController extends Controller
{
    //
    public function show_org(){
         $role =  Session::get('user')->role_id;
        $action = \App\Models\action_role_mapping::where('role_id',$role)->pluck('action_id');
         $permission = \App\Models\action_permission_mapping::where('action_id',6)->pluck('permission_id'); 
        $p_code = \App\Models\Permission::whereIn('id',$permission)->pluck('permission_code');
        return view('pages.ManageOrganization.All_Organization',["message"=>'',"ac"=>$action,"pcode"=>$p_code]);
    }
    
    public function add_org(){
        $role =  Session::get('user')->role_id;
        $action = \App\Models\action_role_mapping::where('role_id',$role)->pluck('action_id');
        return view('pages.ManageOrganization.AddOrganization',["ac"=>$action]);
    }

    public function add_org_validation(Request $request){
        $Org = new Organization();
        $Org->organization_name = $request['orgname'];
        $Org->Organization_description = $request['orgdesc'];
        
        if($request['orgname'] && $request['orgdesc']){
            $Org->save();    
            return redirect('/allorg')->with(["message"=>"Please Enter Organisation name or Description"]);
        
        }else{
            return redirect('/addorg')->with(["message"=>"Please Enter Organisation name or Description"]);
        }
    }
    
    public function delete_org($id){
         $row = Organization::where('id',$id)->delete();
        if($row){
            return redirect('/allorg');
        }
    }
    
    
    public function edit_org($id){
          $data = Organization::where('id',$id)->first();
          $role =  Session::get('user')[0]->role_id;
        $action = \App\Models\action_role_mapping::where('role_id',$role)->pluck('action_id');
        return view('pages.ManageOrganization.EditOrganization',["message"=>"","data"=>$data,"ac"=>$action]);
    }
    
    public function c_edit_org(Request $request, $id){
        $Org = Organization::find($id);
        $Org->organization_name = $request['orgname'];
        $Org->Organization_description = $request['orgdesc'];
        
        if($request['orgname'] && $request['orgdesc']){
            DB::table('organizations')
            ->where('id', $id)
            ->update(['organization_name' => $request['orgname'], 'Organization_description'=>$request['orgdesc']]);    
            return redirect('/allorg')->with(["message"=>"Please Enter Organisation name or Description"]);
        
        }else{
            return redirect('/addorg')->with(["message"=>"Please Enter Organisation name or Description"]);
        }
    }
    
    public function view_org($id) {
        $data = Organization::where('id',$id)->first();
        $role =  Session::get('user')[0]->role_id;
        $action = \App\Models\action_role_mapping::where('role_id',$role)->pluck('action_id');
        return view('pages.ManageOrganization.ViewOrganization',["message"=>"","data"=>$data,"ac"=>$action]);
    }
}
