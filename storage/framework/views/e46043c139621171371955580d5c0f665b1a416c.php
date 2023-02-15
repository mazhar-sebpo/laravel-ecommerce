<div>
    <!-- Modal -->
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Category Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form wire:submit.prevent="destroyCategory">
        <div class="modal-body">
         <h6>Are you Sure?</h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Yes. Delete</button>
        </div>
    </form>
      </div>
    </div>
  </div>

<div class="row">
    <div class="col-md-12 ">
<div class="card">
<div class="card-header">
<h3>Category
    <a href="<?php echo e(url('admin/category/create')); ?>" class="btn btn-primary btn-sm float-right">Add Category</a>
</h3>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Category Name</th>
              <th>Image</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if($categories): ?>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($cat->name??''); ?></td>
              <td>
                <?php if($cat->image): ?>
                <img src="<?php echo e(asset('uploads/category/'.$cat->image)); ?>" alt="category image" width="150"/>
                <?php endif; ?>
              </td>
              <td><label class="badge badge-danger"><?php echo e($cat->status == '1' ? 'Active':'Inactive'); ?></label></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="<?php echo e(url('admin/category/'.$cat->id.'/show')); ?>" class="btn btn-primary">View</a>
                    <a href="<?php echo e(url('admin/category/'.$cat->id.'/edit')); ?>" class="btn btn-info">Edit</a>
                    <a href="#" wire:click="deleteCategory(<?php echo e($cat->id); ?>)" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Delete</a>
                  </div>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

          </tbody>
        </table>
        <div class="mt-2">
            <?php echo e($categories->links()); ?>

        </div>
      </div>
</div>
</div>
    </div>
  </div>
</div>
<?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/livewire/admin/category/index.blade.php ENDPATH**/ ?>