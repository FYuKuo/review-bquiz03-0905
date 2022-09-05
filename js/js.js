function rank(id,chId,table){
    $.post('./api/rank.php',{id,chId,table},()=>{
        location.reload();
        // console.log(res);
    })
}