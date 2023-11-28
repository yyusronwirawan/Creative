@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Design
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Design</li>
      </ol>
    </section>
@endsection

@section('content')
    <div class="row">
      <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/design/insert') }}" enctype="multipart/form-data">
                      {!! csrf_field() !!}
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Design Information
                </div>
                
                <div class="box-body">
                      <div class="col-md-6">
                        <div class="form-group @if($errors->has('name')) has-error @endif">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" name="name" class="form-control">
                          @if($errors->has('name')) <span class="help-block">{{ $errors->first('name') }}</span>  @endif
                        </div>

                        
                        <div id="block-images">
                        <div class="form-inline" style="margin-bottom: 10px;">
                          <label for="exampleInputEmail1">Image</label><br>
                          <input type="file" name="image[]" class="form-control" required="required">
                          
                        </div>

                        </div>
                        <button type="button" class="btn btn-success" data-count="1" id="addimages">Add Image</button>
                        <input type="hidden" name="total_images" id="total_images" value="1">
                        <br><br>
                        
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Description</label>
                          <textarea name="description" class="form-control my-editor"></textarea>
                        </div>

                    
                      </div>
                    
                </div>
            </div>
        </div>


        <div class="col-md-12">
          <div class="box-footer clearfix">
            <button type="submit" class="btn btn-lg btn-primary">Save</button>
          </div>
        </div>
      </form>
    </div>
@endsection

@section('after_scripts')
  <script>

        $('#addimages').click(function(){
            getCount = $(this).data('count')+1;
            $(this).data('count', getCount);
            $('#total_images').val(getCount);
            $('#block-images').append('<div class="form-inline" style="margin-bottom: 10px;">\
                                      <input type="file" class="form-control image" placeholder="image" name="image[]">\
                                      <button type="button" class="btn btnDelete btn-danger">Delete</button>\
                                     </div>');
          $('.btnDelete').click(function(){
            $(this).closest('.form-inline').remove();
          })


        });

    </script>
@endsection
