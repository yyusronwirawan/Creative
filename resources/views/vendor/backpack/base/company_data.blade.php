@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Company Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Company Data</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Update Company Data
                </div>

                <div class="box-body">
                    <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/company_data/update') }}" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Facebook</label>
                        <input type="text" name="facebook" class="form-control" value="@if(isset($data->facebook)) {{ $data->facebook }} @endif">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Instagram</label>
                        <input type="text" name="instagram" class="form-control" value="@if(isset($data->facebook)) {{ $data->instagram }} @endif">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Pinterest</label>
                        <input type="text" name="pinterest" class="form-control" value="@if(isset($data->facebook)) {{ $data->pinterest }} @endif">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Bridestory</label>
                        <input type="text" name="bridestory" class="form-control" value="@if(isset($data->facebook)) {{ $data->bridestory }} @endif">
                      </div> -->
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="email" class="form-control" value="@if(isset($data->email)){{ $data->email }}@endif">
                      </div>
                      <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Line</label>
                        <input type="text" name="line" class="form-control" value="@if(isset($data->facebook)) {{ $data->line }} @endif">
                      </div> -->
                      <div class="form-group">
                        <label for="exampleInputEmail1">Whatsapp</label>
                        <input type="text" name="whatsapp" class="form-control" value="@if(isset($data->whatsapp)){{ $data->whatsapp }}@endif">
                      </div>
                      <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Addesss</label>
                        <textarea name="address" class="form-control my-editor">@if(isset($data->address)) {{ $data->address }} @endif</textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Telephone</label>
                        <textarea name="telephone" class="form-control my-editor">@if(isset($data->telephone)) {{ $data->telephone }} @endif</textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Hours</label>
                        <textarea name="hours" class="form-control my-editor">@if(isset($data->hours)) {{ $data->hours }} @endif</textarea>
                      </div> -->
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
