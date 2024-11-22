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
use App\Http\Controllers\Page\PagesController;
use App\Http\Controllers\PageBannerController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PredictController;
use App\Http\Controllers\ShortLinkController;
use App\Http\Controllers\UploadCutofController;
use Illuminate\Support\Facades\Route;


//Home
Route::get('/', [PagesController::class, 'home'])->name('/');
Route::post('predict/college', [PredictController::class, 'college'])->name('predict.college');
// Chatbot
Route::get('/chat/message', [ChatController::class, 'chatWidgets'])->name('chat.message');
Route::post('/chat/createChat', [ChatController::class, 'createChat'])->name('chat.createChat');
// Chatbot end
// Public routes 
Route::get('/admin', [AuthenticatedSessionController::class, 'login'])->name('admin');
Route::get('/login', [AuthenticatedSessionController::class, 'login'])->name('login');
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
    Route::get('slider_banners/slider_banners', [SliderBannerController::class, 'create'])->name('slider_banners.create');
    Route::post('slider_banners/store', [SliderBannerController::class, 'store'])->name('slider_banners.store');
    Route::get('slider_banners/{id}/edit', [SliderBannerController::class, 'edit'])->name('slider_banners.edit');
    Route::put('slider_banners/{id}', [SliderBannerController::class, 'update'])->name('slider_banners.update');
    Route::delete('slider_banners/{id}', [SliderBannerController::class, 'destroy'])->name('slider_banners.destroy');
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
    Route::post('menus/store', [MenuController::class, 'store'])->name('menu.store');
    Route::get('menus/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
    Route::post('menus/update/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::post('menus/update-order', [MenuController::class, 'updateOrder'])->name('menus.update-order');
    Route::delete('/menus/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');
    // Menue End

    // Banner 
    Route::get('pageBanner', [PageBannerController::class, 'index'])->name('banner.page');
    Route::get('/createBanner', [PageBannerController::class, 'create'])->name('banner.create');
    Route::post('/store', [PageBannerController::class, 'store'])->name('banner.store');
    Route::get('/{id}/edit', [PageBannerController::class, 'edit'])->name('banner.edit');
    Route::put('banner/{id}', [PageBannerController::class, 'update'])->name('banner.update');
    Route::get('banner/{id}/view', [PageBannerController::class, 'view'])->name('banner.view');
    Route::delete('/{id}', [PageBannerController::class, 'destroy'])->name('banner.destroy');
    // Banner End

    // Chat Start
    Route::get('/chat/chat_list', [ChatController::class, 'index'])->name('chat.chat_list');
    Route::get('/chat/create', [ChatController::class, 'create'])->name('chat.create');
    Route::post('/chat/store', [ChatController::class, 'store'])->name('chat.store');
    Route::get('/chat/edit/{id}', [ChatController::class, 'edit'])->name('chat.edit');
    Route::put('/chat/update/{id}', [ChatController::class, 'update'])->name('chat.update');
    Route::get('chat/{slug}', [ChatController::class, 'show'])->name('chat.view');
    Route::delete('/chat/destroy/{id}', [ChatController::class, 'destroy'])->name('chat.destroy');
    // Chat End

    // Medical Start
    Route::get('/cutoff/cutoff_list', [UploadCutofController::class, 'index'])->name('cutoff.list');
    Route::get('medical/data', [UploadCutofController::class, 'fetchMedicalData'])->name('medical.data');
    Route::post('upload', [UploadCutofController::class, 'upload'])->name('cutoff.import');
    Route::get('export', [UploadCutofController::class, 'export'])->name('cutoff.export');
    // Medical End

    // Route to create a new short link
    Route::get('/shortlink', [ShortLinkController::class, 'linkPage'])->name('short.link');
    Route::post('/shorten', [ShortLinkController::class, 'store'])->name('short.store');
    // end shorten url

    // Package Start
    Route::get('/package/package_list', [PackageController::class, 'index'])->name('package.package_list');
    Route::get('/packages/show/{id}', [PackageController::class, 'show'])->name('packages.show');
    Route::post('/package/store', [PackageController::class, 'store'])->name('package.store');
    Route::get('/package/edit/{id}', [PackageController::class, 'edit'])->name('package.edit');
    Route::post('/package/update/{id}', [PackageController::class, 'update'])->name('package.update');
    Route::delete('/package/destroy/{id}', [PackageController::class, 'destroy'])->name('package.destroy');
    // Package End

    // Notice Start
    Route::get('/notice/notice_list', [NoticeController::class, 'index'])->name('notice.notice_list');
    Route::get('/package/show/{id}', [NoticeController::class, 'show'])->name('notice.show');
    Route::post('/notice/store', [NoticeController::class, 'store'])->name('notice.store');
    Route::get('/notice/edit/{id}', [NoticeController::class, 'edit'])->name('notice.edit');
    Route::post('/notice/update/{id}', [NoticeController::class, 'update'])->name('notice.update');
    Route::delete('/notice/destroy/{id}', [NoticeController::class, 'destroy'])->name('notice.destroy');
    // Notice End

    // College Start
    Route::get('/college/college_list', [CollegeController::class, 'index'])->name('college.college_list');
    Route::get('/college/add', [CollegeController::class, 'create'])->name('college.add');
    Route::post('/college/store', [CollegeController::class, 'store'])->name('college.store');
    Route::get('/college/edit/{id}', [CollegeController::class, 'edit'])->name('college.edit');
    Route::post('/college/update/{id}', [CollegeController::class, 'update'])->name('college.update');
    Route::delete('/college/destroy/{id}', [CollegeController::class, 'destroy'])->name('college.destroy');
    // College End
 
    // Predictor
    Route::get('/predictor/list', [CollegeController::class, 'predictor'])->name('predictor.list');

});
Route::get('/get-colleges-by-state', [CollegeController::class, 'getCollegesByState']);
Route::get('/get-categories', [CategoryController::class, 'getCategories']);
Route::get('/get-subcategories', [CategoryController::class, 'getSubcategories']);
Route::get('/get-states', [CategoryController::class, 'getStates']);
Route::get('homePopup', [TestController::class, 'homePopup'])->name('homePopup');
Route::get('blog_details/{slug}', [App\Http\Controllers\Page\PagesController::class, 'blogDetails'])->name('blog_details');
Route::get('/packages/by-category/{id}', [PackageController::class, 'getPackagesByCategory'])->name('package.byCategory');
Route::get('/{slug?}', [PagesController::class, 'index'])->where('slug', '.*');
Route::get('contact', [PageController::class, 'index'])->name('contact');
Route::get('about', [PageController::class, 'index'])->name('about');
Route::get('privacy-policy', [App\Http\Controllers\Page\PagesController::class, 'index'])->name('privacy-policy');
require __DIR__ . '/auth.php';
