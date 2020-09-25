<?php

namespace frontend\controllers;

use Yii;
use frontend\models\AccommodationProfile;
use frontend\models\AccommodationProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Cookie;
use backend\models\Rate;
use backend\models\Allotment;
use backend\models\RatePlan;
/**
 * AccommodationProfileController implements the CRUD actions for AccommodationProfile model.
 */
class AccommodationProfileController extends Controller
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
     * Lists all AccommodationProfile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $accommodation_arr = AccommodationProfile::find()->where(['status'=>1])->all();
        $accommodation_count = AccommodationProfile::find()->where(['status'=>1])->count();

        $searchModel = new AccommodationProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // $dataProvider->query->andWhere(['accommodation_id' => $id]);
        // $accId = '';
        // foreach ($dataProvider->query as $n) {
        // print_r($searchModel->facility);


        $arrChoosedFacility = $searchModel->facility; //take the facility that we filter
        if ($arrChoosedFacility) {
            $data = $dataProvider->query->all();
            // print_r($data);
            // exit();
            $accommodationArray = array();
            foreach ($data as $key => $value) {
               $checkIfOneFacitlyDoesnothave = 'yes'; 
               $i = 0;
               $accId =  $value['id']; //loop accommodation_id
               $mysql = "SELECT * from accommodation_facility where accommodation_id = $accId";
               $getAccFacility = Yii::$app->db->createCommand($mysql)->queryAll(); //find facility id which have accommodation_id = accommodaton_id above
               
               foreach ($getAccFacility as $n) { // get those arr
                    foreach ($arrChoosedFacility as $key => $value) { // loop those filter facility

                        $accFacility = $n['facility_id']; //get facility id from each loop that accommodation above have
                        $idChoosedFacility =  $value; // get id facility that chhose


                        if($accFacility == $idChoosedFacility){ //if facility id from each loop that accommodation above  == id facility we filter
                            // echo 'yes';
                            $checkIfOneFacitlyDoesnothave = 'yes'; // if one facility fone have say yes
                            $i = $i +1;
                        } 

                    }
               }
                $numberFacilityMatched = $i;
                $numberOfFacilityChoosen = sizeof($arrChoosedFacility); //number of loop
                if($numberOfFacilityChoosen == $i){
                    // echo 'this accommodationl has all facility choosen with acc id' . $accId;
                    array_push($accommodationArray, $accId); // get the acc have arr
                }
                // else{
                //     // echo 'this accommodationl doesnot has all facility choosen';
                // }
             
            }
            // echo sizeof($accommodationArray);
            $dataProvider->query->andWhere(['IN','accommodation_profile.id', $accommodationArray]);

        }
            // $dataProvider->query->createCommand("SELECT price from rate as r where r.price > 0 and accommodation_id IN ($accommodationArray)");
            // $dataProvider->query->createCommand()->getRawSql();
        $model = new AccommodationProfile();
        $guest = $searchModel->max_guest;
        $room = $searchModel->number_of_rooms;
        if (isset($searchModel->from_date)) {
            $f_from_date = $searchModel->from_date;
            $f_to_date = $searchModel->to_date;
        }else{
            $f_from_date = $searchModel->from_date = date('Y-m-d');
            $f_to_date = $searchModel->to_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 1 days'));
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'accommodation_arr' => $accommodation_arr,
            'accommodation_count' => $accommodation_count,
            'model' => $model,
            'guest' => $guest,
            'room' => $room,
            'f_from_date' => $f_from_date,
            'f_to_date' => $f_to_date,
        ]);
    }
    public function actionGetAccType($accommodation_type_id)
    {

        $accommodation_arr = AccommodationProfile::find()->where(['status'=>1])->all();
        $accommodation_count = AccommodationProfile::find()->where(['status'=>1])->count();
        
        $searchModel = new AccommodationProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $dataProvider->query->andWhere(['accommodation_type' => $accommodation_type_id]);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'accommodation_arr' => $accommodation_arr,
            'accommodation_count' => $accommodation_count,
        ]);
    }


    /**
     * Displays a single AccommodationProfile model.
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
     * Creates a new AccommodationProfile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionDependent()
    {
        if(Yii::$app->request->isAjax){
            if(Yii::$app->request->post('action') == 'get_rate_plan'){
                $acc_id = Yii::$app->request->post('acc_id');
                $f_from_date = Yii::$app->request->post('f_from_date');
                $f_to_date = Yii::$app->request->post('f_to_date');
                $check_in = Yii::$app->request->post('check_in');
                $check_out = Yii::$app->request->post('check_out');

                $date_arr = Yii::$app->db->createCommand("SELECT * from 
                allotment 
                where date between '$check_in' AND '$check_out' AND accommodation_id = $acc_id")->queryAll();

                $val_res = 0;
                foreach ($date_arr as $row) {
                    $available = $row['number_of_guest'];
                    if ($available <= 0 ) {
                        $val_res = 0;
                    }else{
                        $val_res = 1;
                    }
                }
                if ($val_res == 0) {
                    $response = 0;
                }else{
                    $date1 = new \DateTime($check_in, new \DateTimeZone('UTC'));
                    $date2 = new \DateTime($check_out, new \DateTimeZone('UTC'));
                    $numberOfNights= $date2->diff($date1)->format("%a");

                        $response = Yii::$app->db->createCommand("
                            SELECT rp.name as name, rp.id as id, rp.guest as guest_number, SUM(r.price) as price, r.promotion as promotion, r.promotion_type as promotion_type
                            from rate as r
                            left join rate_plan as rp on rp.id = r.rate_plan_id
                            where r.accommodation_id = $acc_id
                                    AND r.date >= '$check_in'
                                    AND r.date < '$check_out'
                                    AND r.price > 0
                                    GROUP BY rate_plan_id
                                    ")
                        ->queryAll();
                }
                return json_encode($response);
            }

            if(Yii::$app->request->post('action') == 'get_rate'){
                // ajax request by post id
                // create new variable name $zipId
                $id = Yii::$app->request->post('id');
                $acc_id = Yii::$app->request->post('acc_id');
                $check_in = Yii::$app->request->post('check_in');
                $check_out = Yii::$app->request->post('check_out');
                $response = Yii::$app->db->createCommand("SELECT *
                    FROM rate
                    WHERE accommodation_id = $acc_id
                    AND date >= '$check_in'
                    AND date <= '$check_out'
                    AND rate_plan_id = $id
                    ")->queryOne();
                // query: if query by using active record must query must return One() row and also asArray()
                // else query: by create Command must use queryOne().
                // $reponse = RatePlan::find()->where(['accommodation_id'=>$id])->asArray()->all();
                // when ajax reques controller will return json_endcode(query) back *note: asArray()
                // view will get by syntax JSON.parse().
                return json_encode($response);
            }

            if(Yii::$app->request->post('action') == 'get_rate_plan_guest'){
                $id = Yii::$app->request->post('id');
                $acc_id = Yii::$app->request->post('acc_id');
                $response = Yii::$app->db->createCommand("SELECT *
                    FROM rate_plan
                    WHERE accommodation_id = $acc_id
                    AND id = $id
                    ")->queryOne();
                return json_encode($response);
            }
            

        }
        if(Yii::$app->request->post('action') == 'get_acc_profile'){
            $acc_type_id = Yii::$app->request->post('type_id');
            if ($acc_type_id) {
                $response = AccommodationProfile::find()->select(['feature_image', 'id','name', 'LatitudeLongitude', 'address', 'price'])->where(['status' => 1, 'accommodation_type' => $acc_type_id])->asArray()->all();
            return json_encode($response);

            }else{
                $response = AccommodationProfile::find()->select(['feature_image', 'id','name', 'LatitudeLongitude', 'address', 'price'])->where(['status' => 1])->asArray()->all();
            return json_encode($response);
                
            }
        }
    }

    public function actionCreate()
    {
        $this -> layout = 'blankLayout';

        $model = new AccommodationProfile();

        $model->created_date =  date('Y-m-d H:i:s');
        $model->created_by = Yii::$app->user->getId(); 
       
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Saved successful");
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AccommodationProfile model.
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
     * Deletes an existing AccommodationProfile model.
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
     * Finds the AccommodationProfile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AccommodationProfile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AccommodationProfile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}