
## routes/web.php

```php
Route::get('/', function () {
    return view('welcome');
});
```

```php
Route::get('/home', function () {
    $books = [
        [
            'name'=>'Black Butler',
            'content'=>'คนลึกไขปริศนาลับ',
            'price'=>123,
        ],
        [
            'name'=>'Madoka',
            'content'=>'สาวน้อยเวทมนตร์',
            'price'=>99,
        ],
    ];
    return view('home', compact('books'));
});
```

```php
Route::get('/', function () {
     return "<a href='".route('users')."'>Login</a>";
});
Route::get('admin/users/fallback', function () {
    return "<h1> Hi users </h1>";
})->name('users');
// ->name('') เป็นการตั้งชื่อ route , วิธีเรียกใช้ = ".route('users')."
```

```php
Route::get('/blog/{name}', function ($name) {
    return "<h1>บทความชื่อ ${name} </h1>";
});
```

```php
// กรณี route ไม่มีอยู่ใน Project จะให้เกิดการทำงานยังไง เรียกว่า "Route Fallback"
Route::fallback(function(){
    return "<h1>ไม่พบหน้าเว็บ</h1>";
});
```

## Controller 
```php
php artisan make:controller LessorController
```

---

## Database
- สร้าง Model (เหมือน Class ใน OOP เป็นพิมพ์ใหญ่เสมอ) พร้อม Migration file ที่ทำหน้าที่เชื่อมต่อไปที่ตาราง
```php
php artisan make:model Books -m
```

- เอาโครงสร้างในไฟล์ Migration ไปสร้าง ฐานข้อมูล
```php
php artisan migrate
```

---

## Factory & Seeder

- Factory เป็นการ Fake ข้อมูล จาก Model ด้วยรูปแบบที่เราจะสร้างใน Factory (นิยมชื่อ Model + คำว่า Factory)
```php
php artisan make:factory BooksFactory
```

- Seeder (เอา Factory มาใช้) ไปแก้ในไฟล์ Seeder ที่ถูกสร้าง จากนั้นไปเรียกใช้งานผ่านไฟล์ DatabaseSeeder.php
```php
php artisan make:seeder BooksSeeder
```

```php
public function run(): void
{
    Books::factory()->count(10)->create(); // สร้าง 10 บทความแล้ว Create
}
```

- หลังจากทำทุกอย่างเสร็จ ก็ใช้คำสั่ง
```php
php artisan db:seed
```

---

## Query ข้อมูลจาก DB 
-Laravelมีวิธีใช้งาน ฐานข้อมูล 2 วิธี 2.Eloquent มันจะเขียนสั้นกว่ากับการใช้ 1.Builder

- import ลงใน Controller เพื่อเรียกใช้งาน DB แบบ Builder
```php
use Illuminate\Support\Facades\DB;
```

- 2. Eloquent
```php
use App\Models\Books;
```

- Get
```php
$books=DB::table('books')->get();
$books=Books::paginate(4);
```

- Loop Get (Str::limit คือจำกัดตัวอักษร)
```php
@foreach ($books as $book)
    <tr>
        <td>{{$book->name}}</td>
        <td>{{Str::limit($book->description, 30)}}</td>
        <td class="text-success" >{{$book["price"]}}</td>
    </tr>
@endforeach
```

- Insert
```php
$data=[
    'name' => $request->name,
    'description' => $request->description,
    'price' => $request->price
];
// dd($data);
DB::table('books')->insert($data);
Books::insert($data);
return redirect('/home');
```

- Update

```php
Route::get('/edit/{id}' , [LessorController::class,'edit'])->name('edit');
<a href="{{route('edit', $book->id)}}" class="btn btn-warning">Edit</a>
function edit($id){
    $book = DB::table('books')->where('id',$id)->first();
    $data = [ // แก้เฉพาะ ราคา 
        'price' => $book->price + 100
    ];
    DB::table('books')->where('id', $id)->update($data);
    return redirect('/home');
}
```

```php
function edit($id){
    $book = Books::find($id);
    $data = [ // แก้เฉพาะ ราคา 
        'price' => $book->price + 100
    ];
    Books::find($id)->update($data);
    return redirect('/home');
}
```

- Delete
```php
DB::table('books')->where('id',$id)->delete();
Books::find($id)->delete();
return redirect()->back();
```

---

## Router

- ใส่ Parameter
```php
Route::get('/delete/{id}' , [LessorController::class,'delete'])->name('delete');
<a href="{{route('delete', $book->id)}}" class="btn btn-danger">Delete</a>
```

---

## Authentication
```php
composer require laravel/ui
php artisan ui bootstrap --auth
npm install
npm run build
```

## .env 
- เป็นไฟล์ตั้งค่า Config Database
