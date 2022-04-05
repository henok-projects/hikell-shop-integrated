<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Rules\PhoneNumber;
use Illuminate\Validation\Rules;
use App\Http\Controllers\FunctionsController;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $id = 'user_id';
        $request->request->set('user_id', FunctionsController::generateId($id));

        $request->validate([
            'first_name'    => ['required', 'string', 'max:255'],
            'last_name'     => ['required', 'string', 'max:255'],
            'username'      => ['required', 'string', 'max:30', 'unique:users'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'birth_date'    => ['required', 'string', 'max:15', 'before:2005-11-09'],
            'country'       => ['required'],
            'phone_code'    => ['required'],
            'phone_number'  => ['required', new PhoneNumber],
            'password'      => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $request->request->set('password', Hash::make($request->password));

        $user = User::create([
            'user_id'       => $request->user_id,
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'username'      => $request->username,
            'country'       => $request->country,
            'phone_code'    => $request->phone_code,
            'phone_number'  => $request->phone_number,
            'birth_date'    => $request->birth_date,
            'email'         => $request->email,
            'password'      => $request->password,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function update(Request $request)
    {
        $validations = [
            'first_name'    => ['required', 'string', 'max:255'],
            'last_name'     => ['required', 'string', 'max:255'],
            'avatar'        => ['sometimes', 'image', 'mimes:jpeg,jpg,png', 'max:10000'],
        ];
        $updates = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ];

        if ($request->email != auth()->user()->email) {
            $validations['email'] = ['required', 'string', 'email', 'max:255', 'unique:users'];
            $updates['email'] = $request->email;
        }

        $request->validate($validations);

        if ($request->hasFile('avatar')) {
            // upload new avatar
            $request->file('avatar')->store('public/avatars');
            $updates['avatar'] = $request->avatar->hashName();
            FunctionsController::updateUploadSize(auth()->user()->user_id, $request->avatar->getSize(),'add');
        }

        $user = User::where('id', auth()->id())->update($updates);

        if ($user){
            auth()->user()->first_name = $request->first_name;
            auth()->user()->last_name = $request->last_name;
            auth()->user()->email = $request->email;
            return redirect()->back()->with('message', 'You have successfully updated your profile.');
        }
        return false;
    }

    public function update_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password'   => 'required',
            'new_password'       => 'required|confirmed'
        ]);

        if ($validator->fails()) { // Return back an error message before proceeding to change.
            return redirect()->back()->withErrors(['new_password' => $validator->errors()->first()]);
        }


        $user = User::where('id', auth()->id())->first();

        if (Hash::check($request->current_password, $user->password, [])) {
            if (auth()->user->update(['password' => Hash::make($request->new_password)])) {   // A successful password change.
                return redirect()->back()->with('message', "Successfully changed password.");
            }
        } else {
            return redirect()->back()->withErrors(['message' => "Incorrect old password. please try again."]);
        }
        return redirect()->back()->with(['type' => 'error', 'message' => "Unable to change your password. please try again later."]);
    }
}