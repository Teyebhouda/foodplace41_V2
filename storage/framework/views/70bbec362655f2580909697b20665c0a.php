 <?php echo $__env->make('client.layouts.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 



<style>
    .contact-container {
        font-family: 'Arial', sans-serif;
        max-width: 600px;
        margin: 0 auto;
    }

    .contact-container h1 {
        color: #333;
    }

    .contact-info {
        background-color: #f5f5f5;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .contact-info h2 {
        color: #333;
    }

    .contact-form {
        background-color: #f5f5f5;
        padding: 20px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .contact-form h2 {
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        color: #333;
        font-weight: bold;
        display: block;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border-color 0.2s;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #007bff;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

<?php $__env->startSection('content'); ?>
<div class="container contact-container">
  
    <br>
    <br>
	<br>
	<br>
	<br>
    <h1 class="mb-4">Contactez-Nous</h1>
    <p>N'hésitez pas à nous contacter en utilisant les informations de contact ci-dessous :</p>

    <div class="contact-info">
        <h2>Coordonnées de Contact</h2>
        <p>Adresse : <b><?php echo e($client->localisation); ?> </b></p>
        <p>Téléphone : <b><?php echo e($client->phoneNum1); ?> </b></p>
        <p>Email : <b><?php echo e($user->email); ?></b></p>
    </div>

    <div class="contact-form">
        <h2>Formulaire de Contact</h2>
<form action="<?php echo e(route('contact.submit', ['subdomain' => $subdomain])); ?>" method="post">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" class="form-control" required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" class="form-control" required>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="phone">Téléphone :</label>
                <input type="tel" id="phone" name="phone" class="form-control" required>
                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
	
			  <div class="form-group">
				<label for="message">Message :</label>
				<textarea id="message" name="message" class="form-control" rows="4" style="height: 150;" required></textarea>
				<?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
				<span class="text-danger"><?php echo e($message); ?></span>
				<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
			</div>
	
	
            <br>

            <button type="submit" class="btn btn-primary">Envoyer</button>
            <br>
            <br>
            <br>
        </form>
    </div>
</div>

<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<?php echo $__env->make('client.layouts.footer_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('client.layouts.top_menu_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\inetpub\vhosts\foodexpress.site\xn--OrlandosCaf-lbb.foodexpress.site\resources\views/client/contact.blade.php ENDPATH**/ ?>