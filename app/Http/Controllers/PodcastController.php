<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Podcast;
use App\Http\Livewire;
use App\Models\Podcastdetail;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class PodcastController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function create()
    {
		$pod=Podcast::all();
        return view('podcast.create');
    }


    public function store(Request $request)
    {
		$request->validate([
			'title' => 'required|max:191',
			'description' => 'required|max:191',
			'episode_number' => 'required','regex:/[0-9]([0-9]|-(?!-))+/',
			'publish_date'    => ['required', 'string', 'max:15'],
			'audio_thumbnail'     => 'required',
			'audio_file'         => 'required',
        ]);

		$request->request->set('user_id', auth()->user()->user_id);

             if ($request->hasFile('audio_thumbnail'))
              {
              $request->validate([
                'image' => 'mimes:jpeg,bmp,png,jpg' // Only allow .jpg, .bmp and .png file types.
               ]);

              if ($request->hasFile('audio_file'))
               {
               $request->validate([
                'audio' => 'mimes:mp3,,ogg,mvi'
               ]);


            $po=new Podcast([

                 "podcast_id"=>FunctionsController::generateID(15),
                 "user_id"=>$request->user_id,
                 "title" => $request->title,
                 "description" => $request->description,
                 "publish_date"    => $request->publish_date,
                 "episode_number" => $request->episode_number,
                 "location" => $request->audio_file->hashName(),
                 "thumbnail" => $request->audio_thumbnail->hashName(),
                 "tags"=> $request->tags,
                 "size"=> $request->audio_file->getSize()+$request->audio_thumbnail->getSize(),


            ]);

            $po->save();
            $request->audio_thumbnail->store('thumbnails', 'public');
            $request->audio_file->store('audios', 'public');

             }
            }
            return redirect('/site/')
            ->with('success','podcast has updated successfully');
    }

    public function edit($site_name,$id)
	{
          $temp=Podcast::where('podcast_id',$id)->get();
          $user=$temp[0];
          return view('podcast.edit',compact('user','site_name'));
          }

        public function update(Request $request,$id)
        {
             $request->validate(
                [
                'title' => 'required',
                'description' => 'required',
                'episode_number'=>'required','regex:/[0-9]([0-9]|-(?!-))+/',

                 ]);

        $user =Podcast::find($id);
        $file_name=$user->audio_thumbnail;
        $audio_name=$user->audio_location;
        $file_path=public_path('storage/thumbnails/'.$file_name);
                if ($request->hasfile('audio_thumbnail'))
                {
                    File::delete($file_path);
                   $user->thumbnail=$request->audio_thumbnail->hashName();
                   $request->audio_thumbnail->store('thumbnails','public');
                }

                 $audio_path=public_path('storage/audios/'.$audio_name);
                if ($request->hasfile('audio_file'))
                   {
                    File::delete($audio_path);
                        $user->location=$request->audio_file->hashName();
                        $request->audio_file->store('audios','public');
                    }
                $user->title =$request->title;
                $user->tags = $request->tags;

                $user->publish_date=$request->publish_date;
                $user->episode_number=$request->episode_number;
                $user->description = $request->description;

                $user->update();

             return redirect('/site/')
            ->with('success','podcast has updated successfully');
        }

       public function destroy($id)
        {
        $pod=Podcast::where('podcast_id', $id)->get();

        $filename= $pod[0]->thumbnail;
        $audio_name = $pod[0]->location;

        $file_path = public_path('storage/image/'.$filename);
        File::delete($file_path);

        $podcast_path = public_path('storage/audios/'.$audio_name);
        File::delete($podcast_path);
        $pod[0]->delete();

            return redirect('podcast')->with('success','podcast has deleted successfully');
        }

      public function watch($podcast_id)
       {
        // $pod= Podcast::where('podcast_id', $podcast_id)->get();
        // $podcast=$pod[0];
         return view('podcast.watch',[
             'podcast'=>$podcast_id,
         ]);
       }
    }





