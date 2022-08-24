<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/addemploye.css') }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- @if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-unstyled">
        @foreach ($errors->all() as $error)
        <li>{{$errors}}</li>
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if($errors->any()) <li>{{$errors->name}}</li> @endif -->
<div class="links" style="margin-top: 20px;display: flex;justify-content: center;">
    <a href="{{route('employees.index')}}" style="color: white; background-color: brown;padding:10px;border-radius: 10px;text-decoration:none;margin-top: 40px;">Go Back</span></a>
</div>
    <div class="addemployeContainer">
    <form method="POST" action="{{route('employees.store')}}">
        @csrf
        <div class="name">
        <label for="name" class="m-right">Name</label>
        <input type="text" class="input" name="name" value="" placeholder="name" />
        </div>
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror
        <div class="email">
        <label for="email" class="m-right">email</label>
        <input type="text" class="input" name="email" value="" placeholder="email" />
        </div>
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror
        
        <input type="submit" value="Save" class="save" />
    </form>
    </div>
</body>
</html>