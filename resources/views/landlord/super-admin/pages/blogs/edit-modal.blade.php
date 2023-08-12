<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel"> @lang('file.Edit Blog') </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="POST" id="updateForm">
                    <input type="hidden" name="blog_id" id="modelId">

                    <div class="row">
                        @include('landlord.super-admin.partials.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Title',
                            'fieldType' => 'text',
                            'nameData' => 'title',
                            'placeholderData' => 'Blog Title',
                            'isRequired' => false,
                        ])

                        @include('landlord.super-admin.partials.input-field', [
                            'colSize' => 6,
                            'fieldType' => 'file',
                            'labelName' => 'Image',
                            'nameData' => 'image',
                            'placeholderData' => 'eg: Image',
                            'isRequired' => false,
                        ])

                        <div class="col-md-12 mt-3">
                            <label class="font-weight-bold">@lang('file.Description')</label>
                            <textarea name="description" id="edit-description" class="form-control text-editor" placeholder="{{ trans('file.Description') }}"></textarea>
                        </div>

                        @include('landlord.super-admin.partials.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Meta Title',
                            'fieldType' => 'text',
                            'nameData' => 'meta_title',
                            'placeholderData' => 'eg: Meta Title',
                            'isRequired' => false,
                        ])
                        @include('landlord.super-admin.partials.input-field', [
                            'colSize' => 6,
                            'labelName' => 'OG Title',
                            'fieldType' => 'text',
                            'nameData' => 'og_title',
                            'placeholderData' => 'eg: Og Title',
                            'isRequired' => false,
                        ])
                        @include('landlord.super-admin.partials.input-field', [
                            'colSize' => 6,
                            'labelName' => 'Meta Description',
                            'fieldType' => 'textarea',
                            'nameData' => 'meta_description',
                            'placeholderData' => 'eg: Og Title',
                            'isRequired' => false,
                            'idData'=>'metaDescriptionEdit'
                        ])
                        @include('landlord.super-admin.partials.input-field', [
                            'colSize' => 6,
                            'labelName' => 'OG Description',
                            'fieldType' => 'textarea',
                            'nameData' => 'og_description',
                            'placeholderData' => 'eg: Og Title',
                            'isRequired' => false,
                            'idData'=>'ogDescriptionEdit'

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
