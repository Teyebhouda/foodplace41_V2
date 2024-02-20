<?php echo $__env->make('client.layouts.top_menu_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('client.layouts.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('client.layouts.cart_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
    <h1>Modifier Compte</h1>
    <form method="POST" action="<?php echo e(route('updateProfile', ['subdomain' => $subdomain])); ?>">

        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Add input fields for user information here -->
        <!-- <div class="form-group">
            <label for="nom">Email</label>
            <input type="text" name="email" id="email" value="<?php echo e($newuser->email); ?>" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="nom">password</label>
            <input type="text" name="password" id="password" value="<?php echo e($newuser->password); ?>" class="form-control" required="">
        </div>-->
        
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="FirstName" id="FirstName" value="<?php echo e($newuser->FirstName); ?>" class="form-control" required="" readonly>
        </div>
        <div class="form-group">
            <label for="nom">Prénom</label>
            <input type="text" name="LastName" id="LastName" value="<?php echo e($newuser->LastName); ?>" class="form-control" required="" readonly>
        </div>
        <div class="form-group">
            <label for="nom">Email</label>
            <input type="text" name="email" id="email" value="<?php echo e($newuser->email); ?>" class="form-control" required=""readonly>
        </div>
        <div class="form-group">
            <label for="nom">Ville</label>
            <input type="text" name="ville" id="ville" value="<?php echo e($newuser->ville); ?>" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="nom">Adresse</label>
            <input type="text" name="Address" id="Address" value="<?php echo e($newuser->Address); ?>" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="nom">CodePostal</label>
            <input type="text" name="codepostal" id="codepostal" value="<?php echo e($newuser->codepostal); ?>" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="nom">Numéro Téléphone 1 </label>
            <input type="text" name="phoneNum1" id="phoneNum1" value="<?php echo e($newuser->phoneNum1); ?>" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="nom">Numéro Téléphone 2 </label>
            <input type="text" name="phoneNum2" id="phoneNum2" value="<?php echo e($newuser->phoneNum2); ?>" class="form-control" >
        </div>
        
       
        <!-- Repeat similar fields for other user information -->

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </form>
</div>
<?php echo $__env->make('client.layouts.footer_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\inetpub\vhosts\foodexpress.site\xn--OrlandosCaf-lbb.foodexpress.site\resources\views/client/edit_profile.blade.php ENDPATH**/ ?>