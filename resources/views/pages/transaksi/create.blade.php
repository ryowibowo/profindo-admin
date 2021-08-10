@extends('layouts.default')

@section('content')

    <div class="card">
        <div class="card-header">
            <strong>Tambah Apoteker</strong>
        </div>
        <div class="card-body card-block col-6">
            <form action="{{ route('transaksi/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="col-xs-6" class="form-control-label">Kode Transaksi</label>
                    <input type="text" 
                            name="trans_id" 
                            value="{{ old('trans_id') }}" 
                            class="form-control @error('trans_id') is-invalid @enderror" required>
                            @error('trans_id') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Obat</label>
                    <select name="kode_obat" 
                        class="form-control"  @error('products_id') is-invalid @enderror>

                        @foreach ($obat as $data)
                             <option value="{{$data['kode_obat']}}">{{$data['nama_obat']}}</option>
                        @endforeach

                    </select>
                    @error('kode_obat') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="kode_apoteker" class="form-control-label">Nama Apoteker</label>
                    <select name="kode_apoteker" 
                        class="form-control"  @error('kode_apoteker') is-invalid @enderror>

                        @foreach ($apoteker as $data)
                             <option value="{{$data['kode_apoteker']}}">{{$data['nama_apoteker']}}</option>
                        @endforeach

                    </select>
                    @error('kode_apoteker') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="col-xs-6" class="form-control-label">Jumlah Jual</label>
                    <input type="number" 
                            name="jumlah_jual" 
                            value="{{ old('jumlah_jual') }}" 
                            class="form-control @error('jumlah_jual') is-invalid @enderror" required>
                            @error('jumlah_jual') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="col-xs-6" class="form-control-label">Tanggal Beli</label>
                    <input type="date" 
                            name="tgl_beli" 
                            value="{{ old('tgl_beli') }}" 
                            class="form-control @error('tgl_beli') is-invalid @enderror" required>
                            @error('tgl_beli') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
               


                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Tambah Apoteker
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection