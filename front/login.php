<?php
if(isset($_SESSION['admin'])){
    to('./back.php');
}
?>
<div class="rb title ct">登入管理</div>

<table class="aut my-10">
    <tr>
        <td>帳號：</td>
        <td>
            <input type="text" name="acc" id="acc">
        </td>
    </tr>
    <tr>
        <td>密碼：</td>
        <td>
            <input type="password" name="pw" id="pw">
        </td>
    </tr>
</table>
<div class="ct">
    <input type="button" value="登入" onclick="login()">
    <input type="button" value="重置" onclick="reset()">
</div>

<script>
    function login(){
        let acc = $('#acc').val();
        let pw = $('#pw').val();

        $.get('./api/login.php',{acc,pw},(res)=>{
            if(parseInt(res) == 1){
                location.href='./back.php';
            }else{
                alert('帳號或密碼錯誤');
                reset()
            }
        })
    }

    function reset(){
        $('input[type=text],input[type=password]').val('');
    }
</script>