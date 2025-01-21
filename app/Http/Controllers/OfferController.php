<?php

namespace App\Http\Controllers;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    protected $offer;
    public function __construct(Offer $offer)
    {
        $this->offer = $offer;
    }
    public function index(){
        $offers = $this->offer->all();
        return view('admin.offer.index',compact('offers'));
    }
    public function create(){
        return view('admin.offer.add');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:active,inactive,expired',
            'join_us' => 'required|string|max:255',
        ]);
    
        try {
            // Attempt to create a new offer
            $offer =  Offer::create($request->all());
    
            // Check if the offer was created successfully
            if ($offer) {
                return redirect()->route('offer.offer_list')->with('success', 'Offer created successfully!');
            } else {
                return redirect()->route('offer.offer_list')->with('error', 'Failed to create offer!');
            }
        } catch (\Exception $e) {
            // In case of an exception, log it and return an error message
            return redirect()->route('offer.offer_list')->with('error', 'An error occurred while creating the offer!');
        }
    }
    
    public function edit($id){
        $offer = $this->offer->where('id', $id)->firstOrFail();
        return view('admin.offer.update',compact('offer'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:active,inactive,expired',
            'join_us' => 'required|string|max:255',
        ]);

        $offer = Offer::findOrFail($id);
        $offer->update($request->all());

        return redirect()->route('offer.offer_list')->with('success', 'Offer updated successfully!');
    }
    public function destroy($id){
       $offer = $this->offer->where('id',$id)->firstOrFail();
       $offer= $offer->delete();
       if($offer){
         return response()->json(['message' => 'Offer deleted successfully.'], 200);
       }else{
         return response()->json(['message' => 'Offer not found.'], 404);
       }
    }
}
