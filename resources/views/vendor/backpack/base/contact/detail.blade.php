@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Contact Us
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Contact Us</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Detail Contact Us
                </div>

                <div class="box-body">
                      <div class="form-group @if($errors->has('email')) has-error  @endif">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="email" class="form-control" required="required" value="{{ $data->email }}" disabled>
                        @if($errors->has('email')) <span class="help-block">{{ $errors->first('email') }}</span>  @endif
                      </div>
                      <div class="form-group @if($errors->has('first_name')) has-error  @endif">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" name="first_name" class="form-control" required="required" value="{{ $data->first_name }}" disabled>
                        @if($errors->has('first_name')) <span class="help-block">{{ $errors->first('first_name') }}</span>  @endif
                      </div>
                      <div class="form-group @if($errors->has('last_name')) has-error  @endif">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" name="last_name" class="form-control" required="required" value="{{ $data->last_name }}" disabled>
                        @if($errors->has('last_name')) <span class="help-block">{{ $errors->first('last_name') }}</span>  @endif
                      </div>
                      <div class="form-group @if($errors->has('phone_number')) has-error  @endif">
                        <label for="exampleInputEmail1">Phone Number</label>
                        <textarea type="text" name="phone_number" required="required" class="form-control" disabled>{{ $data->phone }}</textarea>
                        @if($errors->has('phone')) <span class="help-block">{{ $errors->first('phone') }}</span>  @endif
                      </div>
                      <div class="form-group @if($errors->has('message')) has-error  @endif">
                        <label for="exampleInputEmail1">Message</label>
                        <textarea name="message" class="form-control" required="required" disabled>{{ $data->message }}</textarea>
                        @if($errors->has('message')) <span class="help-block">{{ $errors->first('message') }}</span>  @endif
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
