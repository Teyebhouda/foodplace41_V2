<?php echo $__env->make('client.layouts.top_menu_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Aside (Mobile Navigation) -->
<?php echo $__env->make('client.layouts.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
   /* Style the social login buttons */
.btn-social {
    text-align: left; /* Align the icon and text to the left */
    margin-right: 10px; /* Add space to the right of the first button */
	 border-radius: 9999px;
}

/* Adjust the icon size */
.btn-social i {
    font-size: 24px; /* Adjust the size as needed */
    margin-right: 10px; /* Add space between the icon and text */
	
    border-radius: 9999px;
   
	}
	.fa-google {
  background: conic-gradient(from -45deg, #ea4335 110deg, #4285f4 90deg 180deg, #34a853 180deg 270deg, #fbbc05 270deg) 73% 55%/150% 150% no-repeat;
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  -webkit-text-fill-color: transparent;

}

.check-form {
   
    background-color: #f9f9f9;
    padding: 60px;
    text-align: left;
}
</style>
<!-- Cart Items Start -->
<div class="section">
    <div class="container">
        <div id="container_details">
			<br>
            <h3>Votre Panier</h3>
			
            <?php if(count($cartItems) > 0): ?>
			<div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            
                            <th>Article</th>
                            <th>Prix unitaire</th>
                           
                            
                            <th>Options</th>
                            <th>Quantity</th>
                            <th>Prix total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-product-id="<?php echo e($cartItem['id']); ?>">
                               
                                <td><?php echo e($cartItem['name']); ?></td>
                                <td><?php echo e($cartItem['unityPrice']); ?> €</td>
                               
                                <td>
                                    <?php if((isset($cartItem['options'])) &&($cartItem['options'] != [])): ?>
                                    <?php echo e($cartItem['options']); ?>

                                <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($cartItem['quantity']); ?>

                                <!-- <button class="btn-quantity" data-product="<?php echo e($cartItem['id']); ?>" data-action="decrease">-</button>
                                    <input type="number" name="quantity[<?php echo e($cartItem['id']); ?>]" id="quantity_<?php echo e($cartItem['id']); ?>" value="<?php echo e($cartItem['quantity']); ?>" min="1" max="100">
                                    <button class="btn-quantity" data-product="<?php echo e($cartItem['id']); ?>" data-action="increase">+</button> -->
                                </td>
                                <td><?php echo e($cartItem['price']); ?> €</td>
                                <td><button class="btn-remove" data-product-id="<?php echo e($cartItem['id']); ?>">Annuler</button></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr class="total">
                  <td>
                    <h6 class="mb-0">Total</h6>
                  </td>
                  <td></td>
                  <td> <div class="totalprice"> <span><strong><?php echo e($totalPrice); ?> €</strong></span></div></td>
                </tr>
                    </tbody> 
                </table>
				</div>
                <?php if(auth('clientRestaurant')->check()): ?>
                <div class="check-form">

                    <!-- Show the regular checkout form for authenticated users -->
                    <form id="checkoutForm"  method="POST" action="<?php echo e(route('client.checkout1.store')); ?>"  class="check-validation">
                        <?php echo csrf_field(); ?>

  <div class="row">
              <div class="form-group col-xl-6">
                <label>Nom <span class="text-danger">*</span></label>
                <input type="text" placeholder="Nom" name="nom" class="form-control" value="<?php echo e(optional($clientRestaurant)->FirstName); ?>" required="">
              </div>
              <div class="form-group col-xl-6">
                <label>Prénom <span class="text-danger">*</span></label>
                <input type="text" placeholder="Prénom" name="prenom" class="form-control" value="<?php echo e(optional($clientRestaurant)->LastName); ?>" required="">
              </div>
              </div>
             
              <div class="form-group col-xl-12">
                <label> Adresse<span class="text-danger">*</span></label>
                <input type="text" placeholder="Adresse" name="adresse" class="form-control" value="<?php echo e(optional($clientRestaurant)->Address); ?>" required="">
              </div>
              <div class="row">
              <div class="form-group col-xl-6">
                <label>Code Postal<span class="text-danger">*</span></label>
                <input type="text" placeholder="Code Postal" name="codePostal" class="form-control" value="<?php echo e(optional($clientRestaurant)->codepostal); ?>">
              </div>
              <div class="form-group col-xl-6">
                <label>Ville <span class="text-danger">*</span></label>
                <input type="text" placeholder="Ville" name="ville" class="form-control" value="<?php echo e(optional($clientRestaurant)->ville); ?>" required="">
              </div>
              </div>
              <div class="row">
              <div class="form-group col-xl-6">
                <label>Numéro de téléphone 1<span class="text-danger">*</span></label>
                <input type="text" placeholder="Numéro de téléphone " name="num1" class="form-control" value="<?php echo e(optional($clientRestaurant)->phoneNum1); ?>" required="">
              </div>
              <div class="form-group col-xl-6">
                <label>Numéro de téléphone 2</label>
                <input type="text" placeholder="Numéro de téléphone " name="num2" class="form-control" value="<?php echo e(optional($clientRestaurant)->phoneNum2); ?>" >
              </div>
              </div>
                         <!-- Cart Details and Delivery Method -->
 <div id="cartDetailsAndDeliveryMethod">
    <?php if(count($livraisons) > 0): ?>
        <h3>Choisissez la méthode de livraison</h3>
        <div class="select-wrapper">
            <select id="delivery_method" name="delivery_method" class="form-control">
                <option value="" disabled hidden selected>&#9660; Sélectionner la méthode de livraison</option> <!-- Default message with down arrow symbol -->
                <?php $__currentLoopData = $livraisons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $livraison): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($livraison): ?>
                        <?php
                            $livraisonType = \App\Models\Livraison::find($livraison->livraison_id);
                        ?>
                        <option value="<?php echo e($livraisonType->id); ?>" data-method="<?php echo e($livraisonType->methode); ?>"><?php echo e($livraisonType->methode); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <br>
        <div id="delivery-time-container" style="display: none;">
            <label for="delivery_time">Choisissez l'heure de livraison :</label>
            <select id="delivery_time" name="delivery_time" class="form-control">
                <option value="" disabled selected>Sélectionnez une heure</option>
            </select>
        </div>

        <script>
            document.getElementById('delivery_method').addEventListener('change', function () {
                var deliveryMethod = this.value;
                var selectedOption = this.options[this.selectedIndex];
                var deliveryTimeContainer = document.getElementById('delivery-time-container');

                var dataMethod = selectedOption.getAttribute('data-method');
                var deliveryTypeId = selectedOption.value;
                console.log('Delivery Method:', dataMethod);
                if (dataMethod === "Click & Collect") {
                    deliveryTimeContainer.style.display = 'block';
                    deliveryTimeSelect.setAttribute('required', 'required');
                    console.log('Delivery Method:', dataMethod);
                    console.log('Delivery Type ID:', deliveryTypeId);
                } else {
                    deliveryTimeContainer.style.display = 'none';
                    deliveryTimeSelect.removeAttribute('required');
                }
            });

            const now = new Date();
            const currentHour = now.getHours();
            const currentMinute = now.getMinutes();

            for (let hour = currentHour; hour <= 23; hour++) {
                for (let minute = 0; minute <= 45; minute += 15) {

                    const formattedHour = hour.toString().padStart(2, '0');
                    const formattedMinute = minute.toString().padStart(2, '0');

                    const option = document.createElement('option');
                    option.value = `${formattedHour}:${formattedMinute}`;
                    option.text = `${formattedHour}:${formattedMinute}`;

                    document.getElementById('delivery_time').appendChild(option);
                }
            }
        </script>
    <?php endif; ?>
</div>

   
      <!-- Payment Method -->
<div id="paymentMethod">
    <?php if(count($paiments) > 0): ?>
        <h3>Choisissez la méthode de paiement</h3>
        <div class="select-wrapper">
            <select id="payment_method" name="payment_method" class="form-control">
                <option value="" disabled hidden selected>&#9660; Sélectionner le mode de paiement</option> <!-- Default message with down arrow symbol -->
                <?php $__currentLoopData = $paiments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paiment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $paimentType = \App\Models\PaimentMethod::find($paiment->paiment_id);
                    ?>
                    <!-- Assuming the name field for the payment method is 'id' -->
                    <option value="<?php echo e($paimentType->id); ?>" data-method="<?php echo e($paimentType->type_methode); ?>"><?php echo e($paimentType->type_methode); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

    <?php endif; ?>

    <br>
</div>
		


                        <!-- Other form fields for delivery method, payment method, etc. -->
						  <button type="submit"   class="btn-custom" id="btncustom" onclick="return validateForm()">Confirmer</button>
                       
                        </form>
                        </div>
			<script>
function validateForm() {
    var deliveryMethod = document.getElementById('delivery_method').value;
    var paymentMethod = document.querySelector('#paymentMethod select[name="payment_method"]').value;

    if (deliveryMethod === "" && paymentMethod === "") {
        alert("Veuillez sélectionner une méthode de livraison et un mode de paiement avant de confirmer la commande.");
        return false; // Prevent form submission
    } else if (deliveryMethod === "") {
        alert("Veuillez sélectionner une méthode de livraison avant de confirmer la commande.");
        return false; // Prevent form submission
    } else if (paymentMethod === "") {
        alert("Veuillez sélectionner un mode de paiement avant de confirmer la commande.");
        return false; // Prevent form submission
    }

    return true; // Allow form submission
}
</script>

                <?php else: ?>
                <div class="check-form">
                <div class="row">
                 <!-- Buyer Info -->
            <h4>Entrer vos détailles</h4>
              
            <div class="col-xl-11">
            <form id="checkoutForm"  method="POST" action="<?php echo e(route('client.checkout1.store')); ?>"  class="check-validation">
            <?php echo csrf_field(); ?>
            <div class="row">
              <div class="form-group col-xl-6">
                <label>Nom <span class="text-danger">*</span></label>
                <input type="text" placeholder="Nom" name="nom" class="form-control" value="" required="">
              </div>
              <div class="form-group col-xl-6">
                <label>Prénom <span class="text-danger">*</span></label>
                <input type="text" placeholder="Prénom" name="prenom" class="form-control" value="" required="">
              </div>
              </div>
             
              <div class="form-group col-xl-12">
                <label> Adresse<span class="text-danger">*</span></label>
                <input type="text" placeholder="Adresse" name="adresse" class="form-control" value="" required="">
              </div>
              <div class="row">
              <div class="form-group col-xl-6">
                <label>Code Postal<span class="text-danger">*</span></label>
                <input type="text" placeholder="Code Postal" name="codePostal" class="form-control" value="">
              </div>
              <div class="form-group col-xl-6">
                <label>Ville <span class="text-danger">*</span></label>
                <input type="text" placeholder="Ville" name="ville" class="form-control" value="" required="">
              </div>
              </div>
              <div class="row">
              <div class="form-group col-xl-6">
                <label>Numéro de téléphone 1<span class="text-danger">*</span></label>
                <input type="text" placeholder="Numéro de téléphone " name="num1" class="form-control" value="" required="">
              </div>
              <div class="form-group col-xl-6">
                <label>Numéro de téléphone 2</label>
                <input type="text" placeholder="Numéro de téléphone " name="num2" class="form-control" value="" >
              </div>
              </div>
              <div class="row">
              
             <!-- <div class="form-group col-xl-12 mb-0">
                <label>Order Notes</label>
                <textarea name="name" rows="5" class="form-control" placeholder="Order Notes (Optional)"></textarea>
              </div>-->
              <br>
              <div class="form-group">
                <input id="checkbox" name="creer_un_compte" type="checkbox" class="form-control-light">
                <label>Créer un compte</label>
            </div>
            <div id="accountFields" style="display: none;">
                <div class="form-group col-xl-12">
                    <label>Adresse Email  <span class="text-danger">*</span></label>
                    <input type="email" placeholder=" Adresse Email" name="email" class="form-control" value="" >
                </div>
                <div class="form-group">
                    <label>Mot de passe <span class="text-danger">*</span></label>
                 
                    <input id="password" type="password" class="form-control form-control-light" name="password" placeholder="Mot de passe"  autocomplete="new-password">
                </div>
              
            </div>
        
       
              <p>Vous avez déjà un compte? <a href="<?php echo e(route('client.login')); ?>">Connexion</a> </p>    
				  <div class="form-group">
                  <a href="<?php echo e(route('register.google')); ?>" class="btn  btn-social">
            <i class="fab fa-google  fa-6x"></i> Se connecter avec Google
        </a>
    
    
</div>
                                    
              </div>

  <!-- Cart Details and Delivery Method -->
  <div id="cartDetailsAndDeliveryMethod">
    <?php if(count($livraisons) > 0): ?>
        <h3>Choisissez la méthode de livraison</h3>


        <ul id="delivery-method-list">
            <?php $__currentLoopData = $livraisons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $livraison): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($livraison): ?>
                    <?php
                        $livraisonType = \App\Models\Livraison::find($livraison->livraison_id);
                    ?>
                    <li class="delivery-method-btn" data-method="<?php echo e($livraisonType->methode); ?>" data-id="<?php echo e($livraisonType->id); ?>">
                        <i class="fas fa-truck"></i>
                        <i class="far fa-clock"></i> 
                        <span><?php echo e($livraisonType->methode); ?></span>
                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

        <div id="delivery-time-container">
            <label for="delivery_time">Choisissez l'heure de livraison :</label>
            <select id="delivery_time" name="delivery_time" class="form-control">
                <option value="" disabled selected>Sélectionnez une heure</option>
            </select>
        </div>

        <script>
            var deliveryTimeContainer = document.getElementById('delivery-time-container');
            var deliveryTimeSelect = document.getElementById('delivery_time');
            var deliveryTimeButtonsContainer = document.getElementById('delivery-time-buttons');

            document.querySelectorAll('.delivery-method-btn').forEach(function(button) {
                button.addEventListener('click', function() {
                    var dataMethod = this.getAttribute('data-method');
                    var deliveryTypeId = this.getAttribute('data-id');
            document.getElementById('delivery_method_input').value = deliveryTypeId;

                    console.log('Delivery Method:', dataMethod);
                    console.log('Delivery Type ID:', deliveryTypeId);

                    if (dataMethod === "Click & Collect") {
                        deliveryTimeContainer.style.display = 'block';
                        deliveryTimeSelect.setAttribute('required', 'required');
                        populateDeliveryTimeOptions();
                    } else {
                        deliveryTimeContainer.style.display = 'none';
                        deliveryTimeSelect.removeAttribute('required');
                    }

                    // Toggle active class for switchable buttons
                    document.querySelectorAll('.delivery-method-btn').forEach(function(btn) {
                        btn.classList.remove('active');
                    });
                    this.classList.add('active');
                });
            });

            function populateDeliveryTimeOptions() {
                const now = new Date();
                const currentHour = now.getHours();
                const currentMinute = now.getMinutes();

                deliveryTimeSelect.innerHTML = '';

                for (let hour = currentHour; hour <= 23; hour++) {
                    for (let minute = 0; minute <= 45; minute += 15) {
                        const formattedHour = hour.toString().padStart(2, '0');
                        const formattedMinute = minute.toString().padStart(2, '0');

                        const option = document.createElement('option');
                        option.value = `${formattedHour}:${formattedMinute}`;
                        option.text = `${formattedHour}:${formattedMinute}`;

                        deliveryTimeSelect.appendChild(option);
                    }
                }
            }
        </script>
    <?php endif; ?>
</div>


       
      <!-- Payment Method -->
      <div id="paymentMethod">
    <?php if(count($paiments) > 0): ?>
        <h3>Choisissez la méthode de paiement</h3>
        <ul id="payment-method-list" class="switchable-list">
            <?php $__currentLoopData = $paiments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paiment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $paimentType = \App\Models\PaimentMethod::find($paiment->paiment_id);
                ?>
                <!-- Assuming the name field for the payment method is 'id' -->
                <li class="payment-method-btn" data-method="<?php echo e($paimentType->type_methode); ?>" data-id="<?php echo e($paimentType->id); ?>">
                    <i class="far fa-credit-card"></i> <!-- Icon for credit card, adjust as needed -->
                    <span><?php echo e($paimentType->type_methode); ?></span>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>

    <br>
</div>

<style>
    .switchable-list {
        list-style-type: none;
        padding: 0;
        display: flex;
        gap: 10px;
    }

    .payment-method-btn {
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

    .payment-method-btn.active {
        background-color: #d76c6f;
        color: #fff;
        border-color: #af191b;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var paymentMethodButtons = document.querySelectorAll('.payment-method-btn');

        paymentMethodButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var dataMethod = this.getAttribute('data-method');
            var PaymentTypeId = this.getAttribute('data-id');

            // Update the hidden input value
            document.getElementById('payment_method_input').value = PaymentTypeId;

                // Toggle active class for switchable buttons
                paymentMethodButtons.forEach(function (btn) {
                    btn.classList.remove('active');
                });
                this.classList.add('active');
            });
        });
    });
