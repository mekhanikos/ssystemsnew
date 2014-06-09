<?php

Yii::import("ext.EAjaxUpload.qqFileUploader");

class EAjaxUploadAction extends CAction
{

        public function run()
        {
                // list of valid extensions, ex. array("jpeg", "xml", "bmp")
                $allowedExtensions = array("jpg", "jpeg", "png");
                // max file size in bytes
                $sizeLimit = 2 * 1024 * 1024;


                $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
                $result = $uploader->handleUpload(Yii::app()->request->baseUrl."/images/up/");
                // to pass data through iframe you will need to encode all html tags
                $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
                echo $result;
        }
}
