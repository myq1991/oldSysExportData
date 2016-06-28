<?php

$this->title = '会员退款信息查询结果';
?>

<?php if (count($result) > 0) { ?>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <div class="col-xs-12 alert alert-info">
                <i class="glyphicon glyphicon-ok-sign"></i>共查询到符合条件的会员<?=count($result)?>个
            </div>
            <table class="table table-hover">
                <tr>
                    <th>卡号</th>
                    <th>姓名</th>
                    <th>电话</th>
                    <th>余额</th>
                    <th>卡类型</th>
                    <th>发卡日期</th>
                    <th>最后使用日期</th>
                </tr>
                <?php foreach ($result as $item) { ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['phone'] ?></td>
                        <td class="balance"><?= $item['balance'] ?>元</td>
                        <td><?= $item['type'] ?></td>
                        <td><?= $item['issue'] ?></td>
                        <td><?= isset($item['last']) ? $item['last'] : '两年或更久以前' ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
<?php } else { ?>
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3 alert alert-danger" style="text-align: center">
            <i class="glyphicon glyphicon-exclamation-sign"></i>系统内并未找到无符合条件的会员信息
        </div>
    </div>
<?php } ?>
<style>
    th, td {
        text-align: center;
    }

    .balance{
        color: #FF6666;
    }
</style>
