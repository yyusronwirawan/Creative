@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
<style>
  .info-box{
    min-height: 0;
  }
  .info-box-content {
    margin-left: 0;
  }
  .info-box-text {
    font-size: 13px;
  }
  .grabbable {
    cursor: move; /* fallback if grab cursor is unsupported */
    cursor: grab;
    cursor: -moz-grab;
    cursor: -webkit-grab;
}

 /* (Optional) Apply a "closed-hand" cursor during drag operation. */
.grabbable:active {
    cursor: grabbing;
    cursor: -moz-grabbing;
    cursor: -webkit-grabbing;
}
</style>
      <div class="row">
        <div class="col-md-6">
          <div class="box box-default">

                <div class="box-body">
                    <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/logo/update') }}" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      <div class="form-group @if($errors->has('image')) has-error @endif">
                        <label for="exampleInputEmail1">Logo</label><br>

                        <img src="{{ asset('/upload/'.$logo->image) }}" width="40%" /><br><br>
                        <input type="file" name="image" class="form-control">
                        @if($errors->has('image')) <span class="help-block">{{ $errors->first('image') }}</span>  @endif
                        <input type="hidden" name="old_image" value="{{ $logo->image }}">
                      </div>

                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
          </div>
        </div>
        <div class="col-md-6">
            <div class="box box-default">

                <div class="box-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover datatable">
                            <thead>
                                <tr class="nosortable">
                                    <th class="table-actions">Actions</th>
                                    <th>Menu</th>
                                    <th>Link</th>
                                </tr>
                            </thead>
                            <tbody id="element-order" class="sortable-treatment grabbable">
                            
                              @foreach ($menu as $content)
                                <tr data-element-id='{{ $content->id }}' data-sort='{{ $content->sort }}'>
                                    <td>
                                       <div class="table-actions-hover">
                                            <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/menu/edit/'.$content->id) }}"><i class="fa fa-pencil fa-fw"></i></a>
                                            <!-- <a onclick="return confirm('Are you sure ?');" href="{{ url(config('backpack.base.route_prefix', 'admin').'/metadata/delete/'.$content->id) }}"><i class="fa fa-trash fa-fw"></i></a> -->
                                        </div>
                                    </td>
                                    <td>{{ $content->menu }}</td>
                                    <td>{{ $content->link }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
            </div>
        </div>
      </div>
      <br>
      



@endsection
@section('after_scripts')
<script src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
    $('.sortable-treatment').sortable({
        
        items: "tr:not(.nosortable)",
        placeholder: "ui-state-highlight",
        update: function( event, ui ) {
            
        },
        stop: function( event, ui ) {
            var sortOrder = 1;
            
            $('#element-order > tr').each(function(){
                thiselem = $(this);
                oldsort = thiselem.data('sort');
                event_banner_id = thiselem.data('event-banner-id');
                maincontent_id = thiselem.data('element-id');
                var token = '{{ csrf_token() }}';
                $.ajax({
                    type: 'POST',
                    url: "{{ url(config('backpack.base.route_prefix').'/menu/update_sort') }}",
                    data: '&maincontent_id='+maincontent_id+
                            '&oldsort='+oldsort+
                            '&newsort='+sortOrder+
                            '&_token= '+token,
                    cache : false,
                    success: function(msg){
                    },
                    error: function(msg){
                        console.log(msg);
                    }
                });
                thiselem.data('sort', sortOrder);
                thiselem.find('td.prece').text(sortOrder);
                
                sortOrder++;
            });
            
        }
        
    });
</script>
@endsection