<div class="heder">
    <div class="l1 medium-5 left">
        <div class="large-4 columns space1"></div>
        <div class="logo medium-8 columns">
            <img src="<?= IMAGE_PATH ?>logo.png" />
        </div>
    </div>
    <div class="l2 medium-7 left">
        <div class="l3 medium-12"></div>
        <div class="medium-12">
            <div class="menu">
                <nav class="top-bar" data-topbar role="navigation">
                    <ul class="title-area">
                        <li class="name">
                            <h1><a href="#">Software</a></h1>
                        </li>
                        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                    </ul>
                    <section class="top-bar-section">
                        <?PHP
                        if ($this->session->userdata('LgicSoft')) {
                            ?>
                            <!-- Right Nav Section -->
                            <ul class="right">
                                <li class="active"><a href="#">Right Button Active</a></li>
                                <li class="has-dropdown">
                                    <a href="#">Right Button Dropdown</a>
                                    <ul class="dropdown">
                                        <li><a href="#">First link in dropdown</a></li>
                                        <li class="active"><a href="#">Active link in dropdown</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <ul class="left">
                                <li><a href="<?= base_url(); ?>">Home</a></li>
                                <li><a href="<?= site_url('purchase/manufacture'); ?>">Manufactures</a></li>
                                <li><a href="<?= site_url('purchase/clients'); ?>">Clients</a></li>
                            </ul> 
                            <?PHP
                        }
                        ?>
                    </section>
                </nav>

            </div>
        </div>
    </div>
</div>