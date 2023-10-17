//Toggle Dark Mode
const btnDarkMode = document.querySelector(".btn-toggle-dark-mode input");

if (btnDarkMode) {
  btnDarkMode.onclick = function () {
    document.body.classList.toggle("dark-mode-variables");
  };
}

//Slide Show
const slideShow = document.querySelector(".slide-show .list-items");
const slideListItems = document.querySelectorAll(".slide-show .item");
const dots = document.querySelectorAll(".slide-show .dots li");

if (slideShow && slideListItems && dots) {
  let activeSlide = 0;
  let lengthSlide = slideListItems.length - 1;

  let refeshSlide = setInterval(() => {
    activeSlide++;
    reloadSlider();
  }, 5000);

  function reloadSlider() {
    activeSlide = activeSlide > lengthSlide ? 0 : activeSlide;

    let checkLeft = slideListItems[activeSlide].offsetLeft;
    slideShow.style.left = -checkLeft + "px";

    let activeItem = document.querySelector(".slide-show .item.active");
    activeItem.classList.remove("active");

    slideListItems[activeSlide].classList.add("active");

    let activeDot = document.querySelector(".slide-show .dots li.active");
    activeDot.classList.remove("active");

    dots[activeSlide].classList.add("active");

    clearInterval(refeshSlide);
    refeshSlide = setInterval(() => {
      activeSlide++;
      reloadSlider();
    }, 5000);
  }

  dots.forEach((li, key) => {
    li.addEventListener("click", function () {
      activeSlide = key;
      reloadSlider();
    });
  });
}

//Slide Brand
const slideBrand = document.querySelector(".brand .list-brands");
const slideListBrands = document.querySelectorAll(".brand .list-brands .item");
const brandNextPver = document.querySelectorAll(".brand .btn-next-pver .but");

if (slideBrand && slideListBrands && brandNextPver) {
  let activeBrand = 0;
  let lengthBrand = slideListBrands.length - 1;

  brandNextPver[0].onclick = function () {
    activeBrand--;
    slideBrand.prepend(slideListBrands[activeBrand + 1]);
    reloadBrand();
  };

  brandNextPver[1].onclick = function () {
    activeBrand++;
    slideBrand.appendChild(slideListBrands[activeBrand - 1]);
    reloadBrand();
  };

  function reloadBrand() {
    activeBrand =
      activeBrand > lengthBrand
        ? 0
        : activeBrand < 0
        ? lengthBrand
        : activeBrand;

    let checkLeft = slideListBrands[activeBrand].offsetLeft;
    slideBrand.style.left = -259.8 + "px";
  }
}

//While next and pver item

function nextPverItem(btns, listItem, items) {
  const btnsNextPver = document.querySelectorAll(btns);
  const listCard = document.querySelector(listItem);

  if (btnsNextPver && listCard) {
    btnsNextPver[0].onclick = function () {
      let Items = document.querySelectorAll(items);
      listCard.prepend(Items[Items.length - 1]);
    };

    btnsNextPver[1].onclick = function () {
      let Items = document.querySelectorAll(items);
      listCard.appendChild(Items[0]);
    };
  }
}

// home body - categories list card
nextPverItem(
  ".home-body .categories-list-card .btn-next-pver button",
  ".home-body .categories-list-card .list-cards",
  ".home-body .categories-list-card .list-cards .item"
);

// home body - home product
nextPverItem(
  ".home-body .home-product.id1 .btn-next-pver button",
  ".home-body .home-product.id1 .list-products",
  ".home-body .home-product.id1 .list-products .item"
);

nextPverItem(
  ".home-body .home-product.id2 .btn-next-pver button",
  ".home-body .home-product.id2 .list-products",
  ".home-body .home-product.id2 .list-products .item"
);

// While scroll web
const header = document.querySelector("#wapper header");

if (header) {
  document.onscroll = function () {
    if (window.scrollY > 250) {
      header.classList.add("toFixed");
    } else {
      header.classList.remove("toFixed");
    }
  };
}

// Shop page view list product
const shopPageListProducts = document.querySelectorAll(
  ".shop-page .shop-list-products .item"
);

if (shopPageListProducts.length > 0) {
  if (shopPageListProducts.length > 20) {
    shopPageListProducts.forEach((product, index) => {
      if (index + 1 > 20) {
        product.style.display = "none";
      }
    });
  }

  let countTable = shopPageListProducts.length / 20;
  const woocommerceResultCount = document.querySelectorAll(
    ".shop-page .woocommerce-result-count"
  );

  woocommerceResultCount[0].innerHTML = `Showing all ${shopPageListProducts.length} results`;
  if (countTable > 1) {
    woocommerceResultCount[1].innerHTML = `Showing 1-20 of ${shopPageListProducts.length} results`;
  } else {
    woocommerceResultCount[1].innerHTML = `Showing all ${shopPageListProducts.length} results`;
  }

  const woocommerceQuantity = document.querySelector(
    ".shop-page .woocommerce-quantity"
  );
  woocommerceQuantity.innerHTML = `1 of ${Math.ceil(countTable)}`;

  const woocommercePaginationBottom = document.querySelector(
    ".shop-page .woocommerce-pagination-bottom"
  );

  let woocommercePaginationBottomHtml = "";
  for (let index = 0; index < countTable; ) {
    woocommercePaginationBottomHtml += `
      <div class="btn-pagination ${index == 0 ? "active" : ""} border">${
      index + 1
    }</div>
    `;
    index++;
  }
  woocommercePaginationBottom.innerHTML = woocommercePaginationBottomHtml;

  let currentActive = 0;

  const woocommerceBtnNextPver = document.querySelectorAll(
    ".shop-page .woocommerce-pagination .btn-next-pver i"
  );

  const woocommercePaginationBottomBtn = document.querySelectorAll(
    ".shop-page .woocommerce-pagination-bottom .btn-pagination"
  );

  woocommerceBtnNextPver[0].onclick = function () {
    currentActive--;
    if (currentActive < 0) {
      currentActive = Math.ceil(countTable) - 1;
    }
    reloadProduct();
  };

  woocommerceBtnNextPver[1].onclick = function () {
    currentActive++;
    if (currentActive > Math.ceil(countTable) - 1) {
      currentActive = 0;
    }
    reloadProduct();
  };

  woocommercePaginationBottomBtn.forEach((btn, index) => {
    btn.onclick = function () {
      currentActive = index;
      reloadProduct();
    };
  });

  function reloadProduct() {
    woocommerceQuantity.innerHTML = `${currentActive + 1} of ${Math.ceil(
      countTable
    )}`;

    let woocommercePaginationBottomBtnActive = document
      .querySelector(
        ".shop-page .woocommerce-pagination-bottom .btn-pagination.active"
      )
      .classList.remove("active");
    woocommercePaginationBottomBtn[currentActive].classList.add("active");

    shopPageListProducts.forEach((item, index) => {
      item.style.display = "none";
      if (index > currentActive * 20 - 1 && index <= currentActive * 20 + 19) {
        item.style.display = "block";
      }
    });
  }
}

// admin btn retype

const btnRetype = document.querySelectorAll("form .btn-retype");

if (btnRetype) {
  btnRetype.forEach((btn) => {
    btn.onclick = function () {
      const form = btn.closest("form");
      const inputs = form.querySelectorAll(
        'input:not(input[type="button"] , input[type="submit"])'
      );

      if (inputs) {
        inputs.forEach((input) => {
          input.value = "";

          const formGroup = form.querySelectorAll(".form-group");
          if (formGroup) {
            formGroup.forEach((item) => {
              const elementFile = document.querySelectorAll(
                ".custum-file-upload"
              );
              if (elementFile) {
                elementFile.forEach((element) => {
                  element.innerHTML = `
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24">
                          <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                          <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                          <g id="SVGRepo_iconCarrier">
                              <path fill=""
                                  d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z"
                                  clip-rule="evenodd" fill-rule="evenodd"></path>
                          </g>
                      </svg>
                    </div>
                    <div class="text">
                        <span>Click to upload image</span>
                    </div>
                  `;
                  fileUpImg.forEach((file) => {
                    if (!file.getAttribute("rules")) {
                      file.setAttribute("rules", "isFile");
                      new Validator("#form-category-edit");
                    }
                  });
                });
              }
              if (item.classList.contains("invalid")) {
                item.classList.remove("invalid");
              } else {
                item.classList.remove("valid");
              }
              item.querySelector(".form-message").innerHTML = "";
            });
          }
        });
      }
    };
  });
}

// admin btn choose all and deselect all

const checkBoxCategory = document.querySelectorAll(
  'input[type="checkbox"].ui-checkbox'
);

if (checkBoxCategory) {
  const btnChooseAll = document.querySelectorAll(".choose-all");
  const btnDeselectAll = document.querySelectorAll(".deselect-all");

  if (btnChooseAll) {
    btnChooseAll.forEach((btn) => {
      btn.onclick = function () {
        checkBoxCategory.forEach((item) => {
          item.checked = true;
        });
      };
    });
  }

  if (btnDeselectAll) {
    btnDeselectAll.forEach((btn) => {
      btn.onclick = function () {
        checkBoxCategory.forEach((item) => {
          item.checked = false;
        });
      };
    });
  }
}

//admin change input file

const fileUpImg = document.querySelectorAll('form input[name="file"]');

if (fileUpImg) {
  fileUpImg.forEach((item) => {
    item.onchange = function () {
      if (!item.getAttribute("rules")) {
        item.setAttribute("rules", "isFile");
        new Validator("#form-category-edit");
      }
      const elementFile = document.querySelector(".custum-file-upload");
      if (elementFile) {
        elementFile.innerHTML = `
          <div class="img-upload"><img src="${URL.createObjectURL(
            item.files[0]
          )}"></div>
        `;
      }
    };
  });
};

//Toogle profile navbar

const profilePhoto = document.querySelector('header .profile-photo');

if (profilePhoto) {
  const profileNavbar = document.querySelector('header .profile-navbar');
  profilePhoto.onclick = function() {
    profileNavbar.classList.toggle('active');
    if (profileNavbar.classList.contains('active')) {
      document.querySelector('header .overlay').style.display = 'block';
    }else {
      document.querySelector('header .overlay').style.display = 'none';
    }
  };
  document.querySelector('header .overlay').onclick = function() {
    profileNavbar.classList.remove('active');
    document.querySelector('header .overlay').style.display = 'none';
  };
}

