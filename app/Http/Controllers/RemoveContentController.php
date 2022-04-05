<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Site;
use App\Models\Video;
use App\Models\Payment;
use App\Models\Podcast;
use App\Models\Referral;
use Illuminate\Http\Request;
use App\Models\RemoveContent;

class RemoveContentController extends Controller
{
    public static function removeContentLog($datas,$category){
        foreach($datas as $data){
            RemoveContent::create([
                'user_id' => $data->user_id ,
                'category'=> $category,
                'title'   => $data->title,
                'description' => $data->description,
                'thumbnail'   => $data->thumbnail ,
                'location'    => $data->location ,
                'created_at'  => $data->created_at ,
                'updated_at'  => $data->updated_at,
            ]);
        }
    }

    public static function delete(){
        // Remove Content of Videos, Referrals, Books, Podcasts, Sites, Payment
        $datas = Video::where('user_id',auth()->user()->user_id)->get();
        if(isset($datas) && $datas->count() > 0){
            RemoveContentController::removeContentLog($datas,'videos');
            Video::where('user_id',auth()->user()->user_id)->delete();
        }


        $datas = Book::where('user_id',auth()->user()->user_id)->get();
        if(isset($datas) && $datas->count() > 0){
            RemoveContentController::removeContentLog($datas,'books');
            Book::where('user_id',auth()->user()->user_id)->delete();
        }

        $datas = Site::where('user_id',auth()->user()->user_id)->get();
        if(isset($datas) && $datas->count() > 0){
            RemoveContentController::removeContentLog($datas,'sites');
            Site::where('user_id',auth()->user()->user_id)->delete();
        }

        $datas = Podcast::where('user_id',auth()->user()->user_id)->get();
        if(isset($datas) && $datas->count() > 0){
            RemoveContentController::removeContentLog($datas,'podcasts');
            Podcast::where('user_id',auth()->user()->user_id)->delete();
        }
        $datas = Payment::where('user_id',auth()->user()->user_id)->first();
        if(isset($data) && $data->count() > 0){
            RemoveContent::create([
                'user_id'=>$datas->user_id,
                'category' => 'payment',
                'created_at'=>$datas->create_at,
                'updated_at'=>$datas->updated_at,
                'title'     => 'thumbnail contains amount,paid_id',
                'description'=>"location contains payment_source,service",
                'thumbnail' =>"$datas->amount,$datas->plan_id",
                'location'  =>"$datas->payment_source,$datas->service",
            ]);
            $datas->delete();
        }

        $datas = Referral::where('user_id',auth()->user()->user_id)->first();
        if(isset($datas) && $datas->count() > 0){
            RemoveContent::create([
                'user_id'=>$datas->user_id,
                'category' => 'referrals',
                'created_at'=>$datas->create_at,
                'updated_at'=>$datas->updated_at,
                'title'     =>'thumbnail contains identifier',
                'description'=>'location contains count',
                'thumbnail' =>$datas->identifier,
                'location'  =>$datas->count,
            ]);
            $datas->delete();
        }
    }

    public function index($id){
        $this->delete();

        return redirect('/');
    }
}
