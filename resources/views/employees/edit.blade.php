<link rel="stylesheet" type="text/css" href="{{ asset('/css/addemploye.css') }}">

<script>
function goBack() {
  window.history.back();
}
</script>
<div class="links" style="margin-top: 20px;display: flex;justify-content: center;">
    <a onclick="goBack()" style="color: white;cursor:pointer; background-color: brown;padding:10px;border-radius: 10px;text-decoration:none;margin-top: 40px;">Go Back</span></a>
</div>
    <div class="addemployeContainer">
    <form method="POST" action="{{route('employees.update', ['employee' => $employeeDetail->id])}}">
    @csrf
        @method('put')
        {{ Form::model($employeeDetail, ['route' => ['employees.edit' , $employeeDetail->id], 'method' => 'patch']) }}
        @include('employees.form', ['employee' => $employeeDetail])
    </form>
    </div>
    