<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactCreate extends Component
{
    public $name;
    public $phone;

    public function render()
    {
        return view('livewire.contact-create');
    }

    function store()
    {
        $this->validate([
            'name' => 'required|min:3',
            'phone' => 'required|max:12'
        ]);

        $contact = Contact::create([
            'name' => $this->name,
            'phone' => $this->phone
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Data was stored!',
            'text' => ''
        ]);
        $this->tmblreset();
        $this->emit('contactStored', $contact);
    }
    public function tmblreset()
    {
        $this->name = null;
        $this->phone = null;
    }
}
