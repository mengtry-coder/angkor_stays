<?php

namespace backend\controllers;

use Yii;
use backend\models\Rate;
use backend\models\RatePlan;
use app\models\RateSearch;
use backend\models\AllotmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Cookie;
use backend\models\MonthList;
use backend\models\AccommodationProfile;
use backend\models\YearList;
/**
 * RateController implements the CRUD actions for Rate model.
 */
class RateController extends Controller
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
     * Lists all Rate models.
     * @return mixed
     */
    public function actionDependent()
    {
        // check condition for ajax request from view
        if(Yii::$app->request->isAjax){
            // which type and action that ajax request
            if(Yii::$app->request->post('action') == 'get_rate_plan'){
                // ajax request by post id
                // create new variable name $zipId
                $id = Yii::$app->request->post('id');
                // query: if query by using active record must query must return One() row and also asArray()
                // else query: by create Command must use queryOne().
                $reponse = RatePlan::find()->where(['accommodation_id'=>$id])->asArray()->all();
                // when ajax reques controller will return json_endcode(query) back *note: asArray()
                // view will get by syntax JSON.parse().
                return json_encode($reponse);
            }

        }
    }

    public function actionIndex()
    {
        $this -> layout = 'rateLayout';
        $current_page = Yii::$app->controller->id."-index";
        $this->view->params['current_page'] = $current_page;
        
        $searchModel = new RateSearch();

        $model = new Rate();
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
        $accommodation_arr = AccommodationProfile::find()->where(['status' => 1])->all();


        if (isset($searchModel->year)) {
            $year = YearList::find()->where(['id'=>$searchModel->year])->one();
            $month = MonthList::find()->where(['id'=>$searchModel->month])->one()->value;
            $total_days = cal_days_in_month(CAL_GREGORIAN, $month, $year->name);
            $filter_year = $year->name;
            $month_value = MonthList::find()->where(['id'=>$searchModel->month])->one()->value;
        }else{

            $year = YearList::find()->where(['name' => date("Y")])->one();
            $month = date("m");
            $total_days = cal_days_in_month(CAL_GREGORIAN, $month, $year->name);
            $filter_year = date("Y");
            $month_value = date("m");
        }

        return $this->render('index', [
            'page_size' => $page_size,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'year' => $year,
            'month' => $month,
            'total_days' => $total_days,
            'filter_year' => $filter_year,
            'month_value' => $month_value,
            'accommodation_arr' => $accommodation_arr,
        ]);
    }

    /**
     * Displays a single Rate model.
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
     * Creates a new Rate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionPromotion()
    {
        $this -> layout = 'rateLayout';
        $model = new Rate();
        return $this->render('promotion', [
            'model' => $model,
        ]);
    }

    public function actionPromotionCreate()
    {
        $this -> layout = 'rateLayout';
        $model = new Rate();
        if ($model->load(Yii::$app->request->post())) {
            $acc_id = Yii::$app->request->post('acc_name');
            $model_id = Rate::find()
                    ->where(['between', 'date', $model->from_date, $model->to_date ])
                    ->andWhere(['accommodation_id' => $acc_id, 'rate_plan_id' => $model->rate_plan_id])
                    ->all();
                    // echo "<pre>";
                    // print_r($model_id);
                    // exit();
            foreach ($model_id as $key => $value) {
                $value->id."<br>";
                Yii::$app->db->createCommand()
                     ->update('rate', ['promotion' => $model->promotion, 'promotion_type' => $model->promotion_type], ['id' => $value->id])
                     ->execute();
            }
            Yii::$app->session->setFlash('success', "Saved successful");
            return $this->redirect(Yii::$app->request->referrer);

        }

    }


    public function actionCreate($month, $year)
    {
        $id_month = MonthList::find()->where(['value'=>$month])->one()->id;
        $model = new Rate();
        $model->created_date =  date('Y-m-d H:i:s');
        $updated_date =  date('Y-m-d H:i:s');
        $model->date =  date('Y-m-d H:i:s');
        $model->created_by = Yii::$app->user->getId(); 
        $updated_by = Yii::$app->user->getId();
        if ($model->load(Yii::$app->request->post())) {
            $acc_id = Yii::$app->request->post('acc_name');
            Yii::$app->db->createCommand("DELETE from rate
            where date BETWEEN '$model->from_date' AND '$model->to_date' AND accommodation_id = $acc_id AND rate_plan_id = $model->rate_plan_id")->execute();
                $str= "";
                for ($i=$model->from_date; $i <= $model->to_date; $i++) {
                        $str = "('$i', '$acc_id', $model->price, '$updated_date', $updated_by, 1, $model->rate_plan_id, 0, 0)".",".$str;
                    }
                    $str = rtrim($str, ",");
                    $insert = "INSERT INTO rate(date, accommodation_id, price, updated_date, updated_by, status, rate_plan_id, promotion, promotion_type) VALUES". $str;
        }
        if(Yii::$app->db->createCommand($insert)->execute()){
            Yii::$app->session->setFlash('success', "Saved successful");
            return $this->redirect('index.php?r=rate%2Findex&RateSearch%5Bmonth%5D='.$id_month.'&RateSearch%5Byear%5D='.$year.'&RateSearch%5Baccommodation_id%5D='.$acc_id.'%5Bfrom_date%BD='.$model->from_date.'%5Bto_date%BD='.$model->to_date.'%5Bprice%BD='.$model->price.'');
        }else {
            echo "MODEL NOT SAVED";
            print_r($model->getAttributes());
            print_r($model->getErrors());
            exit;
        };
    }

    /**
     * Updates an existing Rate model.
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
     * Deletes an existing Rate model.
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
     * Finds the Rate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rate::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
