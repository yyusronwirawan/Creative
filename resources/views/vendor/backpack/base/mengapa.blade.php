@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Mengapa
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Mengapa</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Update Mengapa
                </div>

                <div class="box-body">
                    <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/mengapa/update') }}" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input name="title" class="form-control" value="@if(isset($data->title)){{ $data->title }}@endif">
                      </div>
                      <div class="form-group @if($errors->has('image')) has-error @endif">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="image" class="form-control">
                        @if(isset($data->image)) <img src="{{ asset('/upload/'.$data->image) }}" width="10%" /> @endif
                        <input type="hidden" name="old_image" value="@if(isset($data->image)) {{ $data->image }} @endif">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea name="description" class="form-control my-editor">@if(isset($data->description)) {{ $data->description }} @endif</textarea>
                      </div>

                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
