<?php

class ItemsController extends SecureController
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),

			array('allow', // allow authenticated user to perform 'create' and 'update' action
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $cat = Categories::model()->findAll();

		$this->render('view',array(
			'model'=>$this->loadModel($id), 'cat'=>$cat,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Items;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

        $subproducts = SubProducts::model()->findAll();

		if(isset($_POST['Items']))
		{
			$model->attributes=$_POST['Items'];
           // $model->main = $_POST['Items']['main'];

            if(  $model->save())
            {
                if(file_exists($_SERVER['DOCUMENT_ROOT'] .Yii::app()->baseUrl . '/images/items/cropped.png'))
                {

                    Yii::app()->ih->load($_SERVER['DOCUMENT_ROOT'] .Yii::app()->baseUrl . '/images/items/cropped.png')
                        ->save($_SERVER['DOCUMENT_ROOT'] .Yii::app()->baseUrl . '/images/items/' . $model->id . '.png');

                    unlink($_SERVER['DOCUMENT_ROOT'] .Yii::app()->baseUrl . '/images/items/cropped.png' );

                    $model->image = 1;

                    if($model->save())
                        $this->redirect(array('view','id'=>$model->id));
                }
                $this->redirect(array('view','id'=>$model->id));
            }

		}

		$this->render('create',array(
			'model'=>$model, 'subproducts'=>$subproducts,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $subproducts = SubProducts::model()->findAll();
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Items']))
		{
			$model->attributes=$_POST['Items'];
           // $model->main = $_POST['Items']['main'];

            if(  $model->save())
            {
                if(file_exists($_SERVER['DOCUMENT_ROOT'] .Yii::app()->baseUrl . '/images/items/cropped.png'))
                {

                    Yii::app()->ih->load($_SERVER['DOCUMENT_ROOT'] .Yii::app()->baseUrl . '/images/items/cropped.png')
                        ->save($_SERVER['DOCUMENT_ROOT'] .Yii::app()->baseUrl . '/images/items/' . $model->id . '.png');

                    unlink($_SERVER['DOCUMENT_ROOT'] .Yii::app()->baseUrl . '/images/items/cropped.png' );

                    $model->image = 1;

                    if($model->save())
                        $this->redirect(array('view','id'=>$model->id));
                }
                $this->redirect(array('view','id'=>$model->id));
            }
		}

		$this->render('update',array(
			'model'=>$model,
            'subproducts'=>$subproducts,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

        if(file_exists($_SERVER['DOCUMENT_ROOT'] .Yii::app()->baseUrl . '/images/items/' . $id . '.png'))
        {
            unlink($_SERVER['DOCUMENT_ROOT'] .Yii::app()->baseUrl . '/images/items/' . $id . '.png');
        }

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Items');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Items('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Items']))
			$model->attributes=$_GET['Items'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


    public function  actionCatresolve() {

        if(Yii::app()->request->isAjaxRequest) {
            $cat_id = $_POST['catid'];
            $item_id = $_POST['id'];
            $checked = $_POST['checked'];

            print_r($_POST);
            if($checked == 1) {
                $itemCatModel = new Itemcategries();
                $itemCatModel->cat_id = $cat_id;
                $itemCatModel->item_id = $item_id;
                $itemCatModel->save();
            }
            else {
                $itemCatModel = Itemcategries::model()->findByPk(array('cat_id' => $cat_id, 'item_id' => $item_id));
                $itemCatModel->delete();
            }
        }

    }

    public function actionUpload()
    {
        Yii::import("ext.EAjaxUpload.qqFileUploader");
        $folder= 'images/up/';// folder for uploaded files
        $allowedExtensions = array("jpg", "jpeg", "png");//array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 2 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        $fileName=$result['filename'];//GETTING FILE NAME

        echo $return;// it's array        Yii::app()->end();
    }

    public function actionCropImg()
    {
        Yii::app()->clientScript->scriptMap=array(
            (YII_DEBUG ?  'jquery.js':'jquery.min.js')=>false,
        );
        $imageUrl = Yii::app()->request->baseUrl . '/images/up/'. $_GET['fileName'];
        $this->renderPartial('cropImg', array('imageUrl'=>$imageUrl), false, true);
    }

    public function actionAjaxcrop()
    {
        if(Yii::app()->request->isAjaxRequest)
        {
            Yii::import('ext.jcrop.EJCropper');
            $jcropper = new EJCropper();
            $jcropper->thumbPath = '/images/items';

            // some settings ...
            $jcropper->jpeg_quality = 100;
            $jcropper->png_compression = 0;

            // get the image cropping coordinates (or implement your own method)
            $coords = $jcropper->getCoordsFromPost('imageId');

            Yii::app()->ih
                ->load($_SERVER['DOCUMENT_ROOT'] .Yii::app()->baseUrl . '/images/up/uploaded.png')
                ->crop($coords['w'],$coords['h'],$coords['x'],$coords['y'])
                ->save($_SERVER['DOCUMENT_ROOT'] .Yii::app()->baseUrl . '/images/items/cropped.png');

            // returns the path of the cropped image, source must be an absolute path.
            //$thumbnail = $jcropper->crop('images/up/uploaded.png', $coords);
        }

    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Items the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Items::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Items $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='items-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
