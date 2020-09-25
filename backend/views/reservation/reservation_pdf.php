<?php 
  use backend\models\CompanyProfile;
  use backend\models\AccommodationProfile;
  use backend\models\Reservation;
  $model = Reservation::findOne($id);
  $company = CompanyProfile::findOne(1);

  $this->title = $model->title.' '.$model->first_name.' '.$model->last_name;
  $date1 = new \DateTime($model->check_in, new \DateTimeZone('UTC'));
  $date2 = new \DateTime($model->check_out, new \DateTimeZone('UTC'));
  $numberOfNights= $date2->diff($date1)->format("%a");
 ?>
  <div style="text-align: center" class="company_info">
    <img style="width: 200px;" src="<?= $company->feature_image ;?>" alt="">
    <p><b>Address:</b><?= $company->address; ?></p>
    <p><b>Email:</b> <?= $company->general_email; ?></p>
    <p><b>Contact Number: </b><?= $company->main_phone_1; ?> | <?= $company->main_phone_2; ?></p>
  </div>
  <div class="row">
    <h3><i class="fa fa-address-card-o"></i>Guest Details</h3>
    <div class="guest_detail" style="margin: 10px 0px;">
      <p><b>Name: </b><?= $model->title.' '.$model->first_name.' '.$model->last_name;?></p>
      <p><b>Email: </b><?= $model->email?></p>
      <p><b>Phone Number: </b><?= $model->contact_phone?></p>
    </div>
    <div class="col-10 offset-1 invoice-table pt-1">
      <table class="table table-hover">
            <thead class="thead splitForPrint">
              <tr>
                <th><h4>Property Name</h4></th>
                <th><h4>Number of Night</h4></th>
                <th><h4>Guest</h4></th>
                <th><h4>Sub Total</h4></th>
                <th><h4>Promotion</h4></th>
                <th><h4>Grand Total</h4></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="item"><?= $model->accName->name; ?></td>
                <td><?= $numberOfNights; ?> Nights</td>
                <td><?= $model->number_of_guest; ?> Guests</td>
                <td><?= $model->sub_total; ?> $ </td>
                <td><?= $model->promotion; ?> %</td>
                <td><?= $model->total; ?> $ </td>
              </tr>
            </tbody>
          </table>
    </div>
  </div>
<div class="row invoice_details">
   <!-- invoiced to details -->
   <div class="col-4 offset-1 pt-3">
     <h4 class="gray-ish">Term & Condition</h4>
     <p class="pt-3 almost-gray">
       <?= $company->term_condition; ?>
     </p>
   </div>
   <!-- Invoice assets and total -->
    <div class="offset-1 col-5 mb-3 pr-4 sub-table">
      <table class="table table-borderless">
        <tbody>
          <tr>
            <th><h4>Sub Total</h4></th>
            <td class="text-right"><?= $model->sub_total; ?> $</td>
          </tr>
          <tr>
            <th><h4>Discount</h4></th>
            <td class="text-right"><?= $model->promotion; ?> %</td>
          </tr>
          <tr class="last-row">
            <th><h4>Grand Total</h4></th>
              <td class="text-right"><h4>$ <?= $model->total; ?></h4></td>
          </tr>
        </tbody>
      </table>
    </div>
   </div>
</div>