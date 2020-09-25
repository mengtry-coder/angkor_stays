<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Reservation;
use frontend\models\ReservationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\User;
use yii\web\Cookie;
use backend\models\AccommodationProfile;
use backend\models\RatePlan;
use backend\models\Allotment;
use backend\models\CompanyProfile;
/**
 * ReservationController implements the CRUD actions for Reservation model.
 */
class ReservationController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Reservation models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $current_page = Yii::$app->controller->id."-index";
        // $this->view->params['current_page'] = $current_page;
        
        $searchModel = new ReservationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        // $total_items = $dataProvider->getTotalCount();

        // $page_size = array_values( Yii::$app->params['page_size'])[0];
        // $page_size_cookie = $current_page.'_page_size';
        // if(isset($_REQUEST["page_size"])){
        //     if(intval($_REQUEST["page_size"])>0){
        //         $page_size = intval($_REQUEST["page_size"]);
        //         $set_cookies = Yii::$app->response->cookies;
        //         $set_cookies->add(new Cookie([
        //         'name' => $page_size_cookie,
        //         'value' => $page_size,
        //         'expire' => time() + (86400 * 3),
        //         ]));
        //     }
        // } else {
        //     $get_cookies = Yii::$app->request->cookies;
        //     if ($get_cookies->has($page_size_cookie)) {
        //         $page_size = $get_cookies->getValue($page_size_cookie);
        //     }
        // }

        // $page = 0;
        // $page_cookie = $current_page.'_page';
        // if(isset($_REQUEST["page"])){
        //     if(intval($_REQUEST["page"])>0){
        //         $page = intval($_REQUEST["page"])-1;
        //         $set_cookies = Yii::$app->response->cookies;
        //         $set_cookies->add(new Cookie([
        //         'name' => $page_cookie,
        //         'value' => $page,
        //         'expire' => time() + (86400 * 3),
        //         ]));
        //     }
        // } else {
        //     $get_cookies = Yii::$app->request->cookies;
        //     if ($get_cookies->has($page_cookie)) {
        //         $page = $get_cookies->getValue($page_cookie);
        //     }
        // }
        // $max_page = ceil($total_items / $page_size);

        // $decrease_page = 0;
        // while($page + 1 > $max_page){
        //     $page=$page-1;
        //     $decrease_page = 1;
        // }
        // if($decrease_page==1){
        //     $set_cookies = Yii::$app->response->cookies;
        //     $set_cookies->add(new Cookie([
        //     'name' => $page_cookie,
        //     'value' => $page,
        //     'expire' => time() + (86400 * 3),
        //     ]));
        // }

        // $dataProvider->pagination->pageSize = $page_size;
        // $dataProvider->pagination->page = $page;

        return $this->render('index', [
            // 'page_size' => $page_size,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reservation model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Reservation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionBooking() {
            $model = new Reservation();
            $check_in_date = Yii::$app->request->post('check_in');
            $check_out_date = Yii::$app->request->post('check_out');
            $rate_plan = Yii::$app->request->post('rate_plan_id');
            $total_amount = Yii::$app->request->post('total_amount');

            return $this->render('create', [
                'check_in_date'=>$check_in_date,
                'check_out_date'=>$check_out_date,
                'rate_plan'=>$rate_plan,
                'total_amount'=>$total_amount,
                'model'=>$model,
            ]);

    }
    public function actionCheckRate() {
        $model = new Reservation();
        if ($model->load(Yii::$app->request->post())){
            $acc_id = Yii::$app->request->post('accommodation_id');
            $check_in_date = $model->check_in;
            $check_out_date = $model->check_out;
            return $this->redirect(array('site/single-acc-type',
                'id'=>$acc_id,
                'f_from_date'=>$check_in_date,
                'f_to_date'=>$check_out_date,
                'guest'=>0,
            ));
        }

    }

    public function actionCreate()
    {
        $model = new Reservation();
        $model->created_date = date('Y-m-d H:i:s');
        $model->status = 1;
        if ($model->load(Yii::$app->request->post())){
            $check_in_date = Yii::$app->request->post('check_in');
            $check_out_date = Yii::$app->request->post('check_out');
            $rate_plan = Yii::$app->request->post('rate_plan_id');
            $acc_id = Yii::$app->request->post('accommodation_id');
            $total_amount = Yii::$app->request->post('total_amount');
            $model->accommodation_id = $acc_id;
            $model->check_in = $check_in_date;
            $model->check_out = $check_out_date;
            $model->rate_plan_id = $rate_plan;
            $model->total = $total_amount;
            if (Yii::$app->request->post('promotion')) {
                $model->promotion = Yii::$app->request->post('promotion');
            }else{
                $model->promotion = 0;
            }
            $model->promotion_type = 0;
            $model->sub_total = $total_amount;
            // check Availability again
            // maco add
            $mysql = "SELECT * from 
                allotment 
                where date between '$check_in_date' AND '$check_out_date' AND date < '$check_out_date' AND accommodation_id = $acc_id";
                $date_arr = Yii::$app->db->createCommand("$mysql")->queryAll();
                $date1 = new \DateTime($check_in_date, new \DateTimeZone('UTC'));
                $date2 = new \DateTime($check_out_date, new \DateTimeZone('UTC'));
                $numberOfNights= $date2->diff($date1)->format("%a");
                $numberOfNightsBySelect = sizeof($date_arr);
                $val_res = 0;
                if($numberOfNights > $numberOfNightsBySelect){
                    $val_res = 0;
                }else{
                    foreach ($date_arr as $row) {
                        $available = $row['number_of_guest'];
                        if ($available <= 0 ) {
                            $val_res = 0;
                        }else{
                            $val_res = 1;
                        }
                    }
                    // if ($val_res == 0) {
                    //     echo "NO, dont have allotment";
                    // }else{
                    //     echo "yes, have allotment";
                    // }
                }
                // exit();
            // end 
                // $date_arr = Yii::$app->db->createCommand("SELECT * from 
                // allotment 
                // where date between '$check_in_date' AND '$check_out_date' AND accommodation_id = $acc_id")->queryAll();

                // $val_res = "";
                // foreach ($date_arr as $row) {
                //     $available = $row['number_of_guest'];
                //     if ($available <= 0 ) {
                //         $val_res = 0;
                //     }else{
                //         $val_res = 1;
                //     }
                // }
                if ($val_res == 0) {
                    echo "<script>
                    alert('The Property unavailable, Someone has booked last moment');
                    window.location.href='../site/single-acc-type?id=".$acc_id."&f_from_date=".$check_in_date."&f_to_date=".$check_out_date."&guest=5';
                    </script>";
                    exit();
                }
            // end check availability 
            foreach($date_arr as $n){
                $allotmentId =  $n['id'];
                $updateMySql = "UPDATE allotment
                SET number_of_guest = number_of_guest - 1
                WHERE ID = $allotmentId";
                Yii::$app->db->createCommand("$updateMySql")->execute();
            }
            //booking Email
                $email_body = '<blockquote style="margin:0 0 0 0ex;border-left:0px;padding-left:0ex">
                                <div dir="ltr">
                                    <table width="100%" border="0" cellspacing="0" style="font-family:&quot;Open Sans&quot;,sans-serif;font-size:12px;margin:0px">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p style="font-size:20px">New Booking - Angkor Stays</p>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td valign="top" style="background-color:rgb(248,248,248);padding:0px 15px 15px;border-top-left-radius:0px;border-top-right-radius:0px">
                                                    <table width="100%" border="0" cellpadding="0">
                                                        <tbody>
                                                            <tr valign="top">
                                                                <td width="65%">
                                                                    <ul style="padding:15px 0px 0px 15px;margin:0px">
                                                                        <li style="line-height:20px;padding:0px;margin:0px">For booking enquiries, cancellations or amendments the guest has been instructed to contact you directly.</li>
                                                                    </ul>
                                                                </td>
                                                                <td width="35%" style="vertical-align:bottom">
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tbody>
                                                                            <tr class= "booking-here">
                                                                                <td align="right" style="padding-top:10px">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div style="border-bottom:2px solid rgb(238,238,238);padding-bottom:8px;font-size:14px;margin-top:20px">
                                                        <strong>YOUR BOOKING</strong>
                                                    </div>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-bottom:8px;margin-top:8px">
                                                        <tbody>
                                                            <tr>
                                                                <td valign="top" width="20%" style="padding:1px 10px 1px 20px">
                                                                    <strong>Guest:</strong>
                                                                </td>
                                                                <td width="80%" style="padding:1px 20px">'.$model->first_name.' '.$model->last_name.'</td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top" width="20%" style="padding:1px 20px">
                                                                    <strong>&nbsp; Email</strong>
                                                                </td>
                                                                <td width="80%" style="padding:1px 20px">
                                                                    <a href="'.$model->email.'" title="mailto:'.$model->email.'" target="_blank">'.$model->email.'</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top" width="20%" style="padding:1px 20px">
                                                                    <strong>&nbsp;Phone Number:</strong>
                                                                </td>
                                                                <td width="80%" style="padding:1px 20px">
                                                                    <a href="tel:+85577466082" target="_blank">'.$model->contact_phone.'</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" style="padding:1px 10px 1px 20px">
                                                                    <strong>Check-in:</strong>
                                                                </td>
                                                                <td width="80%" style="padding:1px 20px">'.$model->check_in.'</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" style="padding:1px 10px 1px 20px">
                                                                    <strong>Check-out:</strong>
                                                                </td>
                                                                <td width="80%" style="padding:1px 20px">'.$model->check_out.'</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" style="padding:1px 10px 1px 20px">
                                                                    <strong>Booked on:</strong>
                                                                </td>
                                                                <td width="80%" style="padding:1px 20px">'.date('Y-m-d H:i:s').'</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" style="padding:1px 10px 1px 20px">
                                                                    <strong>Rate Plan Name: </strong>
                                                                </td>
                                                                <td width="80%" style="padding:1px 20px">'.RatePlan::findOne($rate_plan)->name.'</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" style="padding:1px 10px 1px 20px">
                                                                    <strong>Balance due on arrival:</strong>
                                                                </td>
                                                                <td width="80%" style="padding:1px 20px">
                                                                    <strong>US$ '.number_format($model->total, 2).'
                                                                        <span>&nbsp;</span>
                                                                    </strong>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div style="border-bottom:2px solid rgb(238,238,238);padding-bottom:8px;font-size:14px;margin-top:20px">
                                                        <strong>ADDITIONAL DETAILS</strong>
                                                    </div>
                                                    <br><b style="padding:1px 20px;font-size: 15px;">Additional comments: </b> ' .$model->description. '
                                                    <div style="border-bottom:2px solid rgb(238,238,238);font-size:14px;margin-top:16px">
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div style="border-bottom:2px solid rgb(238,238,238);padding-bottom:8px;font-size:14px;margin-top:20px">
                                                        <strong>Property</strong>
                                                    </div>
                                                    <h3>Name: '.AccommodationProfile::findOne($acc_id)->name.'</h3>


                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </blockquote>';

                Yii::$app->mailer->compose()
                ->setFrom('info@angkorstays.com')
                ->setTo(CompanyProfile::findOne(1)->reservation_email)
                ->setSubject('New Booking - Angkor Stays')
                ->setHtmlBody($email_body)
                // echo $email_body;
                // exit();
                ->send();

                // sent confirmation


                $email_body = '<blockquote style="margin:0 0 0 0ex;border-left:0px;padding-left:0ex">
                                <div dir="ltr">
                                    <table width="100%" border="0" cellspacing="0" style="font-family:&quot;Open Sans&quot;,sans-serif;font-size:12px;margin:0px">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p style="font-size:20px">Your Booking - Angkor Stays</p>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td valign="top" style="background-color:rgb(248,248,248);padding:0px 15px 15px;border-top-left-radius:0px;border-top-right-radius:0px">
                                                    <table width="100%" border="0" cellpadding="0">
                                                        <tbody>
                                                            <tr valign="top">
                                                                <td width="65%">
                                                                    <ul style="padding:15px 0px 0px 15px;margin:0px">
                                                                        <li style="line-height:20px;padding:0px;margin:0px">For booking enquiries, cancellations or amendments you can contact us directly.</li>
                                                                    </ul>
                                                                </td>
                                                                <td width="35%" style="vertical-align:bottom">
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tbody>
                                                                            <tr class= "booking-here">
                                                                                <td align="right" style="padding-top:10px">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div style="border-bottom:2px solid rgb(238,238,238);padding-bottom:8px;font-size:14px;margin-top:20px">
                                                        <strong>YOUR BOOKING</strong>
                                                    </div>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-bottom:8px;margin-top:8px">
                                                        <tbody>
                                                            <tr>
                                                                <td valign="top" width="20%" style="padding:1px 10px 1px 20px">
                                                                    <strong>Guest:</strong>
                                                                </td>
                                                                <td width="80%" style="padding:1px 20px">'.$model->first_name.' '.$model->last_name.'</td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top" width="20%" style="padding:1px 20px">
                                                                    <strong>&nbsp; Email</strong>
                                                                </td>
                                                                <td width="80%" style="padding:1px 20px">
                                                                    <a href="'.$model->email.'" title="mailto:'.$model->email.'" target="_blank">'.$model->email.'</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top" width="20%" style="padding:1px 20px">
                                                                    <strong>&nbsp;Phone Number:</strong>
                                                                </td>
                                                                <td width="80%" style="padding:1px 20px">
                                                                    <a href="tel:+85577466082" target="_blank">'.$model->contact_phone.'</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" style="padding:1px 10px 1px 20px">
                                                                    <strong>Check-in:</strong>
                                                                </td>
                                                                <td width="80%" style="padding:1px 20px">'.$model->check_in.'</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" style="padding:1px 10px 1px 20px">
                                                                    <strong>Check-out:</strong>
                                                                </td>
                                                                <td width="80%" style="padding:1px 20px">'.$model->check_out.'</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" style="padding:1px 10px 1px 20px">
                                                                    <strong>Booked on:</strong>
                                                                </td>
                                                                <td width="80%" style="padding:1px 20px">'.date('Y-m-d H:i:s').'</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" style="padding:1px 10px 1px 20px">
                                                                    <strong>Rate Plan Name: </strong>
                                                                </td>
                                                                <td width="80%" style="padding:1px 20px">'.RatePlan::findOne($rate_plan)->name.'</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" style="padding:1px 10px 1px 20px">
                                                                    <strong>Balance due on arrival:</strong>
                                                                </td>
                                                                <td width="80%" style="padding:1px 20px">
                                                                    <strong>US$ '.number_format($model->total, 2).'
                                                                        <span>&nbsp;</span>
                                                                    </strong>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div style="border-bottom:2px solid rgb(238,238,238);padding-bottom:8px;font-size:14px;margin-top:20px">
                                                        <strong>ADDITIONAL DETAILS</strong>
                                                    </div>
                                                    <br><b style="padding:1px 20px;font-size: 15px;">Additional comments: </b> ' .$model->description. '
                                                    <div style="border-bottom:2px solid rgb(238,238,238);font-size:14px;margin-top:16px">
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div style="border-bottom:2px solid rgb(238,238,238);padding-bottom:8px;font-size:14px;margin-top:20px">
                                                        <strong>Property</strong>
                                                    </div>
                                                    <h3>Name: '.AccommodationProfile::findOne($model->accommodation_id)->name.'</h3>


                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </blockquote>';

                Yii::$app->mailer->compose()
                ->setFrom('info@angkorstays.com')
                ->setTo($model->email)
                ->setSubject('New Booking - Angkor Stays')
                ->setHtmlBody($email_body)
                // echo $email_body;
                // exit();
                ->send();


            if($model->save()){
                Yii::$app->session->setFlash('success', "Saved successful");
                return $this->redirect('thank-guest');

            }else {
                echo "MODEL NOT SAVED";
                print_r($model->getAttributes());
                print_r($model->getErrors());
                exit;
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionThankGuest()
    {
        return $this->render('thank_booking');
    }

    /**
     * Updates an existing Reservation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this -> layout = 'blankLayout';

        $model = $this->findModel($id);

        $model->updated_date =  date('Y-m-d H:i:s');
        $model->updated_by = Yii::$app->user->getId(); 
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Saved successful");
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Reservation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Reservation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reservation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reservation::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}