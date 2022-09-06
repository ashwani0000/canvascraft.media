<link rel="stylesheet" type="text/css" href="{{ asset('/css/showemploye.css') }}">

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
        <a  class="link"  href="/dashboard">Go Back</span></a>
        <a  class="link"  href="{{route('employees.create')}}">Add Employee</a> 
    </div>


    <div class="trContainer">
    <table id="table" class="datatable">
        <thead>
            <tr>
                <th width="35%">Name</th>
                <th width="35%">Email</th>
                <th width="30%">Action</th>
            </tr>
        </thead>

    <!-- @foreach($employees as $employee)
        <tr id = "{{$employee->id}}">
            
            <td class="name">{{$employee->name}}</td>
            <td class="email">{{$employee->email}}</td>
            <td class="actions">
                <a class="link"  href="{{ route('employees.edit', [ 'employee' => $employee->id ]) }}" class="edit">Edit</a>
                <a  class="link" href="{{ route('employees.show', [ 'employee' => $employee->id]) }}" class="edit">Show</a>

                    <form method="POST" class="deleteform" style="margin-bottom: 0;" action="{{ route('employees.destroy', [ 'employee' => $employee->id ]) }}">
                        @csrf
                        @method('delete')
                    <input class="input_delete" type="submit" value="Delete">
                    </form>   
                    
            </td>
            
        </tr>
</div>
@endforeach -->

@include('employees.deletesweetalert')

</table>

</div>
{{ $employees->links() }}



                                            <!-- Endddd -->





                    <div style="text-align: center;margin-top:20px;">
            </div>
                </div>
            </div>
        </div>
        
    </div>
    
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
        $(document).ready(function() {
            var table = $('#table').DataTables({
                processing: true,
                serverSide: true,
                ajax: "{{ route('employees.index') }}",
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]   
            });
        });
        </script>




    