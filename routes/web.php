<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\OfficeController;
use App\Http\Controllers\Backend\PriceController;
use App\Http\Controllers\Backend\ServicesController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\googlecontroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\get;

Route::get('/', function () {
    return view('frontend.index');
});


// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

//google login
Route::get('/google/redirect' , [googlecontroller::class , 'index'])->name('google.redirect');
Route::get('/google/callback' , [googlecontroller::class , 'verify']);

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/profile/store', [AdminController::class, 'ProfileStore'])->name('profile.store');
    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');

Route::controller(SliderController::class)->group(function(){
    Route::get('/all/slider', 'AllSlider')->name('all.slider');
    Route::get('/add/slider', 'AddSlider')->name('add.slider');
    Route::post('/store/slider', 'StoreSlider')->name('store.slider');
    Route::get('/edit/slider/{id}', 'EditSlider')->name('edit.slider');
    Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
    Route::get('/delete/slider/{id}', 'DeleteSlider')->name('delete.slider');

});

Route::controller(OfficeController::class)->group(function(){
    Route::get('/all/office', 'AllOffice')->name('all.office');
    Route::get('/add/office', 'AddOffice')->name('add.office');
    Route::post('/store/office', 'StoreOffice')->name('store.office');
    Route::get('/edit/office/{id}', 'EditOffice')->name('edit.office');
    Route::post('/update/office', 'UpdateOffice')->name('update.office');
    Route::get('/delete/office/{id}', 'DeleteOffice')->name('delete.office');
});

Route::controller(PriceController::class)->group(function() {
    Route::get('/all/price', 'AllPrice')->name('all.price');
    Route::get('/add/price', 'AddPrice')->name('add.price');
    Route::post('/store/price', 'StorePrice')->name('store.price');
    Route::get('/edit/price/{id}', 'EditPrice')->name('edit.price');
    Route::post('/update/price', 'UpdatePrice')->name('update.price');
    Route::get('/delete/price/{id}', 'DeletePrice')->name('delete.price');

});

Route::controller(TestimonialController::class)->group(function() {
    Route::get('/all/testimonial', 'AllTestimonial')->name('all.testimonial');
    Route::get('/add/testimonial', 'AddTestimonial')->name('add.testimonial');
    Route::post('/store/testimonial', 'StoreTestimonial')->name('store.testimonial');
    Route::get('/edit/testimonial/{id}', 'EditTestimonial')->name('edit.testimonial');
    Route::post('/update/testimonial', 'UpdateTestimonial')->name('update.testimonial');
    Route::get('/delete/testimonial/{id}', 'DeleteTestimonial')->name('delete.testimonial');
});

Route::controller(ServicesController::class)->group(function() {
    Route::get('/all/services', 'AllServices')->name('all.services');
    Route::get('/add/services', 'AddServices')->name('add.services');
    Route::post('/store/services', 'StoreServices')->name('store.services');
    Route::get('/edit/services/{id}', 'EditServices')->name('edit.services');
    Route::post('/update/services', 'UpdateServices')->name('update.services');
    Route::get('/delete/services/{id}', 'DeleteServices')->name('delete.services');
});

});