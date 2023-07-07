<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\User;
class LoginController extends Controller
{
    //
    function add(Request $request){
        // $login = new Login;
        // $login->email=$req->email;
        // $login->password=$req->password;
        //  $result = $login->save();
        // if($result)
        // {
        //     return array(
        //         "success"=>true,
        //         "message"=>"SignUp Successfull",
        //         "responsecode"=>200,
        //         "data"=>$result
        //     );
        // }
        // else{
        //     return ["Result"=>"Operation failed"];
        // }

        $user = User::all();
        $check = 0;
        $val = 0;

    	foreach ($user as $value) {
    		# code...
            
            if ($value['email']===$request['email']) {
    			# code...
    			if ($value['password']===$request['password']) {
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
            return array(
                        "success"=>true,
                        "message"=>"SignUp Successfull",
                        "responsecode"=>200,
                        "data"=>[]
                    ); 
            //return Redirect('/allusers');
         }else{
            return array(
                "success"=>false,
                "message"=>"Please Enter Correct Credentials",
                "responsecode"=>403,
                "data"=>[]
            ); 
    
          }
    }
}
