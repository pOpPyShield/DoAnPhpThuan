<?php 
session_start();

require_once './View/header.php'?>
    <!------Start-Main-->
<section class="Main">
        <div class="container">
            <div class="row">
                <?php include_once './View/leftnav.php';?>
                <section class="col-9" id="right">
                    <?php include_once './View/slidebar.php'; ?>
                    <?php include_once './View/sanphamt11.php';  ?>    
            </div>
            <div class="main-p">
                <?php include_once './View/pcbanchay.php'; ?>
            </div>
            <div class="main-product">
                <?php include_once './View/uudailaptop.php'; ?>
            </div>
            <div class="main-product">
              <?php include_once './View/manhinhkhuyenmai.php';?>
            </div>

            <div class="main-product">
                <?php include_once './View/pc-workstation.php'; ?>
    
            <div class="main-product">
                <?php include_once './View/banphimgaming.php'; ?>
            </div>
            <div class="main-product">
                <?php include_once './View/chuotgaming.php'; ?>
            </div>
            <hr>
            <div class="row" id="selling">
                <?php include_once './View/emailenter.php'; ?>
            </div>
    
        </section>
        </div>  
        </div>
</section>
    <!------End-Main-->
<?php include_once './View/footer.php' ?>