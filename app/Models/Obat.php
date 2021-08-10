<?php

namespace App\Models;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    public static function get() {
        try {
            $client    = new Client();
            $getHeader = $client->request('GET', config('app.url_api') . '/api/getObat', [
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
            $getHeader = $client->request('GET', config('app.url_api') . '/api/detailObat/'.$id, [
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


    public static function deleteObat($id){
        try {
            $client    = new Client();
            $getHeader = $client->request('GET', config('app.url_api') . '/api/deleteObat/'.$id, [
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
