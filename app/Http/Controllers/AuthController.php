<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Response;
use App\Providers\RouteServiceProvider;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request){
        $response = new Response();
        try {
            $client = new Client();
            $getHeader = $client->request('POST', config('app.url_api') . '/api/login', [
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'form_params' => [
                    'email' => $request->email,
                    'password' => $request->password
                ],
            ]);
            $result = json_decode($getHeader->getBody()->getContents(), true);
            if ($getHeader->getStatusCode() == 200) {
                return redirect('/dashboard');
            } 
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            $status_code = 500;
            $response->status = $status_code;
            $response->message = $e->getMessage();
            $response->data = '';
            return response()->json($response, $status_code);
            // return redirect(route('login'));
        }
    }
}
