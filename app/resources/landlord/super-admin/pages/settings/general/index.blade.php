@extends('landlord.super-admin.layouts.master')
@section('landlord-content')

<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <form action="{{ route('setting.general.update') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header d-flex align-items-center" data-toggle="collapse" href="#gs_collapse" aria-expanded="true" aria-controls="gs_collapse">
                        <h4 class="d-flex justify-content-between w-100">{{trans('file.General Setting')}} <i class="icon dripicons-chevron-up"></i></h4>
                    </div>
                    <div class="card-body collapse show" id="gs_collapse">
                        <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('file.System Title')}} *</label>
                                    {{-- <input type="text" name="site_title" class="form-control" value="@if(isset($lims_general_setting_data)){{$lims_general_setting_data->site_title}}@endif" required /> --}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('file.System Logo')}} *</label>
                                    <input type="file" name="site_logo" class="form-control" value=""/>
                                </div>
                                @if($errors->has('site_logo'))
                                <span>
                                    <strong>{{ $errors->first('site_logo') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('file.Phone Number')}} *</label>
                                    {{-- <input type="text" name="phone" class="form-control" value="@if(isset($lims_general_setting_data)){{$lims_general_setting_data->phone}}@endif" required /> --}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('file.Email')}} *</label>
                                    <input type="text" name="email" class="form-control" value="@if(isset($lims_general_setting_data)){{$lims_general_setting_data->email}}@endif" required />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>{{trans('file.Free Trial Limit')}} *</label>
                                    <input type="number" name="free_trial_limit" class="form-control" value="@if(isset($lims_general_setting_data)){{$lims_general_setting_data->free_trial_limit}}@endif" required />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>{{trans('file.Currency Code')}} *</label>
                                    <input type="text" name="currency" class="form-control" value="@if(isset($lims_general_setting_data)){{$lims_general_setting_data->currency}}@endif" required />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Frontend Layout</label>
                                    <div class="form-check">
                                        <input name="frontend_layout" id="regular" class="form-check-input" type="radio" value="regular" @if(isset($lims_general_setting_data) && $lims_general_setting_data->frontend_layout == 'regular') checked @endif required>
                                        <label class="form-check-label" for="regular">
                                            Regular
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="frontend_layout" id="custom" class="form-check-input" type="radio" value="custom" @if(isset($lims_general_setting_data) && $lims_general_setting_data->frontend_layout == 'custom') checked @endif  required>
                                        <label class="form-check-label" for="custom">
                                            Custom
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('file.Date Format')}} *</label>
                                    @if(isset($lims_general_setting_data))
                                    <input type="hidden" name="date_format_hidden" value="{{isset($lims_general_setting_data) && $lims_general_setting_data->date_format}}">
                                    @endif
                                    <select name="date_format" class="selectpicker form-control">
                                        <option value="d-m-Y"> dd-mm-yyy</option>
                                        <option value="d/m/Y"> dd/mm/yyy</option>
                                        <option value="d.m.Y"> dd.mm.yyy</option>
                                        <option value="m-d-Y"> mm-dd-yyy</option>
                                        <option value="m/d/Y"> mm/dd/yyy</option>
                                        <option value="m.d.Y"> mm.dd.yyy</option>
                                        <option value="Y-m-d"> yyy-mm-dd</option>
                                        <option value="Y/m/d"> yyy/mm/dd</option>
                                        <option value="Y.m.d"> yyy.mm.dd</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('file.Developed By')}}</label>
                                    <input type="text" name="developed_by" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary">
                        </div>
                    </div>
                </div>

            </form>
        </div>
        </div>
    </div>
</section>





@endsection
