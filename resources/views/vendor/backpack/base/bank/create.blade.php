@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Bank
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Bank</li>
      </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Create Bank
                </div>

                <div class="box-body">
                    <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/bank/insert') }}" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      <div class="form-group @if($errors->has('bank')) has-error @endif">
                        <label for="exampleInputEmail1">Bank</label>
                        <input type="text" name="bank" class="form-control">
                        @if($errors->has('bank')) <span class="help-block">{{ $errors->first('bank') }}</span>  @endif
                      </div>
                      <div class="form-group @if($errors->has('image')) has-error @endif">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="image" class="form-control" required="required">
                        @if($errors->has('image')) <span class="help-block">{{ $errors->first('image') }}</span>  @endif
                      </div>
                    
                  
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
