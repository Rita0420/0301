<style>
    .lists {
        width: 210px;
        height: 240px;
        /* background-color: lightblue; */
        position: relative;
        margin: auto;
        text-align: center;
    }

    .poster {
        position: absolute;
        width: 210px;
        height: 240px;
        display: none;
    }

    .poster img {
        width: 200px;
        height: 220px;
    }

    .btns {
        width: 320px;
        height: 120px;
        /* background-color: lightcoral; */
        overflow: hidden;
        display: flex;
        font-size: 12px;
        text-align: center;
    }
    .poster-btn{
        width: 80px;
        height: 100px;
        flex-shrink: 0;
        position: relative;
    }
    .poster-btn img{
        width: 70px;
        height: 90px;
        flex-shrink: 0;
    }
    .left,
    .right {
        width: 0;
        height: 0;
        border-top: 20px solid transparent;
        border-bottom: 20px solid transparent;
    }

    .left {
        border-left: 0px solid black;
        border-right: 20px solid black;
    }

    .right {
        border-left: 20px solid black;
        border-right: 0px solid black;
    }

    .controls {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
</style>
<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">

            <div class="lists">
                <?php
                $posters = $Posters->all(['sh' => 1], " order by `rank` ");
                foreach ($posters as $poster):
                ?>
                    <div class="poster" data-id="<?= $poster['id']; ?>" data-ani="<?= $poster['ani']; ?>">
                        <div>
                            <img src="./images/<?= $poster['img']; ?>" alt="">
                        </div>
                        <div><?= $poster['name']; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="controls">
                <div class="left"></div>
                <div class="btns">
                    <?php
                    foreach ($posters as $poster):
                    ?>
                        <div class="poster-btn">
                            <div>
                                <img src="./images/<?= $poster['img']; ?>" alt="">
                            </div>
                            <div><?= $poster['name']; ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="right"></div>
            </div>
        </div>
    </div>
</div>
<script>
    let rank = 0;

    $(".poster").eq(rank).show();
    let slider = setInterval(() => {
        animater();
    }, 2000)

    function animater() {
        let now = $(".poster:visible");
        rank++;
        if (rank > $(".poster").length - 1) {
            rank = 0;
        }
        let next = $(".poster").eq(rank);
        console.log('now', now.data("id"));
        console.log('next', next.data("id"));

        let ani = $(now).data("ani");
        console.log(ani);

        switch (ani) {
            case 1:
                $(now).fadeOut(1000);
                $(next).fadeIn(1000);
                break;
            case 2:
                $(now).hide(1000);
                $(next).show(1000);
                break;
            case 3:
                $(now).slideUp(1000);
                $(next).slideDown(1000);
                break;
        }
    }
</script>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <table>
            <tbody>
                <tr> </tr>
            </tbody>
        </table>
        <div class="ct"> </div>
    </div>
</div>

<script>
    let p=0;
    $(".left,.right").on("click",function(){
        let arrow=$(this).attr("class");
        
        switch (arrow) {
            case 'left':
                if(p>0){
                    p--;
                }
                
                break;
            case 'right':
                if(p<$(".poster-btn").length-4){
                    p++;
                }
                break;

        }

        $(".poster-btn").animate({right:p*80},500);
        
    })
</script>