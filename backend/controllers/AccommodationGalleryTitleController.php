<?php

namespace backend\controllers;

use Yii;
use backend\models\AccommodationGalleryTitle;
use backend\models\CompanyProfile;
use backend\models\AccommodationGalleryTitleSearch;
use backend\models\AccommodationGalleryImage;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Cookie;
use yii\web\UploadedFile;

/**
 * AccommodationGalleryTitleController implements the CRUD actions for AccommodationGalleryTitle model.
 */
class AccommodationGalleryTitleController extends Controller
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
     * Lists all AccommodationGalleryTitle models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $this -> layout = 'accommodationLayout';
        $current_page = Yii::$app->controller->id."-index";
        $this->view->params['current_page'] = $current_page;
        
        $searchModel = new AccommodationGalleryTitleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['accommodation_id' => $id]);


        
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
            'id' => $id,
        ]);
    }

    /**
     * Displays a single AccommodationGalleryTitle model.
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
     * Creates a new AccommodationGalleryTitle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $this -> layout = 'blankLayout';
        
        $model = new AccommodationGalleryTitle();
        $base_url = Yii::$app->request->baseUrl;
        $date = date('YmdHis');

        if ($model->load(Yii::$app->request->post())) 
        {
            $model->created_date =  date('Y-m-d H:i:s');
            $model->created_by = Yii::$app->user->getId();
            $model->accommodation_id = $id;

            if ($model->save()) {
                // Upload Gallery
            if ($model->validate()) {
                $names = UploadedFile::getInstances($model, 'file_name');
                $controller = Yii::$app->controller->id;
                $base_url = Yii::$app->request->baseUrl;

                foreach ($names as $name) {
                    $path = Yii::getAlias('@backend') . "/web/uploads/$controller";

                    if ($name->saveAs($path.'/'.'_'.$date.'_'.$name->baseName.'.'.$name->extension)) {
                        $accommodation_id = $model->accommodation_id;

                        $file_name = '_'.$date.'_'.$name->baseName. '.'. $name->extension;
                        $file_path = $base_url."/uploads/$controller/";
                        $accommodation_gallery_image_id = (new \yii\db\Query())
                        ->from('accommodation_gallery_title')
                            ->max('id')+1;
                        Yii::$app->db->createCommand()->insert('accommodation_gallery_image', ['file_name'=>$file_name, 'file_path'=>$file_path, 'accommodation_title_id'=>$model->id, 'accommodation_id' => $accommodation_id])->execute();
                    }
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
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AccommodationGalleryTitle model.
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
        
        $base_url = Yii::$app->request->baseUrl;
        $date = date('YmdHis');
        $company_name = CompanyProfile::find()->where(['id' => $_SESSION['company_id']])->one()->name; 
        $company_name = str_replace(' ', '_', strtolower($company_name));
        $model->updated_date =  date('Y-m-d H:i:s');
        $model->updated_by = Yii::$app->user->getId(); 
        if ($model->load(Yii::$app->request->post())) {
            $imageName = $model->name;
            if($model->file = UploadedFile::getInstance($model, 'file')) {
                $controller = Yii::$app->controller->id;
                $path = Yii::getAlias('@backend') . "/web/uploads/$company_name/$controller";
                $path_image = $base_url . "/uploads/$company_name/$controller";
                if (!is_dir($path)) {
                \yii\helpers\FileHelper::createDirectory($path, $mode = 0755, $recursive = true);
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
                        $accommodation_id = $model->accommodation_id;

                        $file_name = '_'.$date.'_'.$name->baseName. '.'. $name->extension;
                        $file_path = $base_url."/uploads/$controller/";
                        $accommodation_gallery_image_id = (new \yii\db\Query())
                        ->from('accommodation_gallery_title')
                            ->max('id')+1;
                        Yii::$app->db->createCommand()->insert('accommodation_gallery_image', ['file_name'=>$file_name, 'file_path'=>$file_path, 'accommodation_title_id'=>$model->id, 'accommodation_id' => $accommodation_id])->execute();
                    }
                }
            }
            if($model->save()){
                
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
     * Deletes an existing AccommodationGalleryTitle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $deleteall = AccommodationGalleryImage::find()->where(['accommodation_title_id'=>$id])->all();
        foreach($deleteall as $delete)
        {
            $delete->delete();
        }
        $this->findModel($id)->delete();

        // return $this->redirect(['index']);
        return $this->redirect(Yii::$app->request->referrer);
        
    }

    /**
     * Finds the AccommodationGalleryTitle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AccommodationGalleryTitle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AccommodationGalleryTitle::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
