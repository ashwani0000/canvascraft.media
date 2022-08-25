<link rel="stylesheet" type="text/css" href="{{ asset('/css/showemploye.css') }}">

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
                <td class="name">{{$employeeDetail->name}}</td>
                <td class="email">{{$employeeDetail->email}}</td>

                <td class="actions">
                    <a href="{{ route('employees.edit' , [ 'employee' => $employeeDetail->id ]) }}" class="edit">Edit</a>

                    <form method="POST" style="margin: 0;" action="{{ route('employees.destroy', [ 'employee' => $employeeDetail->id ]) }}">
                        @csrf
                        @method('delete')
                        <input class="input_delete" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

    </div>
