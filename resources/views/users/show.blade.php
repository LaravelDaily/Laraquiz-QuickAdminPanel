@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>@lang('quickadmin.users.fields.name')</th>
                    <td>{{ $user->name }}</td></tr><tr><th>@lang('quickadmin.users.fields.email')</th>
                    <td>{{ $user->email }}</td></tr><tr><th>@lang('quickadmin.users.fields.password')</th>
                    <td>---</td></tr><tr><th>@lang('quickadmin.users.fields.role')</th>
                    <td>{{ $user->role->title or '' }}</td></tr><tr><th>@lang('quickadmin.users.fields.remember-token')</th>
                    <td>{{ $user->remember_token }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('users.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop