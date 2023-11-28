@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Change Password
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Change Password</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Change Password
                </div>

                <div class="box-body">
                  @if(Session::has('change_success'))
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> {{ Session::get('change_success') }}</h4>
                  </div>
                  @endif
                    <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/auth/update') }}">
                      {!! csrf_field() !!}
                      <div class="form-group @if(Session::has('change_fail')) has-error  @endif">
                        <label for="exampleInputEmail1">Current Password</label>
                        <input type="password" name="old_password" class="form-control" value="{{ old('old_password') }}">
                        @if(Session::has('change_fail')) <span class="help-block">{{ Session::get('change_fail') }}</span>  @endif
                      </div>
                      <div class="form-group @if($errors->has('password')) has-error  @endif">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" name="password" class="form-control" >
                        @if($errors->has('password')) <span class="help-block">{{ $errors->first('password') }}</span>  @endif
                      </div>
                      <div class="form-group @if($errors->has('password_confirmation')) has-error  @endif">
                        <label for="exampleInputEmail1">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                        @if($errors->has('password_confirmation')) <span class="help-block">{{ $errors->first('password_confirmation') }}</span>  @endif
                      </div>
                  
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
