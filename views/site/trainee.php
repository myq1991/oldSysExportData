<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '游泳学员退款查询';
?>
<div class="row">
    <div class="col-xs-2"></div>
    <div class="col-xs-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <form method="post" action="<?= Yii::$app->urlManager->createAbsoluteUrl(['/site/trainee-result']) ?>">
                    <h3 class="control-label" style="text-align: center">请输入游泳学员信息进行查询</h3>
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                    <input minlength="5" maxlength="11" name="input" class="form-control"
                           placeholder="请输入学员卡号后5位/学员登记手机号" required>
                    <br>
                    <div class="col-xs-6 col-xs-offset-3" style="text-align: center">
                        <button class="btn btn-primary">查询会员退款信息</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xs-2"></div>
</div>
