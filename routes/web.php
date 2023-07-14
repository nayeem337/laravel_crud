<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;


Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/add-blog',[BlogController::class,'addBlog'])->name('blog.add');
Route::post('/new-blog',[BlogController::class,'newBlog'])->name('blog.new');
Route::get('/manage-blog',[BlogController::class,'manageBlog'])->name('blog.manage');
Route::get('/delete-blog/{id}',[BlogController::class,'deleteBlog'])->name('blog.delete');
Route::get('/edit-blog/{id}',[BlogController::class,'editBlog'])->name('blog.edit');
Route::post('/update-blog/{id}',[BlogController::class,'updateBlog'])->name('blog.update');




