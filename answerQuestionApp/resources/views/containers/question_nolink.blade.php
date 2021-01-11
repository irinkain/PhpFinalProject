<div class="row">
    <div class="col-xs-2 col-md-1">
        {{ Form::open(['url' => 'vote', 'class' => 'vote']) }}
        {{ Form::token() }}
        <div class="upvote vote_question" data-question="{{$question->id}}" data-uid="{{Auth::id()}}">
            <a id="q-upvote" class="upvote vote_q {{ $question->user_id == Auth::id() ? 'vote_disabled' : '' }} {{ $question->votes && $question->votes->contains('user_id', Auth::id()) ? ($question->votes->where('user_id', Auth::id())->first()->vote == 1 ? 'upvote-on' : null) : null}}" data-vote="1"></a>
            <span class="count" id="q-{{$question->id}}">{{ $question->votes->sum('vote') }}</span>
            <a id="q-downvote" class="downvote vote_q {{ $question->user_id == Auth::id() ? 'vote_disabled' : '' }}  {{ $question->votes && $question->votes->contains('user_id', Auth::id()) ? ($question->votes->where('user_id', Auth::id())->first()->vote <= 0 ? 'downvote-on' : null) : null}}" data-vote="-1"></a>
        </div>
        {{ Form::close() }}
    </div>
    <div class="col-xs-10 col-md-11">
        <h1 style="color: #000;font-weight: bolder;margin-top: 0;">{{ $question->question }}</h1>
        @if ( !$question->tags->isEmpty() )
            @foreach( $question->tags as $tag )
                <a href="/tag/{{ App\Classes\Url::get_slug($tag->name) }}" title="{{ $tag->name }}"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-hashtag" style="color: white;font-weight: lighter;"></i> {{ $tag->name }}</button></a>
            @endforeach
        @endif
        <span>
                <small><strong>
                        Submitted {{date('F dS Y', strtotime($question->created_at))}} by <a href="/user/{{$question->user->id}}"  title="{{ $question->user->name }}">{{ucfirst($question->user->name)}}</a>
                        @if ($question->user_id == Auth::id())
                            | <a href="/question/edit/{{$question->id}}">edit question</a>
                        @endif
                    </strong></small>
            </span>
    </div>
</div>