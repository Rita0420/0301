<?php
$movie=$Movie->find($_GET['id']);
$ondate=explode("-",$movie['ondate']);
?>
<form action="./api/save_movie.php" method="post" enctype="multipart/form-data">
    <div>
        <div style="display: flex;width:100%;justify-content:center">
            <div style="margin-right: 20px;width:10%;">影片資料</div>
            <div style="width:40%;">
                <table>
                    <tr>
                        <td>片名：</td>
                        <td><input type="text" name="name" id="name" value="<?=$movie['name'];?>"></td>
                    </tr>
                    <tr>
                        <td>分級：</td>
                        <td>
                            <select name="level" id="level">
                                <option value="1" <?=($movie['level']==1)?"selected":"";?>>普遍級</option>
                                <option value="2" <?=($movie['level']==2)?"selected":"";?>>輔導級</option>
                                <option value="3" <?=($movie['level']==3)?"selected":"";?>>保護級</option>
                                <option value="4" <?=($movie['level']==4)?"selected":"";?>>限制級</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>片長：</td>
                        <td>
                            <input type="text" name="length" id="length" value="<?=$movie['length'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>上映日期：</td>
                        <td>
                            <select name="year" id="year">
                                <option value="2025" <?=($ondate[0]==2025)?"selected":"";?>>2025</option>
                                <option value="2026" <?=($ondate[0]==2026)?"selected":"";?>>2026</option>
                            </select>年
                            <select name="month" id="month">
                                <?php for ($i = 1; $i <= 12; $i++): 
                                    $selected=($ondate[1]==$i)?"selected":"";
                                    ?>
                                    <option value="<?= $i; ?>" <?=$selected;?>><?= $i; ?></option>
                                <?php endfor; ?>
                            </select>月
                            <select name="day" id="day">
                                <?php for ($i = 1; $i <= 31; $i++): 
                                    $selected=($ondate[2]==$i)?"selected":"";?>
                                    <option value="<?= $i; ?>" <?=$selected;?>><?= $i; ?></option>
                                <?php endfor; ?>
                            </select>日

                        </td>
                    </tr>
                    <tr>
                        <td>發行商：</td>
                        <td>
                            <input type="text" name="publish" id="publish" value="<?=$movie['publish'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>導演：</td>
                        <td>
                            <input type="text" name="director" id="director" value="<?=$movie['director'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>預告影片：</td>
                        <td>
                            <input type="file" name="trailer" id="trailer">
                        </td>
                    </tr>
                    <tr>
                        <td>電影海報：</td>
                        <td>
                            <input type="file" name="poster" id="poster">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div style="display: flex;width:100%;justify-content:center">
            <div style="margin-right: 20px;width:10%">影片簡介</div>
            <div style="width:40%;"><textarea style="width: 100%;height:100px" name="intro" id="intro"><?=$movie['intro'];?></textarea></div>
        </div>
        <input type="hidden" name="id" value="<?=$movie['id'];?>">
        <div class="ct" style="margin-top: 10px;">
            <input type="submit" value="修改">
            <input type="reset" value="重置">
        </div>
    </div>
</form>