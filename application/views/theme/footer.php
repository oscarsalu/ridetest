    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
	<div class="footer">
	    <div class="pull-right">
		Built with <strong>&#10084;</strong>.
	    </div>
            <div>
                <strong>Copyright</strong>Rideshare inc &copy; 2017
            </div>
        </div>
	<!-- Mainly scripts -->
	<!-- <script src="<?= base_url() ?>assets/js/jquery-3.1.1.min.js"></script> -->
	<!-- <script src="<?= base_url() ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.0/metisMenu.min.js"></script>
	<script src="<?= base_url() ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- Custom and plugin javascript -->
	<script src="<?= base_url() ?>assets/js/inspinia.js"></script>
	<script src="<?= base_url() ?>assets/js/plugins/pace/pace.min.js"></script>
	<!-- jQuery UI -->
	<script src="<?= base_url() ?>assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- Toastr -->
	<script src="<?= base_url() ?>assets/js/plugins/toastr/toastr.min.js"></script>
	<script src="<?= base_url() ?>assets/js/plugins/dataTables/datatables.min.js"></script>
	<!-- Custom and plugin javascript -->
	<script src="<?= base_url() ?>assets/js/plugins/pace/pace.min.js"></script>
	<!-- Page-Level Scripts -->
    <!-- Steps -->
    <script src="<?= base_url() ?>assets/js/plugins/steps/jquery.steps.min.js"></script>
	<!-- Chosen -->
    <script src="<?= base_url() ?>assets/js/plugins/chosen/chosen.jquery.js"></script>

    <!-- JSKnob -->
    <script src="<?= base_url() ?>assets/js/plugins/jsKnob/jquery.knob.js"></script>

    <!-- Input Mask-->
    <script src="<?= base_url() ?>assets/js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- Data picker -->
    <script src="<?= base_url() ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- NouSlider -->
    <script src="<?= base_url() ?>assets/js/plugins/nouslider/jquery.nouislider.min.js"></script>

    <!-- Switchery -->
    <script src="<?= base_url() ?>assets/js/plugins/switchery/switchery.js"></script>

    <!-- IonRangeSlider -->
    <script src="<?= base_url() ?>assets/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

    <!-- iCheck -->
    <script src="<?= base_url() ?>assets/js/plugins/iCheck/icheck.min.js"></script>

    <!-- MENU -->
    <script src="<?= base_url() ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Color picker -->
    <script src="<?= base_url() ?>assets/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <!-- Clock picker -->
    <script src="<?= base_url() ?>assets/js/plugins/clockpicker/clockpicker.js"></script>

    <!-- Image cropper -->
    <script src="<?= base_url() ?>assets/js/plugins/cropper/cropper.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="<?= base_url() ?>assets/js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="<?= base_url() ?>assets/js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- bootstrap datetime  picker -->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>

    <!-- Select2 -->
    <script src="<?= base_url() ?>assets/js/plugins/select2/select2.full.min.js"></script>

    <!-- TouchSpin -->
    <script src="<?= base_url() ?>assets/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Tags Input -->
    <script src="<?= base_url() ?>assets/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- Dual Listbox -->
    <script src="<?= base_url() ?>assets/js/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>

    <!-- Jquery Validate -->
    <script src="<?= base_url() ?>assets/js/plugins/validate/jquery.validate.min.js"></script>
     

    <script>
        $(document).ready(function() {

            $("#wizard").steps({
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && $("#itemcategory").val() != '')
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                    {
                        var form = $(this);

                        // Submit form input

                        form.submit();
                    }

            });
            $('.chosen-select').chosen({
            width: "100%"
            });
            $('.tagsinput').tagsinput({
                tagClass: 'label label-primary'
            });
            $(".select2_demo_1").select2();
            $(".select2_demo_2").select2();
            $(".select2_demo_3").select2({
                placeholder: "Select a state",
                allowClear: true
            });


            $('#data_1 .input-group.date').datepicker({
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
            $('.form_datetime').datetimepicker({
                //language:  'en',
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1
            });
            $('.date_input').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "yyyy-mm-dd",
            });

            $("#mydate").datepicker({
                format: "yyyy-mm-dd"
            }).datepicker("setDate", new Date());

        });

        $(".dial").knob();
    </script>
    <script type="text/javascript">
               function initialize() {
                       var input = document.getElementById('getorigin');
                       var destination = document.getElementById('getdestination');
                       var autocomplete = new google.maps.places.Autocomplete(input);
                       var dest_complete = new google.maps.places.Autocomplete(destination);
               }
               google.maps.event.addDomListener(window, 'load', initialize);
       </script>
    <script>
        $(document).ready(function(){
            $('#example1').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>
    </body>
</html>
