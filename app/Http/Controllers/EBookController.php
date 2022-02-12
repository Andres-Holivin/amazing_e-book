<?php

namespace App\Http\Controllers;

use App\Models\EBook;
use Illuminate\Http\Request;

class EBookController extends Controller
{
    public function home(){
        return view('pages.home',["books"=>EBook::get()]);
    }
    public function detail($id){
        return view('pages.detail',["bookDetail"=>EBook::where('ebook_id','=',$id)->first()]);
    }
}
