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





<div class="links" style="margin-top: 20px;display: flex;justify-content: center;">
    <a class="link"  href="/employees">Go Back</span></a>
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
                    <a class="link" href="{{ route('employees.edit' , [ 'employee' => $employeeDetail->id ]) }}" class="edit">Edit</a>
                    <form method="POST" style="margin: 0;" class="deleteform" action="{{ route('employees.destroy', [ 'employee' => $employeeDetail->id ]) }}">
                        @csrf
                        @method('delete')
                        <input class="input_delete" onclick="deleteConfirmation('{{$employeeDetail->id}}')" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        </tbody>
</table>

@include('employees.deletesweetalert');

    </div>

   

                                            <!-- Endddd -->





                                            <div style="text-align: center;margin-top:20px;">
            </div>
                </div>
            </div>
        </div>
        
    </div>
    
</x-app-layout>


    
    