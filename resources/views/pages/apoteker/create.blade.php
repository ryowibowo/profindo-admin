@extends('layouts.default')

@section('content')

    <div class="card">
        <div class="card-header">
            <strong>Tambah Apoteker</strong>
        </div>
        <div class="card-body card-block col-6">
            <form action="{{ route('apoteker/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="col-xs-6" class="form-control-label">Kode Apoteker</label>
                    <input type="text" 
                            name="kode_apoteker" 
                            value="{{ old('kode_apoteker') }}" 
                            class="form-control @error('kode_apoteker') is-invalid @enderror" required>
                            @error('kode_apoteker') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="col-xs-6" class="form-control-label">Nama Apoteker</label>
                    <input type="text" 
                            name="nama_apoteker" 
                            value="{{ old('nama_apoteker') }}" 
                            class="form-control @error('nama_apoteker') is-invalid @enderror" required>
                            @error('nama_apoteker') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="col-xs-6" class="form-control-label">Tanggal Lahir</label>
                    <input type="date" 
                            name="tgl_lahir" 
                            value="{{ old('tgl_lahir') }}" 
                            class="form-control @error('tgl_lahir') is-invalid @enderror" required>
                            @error('tgl_lahir') <div class="text-muted">{{ $message }}</div> @enderror
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