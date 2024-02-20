@extends('base')

@section('title', 'Welcome')

@section('content')
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('restaurant.left-menu')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
      @include('restaurant.top-menu')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

              @include('restaurant.stat')
            <div class="row ">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">List Reservations</h4>
                      @if (session('success'))
                          <div class="alert alert-success">
                              {{ session('success') }}
                          </div>
                      @endif
                          
                      <div class="mb-3">
                        <input type="text"  class="form-control"  id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                    </div>
                      <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                               
                                    
                                    <th>table</th>
                                    <th>N° personnes</th>
                                    <th>Nom|Prénom Client</th>
                                    <th>N° Tél Client</th>
                                    <th>Heure Début</th>
                                    <th>Heure Fin</th>
                                    <th>Date</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                    <tr>
                                   
                                      <td>{{ optional($reservation->tables)->designation }}</td>
                                        <td>{{ $reservation->nbre_Personnes}}</td>
                                        <td>{{ optional($reservation->clientrestaurant)->FirstName}}  </td>
                                        <td>{{ optional($reservation->clientrestaurant)->phoneNum1}}  </td>
                                        <td>{{ $reservation->heure_debut}}</td>
                                        <td>{{ $reservation->heure_fin}}</td>
                                        <td>{{ $reservation->date}}</td>
                                        <td>{{ $reservation->statut}}</td>
                                        <td style="display: flex; justify-content: space-between;">
                                         
                                            <a href="{{ route('restaurant.reservation.edit', $reservation) }}" class="btn btn-primary btn-sm col-s">Modifier</a>
                                            <form action="{{ route('restaurant.reservation.destroy', $reservation->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm col-s" onclick="return confirm('Voulez-vous vraiment supprimer cette reservation?')">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                <tr><td colspan="4"></td></tr>
                            </tbody>
                        </table>
                        <div class="pagination justify-content-between">
                          <div class="text-end">
                            <a href="{{ route('restaurant.reservation.create') }}" class="btn btn-primary mb-3">Ajouter reservation</a>
                          </div>
                          <div class="text-start">
                            {{ $reservations->links('vendor.pagination.bootstrap-5') }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          @include('footer')
        </div>
          </div>
       </div>
       <script>

        function myFunction() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
        }
            </script>
 <script>
        const images = document.querySelectorAll('.zoomable-image');
        const modalImage = document.querySelector('.modal-image');

        images.forEach(function(image) {
            image.addEventListener('click', function() {
                const imageUrl = image.getAttribute('src');
                modalImage.setAttribute('src', imageUrl);
            });
        });

        $('#imageModal').on('hidden.bs.modal', function() {
            modalImage.setAttribute('src', '');
        });

    </script>
     @endsection
