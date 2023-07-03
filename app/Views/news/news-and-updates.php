<?= $this->extend('layouts/noSideBarMain'); ?>
<?= $this->section('css'); ?>
<style>
    @font-face {
        font-family: 'noirpro';
        src: url('<?=base_url()?>/public/assets/fonts/noir-pro-semi-bold-webfont.woff2') format('woff2'),
            url('<?=base_url()?>/public/assets/fonts/noir-pro-semi-bold-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }
</style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="row my-5 mx-0">
    <div class="col-12 mt-10">
        <div class="ff-noir row m-0 mb-5 mx-auto px-2 w-100 w-md-75 w-lg-50">
            <div class="col-1 bg-green" style="clip-path: polygon(100% 0%, 100% 100%, 0% 100%);"></div>
            <div class="col-10 bg-green text-center">
                <h1 class="display-4 text-white"> NEWS AND UPDATES </h1>
            </div>
            <div class="col-1 position-relative p-0">
                <div class="position-absolute bg-dark-green top-0 w-100 h-100"
                    style="clip-path: polygon(0% 0%, 100% 100%, 0% 100%);"></div>
                <div class="position-absolute bg-green top-0 w-100 h-100"
                    style="clip-path: polygon(0% 0%, 100% 0%, 0% 100%);"></div>
            </div>
        </div>
    </div>
    <!-- <div class="col-12 col-lg-10 offset-lg-1 text-center">
        <div class="row mx-0" id="news-and-updates-container">
            <div class="col-12 row mx-0 mb-5">
                <div class="col-12 col-md-8 bg-white p-0 rounded-start border" id="big-news-and-updates"></div>
                <div class="col-12 col-md-4 bg-white rounded-end border border-start-0 text-start position-relative"
                    style="overflow-y: hidden;">
                    <div class="p-5" id="big-news-and-updates-article">
                        <h1 class="text-dark fs-4">Sample Title</h1>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero beatae maiores magni
                            pariatur ratione animi officiis repellat, reprehenderit architecto dolores incidunt vero
                            obcaecati ut illo, omnis commodi? Sint, suscipit consequatur!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero beatae maiores magni
                            pariatur ratione animi officiis repellat, reprehenderit architecto dolores incidunt vero
                            obcaecati ut illo, omnis commodi? Sint, suscipit consequatur!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero beatae maiores magni
                            pariatur ratione animi officiis repellat, reprehenderit architecto dolores incidunt vero
                            obcaecati ut illo, omnis commodi? Sint, suscipit consequatur!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero beatae maiores magni
                            pariatur ratione animi officiis repellat, reprehenderit architecto dolores incidunt vero
                            obcaecati ut illo, omnis commodi? Sint, suscipit consequatur!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero beatae maiores magni
                            pariatur ratione animi officiis repellat, reprehenderit architecto dolores incidunt vero
                            obcaecati ut illo, omnis commodi? Sint, suscipit consequatur!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero beatae maiores magni
                            pariatur ratione animi officiis repellat, reprehenderit architecto dolores incidunt vero
                            obcaecati ut illo, omnis commodi? Sint, suscipit consequatur!
                        </p>
                    </div>
                    <div class="position-absolute bottom-0 start-0 bg-white w-100 text-center py-5"
                        style="display: none;" id="big-news-and-updates-see-more">
                        <button type="button" class="btn btn-blue">See More</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-4 news-and-updates-1" style="overflow: hidden;">
            </div>
            <div class="col-12 col-md-6 col-xl-4 news-and-updates-2" style="overflow: hidden;">
            </div>
            <div class="d-none d-lg-block col-xl-4 news-and-updates-3" style="overflow: hidden;">
            </div>
            <div class="col-12">
                <div class="bg-secondary">
                    <div class="alert alert-secondary bg-secondary rounded-3 text-gray-500 fw-bold" role="alert">
                        - Thats about it, you're all caught up! -
                    </div>

                </div>
            </div>
        </div>
    </div> -->
    <div class="col-12 col-lg-10 offset-lg-1 text-center">
        <div class="row mx-0" id="news-and-updates-container">
            <div class="col-12 row mx-0 mb-5 rounded">
                <div class="col-12 col-md-8 bg-white p-0 border position-relative big-news-and-updates-image"
                    style="overflow: hidden; background-size: cover; background-repeat: no-repeat; background-position: center;"
                    id="big-news-and-updates"></div>
                <div class="col-12 col-md-4 card rounded-0 border border-start-0 text-start position-relative"
                    style="overflow-y: hidden; display: <?=$pinned_news["status"] ? "block" : "none"?>;">
                    <?php 
                    if($pinned_news["status"]):
                        $pinned_news_0 = $pinned_news["result"][0];
                    ?>
                    <div class="p-5" id="big-news-and-updates-article">
                        <div class="row mb-3">
                            <div class="col-2 d-flex d-md-none d-xl-flex align-items-center">
                                <img src="<?=base_url()?>/public/assets/media/peso/logo-small.svg" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="col-10">
                                <h1 class=" display-6 text-start ff-noir text-gray-900" style="word-break:;">
                                    <?=$pinned_news_0->post_title ?></h1>
                            </div>
                        </div>
                        <div class="text-start text-gray-900 d-none d-md-block"><b> Post Author:
                            </b><?=$pinned_news_0->post_author?></div>
                        <div class="text-start text-gray-600 d-none d-md-block"><i class="far fa-clock"></i>
                            <?=$pinned_news_0->updated_at == "0000-00-00 00:00:00" ? date('M j Y g:i A', strtotime($pinned_news_0->created_at)) : date('M j Y g:i A', strtotime($pinned_news_0->updated_at))?>
                        </div>
                        <hr>
                        <div id="pinned-news-body" class="py-2"></div>
                    </div>
                    <div class="position-absolute bottom-0 start-0 bg-white w-100 text-center py-5" style="display: none;" id="big-news-and-updates-see-more">
                        <a href="<?=base_url()?>/news/post/<?=$pinned_news_0->id?>" class="btn btn-blue">Learn
                            More</a>
                    </div>
                    <?php endif;?>
                </div>
            </div>
            <?php if($news_list["status"]):
                    foreach ($news_list["result"] as $key => $news_info):
            ?>
            <div class="col-12 col-md-6 col-xl-4" style="overflow: hidden;">
                <div class="h-300px card rounded-0 p-5 position-relative mb-3"
                    style="overflow: hidden; background-image: url(<?=base_url()?>/public/assets/media/stock/900x600/42.png);">
                    <div class="mb-10 mb-md-0 w-100">
                        <div class="row mb-3">
                            <div class="col-2 d-flex d-md-none d-xl-flex align-items-start mt-2">
                                <img src="<?=base_url()?>/public/assets/media/peso/logo-small.svg" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="col-10">
                                <h1 class=" display-6 text-start ff-noir text-gray-900" style="word-break:;">
                                    <?=$news_info->post_title ?></h1>
                            </div>
                        </div>
                        <div class="text-start text-gray-900 d-none d-md-block"><b> Post Author:
                            </b><?=$news_info->post_author?></div>
                        <div class="text-start text-gray-600 d-none d-md-block"><i class="far fa-clock"></i>
                            <?=$news_info->updated_at == "0000-00-00 00:00:00" ? date('M j Y g:i A', strtotime($news_info->created_at)) : date('M j Y g:i A', strtotime($news_info->updated_at))?>
                        </div>
                        <hr>
                        <div class="no-figure text-start">
                            <?=$news_info->post_body?>
                        </div>
                    </div>
                    <div class="news-learn-more-container position-absolute bottom-0 start-0 text-center w-100 pb-5 theme-light-show">
                        <a href="<?=base_url()?>/news/post/<?=$news_info->id?>" class="btn btn-blue">Learn
                            More</a>
                    </div>
                    <div class="news-learn-more-container-dark position-absolute bottom-0 start-0 text-center w-100 pb-5 theme-dark-show">
                        <a href="<?=base_url()?>/news/post/<?=$news_info->id?>" class="btn btn-blue">Learn
                            More</a>
                    </div>
                </div>
            </div>
            <?php endforeach;
            endif;?>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('javascript'); ?>
<script>
    let news_and_updates = [
        `<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FOfficialPESOBaliwag%2Fposts%2Fpfbid0zRarzvW1aQGVHxKjEDZL9arNQYjGYYD16xxowY428EGTBfj26aWUEaLtwGKmeqpLl&show_text=true&width=500" width="500" height="698" style="border:none;overflow:hidden" scrolling="yes" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>`,
        `<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FOfficialPESOBaliwag%2Fposts%2Fpfbid02eGvg8xBZfC2z2A4uQEfVCZWtq8nWZSLNbUXHdNyH1tmkYMZWU6PMBih5DQeBGbzrl&show_text=true&width=500" width="500" height="653" style="border:none;overflow:hidden" scrolling="yes" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>`,
        `<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FOfficialPESOBaliwag%2Fposts%2Fpfbid0WsjPBgySbqPppqDXxAZUqRKVhdm6hYhvkyQKgSaGK21mreToaSiQ6FrDp2QMr6e9l&show_text=true&width=500" width="500" height="722" style="border:none;overflow:hidden" scrolling="yes" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>`,
        `<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2F8fact%2Fposts%2Fpfbid02otZ4B1VukpdnZLaM2CNhMEg37EXAxSB9USG1TLLaQK7onqDfSebLwXLH67mkYJRJl&show_text=true&width=500" width="500" height="590" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>`,
        `<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Ffullstackhq%2Fposts%2Fpfbid02G4uJmvUiJxn6T1qAddvFnSw1MawMPEENfnVUksETNXaAKzJiwhr8Bpj1e8zGwCh2l&show_text=true&width=500" width="500" height="717" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>`,
        `<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Falbiononline%2Fposts%2Fpfbid02mEnYctULT23J87f3o8AXnNAFt32YcUV3z18zCgb78NdwyBcvV59cqrLi4heejShUl&show_text=true&width=500" width="500" height="732" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>`,
        // `<iframe width="560" height="315" src="https://www.youtube.com/embed/bReHusqxnvw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`,
    ]
    const pinned_news_body = `<div><?= $pinned_news["status"] ? $pinned_news_0->post_body : "" ?></div>`;
    let pinned_news_body_image
    $(function () {
        const parsed_pinned_news_body = $($.parseHTML(pinned_news_body))
        pinned_news_body_image = parsed_pinned_news_body.find(".image").first();
        pinned_news_body_image.addClass("pinned-news-body-image")

        parsed_pinned_news_body.find(".image").remove()

        $("#pinned-news-body").html(parsed_pinned_news_body)

        const pinned_news_body_bg_image = pinned_news_body_image.clone(true).find("img").attr("src")
        $("#big-news-and-updates").html(pinned_news_body_image).css("background-image",
            `url(${pinned_news_body_bg_image})`)

        resizeBigNewsAndUpdate()

        setNewsAndUpdates()
        window.onresize = function () {
            resizeBigNewsAndUpdate()
        }
    });

    function resizeBigNewsAndUpdate() {
        const width = $("#big-news-and-updates").width()
        const height = (width / 1.778)
        $("#big-news-and-updates").height(height + "px");
        $("#big-news-and-updates").next().height(height + "px");
        if ($("#big-news-and-updates-article").height() > height) {
            $("#big-news-and-updates-see-more").show()
        } else {
            $("#big-news-and-updates-see-more").hide()
        }
        let image = pinned_news_body_image.find("img")
        if(image.height() > image.width()){
            pinned_news_body_image.find("img").height(height)
        }else{
            image.addClass("img-fluid").css("max-height", height)
        }
        console.log(height, $("#big-news-and-updates-article").height())
    }

    // function setNewsAndUpdates() {
    //     let counter = 1;
    //     let iframe_counter = 0;
    //     let heighest = 0;
    //     let current_heighest = 0;
    //     news_and_updates.forEach(function (nap) {
    //         console.log(counter)
    //         if ($(".news-and-updates-" + counter).length == 0) {
    //             counter = 1
    //         }
    //         const iframe = $($.parseHTML(nap)[0])
    //         const iframe_width = iframe.attr("width");
    //         const iframe_scale = $(".news-and-updates-" + counter).width() / iframe_width

    //         heighest = heighest > iframe.attr("height") ? heighest : iframe.attr("height");
    //         current_heighest = current_heighest > iframe.attr("height") * iframe_scale ? current_heighest :
    //             iframe.attr("height") * iframe_scale;

    //         iframe.css({
    //             transform: `scale(${iframe_scale})`,
    //             transformOrigin: "top left",
    //             borderBottom: "5px var(--my-blue) solid"
    //         }).addClass("bg-white rounded-4").attr('data-iframe-index', iframe_counter)

    //         $(".news-and-updates-" + counter).append(
    //             `<div data-iframe-index="${iframe_counter}" class="mb-6"></div>`)
    //         $(".news-and-updates-" + counter).find(`div[data-iframe-index="${iframe_counter}"]`).append(iframe)

    //         const scaled_iframe_height = $(".news-and-updates-" + counter).find(
    //             `div[data-iframe-index="${iframe_counter}"] iframe`)[0].getBoundingClientRect().height
    //         $(`.news-and-updates-${counter}>div[data-iframe-index="${iframe_counter}"]`).height(
    //             scaled_iframe_height)
    //         counter++
    //         iframe_counter++
    //     })
    // }
</script>
<?= $this->endSection(); ?>