<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Response;


class LaporanController extends Controller
{
    public function index()
    {
        $data = Laporan::get();
        return view('pages.laporan.index', ['data' => $data]);
    }
}
