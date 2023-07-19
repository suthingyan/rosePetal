<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//User
Route::get('/redirect',[HomeController::class,'redirect']);
Route::get('/',[HomeController::class,'index'])->name('user#home');
Route::get('/detailProduct/{id}',[HomeController::class,'detailProduct'])->name('user#detailProduct');
Route::get('/searchProduct',[HomeController::class,'searchProduct'])->name('user#searchProduct');
Route::post('/order/{id}',[HomeController::class,'order'])->name('user#order');
Route::get('/showCart',[HomeController::class,'showCart'])->name('user#showCart');
Route::get('/decQty/{id}',[HomeController::class,'decQty'])->name('user#decQty');
Route::get('/incQty/{id}',[HomeController::class,'incQty'])->name('user#incQty');
Route::get('/deleteOrder/{id}',[HomeController::class,'deleteOrder'])->name('user#deleteOrder');
Route::post('/confirmOrder',[HomeController::class,'confirmOrder'])->name('user#confirmOrder');
Route::get('/orderConfirmList',[HomeController::class,'orderConfirmList'])->name('user#orderConfirmList');
Route::get('/adminConfirm',[HomeController::class,'adminConfirm'])->name('user#adminConfirm');
Route::get('/ourProducts',[HomeController::class,'ourProducts'])->name('user#ourProducts');
Route::get('/aboutUsUser',[HomeController::class,'aboutUsUser'])->name('user#aboutUsUser');
Route::get('/contactUsUser',[HomeController::class,'contactUsUser'])->name('user#contactUsUser');
Route::get('/slider',[HomeController::class,'slider'])->name('user#slider');
Route::post('/uploadReview',[HomeController::class,'uploadReview'])->name('user#uploadReview');
//Admin
Route::get('/adminproduct',[AdminController::class,'product'])->name('admin#index');
Route::post('/uploadProduct',[AdminController::class,'uploadProduct'])->name('admin#uploadProduct');
Route::get('/productList',[AdminController::class,'productList'])->name('admin#productList');
//color
Route::get('/color',[AdminController::class,'color'])->name('admin#color');
Route::post('/uploadColor',[AdminController::class,'uploadColor'])->name('admin#uploadColor');
Route::get('/colorList',[AdminController::class,'colorList'])->name('admin#colorList');
Route::get('/colorEdit/{id}',[AdminController::class,'colorEdit'])->name('admin#colorEdit');
Route::post('/updateColor/{id}',[AdminController::class,'updateColor'])->name('admin#updateColor');
Route::get('/deleteColor/{id}',[AdminController::class,'deleteColor'])->name('admin#deleteColor');
//size
Route::get('/size',[AdminController::class,'size'])->name('admin#size');
Route::post('/uploadSize',[AdminController::class,'uploadSize'])->name('admin#uploadSize');
Route::get('/sizeList',[AdminController::class,'sizeList'])->name('admin#sizeList');
Route::get('/sizeEdit/{id}',[AdminController::class,'sizeEdit'])->name('admin#sizeEdit');
Route::post('/updateSize/{id}',[AdminController::class,'updateSize'])->name('admin#updateSize');
Route::get('/deleteSize/{id}',[AdminController::class,'deleteSize'])->name('admin#deleteSize');

Route::get('/searchProductList',[AdminController::class,'searchProductList'])->name('admin#searchProductList');
Route::get('/pending/{id}',[AdminController::class,'pending'])->name('admin#pending');
Route::get('/featured/{id}',[AdminController::class,'featured'])->name('admin#featured');
Route::get('/popular/{id}',[AdminController::class,'popular'])->name('admin#popular');
Route::get('/productEdit/{id}',[AdminController::class,'productEdit'])->name('admin#productEdit');
Route::post('/productUpdate/{id}',[AdminController::class,'productUpdate'])->name('admin#productUpdate');
Route::get('/productDelete/{id}',[AdminController::class,'productDelete'])->name('admin#productDelete');

