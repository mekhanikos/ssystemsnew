<?php
/* @var $this BlogController */
/* @var $model Blog */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'blog-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>3, 'cols'=>100)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50, 'id'=>"contenttext")); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>
   <!-- <div class="row">
        <?php /*echo $form->labelEx($model,'date'); */?>
        <?php /*echo $form->textField($model,'date'); */?>
        <?php /*echo $form->error($model,'date'); */?>
    </div>-->

<?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name'=>'Blog[date]',
            'value' => date('d-m-Y',strtotime($model->date)),
            'options'=>array(
                'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                'showOn'=>'button', // 'focus', 'button', 'both'
                'dateFormat' => 'dd-mm-yy',
                'buttonText'=>Yii::t('language','select_from_calendars'),
            ),
            'htmlOptions'=>array(
                'style'=>'width:150px;vertical-align:top'
            ),
        ));
?>

<!--	<div class="row">
		<?php /*echo $form->labelEx($model,'img'); */?>
		<?php /*echo $form->textField($model,'img',array('size'=>60,'maxlength'=>100)); */?>
		<?php /*echo $form->error($model,'img'); */?>
	</div>-->

    <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
        array(
            'id'=>'uploadFile',
            'config'=>array(
                'action'=>Yii::app()->createUrl('/cms/blog/upload'),
                'allowedExtensions'=>array("jpg", "jpeg", "png"),//array("jpg","jpeg","gif","exe","mov" and etc...
                'sizeLimit'=>2*1024*1024,// maximum file size in bytes
                'minSizeLimit'=>0*1024*1024,// minimum file size in bytes
                'onComplete'=>"js:function(id, fileName, responseJSON){
                                                                $('#cropImg').load('". $this->createUrl('cropImg') ."?fileName='+responseJSON.filename);
                                                                $('#cropDialog').dialog('open');
                                                        }",
                'messages'=>array(
                    'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                    'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                    'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                    'emptyError'=>"{file} is empty, please select files again without it.",
                    'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                ),
                'showMessage'=>"js:function(message){ //console.log(message);
                }"
            )
        )); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textArea($model,'keywords',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>


    <div class="row">
        <?php echo $form->labelEx($model,'language'); ?>
       <!-- --><?php /*echo $form->textField($model,'language',array('size'=>15,'maxlength'=>15)); */?>
        <?php echo $form->dropDownList($model,'language',array('am' => 'Հայերեն', 'ru' => 'Русский', 'en'=>'English')); ?>
        <?php echo $form->error($model,'language'); ?>
    </div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

    <?php $this->widget('application.extensions.tinymce.SladekTinyMce'); ?>

    <script>
        tinymce.init({
            selector: "textarea#Contracts_contractName",
            menubar: false,
            width: 900,
            height: 300,
            toolbar1: "undo redo | bold | italic underline | alignleft aligncenter alignright alignjustify ",
            toolbar2: "outdent indent | hr | sub sup | bullist numlist | formatselect fontselect fontsizeselect | cut copy paste pastetext pasteword | search replace ",

        });
    </script>

    <script type="text/javascript">

        tinymce.init({
            selector: "textarea#contenttext",
            theme: "modern",
            width: 900,
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            content_css: "css/content.css",
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ]
        });
    </script>

<?php $this->endWidget(); ?>

</div><!-- form -->