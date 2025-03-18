<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Books;

class LessorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function home(){
        $books=Books::paginate(4);
        // $books=DB::table('books')->paginate(4); // paginate = เป็นการสรา้งระบบหมายเลขหน้า โดยต้องระบุ จำนวนรายการ
        return view('home', compact('books'));
    }

    function about(){
        $name = "Raiden Shogun";
        $date = "10/4/2567";
        return view('about', compact('name' , 'date'));
    }

    function delete($id){
        DB::table('books')->where('id',$id)->delete();
        return redirect()->back();
    }

    function create(){
        return view('form');
    }

    function edit($id){
        $book = DB::table('books')->where('id',$id)->first();
        return view('/edit', compact('book'));
    }


    function insert(Request $request){
        $request->validate(
            [
                'name' => 'required|max:50', // ห้ามเกิน 50 ตัวอักษร
                'description' => 'required' ,
                'price' => 'required|numeric' // ต้องเป็นตัวเลขเท่านั้น
            ],
            [
                'name.required'=>'กรุณาป้อนชื่อหนังสือ',
                'name.max'=>'ชื่อหนังสือไม่ควรเกิน 50 ตัวอักษร',
                'description.required'=>'กรุณาป้อนคำอธิบายหนังสือ',
                'price.required'=>'กรุณาป้อนราคา',
                'price.numeric'=>'กรุณาป้อนเฉพาะตัวเลข',

            ],
        );
        $data=[
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ];
        // dd($data);
        DB::table('books')->insert($data);
        return redirect('/home');
    }


    function update(Request $request, $id){
        $request->validate(
            [
                'name' => 'required|max:50', // ห้ามเกิน 50 ตัวอักษร
                'description' => 'required' ,
                'price' => 'required|numeric' // ต้องเป็นตัวเลขเท่านั้น
            ],
            [
                'name.required'=>'กรุณาป้อนชื่อหนังสือ',
                'name.max'=>'ชื่อหนังสือไม่ควรเกิน 50 ตัวอักษร',
                'description.required'=>'กรุณาป้อนคำอธิบายหนังสือ',
                'price.required'=>'กรุณาป้อนราคา',
                'price.numeric'=>'กรุณาป้อนเฉพาะตัวเลข',

            ],
        );
        $data=[
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ];
        DB::table('books')->where('id', $id)->update($data);
        return redirect('/home');
    }






}
