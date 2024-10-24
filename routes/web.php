<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\SliderBannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Public routes 
Route::get('/admin', [AuthenticatedSessionController::class, 'login'])->name('admin');
Route::post('/admin/dashboard', [AuthenticatedSessionController::class, 'store'])->name('admin.dashboard');
Route::get('test_category', [TestController::class, 'testCategory'])->name('test_category');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('admin.register');
// Public routes end

// Profile routes (protected by 'auth' start)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Profile routes (protected by 'auth' end)

// Admin routes protected by AdminMiddleware middleware
Route::prefix('admin')->middleware([AdminMiddleware::class])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    // permission start
    Route::get('/permission', [AdminController::class, 'Permission'])->name('admin.permission');
    Route::post('/users/{id}/update-permission', [AdminController::class, 'updatePermission']);
    Route::delete('/users/{id}/delete', [AdminController::class, 'deleteUser']);
    // permission end

    // blog start
    Route::get('/blog', [AdminController::class, 'blog'])->name('admin.blog');
    Route::post('/upload-blog', [AdminController::class, 'uploadBlog'])->name('admin.upload-blog');
    Route::get('/add-blog', [AdminController::class, 'addBlogPage'])->name('admin.add-blog');
    Route::post('/store-blog', [AdminController::class, 'storeBlog'])->name('admin.store-blog');
    Route::get('edit-blog/{id}', [AdminController::class, 'editBlog'])->name('admin.edit-blog');
    Route::post('update-blog/{id}', [AdminController::class, 'updateBlog'])->name('admin.update-blog');
    Route::delete('/destroy-blog/{id}', [AdminController::class, 'destroyBlog'])->name('admin.destroy-blog');
    Route::post('/posts/{id}/update-status', [AdminController::class, 'updatePermissionBlog']);
    Route::get('view-blog/{id}', [AdminController::class, 'viewBlog'])->name('admin.view-blog');
    // blog end

    // Slider Banner Start
    Route::get('/banners', [SliderBannerController::class, 'index'])->name('admin.banners');
    Route::get('/slider_banners', [SliderBannerController::class, 'create'])->name('slider_banners.create');
    Route::post('/store', [SliderBannerController::class, 'store'])->name('slider_banners.store');
    Route::get('/{id}/edit', [SliderBannerController::class, 'edit'])->name('slider_banners.edit');
    Route::put('/{id}', [SliderBannerController::class, 'update'])->name('slider_banners.update');
    Route::delete('/{id}', [SliderBannerController::class, 'destroy'])->name('slider_banners.destroy');
    // Slider Banner End

    // Category Start
    Route::get('/list_category', [CategoryController::class, 'index'])->name('list_category.list');
    Route::get('/create_category', [CategoryController::class, 'createCategories'])->name('create_category.create');
    Route::post('/store_category', [CategoryController::class, 'storeCategories'])->name('store_category.store');
    Route::get('/{id}/edit_category', [CategoryController::class, 'editCategory'])->name('edit_category.edit');
    Route::put('/{id}/update_category', [CategoryController::class, 'updateCategory'])->name('update_category.update');
    Route::delete('/{id}/destroy_category', [CategoryController::class, 'destroyCategory'])->name('destroy_category.destroy');
    Route::post('/category/{id}/update-status', [CategoryController::class, 'updateCategoryPermission']);
    // Category End

    // Pages Start
    Route::get('/pages', [PageController::class, 'index'])->name('pages.pages_list');
    Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::post('/pages/store', [PageController::class, 'store'])->name('pages.store');
    Route::get('/pages/edit/{id}', [PageController::class, 'edit'])->name('pages.edit');
    Route::put('/pages/update/{id}', [PageController::class, 'update'])->name('pages.update');
    Route::get('pages/{slug}', [PageController::class, 'view'])->name('pages.view');
    Route::delete('/pages/destroy/{id}', [PageController::class, 'destroy'])->name('pages.destroy');
    // Pages End
    
    // Menue
    Route::get('menus', [MenuController::class, 'index'])->name('menus');
    Route::post('menus/update', [MenuController::class, 'update'])->name('menu.update');
    Route::post('menus/store', [MenuController::class, 'store'])->name('menu.store');
    Route::post('menus/update-order', [MenuController::class, 'updateOrder'])->name('menus.update-order');
    Route::delete('/menus/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');
    // Menue End
});


require __DIR__ . '/auth.php';
