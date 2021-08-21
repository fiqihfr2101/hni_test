@extends('layouts.master')

@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        
        <h3>Edit Transaksi</h3><br>
            <div class="portlet-body form col-md-6">
                <!-- BEGIN FORM-->
                <form method="POST" action="{{route('transaksi.update', $trans->id)}}">
                    @csrf {{method_field('PUT')}}

                    <div class="form-group row">
                        <label for="barang" class="col-md-4 col-form-label text-md-right">Barang</label>
                        <div class="col-md-8">
                            <select name="barang" class="form-control">
                                @foreach ($barang as $item)
                                <option value="{{$item->id}}" {{$item->id == $trans->barang_id ? 'selected' : ''}} >{{$item->nama_barang}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('barang'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('barang') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jumlah"
                            class="col-md-4 col-form-label text-md-right">Jumlah</label>

                        <div class="col-md-8">
                            <input id="jumlah" type="number" class="form-control" value="{{$trans->jumlah}}" name="jumlah"required>

                            @if ($errors->has('jumlah'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('jumlah') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary col-md-4" style="float:right;">
                                Update Transaksi
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
