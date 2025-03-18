<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Books;


class UserController extends Controller
{
    function index(){
        // $books = Books::orderByDesc('id')->where('price', '<=', 200)->get();
        // return view('allBook', compact('books'));
        return view('home');
    }

    function detailBook($id){
        $books = Books::find($id);
        return view('detail', compact('books'));
    }
}
