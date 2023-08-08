@extends('landlord.super-admin.layouts.master')
@section('landlord-content')



    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @include('includes.session_message')

                    <div class="card-header d-flex align-items-center p-3">
                        <h4 >{{trans('file.Hero Section')}}</h4>
                    </div>
                    <hr>
                    <div class="card-body">
                        <form id="submitForm" action="{{ route('hero.updateOrCreate') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                @include('landlord.super-admin.partials.input-field',[
                                    'colSize' => 4,
                                    'labelName' => 'Heading',
                                    'fieldType' => 'text',
                                    'nameData' => 'heading',
                                    'placeholderData' => 'e.g: PeopleProSaaS is a HRM software.',
                                    'isRequired' => false,
                                    'valueData'=> isset($hero->heading) ? $hero->heading : null
                                ])
                                @include('landlord.super-admin.partials.input-field',[
                                    'colSize' => 4,
                                    'labelName' => 'Button Text',
                                    'fieldType' => 'text',
                                    'nameData' => 'button_text',
                                    'placeholderData' => 'e.g: Try for free',
                                    'isRequired' => false,
                                    'valueData'=> isset($hero->button_text) ? $hero->button_text : null
                                ])
                                @include('landlord.super-admin.partials.input-field',[
                                    'colSize' => 4,
                                    'labelName' => 'Image',
                                    'fieldType' => 'file',
                                    'nameData' => 'image',
                                    'placeholderData' => null,
                                    'isRequired' => false,
                                ])
                                @include('landlord.super-admin.partials.input-field',[
                                    'colSize' => 12,
                                    'labelName' => 'Sub-Heading',
                                    'fieldType' => 'textarea',
                                    'nameData' => 'sub_heading',
                                    'placeholderData' => 'e.g: PeopleProSaaS is a HRM software.',
                                    'isRequired' => false,
                                    'valueData'=> isset($hero->sub_heading) ? $hero->sub_heading : null
                                ])

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
@endsection


@push('scripts')
    <script type="text/javascript">
        (function($) {
            "use strict";

            let updateOrCreateURL = "{{ route('hero.updateOrCreate') }}";

            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $("#submitForm").on("submit", function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    generateSetting('submitButton', updateOrCreateURL, formData);
                });
            });

            let generateSetting = (submitButtonName, settingURL, formData) => {
                $(`#${submitButtonName}`).text('Submitting...');
                $.post({
                    url: settingURL,
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    error: function(response) {
                        console.log(response);
                        let htmlContent = prepareMessage(response);
                        displayErrorMessage(htmlContent);
                        $(`#${submitButtonName}`).text('Submit');
                    },
                    success: function(response) {
                        console.log(response);
                        displaySuccessMessage(response.success);
                        $(`#${submitButtonName}`).text('Submit');
                    }
                });
            }

        })(jQuery);
    </script>

    <script type="text/javascript" src="{{ asset('js/landlord/common-js/alertMessages.js') }}"></script>
@endpush
