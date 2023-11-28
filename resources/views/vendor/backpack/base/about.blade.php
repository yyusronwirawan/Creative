@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        About
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">About</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Update About
                </div>

                <div class="box-body">
                    <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/about/update') }}" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      <div class="form-group">
                        <label for="exampleInputEmail1">Content</label>
                        <textarea name="content" class="form-control my-editor">@if(isset($data->content)) {{ $data->content }} @endif</textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
