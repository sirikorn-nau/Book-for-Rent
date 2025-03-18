@extends('layout')

@section('title', 'Log in')


@section('content')
    <h1>Log in</h1>

    <a href="/home">Home</a>
    <a href="{{route('about')}}">เกี่ยวกับเรา</a>
    <hr>

    @foreach ($books as $book)
        <h2>{{$book -> name}}</h2>
        <h2>{{Str::limit($book -> description, 80)}}</h2>
        <h6>{{$book -> price}}</h6>
        <a href="/detailBook/{{$book->id}}">อ่านเพิ่มเติม</a>
        <hr>
    @endforeach


@endsection
