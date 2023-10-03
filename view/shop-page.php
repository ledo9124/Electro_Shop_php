<div class="shop-page">
    <div class="container">
        <div class="shop-breadcrumb">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                </ol>
            </nav>
        </div>

        <div class="shop-content-inner row g-5">
            <div class="col-3 shop-sidebar">
                <div class="shop-categories">
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
                </div>

                <div class="shop-widget-filter">
                    <div class="shop-filter-title border-bottom">
                        <h3>Filters</h3>
                    </div>

                    <div class="shop-filter bands border-bottom pb-4">
                        <h3 class="widget-title">Brands</h3>
                        <form action="" class="shop-filter-form bands">
                            <div class="item">
                                <input type="checkbox" id="band1" name="band" /><label for="band1">Apple</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="band2" name="band" /><label for="band2">HTC</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="band3" name="band" /><label for="band3">LG</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="band4" name="band" /><label for="band4">Micromax</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="band5" name="band" /><label for="band5">Microsoft</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="band6" name="band" /><label for="band6">Samsung</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="band7" name="band" /><label for="band7">Xiaomi</label>
                            </div>
                        </form>
                    </div>

                    <div class="shop-filter color border-bottom pb-4">
                        <h3 class="widget-title">Color</h3>
                        <form action="" class="shop-filter-form color">
                            <div class="item">
                                <input type="checkbox" id="color1" name="color" /><label for="color1">Black</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="color2" name="color" /><label for="color2">Black
                                    Leather</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="color3" name="color" /><label for="color3">Gold</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="color4" name="color" /><label for="color4">White</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="color5" name="color" /><label for="color5">White with
                                    Gold</label>
                            </div>
                        </form>
                    </div>

                    <div class="shop-filter-price">
                        <h3 class="widget-title">Price</h3>
                        <form action="" class="shop-filter-form price">
                            <input type="range" step="1" />
                            <label for="">Price: $60 - $3,490</label>
                            <button>Filter</button>
                        </form>
                    </div>
                </div>

                <div class="shop-media-sidebar mt-4 mb-4">
                    <img src="./asset/image/shop-sidebar-ad-banner.jpg" alt="" class="img-fluid" />
                </div>

                <div class="shop-widget-latest-woocommerce">
                    <div class="shop-latest-title border-bottom">
                        <h3>Latest Products</h3>
                    </div>
                    <div class="shop-latest-list-products">
                        
                        
                    <?php
                        foreach ($new_5_product as $product) {
                            extract($product);
                            $linksp = "index.php?act=product-page&idsp=" . $product_id;
                            $img = $img_path . $product_image;


                            echo '
                                <a href="'.$linksp.'" class="item">
                                    <div class="item-img">
                                        <img class="img-fluid" src="'.$img.'" alt="'.$product_name.'" />
                                    </div>
                                    <div class="item-info">
                                        <div class="item-name">
                                        '.$product_name.'
                                        </div>
                                        <div class="star-rating">
                                            <img src="'.$img_path.'star-rating.png" alt="" />
                                        </div>
                                        <div class="item-price">$'.$product_price.'</div>
                                    </div>
                                </a>
                            ';

                        }
                        ?>


                        <!-- <a href="#" class="item">
                            <div class="item-img">
                                <img class="img-fluid" src="./asset/image/shop-widget-latest-1.png" alt="" />
                            </div>
                            <div class="item-info">
                                <div class="item-name">
                                    Tablet Thin EliteBook Revolve 810 G2
                                </div>
                                <div class="star-rating">
                                    <img src="./asset/image/star-rating.png" alt="" />
                                </div>
                                <div class="item-price">$1,347.00</div>
                            </div>
                        </a> -->
                        
                    </div>
                </div>
            </div>

            <div class="col-9 shop-content">
                <div class="shop-content-header d-flex justify-content-between">

                    <?php 
                        if (!isset($_GET['category_id'])) {
                            echo '<h2>All products</h2>';
                        }else {
                            $id = $_GET['category_id'];
                            foreach ($listCategories as $category) {
                                extract($category);
                                if ($id == $category_id) {
                                    echo '<h2>'.$category_name.'</h2>';
                                }
                                
                            }
                        }
                    ?>
            
                    <!-- <h2>Smart Phones & Tablets</h2> -->
                    
                    <p class="woocommerce-result-count mb-0 align-self-center">
                        <!-- Showing all 26 results -->
                    </p>
                </div>

                <div class="shop-widget-bar-top">
                    <ul class="shop-view-switcher nav align-items-center">
                        <li class="active">
                            <i class="bi bi-grid-3x3-gap-fill"></i>
                        </li>
                        <li><ion-icon name="menu-outline"></ion-icon></li>
                        <li><ion-icon name="list-outline"></ion-icon></li>
                    </ul>

                    <form action="" class="woocommerce-ordering">
                        <select name="orderby">
                            <option value="menu_order" selected>Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by latest</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">
                                Sort by price: high to low
                            </option>
                        </select>
                    </form>

                    <div class="woocommerce-pagination">
                        <div class="btn-next-pver">
                            <i class="bi bi-arrow-left-short"></i>
                            <i class="bi bi-arrow-right-short"></i>
                        </div>

                        <div class="woocommerce-quantity">
                            <!-- 1 of 2 -->
                        </div>
                    </div>
                </div>

                <div class="shop-list-products border-bottom pb-4">
                    <div class="shop-products">

                        
                    <?php
                        foreach ($list_products as $product) {
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

                        <!-- <a href="#" class="item">
                            <div class="category-name">Smartphone</div>
                            <div class="item-name">
                                Notebook White Spire V Nitro VN7-591G
                            </div>
                            <div class="item-img">
                                <img class="img-fluid" src="./asset/image/product-smartphone-1.png" alt="" />
                            </div>
                            <div class="price-add-to-card">
                                <div href="#" class="price">$159.00</div>
                                <div href="#" class="add-to-cart">
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
                        </a> -->
                        
                    </div>
                </div>

                <div class="shop-widget-bar-bottom">
                    <div class="woocommerce-result-count">
                        <!-- Showing 1-25 of 26 results -->
                    </div>

                    <div class="woocommerce-pagination-bottom">
                        <!-- <div class="btn-pagination active border">1</div>
                  <div class="btn-pagination border">2</div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>