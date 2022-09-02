<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/addemploye.css') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<div class="links" style="margin-top: 20px;display: flex;justify-content: center;">
    <a onclick="goBack()" style="color: white;cursor:pointer; background-color: brown;padding:10px;border-radius: 10px;text-decoration:none;margin-top: 40px;">Go Back</span></a>
</div>
    <div class="addemployeContainer">
        <!-- {{$user}} -->
    <form method="POST" id="form" action="{{route('users.update', ['user' => $user->id])}}">
    @csrf
        @method('patch')
        {{ Form::model($user, ['route' => ['users.edit' , $user->id], 'method' => 'patch']) }}
    <div class="name">
        <label for="name" class="m-right">Name</label>
        <input type="text" autofocus class="input" name="name" value= "{{$user->name}}" placeholder="name" />
        </div>
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror
        <div class="email">
        <label for="email" class="m-right">email</label>
        <input type="text" id="email" class="input" name="email" value= "{{$user->email}}" placeholder="email" />
        </div>
        <div class="error"></div>
        
        
        <input type="submit" value="Save" class="save" />
    
    </form>
    </div>


    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
</script>
<script>
function goBack() {
  window.history.back();
}


</script>
    <script>
        let userEmail = "{{$user->email}}"
        console.log('running')
        $(document).ready(function () {
            

            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            
        $(document).on( 'keyup',"#email", function duplicateEmail(element){
        var email = $("#email").val();
        var filter = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if(!filter.test(email)){
            $('.error').html('Invalid Email').css('color','red');
            
        }
        else{
        $.ajax({
            type: "POST",
            url: "{{url('checkemail')}}",
            data: {email:email},
            dataType: "json",
            success: function(res) {
                if(res.exists){
                    if(email === userEmail){
                    $('.error').html('Email Available').css('color','green');
                    }else{
                    $('.error').html('Email Not Available').css('color','red');
                    }
                }else{
                    $('.error').html('Email Available').css('color', 'green');
                }
            },
            error: function (jqXHR, exception) {
                console.log(jqXHR);
            }
        });
    }
    })

})
    </script>




</body>
</html>
