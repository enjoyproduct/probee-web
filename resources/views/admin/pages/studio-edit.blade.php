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
                    <h4><i class="icon-arrow-left52 position-left"></i><span class="text-semibold">Studios</span></h4>
                </div>
            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{ URL::to('/admin/studios')}}"><i class="icon-home2 position-left"></i>Studios</a></li>
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
                                <form class="form-horizontal" action="@if (isset($studio)) {{url('/admin/studios/'.$studio->studio_id.'/update')}} @endif" enctype="multipart/form-data" method="post">
                                    {{csrf_field()}}

                                    <fieldset>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Studio Name</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="studio_name" placeholder="Name" value="{{ isset($studio) ? $studio->studio_name : old('')}}" required>
                                                @if ($errors->has('studio_name'))
                                                    <span class="help-block">{{ $errors->first('studio_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Phone Number</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" value="{{ isset($studio) ? $studio->phone_number : old('phone_number')}}" required>
                                                @if ($errors->has('phone_number'))
                                                    <span class="help-block">{{ $errors->first('phone_number') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Latitude</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="latitude" placeholder="Latitude" value="{{ isset($studio) ? $studio->latitude : old('latitude')}}" required>
                                                @if ($errors->has('latitude'))
                                                    <span class="help-block">{{ $errors->first('latitude') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Longitude</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="longitude" placeholder="Longitude" value="{{ isset($studio) ? $studio->longitude : old('longitude')}}" required>
                                                @if ($errors->has('longitude'))
                                                    <span class="help-block">{{ $errors->first('longitude') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Address</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="address" placeholder="Home Address" value="{{ isset($studio) ? $studio->address : old('address')}}" required>
                                                @if ($errors->has('address'))
                                                    <span class="help-block">{{ $errors->first('address') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">City</label>
                                            <div class="col-lg-10">
                                                <select name="role" class="select_nric form-control">
                                                    @if (isset($cities)) 
                                                        @foreach ($cities as $city)
                                                            <option @if (isset($studio) && $studio->city_id == $city->city_id) selected="selected" @endif value="{{$city->city_id}}">{{$city->country.'/'.$city->city}}</option>
                                                        @endforeach
                                                    @endif
                                                    
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



