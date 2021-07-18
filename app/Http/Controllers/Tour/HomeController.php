<?php

namespace App\Http\Controllers\Tour;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        if ($request->isMethod('GET')) {
            $internalTours = Tour::where('type', 'internal')->orderByDesc('created_at')->take(9)->get();
            $externalTours = Tour::where('type', 'external')->orderByDesc('created_at')->take(9)->get();
            $page = [
                'title' => 'تور گردشگری'
            ];
            return view('tour.home', compact('internalTours', 'externalTours', 'page'));
        }

        switch ($request->action) {
            case 'register':
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string',
                    'email' => 'required|email',
                    'phone_number' => 'required|numeric',
                    'password' => 'required|confirmed'
                ]);

                if ($validator->fails())
                    return redirect()->back()->withErrors($validator->errors()->all());

                if (User::where('email', $request->email)->exists())
                    return redirect()->back()->withErrors(['این ایمیل قبلا ثبت شده است.']);

                if (User::where('phone_number', $request->phone_number)->exists())
                    return redirect()->back()->withErrors(['این شماره تلفن قبلا ثبت شده است.']);

                $user = User::create([
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'name' => $request->name,
                    'password' => Hash::make($request->password)
                ]);

                Auth::login($user);

                return redirect()->back()->with('success', 'وارد شدید!');

            case 'login':
                $validator = Validator::make($request->all(), [
                    'username' => 'required|string',
                    'password' => 'required|string',
                ]);

                if ($validator->fails())
                    return redirect()->back()->withErrors($validator->errors()->all());


                if (!Auth::attempt([
                        'phone_number' => $request->username,
                        'password' => $request->password
                    ]) && !Auth::attempt([
                        'email' => $request->username,
                        'password' => $request->password
                    ]))
                    return redirect()->back()->withErrors(['نام کاربری یا ایمیل اشتباه است.']);

                return redirect()->back()->with('success', 'وارد شدید!');
        }

        return '';
    }
}
