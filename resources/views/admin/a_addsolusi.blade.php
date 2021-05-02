@extends('admin.layout_a.a_template')
@section('title','Add Solusi')

@section('content')
    <form action="/solusi/insert" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <label>Solusi</label>
                        <input name="solusi" class="form-control" value={{ old('solusi') }}>
                            <div class="text-danger">
                            @error('solusi')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Pencegahan</label>
                        <input name="pencegahan" class="form-control" value={{ old('pencegahan') }}> 
                        <div class="text-danger">
                            @error('pencegahan')
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