Route::get('/sliderAdmin',[AdminController::class,'slider'])->name('admin#slider');
Route::get('/storeSlider',[AdminController::class,'storeSlider'])->name('admin#storeSlider');
Route::post('/uploadSlider',[AdminController::class,'uploadSlider'])->name('admin#uploadSlider');
Route::get('/sliderEdit/{id}',[AdminController::class,'sliderEdit'])->name('admin#sliderEdit');
Route::post('/sliderUpdate/{id}',[AdminController::class,'sliderUpdate'])->name('admin#sliderUpdate');
Route::get('/sliderDelete/{id}',[AdminController::class,'sliderDelete'])->name('admin#sliderDelete');


Route::get('/showOrder',[AdminController::class,'showOrder'])->name('admin#showOrder');
Route::get('/reject/{id}',[AdminController::class,'reject'])->name('admin#reject');
Route::post('/updateStatus/{id}',[AdminController::class,'updateStatus'])->name('admin#updateStatus');
Route::get('/aboutUsAdmin',[AdminController::class,'aboutUs'])->name('admin#aboutUs');
Route::get('/storeAboutUs',[AdminController::class,'storeAboutUs'])->name('admin#storeAboutUs');
Route::post('/uploadAboutUs',[AdminController::class,'uploadAboutUs'])->name('admin#uploadAboutUs');
Route::get('/aboutUsEdit/{id}',[AdminController::class,'aboutUsEdit'])->name('admin#aboutUsEdit');
Route::post('/aboutUsUpdate/{id}',[AdminController::class,'aboutUsUpdate'])->name('admin#aboutUsUpdate');
Route::get('/aboutUsDelete/{id}',[AdminController::class,'aboutUsDelete'])->name('admin#aboutUsDelete');

Route::get('/contactUsAdmin',[AdminController::class,'contactUs'])->name('admin#contactUs');
Route::get('/storeContactUs',[AdminController::class,'storeContactUs'])->name('admin#storeContactUs');
Route::post('/uploadContactUs',[AdminController::class,'uploadContactUs'])->name('admin#uploadContactUs');
Route::get('/contactUsEdit/{id}',[AdminController::class,'contactUsEdit'])->name('admin#contactUsEdit');
Route::post('/contactUsUpdate/{id}',[AdminController::class,'contactUsUpdate'])->name('admin#contactUsUpdate');
Route::get('/contactUsDelete/{id}',[AdminController::class,'contactUsDelete'])->name('admin#contactUsDelete');

Route::get('/admincategory',[AdminController::class,'category'])->name('admin#category');
Route::post('/uploadCategory',[AdminController::class,'uploadCategory'])->name('admin#uploadCategory');
Route::get('/categoryList',[AdminController::class,'categoryList'])->name('admin#categoryList');
Route::get('/searchCategoryList',[AdminController::class,'searchCategoryList'])->name('admin#searchCategoryList');
Route::get('/categoryEdit/{id}',[AdminController::class,'categoryEdit'])->name('admin#categoryEdit');
Route::post('/categoryUpdate/{id}',[AdminController::class,'categoryUpdate'])->name('admin#categoryUpdate');
Route::get('/categoryDelete/{id}',[AdminController::class,'categoryDelete'])->name('admin#categoryDelete');

Route::get('/adminsubCategory',[AdminController::class,'subCategory'])->name('admin#subCategory');
Route::post('/uploadSubCategory',[AdminController::class,'uploadSubCategory'])->name('admin#uploadSubCategory');
Route::get('/subCategoryList',[AdminController::class,'subCategoryList'])->name('admin#subCategoryList');
Route::get('/searchSubCategoryList',[AdminController::class,'searchSubCategoryList'])->name('admin#searchSubCategoryList');
Route::get('/subCategoryEdit/{id}',[AdminController::class,'subCategoryEdit'])->name('admin#subCategoryEdit');
Route::post('/subCategoryUpdate/{id}',[AdminController::class,'subCategoryUpdate'])->name('admin#subCategoryUpdate');
Route::get('/subCategoryDelete/{id}',[AdminController::class,'subCategoryDelete'])->name('admin#subCategoryDelete');
