<?php
namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

trait HttpRequest{

    public function api_url(){
        return env('API_BASE_URL');
    }
    
    public function get_api_data($apiUrl){
        $title = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->get($this->api_url().'/'.$apiUrl);
        return json_decode($title->body());
    }
    
    public function post_api_data($apiUrl,$data=[]){
        //print_r($data);
        $fullurl = $this->api_url().'/'.$apiUrl;
        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post($fullurl, $data);
        //dd($response->body());
        return json_decode($response->body());
    }


}
?>