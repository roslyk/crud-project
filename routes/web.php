<?php

use Illuminate\Support\Facades\Route;

// Remembering our BlogController that directs us to views
// and controls the database
use App\Http\Controllers\BlogController;
use App\Models\Blog;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// The menu
Route::get('/', function() { return view('blog.index'); });

// 1 a ) See all blogs 
Route::get('/list', [BlogController::class, 'list'])->name('blog.list');

// 1 b) View a single blog! If we put '$blog' instead of 'Blog $blog'
// we only get the blog's ID!
Route::get('/view/{blog}', function(Blog $blog){ 
return view('blog.view', ['blog' => $blog ]); })
->name('blog.view');

// Create a blog

// 2 a) Input blog elements 
Route::get('/create', function() { return view('blog.create'); })->name('blog.create');

// 2 b) Store a blog: Leading a request from create.blade.php page to the the database 
Route::post('/store',[BlogController::class, 'store'])->name('blog.store');



// 3) Edit a blog
// One must include {varName} if variable is passed to this route!
// Sending $blog from resources\views\blog\list.blade.php to
// the URL '/edit/{blogID}' and using the method 'edit' in
// BlogController class.
Route::get('/edit/{blog}', [BlogController::class, 'edit'])->name('blog.edit');
// This route returns the view 'blog.edit' with a Blog Instance $blog inputted. 


// 3) Update a blog
// This method is used to take the $blog variable from the view 
// resources\views\blog\edit.blade.php.
Route::put('/update/{blog}', [BlogController::class, 'update'])->name('blog.update');
// When the user clicks submits the form at '/edit/{blog}' the $blog and the 
// form request is sent to the method 'update' in BlogController class.
// Here, the inputted data is validated and the blog is updated. 
// Hereafter we get redirected to the 'blog.list' route.



Route::delete("/delete/{blog}",[BlogController::class,'delete'])->name('blog.delete');
