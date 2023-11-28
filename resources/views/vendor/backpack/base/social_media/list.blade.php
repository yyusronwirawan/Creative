@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Social Media
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Social Media</li>
      </ol>
    </section>
@endsection


@section('content')
<style>
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
        <div class="col-md-12">
            <div class="box box-default">

                <div class="box-header with-border">
                    @include('vendor.backpack.base.inc.alert')
                    <div class="box-title"><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/social_media/create') }}" class="btn btn-success">Create Social Media</a></div>
                </div>

                <div class="box-body">
                    <div class="dataTable_wrapper">
                        <table id="dataTable" class="table table-striped table-bordered table-hover datatable">
                            <thead>
                                <tr class="nosortable">
                                    <th class="table-actions">Actions</th>
                                    <th width="200">link</th>
                                    <th>Image</th>
                                    <!-- <th>Status</th> -->
                                    <th width="150">Created Date</th>
                                </tr>
                            </thead>
                            <tbody id="element-order" class="sortable-treatment grabbable">
                              @foreach ($data as $content)
                                <tr data-element-id='{{ $content->id }}' data-sort='{{ $content->sort }}'>
                                    <td>
                                       <div class="table-actions-hover">
                                            <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/social_media/edit/'.$content->id) }}"><i class="fa fa-pencil fa-fw"></i></a>
                                            <a onclick="return confirm('Are you sure ?');" href="{{ url(config('backpack.base.route_prefix', 'admin').'/social_media/delete/'.$content->id) }}"><i class="fa fa-trash fa-fw"></i></a>
                                        </div>
                                    </td>
                                    <td>{{ $content->link }}</td>
                                    <td>
                                        <img src="{{ asset('/upload/'.$content->image) }}" width="40%"/>
                                    </td>
                                    <!-- <td><?php if($content->status == 0){ ?><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/social_media/status/'.$content->id.'/1') }}">Inactive</a><?php  }else{ ?><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/social_media/status/'.$content->id.'/0') }}">Active</a><?php } ?></td>
                                    --><td>{{ $content->created_at }}</td> 
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
                event_social_media_id = thiselem.data('event-social_media-id');
                maincontent_id = thiselem.data('element-id');
                var token = '{{ csrf_token() }}';
                $.ajax({
                    type: 'POST',
                    url: "{{ url(config('backpack.base.route_prefix').'/social_media/update_sort') }}",
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