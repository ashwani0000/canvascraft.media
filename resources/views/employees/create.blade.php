

<link rel="stylesheet" type="text/css" href="{{ asset('/css/addemploye.css') }}">



<div class="links" style="margin-top: 20px;display: flex;justify-content: center;">
    <a href="{{route('employees.index')}}" style="color: white; background-color: brown;padding:10px;border-radius: 10px;text-decoration:none;margin-top: 40px;">Go Back</span></a>
</div>


    <div class="addemployeContainer">
    <form method="POST" action="{{route('employees.store')}}">
    @csrf
        @include('employees.form')  
    </form>
    </div>
