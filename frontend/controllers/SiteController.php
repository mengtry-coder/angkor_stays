<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
// use frontend\models\TourCategorySearch;
use frontend\models\User;
use backend\models\AccommodationProfile;
use backend\models\AccommodationType;
use backend\models\AboutUs;
use backend\models\Blog;
use backend\models\AccommodationGalleryImage;
use backend\models\AccommodationFacility;
use backend\models\AccommodationService;
use backend\models\AccommodationMeal;
use backend\models\AccommodationSport;
use backend\models\AccommodationTransportation;
use backend\models\AccommodationGalleryTitle;
use backend\models\Gallery;
use backend\models\Room;
use frontend\models\AccommodationProfileSearch;
use backend\models\Rate;
use backend\models\Reservation;
use backend\models\CompanyProfile;
use backend\models\RatePlan;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $accommodation_arr = AccommodationProfile::find()->where(['status'=>1])->all();
        $accommodation_list_arr = AccommodationProfile::find()->where(['status'=>1])->all();
        $accommodation_type = AccommodationType::find()->where(['status'=>1])->limit(3)->all();
        $blog_post = Blog::find()->where(['status'=>1])->limit(2)->all();
        $searchModel = new AccommodationProfileSearch();

        // $acc_promotion = Yii::$app->db->createCommand("SELECT *, 
        //     MAX(r.promotion) as promotion, 
        //     r.promotion_type as promotion_type,
        //     r.accommodation_id as acc_id 
        //     FROM accommodation_profile AS ap 
        //     LEFT JOIN rate AS r ON r.accommodation_id = ap.id
        //     WHERE r.promotion > 0 
        //     GROUP BY r.accommodation_id
        //     LIMIT 4
        //     ")->queryAll();
            $acc_promotion = Yii::$app->db->createCommand("select DISTINCT( p.accommodation_id), a.* from promotion p
            LEFT JOIN accommodation_profile a on p.accommodation_id = a.id
            where p.to_date >= CURDATE() 
            LIMIT 4
            ")->queryAll();
        return $this->render('index', [
            'accommodation_arr' => $accommodation_arr,
            'accommodation_list_arr' => $accommodation_list_arr,
            'blog_post' => $blog_post,
            'accommodation_type' => $accommodation_type,
            'searchModel' => $searchModel,
            'acc_promotion' => $acc_promotion,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionTour()
    {
        // $categories = \backend\models\TourCategory::find()->all();
        $tour_items = TourItem::find()->all();
        $tour_categories = \backend\models\TourCategory::find()->all();

        return $this->render('tour', [
            // 'categories' => $categories,
            'tour_items' => $tour_items,
            'tour_categories' => $tour_categories,
        ]);
    }

    public function actionTourItem($id)
    {
        $categories = \backend\models\TourCategory::find()->all();
        $tour_category = \backend\models\TourCategory::find()->where(['id'=>$id])->one();
        $tour_items = \backend\models\TourItem::find()->where(['category_id'=>$id])->all();
        return $this->render('tour_item', [
            'tour_items' => $tour_items,
            'tour_category' => $tour_category,
            'categories' => $categories,
        ]);
    }

    // public function actionBlog()
    // {
    //     $blogs = \backend\models\Blog::find()->all();
    //     $categories = \backend\models\TourCategory::find()->one();

    //     return $this->render('blog', [
    //         'blogs' => $blogs,
    //         'categories' => $categories,
    //     ]);
    // }

    // public function actionGallery()
    // {   
    //     $tour_item =\backend\models\TourItem::find()->all();

    //     $tour_item_id =\backend\models\TourItem::find()->one()->id;

    //     $img_tour_item = \backend\models\TourItemGallery::find()->where(['tour_item_id' => $tour_item_id ])->all();
    //     return $this->render('gallery',[
    //         'img_tour_item' => $img_tour_item,
    //         'tour_item' => $tour_item,

    //     ]);
    // }
    public function actionTestSubEmail()
    {
        return $this->render('test_sub_email');
    }
    public function actionTestEmailAdmin()
    {
        return $this->render('test_email_admin');
    }
    public function actionTestEmailClient()
    {
        return $this->render('test_email_client');
    }

    public function actionContact()
    {
        // $model = new ContactForm();
        // if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        //     if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
        //         Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
        //     } else {
        //         Yii::$app->session->setFlash('error', 'There was an error sending your message.');
        //     }

        //     return $this->refresh();
        // } else {
        $company_profile = \backend\models\CompanyProfile::find()->one();
            return $this->render('contact', [
                // 'model' => $model,
                'company_profile' => $company_profile,
            ]);
        //}
    }

    // public function actionAboutUs()
    // {
    //     $categories = \backend\models\TourCategory::find()->one();
    //     $about_us = \backend\models\AboutUs::find()->where(['status'=>1])->all();
    //     $chose_us = \backend\models\ChoseUs::find()->where(['status'=>1])->limit(6)->all();
    //         return $this->render('aboutus', [
    //             'about_us' => $about_us,
    //             'chose_us' => $chose_us,
    //             'categories' => $categories,
    //         ]);
    // }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
    public function actionAboutUs()
    {
        $model = AboutUs::find()->where(['status'=>1, 'short_description' => null])->all();
        $our_value = AboutUs::find()->where(['status'=>1, 'short_description'=>1])->all();
        return $this->render('about_us', [
            'model' => $model,
            'our_value' => $our_value,
        ]);
    }
    public function actionAccommodationType()
    {
        $accommodation_arr = AccommodationProfile::find()->where(['status'=>1])->all();
        $accommodation_count = AccommodationProfile::find()->where(['status'=>1])->count();
        return $this->render('accommodation_type', [
            'accommodation_arr' => $accommodation_arr,
            'accommodation_count' => $accommodation_count,
        ]);
    }
    public function actionNews()
    {
        $news = new Blog();
        $news = Blog::find()->where(['status' => 1])->limit(9)->all();

        return $this->render('news', [
            'news' => $news,
        ]);
    }
    public function actionGallery()
    {
        $gallery = Gallery::find()->where(['status' => 1])->all();
        
        return $this->render('gallery',[
            'gallery' => $gallery,
        ]);
    }
    public function actionContactUs()
    {
        return $this->render('contact_us');
    }

// Send Email Contact Us 
    public function actionSendEmailContactUs(){

        $info_email = \backend\models\CompanyProfile::find()->one()->general_email;
        $admin_email = User::find()->where(['id'=>1])->one()->email;
        $this->layout = 'inner';
        $this->view->title = 'Mail Send';
        if (Yii::$app->request->isPost) {
            $name = Yii::$app->request->post('name');
            $email = Yii::$app->request->post('email');
            $phone = Yii::$app->request->post('phone');
            $subject = Yii::$app->request->post('subject');
            $message = Yii::$app->request->post('message');

            $body_contact_admin = '
            <div>
                <div>
                    <div style="color:#222;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:19px;margin:0;min-width:100%;padding:0;text-align:left;width:100%!important">
                
                        <table bgcolor="#FFFFFF" style="border-collapse:collapse;border-spacing:0;color:#222;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;height:100%;line-height:19px;margin:0;padding:0;text-align:left;vertical-align:top;width:100%">
                            <tbody>
                                <tr style="padding:0;text-align:left;vertical-align:top">
                                    <td align="center" style="border-collapse:collapse!important;color:#222;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:19px;margin:0;padding:0;text-align:center;vertical-align:top;word-break:break-word">
                                        <table bgcolor="#FFFFFF" style="border-collapse:collapse;border-spacing:0;margin:0 auto;padding:0;text-align:inherit;vertical-align:top;width:580px">
                                            <tbody>
                                                <tr>
                                                    <td height="16" style="height:16px"></td>
                                                </tr>
                                                <tr style="padding:0;text-align:left;vertical-align:top">
                                                    <td align="left" style="border-collapse:collapse!important;color:#222;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:19px;margin:0;padding:0;text-align:left;vertical-align:top;width:100%;word-break:break-word">
                                                        <img align="left" height="56" src="'.CompanyProfile::findOne(1)->feature_image.'" style="clear:both;display:inline;float:none;height:70px!important;max-width:100%;outline:none;text-decoration:none;width:auto" >
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="32" style="height:32px"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table style="border-collapse:collapse;border-spacing:0;margin:0 auto;padding:0;text-align:inherit;vertical-align:top;width:580px">
                                            <tbody>
                                                <tr style="padding:0;text-align:left;vertical-align:top">
                                                    <td style="border-collapse: collapse!important; color: #1a2b49; font-family: GT Eesti,Arial,sans-serif; font-size: 28px!important; font-weight: 500!important; line-height: 42px!important; margin: 0; padding: 0; text-align: center; vertical-align: top; word-break: break-word;">Guest Information</td></tr><tr><td height="16" style="height:16px">
                                                    </td>
                                                </tr>
                                                <tr style="padding:0;text-align:left;vertical-align:top">
                                                    <td style="border-collapse: collapse!important; color: #1a2b49; font-family: GT Eesti,Arial,sans-serif; font-size: 16px!important; font-weight: 400!important; line-height: 24px!important; margin: 0; padding: 0; text-align: left; vertical-align: top; word-break: break-word;">
                                                        <br>Name : '.$name.'
                                                        <br>Email : '.$email.'
                                                        <br>Phone : '.$phone.'
                                                        <br>Subject : '.$subject.'
                                                        <br>Comment : '.$message.'
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="32" style="height:32px"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <hr>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            ';
            $body_contact_client = '
            <div>
                <div>
                    <div style="color:#222;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:19px;margin:0;min-width:100%;padding:0;text-align:left;width:100%!important">
                
                        <table bgcolor="#FFFFFF" style="border-collapse:collapse;border-spacing:0;color:#222;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;height:100%;line-height:19px;margin:0;padding:0;text-align:left;vertical-align:top;width:100%">
                            <tbody>
                                <tr style="padding:0;text-align:left;vertical-align:top">
                                    <td align="center" style="border-collapse:collapse!important;color:#222;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:19px;margin:0;padding:0;text-align:center;vertical-align:top;word-break:break-word">
                                        <table bgcolor="#FFFFFF" style="border-collapse:collapse;border-spacing:0;margin:0 auto;padding:0;text-align:inherit;vertical-align:top;width:580px">
                                            <tbody>
                                                <tr>
                                                    <td height="16" style="height:16px"></td>
                                                </tr>
                                                <tr style="padding:0;text-align:left;vertical-align:top">
                                                    <td align="left" style="border-collapse:collapse!important;color:#222;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:19px;margin:0;padding:0;text-align:left;vertical-align:top;width:100%;word-break:break-word">
                                                        <img align="left" height="56" src="'.CompanyProfile::findOne(1)->feature_image.'" style="clear:both;display:inline;float:none;height:70px!important;max-width:100%;outline:none;text-decoration:none;width:auto" >
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="32" style="height:32px"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table style="border-collapse:collapse;border-spacing:0;margin:0 auto;padding:0;text-align:inherit;vertical-align:top;width:580px">
                                            <tbody>
                                                <tr style="padding:0;text-align:left;vertical-align:top">
                                                    <td style="border-collapse: collapse!important; color: #1a2b49; font-family: GT Eesti,Arial,sans-serif; font-size: 28px!important; font-weight: 500!important; line-height: 42px!important; margin: 0; padding: 0; text-align: center; vertical-align: top; word-break: break-word;">Thank you for your email, Our teams will contact you back.</td></tr><tr><td height="16" style="height:16px">
                                                    </td>
                                                </tr>
                                                <tr style="padding:0;text-align:left;vertical-align:top">
                                                    <td style="border-collapse: collapse!important; color: #1a2b49; font-family: GT Eesti,Arial,sans-serif; font-size: 16px!important; font-weight: 400!important; line-height: 24px!important; margin: 0; padding: 0; text-align: center; vertical-align: top; word-break: break-word;">Our Support<br>
                                                        <br>Email: '.$info_email.'
                                                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$admin_email.'
                                                        <br>Visit Us: '.CompanyProfile::findOne(1)->website_url.'
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="32" style="height:32px"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            ';

            //To Admin
            Yii::$app->mailer->compose()
            ->setFrom($email)
            ->setTo($admin_email)
            ->setSubject($subject)
            ->setHtmlBody($body_contact_admin)
            ->send();



            // //To Client
            Yii::$app->mailer->compose()
            ->setFrom($admin_email)
            ->setTo($email)
            ->setSubject($subject)
            ->setHtmlBody($body_contact_client)
            ->send();

            Yii::$app->session->setFlash('success', 'Message sent successfully');
            return $this->redirect(Yii::$app->request->referrer);
        }
    }
//End Send Email

    public function actionSinglePost($id)
    {
        $model = Blog::find()->where(['id'=>$id])->one();

        return $this->render('single_post', [
            'model' => $model,
        ]);
    }
    public function actionPrivacy()
    {

        return $this->render('privacy');
    }
    public function actionTermCondition()
    {

        return $this->render('term_condition');
    }
    public function actionSingleAccType($id, $f_from_date, $f_to_date, $guest)
    {
        $model = AccommodationProfile::findOne($id);
        $accommodation_list_arr = AccommodationProfile::find()->where(['status'=>1])->limit(4)->all();
        
        $gallery_image = AccommodationGalleryImage::find()->where(['accommodation_id' => $id])->limit(4)->all();
        $facility_arr = AccommodationFacility::find()->where(['accommodation_id'=>$id])->all();
        $service_arr = AccommodationService::find()->where(['accommodation_id'=>$id])->all();
        $sport_arr = AccommodationSport::find()->where(['accommodation_id'=>$id])->all();
        $transportation_arr = AccommodationTransportation::find()->where(['accommodation_id'=>$id])->all();
        $meal_arr = AccommodationMeal::find()->where(['accommodation_id'=>$id])->all();

        $gallery_title = AccommodationGalleryTitle::find()->where(['accommodation_id' => $id])->all();
        $room = Room::find()->where(['accommodation_id' => $id])->all();
        $model_reservation = new Reservation();
        $rate_plan_arr = RatePlan::find()->where(['accommodation_id' => $id])->all();

        return $this->render('single_acc_type', [
            'model' => $model,
            'id' => $id,
            'model_reservation' => $model_reservation,
            'gallery_image' => $gallery_image,
            'facility_arr' => $facility_arr,
            'service_arr' => $service_arr,
            'sport_arr' => $sport_arr,
            'transportation_arr' => $transportation_arr,
            'meal_arr' => $meal_arr,
            'accommodation_list_arr' => $accommodation_list_arr,
            'gallery_title' => $gallery_title,
            'room' => $room,
            'f_from_date' => $f_from_date,
            'f_to_date' => $f_to_date,
            'guest' => $guest,
            'rate_plan_arr' => $rate_plan_arr,
            
        ]);
    }

}