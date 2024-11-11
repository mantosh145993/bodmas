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
        return view('front.home.index', [
            'menus' => $menus,
            'banners' => $this->menuHelper->getSlider(),
            'states' => $this->menuHelper->getState(),
            'messages' => $messages
        ]);
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
                $categories = Category::all();
                $course = Course::all();
                $menus = $this->menuHelper->getMenu();
                return view('front.home.predictor', [
                    'menus' => $menus,
                    'categories'=>$categories,
                    'courses' =>$course
                ]);
            case 'admission/government':
                $state = State::all();
                $colleges = Medical::paginate(3);
                $menus = $this->menuHelper->getMenu();
                return view('front.home.admision', [
                    'menus' => $menus,
                    'states' => $state,
                    'colleges'=>$colleges
                ]);
            case 'contact':
                $menus = $this->menuHelper->getMenu();
                return view('front.home.contact', [
                    'menus' => $menus,
                ]);
            case 'blog':
                $menus = $this->menuHelper->getMenu();
                return view('front.home.blog', [
                    'menus' => $menus,
                ]);
            default:
                $shortLink = ShortLink::where('code', $slug)->first();
                if ($shortLink) {
                    return redirect($shortLink->url);
                }
                $slug = '/'.$slug;
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
