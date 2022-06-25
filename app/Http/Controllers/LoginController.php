<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
use App\Traits\HttpRequest;
use Session;

class LoginController extends BaseController
{
    
    
    use HttpRequest;
    
    public function login(){
        return view('panel.login');
    }
    
	public function logout(){
	   
		Session::flush();
		return redirect('login');
	}
    public function login_with_userid_password_ajax(Request $request){
        $user_id = $request->user_id;
        $password = $request->password;
        $data['user_id']=$user_id;
        $data['password']=$password;
        $response = $this->post_api_data("login-with-userid-password",$data);
        
        if($response->status==1){
            $userdetails = $response->user_data;
            
            session::put("id",$userdetails->id);
            session::put("user_id",$userdetails->id);
            session::put("name",$userdetails->name);
            session::put("email",$userdetails->email);
            session::put("mobile",$userdetails->mobile);
			
            
            
            
            $jsonobj['status']='1';
            $jsonobj['redirect_to']='userPanel';
            $jsonobj['msg']=$response->msg;
        }else{
            $jsonobj['status']='0';
            $jsonobj['msg']=$response->msg;           
        }  
        
        return response()->json($jsonobj);
    }
    public function userPanel(){
        return view('panel.userPanel');
    }

    public function create_template_ajax(Request $request){
        $em_template = $request->em_template;
        $data['em_template']=$em_template;
       
        $response = $this->post_api_data("create-template-web",$data);
        
        if($response->status==1){
            $jsonobj['status']='1';
            $jsonobj['msg']=$response->msg;
        }else{
            $jsonobj['status']='0';
            $jsonobj['msg']=$response->msg;           
        }  
        
        return response()->json($jsonobj);
    }
	
    public function view_template(){
        $all_tem = $this->get_api_data("get-all-template");
       
        
        return view('panel.view_template',compact('all_tem'));
    }
    public function email_template(){
        $all_tem = $this->get_api_data("get-all-template");
       
        
        return view('panel.emailTemplate',compact('all_tem'));
    }

    public function send_email_template_ajax(Request $request){
        $data['em_template_id'] = $request->em_template_id;
        $data['email'] =$email = $request->email;
        $data['templa_text'] = $templa_text = $request->templa_text;
       
        $mailData = [
            'title' => 'EMail Template',
            'body' => $templa_text
        ];
         
        Mail::to($email)->send(new DemoMail($mailData));
       $response = $this->post_api_data("send-email-template-web",$data);
        
        if($response->status==1){
            $jsonobj['status']='1';
            $jsonobj['msg']=$response->msg;
        }else{
            $jsonobj['status']='0';
            $jsonobj['msg']=$response->msg;           
        }  
        
        return response()->json($jsonobj);
    }


    public function get_template_em_ajax(Request $request){
        $data['em_template_id'] = $request->em_template_id;
       
       $response = $this->post_api_data("get-template-em-web",$data);
        
        if($response->status==1){
            $jsonobj['status']='1';
            $jsonobj['msg']=$response->msg;
            $jsonobj['em_temp']=$response->em_templ;
        }else{
            $jsonobj['status']='0';
            $jsonobj['msg']=$response->msg;           
        }  
        
        return response()->json($jsonobj);
    }




   
}
