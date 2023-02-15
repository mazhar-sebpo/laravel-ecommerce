    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="createModalLabel">Add Brand</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form wire:submit.prevent="storeBrand">
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputUsername1">Brand Name</label>
                    <input type="text" name="name" wire:model.defer="name" class="form-control" id="exampleInputUsername1" >
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slug</label>
                    <input type="text" name="slug" wire:model.defer="slug"  class="form-control" id="exampleInputEmail1" >
                    <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputConfirmPassword1">Brand Image</label>
                    <input type="file" name="image" wire:model.defer="image" class="form-control" >
                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Brand Status</label>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" wire:model.defer="status" name="status" id="membershipRadios1" value="1" checked="">
                          Active
                        <i class="input-helper"></i></label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="status" wire:model.defer="status" id="membershipRadios2" value="0">
                          Inactive
                        <i class="input-helper"></i></label>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save Brand</button>
            </div>
        </form>
          </div>
        </div>
      </div>


          <!-- Show Modal -->
    <div wire:ignore.self class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="showModalLabel">Brand Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputUsername1"><b>Brand Name</b></label>
                    <p><?php echo e($name ?? ''); ?></p>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1"><b>Slug</b></label>
                    <p><?php echo e($slug ?? ''); ?></p>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputConfirmPassword1"><b>Brand Image</b></label>
                    <br/>
                    <?php if($image): ?>
                    <img src="<?php echo e(asset('storage/'.$image)); ?>" width="50" alt="brand image">
                    <?php endif; ?>
                  </div>
                  <div class="form-group">
                    <label class="exampleInputConfirmPassword1"><b>Brand Status</b></label>
                        <p><?php echo e($status == '1' ? 'Active':'Inactive'); ?></p>


                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Update Modal -->
    <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="updateModalLabel">Update Brand</h5>
              <button type="button" wire:click="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            
            <form wire:submit.prevent="updateBrand">
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputUsername1">Brand Name</label>
                    <input type="text" name="name" wire:model.defer="name" class="form-control" id="exampleInputUsername1" >
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slug</label>
                    <input type="text" name="slug" wire:model.defer="slug"  class="form-control" id="exampleInputEmail1" >
                    <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputConfirmPassword1">Brand Image</label>
                    <br/>
                    <?php if($new_image): ?>
                    <img src="<?php echo e($new_image->temporaryUrl()); ?>" width="200"  alt="brand image">
                    <?php else: ?>
                    <img src="<?php echo e(asset('storage/'.$old_image)); ?>" width="200" alt="brand image">
                    <?php endif; ?>
                    <br/>
                    <input type="file" name="image" wire:model.defer="new_image" class="form-control" >
                    <input type="hidden"  wire:model.defer="old_image" class="form-control" >
                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Brand Status</label>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" wire:model.defer="status" name="status" id="membershipRadios1" value="1" >
                          Active
                        <i class="input-helper"></i></label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="status" wire:model.defer="status" id="membershipRadios2" value="0">
                          Inactive
                        <i class="input-helper"></i></label>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" wire:click="closeModal" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update Brand</button>
            </div>
        </form>
    
          </div>
        </div>
      </div>


          <!-- Delete Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Delete Brand</h5>
              <button type="button" wire:click="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            
            <form wire:submit.prevent="destroyBrand">
            <div class="modal-body">
<h5>Are you sure?</h5>
            </div>
            <div class="modal-footer">
              <button type="button" wire:click="closeModal" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Delete Brand</button>
            </div>
        </form>
    
          </div>
        </div>
      </div>
<?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/livewire/admin/brand/modal_form.blade.php ENDPATH**/ ?>