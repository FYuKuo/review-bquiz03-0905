<?php
include('./base.php');
$orders = $Order->all(['movie'=>$_GET['movie'],'date'=>$_GET['date'],'session'=>$_GET['session']]);
$set = [];
foreach ($orders as $key => $order) {
    $set = array_merge($set,unserialize($order['sets']));
}
?>

<div class="set_bg ">
    <div class="set_group d-f f-w">

    <?php
    for($i=0 ; $i < 20 ; $i++) {
    ?>
        <?php
        if(in_array($i,$set)){
        ?>
            <div class="set d-f f-w hasPeople" style="justify-content: flex-end;">
                <div class="w-100 ct">
                    <?=floor($i/5)+1?>排<?=floor($i%5)+1?>號
                </div>
            </div>
        <?php
        }else{
        ?>
        <div class="set d-f f-w" style="justify-content: flex-end;">
            <div class="w-100 ct">
                <?=floor($i/5)+1?>排<?=floor($i%5)+1?>號
            </div>
            <div style="align-self: end; ">
                <input type="checkbox" name="set[]" class="sets" value="<?=$i?>">
    
            </div>
        </div>
        <?php
        }
        ?>
    <?php
    }
    ?>
    </div>
</div>

<div class="grey2 ct">
    <div>您選擇的是：<?=$Movie->find($_GET['movie'])['name']?></div>
    <div>您選擇的是：<?=$_GET['date']?> <?=$_GET['session']?></div>
    <div>您已勾選 <span class="qt">0</span> 張票，最多可購買四張票</div>
    <div class="ct">
        <input type="button" value="上一步" onclick="$('.order,.book').toggle(),$('.book').html('')">
        <input type="button" value="訂購" onclick="checkOut()">
    </div>
</div>

<script>
    function checkOut(){
        console.log('123');
        let movie = '<?=$_GET['movie'];?>';
        let date = '<?=$_GET['date'];?>';
        let session = '<?=$_GET['session'];?>';
        let qt = setArr.length;

        $.post('./api/add_order.php',{movie,date,session,qt,sets:setArr},(no)=>{
            location.href=`?do=result&no=${no}`;
        })
    }
    
</script>