</script>
	

				
				
				
              <div class="form-group col-xl-12 mb-0">
            
				  
    <button type="submit"   class="btn-custom" id="btncustom" onclick="return validateForm()">Confirmer</button>
				  
           
            </div>


            <input type="hidden" name="delivery_method" id="delivery_method_input" value="">
            <input type="hidden" name="payment_method" id="payment_method_input" value="">
 

            </form>
				
				<script>
function validateForm() {
    var deliveryMethodButtons = document.querySelectorAll('.delivery-method-btn');
    var selectedDeliveryMethod = Array.from(deliveryMethodButtons).find(btn => btn.classList.contains('active'));

    var paymentMethodButtons = document.querySelectorAll('.payment-method-btn');
        var selectedPaymentMethod = Array.from(paymentMethodButtons).find(btn => btn.classList.contains('active'));

    if (!selectedDeliveryMethod && selectedPaymentMethod === "") {
        alert("Veuillez sélectionner la méthode de livraison et de paiement avant de confirmer la commande.");
        return false; // Prevent form submission
    } else if (!selectedDeliveryMethod) {
        alert("Veuillez sélectionner une méthode de livraison avant de confirmer la commande.");
        return false; // Prevent form submission
    } else if (!selectedPaymentMethod) {
            alert("Veuillez sélectionner une méthode de paiement avant de confirmer la commande.");
            return false; // Prevent form submission
        }
    return true; // Allow form submission
}
</script>
              </div>
             
           
     
 

                                                                        
                <?php endif; ?>
