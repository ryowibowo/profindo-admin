@extends('layouts.default')

@section('content')

    <div class="card">
        <div class="card-header">
            <strong>Tambah Obat</strong>
        </div>
        <div class="card-body card-block col-6">
            <form action="{{ route('obat/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="col-xs-6" class="form-control-label">Kode Obat</label>
                    <input type="text" 
                            name="kode_obat" 
                            value="{{ old('kode_obat') }}" 
                            class="form-control @error('kode_obat') is-invalid @enderror" required>
                            @error('kode_obat') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="col-xs-6" class="form-control-label">Nama Obat</label>
                    <input type="text" 
                            name="nama_obat" 
                            value="{{ old('nama_obat') }}" 
                            class="form-control @error('nama_obat') is-invalid @enderror" required>
                            @error('nama_obat') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="col-xs-6" class="form-control-label">Harga Obat</label>
                    <input type="number" 
                            name="harga_obat" 
                            value="{{ old('harga_obat') }}" 
                            class="form-control @error('harga_obat') is-invalid @enderror" required>
                            @error('harga_obat') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="col-xs-6" class="form-control-label">Sisa Obat</label>
                    <input type="text" 
                            name="sisa_obat" 
                            value="{{ old('sisa_obat') }}" 
                            class="form-control @error('sisa_obat') is-invalid @enderror" required>
                            @error('sisa_obat') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="col-xs-6" class="form-control-label">Tanggal Kadarluarsa</label>
                    <input type="date" 
                            name="tgl_kadarluarsa" 
                            value="{{ old('tgl_kadarluarsa') }}" 
                            class="form-control @error('tgl_kadarluarsa') is-invalid @enderror" required>
                            @error('tgl_kadarluarsa') <div class="text-muted">{{ $message }}</div> @enderror
                </div>


                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Tambah Obat
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection