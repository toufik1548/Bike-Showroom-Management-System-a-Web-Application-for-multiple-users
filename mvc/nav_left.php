<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <?php
                $q = mysqli_query($con, "SELECT * FROM sms_users WHERE user_id = $logged_user_id");
                $r = mysqli_fetch_assoc($q);
                $brand_logo = get_info("sms_brands","brand_logo","WHERE brand_id=" .$r['brand_id']);
                ?> 
                <div style="display: flex; justify-content: center; align-items: center; height: auto;">
                    <div style="width: 100px; height: 100px; overflow: hidden; border-radius: 50%;">
                        <img src="<?php echo $site_url; ?>/images/<?php echo $brand_logo; ?>" style="width: 100%; height: 100%;">
                    </div>
                </div>

                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="<?php echo $site_url; ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></i></div>
                    Clients
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo $site_url; ?>/clients-add/">Add Client</a>
                        <a class="nav-link" href="<?php echo $site_url; ?>/clients-list/">Clients List</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts5" aria-expanded="false" aria-controls="collapseLayouts5">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-motorcycle"></i></div>
                    Bikes
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts5" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo $site_url; ?>/bikes-add/">Add Bikes</a>
                        <a class="nav-link" href="<?php echo $site_url; ?>/bikes-available/">Available Bikes</a>
                        <a class="nav-link" href="<?php echo $site_url; ?>/bikes-sold/">Sold Bikes</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts3">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-file"></i></div>
                    Reports
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo $site_url; ?>/sells-list/">Sell List</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts6" aria-expanded="false" aria-controls="collapseLayouts6">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-days"></i></div>
                    Pre-Booking
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts6" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo $site_url; ?>/pre-clientlist/">Prebooking Add</a>
                        <a class="nav-link" href="<?php echo $site_url; ?>/pre-list/">Prebooking list</a>
                        <a class="nav-link" href="<?php echo $site_url; ?>/pre-delivered/">Delivered</a>
                        <a class="nav-link" href="<?php echo $site_url; ?>/pre-refund/">Refund</a>
                    </nav>
                </div> 

            </div>
        </div>
        <?php include("footer_left.php"); ?>
    </nav>
</div>