</div>
	
            <?php else: ?>
                <p>Aucun article dans le panier.</p>
            <?php endif; ?>
        </div>
        
        </div>  
		
	
		
        <div id="CartBancaire" name="CartBancaire" style="display: none;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <div class="panel panel-default credit-card-box" style="border: 2px solid #ccc; padding: 20px;">
                    <div class="panel-heading display-table">
                        <h3 class="panel-title">Détails de paiement</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" class="require-validation"
                            data-cc-on-file="false"
                           
                            id="payment-form">
                            <?php echo csrf_field(); ?>
                            <div class='form-row row'>
                                <div class='col-xs-12'>
                                    <i class="fab fa-cc-mastercard fa-2x card-icon" title="Mastercard"></i>
                                    <i class="fab fa-cc-visa fa-2x card-icon" title="Visa"></i>
                                    <i class="fab fa-cc-amex fa-2x card-icon" title="American Express"></i>
                                    <i class="fab fa-cc-discover fa-2x card-icon" title="Discover"></i>
                                    <i class="fab fa-cc-diners-club fa-2x card-icon" title="Diners Club"></i>
                                    <i class="fab fa-cc-jcb fa-2x card-icon" title="JCB"></i>
                                    <!-- Add more card icons for other card types here -->
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Nom sur la Carte</label>
                                    <input class='form-control' size='4' type='text'>
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class='col-xs-12 form group  required'>
                                    <label class='control-label'>Numéro de Carte</label>
                                    <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label>
                                    <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Mois d'expiration</label>
                                    <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Année d'expiration</label>
                                    <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class="col-md-12 error form-group hide">
    <div class="alert-danger alert"></div>
