<?php $__env->startSection('content'); ?>

<div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.category.index', [])->html();
} elseif ($_instance->childHasBeenRendered('4OI4jop')) {
    $componentId = $_instance->getRenderedChildComponentId('4OI4jop');
    $componentTag = $_instance->getRenderedChildComponentTagName('4OI4jop');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('4OI4jop');
} else {
    $response = \Livewire\Livewire::mount('admin.category.index', []);
    $html = $response->html();
    $_instance->logRenderedChild('4OI4jop', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\resources\views/admin/category/index.blade.php ENDPATH**/ ?>