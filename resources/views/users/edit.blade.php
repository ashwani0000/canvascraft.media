
<script>
function goBack() {
  window.history.back();
}
</script>
<div class="links" style="margin-top: 20px;display: flex;justify-content: center;">
    <a onclick="goBack()" style="color: white;cursor:pointer; background-color: brown;padding:10px;border-radius: 10px;text-decoration:none;margin-top: 40px;">Go Back</span></a>
</div>
    <div class="addemployeContainer">
    <form method="POST" action="{{route('users.update', ['user' => $user->id])}}">
    @csrf
        @method('post')
    <div class="name">
        <label for="name" class="m-right">Name</label>
        <input type="text" autofocus class="input" name="name" value= "{{$user->name}}" placeholder="name" />
        </div>
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror
        <div class="email">
        <label for="email" class="m-right">email</label>
        <input type="text" class="input" name="email" value= "{{$user->email}}" placeholder="email" />
        </div>
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror
        
        <input type="submit" value="Save" class="save" />
    
    </form>
    </div>