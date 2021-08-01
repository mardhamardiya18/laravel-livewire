<div>
    <form wire:submit.prevent="store">
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <input wire:model="name" type="text" name="name" id="" class="form-control @error('name') is-invalid
                    
                    @enderror" placeholder="name">

                    @error('name')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input wire:model="phone" type="text" name="phone" id="" class="form-control @error('phone') is-invalid
                    
                    @enderror" placeholder="phone">
                    @error('phone')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
