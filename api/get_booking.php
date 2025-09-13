<?php include_once "db.php"; ?>
<style>
    .booking-box {
        width: 540px;
        height: 370px;
        background: url("./icon/03D04.png") no-repeat center;
        margin: auto;
    }

    #seats {
        width: 320px;
        height: 344px;
        display: flex;
        flex-wrap: wrap;
        margin: auto;
        padding-top: 18px;

    }

    .seat {
        width: 64px;
        height: 86px;
        /* background-color: #eee; */
        position: relative;
    }

    .seat input[type="checkbox"] {
        position: absolute;
        right: 2px;
        bottom: 2px;
    }

    .info-box {
        width: 50%;
        background-color: #eee;
        margin: auto;
    }

    .booked{
        background: url("./icon/03D03.png") no-repeat center;
    }
    .null{
        background: url("./icon/03D02.png") no-repeat center;
    }
</style>
<div class="booking-box">
    <div id="seats">
        <?php
        $orders = $Orders->all(['date' => $_GET['date'], 'session' => $_GET['session'], 'movie' => $Movie->find($_GET['movie'])['name']]);
        $seats=[];
        foreach($orders as $order){
            $seats=array_merge($seats,unserialize($order['seats']));
        }
        for ($i = 0; $i < 20; $i++):
            $booked=(in_array($i,$seats))?'booked':'null';
        ?>
            <div class="seat <?=$booked;?>">
                <?= floor($i / 5) + 1; ?>排<?= ($i % 5) + 1; ?>號
                <?php if($booked == 'null'):?>
                <input class="selectSeat" type="checkbox" name="seat" value="<?= $i; ?>">
                <?php endif;?>
            </div>
        <?php
        endfor; ?>
    </div>

</div>

<div class="info-box">
    <div>
        <div>您選擇的電影是:<?= $Movie->find($_GET['movie'])['name']; ?></div>
        <div>您選擇的時刻是:<?= $_GET['date']; ?>&nbsp;&nbsp;&nbsp;<?= $_GET['session']; ?></div>
        <div>您已經勾選<span id="selectNum">0</span>張票，最多可以購買四張票</div>
    </div>

    <div class="ct">
        <input class="btn-prev" type="button" value="上一步">
        <input class="btn-order" type="button" value="訂票">
    </div>
</div>

<script>
    let selectSeat = [];
    $(".selectSeat").on("change", function() {
        if ($(this).prop("checked")) {
            if (selectSeat.length < 4) {
                selectSeat.push($(this).val());
                console.log(selectSeat);
            } else {
                alert("最多只能選擇四張票");
                $(this).prop("checked", false);
            }
        } else {
            selectSeat.splice(selectSeat.indexOf($(this).val()), 1);
            console.log(selectSeat);
        }

        $("#selectNum").text(selectSeat.length);
    })

    $(".btn-order").on("click", function() {
        $.post("./api/order.php", {
            movie: "<?= $Movie->find($_GET['movie'])['name']; ?>",
            date: "<?= $_GET['date']; ?>",
            session: "<?= $_GET['session']; ?>",
            seats: selectSeat
        }, (no) => {
            console.log(no);
            location.href = `?do=result&no=${no}`;
        })
    })
</script>