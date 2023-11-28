@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Metadata
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Metadata</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Edit Metadata
                </div>

                <div class="box-body">
                    @include('vendor.backpack.base.inc.alert')
                    <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/metadata/update') }}">
                      {!! csrf_field() !!}
                      <div class="form-group @if($errors->has('page')) has-error  @endif">
                        <label for="exampleInputEmail1">Page</label>
                        <input type="text" name="page" class="form-control" value="{{ $data->page }}">
                        @if($errors->has('page')) <span class="help-block">{{ $errors->first('page') }}</span>  @endif
                      </div>

                      <div class="form-group @if($errors->has('link')) has-error  @endif">
                        <label for="exampleInputEmail1">Link</label>
                        <input type="text" name="link" value="{{ $data->link }}" class="form-control">
                      </div>

                     <!--  <div class="form-group @if($errors->has('h1')) has-error  @endif">
                        <label for="exampleInputEmail1">H1</label>
                        <input type="text" name="h1" class="form-control" value="{{ $data->h1 }}">
                        @if($errors->has('h1')) <span class="help-block">{{ $errors->first('h1') }}</span>  @endif
                      </div>
 -->
                      <div class="form-group @if($errors->has('title')) has-error  @endif">
                        <label for="exampleInputEmail1">Page Search Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $data->title }}">
                        @if($errors->has('title')) <span class="help-block">{{ $errors->first('title') }}</span>  @endif
                      </div>

                      <div class="form-group @if($errors->has('description')) has-error  @endif">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea name="description" class="form-control">{{ $data->description }}</textarea>
                        @if($errors->has('description')) <span class="help-block">{{ $errors->first('description') }}</span>  @endif
                      </div>

                      <div class="form-group @if($errors->has('keyword')) has-error  @endif">
                        <label for="exampleInputEmail1">Keyword</label>
                        <textarea name="keyword" class="form-control">{{ $data->keyword }}</textarea>
                        @if($errors->has('keyword')) <span class="help-block">{{ $errors->first('keyword') }}</span>  @endif
                      </div>

 
                      <input type="hidden" name="id" value="{{ $data->id }}">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
