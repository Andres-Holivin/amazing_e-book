@extends('layouts.master')
@section('body')
    <div class='p-4 py-4 fs-5' style="color:white;display:flex; flex-direction: column; gap:10px">
        <form action="/role/update/{{$profile->id}}" method="POST">
            @csrf
            <div style="display: flex; justify-content: space-between">
                <div>{{$profile->first_name}} {{$profile->middle_name}} {{$profile->last_name}} - {{$profile->role->role_desc}}</div>
            </div>
            <br/>
            <div class="mb-3 form-floating">
                <select class="form-select" id="Role" name="Role" aria-label="Floating label select example">
                    <option value="1" @if($profile->role->role_desc=='user')selected @endif>User</option>
                    <option value="2" @if($profile->role->role_desc=='admin')selected @endif>Admin</option>
                </select>
                <label for="Role" class="form-label" style="color: black">@lang('index.signup.role')</label>
            </div>
            <button type="submit" id="btnRent" class="btn btn-primary px-4">Save</button>
        </form>
    </div>
@endsection
