@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Hubungi Kami
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Hubungi Kami</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Update Hubungi Kami
                </div>

                <div class="box-body">
                    <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/hubungi_kami/update') }}" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      <div class="form-group">
                        <label for="exampleInputEmail1">Pesan Link</label>
                        <input name="pesan_link" class="form-control" value="@if(isset($data->pesan_link)){{ $data->pesan_link }}@endif">
                      </div>
                      <div class="form-group @if($errors->has('image')) has-error @endif">
                        <label for="exampleInputEmail1">Pesan Image</label>
                        <input type="file" name="image" class="form-control">
                        @if(isset($data->pesan_image)) <img src="{{ asset('/upload/'.$data->pesan_image) }}" width="10%" /> @endif
                        <input type="hidden" name="old_image" value="@if(isset($data->pesan_image)) {{ $data->pesan_image }} @endif">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Chat Link</label>
                        <input name="chat_link" class="form-control" value="@if(isset($data->chat_link)){{ $data->chat_link }}@endif">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Chat Image</label>
                        <input type="file" name="chat_image" class="form-control">
                        @if(isset($data->chat_image)) <img src="{{ asset('/upload/'.$data->chat_image) }}" width="10%" /> @endif
                        <input type="hidden" name="old_image_chat" value="@if(isset($data->chat_image)) {{ $data->chat_image }} @endif">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
