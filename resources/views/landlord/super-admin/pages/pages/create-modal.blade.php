<!--Create Modal -->
<div class="modal fade bd-example-modal-lg" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel"> {{ __('file.Add Page') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" id="submitForm">
                    @csrf
                    <div class="row">
                        @include('landlord.super-admin.partials.input-field', [
                            'colSize' => 12,
                            'labelName' => 'Title',
                            'fieldType' => 'text',
                            'nameData' => 'title',
                            'placeholderData' => 'Page Title',
                            'isRequired' => false,
                        ])


                        <div class="col-md-12 mt-3">
                            <label class="font-weight-bold">@lang('file.Description')</label>
                            <textarea name="description" class="form-control text-editor" placeholder="{{ trans('file.Description') }}"></textarea>
                        </div>

                        @include('landlord.super-admin.partials.input-field', [
                            'colSize' => 12,
                            'labelName' => 'Meta Title',
                            'fieldType' => 'text',
                            'nameData' => 'meta_title',
                            'placeholderData' => 'eg: Meta Title',
                            'isRequired' => false,
                        ])

                        @include('landlord.super-admin.partials.input-field', [
                            'colSize' => 12,
                            'labelName' => 'Meta Description',
                            'fieldType' => 'textarea',
                            'nameData' => 'meta_description',
                            'placeholderData' => 'eg: Og Title',
                            'isRequired' => false,
                        ])

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="submitButton">@lang('file.Save')</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
