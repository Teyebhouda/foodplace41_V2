<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title>FoodPlace41</title>

  <!-- Vendor Stylesheets -->
  <link rel="stylesheet" href="<?php echo e(asset('assetsClients/css/plugins/bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assetsClients/css/plugins/animate.min.css')); ?>">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('assetsClients/css/plugins/slick.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assetsClients/css/plugins/slick-theme.css')); ?>">
  <!-- Icon Fonts -->
  <link rel="stylesheet" href="<?php echo e(asset('assetsClients/fonts/flaticon/flaticon.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assetsClients/fonts/font-awesome/css/all.min.css')); ?>">

  <!-- Slices Style sheet -->
  <link rel="stylesheet" href="<?php echo e(asset('assetsClients/css/style.css')); ?>">
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assetsClients/css/plugins/bootstrap.min.css')); ?>favicon.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofE4xGgjz1E0fK4IYY5S7f5dN2uIj8jfg" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvRW47pdA3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofE4xGgjz1E0fK4IYY5S7f5dN2uIj8jfg" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvRW47pdA3" crossorigin="anonymous">
    <style>
    #delivery-method-list {
        list-style-type: none;
        padding: 0;
        display: flex;
        gap: 10px;
    }

    .delivery-method-btn {
        cursor: pointer;
        border: 1px solid #141310;
        border-radius: 15px; /* Adjust the border-radius to make it more rounded */
        padding: 10px;
        background-color: #fff;
        transition: background-color 0.3s;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .delivery-method-btn.active {
        background-color: #d76c6f;
        color: #fff;
        border-color: #af191b;
    }

    #delivery-time-container {
        margin-top: 10px;
        display: none;
    }

    #delivery-time-buttons {
        display: flex;
        gap: 10px;
    }

    #delivery-time-buttons button {
        cursor: pointer;
        border: 1px solid #007bff;
        border-radius: 15px; /* Adjust the border-radius to make it more rounded */
        padding: 10px;
        background-color: #fff;
        transition: background-color 0.3s;
    }

    #delivery-time-buttons button.active {
        background-color: #d76c6f;
        color: #fff;
        border-color: #007bff;
    }
</style>
</head>

<body> 
	<?php
    $livraisonExists = false; // Flag to check if Livraison method exists
?>

<?php $__currentLoopData = $livraisons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $livraison): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($livraison): ?>
        <?php
            $livraisonType = \App\Models\Livraison::find($livraison->livraison_id);
            if ($livraisonType->methode == "Livraison") {
                $livraisonExists = true; // Set flag if Livraison method exists
            }
        ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if($livraisonExists): ?>
    <?php echo $__env->make('client.layouts.popup_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>      

  <!-- Preloader Start -->
  <div class="ct-preloader">
    <div class="ct-preloader-inner">
      <div class="lds-ripple"><div></div><div></div></div>
    </div>
  </div>
  <!-- Preloader End --><?php /**PATH C:\Users\teyeb\laravel dev\Foodplace-v2\foodplace41_V2\resources\views/client/layouts/top_menu_client.blade.php ENDPATH**/ ?>