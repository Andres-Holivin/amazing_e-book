@extends('layouts.master')
@section('body')
<div style="display: flex; flex-direction: column; align-items: center; margin-top: 80px; ">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>
    @if (session()->has('error'))
        <div style="position: fixed; " class="alert alert-danger alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            {{session('error')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session()->has('success'))
        <div style="position: fixed; " class="alert alert-success alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="/Login" method="post" style="width: 450px;background-color: #423F3E;" class="p-4 border rounded-3">
        @csrf
            <div>
                <span class="fs-2 text-light fw-bolder">Login</span>
            </div>
            <hr style="border: 1px solid white;"></hr>
            <div class="mb-3 form-floating">
                <input type="text" value="{{Cookie::get('email')!=null?Cookie::get('email'):old('email')}}" class="form-control @error('email')is-invalid @enderror" name="email" id="email" placeholder="username" >
                <label for="email" >@lang('index.login.email')</label>
                @error('email')
                <div>
                    <input style="display: none;" type="text" class="form-control is-invalid" id="validationServer02" value="Otto" required>
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                </div>
                @enderror
            </div>
            <div class="mb-3 form-floating">
                <input type="password" class="form-control @error('password')is-invalid @enderror" name="password" id="password" placeholder="username" value="{{Cookie::get('password')!=null?Cookie::get('password'):old('password')}}" >
                <label for="password" >@lang('index.login.password')</label>
                @error('email')
                <div>
                    <input style="display: none;" type="text" class="form-control is-invalid" id="validationServer02" value="Otto" required>
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                </div>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberLogin" name='cookies'>
                <label class="form-check-label text-light" for="rememberLogin">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection
