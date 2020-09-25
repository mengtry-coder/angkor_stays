<?php

namespace backend\controllers;

use Yii;
use backend\models\AccommodationProfile;
use backend\models\AccommodationProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Cookie;
use yii\web\UploadedFile;
use backend\models\AccommodationFacility;
use backend\models\AccommodationTransportation;
use backend\models\AccommodationService;
use backend\models\AccommodationSport;
use backend\models\AccommodationMeal;
use backend\models\AccommodationGalleryImage;
use backend\models\Facility;
use backend\models\Service;
use backend\models\Transportation;
use backend\models\Meal;
use backend\models\Sport;

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
        $current_page = Yii::$app->controller->id."-index";
        $this->view->params['current_page'] = $current_page;
        
        $searchModel = new AccommodationProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $total_items = $dataProvider->getTotalCount();

        $page_size = array_values( Yii::$app->params['page_size'])[0];
        $page_size_cookie = $current_page.'_page_size';
        if(isset($_REQUEST["page_size"])){
            if(intval($_REQUEST["page_size"])>0){
                $page_size = intval($_REQUEST["page_size"]);
                $set_cookies = Yii::$app->response->cookies;
                $set_cookies->add(new Cookie([
                'name' => $page_size_cookie,
                'value' => $page_size,
                'expire' => time() + (86400 * 3),
                ]));
            }
        } else {
            $get_cookies = Yii::$app->request->cookies;
            if ($get_cookies->has($page_size_cookie)) {
                $page_size = $get_cookies->getValue($page_size_cookie);
            }
        }

        $page = 0;
        $page_cookie = $current_page.'_page';
        if(isset($_REQUEST["page"])){
            if(intval($_REQUEST["page"])>0){
                $page = intval($_REQUEST["page"])-1;
                $set_cookies = Yii::$app->response->cookies;
                $set_cookies->add(new Cookie([
                'name' => $page_cookie,
                'value' => $page,
                'expire' => time() + (86400 * 3),
                ]));
            }
        } else {
            $get_cookies = Yii::$app->request->cookies;
            if ($get_cookies->has($page_cookie)) {
                $page = $get_cookies->getValue($page_cookie);
            }
        }
        $max_page = ceil($total_items / $page_size);

        $decrease_page = 0;
        while($page + 1 > $max_page){
            $page=$page-1;
            $decrease_page = 1;
        }
        if($decrease_page==1){
            $set_cookies = Yii::$app->response->cookies;
            $set_cookies->add(new Cookie([
            'name' => $page_cookie,
            'value' => $page,
            'expire' => time() + (86400 * 3),
            ]));
        }

        $dataProvider->pagination->pageSize = $page_size;
        $dataProvider->pagination->page = $page;

        return $this->render('index', [
            'page_size' => $page_size,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
    public function actionCreate()
    {
        // $this -> layout = 'blankLayout';

        $model = new AccommodationProfile();
        $base_url = Yii::$app->request->baseUrl;
        $date = date('YmdHis');

        $facility_id = Yii::$app->request->post('facility_id');
        $service_id = Yii::$app->request->post('service_id');
        $transportation_id = Yii::$app->request->post('transportation_id');
        $sport_id = Yii::$app->request->post('sport_id');
        $meal_id = Yii::$app->request->post('meal_id');
    
        if ($model->load(Yii::$app->request->post())) {
            // echo "<pre>";
            // print_r($model);
            // // exit();
            $address = $model->address; // Address
            if ($address == "") {
               $address = "Cambodia, Siem Reap";
            }
            $apiKey = 'AIzaSyAIWgIKTIfzr7s5zoeBYZjIBKodEFiRJDM'; // Google maps now requires an API key.
            // Get JSON results from this request
            $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&key='.$apiKey);
            $geo = json_decode($geo, true); // Convert the JSON to an array

            if (isset($geo['status']) && ($geo['status'] == 'OK')) {
              $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
              $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
              $model->LatitudeLongitude = $latitude.",".$longitude;
            }





            $model->created_by = Yii::$app->user->getId();
            $model->created_date =  date('Y-m-d H:i:s');
            $imageName = $model->name;
            if($model->file = UploadedFile::getInstance($model, 'file')) {
                $controller = Yii::$app->controller->id;
                $path = Yii::getAlias('@backend') . "/web/uploads/$controller";
                $path_image = $base_url . "/uploads/$controller";
                if (!is_dir($path)) {
                \yii\helpers\FileHelper::createDirectory($path, $mode = 0755, $recursive = true);
                }
                $model->file->saveAs($path.'/'  .$model->file->baseName.'_'.$date.'.'.$model->file->extension);
                $model->feature_image = $path_image.'/'  .$model->file->baseName.'_'.$date. '.'.$model->file->extension;
            
            }
            if($model->save()){

                $facility_arr = Facility::find()->where(['status' => 1])->all();
                foreach ($facility_arr as $key => $value) {
                $value_arr = Yii::$app->request->post(strtolower(str_replace(" ","_",$value->name)));
                    if ($value_arr == 1) {
                        // echo $value->id."=".$value_arr."</br>";
                        $model_acc_facility = new AccommodationFacility();
                        $model_acc_facility->accommodation_id = $model->id;
                        $model_acc_facility->facility_id = $value->id;
                        $model_acc_facility->save();
                    }
                }

                $service_arr = Service::find()->where(['status' => 1])->all();
                foreach ($service_arr as $key => $value) {
                $value_arr = Yii::$app->request->post(strtolower(str_replace(" ","_",$value->name)));
                    if ($value_arr == 1) {
                        // echo $value->id."=".$value_arr."</br>";
                        $model_acc_service = new AccommodationService();
                        $model_acc_service->accommodation_id = $model->id;
                        $model_acc_service->service_id = $value->id;
                        $model_acc_service->save();
                    }
                }

                $transportation_arr = Transportation::find()->where(['status' => 1])->all();
                foreach ($transportation_arr as $key => $value) {
                $value_arr = Yii::$app->request->post(strtolower(str_replace(" ","_",$value->name)));
                    if ($value_arr == 1) {
                        // echo $value->id."=".$value_arr."</br>";
                        $model_acc_transportation = new AccommodationTransportation();
                        $model_acc_transportation->accommodation_id = $model->id;
                        $model_acc_transportation->transportation_id = $value->id;
                        $model_acc_transportation->save();
                    }
                }

                $sport_arr = Sport::find()->where(['status' => 1])->all();
                foreach ($sport_arr as $key => $value) {
                $value_arr = Yii::$app->request->post(strtolower(str_replace(" ","_",$value->name)));
                    if ($value_arr == 1) {
                        // echo $value->id."=".$value_arr."</br>";
                        $model_acc_sport = new AccommodationSport();
                        $model_acc_sport->accommodation_id = $model->id;
                        $model_acc_sport->sport_id = $value->id;
                        $model_acc_sport->save();
                    }
                }

                $meal_arr = Meal::find()->where(['status' => 1])->all();
                foreach ($meal_arr as $key => $value) {
                $value_arr = Yii::$app->request->post(strtolower(str_replace(" ","_",$value->name)));
                    if ($value_arr == 1) {
                        // echo $value->id."=".$value_arr."</br>";
                        $model_acc_meal = new AccommodationMeal();
                        $model_acc_meal->accommodation_id = $model->id;
                        $model_acc_meal->meal_id = $value->id;
                        $model_acc_meal->save();
                    }
                }


                Yii::$app->session->setFlash('success', "Saved successful");
                return $this->redirect('index.php?r=accommodation-profile');
                

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

    /**
     * Updates an existing AccommodationProfile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this -> layout = 'accommodationLayout';
        $model = $this->findModel($id);
        $base_url = Yii::$app->request->baseUrl;
        $date = date('YmdHis');
        $model->updated_date =  date('Y-m-d H:i:s');
        $model->updated_by = Yii::$app->user->getId(); 

        $facility_id = Yii::$app->request->post('facility_id');
        $service_id = Yii::$app->request->post('service_id');
        $transportation_id = Yii::$app->request->post('transportation_id');
        $sport_id = Yii::$app->request->post('sport_id');
        $meal_id = Yii::$app->request->post('meal_id');

        if ($model->load(Yii::$app->request->post())) {
            $address = $model->address; // Address
            $apiKey = 'AIzaSyAIWgIKTIfzr7s5zoeBYZjIBKodEFiRJDM'; // Google maps now requires an API key.
            // Get JSON results from this request
            $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&key='.$apiKey);
            $geo = json_decode($geo, true); // Convert the JSON to an array

            if (isset($geo['status']) && ($geo['status'] == 'OK')) {
              $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
              $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
              $model->LatitudeLongitude = $latitude.",".$longitude;
            }

            $imageName = $model->name;
            if($model->file = UploadedFile::getInstance($model, 'file')) {
                $controller = Yii::$app->controller->id;
                $path = Yii::getAlias('@backend') . "/web/uploads/$controller";
                $path_image = $base_url . "/uploads/$controller";
                if (!is_dir($path)) {
                \yii\helpers\FileHelper::createDirectory($path, $mode = 0755, $recursive = true);
                }
                $model->file->saveAs($path.'/'  .$model->file->baseName.'_'.$date.'.'.$model->file->extension);
                $model->feature_image = $path_image.'/'  .$model->file->baseName.'_'.$date. '.'.$model->file->extension;

            }

            if($model->save()){

                $facility_arr = Facility::find()->where(['status' => 1])->all();
                $acc_facility = AccommodationFacility::find()->where(['accommodation_id'=>$model->id])->all();
                    foreach($acc_facility as $delete)
                    {
                        AccommodationFacility::deleteAll(['id' => $delete->id]);
                    }
                foreach ($facility_arr as $key => $value) {
                    $value_arr = Yii::$app->request->post(strtolower(str_replace(" ","_",$value->name)));
                    if ($value_arr == 1) {
                        // echo $value->id."=".$value_arr."</br>";
                        $model_acc_facility = new AccommodationFacility();
                        $model_acc_facility->accommodation_id = $model->id;
                        $model_acc_facility->facility_id = $value->id;
                        $model_acc_facility->save();
                    }
                }

                $service_arr = Service::find()->where(['status' => 1])->all();
                $acc_service = AccommodationService::find()->where(['accommodation_id'=>$model->id])->all();
                    foreach($acc_service as $delete)
                    {
                        AccommodationService::deleteAll(['id' => $delete->id]);
                    }
                foreach ($service_arr as $key => $value) {
                    $value_arr = Yii::$app->request->post(strtolower(str_replace(" ","_",$value->name)));
                    if ($value_arr == 1) {
                        // echo $value->id."=".$value_arr."</br>";
                        $model_acc_service = new AccommodationService();
                        $model_acc_service->accommodation_id = $model->id;
                        $model_acc_service->service_id = $value->id;
                        $model_acc_service->save();
                    }
                }

                $transportation_arr = Transportation::find()->where(['status' => 1])->all();
                $acc_transportation = AccommodationTransportation::find()->where(['accommodation_id'=>$model->id])->all();
                    foreach($acc_transportation as $delete)
                    {
                        AccommodationTransportation::deleteAll(['id' => $delete->id]);
                    }
                foreach ($transportation_arr as $key => $value) {
                    $value_arr = Yii::$app->request->post(strtolower(str_replace(" ","_",$value->name)));
                    if ($value_arr == 1) {
                        // echo $value->id."=".$value_arr."</br>";
                        $model_acc_transportation = new AccommodationTransportation();
                        $model_acc_transportation->accommodation_id = $model->id;
                        $model_acc_transportation->transportation_id = $value->id;
                        $model_acc_transportation->save();
                    }
                }

                $sport_arr = Sport::find()->where(['status' => 1])->all();
                $acc_sport = AccommodationSport::find()->where(['accommodation_id'=>$model->id])->all();
                    foreach($acc_sport as $delete)
                    {
                        AccommodationSport::deleteAll(['id' => $delete->id]);
                    }
                foreach ($sport_arr as $key => $value) {
                    $value_arr = Yii::$app->request->post(strtolower(str_replace(" ","_",$value->name)));
                    if ($value_arr == 1) {
                        // echo $value->id."=".$value_arr."</br>";
                        $model_acc_sport = new AccommodationSport();
                        $model_acc_sport->accommodation_id = $model->id;
                        $model_acc_sport->sport_id = $value->id;
                        $model_acc_sport->save();
                    }
                }
                $meal_arr = Meal::find()->where(['status' => 1])->all();
                $acc_meal = AccommodationMeal::find()->where(['accommodation_id'=>$model->id])->all();
                    foreach($acc_meal as $delete)
                    {
                        AccommodationMeal::deleteAll(['id' => $delete->id]);
                    }
                foreach ($meal_arr as $key => $value) {
                    $value_arr = Yii::$app->request->post(strtolower(str_replace(" ","_",$value->name)));
                    if ($value_arr == 1) {
                        // echo $value->id."=".$value_arr."</br>";
                        $model_acc_meal = new AccommodationMeal();
                        $model_acc_meal->accommodation_id = $model->id;
                        $model_acc_meal->meal_id = $value->id;
                        $model_acc_meal->save();
                    }
                }

                Yii::$app->session->setFlash('success', "Saved successful");
                return $this->redirect(Yii::$app->request->referrer);

            }else {
                echo "MODEL NOT SAVED";
                print_r($model->getAttributes());
                print_r($model->getErrors());
                exit;
            }
             
           
                
            Yii::$app->session->setFlash('success', "Saved successful");
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionDeleteImage($id){
        $data = AccommodationGalleryImage::findOne($id);
        $data->delete();
        return $this->redirect(Yii::$app->request->referrer);
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
        $acc_facility = AccommodationFacility::find()->where(['accommodation_id'=>$id])->all();
        foreach($acc_facility as $delete)
        {
            AccommodationFacility::deleteAll(['id' => $delete->id]);
        }

        $acc_service = AccommodationService::find()->where(['accommodation_id'=>$id])->all();
        foreach($acc_service as $delete)
        {
            Accommodationservice::deleteAll(['id' => $delete->id]);
        }

        $acc_transportation = AccommodationTransportation::find()->where(['accommodation_id'=>$id])->all();
        foreach($acc_transportation as $delete)
        {
            AccommodationTransportation::deleteAll(['id' => $delete->id]);
        }

        $acc_sport = AccommodationSport::find()->where(['accommodation_id'=>$id])->all();
        foreach($acc_sport as $delete)
        {
            AccommodationSport::deleteAll(['id' => $delete->id]);
        }

        $acc_meal = AccommodationMeal::find()->where(['accommodation_id'=>$id])->all();
        foreach($acc_meal as $delete)
        {
            AccommodationMeal::deleteAll(['id' => $delete->id]);
        }

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
