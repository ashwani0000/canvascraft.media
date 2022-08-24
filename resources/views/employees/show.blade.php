<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/showemploye.css') }}">
    <title>Document</title>
</head>
<body>

<div class="links" style="margin-top: 20px;display: flex;justify-content: center;">
    <a href="/employees">Go Back</span></a>
</div>

    <div class="trContainer">

    <table>
        <tbody>
            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Action</td>
            </tr>
            <tr>
                <td class="name">{{$employeeName}}</td>
                <td class="email">{{$employeeEmail}}</td>
                <!-- <td>{{$employeeId}}</td> -->
                <td class="actions">
                    <a href="{{ route('employees.edit' , [ 'employee' => $employeeId ]) }}" class="edit">Edit</a>

                    <form method="POST" action="{{ route('employees.destroy', [ 'employee' => $employeeId ]) }}">
                        @csrf
                        @method('delete')
                        <input class="input_delete" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

    </div>

</body>
</html>