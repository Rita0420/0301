<form action="./api/save_movie.php" method="post" enctype="multipart/form-data">
    <div>
        <div style="display: flex;width:100%;justify-content:center">
            <div style="margin-right: 20px;width:10%;">影片資料</div>
            <div style="width:40%;">
                <table>
                    <tr>
                        <td>片名：</td>
                        <td><input type="text" name="name" id="name"></td>
                    </tr>
                    <tr>
                        <td>分級：</td>
                        <td>
                            <select name="level" id="level">
                                <option value="1">普遍級</option>
                                <option value="2">輔導級</option>
                                <option value="3">保護級</option>
                                <option value="4">限制級</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>片長：</td>
                        <td>
                            <input type="text" name="length" id="length">
                        </td>
                    </tr>
                    <tr>
                        <td>上映日期：</td>
                        <td>
                            <select name="year" id="year">
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>年
                            <select name="month" id="month">
                                <?php for ($i = 1; $i <= 12; $i++): ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php endfor; ?>
                            </select>月
                            <select name="day" id="day">
                                <?php for ($i = 1; $i <= 31; $i++): ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php endfor; ?>
                            </select>日

                        </td>
                    </tr>
                    <tr>
                        <td>發行商：</td>
                        <td>
                            <input type="text" name="publish" id="publish">
                        </td>
                    </tr>
                    <tr>
                        <td>導演：</td>
                        <td>
                            <input type="text" name="director" id="director">
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
            <div style="width:40%;"><textarea style="width: 100%;height:100px" name="intro" id="intro"></textarea></div>
        </div>
        <div class="ct" style="margin-top: 10px;">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </div>
</form>