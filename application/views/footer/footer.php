<!-- Footer -->
<footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?php echo base_url(); ?>ElaAdmin-master/assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="<?php echo base_url(); ?>ElaAdmin-master/assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="<?php echo base_url(); ?>ElaAdmin-master/assets/js/init/fullcalendar-init.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

    <!--Data Table-->
    <script src="<?php echo base_url(); ?>ElaAdmin-master/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>ElaAdmin-master/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>ElaAdmin-master/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>ElaAdmin-master/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>ElaAdmin-master/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>ElaAdmin-master/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>ElaAdmin-master/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>ElaAdmin-master/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>ElaAdmin-master/assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url(); ?>ElaAdmin-master/assets/js/init/datatables-init.js"></script>
    
    <script src="<?php echo base_url(); ?>ElaAdmin-master/assets/js/lib/chosen/chosen.jquery.min.js"></script>

    <!--Local Stuff-->
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
    </script>
    <script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
        
        $image_crop = $('#imageDemo').croppie({
        enableExif: true,
        viewport: {
        width:250,
        height:200,
        type:'circle'
        },
        boundary:{
        width:300,
        height:300
        }
    });
    
    $('#uploadImage').on('change', function(){
        var reader = new FileReader();
        reader.onload = function (event) {
        $image_crop.croppie('bind', {
            url: event.target.result
        }).then(function(){
            console.log('jQuery bind complete');
        });
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadImageModal').modal('show');
    });
    
    $('.crop_image').click(function(event){
        $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
        }).then(function(response){
        $.ajax({
            url:"upload.php",
            type: "POST",
            data:{"image": response},
            success:function(data)
            {
            $('#uploadImageModal').modal('hide');
            $('#uploadedImage').html(data);
            }
        });
        })
    });
    });
</script>
</body>
</html>