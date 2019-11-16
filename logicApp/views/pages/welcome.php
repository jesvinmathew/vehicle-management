<div class="greeBg">
    <div class="row">
        <div class="medium-3 columns">
            <br/>
            <div class="medium-12">
                <img src="<?= IMAGE_PATH ?>products.png" />
                <div class="medium-11" style="border: 1px solid #bbe401">
                    <ul style="color: #bbe401">
                        <?PHP
                        foreach ($Cat1 as $value)
                            echo "<li><a href='" . site_url('product?catId=$value->id') . "'>$value->name</a></li>";
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="medium-9 columns right" style="margin-top: -20">                
            <ul data-orbit class="example-orbit">
                <li class="active">
                    <img src="<?= IMAGE_PATH ?>slider/s1.png" alt="slide 2" />
                    <div class="orbit-caption">
                        Caption Two.
                    </div>
                </li>
                <li>
                    <img src="<?= IMAGE_PATH ?>slider/s1.png" alt="slide 1" />
                    <div class="orbit-caption">
                        Caption One.
                    </div>
                </li>
            </ul>

            <!-- Bullets -->
            <ol class="orbit-bullets">
                <li data-orbit-slide-number="1"></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="medium-4 latestHead">Latest Products </div>
        <div class="medium-12 columns" >
            <pre></pre>
            <div id="demo5" class="scroll-img">
                <ul>
                <?php
                foreach ($pro1 as $value) {
                    ?>
                    <li>
                        <a href="<?= site_url("product/productDetails/$value->id") ?>">
                            <img src="<?= IMAGE_PATH ?>products/thump/<?= $value->image ?>" /><br/>
                            <b><?= $value->name ?></b>
                        </a>
                    </li>
                    <?PHP
                }
                ?>
                </ul>
            </div>

        </div>
    </div>
</div>
    <script>
        $(document).foundation('orbit', 'reflow');
        $('#demo5').scrollbox({
            direction: 'h',
            distance: 140
        });
        $('#demo5-backward').click(function () {
            $('#demo5').trigger('backward');
        });
        $('#demo5-forward').click(function () {
            $('#demo5').trigger('forward');
        });
    </script>
