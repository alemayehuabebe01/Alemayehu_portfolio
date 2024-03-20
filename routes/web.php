<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\ServiceController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {// gruop midelware

Route::controller(AdminController::class)->group(function (){
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'editProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');
    Route::get('/change/Password', 'ChangePassword')->name('change.Password');

    Route::post('/Update/Password', 'UpdatePassword')->name('update.password');
    Route::get('/dashboard', 'HomePage')->name('admin.index');
});

});

// home slide controller
Route::controller(HomeSliderController::class)->group(function (){
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
    Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
    Route::post('/update/about', 'UpdateAbout')->name('update.about');

});

// about page controller
Route::controller(AboutController::class)->group(function (){
    Route::get('/about/page', 'AboutPage')->name('about.page');
    Route::post('/Update/about', 'UpdateAbout')->name('update.about');
    Route::get('/home/about', 'AboutPage')->name('home.about');
    Route::get('/home/about/page', 'HomeAbout')->name('home.about.page');

    Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');
    Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image');

    Route::get('/All/multi/image', 'AllMultiImage')->name('all.multi.image');
    Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');
    Route::post('/Update/multi/image', 'UpdateMultiImage')->name('update.multi.image');

    Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');

  
});//end route


// home slide controller
Route::controller(PortfolioController::class)->group(function (){
    Route::get('/All/Portfolio', 'AllPortfolio')->name('all.portfolio');
    Route::get('/Add/Portfolio', 'AddPortfolio')->name('add.portfolio');
    Route::post('/Store/Portfolio', 'StorePortfolio')->name('store.portfolio');
    Route::get('/edit/portfolio/image/{id}', 'EditPortfolioImage')->name('edit.portfolio.data');
    Route::post('/Update/Portfolio/Data', 'UpdatePortfolioImage')->name('update.portfolio.data');
    Route::get('/delete/Portfolio/data/{id}', 'DeletePortfolioData')->name('delete.portfolio.data');
    Route::get('/Portfolio/details/{id}', 'PortfolioDetails')->name('portfolio-details');
    Route::get('/Portfolio', 'HomePortfolio')->name('home.portfolio');


    
});//end route

// Blog Categoty all route group
Route::controller(BlogCategoryController::class)->group(function (){
    Route::get('/All/Blog/Category', 'AllBlogCategory')->name('all.blog.category');
    Route::get('/Add/Blog/Category', 'AddBlogCategory')->name('add.blog.category');
    Route::post('/Store/Blog/Category', 'StoreBlogCategory')->name('store.category');
    Route::get('/Edit/Blog/Category/{id}', 'EditBlogCategory')->name('edit.blog');
    Route::get('/Delete/Blog/Category/{id}', 'DeleteBlogCategory')->name('delete.blog.data');
    Route::post('/Update/Blog/Category/{id}', 'UpdateBlogCategory')->name('update.blog.data');
    
    

});//end route

// Blog All route
Route::controller(BlogController::class)->group(function (){
    Route::get('/All/Blog', 'AllBlog')->name('all.blog');
    Route::get('/Add/Blog', 'AddBlog')->name('add.blog');
    Route::post('/Store/Blog', 'StoreBlog')->name('store.blog');
    Route::get('/Edit/Blog/{id}', 'EditBlog')->name('edit.blog.data');
    Route::post('/Update/Blog', 'UpdateBlog')->name('update.blog');
    Route::get('/Delete/Blog/{id}', 'DeleteBlog')->name('delete.blog.data');
    Route::get('/Blog/Details/{id}', 'BlogDetails')->name('blog.details');
    Route::get('/Category/Blog/{id}', 'CategoryBlog')->name('category.blog');
    Route::get('/Blog', 'HomeBlog')->name('home.blog');

   

});//end route

// home footer controller
Route::controller(FooterController::class)->group(function (){
    Route::get('/Footer/Setup', 'FooterSetup')->name('footer.setup');
    Route::post('/Update/Footer', 'UpdateFooter')->name('update.footer');
    

});//end route

// home footer controller
Route::controller(ContactController::class)->group(function (){
    Route::get('/', 'MainHome')->name('home');
    Route::get('/Contact', 'ContactPage')->name('contact.me');
    Route::post('/Store/Message', 'StoreMessage')->name('store.message');
    Route::get('/All/Message', 'AllMessage')->name('all.message');
    Route::get('/Delete/Message/{id}', 'DeleteMessage')->name('delete.message');
    
    

});//end route

Route::controller(ServiceController::class)->group(function (){
    Route::get('/Services', 'AllService')->name('all.service');
    Route::get('/Add/Services', 'AddService')->name('add.service');
    Route::post('/Store/Service', 'StoreService')->name('store.service');
    Route::get('/Services/Details', 'ServiceDetails')->name('home.service');
    
    
    

});//end route




require __DIR__.'/auth.php';
