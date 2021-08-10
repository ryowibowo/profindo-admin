@extends('layouts.default')

@section('content')

	<div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="h4 box-title">Laporan</div>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
        
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Sisa Obat</th>
                                        <th>Jumlah Jual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;?>
                                   @forelse ($data as $item)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{$item['kode_obat']}}</td>
                                            <td>{{$item['nama_obat']}}</td>
                                            <td>{{$item['sisa_obat']}}</td>
                                            <td>{{$item['total_jual']}}</td>                                            
                                        </tr>
                                        <?php $no++ ;?>
                                    
                                   @empty
                                       <tr>
                                           <td colspan="6" class="text-center p-5">
                                               Data Tidak Ada
                                           </td>
                                       </tr>
                                   @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection