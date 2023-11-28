@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Testimonial
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Testimonial</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Update Testimonial
                </div>

                <div class="box-body">
                    <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/testimonial/update') }}" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      <div class="form-group @if($errors->has('name')) has-error @endif">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" value="{{ $data->name }}" class="form-control">
                        @if($errors->has('name')) <span class="help-block">{{ $errors->first('name') }}</span>  @endif
                      </div>
                      <div class="form-group @if($errors->has('description')) has-error @endif">
                        <label for="exampleInputEmail1">Testimonial</label>
                        <textarea name="testimonial" class="form-control my-editor">{{ $data->testimonial }}</textarea>
                      </div>
 
                      <input type="hidden" name="id" value="{{ $data->id }}">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
