<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>



<script type="text/javascript">

let formdelete = document.getElementById("#deleteform");
console.log(formdelete);
formdelete.addEventListener('submit', function (e){
    e.preventDefault();
});

console.log(formdelete)

        function deleteConfirmation(id) {
            console.log(id);
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        })
    }
</script>