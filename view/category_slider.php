<div class="category-slide">
    <div class="container">
        <div class="row justify-content-between">
            <aside class="col-3 category">
                <div class="d-flex align-items-center title">
                    <ion-icon name="list"></ion-icon>
                    <p class="mb-0">Category</p>
                </div>
                <ul class="list-categories">

                    <?php 
                        foreach ($listCategories as $category) {
                            extract($category);
                            $linkdm="index.php?act=shop-page&category_id=".$category_id;
                            echo '
                                <li><a href="'.$linkdm.'">'.$category_name.'</a></li>
                            ';
                        }
                    ?>

                    <!-- <li><a href="#">Computers & Accessories</a></li> -->
                    
                </ul>
            </aside>

            <main class="col-8 slide-show">
                <div class="list-items">
                    <div class="item active">
                        <div class="d-flex">
                            <div class=" content">
                                <div class="title toTop delay-0">
                                    THE NEW STANDARD
                                </div>
                                <div class="detail toLeft delay-1">
                                    UNDER FAVORABLE SMARTWATCHES FROM
                                    <span>$749</span>
                                </div>
                                <a href="#" class="btn toBottom delay-2">Start Buying</a>
                            </div>
                            <div class=" item-img toRight">
                                <img class="img-fluid" src="./view/asset/image/slide1-smartwatches.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex">
                            <div class=" content">
                                <div class="title toTop delay-0">
                                    SHOP TO GET WHAT YOU LOVE
                                </div>
                                <div class="detail toLeft delay-1">
                                    TIMEPIECES THAT MAKE A STATEMENT UP TO
                                    <span>40% OFF</span>
                                </div>
                                <a href="#" class="btn toBottom delay-2">Start Buying</a>
                            </div>
                            <div class=" item-img toRight">
                                <img class="img-fluid" src="./view/asset/image/slide2-Sounddevice.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex">
                            <div class=" content">
                                <div class="title toTop delay-0">
                                    END SEASON SMARTPHANES
                                </div>
                                <div class="detail toLeft delay-1">
                                    LAST CALL FOR UP TO
                                    <span>$250</span> OFF!
                                </div>
                                <a href="#" class="btn toBottom delay-2">Start Buying</a>
                            </div>
                            <div class=" item-img toRight">
                                <img class="img-fluid" src="./view/asset/image/slide3-Smartphones.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="dots">
                    <li class="active"></li>
                    <li></li>
                    <li></li>
                </ul>

            </main>
        </div>
    </div>
</div>