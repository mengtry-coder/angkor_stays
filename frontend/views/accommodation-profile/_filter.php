<input type="text" id="calendar" class="form-control">
<?php
$script = <<< JS
    $(function () {
        $("#calendar").daterangepicker({
            autoApply: true,
            // showDropdowns: true,
            // timePicker: true,
            // timePickerSeconds: true,
            // timePicker24Hour: true,
            // opens: 'left',
            // drops: 'down',
            // startDate: '06/23/2020',
            // endDate: '06/24/2020',
            locale: {
                format: 'DD/MMM/YYYY' 
            }
        });
    });
JS;
$this->registerJS($script);
?>