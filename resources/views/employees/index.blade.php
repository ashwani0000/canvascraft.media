<!-- <link rel="stylesheet" type="text/css" href="{{ asset('/css/showemploye.css') }}"> -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    


                                        <!-- START -->



    <div id="app">
        @include('employees.flash-message')
    </div>

   

<div class="container">
    <div class="links">
        <a  class="link"  href="{{route('employees.create')}}">Add Employee</a> 
    </div>


    <div class="trContainer">
    <table id="table" class="datatable">
        
        <thead>
            <tr>
                <th width="40%">Name</th>
                <th width="40%">Email</th>
                <th width="40%">Action</th>

            </tr>
        </thead>
        <tbody>
        </tbody>



@include('employees.deletesweetalert')

</table>

</div>




                                            <!-- Endddd -->





                    <div style="text-align: center;margin-top:20px;">
            </div>
                </div>
            </div>
        </div>
        
    </div>
    
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
      integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
        $(function() {
            console.log('entered')
            var table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('employees.index') }}",
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]   
            });
            // console.log(table);
        });
        </script>




    