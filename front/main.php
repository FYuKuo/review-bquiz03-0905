<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div class="poster">
            <div class="lists p-r d-f j-c" style="height: 70%;">
                <?php
                $posters = $Poster->all(['sh'=>1]," ORDER BY `rank` ");
                foreach ($posters as $key => $poster) {
                ?>
                <div class="poster_item p-a d-f f-w j-c ct" data-ani="<?=$poster['ani']?>" data-id="<?=$poster['id']?>">
                    <img src="./upload/<?=$poster['img']?>" alt="" style="height: 250px;">
                    <div class="w-100">
                        <?=$poster['name']?>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="controls d-f a-c" style="height: 30%;">
                <div class="preBtn" onclick="move('left')"></div>
                <div class="controls_item p-r d-f a-c">
                    <div class="p-a controls_nav d-f a-c">
                        <?php
                        foreach ($posters as $key => $poster) {
                        ?>
                        <div class="img_item" style="height: 80px;" onclick="ani(<?=$key?>)">
                            <img src="./upload/<?=$poster['img']?>" alt="" style="height: 80px;">
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="nextBtn" onclick="move('right')"></div>
            </div>
        </div>
    </div>
</div>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab d-f a-c f-w j-c" style="width:95%;">
        <?php
        $nowDate =date('Y-m-d');
        $startDate =date('Y-m-d',strtotime('-2 days'));
        $num = $Movie->math('COUNT','id'," WHERE `sh` = 1 AND `date` BETWEEN '$startDate' AND '$nowDate'");
        $limit = 4;
        $pages = ceil($num/$limit);
        $page = ($_GET['page'])??1;
        if($page <= 0 || $page > $pages){
            $page = 1;
        }
        $start = ($page-1)*$limit;
        $movies = $Movie->all(" WHERE `sh` = 1 AND `date` BETWEEN '$startDate' AND '$nowDate' ORDER BY `rank` Limit $start,$limit");
        foreach ($movies as $key => $movie) {
            switch ($movie['type']) {
                case 1:
                    $type = '普遍級';
                break;
                case 2:
                    $type = '保護級';
                break;
                case 3:
                    $type = '輔導級';
                break;
                case 4:
                    $type = '限制級';
                break;
                
            }
        ?>
            <div class="d-f a-c f-w w-50 my-10">
                <div class="w-40 d-f a-c">
                    <img src="./upload/<?=$movie['img']?>" alt="" style="height: 80px;">
                </div>
                <div class="w-60" style="font-size: 12px;">
                    <div><?=$movie['name']?></div>
                    <div>分級:<img src="./icon/03C0<?= $movie['type'] ?>.png" alt="" style="width: 20px;"><?=$type?></div>
                    <div>上映日期：<?=$movie['date']?></div>
                </div>
                <div class="w-100 ct my-10">
                    <input type="button" value="劇情簡介" onclick="location.href='?do=intro&id=<?=$movie['id']?>'">
                    <input type="button" value="線上訂票" onclick="location.href='?do=order&id=<?=$movie['id']?>'">
                </div>
            </div>
        <?php
        }
        ?>
        

        <div class="ct page">
            <?php
            if($page > 1){
            ?>
            <a href="?page=<?=$page-1?>">&lt;</a>
            <?php
            }
            for ($i=1; $i <= $pages ; $i++) { 
            ?>
            <a href="?page=<?=$i?>" class="<?=($page == $i)?'nowPage':''?>"><?=$i?></a>
            <?php
            }
            if($page < $pages){
            ?>
            <a href="?page=<?=$page+1?>">&gt;</a>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<script>
    $('.poster_item').eq(0).show();

    let setAni = setInterval(()=>{
        ani()
    },3000)

    function ani(num){
        let now = $('.poster_item:visible');
        let next;
        if(num == undefined){

            if($(now).next().length == 0){
                next = $('.poster_item').eq(0);
            }else{
                next = $(now).next();
            }

        }else{
            next = $('.poster_item').eq(num);
        }

        let ani = next.data('ani');

        // console.log($(next).data('id'));
        // console.log(ani);

        switch (ani) {
            case 1:
                $(now).fadeOut(2000,()=>{
                    $(next).fadeIn(2000)
                })
            break;
            case 2:
                $(now).slideUp(2000,()=>{
                    $(next).slideDown(2000)
                })
            break;
            case 3:
                $(now).hide(2000,()=>{
                    $(next).show(2000)
                })
            break;
        

        }
    }

    let page = 0;

    function move(type){
        let nowLeft = $('.controls_nav').css('left').split('px')[0];
        let move;
        let num = <?=count($posters);?>;
        let limit = 4;
        let pages = parseInt(num)-parseInt(limit);

        switch (type) {
            case 'left':
                if(page >= 0 && page < pages){
                    page++
                    move = parseInt(nowLeft)-86;
                }
            break;

            case 'right':
                if(page > 0 ){
                    page--
                    move = parseInt(nowLeft)+86;
                }
            break;
    
        }

        // console.log(nowLeft);

        $('.controls_nav').animate({left:move});
    }

    $('.img_item').hover(function(){
        clearInterval(setAni);
    },function(){
        setAni = setInterval(()=>{
        ani()
        },3000)
    })
</script>