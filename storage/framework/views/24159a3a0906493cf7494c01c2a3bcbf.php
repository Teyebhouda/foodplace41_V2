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
       
            <div class="section">
    <p>Merci pour votre demande de réservation, <?php echo e($ClientFName); ?>. Nous avons bien reçu votre demande et nous la traiterons dans les plus brefs délais. Nous avons hâte de vous accueillir!</p>
</div>
    </div>
</div>
<!-- Cart Items End -->

<?php echo $__env->make('client.layouts.footer_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\inetpub\vhosts\foodexpress.site\xn--OrlandosCaf-lbb.foodexpress.site\resources\views/client/booking_success.blade.php ENDPATH**/ ?>