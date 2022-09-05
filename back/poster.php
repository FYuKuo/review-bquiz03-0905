<div class="grey0 p-10">
    <div class="rb ct title">預告片清單</div>
    <div class=" d-f ct my-10">
        <div class="w-25 grey1 mx-5">預告片海報</div>
        <div class="w-25 grey1 mx-5">預告片片名</div>
        <div class="w-25 grey1 mx-5">預告片順序</div>
        <div class="w-25 grey1 mx-5">操作</div>
    </div>

    <form action="./api/edit_poster.php" method="post" >
        <div class="poster_list over-aut">
            <?php
            $rows = $Poster->all(" ORDER BY `rank` ");
            foreach ($rows as $key => $row) {
                $pre = ($rows[$key-1]['id'])??$row['id'];
                $next = ($rows[$key+1]['id'])??$row['id'];
            ?>
            <div class="white ct d-f my-10 p-10 a-c">
            <div class="w-25 mx-5">
                <img src="./upload/<?=$row['img']?>" alt="" style="height: 80px;">
            </div>
            <div class="w-25 mx-5">
                <input type="text" name="name[]" id="name" value="<?=$row['name']?>">
            </div>
            <div class="w-25 mx-5">
                <input type="button" value="往上" onclick="rank(<?=$row['id']?>,<?=$pre?>,'<?=$_GET['do']?>')">
                <input type="button" value="往下" onclick="rank(<?=$row['id']?>,<?=$next?>,'<?=$_GET['do']?>')">
            </div>
            <div class="w-25 mx-5">
                <input type="checkbox" name="sh[]" value="<?=$row['id']?>" <?=($row['sh'] == 1)?'checked':''?>>顯示
                <input type="checkbox" name="del[]" value="<?=$row['id']?>">刪除
                <select name="ani[]" id="ani">
                    <option value="1" <?=($row['ani'] == 1)?'selected':''?>>淡入淡出</option>
                    <option value="2" <?=($row['ani'] == 2)?'selected':''?>>滑入滑出</option>
                    <option value="3" <?=($row['ani'] == 3)?'selected':''?>>縮放</option>
                </select>
            </div>
            <input type="hidden" name="id[]" value="<?=$row['id']?>">
            </div>
            <?php
            }
            ?>
        </div>
        <div class="ct">
            <input type="submit" value="編輯確定">
            <input type="reset" value="重置">
        </div>
    </form>
</div>
<hr>
<div class="grey0 p-10">
    <div class="rb ct title">預告片清單</div>

    <form action="./api/add_poster.php" method="post" enctype="multipart/form-data">
    <div class=" d-f ct my-10">
        <div class="w-50">
            預告片海報：<input type="file" name="img" id="img">
        </div>
        <div class="w-50">
            預告片片名：<input type="text" name="name" id="name">
        </div>
    </div>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
    </form>

</div>