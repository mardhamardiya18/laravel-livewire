<div class="container mt-5">
   <h3 class="mb-5">Comments App</h3>
      <form wire:submit.prevent="addComment">
          <div class="row">
            <div class="col-sm-10">
                @error('inputComment') <span class="error text-danger ">{{ $message }}</span> @enderror
                <textarea  wire:model="inputComment" class="form-control" id="" cols="20" placeholder="Type your comment here" rows="5"></textarea>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary btn-lg">Send</button>
            </div>
          </div>
        
      </form>
      

   @foreach ($comments as $comment)
   <div class="card mt-5 shadow-sm" style="width: 83%">
    <div class="toast-header d-flex justify-content-between align-items-center">
        <div class="title d-flex">
            <h5 class="card-title">{{$comment->creator->name}}</h5>
            <p class="mx-3 fs-6" style="color: rgb(173, 173, 173)">{{$comment->created_at->diffForHumans()}}</p>
        </div>
        <i class="fas fa-times" style="cursor: pointer" wire:click="remove({{$comment->id}})"></i>
    </div>

    <div class="toast-body">
        <p>
            {{$comment->body}}
        </p>
    </div>    
   </div>
   @endforeach
</div>
