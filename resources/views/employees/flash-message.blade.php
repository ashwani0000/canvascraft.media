


@if ($message = Session::get('success'))
<div class="alert alert-success alert-block" style="    background-color: antiquewhite;
    font-size: 16px;
" id="flashmessage">
<button type="button" onclick="onclickHandler()" class="close" style="cursor: pointer;font-size: 20px;
    padding: 10px 15px;
    background-color: greenyellow;" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>   
    <span>{{ $message }}</span>

    {{session()->forget('message')}}
</div>
@endif
   
@if ($message = Session::get('warning'))
<div style="    background-color: antiquewhite;
    font-size: 16px;
" class="alert alert-warning alert-block" onclick="onclickHandler()" id="flashmessage">
<button type="button" class="close" style="cursor: pointer;font-size: 20px;
    padding: 10px 15px;
    background-color: greenyellow;" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>   
    <span>{{ $message }}</span>
</div>
@endif


<script>
    const onclickHandler = () =>{
    $('#flashmessage').hide();
    }

    setTimeout(() => {
        $('#flashmessage').hide();
    }, 8000);
</script>
