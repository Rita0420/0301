<?php $order=$Orders->find(['no'=>$_GET['no']]);?>
<table>
    <tr>
        <td colspan="2">感謝您的訂購，您的訂單編號是：<?=$_GET['no'];?></td>
    </tr>
    <tr>
        <td>電影名稱：</td>
        <td><?=$order['movie'];?></td>
    </tr>
    <tr>
        <td>日期：</td>
        <td><?=$order['date'];?></td>
    </tr>
    <tr>
        <td>場次時間：</td>
        <td><?=$order['session'];?></td>
    </tr>
    <tr>
        <td colspan="2">
            座位：
            <?php 
            $seats=unserialize($order['seats']);
            sort($seats);
            foreach($seats as $seat):
            ?>
            <div><?=floor($seat/5)+1;?>排<?=($seat%5)+1;?>號</div>
            <?php endforeach;?>
            共<?=$order['tickets'];?>張電影票
        </td>
    </tr>
</table>
<div class="ct">
    <button onclick="location.href='index.php'">確認</button>
</div>