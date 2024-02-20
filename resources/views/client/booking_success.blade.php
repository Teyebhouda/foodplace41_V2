@include('client.layouts.top_menu_client')
<!-- Aside (Mobile Navigation) -->
@include('client.layouts.header_menu')

<!-- Cart Items Start -->
<div class="section">
    <div class="container">
        @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif
		<br>
		<br>
		<br>
		<br>
       
            <div class="section">
    <p>Merci pour votre demande de réservation, {{$ClientFName}}. Nous avons bien reçu votre demande et nous la traiterons dans les plus brefs délais. Nous avons hâte de vous accueillir!</p>
</div>
    </div>
</div>
<!-- Cart Items End -->

@include('client.layouts.footer_client')
