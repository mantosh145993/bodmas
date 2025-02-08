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
use App\Models\Partner;
use App\Models\GalleryEvent;
use App\Models\Link;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Razorpay\Api\Api;

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
        $blogs = Post::where('is_active', '1')->get();
        $notices = Notice::orderBy('created_at', 'desc')->get();
        $events = GalleryEvent::all();
        return view('front.home.index', [
            'menus' => $menus,
            'banners' => $this->menuHelper->getSlider(),
            'states' => $this->menuHelper->getState(),
            'messages' => $messages,
            'blogs' => $blogs,
            'notices' => $notices,
            'paidPackages' => $paidPackages,
            'events' => $events
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
                $paidCutoffs = Package::all();
                $menus = $this->menuHelper->getMenu();
                return view('front.home.predictor', [
                    'menus' => $menus,
                    'categories' => $categories,
                    'courses' => $course,
                    'states' => $states,
                    'paidCutoffs' => $paidCutoffs
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
                    'courses' => $courses
                ]);
            case 'admission/application-link':
                $states = State::all();
                $links = Link::where('status', 'active')->get();
                $menus = $this->menuHelper->getMenu();
                return view('front.home.link-list', [
                    'menus' => $menus,
                    'states' => $states,
                    'links' => $links
                ]);
            case 'admission/private':
                $menus = $this->menuHelper->getMenu();
                return view('front.home.error', [
                    'menus' => $menus
                ]);
            case 'paid-guidance-mbbs':
                $menus = $this->menuHelper->getMenu();
                $paidPackages = PaidPackage::all();
                $packages = PaidPackage::where('url', 'paid-guidance-mbbs')->firstOrFail();
                // dd($packages);
                return view('front.home.paid-guidance.paid-guidance', [
                    'menus' => $menus,
                    'paidPackages' => $paidPackages,
                    'package' => $packages
                ]);
            case 'paid-guidance-veterinary':
                $packages = PaidPackage::where('url', 'paid-guidance-veterinary')->firstOrFail();
                $menus = $this->menuHelper->getMenu();
                $paidPackages = PaidPackage::all();
                return view('front.home.paid-guidance.veterinary', [
                    'menus' => $menus,
                    'paidPackages' => $paidPackages,
                    'package' => $packages
                ]);
            case 'paid-guidance-ayush':
                $packages = PaidPackage::where('url', 'paid-guidance-ayush')->firstOrFail();
                $paidPackages = PaidPackage::all();
                $menus = $this->menuHelper->getMenu();
                return view('front.home.paid-guidance.ayush', [
                    'menus' => $menus,
                    'paidPackages' => $paidPackages,
                    'package' => $packages
                ]);
            case 'paid-guidance-md-ms-dnb':
                $packages = PaidPackage::where('url', 'paid-guidance-md-ms-dnb')->firstOrFail();
                $menus = $this->menuHelper->getMenu();
                $paidPackages = PaidPackage::all();
                return view('front.home.paid-guidance.md-ms-dnb', [
                    'menus' => $menus,
                    'paidPackages' => $paidPackages,
                    'package' => $packages
                ]);
            case 'paid-guidance-dental':
                $packages = PaidPackage::where('url', 'paid-guidance-dental')->firstOrFail();
                $menus = $this->menuHelper->getMenu();
                $paidPackages = PaidPackage::all();
                return view('front.home.paid-guidance.dental', [
                    'menus' => $menus,
                    'paidPackages' => $paidPackages,
                    'package' => $packages
                ]);
            case 'paid-guidance-nursing':
                $packages = PaidPackage::where('url', 'paid-guidance-nursing')->firstOrFail();
                $menus = $this->menuHelper->getMenu();
                $paidPackages = PaidPackage::all();
                return view('front.home.paid-guidance.nursing', [
                    'menus' => $menus,
                    'paidPackages' => $paidPackages,
                    'package' => $packages
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
                $categories = Category::where('type', '4')->get();
                $blogs = Post::where('is_active', '1')
                    ->orderBy('published_at', 'desc')
                    ->paginate(12);

                return view('front.home.all-posts', [
                    'menus' => $menus,
                    'blogs' => $blogs,
                    'categories' => $categories
                ]);
            case 'bodmas-gallery':
                $menus = $this->menuHelper->getMenu();
                $events = GalleryEvent::all();
                return view('front.home.gallery', [
                    'menus' => $menus,
                    'events' => $events
                ]);
            case 'all-notification':
                $menus = $this->menuHelper->getMenu();
                $notifications = Notice::orderBy('created_at', 'desc')->paginate('20');
                $states = State::all();
                return view('front.home.all-notification', [
                    'menus' => $menus,
                    'notifications' => $notifications,
                    'states' => $states
                ]);
            case 'become-partner-with-us':
                $menus = $this->menuHelper->getMenu();
                $notifications = Notice::orderBy('created_at', 'desc')->get();
                $states = State::all();
                return view('front.home.become-partner-with-us', [
                    'menus' => $menus
                ]);
            default:
                $shortLink = ShortLink::where('code', $slug)->first();
                if ($shortLink) {
                    return redirect($shortLink->url);
                }
                $withoutSlashSlug = $slug;
                $slug = '/' . $slug;
                // dd($slug);
                $page = Page::where('menu_slug', $slug)
                    ->orWhere('slug', $withoutSlashSlug)
                    ->first();
                if ($page) {
                    $packages = Package::all();
                    $id = $page->id;
                    $menus = $this->menuHelper->getMenu();
                    $banner = $this->menuHelper->getBanner($id);
                    $paidGuidance = PaidPackage::select('package_name','url')->get();
                    $colleges = Page::select('pages.slug', 'states.name as state_name')
                    ->join('states', 'states.id', '=', 'pages.state_id')
                    ->whereNotNull('pages.state_id') // Ensure the page has a valid state_id
                    ->orderBy('states.name')
                    ->get()
                    ->groupBy('state_name');
                    // dd($colleges);
                    return view('front.home.showPage', [
                        'page' => $page,
                        'menus' => $menus,
                        'banner' => $banner,
                        'packages' => $packages,
                        'paidGuidance' => $paidGuidance,
                        'colleges' => $colleges
                    ]);
                }
                abort(404, 'Page not found');
        }
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
        $postKey = 'post_' . $blogs->id;

        if (!session()->has($postKey)) {
            $blogs->incrementViews();
            session()->put($postKey, true);
        }
        // $blogs->incrementViews();
        // dd($blogs);
        return view('front.home.blog-details', ['blogs' => $blogs, 'menus' => $menus, 'current_blogs' => $current_blogs]);
    }
    public function enquiryContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'number' => 'required|numeric',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        try {
            DB::table('partners')->insert([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['number'],
                'course' => $validated['subject'],
                'message' => $validated['message'],
                'type' => $request['type'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Mail::to('educationbodmas@gmail.com')->send(new EnquiryMail($validated));

            return response()->json(['success' => true, 'message' => 'Your enquiry has been sent successfully!']);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                // Duplicate entry error
                return response()->json([
                    'success' => false,
                    'error' => "The email {$validated['email']} has already been used to submit an enquiry."
                ]);
            }

            // Other database errors
            return response()->json([
                'success' => false,
                'error' => 'An unexpected error occurred. Please try again later.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function becomPartner(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'number' => 'required|numeric|digits:10',
            'message' => 'required|string',
        ]);
        try {
            // Insert data into the database
            \DB::table('partners')->insert([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['number'],
                'message' => $validated['message'],
                'type' => $request['type'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            // Prepare email data
            $emailBody = "
            <h1>New Partner Enquiry Received</h1>
            <p><strong>Name:</strong> {$validated['name']}</p>
            <p><strong>Email:</strong> {$validated['email']}</p>
            <p><strong>Phone Number:</strong> {$validated['number']}</p>
            <p><strong>Message:</strong> {$validated['message']}</p>
            ";
            // Send the email
            \Mail::html($emailBody, function ($message) use ($validated) {
                $message->to('educationbodmas@gmail.com')
                    ->subject('New Partner Enquiry from ' . $validated['name']);
            });
            return response()->json(['success' => true, 'message' => 'Enquiry submitted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function getPosts(Request $request)
    {
        $category_id = $request->get('category_id');
        $posts = Post::where('category_id', $category_id)
            ->where('is_active', '1')->get();
        return response()->json([
            'blogs' => $posts,
        ]);
    }

    public function getNotice(Request $request)
    {
        $state_id = $request->get('state_id');
        $notice = Notice::where('state_id', $state_id)->get();
        return response()->json([
            'notice' => $notice,
        ]);
    }

    public function showCollege($state, $course, $slug)
    {
        $page = Page::where('slug', $slug)->first();

        if ($page) {
            $id = $page->id;
            $menus = $this->menuHelper->getMenu();
            $banner = $this->menuHelper->getBanner($id);
            $paidGuidance = PaidPackage::select('package_name','url')->get();
            $colleges = College::select('colleges.type', 'colleges.page_id', 'colleges.state_id', 'states.name as state_name','pages.slug','colleges.course_id')
            ->where('colleges.course_id', '1')
            ->join('states', 'colleges.state_id', '=', 'states.id')
            ->join('pages', 'colleges.page_id', '=', 'pages.id')
            ->get();
            return view('front.home.showPage', [
                'page' => $page,
                'menus' => $menus,
                'banner' => $banner,
                'state' => $state,
                'course' => $course,
                'paidGuidance' => $paidGuidance,
                'colleges' => $colleges
            ]);
        }
        abort(404, 'Page not found');
    }


    public function getLink(Request $request)
    {
        $states = State::all();

        $links = Link::query()
            ->when($request->state_id, fn($query, $stateId) => $query->where('state_id', $stateId))
            ->when($request->type, fn($query, $type) => $query->where('type', $type))
            ->where('status', 'active') // Only show active links to users
            ->with('state') // Eager load state relationship
            ->paginate(10);

        // Check if the request is AJAX
        if ($request->ajax()) {
            return view('front.home.partial-link-list', compact('links'))->render();
        }

        return view('front.home.link-list', compact('links', 'states'));
    }

    public function store(Request $request)
    {
        // Create a Razorpay API instance
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        // Retrieve Razorpay payment details
        $payment = $api->payment->fetch($request->payment_id);

        // Verify the payment
        try {
            $payment->capture(array('amount' => $payment->amount));  // Capture the payment
            // Handle success (update order status, etc.)
            return redirect()->route('success.page');  // Redirect to success page
        } catch (\Exception $e) {
            // Handle failure
            return redirect()->route('failure.page');  // Redirect to failure page
        }
    }

    public function sendMailPage(){
        $menus = $this->menuHelper->getMenu();
       return view('front.email',compact('menus'));
    } 

    public function metting() {
        return redirect('https://meetpro.club/bodmas?isCpBranding=false');
    }
    
}
