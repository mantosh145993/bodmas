<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\MenuHelper;
use App\Models\Course;
use App\Models\Page;
use App\Models\Message;
use App\Models\Category\Category;
use App\Models\College;
use App\Models\State;
use App\Models\Medical;
use App\Models\ShortLink;
use App\Models\Package;
use App\Models\Post;
use Carbon\Carbon;
use App\Models\Notice;
use Illuminate\Support\Facades\DB;
use App\Mail\EnquiryMail;
use Illuminate\Support\Facades\Mail;
use App\Models\PaidPackage;

class PagesController extends Controller
{
    protected $menuHelper;
    public function __construct(MenuHelper $menuHelper)
    {
        $this->menuHelper = $menuHelper;
    }
    public function home()
    {
        $menus = $this->menuHelper->getMenu();
        $messages = Message::all();
        $paidPackages = PaidPackage::all();
        // dd($paidPackages);die;
        $blogs = Post::where('is_active', '1')->get();
        $notices = Notice::all();
        return view('front.home.index', [
            'menus' => $menus,
            'banners' => $this->menuHelper->getSlider(),
            'states' => $this->menuHelper->getState(),
            'messages' => $messages,
            'blogs' => $blogs,
            'notices' => $notices,
            'paidPackages' => $paidPackages
        ]);
    }
    public function blogDetails($slug)
    {
        // DB::enableQueryLog();
        $currentDate = now();
        $sevenDaysAgo = now()->subDays(7);
        $current_blogs = Post::whereBetween('published_at', [$sevenDaysAgo, $currentDate])->limit(10)->get();
        // dd(DB::getQueryLog(), $current_blogs);
        $menus = $this->menuHelper->getMenu();
        $blogs = Post::where('slug', $slug)->first();
        // dd($blogs);
        return view('front.home.blog-details', ['blogs' => $blogs, 'menus' => $menus, 'current_blogs' => $current_blogs]);
    }
    public function index($slug = null)
    {
        switch ($slug) {
            case 'admin':
                return view('admin.login');
            case 'login':
                return view('admin.login');
            case 'about':
                $blogs = Post::where('is_active', '1')->get();
                $menus = $this->menuHelper->getMenu();
                return view('front.home.about_us', [
                    'menus' => $menus,
                    'blogs' => $blogs,
                ]);
            case 'contact':
                $menus = $this->menuHelper->getMenu();
                return view('front.home.contact_us', [
                    'menus' => $menus,
                ]);
            case 'blog':
                $menus = $this->menuHelper->getMenu();
                return view('front.home.error', [
                    'menus' => $menus,
                ]);
            case 'predictor':
                $categories = Category::where('type', '1')->get();
                $course = Course::all();
                $states = State::all();
                $menus = $this->menuHelper->getMenu();
                return view('front.home.predictor', [
                    'menus' => $menus,
                    'categories' => $categories,
                    'courses' => $course,
                    'states'=>$states
                ]);
            case 'admission/college-list':
                $state = State::all();
                $colleges = College::where('type', 'Government')->paginate(5);  // 10 items per page
                $privats = College::where('type', 'Private')->paginate(5);
                $courses = Course::paginate(10);
                $menus = $this->menuHelper->getMenu();
                // dd($courses);
                return view('front.home.admision', [
                    'menus' => $menus,
                    'states' => $state,
                    'colleges' => $colleges,
                    'privats' => $privats,
                    'courses' =>$courses
                ]);
            case 'admission/cut-off':
                $Categories = Category::all();
                $packages = Package::all();
                $menus = $this->menuHelper->getMenu();
                return view('front.home.package-list', [
                    'menus' => $menus,
                    'categories' => $Categories,
                    'packages' => $packages
                ]);
            case 'admission/private':
                $menus = $this->menuHelper->getMenu();
                return view('front.home.error', [
                    'menus' => $menus
                ]);
            case 'paid-guidance-mbbs':
                $menus = $this->menuHelper->getMenu();
                $paidPackages = PaidPackage::all();
                return view('front.home.paid-guidance.paid-guidance', [
                    'menus' => $menus,
                    'paidPackages' => $paidPackages
                ]);
            case 'paid-guidance-veterinary':
                $menus = $this->menuHelper->getMenu();
                $paidPackages = PaidPackage::all();
                return view('front.home.paid-guidance.veterinary', [
                    'menus' => $menus,
                    'paidPackages' => $paidPackages
                ]);
            case 'paid-guidance-ayush':
                $paidPackages = PaidPackage::all();
                $menus = $this->menuHelper->getMenu();
                return view('front.home.paid-guidance.ayush', [
                    'menus' => $menus,
                    'paidPackages' => $paidPackages
                ]);
            case 'paid-guidance-md-ms-dnb':
                $menus = $this->menuHelper->getMenu();
                $paidPackages = PaidPackage::all();
                return view('front.home.paid-guidance.md-ms-dnb', [
                    'menus' => $menus,
                    'paidPackages' => $paidPackages
                ]);
            case 'paid-guidance-dental':
                $menus = $this->menuHelper->getMenu();
                $paidPackages = PaidPackage::all();
                return view('front.home.paid-guidance.dental', [
                    'menus' => $menus,
                    'paidPackages' => $paidPackages
                ]);
            case 'paid-guidance-nursing':
                $menus = $this->menuHelper->getMenu();
                $paidPackages = PaidPackage::all();
                return view('front.home.paid-guidance.nursing', [
                    'menus' => $menus,
                    'paidPackages' => $paidPackages
                ]);
            case 'all-paid-guidance':
                $menus = $this->menuHelper->getMenu();
                $paidPackages = PaidPackage::all();
                return view('front.home.paid-guidance.all-paid-guidance', [
                    'menus' => $menus,
                    'paidPackages' => $paidPackages
                ]);
            case 'blog-all-posts':
                $menus = $this->menuHelper->getMenu();
                $blogs = Post::orderBy('published_at', 'desc')->paginate(12);
                return view('front.home.all-posts', [
                    'menus' => $menus,
                    'blogs' => $blogs
                ]);
            default:
                $shortLink = ShortLink::where('code', $slug)->first();
                if ($shortLink) {
                    return redirect($shortLink->url);
                }
                $withoutSlashSlug = $slug;
                $slug = '/'. $slug;
                $page = Page::where('menu_slug', $slug)
                ->orWhere('slug', $withoutSlashSlug)
                ->first();
                if ($page) {
                    $packages = Package::all();
                    $id = $page->id;
                    $menus = $this->menuHelper->getMenu();
                    $banner = $this->menuHelper->getBanner($id);
                    return view('front.home.showPage', [
                        'page' => $page,
                        'menus' => $menus,
                        'banner' => $banner,
                        'packages' => $packages
                    ]);
                }
                abort(404, 'Page not found');
        }
    }
    
    public function enquiryContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string',
            'number' => 'required|numeric',
            'message' => 'required|string',
        ]);

        try {
            Mail::to('educationbodmas@gmail.com')->send(new EnquiryMail($validated));
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }


}
