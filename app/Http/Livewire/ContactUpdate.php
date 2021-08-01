<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactUpdate extends Component
{
    public $contactid;
    public $contactname;
    public $contactphone;


    protected $listeners = [
        'getContact' => 'showContact'
    ];

    public function render()
    {
        return view('livewire.contact-update');
    }
    public function showContact($contact)
    {
        $this->contactid = $contact['id'];
        $this->contactname = $contact['name'];
        $this->contactphone = $contact['phone'];
    }



    public function update()
    {
        $this->validate([
            'contactname' => 'required|min:3',
            'contactphone' => 'required|max:12'
        ]);

        if ($this->contactid) {
            $contact = Contact::find($this->contactid);
            $contact->update([
                'name' => $this->contactname,
                'phone' => $this->contactphone
            ]);
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Data was updated as ' . $this->contactname . '',
                'text' => ''
            ]);
            $this->resetinput();
            $this->emit('contactUpdate', $contact);
        }
    }
    public function resetinput()
    {
        $this->contactid = null;
        $this->contactname = null;
        $this->contactphone = null;
    }
}
