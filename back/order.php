<?php
$orders = $Order->all();
$movies = [];
foreach ($orders as $key => $order) {
    if(!in_array($order['movie'],$movies)){

        $movies[] = $order['movie'];
    }
    
}
?>
<div class="grey0 p-10">
    <div class="rb ct title">預告片清單</div>
    <div class="my-10">
        快速刪除：<input type="radio" name="fastDel" id="fastDel" value="date" checked>依日期<input type="text" name="date" id="date">
        <input type="radio" name="fastDel" id="fastDel" value="movie">依電影 
        <select name="movie" id="movie">
            <?php
            foreach ($movies as $key => $movie) {
            ?>
            <option value="<?=$movie?>"><?=$Movie->find($movie)['name']?></option>
            <?php
            }
            ?>
        </select>
        <input type="button" value="刪除" onclick="fastDel()">
    </div>
    <div class="d-f">
        <div class="w-15 grey1 ct" style="margin: 0 2px;">訂單編號</div>
        <div class="w-15 grey1 ct" style="margin: 0 2px;">電影名稱</div>
        <div class="w-15 grey1 ct" style="margin: 0 2px;">日期</div>
        <div class="w-15 grey1 ct" style="margin: 0 2px;">場次時間</div>
        <div class="w-15 grey1 ct" style="margin: 0 2px;">訂購數量</div>
        <div class="w-15 grey1 ct" style="margin: 0 2px;">訂購位置</div>
        <div class="w-15 grey1 ct" style="margin: 0 2px;">操作</div>
    </div>
    <div class="order_list over-aut my-10">
        <?php
    foreach ($orders as $key => $order) {
        $sets = unserialize($order['sets']);
        rsort($sets);
    ?>
        <div class="d-f order_item">
            <div class="w-15 ct" style="margin: 0 2px;"><?=$order['no']?></div>
            <div class="w-15 ct" style="margin: 0 2px;"><?=$Movie->find($order['movie'])['name']?></div>
            <div class="w-15 ct" style="margin: 0 2px;"><?=$order['date']?></div>
            <div class="w-15 ct" style="margin: 0 2px;"><?=$order['session']?></div>
            <div class="w-15 ct" style="margin: 0 2px;"><?=$order['qt']?></div>
            <div class="w-15 ct" style="margin: 0 2px;">
                <?php
           foreach ($sets as $key => $set) {
           ?>
                <div>
                    <?=floor($set/5)+1?>排<?=floor($set%5)+1?>號

                </div>
                <?php
           }
           ?>
            </div>
            <div class="w-15 ct" style="margin: 0 2px;"><input type="button" value="刪除" onclick="del(<?=$order['id']?>,'<?=$_GET['do']?>')"></div>

        </div>
        <?php
    }
    ?>
    </div>
</div>


<script>
    function fastDel(){

        let type = $('input[type=radio]:checked').val();
        let val;
        let text;
        
        switch (type) {
            case 'date':
                val = $('#date').val();
                text = $('#date').val();
            break;
            case 'movie':
                val = $('#movie').val();
                text = $('#movie').children('option:selected').text();
                
            break;
        }
        
        let anser = confirm(`您確定要刪除 ${text} 的所有資料?`);

        if(anser){
            $.post('./api/del_order.php',{type,val},()=>{
                location.reload();
            })

            // alert(val);
        }

    }
</script>