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
                    <h4><i class="icon-arrow-left52 position-left"></i><span class="text-semibold">Users</span></h4>
                </div>
            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{ URL::to('/admin/users')}}"><i class="icon-home2 position-left"></i>Users</a></li>
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
                                <form class="form-horizontal" action="@if (isset($user)) {{url('/admin/users/'.$user->user_id.'/update')}} @endif" enctype="multipart/form-data" method="post">
                                    {{csrf_field()}}

                                   
                                    <!-- <fieldset>
                                        <div class="form-group">
                                            <img src="{{$user->photo}}" class="photo" style="width:150px;height:150px;">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Photo</label>
                                            <div class="col-lg-10">

                                                <input type="file"  class="file-input" name="photo" accept=".png, .jpg" data-allowed-file-extensions='["png", "jpg"]' data-show-caption="true" @if (!isset($user)) required @endif>
                                            </div>
                                        </div>
                                    </fieldset> -->

                                  
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Name</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="fullname" placeholder="Name" value="{{ isset($user) ? $user->fullname : old('')}}" required>
                                                @if ($errors->has('fullname'))
                                                    <span class="help-block">{{ $errors->first('fullname') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Email</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="email" placeholder="email" value="{{ isset($user) ? $user->email : old('email')}}" required>
                                                @if ($errors->has('email'))
                                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Birthday</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="birthday" placeholder="yyyy-mm-dd" value="{{ isset($user) ? $user->birthday : old('birthday')}}" required>
                                                @if ($errors->has('birthday'))
                                                    <span class="help-block">{{ $errors->first('birthday') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                           <label class="control-label col-lg-2">Gender</label>
                                            <div class="col-lg-10">
                                                <select name="gender" class="select_nric form-control">
                                                    <option @if (isset($user) && $user->gender == '0') selected="selected" @endif  value="0">Male</option>
                                                    <option @if (isset($user) && $user->gender == '1') selected="selected" @endif value="1">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Home Address</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="home_address" placeholder="Home Address" value="{{ isset($user) ? $user->home_address : old('home_address')}}" required>
                                                @if ($errors->has('home_address'))
                                                    <span class="help-block">{{ $errors->first('home_address') }}</span>
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
                                                            <option @if (isset($user) && $user->city_id == $city->city_id) selected="selected" @endif value="{{$city->city_id}}">{{$city->country.'/'.$city->city}}</option>
                                                        @endforeach
                                                    @endif
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Reminder Enable</label>
                                            <div class="col-lg-10">
                                                <select name="push_enable" class="select_nric form-control">
                                                    <option @if (isset($user) && $user->reminder_enable == '1') selected="selected" @endif  value="0">Enable</option>
                                                    <option @if (isset($user) && $user->reminder_enable == '0') selected="selected" @endif value="1">Disable</option>
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



