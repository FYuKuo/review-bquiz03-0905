function rank(id,chId,table){
    $.post('./api/rank.php',{id,chId,table},()=>{
        location.reload();
        // console.log(res);
    })
}

function sh(id,sh,table){
    $.post('./api/sh.php',{id,sh,table},()=>{
        location.reload();
        // console.log(res);
    })
}

function del(id,table){
    $.post('./api/del.php',{id,table},()=>{
        location.reload();
        // console.log(res);
    })
}

