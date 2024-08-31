<?php

namespace App\Http\Controllers;

use App\Models\Chicken;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Exception;

class FlockController extends Controller
{
    /**
     * Controller for all flock related tasks.
     */
    public function index(Request $request)
    {
        return view('pages.flock');
    }

    public function addFlock(Request $request)
    {
        try {
            $this->validate($request, [
                'birthday'           => 'nullable',
                'breed'              => 'nullable',
                'image'              => 'nullable|image|mimes:jpeg,jpg|max:2048',
                'name'               => 'required',
            ]);

            $name = $request->input('name');
            $chicken = Chicken::where('name', $name)->first();

            if (!isset($chicken)) {
                $chicken = new Chicken;
            }

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
        } catch (Exception $e) {
            Log::error('Error adding chicken to the flock: ' . $e->getMessage());
            return redirect()->back()->withErrors('An error occurred while adding the member to the flock. Please try again.');
        }
    }

    public function deleteBird($id)
    {
        try {
            $chicken = Chicken::find($id);

            if ($chicken) {
                $chicken->delete();
                return redirect()->back()->with('success', 'Bird has successfully been deleted');
            } else {
                return redirect()->back()->withErrors('Bird not found.');
            }
        } catch (Exception $e) {
            Log::error('Error deleting chicken: ' . $e->getMessage());
            return redirect()->back()->withErrors('An error occurred while deleting the bird. Please try again.');
        }
    }

    public function peepShow()
    {
        return view('templates.chicken');
    }
}

