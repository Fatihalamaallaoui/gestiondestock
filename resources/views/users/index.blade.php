@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Users List')

@section('content_header')
@stop
@section('content')
<div class="row">
    <div class="col-md- 10 mx-auto">
        <div class="row my-5">
            <div class="col-md-6 mx-auto">
                    @include('layouts.alert')
                </div>
        </div>
            <div class="card  my-3">
                <div class="card-header">
                    <h3 class="text-center text-uppercase" style="color: #DC143C">
                        <B>
                        Techniciens
                    </B>
                    </h3>
                </div>
                  <div class="card-body">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                
                                
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role</th>
                                
                                <th></th>
                            </tr>
                        </thead>
                         <tbody>
                            @foreach ($users as $key => $users)
                                <tr>
                                 <td>{{$users->email}}</td>
                            <td> <?php Echo password_hash('$users->password', PASSWORD_DEFAULT); ?> </td>
                                    <td>{{$users->role_as}}</td>
                 <td class="d-flex justify-content-center align-items-center">
                                        <a href="{{route('users.show',$users->id)}}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                             @if( Auth::user() != null && Auth::user()->role_as == 1 )
                                        <a href="{{route('users.edit',$users->id)}}"
                                            class="btn btn-sm btn-warning mx-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form id="{{$users->id}}" action="{{route('users.destroy',$users->id)}}"method="post">
                                           
                                            @method("DELETE")
                                             @csrf
                                        </form>
                                        <button onclick="deleteAd({{$users->id}})"
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
