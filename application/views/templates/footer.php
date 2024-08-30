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
        $('.addVID').click(function () {
            var id= $(this).data('id');
            document.getElementById("valid_id").value=id;
        });
        $('.editUserAccount').click(function () {
            var data= $(this).data('id');
            var id= data.split('_');
            document.getElementById("user_id").value=id[0];
            document.getElementById("user_username").value=id[1];
            document.getElementById("user_password").value=id[2];
        });
        $('.editUserProfile').click(function () {
            var data= $(this).data('id');
            var id= data.split('_');
            document.getElementById("prof_id").value=id[0];
            document.getElementById("prof_name").value=id[1];
            document.getElementById("prof_address").value=id[2];
            document.getElementById("prof_contactno").value=id[3];
        });
        $('.addBooking').click(function () {
            var data= $(this).data('id');
            var id= data.split('_');
            document.getElementById("book_commuter_id").value=id[0];
            document.getElementById("book_rider_id").value=id[1];            
        });

        $('.cancelBooking').click(function(){
                var id=$(this).data('id');
                document.getElementById("cancel_id").value = id;
            });
        </script>       
    </body>
</html>