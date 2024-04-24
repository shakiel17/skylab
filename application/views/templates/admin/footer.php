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
            });
            $('.editRider').click(function(){
                var id=$(this).data('id');
                document.getElementById('rider_id').value=id;
                $.ajax({
                    url:'<?=base_url();?>index.php/pages/fetch_single_rider',
                    type:'post',
                    data: {id:id},
                    dataType: 'json',
                    success: function(response){                
                        document.getElementById('rider_fullname').value=response[0]['fullname'];
                        document.getElementById('rider_address').value=response[0]['address'];
                        document.getElementById('rider_contactno').value=response[0]['contactno'];
                        document.getElementById('rider_plateno').value=response[0]['plateno'];
                        document.getElementById('rider_status').value=response[0]['status'];
                    }
                });
            });
            $('.addLicense').click(function(){
                var id=$(this).data('id');
                document.getElementById('license_id').value = id;
            });
        </script>

    </body>

</html>