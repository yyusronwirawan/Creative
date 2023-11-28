@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Cara Kerja
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Cara Kerja</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Update Cara Kerja
                </div>

                <div class="box-body">
                    <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/cara_kerja/update') }}" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      <div class="form-group @if($errors->has('title')) has-error @endif">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" value="{{ $data->title }}" class="form-control">
                        @if($errors->has('title')) <span class="help-block">{{ $errors->first('title') }}</span>  @endif
                      </div>
                      <div class="form-group @if($errors->has('image')) has-error @endif">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="image" class="form-control">
                        <img src="{{ asset('/upload/'.$data->image) }}" width="40%" />
                        @if($errors->has('image')) <span class="help-block">{{ $errors->first('image') }}</span>  @endif
                        <input type="hidden" name="old_image" value="{{ $data->image }}">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Description</label>
                          <textarea name="description" class="form-control my-editor">{{ $data->description }}</textarea>
                      </div>
                    <!--   <div class="form-group">
                        <label for="exampleInputEmail1">Link</label>
                        <input type="text" name="link" value="{{ $data->link }}" class="form-control">
                      </div> -->
                    

                      <input type="hidden" name="id" value="{{ $data->id }}">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
