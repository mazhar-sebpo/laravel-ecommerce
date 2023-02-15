<div>

@include('livewire.admin.brand.modal_form')
    <div class="row">
        <div class="col-md-12 ">
    <div class="card">
    <div class="card-header">
    <h3>Brand
        <a href="#" data-toggle="modal" data-target="#createModal" class="btn btn-primary btn-sm float-right">Add Brand</a>
    </h3>
    </div>
    <div class="card-body">
        @if (session()->has('message'))
        <div class="alert alert-success">
           {{ session('message') }}
        </div>
    @endif

        <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Brand Name</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if($brands)
                @foreach($brands as $brand)
                <tr>
                  <td>{{$brand->name??''}}</td>
                  <td>
                    @if($brand->image)
                    <img src="{{ asset('storage/'.$brand->image) }}" alt="category image" width="200"/>
                    @endif
                  </td>
                  <td><label class="badge badge-danger">{{$brand->status == '1' ? 'Active':'Inactive'}}</label></td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="#" wire:click="showBrand({{$brand->id}})" data-toggle="modal" data-target="#showModal" class="btn btn-primary">View</a>
                        <a href="#" wire:click="editBrand({{$brand->id}})" data-toggle="modal" data-target="#updateModal" class="btn btn-info">Edit</a>
                        <a href="#" wire:click="deleteBrand({{$brand->id}})" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Delete</a>
                      </div>
                  </td>
                </tr>
                @endforeach
                @endif

              </tbody>
            </table>
            <div class="mt-2">
                {{ $brands->links() }}
            </div>
          </div>
    </div>
    </div>
        </div>
      </div>
</div>
@push('script')
<script>
    window.addEventListener('close-modal',event =>{
        $("#createModal").modal('hide');
        $("#showModal").modal('hide');
        $("#updateModal").modal('hide');
        $("#deleteModal").modal('hide');
    });
</script>

@endpush
