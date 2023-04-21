<template>
    <div class="container container-add-clr">
        <div class="navbar navbar-expand-lg navbar-dark fixed-top bg-light m-0 p-0 nav-bar-add-clr" style="left: 0; height: 65px">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Navbar brand -->
                <div>
                    <a class="navbar-brand m-0 mt-lg-0" @click="homePage" style="cursor: pointer">
                        <img height="40px" src="../../../Free_logo.svg.png" >
                    </a>
                </div>
                <div class="scroll-list">
                    <ul class="me-auto mb-2 mb-lg-0">
                        <li class="nav-item m-lg-4" v-for="category in categories" :key="category.id" style="cursor: pointer">
                            <a :id="category.id" @click="categoryPage(category.id, category.name)">{{ category.name }}</a>
                        </li>
                    </ul>
                </div>

<!--                <div class="input-group rounded w-25">-->
<!--                    <input type="search" class="form-control rounded"  placeholder="Search" aria-label="Search"-->
<!--                           aria-describedby="search-addon"/>-->
<!--                    <span class="input-group-text border-0" id="search-addon">-->
<!--                                <i class="fas fa-search"></i>-->
<!--                            </span>-->
<!--                </div>-->
                <div class="d-flex align-items-center justify-content-start">
                    <div class="dropdown">
                        <a class="text-reset me-3 hidden-arrow" @click="clickCart" role="button"
                           aria-expanded="false">
                            <i class="fas fa-bell text-white"></i>
                            <span class="badge rounded-pill badge-notification bg-danger" style="font-size: 10px">{{ notificationCart }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                 class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                        </a>
                    </div>
                    <!-- Avatar -->
                    <div class="dropdown" id="dropdown">
                        <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                           id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown"
                           aria-expanded="false">
                            <img v-if="isLogin && img " :src="img" class="rounded-circle"
                                 height="40px" alt="Black and White Portrait of a Man" loading="lazy"/>
                            <img v-else
                                 src="https://thumbs.dreamstime.com/b/default-avatar-profile-icon-vector-unknown-social-media-user-photo-default-avatar-profile-icon-vector-unknown-social-media-user-184816085.jpg"
                                 class="rounded-circle"
                                 height="40px" alt="Black and White Portrait of a Man" loading="lazy"/>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li v-if="name && account.id"  style="cursor:pointer;">
                                <a class="dropdown-item" @click="editProfile(name, account.id)">My profile({{ this.name }})</a>
                            </li>
                            <li v-if="isLogin">
                                <a @click="logOut" class="dropdown-item" href="#">
                                    LogOut
                                </a>
                            </li>
                            <li v-else>
                                <a @click="logIn" class="dropdown-item" href="#">
                                    LogIn
                                </a>
                                <a @click="register" class="dropdown-item" href="#">
                                    Register
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--                <label for="navbarDropdownMenuAvatar" style="margin: auto 0.5%" v-if="name">{{ name }}</label>-->
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
            <div v-if="alertCart" class="alert alert-danger alert-cart" role="alert">
                Your product card is empty, select the products to add to the card!
            </div>
        </div>
        <div v-if="" class="container" :style="{ opacity: opacity }">
            <!-- Carousel wrapper -->
            <div id="carouselMaterialStyle" class="carousel slide carousel-fade carousel-add-clr"
                 style="margin-top: 100px;" data-mdb-ride="carousel">
                <!-- Indicators -->
                <div class="carousel-indicators">
                    <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="0" class="active"
                            aria-current="true"
                            aria-label="Slide 1"></button>
                    <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="1"
                            aria-label="Slide 2"></button>
                </div>

                <!-- Inner -->
                <div class="carousel-inner rounded-5 shadow-4-strong">
                    <!-- Single item -->
                    <div class="carousel-item active">
                        <img src="../../../123.png" class="d-block carousel-add-clr" alt="Sunset Over the City"/>
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>

                    <!-- Single item -->
                    <div class="carousel-item">
                        <img src="../../../lm.png" class="d-block w-100 carousel-add-clr" alt="Canyon at Nigh"/>
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel wrapper -->

            <div class="container py-5 py-5-add-clr">
                <div class="row">
                    <div v-for="product in products"
                         class="col-md-6 col-lg-3 mb-4 pb-4 align-items-center justify-content-center">
                        <div class="card shadow-lg">
                            <div class="d-flex justify-content-between p-3">
                                <p class="lead mb-0">Today's Combo Offer</p>
                                <div
                                    class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                    style="width: 35px; height: 35px;">
                                    <p class="text-white mb-0 small">x2</p>
                                </div>
                            </div>

                            <div class="heightPhoto">
                                <img :src="product.media.url_main"
                                     @click = "insideProduct(product.id, product.name, product.product_number)"
                                     style="cursor: pointer"
                                     class="card-img-top p-3" alt="photo"/>
                            </div>

                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <p style="cursor: pointer" class="small"><a @click="categoryPage(product.category.id, product.category.name)" class="text-muted">{{product.category.name}}</a></p>
                                    <p class="small text-danger"><s>${{ (product.price * 1.2).toFixed(2) }}</s></p>
                                </div>

                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0" style="cursor:pointer"
                                        @click = "insideProduct(product.id, product.name, product.product_number)">
                                        {{ product.name }}
                                    </h5>
                                    <h5 class="text-dark mb-0">${{ product.price }}</h5>
                                </div>

                                <div class="d-flex justify-content-between mb-2">
                                    <p class="text-muted mb-0">Available: <span class="fw-bold">{{ Math.floor(product.stock) }}</span></p>
                                    <div class="ms-auto text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success btn-lg" @click="addToCart(product)">Add to
                                Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--            <section style="background-color: #eee;">-->

        <div v-if="showCart == true && cart !== undefined && order !== undefined"
             class="shopping-cart scroll float-right hover-overlay" style="margin-top: 65px">
            <button @click="hideCart" class="btn-close" aria-label="close icon"
                    style="left: 100%; position: sticky;"></button>

            <h5 class="card-title text-md-center mb-3">Card</h5>
            <div v-if="payload" v-for="lineItem in payload.line_items" class="card mb-1 vh-25">
                <div class="card-body">
                    <button @click="deleteItem(lineItem.product_id)" type="button" class="btn-close" aria-label="Close"
                            style="left: 100%;position: sticky;"></button>
                    <div class="row">
                        <div class="col-md-6 data-cart-add-clr">
                            <h5 class="card-title">{{ lineItem.product_name }}</h5>
                            <p class="card-text">{{ lineItem.description }}</p>
                            <p class="card-text">Quantity: {{ lineItem.quantity }}</p>
                            <p class="card-text">Price: {{ lineItem.price.totalPrice }}</p>
                            <p class="card-text">Total: {{ lineItem.quantity * lineItem.price.totalPrice }}</p>
                        </div>
                        <div class="col-md-6 photo-cart-add-clr">
                            <img :src="lineItem.photo"
                                 class="img-fluid" alt="Product Photo" style="">
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="price !== undefined" class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Cart Summary</h5>
                    <!-- <h6 class="card-subtitle mb-2 text-muted">Gross Price: {{ price.grossPrice }}</h6>-->
                    <h6 class="card-subtitle mb-2 text-muted">Tax: {{ price.tax }}</h6>
                    <h2 class="card-title">Total Price: {{ cart.price }}</h2>
                    <button class="btn btn-primary" @click="addToCart(product)">Check Out</button>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

export default {
    props: {
        categories: {
            type: Array,
            required: true
        },
        category: {
            type: String,
            required: false
        }
    },

    data() {
        return {
            products: [],
            cart: [],
            order: [],
            payload: [],
            price: [],
            showCart: false,
            opacity: 1,
            notificationCart: 1,
            alertCart: false,
            isLogin: this.isLogin,
            name: '',
            img: '',
            account : [],
        }
    },

    mounted() {
        this.refreshCart();
    },

    created() {
        console.log(this.category)
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    },

    methods: {
        addToCart(product) {
            axios.post(`/api/cart`, {
                product: product,
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            })
                .then(response => {
                    this.showCart = true;
                    this.refreshCart();
                    this.opacity = 0.5
                    this.notificationCart = 1;
                })
                .catch(error => {
                    console.error('Error adding to cart:', error)
                })
        },

        deleteItem(lineItemId) {
            axios.delete(`/api/delete/${lineItemId}`,
                {
                    _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                })
                .then(() => {
                    this.refreshCart();
                })
                .catch(error => {
                    console.error('Error deleting item:', error);
                });
        },

        refreshCart() {
            axios.post('/api/products',{
                category: this.category,
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            })
                .then(response => {
                    this.products = response.data.products;
                    this.isLogin = response.data.account.isLogin;
                    this.name = response.data.account.name;
                    this.img = response.data.account.url;
                    this.cart = response.data.cart.cart;
                    this.payload = response.data.cart.payload;
                    this.order = response.data.cart.order;
                    this.price = response.data.cart.price;
                    this.account = response.data.account
                    if (this.cart == null) {
                        this.opacity = 1;
                        this.notificationCart = 0;
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },

        hideCart() {
            this.refreshCart();
            this.showCart = false;
            this.opacity = 1
        },
        clickCart() {
            if (this.showCart == false && this.cart !== undefined) {
                this.showCart = true;
                this.opacity = 0.5;
            } else {
                this.showCart = false;
                this.opacity = 1;
            }
            if (this.cart == null) {
                this.alertCart = true;
                setTimeout(() => {
                    this.alertCart = false;
                }, 5000);
            }
        },
        editProfile(name, id) {
            window.location.href = `/edit/profile/${name}?id=${id}`;
        },

        insideProduct(id, name, number) {
            window.location.href = `/product/${name}/${number}?id=${id}`;
        },

        logIn() {
            window.location.href = '/login';
        },
        register() {
            window.location.href = '/register';
        },
        logOut() {
            axios.post('/logout')
                .then(response => {
                    window.location.href = '/';
                })
                .catch(error => {
                    console.log(error);
                });
        },

        categoryPage(id, name){
            window.location.href = `/category/${name}`;
        },
        homePage(){
            window.location.href = `/`;
        }

    }
}
</script>
<style>
.heightPhoto {
    height: 167px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.heightPhoto img {
    max-height: 100%;
    max-width: fit-content;
}
.shopping-cart {
    opacity: 1;
    width: 24%;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    background-color: #d5c7c7;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    border-radius: 3%;
}

.scroll {
    max-height: 90%; /* set a maximum height for the cart */
    overflow-y: scroll; /* enable vertical scrolling */
}

.carousel-add-clr{
    height: 200px
}
.alert-cart {
    position: fixed;
    right: inherit;
    margin-top: 135px;
}
@media (max-width: 575px) {
    .shopping-cart {
        width: 100% !important;
        top: 0 ;
        left: 0 ;
        bottom: 0 ;
        border-radius: 0;
        margin-top: 85px;
    }
    .carousel-add-clr{
        height: 120px
    }
    .py-5-add-clr {
        padding-top: 16px !important;
    }
    .nav-item {
        flex: 0 0 auto;
        margin-right: 1rem;
    }
    .scroll-list {
        margin-top: 15px;
        order: 999;
        overflow-x: scroll;
        -webkit-overflow-scrolling: touch; /* enables momentum scrolling on iOS */
        white-space: nowrap;
    }
    .scroll-list ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .nav-bar-add-clr {
        height: auto !important;
    }
    .container-add-clr {
        padding-top: 15px;
    }
    .data-cart-add-clr{
        width: 55%;
    }
    .photo-cart-add-clr{
        width: 45%;
        margin-top: 30px;
    }
    .heightPhoto {
        height: 167px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .heightPhoto img {
        max-height: 100%;
        max-width: fit-content;
        width: 60%;
    }
}
.scroll-list li {
    display: inline-block;
    margin-right: 45px !important;
    vertical-align: middle;
}
.scroll-list li:last-child {
    margin-right: 0;
}

.fixed-top {
    position: fixed;
    top: 0;
    left: 30px; /* change this value to adjust the button's position */
    z-index: 9999; /* to ensure the button is always on top */
}

</style>
