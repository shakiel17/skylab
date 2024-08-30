</div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="<?=base_url();?>design/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?=base_url();?>design/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?=base_url();?>design/js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <!-- <script src="<?=base_url();?>design/js/raphael.min.js"></script>
        <script src="<?=base_url();?>design/js/morris.min.js"></script>
        <script src="<?=base_url();?>design/js/morris-data.js"></script> -->

        <!-- DataTables JavaScript -->
        <script src="<?=base_url();?>design/js/dataTables/jquery.dataTables.min.js"></script>
        <script src="<?=base_url();?>design/js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?=base_url();?>design/js/startmin.js"></script>

        <script>
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script> 
        <script>
            $('.confirmBooking').click(function(){
                var id=$(this).data('id');
                document.getElementById("confirm_id").value = id;
            });
            $('.cancelBooking').click(function(){
                var id=$(this).data('id');
                document.getElementById("cancel_id").value = id;
            });
            $('.completeBooking').click(function(){
                var id=$(this).data('id');
                document.getElementById("complete_id").value = id;
            });
        </script>       
    </body>
</html>