<?php

namespace App\Http\Controllers\Tour;

use App\Http\Controllers\Controller;
use App\Models\Reserve;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReserveController extends Controller
{
    public function index($id, Request $request)
    {
        $user = $request->user();
        if ($user == null)
            return abort(404);

        $tour = Tour::findOrFail($id);

        if ($request->isMethod('GET')) {
            $page = [
                'title' => 'رزرو تور گردشگری - ' . $tour->title
            ];

            return view('tour.reserve', compact(['page', 'tour']));
        }

        if (Reserve::where('user_id', $user->id)
            ->where('tour_id', $tour->id)
            ->exists())
            return redirect()->back()->withErrors(['شما قبلا این تور را رزرو کرده اید.']);

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'birth_date' => 'required|string',
            'adult_number' => 'required|string',
            'child_number' => 'required|string',
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors()->all());

        Reserve::create([
            'user_id' => $user->id,
            'tour_id' => $tour->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'adult_number' => $request->adult_number,
            'child_number' => $request->child_number,
            'birth_date' => $request->birth_date,
        ]);

        return redirect()->route('homepage')->with('success', 'درخواست شما ثبت شد.');
    }
}
