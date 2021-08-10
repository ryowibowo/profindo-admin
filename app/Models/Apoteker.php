<?php

namespace App\Models;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

class Apoteker extends Model
{
    public static function get() {
        try {
            $client    = new Client();
            $getHeader = $client->request('GET', config('app.url_api') . '/api/getApoteker', [
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'form_params' => []
            ]);
            
            $result = json_decode($getHeader->getBody()->getContents(), true);
            if ($getHeader->getStatusCode() == 200) {
                $data = collect($result['data']);
            } else {
                $data = collect([]);
            }
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            $data = collect([]);
        }
        return $data;
    }

    public static function detail($id){
        try {
            $client    = new Client();
            $getHeader = $client->request('GET', config('app.url_api') . '/api/detailApoteker/'.$id, [
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'form_params' => []
            ]);
            
            $result = json_decode($getHeader->getBody()->getContents(), true);

            if ($getHeader->getStatusCode() == 200) {
                $data = collect($result['data']);
            } else {
                $data = collect([]);
            }
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            $data = collect([]);
        }

        return $data;
    }


    public static function deleteApoteker($id){
        try {
            $client    = new Client();
            $getHeader = $client->request('GET', config('app.url_api') . '/api/deleteApoteker/'.$id, [
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'form_params' => []
            ]);
            
            $result = json_decode($getHeader->getBody()->getContents(), true);

            if ($getHeader->getStatusCode() == 200) {
                $data = collect($result['data']);
            } else {
                $data = collect([]);
            }
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            $data = collect([]);
        }

        return $data;
    }
}
