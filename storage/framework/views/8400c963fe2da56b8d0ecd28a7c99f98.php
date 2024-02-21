<?php echo $__env->make('client.layouts.top_menu_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- Cart Sidebar Start -->
  <?php echo $__env->make('client.layouts.cart_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- Aside (Mobile Navigation) -->
  <?php echo $__env->make('client.layouts.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<br>
<br>
  <!-- Customize Modal Start -->
  <div class="modal fade" id="customizeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
      
        <div class="modal-header modal-bg">
            <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close">
          <span></span>
          <span></span>
        </button>
        </div>
        <div class="modal-body">
          <div class="customize-meta">
        
            <p ></p>
          </div>
          <div class="customize-variations">
            <div class="customize-size-wrapper">
              <!-- Size variations -->
            </div>
            <div class="row">
            </div>
            <!-- Other customization options -->
          </div>
          <div class="customize-controls">
            
            </div>
           
          </div>
          
    
         </div>
              
      </div>
    </div>
<br>
<br>
<!-- Customize Modal End -->
  <div class="section">

    <div class="imgs-wrapper">
      <img src="assets/img/veg/11.png" alt="veg" class="d-none d-lg-block">
      <img src="assets/img/prods/3.png" alt="veg" class="d-none d-lg-block">
    </div>

    <div class="container">
      <div class="auth-wrapper">

        <div class="auth-description bg-cover bg-center dark-overlay dark-overlay-2" style="background-image: url('assets/img/reserver_une_table.jpg')">
          <div class="auth-description-inner">
            <i class="fa fa-table"></i>
            <h2>Orlando's Café Reservation!</h2>
                   <p>Réservez une table et profitez d'une expérience culinaire exceptionnelle dans notre restaurant. Choisissez le nombre de personnes, l'heure, la date, et découvrez nos tables disponibles.</p>

          </div>
        </div>
		   <form method="post" action="<?php echo e(route('reservation.client.store')); ?>">

            <?php echo csrf_field(); ?>
     <div class="auth-form">
    <h2>Réserver une Table</h2>

    <?php echo csrf_field(); ?>
<div class="user-info-section">
    <div class="row">
        <div class="form-group col-xl-6">
            <label for="FirstName">Nom</label>
            <input type="text" class="form-control" id="FirstName" name="FirstName" required value="<?php echo e(optional($clientRestaurant)->FirstName); ?>">
            <?php $__errorArgs = ['FirstName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group col-xl-6">
            <label for="LastName">Prénom</label>
            <input type="text" class="form-control" id="LastName" name="LastName" required value="<?php echo e(optional($clientRestaurant)->LastName); ?>">
            <?php $__errorArgs = ['LastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>
<div class="row">
	 <div class="form-group col-xl-6">
        <label for="Email">Email</label>
        <input type="email" class="form-control" id="Email" name="Email" required value="<?php echo e(optional($clientRestaurant)->email); ?>">
        <?php $__errorArgs = ['Email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="form-group col-xl-6">
        <label for="phoneNum1">N° Téléphone</label>
        <input type="text" class="form-control" id="phoneNum1" name="phoneNum1" required value="<?php echo e(optional($clientRestaurant)->phoneNum1); ?>">
        <?php $__errorArgs = ['Téléphone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

   
	 </div>
 </div>
		
		  <br>
		 <div class="booking-info-section">
    <div class="row">
        <div class="form-group col-xl-6">
            <label for="nbre_personnes">Nombre de Personnes</label>
            <input type="number" class="form-control" id="nbre_personnes" name="nbre_personnes" required>
            <?php $__errorArgs = ['nbre_personnes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
		 <div class="form-group col-xl-6">
        <label for="date">Date</label>
        <input type="date" class="form-control" id="date" name="date" required>
        <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    </div>

    <div class="row">
        <div class="form-group col-xl-6">
            <label for="heure_debut">Heure Début</label>
            <input type="time" class="form-control" id="heure_debut" name="heure_debut" required>
            <?php $__errorArgs = ['heure_debut'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group col-xl-6">
            <label for="heure_fin">Heure Fin</label>
            <input type="time" class="form-control" id="heure_fin" name="heure_fin" required>
            <?php $__errorArgs = ['heure_fin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>

   
 </div>
   <!-- <a class="btn-custom btn-sm shadow-none customizeBtn" data-bs-toggle="modal" data-bs-target="#customizeModal"
        data-nbre-personne="<?php echo e(old('nbre_personnes')); ?>" data-heure-debut="<?php echo e(old('heure_debut')); ?>"
        data-heure-fin="<?php echo e(old('heure_fin')); ?>" data-date="<?php echo e(old('date')); ?>" style="background-color: #0F9D58;" hidden>
        Verifier <i class="fas fa-table"></i>
    </a>-->
		             <button type="submit" class="btn-custom primary">Réserver</button>

</div>

    
    </div>
  </div>
 






  <?php echo $__env->make('client.layouts.footer_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 /*  document.addEventListener("DOMContentLoaded", function () {
        var nbrePersonnesField = document.getElementById("nbre_personnes");
        var heureDebutField = document.getElementById("heure_debut");
        var heureFinField = document.getElementById("heure_fin");
        var dateField = document.getElementById("date");
        var verifierButton = document.querySelector(".customizeBtn");

        // Function to check if all fields are filled
        function checkFields() {
            var nbrePersonnes = nbrePersonnesField.value.trim();
            var heureDebut = heureDebutField.value.trim();
            var heureFin = heureFinField.value.trim();
            var date = dateField.value.trim();

            // If all fields have values, show the button; otherwise, hide it
            if (nbrePersonnes && heureDebut && heureFin && date) {
                verifierButton.removeAttribute("hidden");
            } else {
                verifierButton.setAttribute("hidden", true);
            }
        }

        // Add an input event listener to all fields to check for changes
        [nbrePersonnesField, heureDebutField, heureFinField, dateField].forEach(function (field) {
            field.addEventListener("input", checkFields);
        });
    });
    

  toastr.options = {
closeButton: true,                // Show a close button
timeOut: 2000,                    // Close the notification after 3 seconds
positionClass: 'toast-top-right',
backgroundColor: '#FCCC4C',
  //progressBar: true,// Set the notification background color (with quotes)
};
    $(document).ready(function () {
      var addToCartBtn;
    $('.customizeBtn').click(function () {
        var nbrePersonnes = $('#nbre_personnes').val();
        var heureDebut = $('#heure_debut').val();
        var heureFin = $('#heure_fin').val();
        var date = $('#date').val();

        $.ajax({
            url: "https://orlandoscafe.foodexpress.site/restaurant/reservation/fetchTables",
            type: "GET",
            data: {
                nbre_personnes: nbrePersonnes,
                heure_debut: heureDebut,
                heure_fin: heureFin,
                date: date
            },
            success: function (response) {
                $('.customize-title').empty();
                $('.customize-meta p').empty();
                $('.modal-header').empty();
                $('.customize-variations').empty();
                $('.customize-title').html('<span class="custom-primary">'  + 'Liste de Tables Disponibles' + '€</span>');

                if (response  && response.length) {
                    for (var i = 0; i < response.length; i++) {
                        var table = response[i];

                        if (i % 3 === 0) {
                            // Create a new row
                            var row = $('<div class="row"></div>');
                            row.appendTo('.customize-variations');
                        }

                        var variationElement = $('<div class="col-lg-4 col-12"></div>');
                        var variationWrapper = $('<div class="customize-variation-wrapper"></div>');
                        variationWrapper.addClass('selectable'); // Add a class for selection

// Add a data attribute to store the table ID
variationWrapper.attr('data-table-id', table.id);

// Add a click event listener for selection




                        var variationPhoto = $('<img src="' + table.photo + '" >');
                        var variationNPersonne = $('<p>' + 'Nombre de personnes: ' +  table.nbre_personnes + '</h5>');
                        var variationTitle = $('<h5>' + table.designation + '</h5>');
                        variationPhoto.appendTo(variationWrapper);
                        
                        variationTitle.appendTo(variationWrapper);
                        variationNPersonne.appendTo(variationWrapper);
                        // Add other elements and content as needed

                        variationWrapper.appendTo(variationElement);
                        variationElement.appendTo(row);
						
						
						 variationWrapper.click(function () {
    // Remove the selection from other elements
    $('.customize-variation-wrapper').removeClass('selected');

    // Add the selection class to the clicked element
    $(this).addClass('selected');
// Get the selected table's ID from the data attribute
var selectedTableId = $(this).attr('data-table-id');
                  

   // Set the selected table's ID in the button's data attribute
   addToCartBtn.data('table-id', selectedTableId);
                    // Set the selected table's ID in the hidden input field
                   // $('#' + table.id).val(selectedTableId);

});  
						
						
                    }
                   
			 /* var addToCartBtn = $('<button type="submit" class="order-item btn-custom btn-sm shadow-none customizeBtn" data-product-id="' + productId + '" data-product-name="' + response.product.nom_produit + '" data-product-image="' + response.product.url_image + '" data-product-price="' + response.product.prix + '">Ajouter au Panier <i class="fas fa-shopping-cart"></i></button>');

        addToCartBtn = $('<button type="button" class="order-item btn-custom btn-sm shadow-none customizeBtn" data-product-id="'  + '" data-reservation-personnes="' + table.nbre_personnes+ '" data-reservation-heureD="' + table.H + '">Choisir cette table</button>');
          
       addToCartBtn.on('click', function() {

                // Retrieve the selected table's ID from the hidden input field
                var tableId = $(this).data('table-id');
           var nbrePersonnes = $('#nbre_personnes').val();
        var heureDebut = $('#heure_debut').val();
        var heureFin = $('#heure_fin').val();
        var date = $('#date').val();
                // Send the selected table's ID to the server
                $.ajax({
                    url: '<?php echo e(route("reservation.client.store")); ?>',
                    method: 'POST',
                    data: {
                    table_id: tableId,
                    nbre_personnes: nbrePersonnes,
                heure_debut: heureDebut,
                heure_fin: heureFin,
                date: date,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function(response) {
                        // Handle the success response from the server
                       // $('#customizeModal').modal('hide'); // Close the customize modal
                     //   toastr.success('Table reservé avec succès, merci de votre confiance');
						

                    },
                    error: function(error) {
                        // Handle the error response from the server
                        console.error('Error booking table:', error);
                        // Show an error message or handle the error gracefully
                    }
                });
            });
       $('.modal-body .order-item.btn-custom.btn-sm.shadow-none.customizeBtn').remove();
       addToCartBtn.appendTo('.modal-body');
			  // Create the "Cancel" button
			  $('.modal-body .btn.btn-sm.shadow-none.cancelButton').remove();
var cancelButton = $('<button type="button" class="btn btn-sm shadow-none cancelButton" data-dismiss="modal">Annuler</button>');

// Append both buttons to the modal body
$('.modal-body').append(addToCartBtn, cancelButton);
cancelButton.on('click', function() {

// Close the modal when the button is clicked
$('#customizeModal').modal('hide');
});
                } else {
                    // Handle the case when no tables are available
alert("Nous sommes désolés, mais aucune table n'est disponible pour les critères que vous avez sélectionnés. Veuillez ajuster vos préférences.");
					$('#customizeModal').modal('hide');
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});*/

</script>
<style>
    .customize-variation-wrapper.selectable {
        cursor: pointer; /* Change the cursor to a pointer when hovering */
    }

    .customize-variation-wrapper.selected {
        border: 2px solid #007bff; /* Style the selected element with a border, change color as needed */
    }
</style>
<?php /**PATH C:\Users\HD\Workspace\foodexpress\resources\views/client/reservation.blade.php ENDPATH**/ ?>