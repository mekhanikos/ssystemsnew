<?php

class SiteController extends Controller
{

    function init() {
        $this->updateCache();
    }

    private function updateCache() {
        if(Yii::app()->request->getParam('cache', 'true') === 'false')
            Yii::app()->setComponent('cache', new CDummyCache());
    }

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
            /*			'page'=>array(
				        'class'=>'CViewAction',
			),*/
		);
	}

 /*   public function accessRules()
    {
        return array(
            array('allow',  //действия которые запрещены
                'users'=>array('*'),//все остальные действия
            ),
        );
    }*/

    /**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layouts 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->renderPartial('error', $error);

		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

    public function actionProducts($id)
    {
        $prod = Products::model()->find("lang=:x AND alias=:alias", array(':x'=>Yii::app()->language,':alias'=>$id,));
        $subs = SubProducts::model()->findAll("product_id=:pr_id", array(':pr_id'=>$prod->id));

        if(!empty($subs))
            $items = Items::model()->findAll("subproduct_id=:pr_id", array(':pr_id'=>$subs[0]->id));

        if(!isset($items))
            $this->redirect(array("index"));

//        echo "<pre>";
//        print_r($items);
//        exit;

        $this->render('products',
            array('sub_products'=>$subs, 'items'=>$items));
    }



    public function actionFromWhere()
    {

        $objects = MapObjects::model()->findAll();

        $this->render("fromwhere", array("objects"=>$objects));
    }

    /*
     *  Single product action
     */
    public function actionSubItem($id)
    {

        $item = Items::model()->findByPk($id);

        $this->render("subItem",
            array("item"=>$item));
    }


    public function actionBlogs() {

        $criteria=new CDbCriteria();

        $criteria->condition = 'language=:lang ORDER BY date desc';
        $criteria->params = array(':lang'=>Yii::app()->language);

        $count=Blog::model()->count($criteria);
        $pages=new CPagination($count);

        $pages->pageSize=5;
        $pages->applyLimit($criteria);

        $blogs = Blog::model()->findAll($criteria);

       // if(empty($blogs))
        //    $this->redirect("index");

        $this->render("blogs", array('blogs'=>$blogs, 'pages' => $pages));
    }

    public function actionBlog($id) {

        $blog = Blog::model()->find("language=:x AND alias=:alias", array(':x'=>Yii::app()->language, ":alias"=>$id));


        if(empty($blog))
            $this->redirect(array("blogs"));

        //print_r($blog);

        $this->render("blog", array("blog"=>$blog));
    }

    public function actionAbout()
    {
        $this->render('about');
    }

    public function actionContacts()
    {
        $this->render("contacts");
    }

    public function actionSolutions()
    {
        $criteria=new CDbCriteria();

        $criteria->condition = 'lang=:lang';
        $criteria->params = array(':lang'=>Yii::app()->language);
        $solutions = Categories::model()->findAll($criteria);

        $criteria=new CDbCriteria();

        $criteria->condition = 'lang=:lang';
        $criteria->params = array(':lang'=>Yii::app()->language);

        $items = Yii::app()->db->createCommand()
            ->select('*')
            ->from('item_categries c')
            ->join('items i', 'c.item_id = i.id')
            ->where('cat_id=:id', array(':id'=>1))
            ->having('i.main=1 AND i.lang ="'.Yii::app()->language.'"')
            ->queryAll();

        $category = Categories::model()->findByPk(1);

        $this->render("solution", array('solutions'=>$solutions, 'items'=>$items, 'category'=>$category));
    }

    /*
     *   !!!   Region for ajax calls  !!!
     */

    public function actionGetItems() {

        $items = Items::model()->findAll("subproduct_id=:pr_id", array(':pr_id'=>$_POST['subid']));
        $this->renderPartial("_products", array('items'=>$items), false, true);
    }

    public function actionGetitemssbycat() {

        if(Yii::app()->request->isAjaxRequest) {
            $criteria=new CDbCriteria();

            $criteria->condition = 'lang=:lang';
            $criteria->params = array(':lang'=>Yii::app()->language);

            if($_POST['all'] == 0) {
                $items = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('item_categries c')
                    ->join('items i', 'c.item_id = i.id')
                    ->where('cat_id=:id', array(':id'=>$_POST['catid']))
                    ->having('i.main=1 AND i.lang ="'.Yii::app()->language.'"')
                    ->queryAll();
            }
            else {
                $items = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('item_categries c')
                    ->join('items i', 'c.item_id = i.id')
                    ->where('cat_id=:id', array(':id'=>$_POST['catid']))
                    ->having('i.lang ="'.Yii::app()->language.'"')
                    ->queryAll();
            }


            $category = Categories::model()->findByPk($_POST['catid']);

            $this->renderPartial("_solution", array('items'=>$items, 'category'=>$category), false, true);
        }
    }

    public function actionSendMail()
    {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $message = $_POST['message'];
        $mess = "<br/>Name: ".$_POST['name']."<br/>E mail: ".$_POST['email']."<br/>Subject: ".$_POST['message']."<br/>";
        $to = "hartuk18@gmail.com";
        $headers = "Content-Type: text/html; charset=utf-8\r\n";
        $headers .= "From:".$email."\r\n";

        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            mail($to, $name, $mess, $headers);
            echo Yii::t("language", "mail_success");
        }
        else {
            echo Yii::t("language", "mail_failure");
        }
    }




}