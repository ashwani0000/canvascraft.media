<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="height: 70vh;vertical-align:center;">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                    <!-- {{auth()->user()}} -->

                    <div style="text-align: center;margin-top:20px;">
                    <a href="{{route('employees.index')}}" style="color: white; background-color: brown;padding:10px;border-radius: 10px;">Employees</a>
        <!-- <a href="/employes/create" style="color: white; background-color: brown;padding:10px;border-radius: 10px;">Add Employee</a> -->
        <!-- <a href="/show/{{auth()->user()->id}}" style="color: white; background-color: brown;padding:10px;border-radius: 10px;">Show Employes</a> -->
        </div>
                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>
