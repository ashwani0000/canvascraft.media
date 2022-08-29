        <div class="name">
        <label for="name" class="m-right">Name</label>
        <input type="text" autofocus class="input" name="name" value= "@if(isset($employee->name)){{ $employee->name}}@endif" placeholder="name" />
        </div>
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror
        <div class="email">
        <label for="email" class="m-right">email</label>
        <input type="text" class="input" name="email" value= "@if(isset($employee->email)){{ $employee->email }}@endif" placeholder="email" />
        </div>
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror
        
        <input type="submit" value="Save" class="save" />