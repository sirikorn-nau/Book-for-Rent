<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    
    public function index()
    {
        $books=DB::table('books')->paginate(4); // paginate = เป็นการสรา้งระบบหมายเลขหน้า โดยต้องระบุ จำนวนรายการ
        return view('home', compact('books'));
    }
}
