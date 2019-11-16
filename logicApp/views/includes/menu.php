<nav class="top-bar" data-topbar role="navigation" style="background:url(<?= IMAGE_PATH ?>menuBg.png);  background-repeat: repeat-x">
    
    <section class="top-bar-section">
        <ul class="left menuItem" >
            <?PHP
                if($this->uri->segment(1)=="Admin"){
            ?>
            <li><a href="<?= site_url('Admin')?>">Home</a></li>
            <li><a href="<?= site_url('Admin/category')?>">Category</a></li>
            <?PHP
                }
                else{
                ?>
            <li><a href="<?= site_url('')?>">Home</a></li>
            <li><a href="<?= site_url('')?>">Products</a></li>
            <li><a href="<?= site_url('')?>">Applications</a></li>
            <li><a href="<?= site_url('')?>">Gallery</a></li>
            <li><a href="<?= site_url('')?>">Contact us</a></li>
            <?PHP
                }
                ?>
        </ul>
        <!-- Right Nav Section -->
        <ul class="right">
            

        </ul>
    </section>
</nav>