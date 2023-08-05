@extends('landlord.super-admin.layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('vendor/translation/css/main.css') }}">
@endpush
@section('landlord-content')

    <div class="container-fluid mb-3">

        @include('includes.session_message')

        <h4 class="font-weight-bold mt-3"> @lang('file.Add Translation')</h4>
        <div id="alert_message" role="alert"></div>
        <br>
    </div>

    <div class="panel w-1/2">

        <form action="{{ route('lang.translations.store', $language) }}" method="POST">

            <fieldset>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="panel-body p-4">

                    @include('translation::forms.text_file', ['field' => 'group', 'placeholder' => __('translation::translation.group_placeholder')])

                    @include('translation::forms.text', ['field' => 'key', 'label' => __('file.Key'), 'placeholder' => __('e.g :  English')])

                    @include('translation::forms.text', ['field' => 'value', 'label' => __('file.value'), 'placeholder' => __('e.g : en')])

                </div>

            </fieldset>

            <div class="panel-footer flex flex-row-reverse">

                <button class="button button-blue">
                    {{ __('file.Save') }}
                </button>

            </div>

        </form>

    </div>

@endsection
@push('scripts')
<script src="{{ asset('public/vendor/translation/js/app.js') }}"></script>
@endpush
