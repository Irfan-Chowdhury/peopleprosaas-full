@extends('landlord.super-admin.layouts.master')
@section('landlord-content')
    <div class="container-fluid mb-3">
        <div class="row">

            <div class="col-4">
                <div class="card mb-0">
                    <div id="collapse1" class="collapse show" aria-labelledby="generalSettings" data-parent="#accordion">
                        <div class="card-body">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="general-setting"
                                    data-toggle="list" href="#generalSetting" role="tab"
                                    aria-controls="home">@lang('file.General Setting')</a>
                                <a class="list-group-item list-group-item-action" id="bug-update-setting" data-toggle="list"
                                    href="#bugUpdateSetting" role="tab" aria-controls="home">@lang('file.Payment Setting')</a>
                                <a class="list-group-item list-group-item-action" id="version-upgrade-setting"
                                    data-toggle="list" href="#versionUpgradeSetting" role="tab"
                                    aria-controls="home">@lang('file.SEO Setting')</a>
                                <a class="list-group-item list-group-item-action" id="version-upgrade-setting"
                                    data-toggle="list" href="#versionUpgradeSetting" role="tab"
                                    aria-controls="home">@lang('file.Analytics Setting')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- @include('includes.session_message') --}}


            <div class="col-8">
                <div class="tab-content" id="nav-tabContent">

                    <!--General Setting-->
                    @include('landlord.super-admin.pages.settings.general')


                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        (function($) {
            "use strict";

            let generalSettingURL = "{{ route('setting.general.manage') }}";

            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $("#generalSettingSubmit").on("submit", function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    generateSetting('generalButton', generalSettingURL, formData);
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
