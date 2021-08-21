@extends('layouts.master')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="#">Menu 1</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span>Menu 2</span>
                        </li>
                    </ul>
                </div>
                <!-- END PAGE BAR -->
                <!-- BEGIN PAGE TITLE-->
                <h1 class="page-title"> Kelola User
                    <small></small>
                </h1>
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject bold uppercase">User</span>
                                </div>
                                <div class="tools"> </div>
                            </div>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modTambah"><i class="fa fa-plus"></i> Tambah</button>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover" id="sample_3">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Posisi</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $key => $item)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->roles[0]->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>
                                                <a href="{{route('user.edit', $item->id)}}"><button class="btn btn-warning" style="float:left;"><i class="fa fa-pencil"></i> Edit</button></a>
                                                <form action="{{route('user.destroy', $item->id)}}" method="POST">
                                                    @csrf {{method_field('DELETE')}}
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="modal fade" id="modTambah" role="dialog">
                                    <div class="modal-dialog">
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Tambah User Akun</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{route('user.store')}}">
                                                        @csrf
                                
                                                        <div class="form-group row">
                                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                                
                                                            <div class="col-md-8">
                                                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                
                                                                @if ($errors->has('name'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('name') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Posisi') }}</label>
                                
                                                            <div class="col-md-8">
                                                                <select name="role" class="form-control">
                                                                    @foreach ($role as $item)
                                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach
                                                                </select>
                                
                                                                @if ($errors->has('role'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('role') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                
                                                        <div class="form-group row">
                                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                
                                                            <div class="col-md-8">
                                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                
                                                                @if ($errors->has('email'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('email') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                
                                                        <div class="form-group row">
                                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                
                                                            <div class="col-md-8">
                                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                
                                                                @if ($errors->has('password'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('password') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                
                                                        <div class="form-group row">
                                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                
                                                            <div class="col-md-8">
                                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                            </div>
                                                        </div>
                                
                                                        <div class="form-group row mb-0">
                                                            <div class="col-md-12">
                                                                <button type="submit" class="btn btn-primary col-md-4" style="float:right;">
                                                                    {{ __('Register') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                      
                                    </div>
                                  </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
        
@endsection