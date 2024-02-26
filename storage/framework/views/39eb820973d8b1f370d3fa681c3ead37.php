<?php echo $__env->make('client.layouts.top_menu_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Aside (Mobile Navigation) -->
<?php echo $__env->make('client.layouts.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Cart Items Start -->
<div class="section">
    <div class="container">
        <?php if(Session::has('success')): ?>
    <div class="alert alert-success">
        <?php echo e(Session::get('success')); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(Session::get('error')); ?>

    </div>
<?php endif; ?>
		<br>
		<br>
		<br>
		<br>
       
            <p>Votre Commande est confirmée, merci pour votre confiance.</p>
    </div>
</div>
<!-- Cart Items End -->

<?php echo $__env->make('client.layouts.footer_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\Users\teyeb\laravel dev\Foodplace-v2\foodplace41_V2\resources\views/client/checkout_success.blade.php ENDPATH**/ ?>