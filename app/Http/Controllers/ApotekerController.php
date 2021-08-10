<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apoteker;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Response;


class ApotekerController extends Controller
{
    public function index()
    {
        $data = Apoteker::get();
        return view('pages.apoteker.index',   ['data' => $data]);
    }

    public function create()
    {
        return view('pages.apoteker.create');
    }

    public function store(Request $request){
        $response = new Response();

        try {
            $client    = new Client();
            $getHeader = $client->request('POST', config('app.url_api') . '/api/addApoteker', [
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'form_params' => [
                    'kode_apoteker' => $request->kode_apoteker,
                    'nama_apoteker' => $request->nama_apoteker,
                    'tgl_lahir' => $request->tgl_lahir,

                ],
            ]);

            $result = json_decode($getHeader->getBody()->getContents(), true);
            if ($getHeader->getStatusCode() == 200) {
                return redirect('apoteker')->with(['success' => 'Apoteker di Tambahkan']);
            } 
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            $status_code = 500;
            $response->status = $status_code;
            $response->message = $e->getMessage();
            $response->data = '';
            return response()->json($response, $status_code);
        }
    }

    public function edit($id)
    {
        $data = Apoteker::detail($id);
        return view('pages.apoteker.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $response = new Response();
        try {
            $client    = new Client();
            
                $getHeader = $client->request('POST', config('app.url_api') . '/api/updateApoteker/'.$id, [
                    'headers' => [
                        'Accept' => 'application/json'
                    ],
                    'form_params' => [
                        'kode_apoteker' => $request->kode_apoteker,
                        'nama_apoteker' => $request->nama_apoteker,
                        'tgl_lahir' => $request->tgl_lahir,
                    ],
                ]);
            $result = json_decode($getHeader->getBody()->getContents(), true);
            if ($getHeader->getStatusCode() == 200) {
                return redirect('apoteker')->with(['success' => 'Apoteker di Diubah']);
            } 
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            $status_code = 500;
            $response->status = $status_code;
            $response->message = $e->getMessage();
            $response->data = '';
            return response()->json($response, $status_code);
        }
    }


    public function destroy($id)
    {
        $apotek = Apoteker::deleteApoteker($id);
        return redirect('apoteker')->with(['success' => 'Apoteker di Hapus']);
    }
}
