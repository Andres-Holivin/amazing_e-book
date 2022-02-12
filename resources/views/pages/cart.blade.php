@extends('layouts.master')
@section('body')
    <div style="color: white; display: flex;flex-direction: column; align-items: center;">
        <div style="display: flex;justify-content: end; width: 100%;margin-right:10%">
            <a href="/cart/submit"><button type="submit" id="btnRent" class="btn btn-primary px-4">Submit</button></a>
        </div>
        <table class="table table-dark table-hover;" style="width: 60%" >
            <thead>
            <tr>
                <th style="width: 70%" scope="col">@lang('index.book.title')</th>
                <th style="width: 30%"scope="col">@lang('index.action.action')</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart )
                    <tr>
                        <td>{{$cart->book->title}}</td>
                        <td><a href="/cart/delete/{{$cart->order_id}}">@lang('index.action.delete')</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
