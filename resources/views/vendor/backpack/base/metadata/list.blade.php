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
                    @include('vendor.backpack.base.inc.alert')
                    <div class="box-title"><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/metadata/create') }}" class="btn btn-success">Create Metadata</a></div>
                </div>

                <div class="box-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover datatable">
                            <thead>
                                <tr class="nosortable">
                                    <th class="table-actions">Actions</th>
                                    <th>Page</th>
                                    <th>Link</th>
                                    <!-- <th>H1</th> -->
                                    <th>Page Search Title</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody id="element-order">
                            
                              @foreach ($data as $content)
                                <tr>
                                    <td>
                                       <div class="table-actions-hover">
                                            <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/metadata/edit/'.$content->id) }}"><i class="fa fa-pencil fa-fw"></i></a>
                                            <!-- <a onclick="return confirm('Are you sure ?');" href="{{ url(config('backpack.base.route_prefix', 'admin').'/metadata/delete/'.$content->id) }}"><i class="fa fa-trash fa-fw"></i></a> -->
                                        </div>
                                    </td>
                                    <td>{{ $content->page }}</td>
                                    <td>{{ $content->link }}</td>
                                    <!-- <td>{{ $content->h1 }}</td> -->
                                    <td>{{ $content->title }}</td>
                                    <td>{{ $content->description }}</td>
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
