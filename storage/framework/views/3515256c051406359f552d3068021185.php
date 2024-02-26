<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de commande</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 18px;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 24px;
        }

        h2 {
            font-size: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Cher(e) restaurant,</h1>

    <h2>Vous avez une nouvelle commande.</h2>

    <ul style="font-size: 18px;">
	<li><strong>Date de commande :</strong> <?php echo e($currentDateTime); ?></li>
    <li><strong>Numéro de commande :</strong> <?php echo e($commandId); ?></li>
	<li><strong>Client :</strong> <?php echo e($clientFirstName); ?> <?php echo e($clientLastName); ?></li>
	<li><strong>Numéro de téléphone :</strong> <?php echo e($clientNum1); ?> </li>
	<li><strong>Adresse :</strong> <?php echo e($clientAdresse); ?> </li>
    
    <li><strong>Produits commandés :</strong></li>
</ul>

<table style="font-size: 18px; width: 100%;">
    <thead>
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix</th>
        </tr>
    </thead>
    <tbody>
       <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($item['options'])): ?>
                <?php if(is_array($item['options'])): ?>
                    <tr>
                        <td>
                            <?php echo e($item['name']); ?><br>
                            Options:
                            <?php $__currentLoopData = $item['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($index == 0): ?>
                                <?php endif; ?>
                                <?php echo e($option['name']); ?> (<?php echo e($option['quantity']); ?> x <?php echo e($option['price']); ?> €)<?php if(!$loop->last): ?>, <?php endif; ?>
                                <?php if(($index + 1) % 5 == 0): ?> <br> <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td><?php echo e($item['quantity']); ?></td>
                        <td><?php echo e($item['price']); ?> €</td>
                    </tr>
                <?php else: ?>
                    <?php
                    $options = explode(', ', $item['options']);
                    ?>
                    <tr>
                        <td>
                            <?php echo e($item['name']); ?><br>
							  Options:

                            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($index == 0): ?>
                                <?php endif; ?>
                                <?php echo e($option); ?><?php if($index < count($options) - 1): ?>, <?php endif; ?>
                                <?php if(($index + 1) % 5 == 0): ?> <br> <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td><?php echo e($item['quantity']); ?></td>
                        <td><?php echo e($item['price']); ?> €</td>
                    </tr>
                <?php endif; ?>
            <?php else: ?>
                <tr>
                    <td><?php echo e($item['name']); ?></td>
                    <td><?php echo e($item['quantity']); ?></td>
                    <td><?php echo e($item['price']); ?> €</td>
                </tr>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>


    <h2>Montant total TTC : <?php echo e($totalPrice); ?> €</h2>

    <h2>Veuillez préparer la commande pour la livraison ou à emporter.</h2>

    <p style="font-size: 16px;">Cordialement.</p>
</body>
</html>
<?php /**PATH C:\Users\HD\Workspace\foodexpress\resources\views/order_confirmation_restaurant.blade.php ENDPATH**/ ?>