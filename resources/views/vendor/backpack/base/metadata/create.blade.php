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
                    Add Metadata
                </div>

                <div class="box-body">
                    @include('vendor.backpack.base.inc.alert')
                    <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/metadata/insert') }}">
                      {!! csrf_field() !!}
                      <div class="form-group @if($errors->has('title')) has-error  @endif">
                        <label for="exampleInputEmail1">Page</label>
                        <input type="text" name="page" class="form-control">
                      </div>

                      <div class="form-group @if($errors->has('link')) has-error  @endif">
                        <label for="exampleInputEmail1">Link</label>
                        <input type="text" name="link" class="form-control">
                      </div>

                      <!-- <div class="form-group @if($errors->has('title')) has-error  @endif">
                        <label for="exampleInputEmail1">H1</label>
                        <input type="text" name="h1" class="form-control">
                      </div> -->

                      <div class="form-group @if($errors->has('title')) has-error  @endif">
                        <label for="exampleInputEmail1">Page Search Title</label>
                        <input type="text" name="title" class="form-control">
                      </div>

                      <div class="form-group @if($errors->has('description')) has-error  @endif">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                      </div>
                      
                      <div class="form-group @if($errors->has('keyword')) has-error  @endif">
                        <label for="exampleInputEmail1">Keyword</label>
                        <textarea name="keyword" class="form-control"></textarea>
                      </div>

                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
