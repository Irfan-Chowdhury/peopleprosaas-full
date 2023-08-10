<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel"> @lang('file.Edit Social') </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="POST" id="updateForm">
                    <input type="hidden" name="faq_detail_id" id="modelId">

                    <div class="row">

                        @include('landlord.super-admin.partials.input-field',[
                            'colSize' => 12,
                            'labelName' => 'Question',
                            'fieldType' => 'text',
                            'nameData' => 'question',
                            'placeholderData' => 'What is FAQ ?',
                            'isRequired' => true,
                        ])

                        @include('landlord.super-admin.partials.input-field',[
                            'colSize' => 12,
                            'labelName' => 'Answer',
                            'fieldType' => 'text',
                            'nameData' => 'answer',
                            'placeholderData' => 'e.g: Frequently Ask Question.',
                            'isRequired' => true,
                        ])
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="updateButton">@lang('file.Update')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



