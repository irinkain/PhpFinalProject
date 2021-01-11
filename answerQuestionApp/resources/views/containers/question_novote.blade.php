<div class="row">
    <div class="col-xs-10 col-md-11">
        <h4 style="color: #2a88bd;font-weight: bolder;margin-top: 0;margin-bottom: 0px;"><a href="/question/{{$question->id}}/{{ App\Classes\Url::get_slug($question->question) }}" title="{{ $question->question }}">{{ $question->question }}</a></h4>
        <span>
                <small>
                    <strong>
                        {{date('F dS Y', strtotime($question->created_at))}}
                        {{ $answer_number >= 1 ? ' with ' . $answer_number . ' ' . Str::plural('answer', $answer_number) : ''  }}
                    </strong>
                </small>
            </span>
    </div>
</div>