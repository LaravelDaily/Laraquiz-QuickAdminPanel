@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.results.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($results) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                    @if(Auth::user()->isAdmin())
                        <th>@lang('quickadmin.results.fields.user')</th>
                    @endif
                        <th>@lang('quickadmin.results.fields.date')</th>
                        <th>Result</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($results) > 0)
                        @foreach ($results as $result)
                            <tr>
                            @if(Auth::user()->isAdmin())
                                <td>{{ $result->user->name or '' }} ({{ $result->user->email or '' }})</td>
                            @endif
                                <td>{{ $result->created_at or '' }}</td>
                                <td>{{ $result->result }}/10</td>
                                <td>
                                    <a href="{{ route('results.show',[$result->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop
