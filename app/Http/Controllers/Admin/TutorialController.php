<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\tutorial;
use App\Models\Admin\category;
use Image;
use Str;
use Auth;

class TutorialController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tutorials()
    {
        $tutorials =  tutorial::where('user_id',Auth::user()->id)->where('status',1)->latest()->get();
        $count = 1;
        return view('admin.tutorial.index_tutorial',compact('tutorials','count'));
    }
    public function userdeactivetutorial()
    {
        $tutorials =  tutorial::where('user_id',Auth::user()->id)->where('status',0)->latest()->get();
        $count = 1;
        return view('admin.tutorial.index_tutorial',compact('tutorials','count'));
    }

    public function index()
    {
        $tutorials =  tutorial::where('status',1)->latest()->get();
        $count = 1;
        return view('admin.tutorial.index_tutorial',compact('tutorials','count'));
    }

    public function create()
    {
        $categories =  category::where('status',1)->latest()->get();
        return view('admin.tutorial.create_tutorial',compact('categories'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'title' => 'min:15|max:191',
            'description'=>'required',
            'slug'=>'required|unique:tutorials|max:191',
        ]);

        // $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $request->slug);

        $tutorial = tutorial::create([

            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'user_id'=>Auth::id(),
            'slug'=> $request->slug,
            'image'=>$request->image,
            'description'=>$request->description,
            'month'=> date("F-Y"),
            'meta_tag'=>$request->meta_tag,
            'meta_description'=>$request->meta_description,

        ]);
        $this->storeImage($tutorial);
        if($tutorial){
            return redirect()->back()->with('success', 'tutorial Created Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }

    }

    //tutorial EDIT
    public function edit(tutorial $tutorial,Request $request)
    {
        $categories =  category::all();
        $count = 1 ;

        return view('admin.tutorial.edit_tutorial',compact('tutorial','categories','count'));
    }


    //tutorial UPDATE

    public function update(tutorial $tutorial,Request $request)
    {
        $request->validate([
            'title' => 'min:15|max:191',
            'description'=>'required',
        ]);


         if($request->has('image')){
             if($request->old_image){
                 unlink('storage/app/public/'.$request->old_image);
             }
             $tutorial->update([
                 'image' => $request->image->store('admin/tutorial','public'),
             ]);
            $resize = Image::make('storage/app/public/'.$tutorial->image)->resize(550,320);
            $resize->save();
         }



        $tutorial->update([

            'title'=>$request->title,
            // 'slug'=> Str::slug($request->title).'-'.time(),
            // 'category_id'=>$request->category_id,
            // 'user_id'=> Auth::id(),
            // 'image'=>$request->image,
            'description'=>$request->description,
            'trend'=>$request->trend,
            'importent'=>$request->importent,
            'meta_tag'=>$request->meta_tag,
            'meta_description'=>$request->meta_description,

        ]);
        // $this->storeImage($tutorial);
        if($tutorial){
            return redirect()->back()->with('success', 'tutorial Updated Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }

    }

    public function delete(tutorial $tutorial)
    {
        if($tutorial->image){
            unlink('storage/app/public/'.$tutorial->image);
        }
      
        $tutorial->delete();
        if($tutorial){
            return redirect()->back()->with('deletesuccess', 'Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
    }

    
    public function active(tutorial $tutorial)
    {
        $tutorial->update(['status' => 1]);
        if($tutorial){
            return redirect()->back()->with('success', 'tutorial Activate Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
    }

    
    public function deactive(tutorial $tutorial)
    {
        $tutorial->update(['status' => 0]);
        if($tutorial){
            return redirect()->back()->with('success', 'tutorial Deactivate Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
    }

    public function deactiveList()
    {
        $tutorials =tutorial::where('status',0)->get();
        $count = 1;
        return view('admin.tutorial.deactive_tutorial',compact('tutorials','count'));
    }

    public function activeList()
    {
        $tutorials =tutorial::where('status',1)->get();
        return view('admin.tutorial.tutorial_deactive',compact('tutorials'));
    }




    //PUBLIC FUNCTIONS
    // private function validateRequest()
    // {
        
    //     return request()->validate([
    //         'title'=>'required',
    //         'slug'=> 'required',
    //         'category_id'=>'required',
    //         'quantity'=>'required',
           
    //         'price'=>'required',
    //         'description'=>'required',
            
    //     ]);
    // }


    private function storeImage($tutorial)
    {
        if(request()->hasFile('image')){
            $tutorial->update([
                'image' => request()->image->store('admin/tutorial','public'),
            ]);
            $resize = Image::make('storage/app/public/'.$tutorial->image)->resize(550,320);
            $resize->save();
        }
    }
}
