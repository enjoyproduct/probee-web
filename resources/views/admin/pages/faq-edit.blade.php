@extends("admin/admin_app")


@section("js")
    <script type="text/javascript" src="{{ URL::asset('admin_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin_assets/js/plugins/forms/styling/switch.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin_assets/js/plugins/uploaders/fileinput.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('admin_assets/js/core/app.js') }}"></script>

    <script type="text/javascript">
        $(function(){
            // Basic example
            $('.file-input').fileinput({
                browseLabel: 'Browse',
                browseIcon: '<i class="icon-file-plus"></i>',
                uploadIcon: '<i class="icon-file-upload2"></i>',
                removeIcon: '<i class="icon-cross3"></i>',
                showUpload: false,
                layoutTemplates: {
                    icon: '<i class="icon-file-check"></i>'
                },
                initialCaption: "No file selected"
            });
            $('.file-input').change(function () {
               $('.photo').attr('hidden', true);
            });
        });
    </script>
    
    @endsection


@section("content")
    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i><span class="text-semibold">FAQ</span></h4>
                </div>
            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{ URL::to('/admin/faq')}}"><i class="icon-home2 position-left"></i>FAQ</a></li>
                </ul>

                
            </div>
        </div>
        <!-- /page header -->

        <!-- Content area -->
        <div class="content">
            <!-- Error Message -->
            @if (count($errors) > 0)
                <div class="alert alert-danger no-border">
                    <ul>
                        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
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
                        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                        <span class="text-semibold">{{ Session::get('flash_message') }}</span>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-8">
                        <div class="panel panel-flat">
                            <div class="panel-body">
                                <form class="form-horizontal" action="@if (isset($faq)) {{url('/admin/faq/'.$faq->faq_id.'/update')}} @else {{url('/admin/faq/create')}} @endif" enctype="multipart/form-data" method="post">
                                    {{csrf_field()}}

                                  
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Question</label>
                                            <div class="col-md-10">
                                                <input type="textarea" class="form-control" name="question" placeholder="Question" value="{{ isset($faq) ? $faq->question : old('')}}" required>
                                                @if ($errors->has('question'))
                                                    <span class="help-block">{{ $errors->first('question') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Answer</label>
                                            <div class="col-md-10">
                                                <input type="textarea" class="form-control" name="answer" placeholder="Answer" value="{{ isset($faq) ? $faq->answer : old('')}}" required>
                                                @if ($errors->has('answer'))
                                                    <span class="help-block">{{ $errors->first('answer') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary"> Save<i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->
@endsection



