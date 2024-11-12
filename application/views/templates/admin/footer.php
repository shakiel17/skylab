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
            $('.addRider').click(function(){
                document.getElementById('rider_id').value='';
                document.getElementById('rider_fullname').value='';
                document.getElementById('rider_address').value='';
                document.getElementById('rider_contactno').value='';
                document.getElementById('rider_plateno').value='';
                document.getElementById('rider_status').value='Active';
                document.getElementById('rider_email').value='';
            });
            $('.editRider').click(function(){
                var data=$(this).data('id');
                var id = data.split('_');
                document.getElementById('rider_id').value=id[0];                  
                document.getElementById('rider_fullname').value=id[1];
                document.getElementById('rider_address').value=id[2];
                document.getElementById('rider_contactno').value=id[3];
                document.getElementById('rider_plateno').value=id[4];
                document.getElementById('rider_status').value=id[5];
                document.getElementById('rider_email').value=id[6];
            });
            $('.addLicense').click(function(){
                var id=$(this).data('id');
                document.getElementById('license_id').value = id;
            });
        </script>

    </body>

</html>