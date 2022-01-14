<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Comment;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;
    use WithFileUploads;

    //public $comments;
    public $photo;
    public $iteration;

    public $newComment ;

    //กำหนด rules สำหรับ validate
    public $rules = [
        'newComment' => 'required|min:5|max:128',
        'photo' => 'image|max:2048',
    ];

    //กำหนดข้อความ validate
    protected $messages = [
        'newComment.required' => 'This :attribute cannot be empty.',
        'newComment.min' => 'This :attribute must longer than :min character.',
        'newComment.max' => 'This :attribute must less than :max character.',
        'photo.image' => 'This :attribute must be image only.',
        'photo.max' => 'This :attribute must less than :max bytes size.'
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

        // เช็คว่ามีไฟล์ภาพเข้ามาหรือไม่
        if($this->photo){
            $this->photo->store('image/comments', 'public');
        }

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
        $this->photo = null;
        $this->iteration++;

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
