<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div class="poster">
            <div class="lists p-r d-f j-c" style="height: 70%;">
                <?php
                $posters = $Poster->all(['sh'=>1]," ORDER BY `rank` ");
                foreach ($posters as $key => $poster) {
                ?>
                <div class="poster_item p-a d-f f-w j-c ct" data-ani="<?=$poster['ani']?>">
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
    <div class="rb tab" style="width:95%;">
        <table>
            <tbody>
                <tr> </tr>
            </tbody>
        </table>
        <div class="ct"> </div>
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

        let ani = $(next).data('ani');

        // console.log(next);
        // console.log(ani);

        switch (ani) {
            case 1:
                $(now).fadeOut(2000,()=>{
                    $(next).fadeIn(2000)
                })
            break;
            case 2:
                $(now).slideDown(2000,()=>{
                    $(next).slideUp(2000)
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
        let setAni = setInterval(()=>{
        ani()
        },3000)
    })
</script>