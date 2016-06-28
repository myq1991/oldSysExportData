<?php

/* @var $this yii\web\View */

$this->title = '南宁市晶晶亮游泳池退款查询系统';
?>
<div class="row" style="text-align: center">
    <div class="col-xs-12 alert alert-danger">
        请选择会员退款查询或者学员退款查询功能,该系统仅为<b>南宁市晶晶亮游泳池</b>会员/学员信息退款提供<b>信息查询服务</b>,本系统数据为南宁市晶晶亮游泳池管理系统操作数据的镜像备份。
        <br>
        本着最大程度保障各位会员/学员的利益不受损害,本游泳池积极配合工商执法部门的工资,现提供<b><?= $this->title ?></b>方便各位进行信息的查询。
        <br>
        若对系统内提供数据的真实有效性有所疑问,可到南宁市西乡塘区工商局进行反馈查询。
        <br>
        (注:本系统<b>并不提供退款服务</b>)
    </div>
    <div class="col-xs-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <a class="btn-lg btn-warning refund-btn col-xs-12"
                   href="<?= Yii::$app->urlManager->createAbsoluteUrl(['/site/member']) ?>"><i
                        class="glyphicon glyphicon-credit-card entrance-icon quirk"></i>&nbsp;会员退款查询入口</a>
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <a class="btn-lg btn-info refund-btn col-xs-12"
                   href="<?= Yii::$app->urlManager->createAbsoluteUrl(['/site/trainee']) ?>"><i
                        class="glyphicon glyphicon-user entrance-icon"></i>&nbsp;游泳学员退款查询入口</a>
            </div>
        </div>
    </div>
</div>

<style>
    .refund-btn {
        cursor: pointer;
        padding-top: 100px;
        padding-bottom: 100px;
        font-size: 40px;
    }

    .refund-btn:hover {
        text-decoration: none;
    }

    .entrance-icon{
        vertical-align: text-top;
    }

    .quirk{
        font-size: 50px;
    }
</style>
