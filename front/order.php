<div id="orderForm">
    <h3 class="ct">線上訂票</h3>
    <hr>
    <table style="width: 60%;margin:auto">
        <tr>
            <td width="20%">電影：</td>
            <td>
                <select name="movie" id="movie">

                </select>
            </td>
        </tr>
        <tr>
            <td>日期：</td>
            <td>
                <select name="date" id="date">

                </select>
            </td>
        </tr>
        <tr>
            <td>場次：</td>
            <td>
                <select name="session" id="session">

                </select>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input class="btn-submit" type="button" value="確定">
        <input type="reset" value="重置">
    </div>
</div>


<div id="booking" style="display: none;">

</div>

<script>
    let url = new URLSearchParams(location.search);
    $("#movie").on("change", function() {
        getDate($(this).val());
    })
    $("#date").on("change", function() {
        getSession($("#movie").val(), $(this).val());
    })
    getMovie();

    $(".btn-submit").on("click",function(){
        $.get("./api/get_booking.php",{
            movie:$("#movie").val(),
            date:$("#date").val(),
            session:$("#session").val()
        },(booking)=>{
            $("#booking").html(booking);
            
            $(".btn-prev").on("click",function(){
                
                $("#booking").hide();
                $("#orderForm").show();
            })
        })
        $("#orderForm").hide();
        $("#booking").show();
    })

    function getMovie() {
        let id = 0;
        if (url.has('id')) {
            id = url.get('id');
        }
        $.get("./api/get_movies.php", {
            id
        }, (movies) => {
            // console.log(movies);
            $("#movie").html(movies);
            getDate($("#movie").val());
        })
    }

    function getDate(id) {
        $.get("./api/get_date.php", {
            id
        }, (date) => {
            $("#date").html(date);
            getSession(id, $("#date").val());
        })
    }

    function getSession(id, date) {
        $.get("./api/get_session.php", {
            id,date
        }, (session) => {
            $("#session").html(session);
        })
    }
</script>