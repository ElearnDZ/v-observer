@extends('layouts.full')

@section('content')
<div>
    <div class="section analysis">
        <div class="row">
            <div class="col s12 l6">
                <div class="card left-align video-controls-nohide">
                    @include('observation.videos.'.$video->type.'.display', ['video' => $video, 'video_types' => $video_types, 'questionnaire' => $questionnaire])
                </div>
                <!--  Timeline to copy into the player -->
                <div id="chapters-wrapper-copy" style="display:none;">
                    <div class="chapters-wrapper">
                        @foreach($chapters as $key => $chapter)
                            <div class="chapter-wrapper" style="width:{{$chapter['percentage']}}%">
                                <div class="chapter" data-part="{{$key}}" data-start="{{$chapter['start']}}" data-end="{{$chapter['end']}}"></div>
                            </div>
                        @endforeach
                        <div class="spacer" style="clear: both;"></div>
                    </div>
                </div>
            </div>
            <div class="col s12 l6">
                <div class="card left-align full-scroll">
                    <div class="card-content">
                        @foreach($chapters as $part => $chapter)
                            <div class="part" id="part-{{$part}}" style="display:none;">
                                <div class="card-title">
                                    {{ $questionnaire->name }} <span class="teal-text text-lighten-1">({{ $part+1 }}/{{ count($chapters) }})</span>
                                </div>
                                @foreach($blocks as $key => $block)
                                    @include('observation.blocks.'.$block->type.'.display', ['video' => $video, 'block' => $block, 'questionnaire' => $questionnaire, 'block_types' => $block_types, 'part' => $part, 'answers' => $answers ])
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('header-buttons')
<ul id="nav-mobile" class="right">
    <li><a href="{{ action('Observation\VideoController@getVideo', ['questionnaire_id' => $questionnaire->id, 'id' => $video->id]) }}"><span class="hide-on-med-and-down">Stop Analysis</span><i class="material-icons right">exit_to_app</i></a></li>
</ul>
@endsection

@section('javascript')
<script>var urlFinished = {!! $analysis->completed ? 'false' : '"' . action('Observation\VideoController@getAnalysisFinished', $analysis->id) . '"' !!};</script>
<script type="text/javascript" src="/javascript/AnalyseVideo.js"></script>
@endsection
