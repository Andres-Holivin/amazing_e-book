@extends('layouts.master')
@section('body')
    <div style="display: flex; flex-direction: column; align-items: center; margin-top: 10px; margin: 10px ">
        <form action="/Register" method="POST" enctype="multipart/form-data" style="width: 450px;background-color: #423F3E;" class="p-4 border rounded-3">
            @csrf
            <div><span class="fs-2 text-light fw-bolder">Register</span></div>
            <hr style="border: 1px solid white;"></hr>
            @error('msg')
                {{$msg}}
            @enderror
            <div class="mb-3 form-floating">
                <input type="text" class="form-control @error('FirstName')is-invalid @enderror" id="FirstName" placeholder="First Name" name="FirstName" value="{{old('FirstName')}}">
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
                <input type="text" class="form-control @error('MiddelName')is-invalid @enderror" id="MiddelName" placeholder="Middel Name" name="MiddelName" value="{{old('MiddelName')}}">
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
                <input type="text" class="form-control @error('LastName')is-invalid @enderror" id="LastName" placeholder="Last Name" name="LastName" value="{{old('LastName')}}">
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
                <input type="text" class="form-control @error('Email')is-invalid @enderror" id="Email" placeholder="Email Address" name="Email" value="{{old('Email')}}">
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
                    <option value="1" selected>User</option>
                    <option value="2">Admin</option>
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
                    <input class="form-check-input" type="radio" id="inlineRadio1" value="1" name="RadioBtn">
                    <label class="form-check-label text-light" for="inlineRadio1">@lang('index.signup.male')</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="inlineRadio2" value="2" name="RadioBtn">
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
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    <script>
        const elem = document.querySelector('input[name="datePicker"]');
        const datepicker = new Datepicker(elem, {});
    </script>
@endsection
