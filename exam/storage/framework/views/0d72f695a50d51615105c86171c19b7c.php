
<?php $__env->startSection('title', 'minitest'); ?>
<?php $__env->startSection('content'); ?>
<div class="card mt-5">
    <h2>Bill items</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>

    
        <tbody>
 <?php $__currentLoopData = $bill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <tr>
    <td><?php echo e($item['item']); ?></td>
    <td><?php echo e($item['quantity']); ?></td>
    <td><?php echo e($item['price']); ?></td>
 </tr>
 
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
 </table>
</div>
<?php $__env->stopSection(); ?>

 

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Ehk\Desktop\webSec\WebSec230104467\exam\resources\views/minitest.blade.php ENDPATH**/ ?>