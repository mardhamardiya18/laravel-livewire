<div>
    <h3>Questions</h3>
    @foreach ($tickets as $ticket)
    <div class="card mt-3 shadow-sm" style="width: 83%">
     <div class="toast-body {{ $activeTicket == $ticket->id ? 'bg-primary text-white bg-opacity-50' : ''}}" wire:click="$emit('ticketSelected',{{$ticket->id}})" >
         <p>
             {{$ticket->question}}
         </p>
     </div>    
    </div>
    @endforeach
    
</div>
