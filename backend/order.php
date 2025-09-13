<div class="ct">訂單管理</div>

<div style="width:80%;display: flex;margin:auto">
    <div>
        <label for="type">快速刪除：</label>
        <input type="radio" name="type" value="date">依日期
        <input type="text" name="date" id="date">
    </div>
    <div>
        <input type="radio" name="type" value="movie">依電影
        <select name="movie" id="movie">
            <?php $movies = q("select `movie` from `orders` group by `movie`");
            foreach ($movies as $movie):
            ?>
                <option value="<?=$movie['movie'];?>"><?=$movie['movie'];?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <button class="quick-btn">刪除</button>
    </div>
</div>

<div style="display: flex;justify-content:space-around;text-align:center">
    <div style="width: 15%;">訂單編號</div>
    <div style="width: 10%;">電影名稱</div>
    <div style="width: 15%;">日期</div>
    <div style="width: 15%;">場次時間</div>
    <div style="width: 8%;">訂購數量</div>
    <div style="width: 10%;">訂購位置</div>
    <div>操作</div>
</div>
<?php
$orders=$Orders->all();
foreach($orders as $order):
?>
<div style="display: flex;justify-content:space-around;text-align:center">
    <div style="width: 15%;"><?=$order['no'];?></div>
    <div style="width: 10%;"><?=$order['movie'];?></div>
    <div style="width: 15%;"><?=$order['date'];?></div>
    <div style="width: 15%;"><?=$order['session'];?></div>
    <div style="width: 8%;"><?=$order['tickets'];?></div>
    <div style="width: 10%;">
        <?php
        $seats=unserialize($order['seats']);
        foreach($seats as $seat){
            echo "<div>";
            echo floor($seat/5)+1 ."排".($seat%5)+1 ."號";
            echo "</div>";
        }
        ?>
    </div>
    <div>
        <button class="btn-del" data-id="<?=$order['id'];?>">刪除</button>
    </div>
</div>
<?php endforeach;?>

<script>
    $(".quick-btn").on("click",function(){
        let type=$("input[name='type']:checked").val();
        let data='';
        switch (type) {
            case 'date':
                data=$("#date").val();
                break;
            case 'movie':
                data=$("#movie").val();
                break;
        
            default:
                break;
        }
        console.log('type',type);
        console.log('data',data);
        
        if(confirm("確定要刪除訂單嗎？")){
            $.post("./api/qDel.php",{type,data},(res)=>{
                location.reload();
            })
        }
    })
    $(".btn-del").on("click",function(){
        let id=$(this).data("id");
        if(confirm("確定要刪除這筆訂單嗎?")){
            $.post("./api/del.php",{table:'Orders',id},(res)=>{
                location.reload();
            })
        }
    })
</script>