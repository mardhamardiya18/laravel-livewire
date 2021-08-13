<?php

namespace App\Http\Livewire;

use App\Models\SupportTicket;
use Livewire\Component;
use PhpParser\Node\Stmt\Echo_;

class Tikets extends Component
{
    public $activeTicket = 1;

    protected $listeners = [
        'ticketSelected'
    ];

    function ticketSelected($ticketId)
    {
        $this->activeTicket = $ticketId;
    }


    public function render()
    {
        return view('livewire.tikets', [
            'tickets' => SupportTicket::all(),
        ]);
    }
}
