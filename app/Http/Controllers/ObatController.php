<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Response;


class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::get();
        return view('pages.obat.index',   ['data' => $obat]);
    }

    public function create()
    {
        return view('pages.obat.create');
    }

    public function store(Request $request){
        $response = new Response();

        try {
            $client    = new Client();
            $getHeader = $client->request('POST', config('app.url_api') . '/api/addObat', [
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'form_params' => [
                    'kode_obat' => $request->kode_obat,
                    'nama_obat' => $request->nama_obat,
                    'harga_obat' => $request->harga_obat,
                    'sisa_obat' => $request->sisa_obat,
                    'tgl_kadarluarsa' => $request->tgl_kadarluarsa,

                ],
            ]);

            $result = json_decode($getHeader->getBody()->getContents(), true);
            if ($getHeader->getStatusCode() == 200) {
                return redirect('obat')->with(['success' => 'Obat di Tambahkan']);
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
        $obat = Obat::detail($id);
        return view('pages.obat.edit', ['data' => $obat]);
    }

    public function update(Request $request, $id)
    {
        $response = new Response();
        try {
            $client    = new Client();
            
                $getHeader = $client->request('POST', config('app.url_api') . '/api/updateObat/'.$id, [
                    'headers' => [
                        'Accept' => 'application/json'
                    ],
                    'form_params' => [
                        'kode_obat' => $request->kode_obat,
                        'nama_obat' => $request->nama_obat,
                        'harga_obat' => $request->harga_obat,
                        'sisa_obat' => $request->sisa_obat,
                        'tgl_kadarluarsa' => $request->tgl_kadarluarsa,
                    ],
                ]);
            $result = json_decode($getHeader->getBody()->getContents(), true);
            if ($getHeader->getStatusCode() == 200) {
                return redirect('obat')->with(['success' => 'Obat di Ubah']);
            } 
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            $status_code = 500;
            $response->status = $status_code;
            $response->message = $e->getMessage();
            $response->data = '';
            return response()->json($response, $status_code);
        }


        return redirect('admin/supplier');
    }


    public function destroy($id)
    {
        $obat = Obat::deleteObat($id);
        return redirect('obat')->with(['success' => 'Obat di Hapus']);
    }
}
