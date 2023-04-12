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
    <div class="col-12 col-lg-10 offset-lg-1 text-center">
        <div class="row mx-0" id="news-and-updates-container">
            <div class="col-12 row mx-0 mb-5">
                <div class="col-12 col-md-8 bg-white p-0 rounded-start border" id="big-news-and-updates"></div>
                <div class="col-12 col-md-4 bg-white rounded-end border border-start-0 text-start position-relative" style="overflow-y: hidden;">
                    <div class="p-5" id="big-news-and-updates-article">
                        <h1 class="text-dark fs-4">Sample Title</h1>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero beatae maiores magni pariatur ratione animi officiis repellat, reprehenderit architecto dolores incidunt vero obcaecati ut illo, omnis commodi? Sint, suscipit consequatur!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero beatae maiores magni pariatur ratione animi officiis repellat, reprehenderit architecto dolores incidunt vero obcaecati ut illo, omnis commodi? Sint, suscipit consequatur!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero beatae maiores magni pariatur ratione animi officiis repellat, reprehenderit architecto dolores incidunt vero obcaecati ut illo, omnis commodi? Sint, suscipit consequatur!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero beatae maiores magni pariatur ratione animi officiis repellat, reprehenderit architecto dolores incidunt vero obcaecati ut illo, omnis commodi? Sint, suscipit consequatur!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero beatae maiores magni pariatur ratione animi officiis repellat, reprehenderit architecto dolores incidunt vero obcaecati ut illo, omnis commodi? Sint, suscipit consequatur!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero beatae maiores magni pariatur ratione animi officiis repellat, reprehenderit architecto dolores incidunt vero obcaecati ut illo, omnis commodi? Sint, suscipit consequatur!
                        </p>
                    </div>
                    <div class="position-absolute bottom-0 start-0 bg-white w-100 text-center py-5" style="display: none;" id="big-news-and-updates-see-more">
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
    $(function () {
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
        if($("#big-news-and-updates-article").height() > height){
            $("#big-news-and-updates-see-more").show()
        }else{
            $("#big-news-and-updates-see-more").hide()
        }
        console.log(height, $("#big-news-and-updates-article").height())
    }

    function setNewsAndUpdates() {
        let counter = 1;
        let iframe_counter = 0;
        let heighest = 0;
        let current_heighest = 0;
        news_and_updates.forEach(function (nap) {
            console.log(counter)
            if ($(".news-and-updates-" + counter).length == 0) {
                counter = 1
            }
            const iframe = $($.parseHTML(nap)[0])
            const iframe_width = iframe.attr("width");
            const iframe_scale = $(".news-and-updates-" + counter).width() / iframe_width

            heighest = heighest > iframe.attr("height") ? heighest : iframe.attr("height");
            current_heighest = current_heighest > iframe.attr("height") * iframe_scale ?    current_heighest    :
                                                                                            iframe.attr("height") * iframe_scale;

            iframe.css({
                transform: `scale(${iframe_scale})`,
                transformOrigin: "top left",
                borderBottom: "5px var(--my-blue) solid"
            }).addClass("bg-white rounded-4").attr('data-iframe-index', iframe_counter)

            $(".news-and-updates-" + counter).append(`<div data-iframe-index="${iframe_counter}" class="mb-6"></div>`)
            $(".news-and-updates-" + counter).find(`div[data-iframe-index="${iframe_counter}"]`).append(iframe)

            const scaled_iframe_height = $(".news-and-updates-" + counter).find(`div[data-iframe-index="${iframe_counter}"] iframe`)[0].getBoundingClientRect().height
            $(`.news-and-updates-${counter}>div[data-iframe-index="${iframe_counter}"]`).height(scaled_iframe_height)
            counter++
            iframe_counter++
        })
    }
</script>
<?= $this->endSection(); ?>