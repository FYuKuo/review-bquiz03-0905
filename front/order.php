<div class="rb ct title">線上訂票</div>

<div class="order">
    <div class="grey0 aut w-50 p-10 ct">
        <table class="w-100 p-5">
            <tr class="grey2">
                <td class="w-30">電影：</td>
                <td><select name="movie" id="movie" style="width: 98%;"></select></td>
            </tr>
            <tr class="grey3">
                <td class="w-30">日期：</td>
                <td><select name="date" id="date" style="width: 98%;"></select></td>
            </tr>
            <tr class="grey2">
                <td class="w-30">場次：</td>
                <td><select name="session" id="session" style="width: 98%;"></select></td>
            </tr>
            <tr class="grey3">
                <td colspan="2">
                    <input type="button" value="確定" onclick="book()">
                    <input type="button" value="重置" onclick="">
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="book">
    123
</div>

<script>
    getMovie();

    function getMovie(){
        $.get('./api/get_movie.php',(res)=>{
            $('#movie').html(res);
            let movie = $('#movie').val();
            getDate(movie)
        })
    }

    function getDate(movie){
        $.get('./api/get_date.php',{movie},(res)=>{
            $('#date').html(res);
            // console.log(res);
            let date = $('#date').val();

            getSession(movie,date)
        })
    }

    function getSession(movie,date){
        $.get('./api/get_session.php',{movie,date},(res)=>{
            $('#session').html(res);

            // console.log(res);
        })
    }

    $('#movie').on('change',function(){
        let movie = $(this).val();
        getDate(movie)
        // console.log(movie);
    })

    $('#date').on('change',function(){
        let movie = $('#movie').val();
        let date = $(this).val();
        getSession(movie,date)
    })
</script>

