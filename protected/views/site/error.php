
<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
?>
<div class="container">
    <h2>Error <?php echo $code; ?></h2>

    <div class="error">
        <?php echo CHtml::encode($message); ?>
    </div>


    <div class="to_home">
        <a href="<?=Yii::app()->baseUrl ?>">Go to Home</a>
    </div>
</div>

