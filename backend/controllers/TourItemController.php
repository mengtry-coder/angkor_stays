<?php

namespace backend\controllers;

use Yii;
use backend\models\TourItem;
use backend\models\TourItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Cookie;
use yii\web\UploadedFile;
Use yii\helpers\FileHelper;
use backend\models\CompanyProfile;
use backend\models\TourItemGallery;
/**
 * TourItemController implements the CRUD actions for TourItem model.
 */
class TourItemController extends Controller
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
     * Lists all TourItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $current_page = Yii::$app->controller->id."-index";
        $this->view->params['current_page'] = $current_page;
        
        $searchModel = new TourItemSearch();
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
     * Displays a single TourItem model.
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
     * Creates a new TourItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionUpload()
    {
        $model = new TourItemGallery();
        $date = date('YmdHis');
        if ($model->load(Yii::$app->request->post())) {
            return 123;
            $path = Yii::getAlias('@backend') . "/web/uploads";
            $name = UploadedFile::getAlias($model, 'filename');
            $model->file_name->saveAs($path.'/'  .$name->baseName.'_'.$date.'.'.$name->extension);
            if ($model->save()) {
                return $this->redirect('index');
            }
        }

    }

    public function actionCreate()
    {
        // $this -> layout = 'blankLayout';
        $id = "";
        Yii::$app->session->set('tour_item_id',$id);

        $model = new TourItem();

        $model->created_date =  date('Y-m-d H:i:s');
        $model->created_by = Yii::$app->user->getId();
        
        $base_url = Yii::$app->request->baseUrl;
        $date = date('YmdHis');
        
        if ($model->load(Yii::$app->request->post())) {
            $model->created_by = Yii::$app->user->getId();
            $model->created_date =  date('Y-m-d H:i:s');
            $imageName = $model->name;
            if($model->file = UploadedFile::getInstance($model, 'file')) {
                    $controller = Yii::$app->controller->id;
                    $path = Yii::getAlias('@backend') . "/web/uploads/$controller";
                    $path_image = $base_url . "/uploads/$controller";
                    if (!is_dir($path)) {
                    \yii\helpers\FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
                    }
                    $model->file->saveAs($path.'/'  .$model->file->baseName.'_'.$date.'.'.$model->file->extension);
                    $model->feature_image = $path_image.'/'  .$model->file->baseName.'_'.$date. '.'.$model->file->extension;
            }

            if ($model->validate()) {
                $names = UploadedFile::getInstances($model, 'file_name');
                $controller = Yii::$app->controller->id;
                $base_url = Yii::$app->request->baseUrl;

                foreach ($names as $name) {
                    $path = Yii::getAlias('@backend') . "/web/uploads/$controller";
                    if ($name->saveAs($path.'/'.'_'.$date.'_'.$name->baseName.'.'.$name->extension)) {
                        $file_name = '_'.$date.'_'.$name->baseName. '.'. $name->extension;
                        $file_path = $base_url."/uploads/$controller/";
                        $item_id = (new \yii\db\Query())
                        ->from('tour_item')
                            ->max('id')+1;
                        Yii::$app->db->createCommand()->insert('tour_item_gallery', ['file_name'=>$file_name, 'file_path'=>$file_path, 'tour_item_id'=>$item_id])->execute();
                    }
                }
            }
                

            if($model->save()){
                
                Yii::$app->session->setFlash('success', "Saved successful");
                return $this->redirect('index.php?r=tour-item');

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
     * Updates an existing TourItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        Yii::$app->session->set('tour_item_id',$id);

        $model = $this->findModel($id);

        $model->updated_date =  date('Y-m-d H:i:s');
        $model->updated_by = Yii::$app->user->getId(); 
        
        $base_url = Yii::$app->request->baseUrl;
        $date = date('YmdHis');
        
        $model->updated_date =  date('Y-m-d H:i:s');
        $model->updated_by = Yii::$app->user->getId(); 
        if ($model->load(Yii::$app->request->post())) {
            $imageName = $model->name;
            if($model->file = UploadedFile::getInstance($model, 'file')) {
                $controller = Yii::$app->controller->id;
                $path = Yii::getAlias('@backend') . "/web/uploads/$controller";
                $path_image = $base_url . "/uploads/$controller";
                if (!is_dir($path)) {
                \yii\helpers\FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
                }
                $model->file->saveAs($path.'/'  .$model->file->baseName.'_'.$date.'.'.$model->file->extension);
                $model->feature_image = $path_image.'/'  .$model->file->baseName.'_'.$date. '.'.$model->file->extension;
            }
            // Upload Gallery
            if ($model->validate()) {

                $names = UploadedFile::getInstances($model, 'file_name');
                $controller = Yii::$app->controller->id;
                $base_url = Yii::$app->request->baseUrl;

                foreach ($names as $name) {
                    $path = Yii::getAlias('@backend') . "/web/uploads/$controller";
                    if ($name->saveAs($path.'/'.'_'.$date.'_'.$name->baseName.'.'.$name->extension)) {
                        $file_name = '_'.$date.'_'.$name->baseName. '.'. $name->extension;
                        $file_path = $base_url."/uploads/$controller/";
                        $item_id = $model->id;
                        Yii::$app->db->createCommand()->insert('tour_item_gallery', ['file_name'=>$file_name, 'file_path'=>$file_path, 'tour_item_id'=>$item_id])->execute();
                    }
                }
            }
            if($model->save()){
                
                Yii::$app->session->setFlash('success', "Saved successful");
                return $this->redirect('index.php?r=tour-item');

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

    /**
     * Deletes an existing TourItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionDeleteImage($id){
        $data = TourItemGallery::findOne($id);
        $data->delete();
        return $this->redirect(Yii::$app->request->referrer);
    }
    // public function actionRemove(){
    //     if(Yii::$app->request->isAjax){
    //         if(Yii::$app->request->post('action') == 'delete_image'){
    //             $id = Yii::$app->request->post('id');
    //             $query = \backend\models\TourItemGallery::find()->where(['id'=>$id]);
    //             Yii::$app->db->createCommand()->delete('tour_item_gallery', ['id'=>$id])->execute();
    //             $response = "";
    //             return json_encode($response);
    //         }

    //     }
    // }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TourItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TourItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TourItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
