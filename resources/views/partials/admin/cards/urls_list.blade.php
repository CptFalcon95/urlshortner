{{--
    Template: List of user's shortened URL's
--}}

@if($urls->count())
<div class="urls-list card text-white bg-dark mt-3 shadow-sm">
    <div class="card-header bg-primary">{{ __("Your URL's") }}</div>

    <div class="card-body p-0 table-responsive">
        <table class="table table-striped table-dark mb-0">
            <thead>
                <tr>
                    <th scope="col">{{__('Go')}}</th>
                    <th scope="col">{{__('Url')}}</th>
                    <th scope="col">{{__('Visited')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($urls as $url)
                <tr>
                    <td><a class="btn btn-secondary" href="{{url($url->short_url)}}">Link</a></td>
                    <td>{{$url->url}}</td>
                    <td>{{$url->visit_count}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
