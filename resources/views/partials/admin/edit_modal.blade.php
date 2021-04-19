<div id="url-edit-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark text-white">

            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-edit align-text-bottom"></i> 
                    {{__('all.edit_modal')}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times text-white align-text-bottom"></i>
                </button>
            </div>

            <div class="modal-body">
                <form method="POST" action="#" id="url-edit-form">
                    @method('PUT')
                    <div class="input-group">
                        <input id="edit-url" type="text" class="form-control" name="edit_url" placeholder="URL">
                        <div class="input-group-append">
                            <button class="btn btn-outline-success" type="submit">{{__('all.edit')}}</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    {{__('all.close')}}
                </button>
                <button id="delete-url" data-short-url="" type="button" class="btn btn-danger">
                    {{__('all.delete')}}
                </button>
            </div>
            
        </div>
    </div>
</div>
