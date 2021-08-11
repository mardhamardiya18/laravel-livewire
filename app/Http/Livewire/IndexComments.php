<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class IndexComments extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $inputComment;
    public $image;

    protected $listeners = ['fileUploaded' => 'handleFileUpload'];

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }


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
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Comment was deleted! 👍',
            'text' => ''
        ]);
    }

    public function render()
    {
        return view('livewire.index-comments', [
            'comments' => Comment::latest()->paginate(3)
        ]);
    }
}
