
<link rel="stylesheet" type="text/css" href="{{ asset('/css/showemploye.css') }}">

<div class="container">
    <div class="links">
        <a href="/dashboard">Go Back</span></a>
        <a href="{{route('employees.create')}}">Add Employee</a> 
    </div>


<div class="trContainer">
<table id="table">

        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Action</td>
        </tr>

@foreach($employees as $employee)
    <tr id = "{{$employee->id}}">
        
        <td class="name">{{$employee->name}}</td>
        <td class="email">{{$employee->email}}</td>
        <td class="actions">
            <a href="{{ route('employees.edit', [ 'employee' => $employee->id ]) }}" class="edit">Edit</a>
            <a href="{{ route('employees.show', [ 'employee' => $employee->id]) }}" class="edit">Show</a>

                <form method="POST" class="deleteform" style="margin-bottom: 0;" action="{{ route('employees.destroy', [ 'employee' => $employee->id ]) }}">
                    @csrf
                    @method('delete')
                   <input class="input_delete" type="submit" value="Delete">
                </form>   
                
        </td>
        
    </tr>
</div>
@endforeach
@include('employees.deletesweetalert')
@include('employees.datatable')
</table>
</div>
</div>


