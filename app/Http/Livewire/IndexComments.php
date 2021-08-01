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
        'inputComment' => 'required|max:10',
    ];

    protected $messages = [
        'inputComment.required' => 'Komentar wajib diisi!😠',
        'inputComment.max' => 'Eits...kebanyakan bos ngomennya😝',
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
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Comment was posted! 👍',
            'text' => ''
        ]);

        $this->inputComment = null;
    }

    // ====remove comment ===========
    function remove($idComment)
    {
        $getidComment = Comment::find($idComment);
        $getidComment->delete();
        $this->comments = $this->comments->except($idComment);
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Comment was deleted! 👍',
            'text' => ''
        ]);
    }

    public function render()
    {
        return view('livewire.index-comments');
    }
}
