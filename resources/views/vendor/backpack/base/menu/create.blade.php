@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Menu
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Menu</li>
      </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Create menu
                </div>

                <div class="box-body">
                    <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/menu/insert') }}" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      <div class="form-group @if($errors->has('menu')) has-error @endif">
                        <label for="exampleInputEmail1">Menu</label>
                        <input type="text" name="menu" class="form-control">
                        @if($errors->has('menu')) <span class="help-block">{{ $errors->first('menu') }}</span>  @endif
                      </div>

                      <div class="form-group @if($errors->has('link')) has-error @endif">
                        <label for="exampleInputEmail1">Link</label>
                        <input type="text" name="link" class="form-control">
                      </div>

                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
