@extends('layouts.layout')

@section('title', 'Home')


@section('content')
    <h1 class="py-2">Home!!</h1>

    @if (count($books)>0)
        <div class="table-responsive py-2">
        <table class="table table-hover table-bordered align-middle text-center">
            <thead class="table-dark">
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Content</th>
                <th scope="col">Price</th>
                <th scope="col">Delete Book</th>
                <th scope="col">Edit Book</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
              <tr>
                <th scope="row"> {{$book->id}} </th>
                <td>{{$book->name}}</td>
                <td>{{Str::limit($book->description, 100)}}</td>
                @if ($book->price > 100)
                <td class="text-danger">{{$book->price}}</td>
                @else
                <td class="text-success" >{{$book->price}}</td>
                @endif
                <td>
                    <a href="{{route('edit', $book->id)}}" class="btn btn-warning"
                    >Edit</a>
                </td>
                <td>
                    <a href="{{route('delete', $book->id)}}" class="btn btn-danger"
                        onclick="return confirm('ยืนยันการลบ {{$book->name}} หรือไม่?')"
                        >Delete</a>
                </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          {{-- ตรงนี้คือการใช้ use Illuminate\Pagination\Paginator; ของ Laravel ร่วมกับ Bootstrap เพื่อทำ Pagination --}}
          {{$books->links()}}

        </div>
    @else
        <h2 class="text text-center py-2">ไม่มีบทความในระบบ</div>
    @endif


    <a href="/create" class="btn btn-info">Create Form</a>




@endsection


