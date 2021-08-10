@extends('layouts.default')

@section('content')

    <div class="card">
        <div class="card-header">
            <strong>Ubah Transaksi</strong>
             <small>{{$data['trans_id']}}</small>
        </div>
        <div class="card-body card-block col-6">
            <form action="{{ route('transaksi/update', $data['id']) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="trans_id" class="form-control-label">Kode Transaksi</label>
                    <input type="text" 
                            name="trans_id" 
                            value="{{ old('trans_id') ? old('trans_id') : $data['trans_id'] }}" 
                            class="form-control @error('trans_id') is-invalid @enderror" />
                            @error('trans_id') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Obat</label>
                    <select name="kode_obat" 
                        class="form-control"  @error('products_id') is-invalid @enderror>

                        @foreach ($obat as $row)
                            <option value="{{ $row['kode_obat'] }}" {{$data['kode_obat'] == $row['kode_obat']  ? 'selected' : ''}}> {{$row['nama_obat']}}  </option>
                        @endforeach

                    </select>
                    @error('kode_obat') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Apoteker</label>
                    <select name="kode_apoteker" 
                        class="form-control"  @error('products_id') is-invalid @enderror>

                        @foreach ($apoteker as $row)
                            <option value="{{ $row['kode_apoteker'] }}" {{$data['kode_apoteker'] == $row['kode_apoteker']  ? 'selected' : ''}}> {{$row['nama_apoteker']}}  </option>
                        @endforeach

                    </select>
                    @error('kode_apoteker') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="jumlah_jual" class="form-control-label">Jumlah Jual</label>
                    <input type="text" 
                            name="jumlah_jual" 
                            value="{{ old('jumlah_jual') ? old('jumlah_jual') : $data['jumlah_jual'] }}" 
                            class="form-control @error('jumlah_jual') is-invalid @enderror" />
                            @error('jumlah_jual') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="tgl_beli" class="form-control-label">Tanggal Beli</label>
                    <input type="date" 
                            name="tgl_beli" 
                            value="{{ old('tgl_beli') ? old('tgl_beli') : $data['tgl_beli'] }}" 
                            class="form-control @error('tgl_beli') is-invalid @enderror" />
                            @error('tgl_beli') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

            
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Ubah Transaksi
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection