@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.questions.title')</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>@lang('quickadmin.questions.fields.topic')</th>
                    <td>{{ $question->topic->title or '' }}</td></tr><tr><th>@lang('quickadmin.questions.fields.question-text')</th>
                    <td>{!! $question->question_text !!}</td></tr><tr><th>@lang('quickadmin.questions.fields.code-snippet')</th>
                    <td>{!! $question->code_snippet !!}</td></tr><tr><th>@lang('quickadmin.questions.fields.answer-explanation')</th>
                    <td>{!! $question->answer_explanation !!}</td></tr><tr><th>@lang('quickadmin.questions.fields.more-info-link')</th>
                    <td>{{ $question->more_info_link }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('questions.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop