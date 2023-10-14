<div class="product-page">
    <div class="container">
        <div class="shop-breadcrumb">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?act=shop-page">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product</li>
                </ol>
            </nav>
        </div>

        <div class="product-content-inner row g-5">
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

                <div class="shop-media-sidebar mt-4 mb-4">
                    <img src="<?=$img_path;?>shop-sidebar-ad-banner.jpg" alt="" class="img-fluid" />
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

            <div class="col-9 product-sigle-wrapper">
                <div class="row g-5 product-sigle-info">
                    
                    <?php 
                        extract($product_sigle);
                        $img = $img_path.$product_image;
                        $category_name = '';

                        foreach ($listCategories as $category) {
                            if ($category[0] == $category_id) {
                                $category_name = $category[1];
                            };
                        };

                        $product_description = explode("," , $product_description);
                        $row ='';

                        foreach ($product_description as $des) {
                            $row .= '<li>'.$des.'</li>';
                        }



                        echo '
                            <div class="col-5 product-img">
                                <img src="'.$img.'" alt="'.$product_name.'" />
                            </div>

                            <div class="col-7 product-info">
                                <div class="product-band">'.$category_name.'</div>
                                <div class="product-name">'.$product_name.'</div>
                                <div class="product-rating border-bottom pb-2">
                                    <div class="star-rating">
                                        <img src="'.$img_path.'star-rating.png" alt="" />
                                    </div>
                                    <a href="#reviews" class="review-rating-count">( '.(isset($list_comments) ? count($list_comments) : '0').' customer reviews)</a>
                                </div>
                                <div class="product-action-btn">
                                    <a href="#">
                                        <i class="bi bi-heart"></i>
                                        <span>Wishlist</span>
                                    </a>
                                    <a href="#">
                                        <i class="bi bi-arrow-repeat"></i>
                                        <span>Compare</span>
                                    </a>
                                </div>
                                <div class="product-details-short">
                                    <ul>
                                        '.$row.'                                        
                                    </ul>
                                </div>
                                <div class="product-price">
                                    <p>$'.$product_price.'</p>
                                </div>
                                <form action="" class="product-cart">
                                    <input type="number" value="1" />
                                    <div class="btn btn-success">
                                        Pay with
                                        <span> link </span>
                                        <svg class="InlineSVG LinkButton-arrow" focusable="false" width="21" height="14"
                                            viewBox="0 0 21 14" fill="none">
                                            <path
                                                d="M14.5247 0.219442C14.2317 -0.0733252 13.7568 -0.0731212 13.4641 0.219898C13.1713 0.512917 13.1715 0.98779 13.4645 1.28056L18.5 6.5L19 7L18.5 7.75C18 8.5 13.4645 12.7194 13.4645 12.7194C13.1715 13.0122 13.1713 13.4871 13.4641 13.7801C13.7568 14.0731 14.2317 14.0733 14.5247 13.7806L20.7801 7.53056C20.9209 7.38989 21 7.19902 21 7C21 6.80098 20.9209 6.61011 20.7801 6.46944L14.5247 0.219442Z"
                                                fill="#1D3944"></path>
                                            <path d="M14 4L4 4" stroke="#1D3944" stroke-width="1.5" stroke-linecap="round">
                                            </path>
                                            <path d="M14 4V1" stroke="#1D3944" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M14 13V10" stroke="#1D3944" stroke-width="1.5" stroke-linecap="round">
                                            </path>
                                            <path
                                                d="M4 9.25C3.58579 9.25 3.25 9.58579 3.25 10C3.25 10.4142 3.58579 10.75 4 10.75V9.25ZM14 9.25H4V10.75H14V9.25Z"
                                                fill="#1D3944"></path>
                                            <path
                                                d="M1.00007 6.25C0.585853 6.24996 0.250037 6.58572 0.25 6.99993C0.249963 7.41415 0.58572 7.74996 0.999934 7.75L1.00007 6.25ZM14.0001 6.25115L1.00007 6.25L0.999934 7.75L13.9999 7.75115L14.0001 6.25115Z"
                                                fill="#1D3944"></path>
                                        </svg>
                                    </div>

                                    <p class="wc-stripe-payment-request-separator">— OR —</p>

                                    <a href="#" class="btn btn-warning">
                                        <i class="bi bi-cart-plus"></i>
                                        <span>Add to Cart</span>
                                    </a>
                                </form>
                        ';
                        
                    ?>

                    </div>
                </div>

                <div class="product-tabs-wrapper">
                    <div class="tabs-title">
                        <div id="reviews" class="tab-title-review">
                            <a href="#"> Reviews </a>
                        </div>
                    </div>
                    <div class="wc-tab-review">
                        <div class="advanced-review row">
                            <div class="col-6 base-rating">

                                <?php  
                                    if (!isset($list_comments)) {
                                        echo '<div class="based-title">Based on 0 reviews</div>';
                                    }else {
                                        echo '<div class="based-title">Based on '.count($list_comments).' reviews</div>';
                                    }
                                ?>

                                <!-- <div class="based-title">Based on 2 reviews</div> -->

                                
                                <?php  
                                    $avg_rating = 0;
                                    if (isset($list_comments)) {
                                        foreach ($list_comments as $comment) {
                                            extract($comment);
                                            $avg_rating-=-$comment_rating; 
                                        }
                                        $avg_rating /= count($list_comments); 
                                    }
                                ?>

                                <div class="avg-rating">
                                    <span class="avg-rating-number"><?=is_int($avg_rating) ? $avg_rating : number_format($avg_rating , 2)?></span>
                                    overall
                                </div>


                                <?php 
                                    $star_rating_5s = 0;
                                    $star_rating_4s = 0;
                                    $star_rating_3s = 0;
                                    $star_rating_2s = 0;
                                    $star_rating_1s = 0;
                                    $rating_percentage = 0;
                                    if (isset($list_comments)) {
                                        foreach ($list_comments as $comment) {
                                            extract($comment);
                                            $star_rating_1s = $comment_rating == 1 ? ++$star_rating_1s :  $star_rating_1s;
                                            $star_rating_2s = $comment_rating == 2 ? ++$star_rating_2s :  $star_rating_2s;
                                            $star_rating_3s = $comment_rating == 3 ? ++$star_rating_3s :  $star_rating_3s;
                                            $star_rating_4s = $comment_rating == 4 ? ++$star_rating_4s :  $star_rating_4s;
                                            $star_rating_5s = $comment_rating == 5 ? ++$star_rating_5s :  $star_rating_5s;
                                        }
                                        $rating_percentage =100 / ($star_rating_1s + $star_rating_2s + $star_rating_3s + $star_rating_4s + $star_rating_5s);
                                    }

                                ?>

                                <div class="rating-histogram">
                                    <div class="rating-bar">
                                        <div class="star-rating">
                                            <img class="img-fluid" src="<?=$img_path;?>star-rating-5s.png" alt="" />
                                        </div>
                                        <div class="rating-percentage-bar">
                                            <span class="rating-percentage" style="width:<?=$rating_percentage * $star_rating_5s?>%"></span>
                                        </div>
                                        <div class="rating-count"><?=$star_rating_5s;?></div>
                                    </div>
                                    <div class="rating-bar">
                                        <div class="star-rating">
                                            <img class="img-fluid" src="<?=$img_path;?>star-rating-4s.png" alt="" />
                                        </div>
                                        <div class="rating-percentage-bar">
                                            <span class="rating-percentage" style="width:<?=$rating_percentage * $star_rating_4s?>%"></span>
                                        </div>
                                        <div class="rating-count"><?=$star_rating_4s;?></div>
                                    </div>
                                    <div class="rating-bar">
                                        <div class="star-rating">
                                            <img class="img-fluid" src="<?=$img_path;?>star-rating-3s.png" alt="" />
                                        </div>
                                        <div class="rating-percentage-bar">
                                            <span class="rating-percentage" style="width:<?=$rating_percentage * $star_rating_3s?>%"></span>
                                        </div>
                                        <div class="rating-count"><?=$star_rating_3s;?></div>
                                    </div>
                                    <div class="rating-bar">
                                        <div class="star-rating">
                                            <img class="img-fluid" src="<?=$img_path;?>star-rating-2s.png" alt="" />
                                        </div>
                                        <div class="rating-percentage-bar">
                                            <span class="rating-percentage" style="width:<?=$rating_percentage * $star_rating_2s?>%"></span>
                                        </div>
                                        <div class="rating-count"><?=$star_rating_2s;?></div>
                                    </div>
                                    <div class="rating-bar">
                                        <div class="star-rating">
                                            <img class="img-fluid" src="<?=$img_path;?>star-rating-1s.png" alt="" />
                                        </div>
                                        <div class="rating-percentage-bar">
                                            <span class="rating-percentage" style="width:<?=$rating_percentage * $star_rating_1s?>%"></span>
                                        </div>
                                        <div class="rating-count"><?=$star_rating_1s;?></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 review-form">
                                <div class="review-title">Add a review</div>

                                <form action="index.php?act=product-page" method="post" id="comment-form" class="comment-form">
                                    <input type="hidden" name="product_id" value="<?=$product_sigle['product_id']?>">    
                                    <input type="hidden" name="client_id" value="<?=$product_sigle['product_id']?>">    

                                    <div class="form-group comment-form-rating">
                                        <div class="title">Your Rating</div>

                                        <div class="rating">
                                            <input rules="required" checked type="radio" id="star5" name="rating" value="5" />
                                            <label for="star5"></label>
                                            <input rules="required" type="radio" id="star4" name="rating" value="4" />
                                            <label for="star4"></label>
                                            <input rules="required" type="radio" id="star3" name="rating" value="3" />
                                            <label for="star3"></label>
                                            <input rules="required" type="radio" id="star2" name="rating" value="2" />
                                            <label for="star2"></label>
                                            <input rules="required" type="radio" id="star1" name="rating" value="1" />
                                            <label for="star1"></label>
                                        </div>
                                        <span class="form-message"></span>

                                    </div>

                                    <div class="form-group comment-form-comment">
                                        <div class="title">Your Review</div>
                                        <textarea name="comment" cols="45" rows="2" rules="required"></textarea>
                                        <span class="form-message"></span>
                                    </div>

                                    <input type="submit" name="submit" value="Add Review" />
                                </form>
                            </div>
                        </div>

                        <div class="comment-review">
                            <div class="list-comments">

                                
                                <?php  
                                    if (!isset($list_comments)) {
                                        echo '<div class="based-title">0 Comment</div>';
                                    }else {

                                        foreach ($list_comments as $comment) {
                                            extract($comment);

                                            echo '
                                                <div class="item">
                                                    <div class="star-rating">
                                                        <img class="img-fluid" src="'.$img_path.'star-rating-'.$comment_rating.'s.png"/>
                                                    </div>
                
                                                    <div class="comment-text">
                                                        '.$comment_content.'
                                                    </div>
                
                                                    <div class="user-date">
                                                        <div class="user-name">'.$user_name.'</div>
                                                        -
                                                        <div class="date">'.$comment_date.'</div>
                                                    </div>
                                                </div>
                                            ';
                                        };
                                    };
                                ?>


                                <!-- <div class="item">
                                    <div class="star-rating">
                                        <img class="img-fluid" src="./asset/image/star-rating-4s.png" alt="" />
                                    </div>

                                    <div class="comment-text">
                                        Fusce vitae nibh mi. Integer posuere, libero et
                                        ullamcorper facilisis, enim eros tincidunt orci, eget
                                        vestibulum sapien nisi ut leo. Cras finibus vel est ut
                                        mollis. Donec luctus condimentum ante et euismod.
                                    </div>

                                    <div class="user-date">
                                        <div class="user-name">abubacker</div>
                                        -
                                        <div class="date">November 19, 2021</div>
                                    </div>
                                </div> -->
                                
                            </div>
                        </div>
                    </div>
                </div>

                <section class="related-products">
                    <header class="title border-bottom">
                        <h2>Related products</h2>
                    </header>

                    <div class="list-products">

                                                
                       
                        <?php
                            foreach ($related_product as $product) {
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

                    <div class="show-more d-flex justify-content-end">
                        <a href="#">Show More +</a>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<script src="./view/asset/js/validator2_0.js"></script>
<script>
    Validator('#comment-form');
</script>