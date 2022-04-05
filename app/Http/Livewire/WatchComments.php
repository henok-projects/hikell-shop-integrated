<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Video;
use App\Models\Comment;
use App\Models\CommentLike;

class WatchComments extends Component
{
    public $isloading = true;
    public $comment_id = '';
    protected $video  = [];
    public $videoCommentID  = 'null';
    public $comment;
    public $comment_user;
    protected $listeners = ['afteraddcomment' => '$refresh',];

    public function fetch_data()
    {
        $this->video = Video::where('video_id', $this->comment_id)
            ->with(['comments' => function ($query) {
                // get video comments likes/dislikes stats
                $query->withCount([
                    'likeDislike as likes' => function ($query) {
                        $query->where('type', '0');
                    },
                    'likeDislike as dislikes' => function ($query) {
                        $query->where('type', '1');
                    },
                    'likeDislike as liked' => function ($query) {
                        $query->where('type', '0')->where('user_id', auth()->user()->user_id);
                    },
                    'likeDislike as disliked' => function ($query) {
                        $query->where('type', '1')->where('user_id', auth()->user()->user_id);
                    },
                ]);
                // get video uploader user
                // $query->with(['user' => function ($qq) {
                //     $qq->first();
                // }])->latest();
            }])->withCount([
                'comments as total_comment'
            ])->first();
    }

    public function mount()
    {
        $this->fetch_data();
    }
    public function render()
    {
        if (!$this->isloading) {
            $this->fetch_data();
        }

        return view('livewire.watch-comments', [
            'video' => $this->video,
        ]);
    }

    public function resetdata()
    {
        $this->comment = null;
        $this->emit('afteraddcomment');
    }
    protected function likeDislike()
    {
        if (!CommentLike::where([['user_id', auth()->user()->user_id], ['type', $this->like_type], ['comment_id', $this->videoCommentID]])->delete() && $this->videoCommentID) {

            CommentLike::where([['user_id', auth()->user()->user_id], ['comment_id', $this->videoCommentID]])->delete();
            CommentLike::create([
                'comment_id' => $this->videoCommentID,
                'user_id'  => auth()->user()->user_id,
                'type'     => $this->like_type,
            ]);
        }

        $this->resetdata();
    }

    public function like($comment_id)
    {
        $this->like_type = '0';
        $this->videoCommentID = $comment_id;
        $this->likeDislike();
    }

    public function dislike($comment_id)
    {
        $this->like_type = '1';
        $this->videoCommentID = $comment_id;
        $this->likeDislike();
    }

    public function loadComments()
    {
        $this->isloading = false;
    }

    public function saveComment()
    {
        $data = $this->validate([
            'comment' => 'required|min:2',
        ]);

        Comment::create([
            'comment' => $this->comment,
            'user_id' => $this->comment_user,
            'video_id' => $this->comment_id,
        ]);

        $this->resetdata();
    }
}
