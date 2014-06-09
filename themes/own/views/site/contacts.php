<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/style3.css');

?>


<div class="mail">
    <div class="image1">
      <img src="<?=Yii::app()->baseUrl?>/css/images/6.png" width="15" height="23" />
      <input class="name" type="text" placeholder="Name" />
      <div class="clear"></div>
    </div>
    <div class="image2">
      <img src="<?=Yii::app()->baseUrl?>/css/images/7.png" width="28" height="23" />
      <input class="email" type="text" placeholder="E-mail" />
      <div class="clear"></div>
    </div>
    <div class="image3">
      <img src="<?=Yii::app()->baseUrl?>/css/images/8.png" width="42" height="199" />
      <textarea id="message" class="message" name="message" placeholder="Message" style="color:#4f4f4f;"></textarea>
      <div class="clear"></div>
    </div>
    <div class="image4">
      <img src="<?=Yii::app()->baseUrl?>/css/images/9.png" width="250" height="89" />
    </div>
  </div>
<div class="mail_text">
    <div style="color:#ec1651;margin-bottom:5px;">E-mail</div>
    <div style="color:#4f4f4f;">suninail@nail.com</div>
</div>
<a href="#"><div class="pink_text">Send</div></a>

<div class="black">
    <div class="message_text"></div>
</div>

<script>
    $(document).ready(function(){
        $(".pink_text").click(function(){

            $.ajax({
                type: 'POST',
                url: '<?=$this->createUrl("sendmail")?>',
                data: {name:$(".name").val(), email:$(".email").val(), message:$(".message").val()},
                // dataType: 'json',
                // context: document.body,
                //async: false,   //Send Synchronously
                success: function (resp) {
                    console.log(resp);
                    $(".message_text").html(resp);
                    $(".black").show();
                }
            });
        });

    });

</script>