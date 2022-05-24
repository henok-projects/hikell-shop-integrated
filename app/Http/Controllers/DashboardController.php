<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Balance;
use App\Models\Book;
use App\Models\Commission;
use App\Models\Podcast;
use App\Models\Referral;
use App\Models\Order;
use App\Models\Site;
use App\Models\User;
use App\Models\SubscriptionPayment;
use App\Models\Video;
use App\Models\Video_payment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($menu = null, $content = null)
    {
        // $menu = $request->menu;
        // $content = $request->content;
        $site = null;
        if (!isset($menu) & !isset($content)) {
            $menu = 'dashboard';
        } else if (!isset($menu) && isset($content)) {
            $menu = $content;
            $content = null;
        }
        if (!isset($content)) {
            $content  = $menu;
        }
        if ($menu == 'dashboard') {
            if ($content == 'dashboard') {
                // $balance_total = auth()->user()->balance;
           $balance_total = auth()->user()->balance + Order::where('orginal_owner',auth()->user()->user_id)->sum('total');
                $total_videos = Video::where('user_id', auth()->user()->user_id)
                    ->where('hgt', '0')
                    ->where('original_owner', auth()->user()->user_id)
                    ->count();
                $total_hgt = Video::where('user_id', auth()->user()->user_id)
                    ->where('hgt', '1')
                    ->where('original_owner', auth()->user()->user_id)
                    ->count();
                $total_reused = Video::where('user_id', auth()->user()->user_id)
                    ->where('original_owner', '<>', auth()->user()->user_id)
                    ->count();
                $total_ebook = Book::where('user_id', auth()->user()->user_id)->count();
                $total_podcast = Podcast::where('user_id', auth()->user()->user_id)->count();
                $site = Site::where('user_id',auth()->user()->user_id)->withCount('subscriber as subscribers')->with('plan')->first();
                $plan = ($site) ?$site->plan->first()->plan:'0';

                $storageLimit = (float) auth()->user()->storage_limit;

                return view('dashboard.index', [
                    'plan' => $plan,
                    'storageLimit' => $storageLimit,
                    'menu' => $menu,
                    'content' => $content,
                    'balance_total' => ($balance_total) ? $balance_total : 0,
                    'total_videos' => ($total_videos) ? $total_videos : 0,
                    'total_hgt' => ($total_hgt) ? $total_hgt : 0,
                    'total_reused' => ($total_reused) ? $total_reused : 0,
                    'total_ebook' => ($total_ebook) ? $total_ebook : 0,
                    'total_podcast' => ($total_podcast) ? $total_podcast : 0,
                ]);
            } else if ($content == 'ek') {
                $referral_link = Referral::where('user_id', auth()->user()->user_id)->first();

                return view('dashboard.index', [
                    'menu' => $menu,
                    'content' => $content,
                    'referral_link' => $referral_link,
                ]);
            }
        } else if ($menu == 'payment') {
            $service = [
                'revenuehgt' => 'hgt',
                'revenuehikel' => 'hikel',
                'revenuereused' => 'reused',
                'revenueself' => 'self',
                'revenuereferral' => 'referral',
            ];

            $payments = null;
            if ($content == 'payment') {
                $payments = Commission::where('user_id', auth()->user()->user_id)->get();
            } else if ($content == 'estimate') {
            } else if ($content == 'transactionreport') {
            } else if ($content == 'revenuehgt' ){
                $payments  = Video_payment::where('user_id', auth()->user()->user_id)->get();
            } else if( $content == 'revenueself') { //// videos and hgt
                $payments = SubscriptionPayment::where('user_id',auth()->user()->user_id)->get();
            } else if ($content == 'hikel') {
                $payments = Commission::where('user_id', auth()->user()->user_id)
                            ->orWhere('service', 'launch-site')
                            ->orWhere('service', 'apply-ek')
                            ->orWhere('service', 'promote')
                            ->orWhere('service', 'goldenbuzzer')->get();
            } else {
                $payments = Commission::where('user_id', auth()->user()->user_id)->where('service', $service[$content])->get();
            }


            return view('dashboard.index', ['menu' => $menu, 'content' => $content, 'payments' => $payments]);
        }
        else{
            $site = Site::where('user_id',auth()->user()->user_id)->first();
        }

        return view('dashboard.index', ['menu' => $menu, 'content' => $content,'site'=>$site]);
    }

    public function updateProfile(Request $request,$id){
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

        $user = User::where('user_id', $id)->update($updates);

        if ($user){
            auth()->user()->first_name = $request->first_name;
            auth()->user()->last_name = $request->last_name;
            auth()->user()->email = $request->email;
            return redirect()->back()->with('message', 'You have successfully updated your profile.');
        }
        return false;
    }

    public function updatePassword(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'current_password'   => 'required',
            'new_password'       => 'required|confirmed'
        ]);

        if ($validator->fails()) { // Return back an error message before proceeding to change.
            return redirect()->back()->withErrors(['new_password' => $validator->errors()->first()]);
        }

        $user = User::where('user_id',$id)->first();

        if (Hash::check($request->current_password, $user->password, [])) {
            if (User::where('user_id',$id)->update(['password' => Hash::make($request->new_password)])) {   // A successful password change.
                return redirect()->back()->with('message', "Successfully changed password.");
            }
        } else {
            return redirect()->back()->withErrors(['message' => "Incorrect old password. please try again."]);
        }
        return redirect()->back()->with(['type' => 'error', 'message' => "Unable to change your password. please try again later."]);
    }
}
