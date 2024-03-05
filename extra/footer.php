
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>
<script type="text/javascript" src="js/dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script type="text/javascript">
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    var options={
        format: 'dd-mm-yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
    };
    $(".form_date").datepicker(options);
</script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );

    $(function () {
        $("#ExportExcel").click(function () {
            var d=new Date();
            var dd=d.getDate();
            var mm=d.getMonth()+1;
            var yy=d.getFullYear();
            var tdate=dd+"-"+mm+"-"+yy;
            $("#report").table2excel({
                filename: "Student Result ("+tdate+").xls"
            });
        });
    });
</script>

</body>
</html>