@extends('layout')

@section('title', 'แก้ไขบทความ')


@section('content')
    <h2 class="text text-center py-2">เขียนบทความใหม่</h2>

    <form method="POST" action="{{route('update', $book->id)}}">
        @csrf
        <div class="mb-3 form-group">
          <label for="exampleInputName" class="form-label">ชื่อหนังสือ</label>
          <input class="form-control" name="name" id="exampleInputName" value="{{$book->name}}" >
        </div>
        @error('name')
            <h6 class="my-2">
                <span class="fs-6 text-danger">{{$message}}</span>
            </h6>
        @enderror


        <div class="mb-3 form-group">
            <label for="exampleInputContent" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleInputContent" style="height: 100px">{{$book->description}}</textarea>
        </div>
        @error('description')
            <h6 class="my-2">
                <span style="color:blue" >{{$message}}</span>
            </h6>
        @enderror

        <div class="mb-3 form-group">
            <label  for="exampleInputPrice" class="form-label">Price</label>
            <input class="form-control" value="{{$book->price}}" name="price" >
        </div>
        @error('price')
            <h6 class="my-2">
                <span class="text-danger">{{$message}}</span>
            </h6>
        @enderror


        <button type="submit" class="btn btn-primary">อัพเดต</button>
        {{-- ถ้าส่งแบบฟอร์ม ใช้ input ดีกว่า ถ้าเป็นปุ่มเปลี่ยนหน้าเว็บทั่วไปแนะนำให้ใช้ href <input type="submit" value="อัพเดต" class="btn btn-primary my-3"> --}}


      </form>

@endsection


