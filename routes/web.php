<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/aboutus', function(){
    return 'This is an about us page';
});

Route::get('/homePage', function(){
    return view ('homePage');
});

Route::get('/contactus', function(){
    return view ('contactus');
});

Route::get('/myservice', function(){
    return view ('myservice');
});

