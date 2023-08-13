<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel"> @lang('file.Edit Page') </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="POST" id="updateForm">
                    <input type="hidden" name="page_id" id="modelId">

                    <div class="row">
                        @include('landlord.super-admin.partials.input-field', [
                            'colSize' => 12,
                            'labelName' => 'Title',
                            'fieldType' => 'text',
                            'nameData' => 'title',
                            'placeholderData' => 'Page Title',
                            'isRequired' => true,
                        ])

                        <div class="col-md-12 mt-3">
                            <label class="font-weight-bold">@lang('file.Description') <span class="text-danger">*</span></label>
                            <textarea name="description" required id="edit-description" class="form-control text-editor" placeholder="{{ trans('file.Description') }}"></textarea>
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
                            'idData'=>'metaDescriptionEdit'
                        ])

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="updateButton">@lang('file.Update')</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
