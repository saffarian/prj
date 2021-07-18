<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user == null)
            return abort(404);

        Auth::guard('web')->logout();
        return redirect()->back();
    }

    public function profile(Request $request)
    {
        $user = $request->user();

        if ($user == null)
            return abort(404);

        if ($request->isMethod('GET')) {
            $page = [
                'title' => 'پروفایل کاربری'
            ];

            return view('profile', compact('page', 'user'));
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|numeric'
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors()->all());

        if (User::where('email', $request->email)
            ->where('id', '<>', $user->id)
            ->exists())
            return redirect()->back()->withErrors(['این ایمیل توسط کاربر دیگری ثبت شده است.']);

        if (User::where('phone_number', $request->phone_number)
            ->where('id', '<>', $user->id)
            ->exists())
            return redirect()->back()->withErrors(['این شماره همراه توسط کاربر دیگری ثبت شده است.']);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number
        ]);

        return redirect()->back()->with('success', 'تغییرات با موفقیت اعمال شد.');
    }
}
