@extends('layout')

@section('title', 'เพิ่มหนังสือเช่า')


@section('content')
    <h2 class="text text-center py-2">เขียนบทความใหม่</h2>

    <form method="POST" action="/insert">
        @csrf
        <div class="mb-3 form-group">
            <label for="exampleInputName" class="form-label">ชื่อหนังสือ</label>
            <input class="form-control" name="name" id="exampleInputName">
        </div>
        @error('name')
            <h6 class="my-2">
                <span class="fs-6 text-danger">{{ $message }}</span>
            </h6>
        @enderror


        <div class="mb-3 form-group">
            <label for="exampleInputContent" class="form-label">Description</label>
            <textarea class="form-control" name="description" placeholder="Leave a description here" id="content"
                style="height: 100px"></textarea>
        </div>
        @error('description')
            <h6 class="my-2">
                <span style="color:blue">{{ $message }}</span>
            </h6>
        @enderror

        <div class="mb-3 form-group">
            <label for="exampleInputPrice" class="form-label">Price</label>
            <input class="form-control" name="price">
        </div>
        @error('price')
            <h6 class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </h6>
        @enderror


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>


@endsection
