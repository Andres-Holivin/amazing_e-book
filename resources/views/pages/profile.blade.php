@extends('layouts.master')
@section('body')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    <form method="POST" action="/profile/update/{{auth()->user()->id}}" enctype="multipart/form-data">
        @csrf
        <div style="margin: 10px 50px 10px 50px; background-color: #423F3E; padding: 30px;border-radius:10px ">
            <div style="display: grid; grid-template-columns: 2fr 3fr; grid-gap: 25px" class="">
                <img style="object-fit: contain; height: 350px;" src="{{URL::asset($profile->display_picture_link)}}" class="card-img-top" alt="...">
                <div style="">
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control @error('FirstName')is-invalid @enderror" id="FirstName" placeholder="First Name" name="FirstName" value="{{$profile->first_name}}">
                        <label for="FirstName" >@lang('index.signup.first')</label>
                        @error('FirstName')
                        <div>
                            <input style="display: none;" type="text" class="form-control is-invalid" id="validationServer02" value="Otto" required>
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control @error('MiddelName')is-invalid @enderror" id="MiddelName" placeholder="Middel Name" name="MiddelName" value="{{$profile->middle_name}}">
                        <label for="MiddelName" >@lang('index.signup.middle')</label>
                        @error('MiddelName')
                        <div>
                            <input style="display: none;" type="text" class="form-control is-invalid" id="validationServer02" value="Otto" required>
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control @error('LastName')is-invalid @enderror" id="LastName" placeholder="Last Name" name="LastName" value="{{$profile->last_name}}">
                        <label for="LastName" class="form-label">@lang('index.signup.last')</label>
                        @error('LastName')
                        <div>
                            <input style="display: none;" type="text" class="form-control is-invalid" id="validationServer02" value="Otto" required>
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control @error('Email')is-invalid @enderror" id="Email" placeholder="Email Address" name="Email" value="{{$profile->email}}">
                        <label for="Email" class="form-label">@lang('index.signup.email')</label>
                        @error('Email')
                        <div>
                            <input style="display: none;" type="text" class="form-control is-invalid" id="validationServer02" value="Otto" required>
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-floating">
                        <select class="form-select" id="Role" name="Role" aria-label="Floating label select example">
                            <option value="1" @if($profile->role->role_desc=='user')selected @endif>User</option>
                            <option value="2" @if($profile->role->role_desc=='admin')selected @endif>Admin</option>
                        </select>
                        <label for="Role" class="form-label">@lang('index.signup.role')</label>
                        @error('Role')
                        <div>
                            <input style="display: none;" type="text" class="form-control is-invalid" id="validationServer02" value="Otto" required>
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="password" class="form-control @error('Password')is-invalid @enderror" id="Password" placeholder="password" name="Password" >
                        <label for="Password" class="form-label">@lang('index.signup.password')</label>
                        @error('Password')
                        <div>
                            <input style="display: none;" type="text" class="form-control is-invalid" id="validationServer02" value="Otto" required>
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 input-group">
                        <input type="file" class="form-control @error('imageFile')is-invalid @enderror" id="inputGroupFile02" name="imageFile[]" value="{{old('imageFile[]')}}">
                        <label class="input-group-text" for="inputGroupFile02">@lang('index.signup.displaypicture')</label>
                    </div>
                    @error('imageFile')
                    <div>
                        <input style="display: none;" type="text" class="form-control is-invalid" id="validationServer02" value="Otto" required>
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    </div>
                    @enderror
                    <div  class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineRadio1" value="1" name="RadioBtn" @if($profile->gender->gender_desc=='Laki-Laki')checked @endif>
                            <label class="form-check-label text-light" for="inlineRadio1">@lang('index.signup.male')</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineRadio2" value="2" name="RadioBtn"@if($profile->gender->gender_desc=='Perempuan')checked @endif>
                            <label class="form-check-label text-light" for="inlineRadio2">@lang('index.signup.female')</label>
                        </div>
                        @error('RadioBtn')
                        <div>
                            <input style="display: none;" type="text" class="form-control is-invalid" id="validationServer02" value="Otto" required>
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
@endsection
