@extends('admin.layout_a.a_template')
@section('title','Add Gejala')

@section('content')
    <form action="/gejala/insert" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <label>ID Gejala</label>
                        <input name="id_gejala" class="form-control" value="{{ old('id_gejala') }}">
                            <div class="text-danger">
                            @error('id_gejala')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Gejala</label>
                        <input name="gejala" class="form-control" value="{{ old('gejala') }}">
                            <div class="text-danger">
                            @error('gejala')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Pertanyaan</label>
                        <input name="pertanyaan" class="form-control" value="{{ old('pertanyaan') }}"> 
                        <div class="text-danger">
                            @error('pertanyaan')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Simpan</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection