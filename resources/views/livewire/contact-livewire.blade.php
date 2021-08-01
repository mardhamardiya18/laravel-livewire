<div>

   
    @if ($statusUpdate)
        @livewire('contact-update')
        @else
        @livewire('contact-create')
    @endif
   
    <hr>

    <div class="row">
        <div class="col">
            <select wire:model="paginate" name="" id="" class="form-control form-control-sm w-auto">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
            </select>
        </div>
        <div class="col">
            <input wire:model="search" type="text" name="" placeholder="search" id="" class="form-control form-control-sm">
        </div>
    </div>

       <table class="table mt-5">
           <thead class="table-dark">
               <tr>
                <td scope="col">No</td>
                <td scope="col">Name</td>
                <td scope="col">Phone</td>
                <td scope="col">Action</td>
               </tr>
              
           </thead>
           @foreach ($contact as $index => $data)
           <tbody>
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->phone}}</td>
                <td>
                   <buttom wire:click="getContact({{$data->id}})" class="btn btn-primary btn-sm text-white">Edit</buttom>
                   <buttom wire:click="destroy({{$data->id}})" class="btn btn-danger btn-sm text-white">Delete</buttom>
                </td>
            </tr>
           </tbody>
           @endforeach
       </table>
       {{ $contact->links('vendor.livewire.bootstrap') }}
</div>
