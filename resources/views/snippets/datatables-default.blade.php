@section('styles')
    <link href="/css/datatables.css" rel="stylesheet" type="text/css">
@append
@section('javascript')
    <script type="text/javascript" src="/js/datatables.js"></script>
    <script>
        $(document).ready(function(){

 

            $('.datatable').dataTable({
                "aoColumnDefs" : [{
                    "bSortable" : false,
                    "aTargets" : [ "actions" ],
                    "sPaginationType": "bootstrap"

                }]
            });
            $('.datatable-responsive').dataTable({
                "responsive":true,
                "aoColumnDefs" : [{
                    "bSortable" : false,
                    "aTargets" : [ "actions" ]
                }]
            });

$('.datatable-no-responsive').dataTable({
                "responsive":false,

        'autoWidth': false,
        'pagingType': "full",


                "aoColumnDefs" : [{
                    "bSortable" : false,
                    "aTargets" : [ "actions" ]
                }]
            });

            });
    </script>
@append