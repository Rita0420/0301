<input type="button" value="新增電影" onclick="location.href='?do=add_movie'">
<hr>
<div style="height:500px;overflow: auto;">
    <?php
    $movies=$Movie->all("order by `rank`");
    foreach($movies as $movie):
    ?>
    <div style="display: flex;width:100%;text-align:center;margin-top:20px;box-shadow:0 0 2px;">
        <div style="width: 20%;"><img src="./images/<?=$movie['poster'];?>" height="100px" alt=""></div>
        <div style="width: 10%;">分級：<img src="./icon/03C0<?=$movie['level'];?>.png" height="24px" alt=""></div>
        <div style="width: 70%;">
            <div style="display: flex;justify-content:space-around">
                <div>片名：<?=$movie['name'];?></div>
                <div>片長：<?=$movie['length'];?></div>
                <div>上映時間：<?=$movie['ondate'];?></div>
            </div>
            <div style="text-align: right;">
                <input class="show-btn" type="button" data-id="<?=$movie['id'];?>" value="<?=($movie['sh']==1)?"顯示":"隱藏";?>">
                <input type="button" value="往上" data-id="<?=$movie['id'];?>" data-sw="">
                <input type="button" value="往下" data-id="<?=$movie['id'];?>" data-sw="">
                <input type="button" value="編輯電影" onclick="location.href='?do=edit_movie.php?id=<?=$movie['id'];?>'">
                <input type="button" value="刪除電影" onclick="del(<?=$movie['id'];?>)">
            </div>
            <div>劇情介紹:<?=$movie['intro'];?></div>
        </div>
    </div>
    <?php endforeach;?>
</div>

<script>
    $(".show-btn").on("click",function(){
        let id=$(this).data("id");
        $.post("./api/show.php",{id},(res)=>{
            // console.log(res);
            
            switch ($(this).val()) {
                case '顯示':
                    $(this).val("隱藏");
                    break;
                case '隱藏':
                    $(this).val("顯示");
                    break;
            
                default:
                    break;
            }
        })
    })
</script>