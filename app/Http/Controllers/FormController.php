<?php

namespace App\Http\Controllers;
use App\Models\Link;
use App\Models\State;
use Illuminate\Http\Request;

class FormController extends Controller
{
    protected $link;
    protected $state;
    public function __construct(Link $link,State $state)
    {
        $this->link = $link;
        $this->state = $state;
    }

    public function index(){
      $links = $this->link->all();
      $states = $this->state->all();
      return view('admin.link.index',compact('links','states'));
    }
    public function create(){
        $states = $this->state->all();
        return view('admin.link.add',compact('states'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
            'link' => 'required|url',
            'status' => 'required|in:active,inactive',
        ]);
    
        Link::create($request->all());
    
        return redirect()->route('form.form_list')->with('link_success_message', 'Link created successfully!');
    }
    public function edit($id){
        $form = $this->link->where('id', $id)->firstOrFail();
        $states = $this->state->all();
        return view('admin.link.update',compact('form','states'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
            'link' => 'required|url',
            'status' => 'required|in:active,inactive',
        ]);
        $link = Link::findOrFail($id);
        $link->update($request->all());
        return redirect()->route('form.form_list')->with('link_success_message', 'Link updated successfully!');
    }
    public function destroy($id){
       $form = $this->link->where('id',$id)->firstOrFail();
       $data= $form->delete();
       if($data){
         return response()->json(['message' => 'Form Link deleted successfully.'], 200);
       }else{
         return response()->json(['message' => 'Form Link not found.'], 404);
       }
    }

}
