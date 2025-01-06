<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index(){
        $partners = Partner::all();
        return view('admin.partner.index', compact('partners'));
    }
}
