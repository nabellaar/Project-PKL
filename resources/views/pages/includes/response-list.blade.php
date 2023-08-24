
    <div class="card">
        <div class="row">
            <div class="col-12">
                @foreach ($response as $item)
                <div class="media my-4">
                    <img class="mr-3 rounded-circle" alt=""
                        src="{{ $item->user->photo ? asset('img/profile/'.$item->user->photo) : asset('img/profile/default.jpg') }}" />
                    <div class="media-body">
                        <div class="row">
                            <div class="col-8 d-flex">
                                <h5>
                                    <b>
                                    {{ $item->user->full_name }}&nbsp;
                                    </b>
                                </h5>
                                    
                                <span> - {{ date('d F Y H:i:s', strtotime($item->created_at)) }}</span>
                            </div>
                            <div class="col-4">
                                <div class="float-right reply">
                                    <a data-toggle="collapse" href="#collapseExample{{ $item->id }}" role="button" aria-expanded="false" aria-controls="collapseExample" ><span><i class="fa fa-reply"></i> reply</span></a>
                                </div>
                            </div>
                        </div>
                        {{ $item->content }}
                        @foreach ( $item->children() as $children )
                        <div class="media my-4">
                            <a class="pr-3" href="#"><img class="rounded-circle" alt=""
                                src="{{ $children->user->photo ? asset('img/profile/'.$children->user->photo) : asset('img/profile/default.jpg') }}" /></a>
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-12 d-flex">
                                        <h5>{{ $children->user->full_name }}&nbsp;</h5>
                                        <span> - {{ date('d F Y H:i:s', strtotime($children->created_at)) }}</span>
                                    </div>
                                </div>
                                {{ $children->content }}
                            </div>
                        </div> 
                        @endforeach
                        <div class="collapse" id="collapseExample{{ $item->id }}">
                            <form id="form-add-response" method="post">
                                @csrf
                                <input type="hidden" name="topic_id" id="topic_id">
                                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="parent_id" id="parent_id" value="0">
                                <div class="modal-body">
                                    <textarea name="content" id="content" class="form-control" rows="5"
                                        placeholder="Enter your response"></textarea>
                                    <span id="error-message"></span>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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