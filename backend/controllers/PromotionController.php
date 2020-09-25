<?php

namespace backend\controllers;

use Yii;
use app\models\Promotion;
use backend\models\PromotionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Cookie;
use backend\models\RatePlan;
use backend\models\Rate;
/**
 * PromotionController implements the CRUD actions for Promotion model.
 */
class PromotionController extends Controller
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
     * Lists all Promotion models.
     * @return mixed
     */
    public function actionDependent()
    {
        if(Yii::$app->request->isAjax){
            if(Yii::$app->request->post('action') == 'get_rate_plan'){
                $id = Yii::$app->request->post('id');
                $reponse = RatePlan::find()->where(['accommodation_id'=>$id])->asArray()->all();
                return json_encode($reponse);
            }

        }
    }
    public function actionIndex()
    {
        $this -> layout = 'rateLayout';
        $current_page = Yii::$app->controller->id."-index";
        $this->view->params['current_page'] = $current_page;
        
        $searchModel = new PromotionSearch();
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
     * Displays a single Promotion model.
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
     * Creates a new Promotion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this -> layout = 'blankLayout';
        $model = new Promotion();

        $model->created_date =  date('Y-m-d H:i:s');
        $model->created_by = Yii::$app->user->getId();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Saved successful");
            return $this->redirect(Yii::$app->request->referrer);
        }
        // if ($model->load(Yii::$app->request->post())) {
        //     Yii::$app->db->createCommand("DELETE from promotion
        //     where date BETWEEN '$model->from_date' AND '$model->to_date' AND accommodation_id = $model->accommodation_id AND rate_plan_id = $model->rate_plan_id")->execute();

        //     // loop save data by date promotion
        //     for ($i=$model->from_date; $i <= $model->to_date; $i++) {
        //         $model->id = NULL;
        //         $model->isNewRecord = true;
        //         $model->date = $i;
        //         $model->save();
        //     }

        //     // find property id in rate by between date
        //     $model_id = Rate::find()
        //         ->where(['between', 'date', $model->from_date, $model->to_date ])
        //         ->andWhere(['accommodation_id' => $model->accommodation_id, 'rate_plan_id' => $model->rate_plan_id])
        //         ->all();
            
        //     // loop all those property id
        //     foreach ($model_id as $key => $value) {
        //         Yii::$app->db->createCommand()
        //             ->update('rate', ['promotion' => $model->promotion, 'promotion_type' => $model->promotion_type], ['id' => $value->id])
        //             ->execute();
        //     }
        //     Yii::$app->session->setFlash('success', "Saved successful");
        //     return $this->redirect(Yii::$app->request->referrer);
        // }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Promotion model.
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
     * Deletes an existing Promotion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        // find property id in rate by between date
        $model = Promotion::findOne($id);
        // $model_id = Rate::find()
        //     ->where(['date' => $model->date,'accommodation_id' => $model->accommodation_id, 'rate_plan_id' => $model->rate_plan_id])
        //     ->one();
        // if ($model_id) {
        //    Yii::$app->db->createCommand()
        //     ->update('rate', ['promotion' => 0], ['id' => $model_id->id])
        //     ->execute();
        // }
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Promotion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Promotion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Promotion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
