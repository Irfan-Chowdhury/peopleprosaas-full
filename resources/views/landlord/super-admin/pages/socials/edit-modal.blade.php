<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel"> @lang('file.Edit Language') </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="POST" id="updateForm">
                    <input type="hidden" name="social_id" id="itemId">

                    <div class="row">
                        <div class="col-sm-12">
                            <label class="font-weight-bold">@lang('file.Icon') <span class="text-danger">*</span> </label>
                            <input type="text" required name="icon" class="form-control icon" data-toggle="collapse" href="#icon_collapse_edit" aria-expanded="false" aria-controls="icon_collapse_edit" placeholder="{{trans('file.Click to choose icon')}}"/>
                        </div>
                        <div class="collapse icon_collapse" id="icon_collapse_edit">
                            <div class="card">
                                <div class="card-body">
                                </div>
                            </div>
                        </div>

                        @include('landlord.super-admin.partials.input-field',[
                            'colSize' => 12,
                            'labelName' => 'Name',
                            'fieldType' => 'text',
                            'nameData' => 'name',
                            'placeholderData' => 'Name',
                            'isRequired' => true,
                        ])

                        @include('landlord.super-admin.partials.input-field',[
                            'colSize' => 12,
                            'labelName' => 'Link',
                            'fieldType' => 'text',
                            'nameData' => 'link',
                            'placeholderData' => 'https://facebook.com/',
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




