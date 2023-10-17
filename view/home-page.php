<!-- /* ======Home body======== */ -->
<div class="home-body">
    <div class="container">
        <div class="home-body-inner">
            <div class="categories-list-card">
                <div class="list-cards">

                    <?php
                    foreach ($listCategories as $category) {
                        extract($category);
                        $linkdm = "index.php?act=shop-page&category_id=" . $category_id;
                        $current_product = 0;
                        foreach ($count_products as $quantity) {
                            if ($category_id == $quantity[0]) {
                                $current_product = $quantity[1];
                            }
                        }

                        echo '
                                <a href="' . $linkdm . '" class="item">
                                    <div class="item-img">
                                        <img class="img-fluid" src="' . ($img_path . $category_img) . '" alt="' . $category_name . '" />
                                    </div>
                                    <div class="item-text text-center">
                                        <div class="title">' . $category_name . '</div>
                                        <div class="quantity">' .$current_product. ' products</div>
                                    </div>
                                </a>
                            ';
                    }
                    ?>

                    <!-- <a href="#" class="item">
                        <div class="item-img">
                            <img class="img-fluid" src="home_category1.png" alt="" />
                        </div>
                        <div class="item-text text-center">
                            <div class="title">Stereo</div>
                            <div class="quantity">7 products</div>
                        </div>
                    </a> -->

                </div>

                <div class="btn-next-pver">
                    <button class="pver">
                        <ion-icon name="arrow-back-circle-outline"></ion-icon>
                    </button>
                    <button class="next">
                        <ion-icon name="arrow-forward-circle-outline"></ion-icon>
                    </button>
                </div>
            </div>

            <section class="home-product id1">
                <header class="title border-bottom">
                    <h2>Top 10 product</h2>
                </header>
                <div class="woocommerce columns-5">
                    <div class="nav list-products">

                        <?php
                        foreach ($top_10_product as $product) {
                            extract($product);
                            $linksp = "index.php?act=product-page&idsp=" . $product_id;
                            $img = $img_path . $product_image;
                            $category_name = '';

                            foreach ($listCategories as $category) {
                                if ($category[0] == $category_id) {
                                    $category_name = $category[1];
                                };
                            };

                            echo '
                                <a href="'.$linksp.'" class="item">
                                    <div class="item-type">'.$category_name.'</div>
                                    <div class="item-name">
                                        '.$product_name.'
                                    </div>
                                    <div class="item-img">
                                        <img class="img-fluid" src="'.$img.'" alt="'.$product_name.'" />
                                    </div>
                                    <div class="price-add-to-card">
                                        <div class="price">$'.$product_price.'</div>
                                        <div class="add-to-cart">
                                            <i class="bi bi-cart-plus"></i>
                                        </div>
                                    </div>
                                    <div class="dots-menu">
                                        <div class="nav-dots-item">
                                            <i class="bi bi-heart" title="Wishlist"></i>
                                            <i class="bi bi-arrow-repeat" title="Compare"></i>
                                        </div>
                                        <ion-icon name="add-outline"></ion-icon>
                                    </div>
                                </a>
                            ';

                        }
                        ?>

                        <!-- <div class="item">
                            <a href="#" class="item-type">Bluetooth Speakers</a>
                            <a href="#" class="item-name">
                                Notebook Widescreen Y700-17 GF790
                            </a>
                            <a href="#" class="item-img">
                                <img class="img-fluid" src="home_product1.png" alt="" />
                            </a>
                            <div class="price-add-to-card">
                                <a href="#" class="price">$159.00</a>
                                <a href="#" class="add-to-cart">
                                    <i class="bi bi-cart-plus"></i>
                                </a>
                            </div>
                            <div class="dots-menu">
                                <div class="nav-dots-item">
                                    <i class="bi bi-heart" title="Wishlist"></i>
                                    <i class="bi bi-arrow-repeat" title="Compare"></i>
                                </div>
                                <ion-icon name="add-outline"></ion-icon>
                            </div>
                        </div> -->


                    </div>

                    <div class="btn-next-pver">
                        <button class="pver">
                            <ion-icon name="arrow-back-circle-outline"></ion-icon>
                        </button>
                        <button class="next">
                            <ion-icon name="arrow-forward-circle-outline"></ion-icon>
                        </button>
                    </div>
                </div>
            </section>

            <div class="home-da-banner">
                <div class="row">
                    <div class="col-6">
                        <div class="banner big" style="
                      background-image: url('<?= $img_path; ?>home-bg-banner-1.jpeg');
                    ">
                            <div class="banner-img">
                                <img src="<?= $img_path; ?>home-da-banner-1.png" alt="" class="img-fuild" />
                            </div>
                            <div class="banner-text">
                                <strong>#STAYHOME</strong>
                                AND CATCH BIG
                                <strong>DEALS</strong>
                                ON THE GAMES & CONSOLES
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="banner" style="
                      background-image: url('<?= $img_path; ?>home-bg-banner-2.jpeg');
                    ">
                            <div class="banner-text">
                                OFFICE LAPTOPSFOR WORK
                                <p>FROM <span>$749</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="banner" style="
                      background-image: url('<?= $img_path; ?>home-bg-banner-3.jpeg');
                    ">
                            <div class="banner-text">
                                LIMITED
                                <span>WEEK DEAL</span>
                                <p>HURRY UP BEFORE OFFER WILL END</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="home-product id2">
                <header class="title border-bottom">
                    <h2>New Products</h2>
                </header>
                <div class="woocommerce columns-5">
                    <div class="nav list-products">

                    <?php
                        foreach ($new_10_product as $product) {
                            extract($product);
                            $linksp = "index.php?act=product-page&idsp=" . $product_id;
                            $img = $img_path . $product_image;
                            $category_name = '';

                            foreach ($listCategories as $category) {
                                if ($category[0] == $category_id) {
                                    $category_name = $category[1];
                                };
                            };

                            echo '
                                <a href="'.$linksp.'" class="item">
                                    <div class="item-type">'.$category_name.'</div>
                                    <div class="item-name">
                                        '.$product_name.'
                                    </div>
                                    <div class="item-img">
                                        <img class="img-fluid" src="'.$img.'" alt="'.$product_name.'" />
                                    </div>
                                    <div class="price-add-to-card">
                                        <div class="price">$'.$product_price.'</div>
                                        <div class="add-to-cart">
                                            <i class="bi bi-cart-plus"></i>
                                        </div>
                                    </div>
                                    <div class="dots-menu">
                                        <div class="nav-dots-item">
                                            <i class="bi bi-heart" title="Wishlist"></i>
                                            <i class="bi bi-arrow-repeat" title="Compare"></i>
                                        </div>
                                        <ion-icon name="add-outline"></ion-icon>
                                    </div>
                                </a>
                            ';

                        }
                        ?>


                        <!-- <div class="item">
                            <a href="#" class="item-type">Bluetooth Speakers</a>
                            <a href="#" class="item-name">
                                Notebook Widescreen Y700-17 GF790
                            </a>
                            <a href="#" class="item-img">
                                <img class="img-fluid" src="home_product7.png" alt="" />
                            </a>
                            <div class="price-add-to-card">
                                <a href="#" class="price">$159.00</a>
                                <a href="#" class="add-to-cart">
                                    <i class="bi bi-cart-plus"></i>
                                </a>
                            </div>
                            <div class="dots-menu">
                                <div class="nav-dots-item">
                                    <i class="bi bi-heart" title="Wishlist"></i>
                                    <i class="bi bi-arrow-repeat" title="Compare"></i>
                                </div>
                                <ion-icon name="add-outline"></ion-icon>
                            </div>
                        </div> -->

                        
                    </div>

                    <div class="btn-next-pver">
                        <button class="pver">
                            <ion-icon name="arrow-back-circle-outline"></ion-icon>
                        </button>
                        <button class="next">
                            <ion-icon name="arrow-forward-circle-outline"></ion-icon>
                        </button>
                    </div>
                </div>
            </section>


            <section class="home-news-post">
                <header class="title border-bottom">
                    <h2>News Post</h2>
                </header>
                <div class="home-post">
                    <div class="row">
                        <div class="col-6 item-post">
                            <div class="post-img">
                                <img class="img-fluid" src="<?= $img_path; ?>home-block-post-1.jpg" alt="" />
                            </div>
                            <div class="post-name">Tips & Tricks</div>
                            <div class="post-title">
                                7 Expert Tips to Improve your Home Entertainment Sound
                            </div>
                            <div class="post-detail">
                                A cinema like sound of home entertainment is mostly the
                                dream of the home owner like you, a nice and high quality
                                of sounds to make your entertainment at home be like a
                                world class entertainment. Use a home audio amplifier to
                                improve your home entertainment sound.
                            </div>
                        </div>
                        <div class="col-6 item-post">
                            <div class="post-img">
                                <img class="img-fluid" src="<?= $img_path; ?>home-block-post-2.jpg" alt="" />
                            </div>
                            <div class="post-name">Inspirations</div>
                            <div class="post-title">
                                Improve Your Interior Design with Smart Audio
                            </div>
                            <div class="post-detail">
                                While your home theater and speakers deliver impressive
                                visuals and sound, they’re rarely designed with your
                                home’s interior design in mind. TVs may be thinner than in
                                the past, and high-end speakers often have a futuristic
                                look, but they still draw attention away from other décor
                                in a space.
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="home-brands">
                <header class="title border-bottom">
                    <h2>Known Brands</h2>
                </header>
                <div class="list-brands">
                    <div class="item-brand">
                        <div class="brand-img">
                            <img class="img-fluid" src="<?= $img_path; ?>home-brand-1.png" alt="" />
                        </div>
                        <div class="brand-des">
                            Brings you the best in music, plus all things culture,
                            style, and sports
                        </div>
                        <div class="brand-product">
                            <img class="img-fluid" src="<?= $img_path; ?>home-brand-sp-1.png" alt="" />
                        </div>
                    </div>

                    <div class="item-brand">
                        <div class="brand-img">
                            <img class="img-fluid" src="<?= $img_path; ?>home-brand-2.png" alt="" />
                        </div>
                        <div class="brand-des">
                            Brings you the best in music, plus all things culture,
                            style, and sports
                        </div>
                        <div class="brand-product">
                            <img class="img-fluid" src="<?= $img_path; ?>home-brand-sp-2.png" alt="" />
                        </div>
                    </div>

                    <div class="item-brand">
                        <div class="brand-img">
                            <img class="img-fluid" src="<?= $img_path; ?>home-brand-3.png" alt="" />
                        </div>
                        <div class="brand-des">
                            Brings you the best in music, plus all things culture,
                            style, and sports
                        </div>
                        <div class="brand-product">
                            <img class="img-fluid" src="<?= $img_path; ?>home-brand-sp-3.png" alt="" />
                        </div>
                    </div>

                    <div class="item-brand">
                        <div class="brand-img">
                            <img class="img-fluid" src="<?= $img_path; ?>home-brand-4.png" alt="" />
                        </div>
                        <div class="brand-des">
                            Brings you the best in music, plus all things culture,
                            style, and sports
                        </div>
                        <div class="brand-product">
                            <img class="img-fluid" src="<?= $img_path; ?>home-brand-sp-4.png" alt="" />
                        </div>
                    </div>

                    <div class="item-brand">
                        <div class="brand-img">
                            <img class="img-fluid" src="<?= $img_path; ?>home-brand-5.png" alt="" />
                        </div>
                        <div class="brand-des">
                            Brings you the best in music, plus all things culture,
                            style, and sports
                        </div>
                        <div class="brand-product">
                            <img class="img-fluid" src="<?= $img_path; ?>home-brand-sp-5.png" alt="" />
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>