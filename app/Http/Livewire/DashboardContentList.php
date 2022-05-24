<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Video;
use App\Models\Podcast;
use App\Models\Book;
use App\Models\Stock;
class DashboardContentList extends Component
{
    public $content = '';
    protected $lists;
    public $fileLocation = '';
    public $fileThumbnail = '';
    protected $listeners = ['refreshContent' => '$refresh'];
    public function deleteproduct($id){
       $product = Stock::find($id);
       $product->delete();
       session()->flash('message','product delete sucsussfuly');

    }
    protected function fetch_data(){
        $location = $thumbnail = '';
        if ($this->content == 'ebook') {
            $this->fileLocation = 'books/';
            $this->lists = Book::orderBy('created_at', 'desc')
                        ->where('user_id', auth()->user()->user_id)
                        ->with('site')
                        ->paginate(20);
            //var_dump($this->lists);
        }           else if ($this->content == 'products') {
            $this->fileLocation = 'products/';
            $this->lists = Stock::orderBy('created_at', 'desc')
                        // ->where('user_id', auth()->user()->user_id)
                        // ->with('site')
                        ->paginate(20);}
            else if ($this->content == 'store') {
            $this->fileLocation = 'products/';
            $this->lists = Stock::orderBy('created_at', 'desc')
                        // ->where('user_id', auth()->user()->user_id)
                        // ->with('site')
                        ->paginate(20);}
            else if ($this->content == 'deliverd') {
            $this->fileLocation = 'products/';
            $this->lists = Stock::where('stock_status' ,'instock')->orderBy('created_at', 'desc')
                        // ->where('user_id', auth()->user()->user_id)
                        // ->with('site')
                        ->paginate(20);
        }
          else if ($this->content == 'podcast') {
            $this->fileLocation = 'podcasts/';
            $this->lists = Podcast::orderBy('created_at', 'desc')
                        ->where('user_id', auth()->user()->user_id)
                        ->with('site')
                        ->paginate(20);
        } else if ($this->content == 'videos') {
            $this->fileLocation = 'videos/';
            $this->lists = Video::orderBy('created_at', 'desc')
                ->where('hgt', '0')
                ->where('user_id', auth()->user()->user_id)
                ->where('original_owner', auth()->user()->user_id)
                ->with('site')
                ->paginate(20);
        } else if ($this->content == 'hgt') {
            $this->fileLocation = 'videos/';
            $this->lists = Video::orderBy('created_at', 'desc')
                ->where('hgt', '1')
                ->where('user_id', auth()->user()->user_id)
                ->where('original_owner', auth()->user()->user_id)
                ->with('site')
                ->paginate(20);
        } else if ($this->content == 'reuse') {
            $this->fileLocation  = 'videos/';
            $this->lists = Video::orderBy('created_at', 'desc')
                ->where('user_id', auth()->user()->user_id)
                ->where('original_owner', '<>', auth()->user()->user_id)
                ->with('site')
                ->paginate(20);
        }
        else if ($this->content == 'downloaded') {
            $this->fileLocation  = 'videos/';
         $this->lists = Video::whereHas('payment', function($q){
                                $q->where('type','buy')->where('user_id', auth()->user()->user_id);
                            })->orderBy('created_at', 'desc')
                            ->with('site')
                            ->paginate(20);
        }
        $this->fileThumbnail = $this->fileLocation . 'thumbnail/';
    }
    public function mount()
    {
        $this->fetch_data();
    }

    public function deleteContent($id,$type)
    {
        $resource = null;
        $resource = Video::where('video_id', $id)->first();        

        if ($type == '1') {
            try {
                // $size = Storage::disk('local')->size("public/".$this->fileName.$resource->location);
                // $size += Storage::disk('local')->size("public/thumbnails/".$resource->thumbnail);
                // FunctionsController::updateUploadSize($resource->user_id, $size,'substract');
                Storage::disk('local')->delete("public/videos/".$resource->location);
                Storage::disk('local')->delete("public/thumbnails/".$resource->thumbnail);
            } catch (\Throwable $th) {
                echo $th;
            }
            Video::where('original_owner', $resource->original_owner)->where('location',$resource->location)->delete();
        } 
        else {
            Video::where('video_id', $resource->video_id)->where('user_id', $resource->user_id)->delete();
        }
        $this->fetch_data();
        $this->emit('refreshContent');
    }

    public function render()
    {
        return view('livewire.dashboard-content-list', ['lists' => $this->lists]);
    }
}