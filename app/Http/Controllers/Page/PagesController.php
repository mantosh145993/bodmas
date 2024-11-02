<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\MenuHelper;
use App\Models\Page;
use App\Models\Message;

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

    public function index($slug)
    {
        if ($slug === 'admin' || $slug === 'login') {
            return view('admin.login');
        }
        $page = Page::where('slug', $slug)->first();

        if ($page) {
            $id = $page->id;
            $menus = $this->menuHelper->getMenu();
            $banner = $this->menuHelper->getBanner($id);

            return view('front.home.showPage', [
                'page' => $page,
                'menus' => $menus,
                'banner' => $banner
            ]);
        }
    }


    // public function page($slug)
    // {
    //     $page = Page::where('slug', $slug)->firstOrFail();
    //     $id = $page->id;
    //     $menus = $this->menuHelper->getMenu();
    //     $banner = $this->menuHelper->getBanner($id);
    //     return view('front.home.showPage', [
    //         'page' => $page,
    //         'menus' => $menus,
    //         'banner' => $banner
    //     ]);
    // }
}
