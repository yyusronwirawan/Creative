@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Admin Theme
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Admin Theme</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    Update Admin Theme
                </div>

                <div class="box-body">
                    <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/admin_color/update') }}" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      <div class="form-group">
                        <label for="exampleInputEmail1">Header</label>
                        <input name="header" class="form-control my-colorpicker1" value="@if(isset($data->header)){{ $data->header }}@endif">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Sidebar</label>
                        <input name="sidebar" class="form-control my-colorpicker1" value="@if(isset($data->sidebar)){{ $data->sidebar }}@endif">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
