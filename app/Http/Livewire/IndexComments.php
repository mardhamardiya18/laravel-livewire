<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;

class IndexComments extends Component
{
    public $comments;

    public $inputComment;


    // ==== validation =====
    protected $rules = [
        'inputComment' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'inputComment' => 'required|max:10'
        ]);
    }
    // ==============================


    // ==== show comment ==========
    function mount()
    {
        $getComments = Comment::latest()->get();
        $this->comments = $getComments;
    }

    // ==== Add comment ==========
    function addComment()
    {
        $this->validate();

        $createComment = Comment::create(
            [
                'body' => $this->inputComment,
                'user_id' => 1
            ]
        );

        $this->comments->prepend($createComment);

        $this->inputComment = null;
    }

    // ====remove comment ===========
    function remove($idComment)
    {
        $getidComment = Comment::find($idComment);
        $getidComment->delete();
        $this->comments = $this->comments->except($idComment);
    }

    public function render()
    {
        return view('livewire.index-comments');
    }
}
