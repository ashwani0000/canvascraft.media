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
        <a href="/employes/create" style="color: white; background-color: brown;padding:10px;border-radius: 10px;">Add Employee</a> 
    </div>

<!-- {{$employes}} -->
<table>
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Action</td>
        </tr>

@foreach($employes as $employe)
    <tr>
        <td class="name">{{$employe->name}}</td>
        <td class="email">{{$employe->email}}</td>
        <td>
            <a>Edit</a>
            <a>Delete</a>
        </td>
    </tr>
@endforeach
</table>
</div>

</body>
</html>