<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Comment;

class Comments extends Component
{

    public $comments;
    public $newComment ;

    public function addComment()
    {


        if($this->newComment == ''){
            return;
        }

        $createdComment = Comment::create(
                [
                    'body' => $this->newComment,
                    'user_id' => '8'
                ]
            );

            $this->comments->prepend($createdComment);

    //     //array_unshift คือการนำข้อมูลใหม่สุดอยู่หน้าสุด
    //    array_unshift(
    //        $this->comments, [
    //         'body' => $this->newComment,
    //         'created_at' => Carbon::now()->diffForHumans(),
    //         'creator' => 'Aeza'
    //         ]
    //     );

        $this->newComment = '';

        
    }


    public function render()
    {
        return view('livewire.comments');
    }



    //method for ...
    public function mount()
    {
        $inittialComments = Comment::latest()->get();

        $this->comments = $inittialComments;
    }


}
