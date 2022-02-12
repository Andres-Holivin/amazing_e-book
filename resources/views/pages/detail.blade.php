@extends('layouts.master')
@section('body')
    <div class='p-4 py-4 fs-5' style="color:white;display:flex; flex-direction: column; gap:10px">
        <div style="display: flex; justify-content: space-between">
            <div>E-Book Detail</div>
            <a href="/rent/{{$bookDetail->ebook_id}}"><button type="submit" id="btnRent" class="btn btn-primary px-4">@lang('index.action.rent')</button></a>
        </div>
        <br/>
        <div>@lang('index.book.title') : {{$bookDetail->title}}</div>
        <div>@lang('index.book.author') : {{$bookDetail->author}}</div>
        <div>
            <div >@lang('index.book.desc') : </div>
            <div>{{$bookDetail->description}}</div>
        </div>
    </div>
@endsection
