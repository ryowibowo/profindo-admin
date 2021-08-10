@extends('layouts.default')

@section('content')

    <div class="card">
        <div class="card-header">
            <strong>Ubah Obat</strong>
             <small>{{$data['nama_obat']}}</small>
        </div>
        <div class="card-body card-block col-6">
            <form action="{{ route('obat/update', $data['id']) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="kode_obat" class="form-control-label">Kode Obat</label>
                    <input type="text" 
                            name="kode_obat" 
                            value="{{ old('kode_obat') ? old('kode_obat') : $data['kode_obat'] }}" 
                            class="form-control @error('kode_obat') is-invalid @enderror" />
                            @error('kode_obat') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="nama_obat" class="form-control-label">Nama Obat</label>
                    <input type="text" 
                            name="nama_obat" 
                            value="{{ old('nama_obat') ? old('nama_obat') : $data['nama_obat'] }}" 
                            class="form-control @error('nama_obat') is-invalid @enderror" />
                            @error('nama_obat') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="harga_obat" class="form-control-label">Harga Obat</label>
                    <input type="number" 
                            name="harga_obat" 
                            value="{{ old('harga_obat') ? old('harga_obat') : $data['harga_obat'] }}" 
                            class="form-control @error('harga_obat') is-invalid @enderror" />
                            @error('harga_obat') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="sisa_obat" class="form-control-label">Sisa Obat</label>
                    <input type="number" 
                            name="sisa_obat" 
                            value="{{ old('sisa_obat') ? old('sisa_obat') : $data['sisa_obat'] }}" 
                            class="form-control @error('sisa_obat') is-invalid @enderror" />
                            @error('sisa_obat') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="tgl_kadarluarsa" class="form-control-label">Tanggal Kadarluarsa</label>
                    <input type="date" 
                            name="tgl_kadarluarsa" 
                            value="{{ old('tgl_kadarluarsa') ? old('tgl_kadarluarsa') : $data['tgl_kadarluarsa'] }}" 
                            class="form-control @error('tgl_kadarluarsa') is-invalid @enderror" />
                            @error('tgl_kadarluarsa') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Ubah Obat
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection