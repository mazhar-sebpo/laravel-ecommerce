<div>

<?php echo $__env->make('livewire.admin.brand.modal_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12 ">
    <div class="card">
    <div class="card-header">
    <h3>Brand
        <a href="#" data-toggle="modal" data-target="#createModal" class="btn btn-primary btn-sm float-right">Add Brand</a>
    </h3>
    </div>
    <div class="card-body">
        <?php if(session()->has('message')): ?>
        <div class="alert alert-success">
           <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>

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
                <?php if($brands): ?>
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($brand->name??''); ?></td>
                  <td>
                    <?php if($brand->image): ?>
                    <img src="<?php echo e(asset('storage/'.$brand->image)); ?>" alt="category image" width="200"/>
                    <?php endif; ?>
                  </td>
                  <td><label class="badge badge-danger"><?php echo e($brand->status == '1' ? 'Active':'Inactive'); ?></label></td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="#" wire:click="showBrand(<?php echo e($brand->id); ?>)" data-toggle="modal" data-target="#showModal" class="btn btn-primary">View</a>
                        <a href="#" wire:click="editBrand(<?php echo e($brand->id); ?>)" data-toggle="modal" data-target="#updateModal" class="btn btn-info">Edit</a>
                        <a href="#" wire:click="deleteBrand(<?php echo e($brand->id); ?>)" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Delete</a>
                      </div>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

              </tbody>
            </table>
            <div class="mt-2">
                <?php echo e($brands->links()); ?>

            </div>
          </div>
    </div>
    </div>
        </div>
      </div>
</div>
<?php $__env->startPush('script'); ?>
<script>
    window.addEventListener('close-modal',event =>{
        $("#createModal").modal('hide');
        $("#showModal").modal('hide');
        $("#updateModal").modal('hide');
        $("#deleteModal").modal('hide');
    });
</script>

<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/livewire/admin/brand/index.blade.php ENDPATH**/ ?>