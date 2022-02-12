@extends('layouts.master')
@section('body')
    <div style="color: white; display: flex;justify-content: center;">
        <table class="table table-dark table-hover;" style="width: 60%" >
            <thead>
              <tr>
                <th style="width: 40%;text-align: center" scope="col">@lang('index.book.title')</th>
                <th style="width: 60%;text-align: center"scope="col">@lang('index.action.action')</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($profils as $profile)
                    <tr>
                        <td style="text-align: center">{{$profile->first_name}} {{$profile->middle_name}} {{$profile->last_name}} - {{$profile->role->role_desc}}</td>
                        <td style="display: flex;justify-content: space-evenly">
                            <a href="/profile/update/role/{{$profile->id}}">@lang('index.action.updaterole')</a>
                            <a href="/profile/delete/{{$profile->id}}">@lang('index.action.delete')</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection
