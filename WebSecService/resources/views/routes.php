Route::get('/multable', function () {
 $j = 6;
 return view('multable', compact('j')); //multable.blade.php
});

Route::get('/multable/{number?}', function ($number = null) {
 $j = $number??2;
 return view('multable', compact('j')); //multable.blade.php
});

use Illuminate\Http\Request;
...
Route::get('/multable', function (Request $request) {
 $j = $request->number;
 return view('multable', compact('j')); //multable.blade.php
});

Route::get('/multable', function (Request $request) {

$j = $request->number;
dd($request->all());

return view('multable', compact('j')); //multable.blade.php
});


<div class="card m-4 col-sm-2">
 <div class="card-header">{{$j}} Multiplication Table</div>
 <div class="card-body">
 <table>
 @foreach (range(1, 10) as $i)
 <tr><td>{{$i}} * {{$j}}</td><td> = {{ $i * $j }}</td></li>
 @endforeach
 </table>
 </div>
 </div>
 