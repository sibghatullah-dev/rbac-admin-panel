<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Role;
use \App\Models\Organization;
use DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Session;

class UserController extends Controller
{
    //
    public function get_allow_action(){
        
        $role =  Session::get('user')->role_id;
        $action = \App\Models\action_role_mapping::Select('action_id')->where('role_id',$role)->get();
        
    }
    
    public function log_out(){
        Session::put('IsLoggedIn', false);
        Session::put('user',false);
        return Redirect('/login');
    }


    public function show_login(){
        // dd('dfdd');
        return View('pages.authentication.login');
    }
    public function show_view($id){
//        return view('pages.login',["message"=>""]);
        $data = User::where('id',$id)->first();
        
        //action get
        $role =  Session::get('user')->role_id;
        $action = \App\Models\action_role_mapping::where('role_id',$role)->pluck('action_id');
        
        //action end
        //
        
        //permission get
       

        //permission end
        
        return view('pages.ManageUser.ShowUser',["message"=>"","data"=>$data,"ac"=>$action]);
    }
    
    
    public function show_delete(){
        return view('pages.delete_users');
    }
    
    
    public function show_register(){
        $role = Role::all();
        $organization = Organization::all();
         $role =  Session::get('user')->role_id;
        $action = \App\Models\action_role_mapping::where('role_id',$role)->pluck('action_id');
        return view('pages.ManageUser.AddUser',["message"=>"","Roles"=>$role,"Organization"=>$organization,"ac"=>$action]);
    }
    
    public function show_all_users(){
        $role =  Session::get('user')->role_id;
        $action = \App\Models\action_role_mapping::where('role_id',$role)->pluck('action_id');
        $permission = \App\Models\action_permission_mapping::where('action_id',5)->pluck('permission_id'); 
        $p_code = \App\Models\Permission::whereIn('id',$permission)->pluck('permission_code');
        //dd($p_code);
        return view('pages.ManageUser.UserList',['ac'=>$action,"pcode"=>$p_code]);
    }
    
    public function show_update_user(){
        return view('pages.updateuser');
    }
    
    public function update_user($id){
         $role =  Session::get('user')->role_id;
        $action = \App\Models\action_role_mapping::where('role_id',$role)->pluck('action_id');
        
        $data = User::where('id',$id)->first();
        return view('pages.ManageUser.EditUser',["message"=>"","data"=>$data,"ac"=>$action]);
        
    } 
    public function delete_user($id){
        $row = User::where('id',$id)->delete();
        if($row){
            return redirect('/allusers');
        }
    } 

    public function edit_user_validation(Request $request,$id){
        
        if($request['cpassword'] === $request['password'] ){
            $user = User::find($id);
            $user->name = $request['username'];
            $user->email = $request['email'];
            $user->password = $request['password'];
            //$user->user_type = $request['usertype'];
            $user->role_id = $request['roletype'];
            $user->organization_id = $request['orgtype'];
            $user->avatar = $user->avatar;
            $image = $request->file('images');
            if($image){
                $ext = $image->getClientOriginalExtension();
            $user->avatar = "dummy".$image;
            $name =User::select('id')->where('email',$request['email']) -> get()[0]->id;
                 echo $name;
                $filePath = $name. '.' . $ext;
                //DB::table('users')->where('id', $name)->update(['avatar' => $filepath]);
                 $p = User::find($name);
                 $p->avatar = $filePath;
                 $p->save();
                 $folder = 'uploads/images/profile';
                 if($p){
                     $image->move($folder,$filePath);
                      return Redirect('/allusers');
                 }else{
                    return view("pages.ManageUser.EditUser",["message"=>"Password and Confirm Password must be same"]); 
                 }
            }else{
                $user->save();
                return Redirect('/allusers');
            }
            
            // Make a image name based on user name and current timestamp
            
            //$name = $request['username'];
            // Define folder path
            // $folder = 'uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            //$filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Set user profile image path in database to filePath
            
            //check user 
            //$user_check = User::where('name',$request['username']) -> first();
            
                
                 
                
        }else if($request['cpassword'] ==="" || $request['password']==="" ){
            return view("pages.ManageUser.UserList",["message"=>"Password must not be empty"]);
        }
        else{
            return view("pages.ManageUser.EditUser",["message"=>"Password and Confirm Password must be same"]);
        }
    }
    
    
    //validation or database functions here
    
    public function validation_login(Request $request){
        $user = User::all();
        $check = 0;
        $val = 0;

    	foreach ($user as $value) {
    		# code...
            
            if ($value['email']===$request['login_email']) {
    			# code...
    			if ($value['password']===$request['login_password']) {
                                $check = 1;
                                $val = $value;
                                    break;
    			}else{
    				
                                $check = 0;
                                continue;
    				
    			}
    		}else{
                        $check = 0;
                        continue;
    		}  
    }
    
        if($check===1){
            Session::put('IsLoggedIn', true);
            //dd($val);
            Session::put('user',$val);
                                
            
            return Redirect('/allusers');
         }else{
            //echo "Wrong Password or Email";
            return view('pages.authentication.login',["message"=>'Wrong password or email or usertype']);
          }
    }
    
    public function validation_register(Request $request){
        if($request['cpassword'] === $request['password'] ){
            $user = new User();
            $user->name = $request['username'];
            $user->email = $request['email'];
            $user->password = $request['password'];
            //$user->user_type = $request['usertype'];
            $user->role_id = $request['roletype'];
            $user->organization_id = $request['orgtype'];
            $image = $request->file('images');
            $ext = $image->getClientOriginalExtension();
            $user->avatar = "dummy".$image;
            // Make a image name based on user name and current timestamp
            
            //$name = $request['username'];
            // Define folder path
            // $folder = 'uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            //$filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Set user profile image path in database to filePath
            
            //check user 
            $user_check = User::where('name',$request['username']) -> first();
            
            if($user_check){
                return view('pages.register',["message"=>"Username Already Exist"]);
            }else{   
                $user->save();
                 $name =User::select('id')->where('email',$request['email']) -> get()[0]->id;
                 echo $name;
                $filePath = $name. '.' . $ext;
                //DB::table('users')->where('id', $name)->update(['avatar' => $filepath]);
                 $p = User::find($name);
                 $p->avatar = $filePath;
                 $p->save();
                 
                $folder = 'uploads/images/profile';
                 if($p){
                     $image->move($folder,$filePath);
                      return Redirect('/allusers');
                 }else{
                    return view("pages.ManageUser.UserList",["message"=>"Password and Confirm Password must be same"]); 
                 }
               
            }
        }else if($request['cpassword'] ==="" || $request['password']==="" ){
            return view("pages.ManageUser.UserList",["message"=>"Password must not be empty"]);
        }
        else{
            return view("pages.register",["message"=>"Password and Confirm Password must be same"]);
        }
    }
    
    
    
    
}
