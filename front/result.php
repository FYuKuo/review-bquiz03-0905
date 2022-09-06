<?php
$order = $Order->find(['no'=>$_GET['no']]);
$sets = unserialize($order['sets']);
sort($sets);
?>
<div class="grey0 w-50 aut p-10">
    <table class="w-100">
        <tr class="grey2">
        <td colspan="2">

            感謝您的訂購，您的訂單編號是：<?=$order['no']?>
        </td>    
    </tr>
        <tr class="grey3">
            <td class="w-20">
                電影名稱：
            </td>
            <td>
            <?=$Movie->find($order['movie'])['name']?>
            </td>
        </tr>
        <tr class="grey2">
            <td class="w-20">
                日期：
            </td>
            <td>
            <?=$order['date']?>
            </td>
        </tr>
        <tr class="grey3">
            <td class="w-20">
                場次時間：
            </td>
            <td>
            <?=$order['session']?>
            </td>
        </tr>
        <tr class="grey1">
        <td colspan="2">

           座位：
           <?php
           foreach ($sets as $key => $set) {
           ?>
           <div>
               <?=floor($set/5)+1?>排<?=floor($set%5)+1?>號

           </div>
           <?php
           }
           ?>
           
        </td>    
        <tr class="grey2 ct">
        <td colspan="2">

           <input type="button" value="確認" onclick="location.href='./index.php'">
        </td>    
    </tr>
    </table>
</div>