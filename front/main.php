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

    .poster-btn {
        width: 80px;
        height: 100px;
        flex-shrink: 0;
        position: relative;
    }

    .poster-btn img {
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

    $(".btns").hover(
        function() {
            clearInterval(slider);
        },
        function() {
            slider = setInterval(() => {
                animater();
            }, 2000)
        }
    )

    $(".poster-btn").on("click", function() {
        let idx = $(this).index();
        console.log(idx);
        animater(idx);

    })

    function animater(r) {
        let now = $(".poster:visible");
        if (r == undefined) {
            rank++;
            if (rank > $(".poster").length - 1) {
                rank = 0;
            }
        } else {
            rank = r;
        }
        let next = $(".poster").eq(rank);
        // console.log('now', now.data("id"));
        // console.log('next', next.data("id"));

        let ani = $(now).data("ani");
        // console.log(ani);

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

    let p = 0;
    $(".left,.right").on("click", function() {
        let arrow = $(this).attr("class");

        switch (arrow) {
            case 'left':
                if (p > 0) {
                    p--;
                }

                break;
            case 'right':
                if (p < $(".poster-btn").length - 4) {
                    p++;
                }
                break;

        }

        $(".poster-btn").animate({
            right: p * 80
        }, 500);

    })
</script>

<style>
    .movie-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
        height: 340px;
    }

    .movie {
        width: 48%;
        border: 1px solid #eee;
        height: 150px;
        margin-top: 5px;
    }
</style>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <div class="movie-list">
            <?php
            $today = date("Y-m-d");
            $ondate = date("Y-m-d", strtotime("-2 days", strtotime($today)));

            $div=4;
            $all=count($Movie->all(['sh' => 1], " and ondate between '$ondate' and '$today'"));
            $page=ceil($all/$div);
            $now=$_GET['p']??'1';
            $start=($now-1)*$div;

            $movies = $Movie->all(['sh' => 1], " and ondate between '$ondate' and '$today' order by `rank` limit $start,$div");
            foreach ($movies as $movie):
            ?>
                <div class="movie" style="display: flex;align-items:center">
                    <div><img src="./images/<?= $movie['poster']; ?>" style="width: 80px;height:100px" alt=""></div>
                    <div>
                        <div><?= $movie['name']; ?></div>
                        <div>分級: <img src="./icon/03C0<?= $movie['level']; ?>.png" height="15px" alt=""><?= $level[$movie['level']]; ?></div>
                        <div>上映日期:<?= $movie['ondate']; ?></div>
                        <div>
                            <input type="button" value="劇情簡介" onclick="location.href='?do=intro&id=<?=$movie['id'];?>'">
                            <input type="button" value="線上訂票" onclick="location.href='?do=order&id=<?=$movie['id'];?>'">
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="ct">
            <?php if($now-1>0):?>
                <a href="?p=<?=$now-1;?>"><</a>
            <?php endif;?>
            <?php for($i=1;$i<=$page;$i++):?>
                <a href="?p=<?=$i;?>"><?=$i;?></a>
            <?php endfor;?>
            <?php if($now+1<=$page):?>
                <a href="?p=<?=$now+1;?>">></a>
            <?php endif;?>
        </div>
    </div>
</div>

<script>

</script>