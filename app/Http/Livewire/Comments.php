<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Comment;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    //public $comments;

    public $newComment ;

    //กำหนด rules สำหรับ validate
    public $rules = [
        'newComment' => 'required|min:5|max:128'
    ];

    //กำหนดข้อความ validate
    protected $messages = [
        'newComment.required' => 'This :attribute cannot be empty.',
        'newComment.min' => 'This :attribute must longer than :min character',
        'newComment.max' => 'This :attribute must less than :max character',
    ];


    //แสดง validate แบบ realtime
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }




    public function addComment()
    {

        $this->validate();

        if($this->newComment == ''){
            return;
        }

        $createdComment = Comment::create(
                [
                    'body' => $this->newComment,
                    'user_id' => '8'
                ]
            );

            //$this->comments->prepend($createdComment);

    //     //array_unshift คือการนำข้อมูลใหม่สุดอยู่หน้าสุด
    //    array_unshift(
    //        $this->comments, [
    //         'body' => $this->newComment,
    //         'created_at' => Carbon::now()->diffForHumans(),
    //         'creator' => 'Aeza'
    //         ]
    //     );

        $this->newComment = '';

        session()->flash('message_add', 'Comment successfully added.');

        
    }

    public function remove($id)
    {
        //dd($id);
        $comment = Comment::find($id);
        $comment->delete();

        //$this->comments = $this->comments->except($id);

        session()->flash('message_delete', 'Comment successfully deleted.');
    }


    public function render()
    {

        return view('livewire.comments', [
            'comments' => Comment::latest()->paginate(5)
        ]);
    }



    //method for ...
    public function mount()
    {
       // $inittialComments = Comment::latest()->get();
       // $inittialComments = Comment::latest()->paginate(5);

       // $this->comments = $inittialComments;
    }


}
