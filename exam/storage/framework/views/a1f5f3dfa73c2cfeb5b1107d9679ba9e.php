<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>


    <div class="card m-4">
        <div class="card-body">
            <button type="button" class="btn btn-primary" onclick="doSomething()">Press Me</button>
        </div>
    </div>

    <script>
        function doSomething() {
            alert("Hello from JavaScript!");
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Ehk\Desktop\webSec\WebSec230104467\exam\resources\views/welcome.blade.php ENDPATH**/ ?>