<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\model\Mypro_users;


class Authcontroller extends Controller
{
    public function signup(Request $request){
        $validator=Validator::make($request->all(),['name'=>'required','email'=>'required','password'=>'required']);
        if($validator->passes())
        {
            $check_status=Mypro_users::where('email',$request->email)->get()->toArray();
            if($check_status)
            {
                $arr=array('status'=>'false','message'=>'Email Alredy Exists');
            }
            else 
            {
            $new=new Mypro_users();
            $new->name = $request->name;
            $new->email = $request->email;
            $new->mobile_no = $request->mobile_no;
            $new->password = $request->password;
            $new->save();
            $arr = array('status'=>'true','message'=>'success');
        }
    }
        else
        {
            $arr = array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }

    public function login(Request $request){
        $validator=Validator::make($request->all(),['email'=>'required','password'=>'required']);
        if($validator->passes())
        {
            $check_status=Mypro_users::where('email',$request->email)->where('password',$request->password)->get()->toArray();
            if($check_status)
            {
                $arr=array('status'=>'true','message'=>'success','data'=>$check_status);
            }
            else 
            {
                 $arr = array('status'=>'false','message'=>'Email And Password Not Match');
        }
    }
        else
        {
            $arr = array('status'=>'true','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }
    
    
}
