<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Obat;
use App\Models\Apoteker;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Response;


class TransaksiController extends Controller
{
    public function index()
    {
        $data = Transaksi::get();
        return view('pages.transaksi.index', ['data' => $data]);
    }

    public function create()
    {   
        $obat = Obat::get();
        $apoteker = Apoteker::get();
        return view('pages.transaksi.create', ['obat' => $obat, 'apoteker' => $apoteker]);
    }

    public function store(Request $request){
        $response = new Response();

        try {
            $client    = new Client();
            $getHeader = $client->request('POST', config('app.url_api') . '/api/addTransaksi', [
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'form_params' => [
                    'trans_id' => $request->trans_id,
                    'kode_obat' => $request->kode_obat,
                    'kode_apoteker' => $request->kode_apoteker,
                    'jumlah_jual' => $request->jumlah_jual,
                    'tgl_beli' => $request->tgl_beli,

                ],
            ]);

            $result = json_decode($getHeader->getBody()->getContents(), true);
            if ($getHeader->getStatusCode() == 200) {
                return redirect('transaksi')->with(['success' => 'Transaksi di Tambahkan']);
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
        $data = Transaksi::detail($id);
        $obat = Obat::get();
        $apoteker = Apoteker::get();
        return view('pages.transaksi.edit', ['data' => $data, 'obat' => $obat, 'apoteker' => $apoteker]);
    }

    public function update(Request $request, $id)
    {
        $response = new Response();
        try {
            $client    = new Client();
            
                $getHeader = $client->request('POST', config('app.url_api') . '/api/updateTransaksi/'.$id, [
                    'headers' => [
                        'Accept' => 'application/json'
                    ],
                    'form_params' => [
                        'trans_id' => $request->trans_id,
                        'kode_obat' => $request->kode_obat,
                        'kode_apoteker' => $request->kode_apoteker,
                        'jumlah_jual' => $request->jumlah_jual,
                        'tgl_beli' => $request->tgl_beli,
                    ],
                ]);
            $result = json_decode($getHeader->getBody()->getContents(), true);
            if ($getHeader->getStatusCode() == 200) {
                return redirect('transaksi')->with(['success' => 'Transaksi di ubah']);
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
        $apotek = Transaksi::deleteTransaksi($id);
        return redirect('transaksi')->with(['success' => 'Transaksi di Hapus']);
    }
}
