<div>
    <form wire:submit.prevent="update">
        <div class="form-group">
            <div class="form-row">
                <input type="hidden" name="" wire:model="contactid">
                <div class="col">
                    <input wire:model="contactname" type="text" name="contactname" id="" class="form-control @error('contactname') is-invalid
                    
                    @enderror" placeholder="name">

                    @error('contactname')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input wire:model="contactphone" type="text" name="contactphone" id="" class="form-control @error('contactphone') is-invalid
                    
                    @enderror" placeholder="phone">
                    @error('contactphone')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        
    </form>
</div>
