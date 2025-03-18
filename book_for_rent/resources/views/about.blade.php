@extends('layout')

@section('title', 'เกี่ยวกับเรา')


@section('content')
    <h1>About!!</h1>
    <p>ผู้พัฒนาระบบ : {{$name}}</p>
    <p>วันเริ่มก่อตั้ง : {{$date}}</p>
@endsection