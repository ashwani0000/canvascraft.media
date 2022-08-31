<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>



<script type="text/javascript">

let formdelete = document.querySelectorAll(".deleteform");
formdelete.forEach(element => {
    if(element){
    element.addEventListener('submit', function (e){
    e.preventDefault();
    swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirm: "Yes",
            cancel: "No, cancel!",
            reverseButtons: !0,
            buttons: true
        })
        .then((confirm) => {
        if (confirm.value) {
            console.log(confirm.value)
          element.submit();
        }
      });
}, false);
}
});
console.log(formdelete);

</script>