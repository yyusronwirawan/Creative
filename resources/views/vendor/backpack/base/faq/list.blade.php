@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        FAQ
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">FAQ</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">

                <div class="box-header with-border">
                    @include('vendor.backpack.base.inc.alert')
                    <div class="box-title"><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/faq/create') }}" class="btn btn-success">Create FAQ</a></div>
                </div>

                <div class="box-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover datatable">
                            <thead>
                                <tr class="nosortable">
                                    <th class="table-actions">Actions</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <!-- <th>Category</th>
                                    <th>Status</th> -->
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody id="element-order">
                              @foreach ($data as $content)
                                <tr>
                                    <td>
                                       <div class="table-actions-hover">
                                            <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/faq/edit/'.$content->id) }}"><i class="fa fa-pencil fa-fw"></i></a>
                                            <a onclick="return confirm('Are you sure ?');" href="{{ url(config('backpack.base.route_prefix', 'admin').'/faq/delete/'.$content->id) }}"><i class="fa fa-trash fa-fw"></i></a>
                                        </div>
                                    </td>
                                    <td>{{ strip_tags($content->question) }}</td>
                                    <td>{{ strip_tags($content->answer) }}</td>
                                    <!-- <td>{{ $content->faq_category ? $content->faq_category->name : '' }}</td>
                                    <td><?php echo ($content->status == 1 ? 'Active' : 'Inactive'); ?></td> -->
                                    <td>{{ $content->created_at }}</td>
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
