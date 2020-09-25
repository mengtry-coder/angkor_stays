<?php 
    use backend\models\AccommodationType;
 ?>
<div class="from_fitter">
    <div class="row no-gutters">
        <div class="col-lg-2">
            <div class="select_form">
                <!-- <input type="date" class="form-control" placeholder="Date"> -->
                <input type="text" id="calendar" class="form-control">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="select_form">
                <select class="custom-select">
                    <option selected>Number of rooms</option>
                    <?php 
                        for ($i=1; $i < 10; $i++) {
                            echo "<option value='".$i."'>".$i." Room"."</option>";
                        }
                     ?>
                    <option value="10">10+</option>

                </select>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="select_form">
                <select class="custom-select">
                    <option selected>Number of guests</option>
                    <?php 
                        for ($i=1; $i < 10; $i++) {
                            echo "<option value='".$i."'>".$i." Guest"."</option>";
                        }
                     ?>
                    <option value="10">10+</option>

                </select>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="select_form">
                <select class="custom-select">
                    <option selected>Accommodation type</option>
                    <?php 
                        $accommodation_type = AccommodationType::find()->where(['status'=>1])->limit(3)->all();
                        foreach ($accommodation_type as $key => $value) {
                            echo "<option value='".$value->id."'>".$value->name."</option>";
                        }
                     ?>
                </select>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="select_form">
                <input type="text" class="form-control" placeholder="Facility">
            </div>
        </div>
        <div class="col-lg-2">
            <button type="submit" class="btn_search">Search</button>
        </div>
    </div>
</div>
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