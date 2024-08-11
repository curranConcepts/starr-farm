<?php

namespace App\Http\Controllers;

use App\Models\Chicken;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FlockController extends Controller
{
    /**
     * Controller  for all flock related tasks.
     */
        public function index(Request $request)
    {
        return view('pages.flock');
    }

    public function addFlock(Request $request)
    {
        $this->validate($request, [
            'age' 		          => 'required',
            'birthday' 		      => 'required',
            'breed' 			  => 'required',
            'image'               => 'nullable|image|mimes:jpeg,jpg|max:2048',
	        'name' 			      => 'required',
	    ]);

        $name = $request->input('name');
        $chicken = Chicken::where('name', $name)->first();

        if(!isset($chicken)){
          $chicken = new Chicken;
        }
        $chicken->age = $request->input('age');
        $chicken->bio = $request->input('bio');
        $chicken->birthday = $request->input('birthday');
        $chicken->breed = $request->input('breed');
        $chicken->name = $request->input('name');
        $chicken->slug = Str::slug($request->input('name'));

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $chicken->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/chickens/'), $imageName);
            $chicken->image = $imageName;
        }

        $chicken->save();

        return redirect()->back()->with('success', 'Member successfully added to the flock!');
    }

    public function peepShow()
    {
        return view('templates.chicken');
    }

}
