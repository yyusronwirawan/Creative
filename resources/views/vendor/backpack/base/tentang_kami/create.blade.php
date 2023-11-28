@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Tentang Kami
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Tentang Kami</li>
      </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Create Tentang Kami
                </div>

                <div class="box-body">
                    <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/tentang_kami/insert') }}" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      <div class="form-group @if($errors->has('title')) has-error @endif">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" class="form-control">
                        @if($errors->has('title')) <span class="help-block">{{ $errors->first('title') }}</span>  @endif
                      </div>
                      <div class="form-group @if($errors->has('image')) has-error @endif">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="image" class="form-control" required="required">
                        @if($errors->has('image')) <span class="help-block">{{ $errors->first('image') }}</span>  @endif
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Description</label>
                          <textarea name="description" class="form-control my-editor"></textarea>
                      </div>

                      <!-- <div class="form-group @if($errors->has('link')) has-error @endif">
                        <label for="exampleInputEmail1">Link</label>
                        <input type="text" name="link" class="form-control">
                      </div> -->
                    
                  
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
