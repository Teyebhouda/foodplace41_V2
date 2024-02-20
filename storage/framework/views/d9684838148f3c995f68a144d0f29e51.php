<?php echo $__env->make('client.layouts.top_menu_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->make('client.layouts.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- Header End -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
.btn-social {
    text-align: center; 
    margin-right: 10px; 
}

.btn-social i {
    font-size: 24px; 
    margin-right: 10px; 
}
	
	<style>
    .auth-wrapper {
        margin-bottom: 20px; /* Add margin to the bottom of the auth-wrapper */
    }
</style>
	
.fa-google {
  background: conic-gradient(from -45deg, #ea4335 110deg, #4285f4 90deg 180deg, #34a853 180deg 270deg, #fbbc05 270deg) 73% 55%/150% 150% no-repeat;
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  -webkit-text-fill-color: transparent;

}
	
	
</style>
<br>
<br>
  <!-- Register Form Start -->
  <div class="section">
<div class="auth-wrapper">
    <div class="imgs-wrapper">
      <img src="assets/img/veg/11.png" alt="veg" class="d-none d-lg-block">
      <img src="assets/img/prods/3.png" alt="veg" class="d-none d-lg-block">
    </div>

    <div class="container">
      <div class="auth-wrapper">

        <div class="auth-description bg-cover bg-center dark-overlay dark-overlay-2" style="background-image: url('assets/img/auth.jpg')">
          <div class="auth-description-inner">
            <i class="flaticon-chili"></i>
            <h2>Inscription !</h2>
            <p></p>
          </div>
        </div>
        <div class="auth-form">

          <h2>S'inscrire</h2>

          <form method="post" action="<?php echo e(route('register.submit', ['subdomain' => $subdomain])); ?>">
              <?php echo csrf_field(); ?>
              <div class="row">
                <div class="form-group col-xl-6">
                 
                  <input type="text" placeholder="Nom" name="nom" class="form-control" value="" required="">
     
                </div>
                <div class="form-group col-xl-6">
                 
                  <input type="text" placeholder="Prénom" name="prenom" class="form-control" value="" required="">
                </div>
                </div>
               
                <div class="form-group col-xl-12">
                 
                  <input type="text" placeholder="Adresse" name="addresse" class="form-control" value="" required="">
                </div>
                <div class="row">
                <div class="form-group col-xl-6">
                 
                  <input type="text" placeholder="Code Postal" name="codePostal" class="form-control" value="">
                </div>
                <div class="form-group col-xl-6">
                  
                  <input type="text" placeholder="Ville" name="ville" class="form-control" value="" required="">
                </div>
                </div>
                <div class="row">
                <div class="form-group col-xl-6">
                 
                  <input type="text" placeholder="N° téléphone 1" name="num1" class="form-control" value="" required="">
                </div>
                <div class="form-group col-xl-6">
                 
                  <input type="text" placeholder="N° téléphone 2(optionnel)" name="num2" class="form-control" value="" >
                </div>
                </div>
               
               
<div class="form-group col-xl-12">
    <input type="email" placeholder="Adresse Email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required>
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
    <input id="password" type="password" class="form-control form-control-light" name="password" placeholder="Mot de passe"  autocomplete="new-password" required minlength="8">
</div>
                  

                  <button type="submit" class="btn-custom primary"> <?php echo e(__('S\'inscrire')); ?></button>
			  <br>
			   <br>
                    <a href="<?php echo e(route('register.google', ['subdomain' => $subdomain])); ?>" class="btn  btn-social">
            <i class="fab fa-google  fa-2x"></i> Se connecter avec Google
        </a>
    

            <p>Vous avez déjà un compte? <a href="<?php echo e(route('client.login', ['subdomain' => $subdomain])); ?>">Se connecter</a> </p>

          </form>
        </div>

      </div>
    </div>
	</div>
  </div>
  <!-- Register Form End -->

  <!-- Footer Start -->
  <?php echo $__env->make('client.layouts.footer_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\inetpub\vhosts\foodexpress.site\xn--OrlandosCaf-lbb.foodexpress.site\resources\views/client/register.blade.php ENDPATH**/ ?>