<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function apiTest(){
        $url = 'https://umayadia-apisample.azurewebsites.net/api/persons';

        // ストリームコンテキストのオプションを作成
        $options = array(
            // HTTPコンテキストオプションをセット
            'http' => array(
                'method'=> 'GET',
                'header'=> 'Content-type: application/json; charset=UTF-8' //JSON形式で表示
            )
        );

        // ストリームコンテキストの作成
        $context = stream_context_create($options);

        $raw_data = file_get_contents($url, false,$context);

        // debug
        //var_dump($raw_data);

        // json の内容を連想配列として $data に格納する
        $data = json_decode($raw_data,true);
        // dd($data['data'][0]);
        
        return view('api_test',compact('data'));
    }
}
