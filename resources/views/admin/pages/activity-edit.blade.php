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
                    <h4><i class="icon-arrow-left52 position-left"></i><span class="text-semibold">Activities</span></h4>
                </div>
            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{ URL::to('/admin/activities')}}"><i class="icon-home2 position-left"></i>Activities</a></li>
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
                                <form class="form-horizontal" action="@if (isset($activity)) {{url('/admin/activities/'.$activity->activity_id.'/update')}} @endif" enctype="multipart/form-data" method="post">
                                    {{csrf_field()}}

                                  
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Pass</label>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" name="pass" placeholder="0" value="{{ isset($activity) ? $activity->pass : old('')}}" required>
                                                @if ($errors->has('pass'))
                                                    <span class="help-block">{{ $errors->first('pass') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Price</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="price" placeholder="0.00" value="{{ isset($activity) ? $activity->price : old('price')}}" required>
                                                @if ($errors->has('price'))
                                                    <span class="help-block">{{ $errors->first('price') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Cancellation Deadline</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="cancellation_deadline" placeholder="2017-00-00 00:00:00" value="{{ isset($activity) ? $activity->cancellation_deadline : old('cancellation_deadline')}}" required>
                                                @if ($errors->has('cancellation_deadline'))
                                                    <span class="help-block">{{ $errors->first('cancellation_deadline') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                           <label class="control-label col-lg-2">Difficulty Level</label>
                                            <div class="col-lg-10">
                                                <select name="defficult_level" class="select_nric form-control">
                                                    <option @if (isset($activity) && $activity->defficult_level == 'Easy') selected="selected" @endif  value="Easy">Easy</option>
                                                    <option @if (isset($activity) && $activity->defficult_level == 'Medium') selected="selected" @endif value="Medium">Medium</option>
                                                    <option @if (isset($activity) && $activity->defficult_level == 'Difficult') selected="selected" @endif value="Difficult">Difficult</option>
                                                </select>
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



