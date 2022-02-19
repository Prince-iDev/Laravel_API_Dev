

<div>
    <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="form-group">
                <div class="col-sm-10">
                    <label for="status">States of Origin</label>
                    <select class="form-control" wire:model="selectedState">
                        <option value="">Select Your State</option>
                        @foreach ($states as $item)
                        <option value="{{ $item->id }}">{{ $item->state_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            @if (!is_null($lgas))
            <div class="form-group">
                <div class="col-sm-10">
                    <label for="status">Local Government Area</label>
                    <select class="form-control" wire:model="selectedLGA">
                        <option value="">Select Your LGA</option>
                        @foreach ($lgas as $items)
                        <option value="{{ $items->state_id }}">{{ $items->lga_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
           
            <div class="form-group">
                <div class="col-sm-10">
                    <label for="status">Local Government Area</label>
                    {{ $selectedState }}th State
                </div>
            </div>
            @endif
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Add Assignment</button>
            <div wire:loading>
                Loading...
            </div>
        </div>
        <!-- /.card-footer -->
    </form>
</div>