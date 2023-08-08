<div class="tab-pane fade show active" id="generalSetting" role="tabpanel" aria-labelledby="general-setting">
    <div class="card">
        <h4 class="card-header p-3"><b>@lang('file.General Setting')</b></h4>
        <hr>
        <div class="card-body">
            <form id="generalSettingSubmit" action="{{ route('setting.general.manage') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    @include('landlord.super-admin.partials.input-field',[
                        'colSize' => 6,
                        'labelName' => 'Site Title',
                        'fieldType' => 'text',
                        'nameData' => 'site_title',
                        'placeholderData' => 'PeopleProSAAS',
                        'isRequired' => true,
                        'valueData'=> isset($generalSetting->site_title) ? $generalSetting->site_title : null
                    ])
                    @include('landlord.super-admin.partials.input-field',[
                        'colSize' => 6,
                        'labelName' => 'Email',
                        'fieldType' => 'text',
                        'nameData' => 'email',
                        'placeholderData' => 'support@lion-coders.com',
                        'isRequired' => true,
                        'valueData'=> isset($generalSetting->email) ? $generalSetting->email : null
                    ])

                    @include('landlord.super-admin.partials.input-field',[
                        'colSize' => 6,
                        'labelName' => 'Phone Number',
                        'fieldType' => 'text',
                        'nameData' => 'phone',
                        'placeholderData' => '+880182XXXXXXX',
                        'isRequired' => true,
                        'valueData'=>  isset($generalSetting->phone) ? $generalSetting->phone : null
                    ])
                    @include('landlord.super-admin.partials.input-field',[
                        'colSize' => 6,
                        'labelName' => 'Free Trial Limit',
                        'fieldType' => 'number',
                        'nameData' => 'free_trial_limit',
                        'placeholderData' => '5',
                        'isRequired' => true,
                        'valueData'=> isset($generalSetting->free_trial_limit) ? $generalSetting->free_trial_limit : null

                    ])
                    @include('landlord.super-admin.partials.input-field',[
                        'colSize' => 6,
                        'labelName' => 'Currency Code',
                        'fieldType' => 'text',
                        'nameData' => 'currency_code',
                        'placeholderData' => 'USD',
                        'isRequired' => true,
                        'valueData'=> isset($generalSetting->currency_code) ? $generalSetting->currency_code : null
                    ])



                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">{{trans("file.Date Format")}}  </label>
                            <select name="date_format" class="selectpicker form-control">
                                @foreach ($dateFormat as $key => $item)
                                    <option value="{{ $key }}" {{ $generalSetting->date_format === $key ? 'selected' : ''}}>{{ $item }}</option>

                                @endforeach
                                {{-- <option value="d-m-Y" {{ $generalSetting->date_format === 'd-m-Y' ? 'selected' : ''}}>dd-mm-yyyy(23-05-2020)</option>
                                <option value="Y-m-d" {{ $generalSetting->date_format === 'Y-m-d' ? 'selected' : ''}}>yyyy-mm-dd(2020-05-23)</option>
                                <option value="m/d/Y" {{ $generalSetting->date_format === 'm/d/Y' ? 'selected' : ''}}>mm/dd/yyyy(05/23/2020)</option>
                                <option value="Y/m/d" {{ $generalSetting->date_format === 'Y/m/d' ? 'selected' : ''}}>yyyy/mm/dd(2020/05/23)</option>
                                <option value="Y-M-d" {{ $generalSetting->date_format === 'Y-M-d' ? 'selected' : ''}}>yyyy-MM-dd(2020-May-23)</option>
                                <option value="M-d-Y" {{ $generalSetting->date_format === 'M-d-Y' ? 'selected' : ''}}>MM-dd-yyyy(May-23-2020)</option>
                                <option value="d-M-Y" {{ $generalSetting->date_format === 'd-M-Y' ? 'selected' : ''}}>dd-MM-yyyy(23-May-2020)</option> --}}
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">{{trans("file.Time Zone")}}  </label>
                            <select name="time_zone" class="selectpicker form-control">
                                @foreach($timeZones as $zone)
                                    <option value="{{$zone['zone']}}" {{ $generalSetting->time_zone === $zone['zone'] ? 'selected' : ''}}>{{$zone['diff_from_GMT'] . ' - ' . $zone['zone']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    @include('landlord.super-admin.partials.input-field',[
                        'colSize' => 6,
                        'labelName' => 'Developed By',
                        'fieldType' => 'text',
                        'nameData' => 'developed_by',
                        'placeholderData' => 'LionCoders',
                        'isRequired' => true,
                        'valueData'=> $generalSetting->developed_by

                    ])

                    @include('landlord.super-admin.partials.input-field',[
                        'colSize' => 6,
                        'labelName' => 'Footer',
                        'fieldType' => 'text',
                        'nameData' => 'footer',
                        'placeholderData' => 'LionCoders',
                        'isRequired' => true,
                        'valueData'=> $generalSetting->footer

                    ])

                    @include('landlord.super-admin.partials.input-field',[
                        'colSize' => 6,
                        'labelName' => 'Footer Link',
                        'fieldType' => 'text',
                        'nameData' => 'footer_link',
                        'placeholderData' => 'https://www.lion-coders.com',
                        'isRequired' => true,
                        'valueData'=> $generalSetting->footer_link

                    ])

                    @include('landlord.super-admin.partials.input-field',[
                        'colSize' => 6,
                        'labelName' => 'Site Logo',
                        'fieldType' => 'file',
                        'nameData' => 'site_logo',
                        'placeholderData' => '',
                        'isRequired' => false,
                    ])

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">{{trans("file.Frontend Layout")}}  </label>
                            <div class="form-check">
                                <input name="frontend_layout" id="regular" class="form-check-input" type="radio" value="regular" {{ $generalSetting->frontend_layout === 'regular' ? 'checked' :''}}> Regular
                            </div>
                            <div class="form-check">
                                <input name="frontend_layout" id="custom" class="form-check-input" type="radio" value="custom" {{ $generalSetting->frontend_layout === 'custom' ? 'checked' :''}}> Custom
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-group row">
                    <button type="submit" id="generalButton" class="btn btn-primary btn-block">@lang('file.Submit')</button>
                </div>
            </form>
        </div>
    </div>
</div>
