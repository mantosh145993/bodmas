<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\MenuHelper;
use App\Models\Course;
use App\Models\Page;
use App\Models\Message;
use App\Models\Category\Category;
use App\Models\State;
use App\Models\Medical;
use App\Models\ShortLink;
use App\Models\Package;
use App\Models\Post;
use Carbon\Carbon;
use App\Models\Notice;
use Illuminate\Support\Facades\DB;

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
        $blogs = Post::where('is_active', '1')->get();
        $notices = Notice::all();
        return view('front.home.index', [
            'menus' => $menus,
            'banners' => $this->menuHelper->getSlider(),
            'states' => $this->menuHelper->getState(),
            'messages' => $messages,
            'blogs' => $blogs,
            'notices' => $notices
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
                $menus = $this->menuHelper->getMenu();
                return view('front.home.about_us', [
                    'menus' => $menus
                ]);
            case 'contact':
                $menus = $this->menuHelper->getMenu();
                return view('front.home.contact_us', [
                    'menus' => $menus
                ]);
            case 'predictor':
                $categories = Category::take(7)->get();
                $course = Course::all();
                $menus = $this->menuHelper->getMenu();
                return view('front.home.predictor', [
                    'menus' => $menus,
                    'categories' => $categories,
                    'courses' => $course
                ]);
            case 'admission/government':
                $state = State::all();
                $colleges = Medical::paginate(3);
                $menus = $this->menuHelper->getMenu();
                return view('front.home.admision', [
                    'menus' => $menus,
                    'states' => $state,
                    'colleges' => $colleges
                ]);
            case 'admission/cut-off':
                $Categories = Category::all();
                $packages = Package::all();
                // dd($packages);
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
            case 'contact':
                $menus = $this->menuHelper->getMenu();
                return view('front.home.contact', [
                    'menus' => $menus,
                ]);
            case 'blog':
                $menus = $this->menuHelper->getMenu();
                return view('front.home.error', [
                    'menus' => $menus,
                ]);
            default:
                $shortLink = ShortLink::where('code', $slug)->first();
                if ($shortLink) {
                    return redirect($shortLink->url);
                }
                $slug = '/' . $slug;
                $page = Page::where('menu_slug', $slug)->first();
                if ($page) {
                    $id = $page->id;
                    $menus = $this->menuHelper->getMenu();
                    $banner = $this->menuHelper->getBanner($id);
                    return view('front.home.showPage', [
                        'page' => $page,
                        'menus' => $menus,
                        'banner' => $banner,
                    ]);
                }
                abort(404, 'Page not found');
        }
    }
}
