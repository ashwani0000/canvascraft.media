<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/showemploye.css') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="links">
        <a href="/dashboard">Go Back</span></a>
        <a href="{{route('employees.create')}}">Add Employee</a> 
    </div>


<div class="trContainer">
<table>

        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Action</td>
        </tr>

@foreach($employees as $employee)
    <!-- {{$id = $employee->id}} -->
    <tr id = "{{$employee->id}}">
        
        <td class="name">{{$employee->name}}</td>
        <td class="email">{{$employee->email}}</td>
        <td class="actions">
            <a href="{{ route('employees.edit', [ 'employee' => $employee->id ]) }}" class="edit">Edit</a>
            <a href="{{ route('employees.show', [ 'employee' => $employee->id]) }}" class="edit">Show</a>

                <form method="POST" action="{{ route('employees.destroy', [ $id => $employee->id ]) }}">
                    @csrf
                    @method('delete')
                   <input class="input_delete" type="submit" value="Delete">
                </form>
            
        </td>
        
    </tr>


</div>
@endforeach

</table>
</div>
</div>

</body>
</html>