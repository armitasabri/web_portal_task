<?php

namespace App\Controllers;


use Symfony\Component\Routing\RouteCollection;


class FetchTasksController{

    public function getTasks(RouteCollection $routes)
    {
        $task=['nothing returned back from the serve'];
        if($this->returnedData()){
            $tasks=$this->returnedData();
        }
        require_once APP_ROOT . '/views/task.php';
    }

    protected function returnedData()
    {
        $authorization=$this->getAccessToken();
        $access_token=$authorization['oauth']['access_token'];
        $url = "https://api.baubuddy.de/dev/index.php/v1/tasks/select";
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $access_token",
                "Content-Type: application/json"
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return false;
        } else {
            return json_decode($response,true);
        }

    }

    protected function getAccessToken()
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.baubuddy.de/index.php/login",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"username\":\"365\", \"password\":\"1\"}",
            CURLOPT_HTTPHEADER => [
                "Authorization: Basic QVBJX0V4cGxvcmVyOjEyMzQ1NmlzQUxhbWVQYXNz",
                "Content-Type: application/json"
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response,true);
        }

    }

    public function getNewTasks(RouteCollection $routes)
    {

    }



}


