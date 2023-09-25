
   <div class="card">
        <div class="row">
            <div class="col-12">
                @foreach ($response as $item)
                <div class="media my-4">
                    <img class="mr-3 rounded-circle" alt="" style="aspect-ratio: 1/1;" width="50px"
                        src="{{ $item->user->foto ? asset('img/profile/'.$item->user->foto) : asset('img/profile/default.jpg') }}" />
                    <div class="media-body">
                        <div class="row">
                            <div class="col-8 d-flex">
                                <h5>
                                    <b>
                                    {{ $item->user->username }}&nbsp;
                                    </b>
                                </h5>
                                    
                                <span> &nbsp; {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans(['short'=>true]) }} </span>
                            </div>
                            <div class="col-4">
                                <div class="float-right reply">
                                    <a href="javascript:void(0)" onclick="openReply(event, {{ $item->id }}, '{{ $item->user->username }}')">
                                        <span><i class="fa fa-reply"></i> reply</span>
                                    </a>
                                    @if (Auth::id() != $item->user->id)
                                    <a class="ml-4" href="javascript:void(0)" onclick="openReport(event, {{ $item->id }}, '{{ $item->user->username }}', '{{app(table_name::class)->getTable()}}')">
                                        <span><i class="fa-solid fa-flag"></i> report</span>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{ $item->content }}
                        @foreach ( $item->children()->get() as $children )
                        <div class="media my-4">
                            <a class="pr-3" href="#"><img class="rounded-circle" alt=""
                                src="{{ $children->user->foto ? asset('img/profile/'.$children->user->foto) : asset('img/profile/default.jpg') }}" /></a>
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-8 d-flex">
                                        <h5>{{ $children->user->username }}&nbsp;</h5>
                                        <span> &nbsp; {{ \Carbon\Carbon::parse($children->created_at)->diffForHumans(['short'=>true]) }}</span>
                                    </div>
                                    <div class="col-4">
                                        <div class="float-right reply">
                                            <a href="javascript:void(0)" onclick="openReply(event, {{ $item->id }}, '{{ $children->user->username }}')">
                                                <span><i class="fa fa-reply"></i> reply</span>
                                            </a>
                                            @if (Auth::id() != $children->user->id)
                                            <a class="ml-4" href="javascript:void(0)" onclick="openReport(event, {{ $children->id }}, '{{ $children->user->username }}')">
                                                <span><i class="fa-solid fa-flag"></i> report</span>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                {!! $children->content !!}
                            </div>
                        </div> 
                        @endforeach
                        <div class="collapse mt-3" id="collapseExample{{ $item->id }}">
                            <form id="form-add-response{{ $item->id }}" method="post">
                                @csrf
                                <input type="hidden" name="topic_id" id="topic_id" value="{{ $item->topic_id }}">
                                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="parent_id" id="parent_id" value="{{ $item->id }}">
                                <div class="modal-body">
                                    <textarea name="content" id="content" class="form-control" rows="5"
                                        placeholder="Enter your response"></textarea>
                                    <span id="error-message{{ $item->id }}"></span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary mt-3" id="btnReply{{ $item->id }}" onclick="sendReply(event, {{ $item->id }})">Submit</button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
                <hr>
                @endforeach
                {{ $response->appends($_GET)->links() }}
            </div>
        </div>
    </div>
<style>

    .card {
        position: relative;
        display: flex;
        padding: 20px;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: none;
        border-radius: 11px;
        -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
        -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
    }

    .media img {

        width: 60px;
        height: 60px;
    }


    .reply a {

        text-decoration: none;
    }
</style>