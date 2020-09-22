<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\model\contact_form;
use App\model\Mypro_feedback_type;
use App\model\Mypro_subscribe;
use App\model\Mypro_feedback;

class FrontApi extends Controller
{
    public function testing(){
        echo "testing function";
    }
    public function save_contact_query(Request $request){
        $validator=Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','message'=>'required']);
        if($validator->passes())
        {
            $obj=new contact_form();
            $obj->name = $request->name;
            $obj->email = $request->email;
            $obj->mobile_no = $request->mobile_no;
            $obj->message = $request->message;
            $obj->save();
            $arr = array('status'=>'true','message'=>'contect query success');
        }
        else
        {
            $arr = array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }
    public function subscribe_user(Request $request)
    {
        $validator = Validator::make($request->all(),['email'=>'required']);
        if($validator->passes())
        {
            $check_status=Mypro_subscribe::where('email',$request->email)->get()->toArray();
            if($check_status)
            {
                $arr=array('status'=>'false','message'=>'Email Alredy Exists');
            }
            else 
            {
                $subscribe = new Mypro_subscribe();
                $subscribe->email=$request->email;
                $subscribe->save();
                $arr=array('status'=>'true','message'=>'Thank You For Subscribe');
            }
        }
        else 
        {
            $arr=array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }

    public function get_feedback_type(){
        $feedback_type = Mypro_feedback_type::select(['id','title'])->where('status','1')->get()->toArray();
        if($feedback_type){
                $arr=array('status'=>'true','message'=>'success','data'=>$feedback_type);
        }
        else{
            $arr=array('status'=>'false','message'=>'Feedback Type Not Found');
        }
        echo json_encode($arr);
    }

    public function save_feedback(Request $request){
        $validator=Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','feedback_type'=>'required','message'=>'required']);
        if($validator->passes())
        {
            $feed=new Mypro_feedback();
            $feed->name = $request->name;
            $feed->email = $request->email;
            $feed->mobile_no = $request->mobile_no;
            $feed->feedback_type = $request->feedback_type;
            $feed->message = $request->message;
            $feed->save();
            $arr = array('status'=>'true','message'=>'success');
        }
        else
        {
            $arr = array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }
    

}
