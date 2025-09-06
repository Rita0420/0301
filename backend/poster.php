<style>
    table {
        margin: auto;
        width: 100%;
        text-align: center;
    }

    th {
        background-color: #eee;
    }
</style>
<div style="height: 320px;">
    <h3 class="ct">預告片清單</h3>
    <form action="./api/save_poster.php" method="post">
        <table>
            <tr>
                <th width="25%">預告片海報</th>
                <th width="25%">預告片片名</th>
                <th width="25%">預告片排序</th>
                <th width="25%">操作</th>
            </tr>
        </table>
        <div style="overflow:scroll;height:200px">
            <table>
                <?php
                $posters = $Posters->all("order by `rank`");
                foreach ($posters as $idx =>$poster):
                    $prev=($idx-1<0)?$poster['id']:$posters[$idx-1]['id'];
                    $next=($idx+1>=count($posters))?$poster['id']:$posters[$idx+1]['id'];
                ?>
                    <tr>
                        <td width="25%">
                            <img src="./images/<?= $poster['img']; ?>" style="width: 80px;height:100px" alt="">
                        </td>
                        <td width="25%">
                            <input type="text" name="name[]" id="name" value="<?= $poster['name']; ?>">
                        </td>
                        <td width="25%">
                            <button type="button" class="sw-btn" data-id="<?=$poster['id'];?>" data-sw="<?=$prev;?>">往上</button>
                            <button type="button" class="sw-btn" data-id="<?=$poster['id'];?>" data-sw="<?=$next;?>">往下</button>
                        </td>
                        <td width="25%">
                            <input type="checkbox" name="sh[]" id="sh" value="<?= $poster['id']; ?>" <?= ($poster['sh'] == 1) ? "checked" : ""; ?>>顯示
                            <input type="checkbox" name="del[]" id="del" value="<?= $poster['id']; ?>">刪除
                            <select name="ani[]" id="ani">
                                <option value="1" <?= ($poster['ani'] == 1) ? "selected" : ""; ?>>淡入淡出</option>
                                <option value="2" <?= ($poster['ani']== 2) ? "selected" : ""; ?>>縮放</option>
                                <option value="3" <?= ($poster['ani'] == 3) ? "selected" : ""; ?>>滑進滑出</option>
                            </select>
                        </td>
                    </tr>
                    <input type="hidden" name="id[]" value="<?= $poster['id']; ?>">
                <?php endforeach; ?>
            </table>
        </div>
        <div class="ct">
            <input type="submit" value="編輯確定">
            <input type="reset" value="重置">
        </div>
    </form>
</div>
<script>
$(".sw-btn").on("click",function(){
    let id=$(this).data("id");
    let sw=$(this).data("sw");
    console.log('ok');
    
    $.post("./api/sw.php",{table:'Posters',id,sw},(res)=>{
        location.reload();
        // console.log(res);
        
    })
})
</script>
<hr>
<div style="height: 160px;">
    <h3 class="ct">新增預告片海報</h3>
    <form action="./api/save_poster.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>預告片海報：</td>
                <td>
                    <input type="file" name="img" id="img">
                </td>
                <td>預告片片名：</td>
                <td>
                    <input type="text" name="name" id="name">
                </td>
            </tr>
        </table>
        <div class="ct">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </form>
</div>