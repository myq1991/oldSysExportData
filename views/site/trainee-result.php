<?php

$this->title = '游泳学员退款信息查询结果';
?>

<?php if (count($result) > 0) { ?>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <div class="col-xs-12 alert alert-info">
                <i class="glyphicon glyphicon-ok-sign"></i>共查询到符合条件的游泳学员<?= count($result) ?>个
            </div>
            <table class="table table-hover">
                <tr>
                    <th>学员照片</th>
                    <th>学员卡号</th>
                    <th>学员姓名</th>
                    <th>联系电话</th>
                    <th>剩余次数</th>
                    <th>已用次数</th>
                    <th>卡类型</th>
                    <th>发卡日期</th>
                    <th>购买时价格</th>
                </tr>
                <?php foreach ($result as $item) { ?>
                    <tr>
                        <td>
                            <img class="portrait" src="<?= $item['portrait'] ?>">
                        </td>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['phone'] ?></td>
                        <td class="residue"><?= $item['residue'] ?>次</td>
                        <td><?= $item['used'] ?>次</td>
                        <td><?= $item['type'] ?></td>
                        <td><?= $item['issue'] ?></td>
                        <td><?= $item['fee'] ?>元</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
<?php } else { ?>
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3 alert alert-danger" style="text-align: center">
            <i class="glyphicon glyphicon-exclamation-sign"></i>系统内并未找到无符合条件的游泳学员信息
        </div>
    </div>
<?php } ?>
<style>
    th, td {
        text-align: center;
    }

    .portrait{
        width: 200px;
        height:auto;
    }

    .residue{
        color: #FF6666;
    }
</style>
