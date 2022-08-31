<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="dataTables.scrollingPagination.js"></script>  
<script type="text/javascript" src="jquery.dataTables.js"></script>
<script type="text/javascript" src="sum().js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#table').DataTable();
        $(table).dataTable( {
            "pagingType": "full_numbers",
            "bDestroy": true
        } );
    } );
</script>