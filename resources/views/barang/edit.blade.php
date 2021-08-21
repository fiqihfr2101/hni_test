@extends('layouts.master')

@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        
        <h3>Edit Barang</h3><br>
            <div class="portlet-body form col-md-6">
                <!-- BEGIN FORM-->
                <form method="POST" action="{{route('barang.update', $barang->id)}}">
                    @csrf {{method_field('PUT')}}

                    <div class="form-group row">
                        <label for="nama_barang" class="col-md-4 col-form-label text-md-right">Nama Barang</label>

                        <div class="col-md-8">
                            <input id="nama_barang" name="nama_barang" type="text" value="{{$barang->nama_barang}}" class="form-control" required
                                autofocus>

                            @if ($errors->has('nama_barang'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nama_barang') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga" class="col-md-4 col-form-label text-md-right">Harga</label>

                        <div class="col-md-8">
                            <input id="harga" type="number" class="form-control" name="harga" value="{{$barang->harga}}" step="0.01" required>

                            @if ($errors->has('harga'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('harga') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stok" class="col-md-4 col-form-label text-md-right">Stok</label>

                        <div class="col-md-8">
                            <input id="stok" type="number" class="form-control" name="stok" value="{{$barang->stok}}" required>

                            @if ($errors->has('stok'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('stok') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary col-md-4" style="float:right;">
                                Update Barang
                            </button>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

@endsection
