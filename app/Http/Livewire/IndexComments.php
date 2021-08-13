<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class IndexComments extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $inputComment;
    public $image;
    public $ticketid = 1;


    protected $listeners = [
        'fileUploaded' => 'handleFileUpload',
        'ticketSelected'
    ];

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }

    public function ticketSelected($ticketId)
    {
        $this->ticketid = $ticketId;
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

        $image = $this->storeImage();

        $createComment = Comment::create(
            [
                'body' => $this->inputComment,
                'user_id' => 1,
                'image' => $image,
                'support_ticket_id' => $this->ticketid
            ]
        );
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Comment was posted! 👍',
            'text' => ''
        ]);

        $this->inputComment = null;
        $this->image = null;
    }

    function storeImage()
    {
        if (!$this->image)
            return null;

        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $fileName = Str::random() . '.jpg';
        Storage::disk('public')->put($fileName, $img);
        return $fileName;
    }

    // ====remove comment ===========
    function remove($idComment)
    {
        $getidComment = Comment::find($idComment);
        Storage::disk('public')->delete($getidComment->image);
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
            'comments' => Comment::where('support_ticket_id', $this->ticketid)->latest()->paginate(3)
        ]);
    }
}
