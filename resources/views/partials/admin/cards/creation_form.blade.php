{{--
    Template: Form to create shortened URL
--}}

<div class="creation-form card text-white bg-dark shadow-sm">
    <div class="card-header bg-primary">{{ __('Create new short URL') }}</div>

    <div class="card-body pt-2">
        <form method="POST" action="#" id="url-creation-form">
            <span class="mb-2 d-block">{{__('all.enter_url')}}</span>
            <div class="input-group">
                <input type="text" class="form-control" name="url" placeholder="URL" value="https://www.">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" type="submit">{{__('all.save')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>
