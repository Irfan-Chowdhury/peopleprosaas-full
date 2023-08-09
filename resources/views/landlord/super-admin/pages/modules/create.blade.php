<div class="container-fluid mb-3">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header d-flex align-items-center p-3">
                    <h4 >{{trans('file.Module Section')}}</h4>
                </div>
                <hr>
                <div class="card-body">
                    <form id="submitForm" action="{{ route('hero.updateOrCreate') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            @include('landlord.super-admin.partials.input-field',[
                                'colSize' => 6,
                                'labelName' => 'Heading',
                                'fieldType' => 'text',
                                'nameData' => 'heading',
                                'placeholderData' => 'e.g: PeopleProSaaS is a HRM software.',
                                'isRequired' => false,
                                'valueData'=> isset($module->heading) ? $module->heading : null
                            ])

                            @include('landlord.super-admin.partials.input-field',[
                                'colSize' => 6,
                                'labelName' => 'Image',
                                'fieldType' => 'file',
                                'nameData' => 'image',
                                'placeholderData' => null,
                                'isRequired' => false,
                            ])
                            @include('landlord.super-admin.partials.input-field',[
                                'colSize' => 12,
                                'labelName' => 'Sub Heading',
                                'fieldType' => 'textarea',
                                'nameData' => 'sub_heading',
                                'placeholderData' => 'e.g: PeopleProSaaS Description',
                                'isRequired' => false,
                                'valueData'=> isset($module->sub_heading) ? $module->sub_heading : null
                            ])

                        </div>



                        <div class="card">
                            <div class="card-header">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input" name="is_allow" value="1" id="toggleCard">
                                    <span class="custom-control-indicator"></span>
                                    <span class="form-check-label"><h5>@lang('file.Module Details')</h5></span>
                                </label>
                            </div>
                            <div class="card-body" id="cardContent" style="display: none;">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="font-weight-bold">@lang('file.Icon') <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"  name="icon" class="form-control icon"
                                            data-toggle="collapse" href="#icon_collapse" aria-expanded="false"
                                            aria-controls="icon_collapse"
                                            placeholder="{{ trans('file.Click to choose icon') }}" />
                                    </div>
                                    <div class="collapse icon_collapse" id="icon_collapse">
                                        <div class="card">
                                            <div class="card-body">
                                            </div>
                                        </div>
                                    </div>
                                    @include('landlord.super-admin.partials.input-field', [
                                        'colSize' => 4,
                                        'labelName' => 'name',
                                        'fieldType' => 'text',
                                        'nameData' => 'name',
                                        'placeholderData' => 'Purchase',
                                        'isRequired' => false,
                                    ])
                                    @include('landlord.super-admin.partials.input-field', [
                                        'colSize' => 4,
                                        'labelName' => 'Description',
                                        'fieldType' => 'text',
                                        'nameData' => 'description',
                                        'placeholderData' => 'Create purchase order and automatically update your daily stocks.',
                                        'isRequired' => false,
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4 form-group mt-3">
                                <button type="submit" id="submitButton" class="btn btn-primary">@lang('file.Submit')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
