<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
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
use App\Http\Controllers\CookieConsentController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaidPackageController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PredictController;
use App\Http\Controllers\ShortLinkController;
use App\Http\Controllers\UploadCutofController;
use App\Http\Controllers\RazorpayPaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayController;
use App\Http\Controllers\YouTubeController;

// Route::get('/payment/initiate/{id}', [PayController::class, 'initiatePayment'])->name('bodmas.payment');
// Route::post('/payment/process/', [PayController::class, 'index'])->name('payment.process');
// Route::post('/payment/response', [PayController::class, 'handleResponse'])->name('payment.response');
Route::get('/sitemap.xml', function () {
    return response()->file(storage_path('app/public/sitemap.xml'), ['Content-Type' => 'application/xml']);
});
Route::get('enquiry-form', [App\Http\Controllers\Page\PagesController::class, 'LeadForm'])->name('enquiry-form');
// cookies 
Route::get('getStatesByCourse', [App\Http\Controllers\Page\PagesController::class, 'getStatesByCourse'])->name('getStatesByCourse');
Route::post('cookie/cookie-consent', [CookieConsentController ::class, 'store'])->name('cookie');
Route::get('video-meeting-counselling',[App\Http\Controllers\Page\PagesController::class, 'metting'])->name('video-meeting-counselling');
// cookies end
// payments Razorpay Paid Guidance
Route::get('/payment/initiate/{id}', [RazorpayPaymentController::class, 'initiatePayment'])->name('bodmas.payment');
Route::post('/payment/verify', [RazorpayPaymentController::class, 'verifyPayment'])->name('payment.verify');
Route::post('/payment/process', [RazorpayPaymentController::class, 'processPayment'])->name('payment.process');
Route::get('/payment/success/{id}', [RazorpayPaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/failed', [RazorpayPaymentController::class, 'failed'])->name('payment.failed');
Route::get('/payment/paymentList/', [PayController::class, 'paymentList'])->name('payment.paymentList');
// payments Razorpay Paid Guidance End
Route::get('bodmas/enquiry',[App\Http\Controllers\Page\PagesController::class, 'sendMailPage'])->name('bodmas.enquiry');
// Paid Cutoff Payment
Route::post('/payment/paidcutoff', [RazorpayPaymentController::class, 'paidcutoff'])->name('payment.paidcutoff');
// Paid Cutoff Payment End

// Display College by slug
Route::get('/show/college/{slug}', [App\Http\Controllers\Page\PagesController::class, 'showCollege'])->name('show.college');
// Route::get('/{state}/{course}/{slug}', [App\Http\Controllers\Page\PagesController::class, 'showCollege'])->name('show.college');

// Footer route 	
Route::post('/enquiry', [App\Http\Controllers\Page\PagesController::class, 'enquiryContact'])->name('enquiry.contact');
Route::post('/partner', [App\Http\Controllers\Page\PagesController::class, 'becomPartner'])->name('enquiry.partner');
Route::post('/faq', [App\Http\Controllers\Page\PagesController::class, 'index'])->name('faq');
Route::post('/mcc-counselling', [App\Http\Controllers\Page\PagesController::class, 'index'])->name('mcc-counselling');
Route::post('/payment-term', [App\Http\Controllers\Page\PagesController::class, 'index'])->name('payment-term');
Route::post('/educational-loan', [App\Http\Controllers\Page\PagesController::class, 'index'])->name('educational-loan');
Route::post('/bodmas-gallery', [App\Http\Controllers\Page\PagesController::class, 'index'])->name('bodmas-gallery');
Route::post('/franchise', [App\Http\Controllers\Page\PagesController::class, 'index'])->name('franchise');
Route::post('/all-notification', [App\Http\Controllers\Page\PagesController::class, 'index'])->name('all-notification');
Route::post('/become-a-partner', [App\Http\Controllers\Page\PagesController::class, 'index'])->name('become-a-partner');
Route::post('/education-loan-for-mbbs-students', [App\Http\Controllers\Page\PagesController::class, 'index'])->name('education-loan-for-mbbs-students');
Route::post('/neet-ug-counselling-2025', [App\Http\Controllers\Page\PagesController::class, 'index'])->name('neet-ug-counselling-2025');
Route::post('/all-states', [App\Http\Controllers\Page\PagesController::class, 'index'])->name('all-states');
// End footer route
Route::post('/blog-all-posts', [App\Http\Controllers\Page\PagesController::class, 'index'])->name('blog-all-posts');
Route::get('/get_blogs_by_category', [App\Http\Controllers\Page\PagesController::class, 'getPosts'])->name('get_blogs_by_category');
Route::get('/get_notice_by_state', [App\Http\Controllers\Page\PagesController::class, 'getNotice'])->name('get_notice_by_state');
// Paid Guidance package
Route::post('/all-paid-guidance', [App\Http\Controllers\Page\PagesController::class, 'index'])->name('all-paid-guidance');
Route::post('/predictor/jee-main-college-predictor-2025', [App\Http\Controllers\Page\PagesController::class, 'index'])->name('predictor/jee-main-college-predictor-2025');
// End Paid Guidance Package 
// Predictor
Route::get('/get-categories', [CategoryController::class, 'getCategories']);
Route::get('/get-subcategories', [CategoryController::class, 'getSubcategories']);
Route::post('predict/college', [PredictController::class, 'college'])->name('predict.college');
Route::get('/predictor/list', [PredictController::class, 'predictor'])->name('predictor.list');
Route::get('/get-colleges-by-state', [PredictController::class, 'getCollegesByState']);
// Predictor End

// Chatbot
Route::get('/chat/message', [ChatController::class, 'chatWidgets'])->name('chat.message');
Route::post('/chat/createChat', [ChatController::class, 'createChat'])->name('chat.createChat');
// Chatbot end

// Public routes 
Route::get('/', [PagesController::class, 'home'])->name('/');
Route::get('/admin', [AuthenticatedSessionController::class, 'login'])->name('admin');
// Route::get('/login', [AuthenticatedSessionController::class, 'login'])->name('login');
Route::post('/admin/dashboard', [AuthenticatedSessionController::class, 'store'])->name('admin.dashboard');
Route::get('test_category', [TestController::class, 'testCategory'])->name('test_category');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('admin.register');
Route::get('/forgot-password', [PasswordController::class, 'crforgot-passwordeate'])->name('admin.forgot-password');
Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
->name('password.reset');
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
    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('dashboard');

    // permission start
    Route::get('/permission', [AdminController::class, 'Permission'])->name('admin.permission');
    Route::post('users/{id}/update-role', [AdminController::class, 'updateRole'])->name('update.role');
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
    Route::post('/autosave', [AdminController::class, 'autoSave'])->name('admin.autosave');
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
    Route::get('pages/show/{id}', [PageController::class, 'view'])->name('pages.view');
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

    // Paid Cutoff Start
    Route::get('/package/package_list', [PackageController::class, 'index'])->name('package.package_list');
    Route::get('/packages/show/{id}', [PackageController::class, 'show'])->name('packages.show');
    Route::post('/package/store', [PackageController::class, 'store'])->name('package.store');
    Route::get('/package/edit/{id}', [PackageController::class, 'edit'])->name('package.edit');
    Route::post('/package/update/{id}', [PackageController::class, 'update'])->name('package.update');
    Route::delete('/package/destroy/{id}', [PackageController::class, 'destroy'])->name('package.destroy');
    // Paid Cutoff End

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
 
   // Guidance 
   Route::get('/guidance/list', [ PaidPackageController::class, 'index'])->name('guidance.list');
   Route::get('/guidance/create', [PaidPackageController::class, 'create'])->name('guidance.create');
   Route::post('/guidance/store', [PaidPackageController::class, 'store'])->name('guidance.store');
   Route::get('/guidance/edit/{id}', [PaidPackageController::class, 'edit'])->name('guidance.edit');
   Route::post('/guidance/update/{id}', [PaidPackageController::class, 'update'])->name('guidance.update');
   Route::get('guidance/{id}', [PaidPackageController::class, 'show'])->name('guidance.view');
   Route::delete('/guidance/destroy/{id}', [PaidPackageController::class, 'destroy'])->name('guidance.destroy');
  // Guidance End

    // Gallery Start
    Route::get('/gallery/gallery_list', [GalleryController::class, 'index'])->name('gallery.gallery_list');
    Route::get('/gallery/show/{id}', [GalleryController::class, 'show'])->name('gallery.show');
    Route::get('/gallery/add', [GalleryController::class, 'add'])->name('gallery.add');
    Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::post('/gallery/update/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/destroy/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
    // Gallery End

    // Lead List Start 
    Route::get('/lead/list', [PartnerController::class, 'index'])->name('partner.list');
    Route::get('/lead/add', [PartnerController::class, 'create'])->name('lead.add');
    Route::post('/lead/store', [PartnerController::class, 'store'])->name('lead.store');
    Route::put('/leads/assign/{id}', [PartnerController::class, 'assignLead'])->name('lead.assign');
    Route::get('/assigned/leads', [PartnerController::class, 'assignedLead'])->name('assigned.leads');
    // Lead End

    // College Form
    Route::get('/form/form_list', [FormController::class, 'index'])->name('form.form_list');
    Route::get('/form/add', [FormController::class, 'create'])->name('form.add');
    Route::post('/form/store', [FormController::class, 'store'])->name('form.store');
    Route::get('/form/edit/{id}', [FormController::class, 'edit'])->name('form.edit');
    Route::post('/form/update/{id}', [FormController::class, 'update'])->name('form.update');
    Route::delete('/form/destroy/{id}', [FormController::class, 'destroy'])->name('form.destroy');
    // College Form End
    
    // Offer Start
    Route::get('/offer/offer_list', [OfferController::class, 'index'])->name('offer.offer_list');
    Route::get('/offer/add', [OfferController::class, 'create'])->name('offer.add');
    Route::post('/offer/store', [OfferController::class, 'store'])->name('offer.store');
    Route::get('/offer/edit/{id}', [OfferController::class, 'edit'])->name('offer.edit');
    Route::post('/offer/update/{id}', [OfferController::class, 'update'])->name('offer.update');
    Route::delete('/offer/destroy/{id}', [OfferController::class, 'destroy'])->name('offer.destroy');
    // Offer End

      // You Tube Start
      Route::get('/youtube/vedio_list', [YouTubeController::class, 'index'])->name('youtube.vedio_list');
      Route::get('/youtube/add', [YouTubeController::class, 'create'])->name('youtube.add');
      Route::post('/youtube/store', [YouTubeController::class, 'store'])->name('youtube.store');
      Route::get('/youtube/edit/{id}', [OfferController::class, 'edit'])->name('youtube.edit');
      Route::delete('/youtube/destroy/{id}', [YouTubeController::class, 'destroy'])->name('youtube.destroy');
      // youtube End
});
Route::get('/links/getlinks', [App\Http\Controllers\Page\PagesController::class, 'getLink'])->name('links.getlinks');
Route::get('/get-states', [CategoryController::class, 'getStates']);
Route::get('homePopup', [TestController::class, 'homePopup'])->name('homePopup');
Route::get('blog_details/{slug}', [App\Http\Controllers\Page\PagesController::class, 'blogDetails'])->name('blog_details');
Route::get('/packages/by-category/{id}', [PackageController::class, 'getPackagesByCategory'])->name('package.byCategory');
Route::get('/{slug?}', [PagesController::class, 'index'])->where('slug', '.*');
Route::get('contact', [App\Http\Controllers\Page\PagesController::class, 'index'])->name('contact');
Route::get('about', [PageController::class, 'index'])->name('about');
Route::get('privacy-policy', [App\Http\Controllers\Page\PagesController::class, 'index'])->name('privacy-policy');

require __DIR__ . '/auth.php';
