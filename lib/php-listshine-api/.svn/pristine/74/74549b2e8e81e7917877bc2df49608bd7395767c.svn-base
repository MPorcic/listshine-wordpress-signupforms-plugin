<?php

class ListShine_Api_Base
{
    protected $api_key = '';
    protected $url = '';

    public function __construct($api_key,$url){
        $this->url = $url;
        $this->api_key = $api_key;
    }

    public function getContactlists(){
        $cSession = curl_init();
        $authorization = "Authorization: Token ". $this->api_key;
        curl_setopt($cSession,CURLOPT_URL,$this->url."/contactlist/");
        curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($cSession, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
        curl_setopt($cSession,CURLOPT_HEADER, false);

        $result=curl_exec($cSession);
        $server_response = curl_getinfo($cSession);
        if ($server_response['http_code'] == "200") {
            curl_close($cSession);
            $response = json_decode($result);
            $response['http_code'] = $server_response['http_code'];
            return $response;
        } else {
            die("An error has happened here at ListShine HQ while connecting to our servers, please standby and try again later!");
        }
    }
    public function retrieve($list_id, $email){
        $cSession = curl_init();
        $authorization = "Authorization: Token ". $this->api_key;

        curl_setopt($cSession,CURLOPT_URL,$this->url."/escontact/contactlist/$list_id/");
        curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($cSession, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
        curl_setopt($cSession,CURLOPT_HEADER, false);
        $result=curl_exec($cSession);
        $server_response = curl_getinfo($cSession);
        if(curl_errno($cSession)){
            echo 'Request Error:' . curl_error($cSession);
        }else{
            curl_close($cSession);
            $result_json = json_decode($result);
            $user_id = "";
            foreach($result_json as $user){
                if($user->email == $email && $user->contactlist_uuid == $list_id){
                    $user_id = $user->id;
                }
            }

           return array("user_id"=>$user_id,"http_code"=>$server_response['http_code']);
        }

    }
    public function unsubscribeUser($list_id, $email){
        $cSession = curl_init();
        $authorization = "Authorization: Token ". $this->api_key;
        $user = $this->retrieve($list_id, $email);
        curl_setopt($cSession,CURLOPT_URL,$this->url."/escontact/contactlist/$list_id/contact/".$user["user_id"]."/unsubscribe/");
        curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($cSession, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
        curl_setopt($cSession,CURLOPT_HEADER, false);
        curl_setopt($cSession,CURLOPT_POST, 1);
        curl_setopt($cSession, CURLOPT_POSTFIELDS, json_encode(array("email"=>$email)));
        curl_exec($cSession);
        $server_response = curl_getinfo($cSession);
        if($server_response['http_code'] == "201"){
            echo "Contact unsubscribed successfully". "<br>";
            return $server_response['http_code'];
        } else {
            echo "There was some problem unsubscribing the contact here at ListShine HQ, please try again later!";
        }

        curl_close ($cSession);
    }
    public function subscribeUser($list_id, $email, $info_array){
        $cSession = curl_init();
        $post_array = array("email"=>"", "firstname"=>"" , "lastname"=>"", "company"=>"", "website"=>"", "phone"=>"", "address"=>"", "city"=>"", "country" => "", "custom"=>"", "custom2"=>"", "custom3"=>"", "custom4"=>"");
        $post_array  = array_replace($post_array, array("email"=>$email), $info_array);
        $authorization = "Authorization: Token ". $this->api_key;
        curl_setopt($cSession,CURLOPT_URL,$this->url."/escontact/$list_id/");
        curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($cSession, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
        curl_setopt($cSession,CURLOPT_HEADER, false);
        curl_setopt($cSession,CURLOPT_POST, true);
        curl_setopt($cSession, CURLOPT_POSTFIELDS, json_encode($post_array));
        $server_output = curl_exec($cSession);
        $server_response = curl_getinfo($cSession);
        if($server_response['http_code'] == "201"){
            echo "Contact added to subscribers successfully" . "<br> ";
            return $server_response['http_code'];
        } else {
            echo "There was some problem adding the user to the subscriberlist here at ListShine HQ, please try again later!";
        }
        curl_close ($cSession);
    }

}