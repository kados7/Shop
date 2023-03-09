<?php

use App\Http\Controllers\admin\AttributeController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\TransactionController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\TicketCategoryController;
use App\Http\Controllers\admin\TicketController;
use App\Http\Controllers\admin\TicketPriorityController;
use App\Http\Controllers\admin\TicketStatusController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\app\PriceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\home\CategoryController as HomeCategoryController;
use App\Http\Controllers\home\CompareController;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\home\PaymentController;
use App\Http\Controllers\home\PostController as HomePostController;
use App\Http\Controllers\home\ProductController as HomeProductController;
use App\Http\Controllers\home\SearchController;
use App\Http\Controllers\home\UserProfileController;
use App\Models\Product;
use App\Models\Role;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Facades\Route;

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


Route::prefix('admin/management')->name('admin.')->group(function(){
    Route::resource('dashboard',AdminController::class )->middleware('admin');
    Route::resource('users',UserController::class);
    Route::resource('permissions',PermissionController::class);
    Route::resource('roles',RoleController::class);
    Route::resource('brands',BrandController::class);
    Route::resource('attributes',AttributeController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('tags',TagController::class);
    Route::resource('products',ProductController::class);
    Route::resource('banners',BannerController::class);
    Route::resource('comments',CommentController::class);
    Route::resource('coupons',CouponController::class);
    Route::resource('orders',OrderController::class);
    Route::resource('transactions',TransactionController::class);
    Route::resource('posts',PostController::class);
    Route::resource('tickets',TicketController::class);
    Route::resource('ticketpriorities',TicketPriorityController::class);
    Route::resource('ticketstatuses',TicketStatusController::class);
    Route::resource('ticketcategories',TicketCategoryController::class);
});

Route::get('admin/management/products/{product}/images-edit',[ProductController::class , 'images_edit'])->name('admin.products.images_edit');
Route::get('admin/management/products/{product}/category-edit',[ProductController::class , 'category_edit'])->name('admin.products.category_edit');

Route::middleware('auth')->prefix('profile')->name('home.')->middleware('auth')->group(function(){
    Route::get('/',[UserProfileController::class , 'index'])->name('user_profile.index');
    Route::get('/comments',[UserProfileController::class , 'comments'])->name('user_profile.comments');
    Route::get('/wishlist',[UserProfileController::class , 'wishlist'])->name('user_profile.wishlist');
    Route::get('/address',[UserProfileController::class , 'address'])->name('user_profile.address');
    Route::get('/orders',[UserProfileController::class , 'orders'])->name('user_profile.orders');
    Route::get('/ticket',[UserProfileController::class , 'ticket'])->name('user_profile.ticket.index');
    Route::get('/ticket/{ticket:slug}',[UserProfileController::class , 'ticket_show'])->name('user_profile.ticket.show');

});


Route::get('/',[HomeController::class , 'index'])->name('home.index');
Route::get('/contact-us',[HomeController::class , 'contactUs'])->name('home.contact-us');
Route::get('/main/{category:slug}',[HomeCategoryController::class , 'show'])->name('home.categories.show');
Route::get('/product/{product:slug}',[HomeProductController::class , 'show'])->name('home.products.show');
Route::get('/post/{post:slug}',[HomePostController::class , 'show'])->name('home.post.show');

Route::get('/compare',[CompareController::class , 'index'])->name('home.compare.index');

Route::get('/cart',[CartController::class , 'index'])->name('home.cart.index');
Route::get('/checkout',[CartController::class , 'checkout'])->name('home.checkout.index');

Route::post('/payment',[PaymentController::class , 'payment'])->name('home.payment.index');
Route::get('/payment-verify',[PaymentController::class , 'paymentVerify'])->name('home.payment.verify');

Route::get('/search',[SearchController::class , 'index'])->name('home.search.index');



Route::get('/test', function(){
    // CartFacade::clear();
    // dd(CartFacade::getContent());

    // dd(auth()->user()->roles->first() , auth()->user()->roles->first()->permissions->toArray());
    $user_admin = Role::where('name','admin')->first()->users;
        dd($user_admin);
})->name('home.compare.index');