</div>

                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg btn-block btn-cart">Payer et Confirmer <b><?php echo e($totalPrice); ?> €</b></button>
                                </div>
                                <div class="col-xs-12">
                                    <div class="mb-4"></div>
                                    <button class="btn btn-danger btn-lg btn-block" type="button" onclick="goBack()">Annuler</button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
				 
<br/>
	<br/>
  
</div>
</div>
<!-- Cart Details and Delivery Method -->

 <script>
    function goBack() {
      //  window.history.back();
		 var detailscustom = document.getElementById('container_details');
        
         var CartBancaireContainer = document.getElementById('CartBancaire');
       
            CartBancaireContainer.style.display = 'none';
            
            detailscustom.style.display = 'block';
    }
</script>

    
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // JavaScript to handle form visibility toggling
    const confirmOrderBtn = document.getElementById('confirmOrderBtn');
    const cartDetailsAndDeliveryMethod = document.getElementById('cartDetailsAndDeliveryMethod');
    const confirmDeliveryMethodBtn = document.getElementById('confirmDeliveryMethodBtn');
    const paymentMethod = document.getElementById('paymentMethod');
    const container_details = document.getElementById('container_details');
    const registerAndCheckoutBtn = document.getElementById('registerAndCheckoutBtn');
    const successMessage = document.getElementById('successMessage');
   $(document).ready(function () {
        $(".btn-remove").click(function () {
            var button = $(this); // Get the clicked button
            var row = button.closest("tr");
            var productId = row.attr("data-product-id");
            
            $.ajax({
                url: '<?php echo e(route("remove.CartItem")); ?>',
        method: 'POST',
        data: {
            _token: '<?php echo e(csrf_token()); ?>',
            productId: productId,
        },
                success: function (response) {
                    // Update the UI and total price based on the response
                    row.remove();
                     // Update the cart item count in the header
     var cartItemCount = $('.cart-item-count');
    cartItemCount.text(response.cartItemCount);
                    var totalPriceElement = $('.totalprice span');
                     // Remove the row from the table
                     totalPriceElement.text(response.totalPrice + '$'); // Update total price
                },
                error: function (error) {
                    console.error('Error removing item:', error);
                    // Handle error gracefully
                }
            });
        });
    $(".btn-quantity").click(handleQuantityUpdate);

    function handleQuantityUpdate(event) {
        const productId = event.target.getAttribute('data-product');
        const action = event.target.getAttribute('data-action');
        const inputElement = document.getElementById('quantity_' + productId);

        let newQuantity = parseInt(inputElement.value);
        if (action === 'increase') {
            newQuantity++;
        } else if (action === 'decrease' && newQuantity > 1) {
            newQuantity--;
        }

        // Update the input element value immediately
        inputElement.value = newQuantity;

        // Send the updated quantity to the server
        updateQuantity(productId, newQuantity);
    }

    function updateQuantity(productId, quantity) {
    fetch('<?php echo e(route("update.quantity")); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        body: JSON.stringify({ productId, quantity })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data.message);
        // You can update the UI here to reflect the updated quantity in the cart
    })
    .catch(error => {
        console.error(error);
        // Handle any errors that may occur during the update
    });
}
});
$(document).ready(function() {
    // Select the checkbox and the container to show/hide
    var checkbox = $('#checkbox');
    var accountFields = $('#accountFields');

    // Toggle visibility when the checkbox state changes
    checkbox.change(function() {
        if (checkbox.is(':checked')) {
            accountFields.show(); // Show the fields
        } else {
            accountFields.hide(); // Hide the fields
        }
    });
});
	
	
	

 

  
    /*------------------------------------------
    --------------------------------------------
    Stripe Payment Code
    --------------------------------------------
    --------------------------------------------*/
			 var $checkform = $(".check-validation");
 $(document).ready(function () {
    var $checkform = $(".check-validation");

    $checkform.on('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission
        var selectedPaymentMethod = document.querySelector('.payment-method-btn.active');
     var CartBancaireContainer = document.getElementById('CartBancaire');
        var btncustom = document.getElementById('container_details');
        var dataMethod = selectedPaymentMethod.getAttribute('data-method');
        console.log('Payment Method:', dataMethod);

        if (dataMethod === "Carte Bancaire") {
            CartBancaireContainer.style.display = 'block';
          
            btncustom.style.display = 'none';
        } else{
            btncustom.style.display = 'block';
            CartBancaireContainer.style.display = 'none';
        
        var formData = new FormData($checkform[0]);
console.log(formData);
     
		$checkform.get(0).submit();}
    });
 });
  $(function() {
  
   
   var  $checkform = $(".check-validation");
    var $form = $(".require-validation");
     
    $('form.require-validation').bind('submit', function(e) {
		  e.preventDefault(); // Prevent the default form submission
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');
    
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
     
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
         Stripe.setPublishableKey('<?php echo e(env('STRIPE_KEY')); ?>');

          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
    
    });
      
    /*------------------------------------------
    --------------------------------------------
    Stripe Response Handler
    --------------------------------------------
    --------------------------------------------*/
   function stripeResponseHandler(status, response) {
    if (response.error) {
        $('.error')
            .removeClass('hide')
            .find('.alert')
            .text(response.error.message);
    } else {
		 var Payment = document.getElementById('payment_method');
        var PaymentMethod = Payment.value;
        var selectedOption = Payment.options[Payment.selectedIndex];
        
        var dataMethod = selectedOption.getAttribute('data-method');
        var paymentMethodId = selectedOption.value;
		
        var token = response.id; // Use response.id to get the token

        // Prevent the default form submission
       // e.preventDefault();

        $form.find('input[type=text]').empty();
        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
		
var routeUrl = '<?php echo e(route("stripe.post", ["paymentMethodId" => ":paymentMethodId"])); ?>';
routeUrl = routeUrl.replace(':paymentMethodId', paymentMethodId);
        // Make an AJAX request to your server to process the payment
        $.ajax({
            url: routeUrl,
            method: 'POST',
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                stripeToken: token // Send the Stripe token to your server
            },
            success: function (response) {
                // Handle the success response from your server
                console.log('Payment successful:', response.message);
var $checkform = $(".check-validation");
             
				$checkform.get(0).submit();
				
				
            },
           error: function (error) {
                console.error('Error processing payment:', error.responseJSON.message);
                // Handle the error gracefully, e.g., show an error message to the user
            }
        });
    }
}
	 });
</script>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
		
<!-- Cart Items End -->

<?php echo $__env->make('client.layouts.footer_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\Users\HD\Workspace\foodexpress\resources\views/client/checkout.blade.php ENDPATH**/ ?>