<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery-ui-1.10.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/toggles.min.js"></script>
<script src="js/retina.min.js"></script>
<script src="js/jquery.cookies.js"></script>

<script src="js/jquery.datatables.min.js"></script>
<script src="js/jquery.validate.min.js"></script>

<script src="js/jquery.autogrow-textarea.js"></script>
<script src="js/bootstrap-timepicker.min.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<script src="js/jquery.tagsinput.min.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/dropzone.min.js"></script>
<script src="js/colorpicker.js"></script>

<script src="js/custom.js"></script>
<script>
    jQuery(document).ready(function() {
        // Basic Form
        jQuery("#basicForm").validate({
            highlight: function(element) {
                jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            success: function(element) {
                jQuery(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            }
        });

        "use strict";

        jQuery('#table1').dataTable({
            'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': ['no-sort']
                }]
        });
        jQuery('#table12').dataTable({
            'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': ['no-sort']
                }]
        });

        jQuery('#table2').dataTable({
            "sPaginationType": "full_numbers",
            'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': ['no-sort']
                }]
        });


        // Textarea Autogrow
        jQuery('#autoResizeTA').autogrow();

        // Color Picker
        if (jQuery('#colorpicker').length > 0) {
            jQuery('#colorSelector').ColorPicker({
                onShow: function(colpkr) {
                    jQuery(colpkr).fadeIn(500);
                    return false;
                },
                onHide: function(colpkr) {
                    jQuery(colpkr).fadeOut(500);
                    return false;
                },
                onChange: function(hsb, hex, rgb) {
                    jQuery('#colorSelector span').css('backgroundColor', '#' + hex);
                    jQuery('#colorpicker').val('#' + hex);
                }
            });
        }

        // Color Picker Flat Mode
        jQuery('#colorpickerholder').ColorPicker({
            flat: true,
            onChange: function(hsb, hex, rgb) {
                jQuery('#colorpicker3').val('#' + hex);
            }
        });

        // Date Picker
        jQuery('.datepicker').datepicker({
            dateFormat: 'dd-mm-yy'
        });

        jQuery('.datepicker-inline').datepicker();

        jQuery('.datepicker-multiple').datepicker({
            numberOfMonths: 3,
            showButtonPanel: true
        });

        // Spinner
        var spinner = jQuery('#spinner').spinner();
        spinner.spinner('value', 0);

        // Input Masks
        jQuery(".date").mask("99/99/9999");
        jQuery(".phone").mask("(999) 999-9999");
        jQuery(".ssn").mask("999-99-9999");

        // Time Picker
        jQuery('.timepicker').timepicker({defaultTIme: false});
        jQuery('.timepicker2').timepicker({showMeridian: false});
        jQuery('.timepicker3').timepicker({minuteStep: 15});

    });
</script>