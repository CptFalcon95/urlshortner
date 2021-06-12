{{--
    Template: List of user's shortened URL's
--}}

@if($urls->count())
<div class="urls-list card text-white bg-dark mt-3 shadow-sm">
    <div class="card-header bg-primary">
        <i class="fa fa-link"></i>
        {{ __("all.your_urls") }}
    </div>

    <div class="card-body p-0 table-responsive">
        <table class="table table-striped table-dark mb-0 text-center">
            <thead>
                <tr>
                    <th scope="col">{{__('all.short_url')}}</th>
                    <th scope="col">{{__('all.go')}}</th>
                    <th scope="col">{{__('all.visited')}}</th>
                    <th scope="col">{{__('all.actions')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($urls as $url)
                <tr>
                    <td class="align-middle">
                        {{$url->short_url}}
                    </td>
                    <td class="align-middle">
                        <a class="" target="_blank" href="{{route('visit', $url->short_url)}}">
                            {{$url->url}}
                        </a>
                    </td>
                    <td class="align-middle">{{$url->visit_count}}</td>
                    <td><button class="btn btn-outline-secondary" data-toggle="modal" data-target="#url-edit-modal" data-short-url="{{$url->short_url}}" data-url="{{$url->url}}">{{__('all.edit')}}</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('partials.admin.edit_modal')

@endif
