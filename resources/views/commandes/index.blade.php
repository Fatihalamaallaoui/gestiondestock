@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Commandes List')

@section('content_header')
@stop
@section('content')
<div class="row">
    <div class="col-md-15 mx-auto">
        <div class="row my-5">
            <div class="col-md-6 mx-auto">
                    @include('layouts.alert')
                </div>
        </div>
            <div class="card  my-3">
                <div class="card-header">
                    <h3 class="text-center text-uppercase" style="color: #1E90FF">
                      <B>
                        Commandes
                    </B>
                    </h3>
                </div>
                  <div class="card-body">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Entrepôts_recepteur</th>
                                <th>Bon_commande</th>
                              
                                <th>Created_at</th>
                                <th>Statut</th>
                                @if( Auth::user() != null && Auth::user()->role_as == 1 ) 
                                <th></th>
                                @endif
                            </tr>
                        </thead>
                         <tbody>
                            @foreach ($commandes as $key => $commandes)
                                <tr>
                                    
                                    <td>{{$commandes->id}}</td>
                                    <td>{{$commandes->entrepots_recepteur}}</td>
                                    <td>

                                        <a href="{{route('commandes.printcmd',$commandes->id)}}"
                                        class="btn btn-sm btn-primary ml-2">
                                        <i class="fas fa-print"></i>
                                    </a>
                            </td>
                                
                                    <td>{{$commandes->created_at}}</td>
                                    <td>{{$commandes->statut}}</td>
                                     @if( Auth::user() != null && Auth::user()->role_as == 1 )  
                 <td class="d-flex justify-content-center align-items-center">
                                        <a href="{{route('commandes.show',$commandes->id)}}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                     
                                        <a href="{{route('commandes.edit',$commandes->id)}}"
                                            class="btn btn-sm btn-warning mx-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form id="{{$commandes->id}}" action="{{route('commandes.destroy',$commandes->id)}}"method="post">
                                           
                                            @method("DELETE")
                                             @csrf
                                        </form>
                                        <button onclick="deleteAd({{$commandes->id}})"
                                            type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        @endif
                                    </td>
                                      </tr>
                            @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
         </div>
    </div>
@endsection
@section('css')

@stop
@section('js')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'csv', 'pdf', 'print', 'colvis'
                ]
            });
        });
    </script>
   @if(session()->has("success"))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "{{session()->get('success')}}",
                showConfirmButton: false,
                timer: 3500
            });
        </script>
    @endif
    <script>
        function deleteAd(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger mr-2'
                },
                buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(id).submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your ad is safe :)',
                        'error'
                    )
                }
                })
        }
    </script>
@endsection
