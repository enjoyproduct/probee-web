@extends("admin/admin_app")


@section("js")


    <script type="text/javascript" src="{{ URL::asset('admin_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin_assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('admin_assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin_assets/js/pages/users.js') }}"></script>

@endsection


@section("content")
<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i><span class="text-semibold">Supports</span></h4>
                </div>
            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{ URL::to('/admin/support/') }}"><i class="icon-home2 position-left"></i> Supports</a></li>
                </ul>

                <ul class="breadcrumb-elements">
                </ul>
            </div>
        </div>
    <!-- /page header -->
    
    <!-- Content area -->
    <div class="content">

        <div class="panel panel-flat">
            <div class="panel-body">
                <!-- Error Message -->
                @if (count($errors) > 0)
                    <div class="alert alert-danger no-border">
                        <ul>
                            <button type="button" class="close" data-dismiss="alert"><span>Ã—</span><span class="sr-only">Close</span></button>
                            @foreach ($errors->all() as $error)
                                <li>
                                    <span class="text-semibold">{{ $error }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Success Message -->
                @if(Session::has('flash_message'))
                    <div class="alert alert-success no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>Ã—</span><span class="sr-only">Close</span></button>
                        <span class="text-semibold">{{ Session::get('flash_message') }}</span>
                    </div>
                @endif
            
                <table class="table datatable-show-all datatable-selection-single datatable-selection-multiple table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($supports as $i => $support)
                    <tr>
                        <td>{{$i + 1}}</td>
                        <td>{{$support->question}}</td>
                        <td>{{$support->answer}}</td>
                       <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{URL::to('admin/support/' . $support->support_id . '/edit')}}">Edit</a></li>
                                        <li><a href="{{URL::to('admin/support/' . $support->support_id . '/delete')}}" onclick="return confirm('Do you want to delete this support?')">Delete</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /content area -->

</div>
<!-- /main content -->
@endsection


