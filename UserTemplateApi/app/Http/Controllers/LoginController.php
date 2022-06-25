<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\RegisterUser;
use App\Models\CreateTemplate;


class LoginController extends BaseController
{
    //
    public function login_with_userid_password(Request $request){
        $user_id = $request->user_id;
        $u_password = $request->password;
        
        if($user_id==""){
            $response['status']=0;
            $response['msg']='Please Enter Your User ID.';
        }elseif($u_password==""){
            $response['status']=0;
            $response['msg']='Please Enter Your Password.';            
        }else{
            $user_check_count = RegisterUser::where('user_id',$user_id)->count();
            
            if($user_check_count>0){
    
                    $user_id_check = RegisterUser::where('user_id',$user_id)->count();
                    if($user_id_check>0){
                        $user_password_check = RegisterUser::where('u_password',md5($u_password))->where('user_id',$user_id)->count();
                        if($user_password_check>0){
                            
                            $data = RegisterUser::where('user_id',$user_id)->get()->first();
                            
							
                            
                            $response['status']=1;
                            $response['msg']='Login Successfully.';
                            $response['user_data']=$data;
                            
                        }else{
                            $response['status']=0;
                            $response['msg']='Your Password Does Not Match.';
                        }
                        
                    }else{
                        $response['status']=0;
                        $response['msg']='User Id Does Not Match.';
                    }
    
            }else{
                $response['status']=0;
                $response['msg']='You are not registred user.';
            }
        
        }

        return response()->json($response);
    }
    public function create_template_web(Request $request){

        $data['em_template'] =$em_template= $request->em_template;
       
          

                          
                          $save_details = CreateTemplate::insertGetId($data);
                           
                         if($save_details){
                              $id=$save_details;
                            $data2['em_template_id']=  $em_template_id='Template'.$id;
                            $save_details =  CreateTemplate::where('id',$id)->update($data2);
                          
                                      $response['status']='1';
                                      $response['msg']='Template Created Successfully';                                    
                                  }else{
                                      $response['status']='0';
                                      $response['msg']='Template Are Not Saved';                                    
                                  }
                       
                              
         
  
          return response()->json($response);
  }  
  public function get_all_template(){
    $data = CreateTemplate::select('id','em_template_id','em_template')->get();
    if($data->isNotEmpty()){
        $response['status']=1;
        $response['msg']='Data Found';    
        $response['title']='All Template';
        $response['all_template']=$data;
    }else{
        $response['status']=0;
        $response['msg']='Data Not Found';
    }
    return response()->json($response);
}

public function send_email_template_web(Request $request){

    $data['em_template_id'] = $em_template_id  = $request->em_template_id;
    $data['email'] = $email = $request->email;
        
        if($em_template_id==""){
            $response['status']=0;
            $response['msg']='Please Enter Your Template ID.';
        }elseif($email==""){
            $response['status']=0;
            $response['msg']='Please Enter Your Email.';            
        }
        if(CreateTemplate::Where('id',$em_template_id)->exists())
        {
        $data_sel_tem_em = CreateTemplate::select('id','em_template_id','em_template')->Where('id',$em_template_id)->get();
        if($data_sel_tem_em->isNotEmpty()){
            $sel_tem_em= json_decode($data_sel_tem_em, true);
			$em_template = $sel_tem_em[0]['em_template'];
           

                                  $response['status']='1';
                                  $response['msg']='Email Send Successfully';                                    
                              }else{
                                  $response['status']='0';
                                  $response['msg']='Template Are Not Found';                                    
                              }
        }
        else{
            $response['status']='0';
            $response['msg']='This Template Does Not Found';
        }
        
                   
                          
     

      return response()->json($response);
}  

public function get_template_em_web(Request $request){

    $data['em_template_id'] = $em_template_id  = $request->em_template_id;
    
        
        if($em_template_id==""){
            $response['status']=0;
            $response['msg']='Please Enter Your Template ID.';
        }
        if(CreateTemplate::Where('id',$em_template_id)->exists())
        {
        $data_sel_tem_em = CreateTemplate::select('em_template')->Where('id',$em_template_id)->get();
        if($data_sel_tem_em->isNotEmpty()){
            $sel_tem_em= json_decode($data_sel_tem_em, true);
			$em_template = $sel_tem_em[0]['em_template'];
           

                                  $response['status']='1';
                                  $response['msg']='Found';
                                  $response['em_templ']=$em_template;                                     
                              }else{
                                  $response['status']='0';
                                  $response['msg']='Template Are Not Found';                                    
                              }
        }
        else{
            $response['status']='0';
            $response['msg']='This Template Does Not Found';
        }
        
                   
                          
     

      return response()->json($response);
}  






}
