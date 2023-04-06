<template>
    <div>
        <!-- Navbar -->
        <div class="navbar navbar-expand-lg navbar-dark fixed-top bg-light m-0 p-0" style="left: 0; height: 65px">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Navbar brand -->
                <a class="navbar-brand m-0 mt-lg-0" href="#">
                    <h5 class="pt-1"><img height="100px" src="../../../2023-03-22_22-33.png"></h5>
                </a>
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                        data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item m-lg-4">
                            <a class="nav-link text-dark" href="#">Telephone</a>
                        </li>
                        <li class="nav-item m-lg-4">
                            <a class="nav-link text-dark" href="#">TV</a>
                        </li>
                        <li class="nav-item m-lg-4">
                            <a class="nav-link text-dark" href="#">Laptop</a>
                        </li>
                        <li class="nav-item m-lg-4">
                            <a class="nav-link text-dark" href="#">Electronic</a>
                        </li>
                        <li class="nav-item m-lg-4">
                            <a class="nav-link text-dark" href="#">Books</a>
                        </li>
                        <li class="nav-item m-lg-4">
                            <a class="nav-link text-dark" href="#">Bags</a>
                        </li>
                    </ul>
                    <!-- Left links -->

                    <!-- Right elements -->
                    <div class="input-group rounded w-25">
                        <input type="search" class="form-control rounded"  placeholder="Search" aria-label="Search"
                               aria-describedby="search-addon"/>
                        <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                    </div>
                    <div class="d-flex align-items-center justify-content-start">
                        <div class="dropdown">
                            <a class="text-reset me-3 hidden-arrow" @click="clickCart" role="button"
                               aria-expanded="false">
                                <i class="fas fa-bell text-white"></i>
                                <span class="badge rounded-pill badge-notification bg-danger"
                                      style="font-size: 10px">{{ notificationCart }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                     class="bi bi-cart" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
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
                    <!-- Right elements -->
                </div>
                <label for="navbarDropdownMenuAvatar" style="margin: auto 0.5%" v-if="name">{{ name }}</label>
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
            <div v-if="alertCart" class="alert alert-danger" role="alert"
                 style="position: fixed;right: inherit;top: 66px">
                Your product card is empty, select the products to add to the card!
            </div>
        </div>
        <!-- Navbar -->
        <!-- Navbar -->
        <div v-if="" class="container m-4" :style="{ opacity: opacity }">
            <!-- Carousel wrapper -->
            <div id="carouselMaterialStyle" class="carousel slide carousel-fade"
                 style="margin-top: 100px; height: 200px" data-mdb-ride="carousel">
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
                        <img src="../../../123.png" class="d-block" style="height: 200px"
                             alt="Sunset Over the City"/>
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>

                    <!-- Single item -->
                    <div class="carousel-item">
                        <img src="../../../lm.png" class="d-block w-100" style="height: 200px"
                             alt="Canyon at Nigh"/>
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                </div>
                <!-- Inner -->

                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-mdb-target="#carouselMaterialStyle"
                        data-mdb-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-mdb-target="#carouselMaterialStyle"
                        data-mdb-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- Carousel wrapper -->

            <div class="container py-5">
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

                            <img :src="product.media.url_main"
                                 @click = "insideProduct(product.id, product.name, product.product_number)"
                                 height="auto"
                                 style="cursor: pointer"
                                 class="card-img-top p-3" alt="Laptop"/>

                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <p class="small"><a href="#!" class="text-muted">Laptops</a></p>
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
             class="shopping-cart scroll float-right hover-overlay" style="margin-top: 67px">
            <button @click="hideCart" class="btn-close" aria-label="close icon"
                    style="left: 100%;position: sticky;"></button>

            <h5 class="card-title text-md-center mb-3">Card</h5>
            <div v-if="payload" v-for="lineItem in payload.line_items" class="card mb-1 vh-25">
                <div class="card-body">
                    <button @click="deleteItem(lineItem.product_id)" type="button" class="btn-close" aria-label="Close"
                            style="left: 100%;position: sticky;"></button>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">{{ lineItem.product_name }}</h5>
                            <p class="card-text">{{ lineItem.description }}</p>
                            <p class="card-text">Quantity: {{ lineItem.quantity }}</p>
                            <p class="card-text">Price: {{ lineItem.price.totalPrice }}</p>
                            <p class="card-text">Total: {{ lineItem.quantity * lineItem.price.totalPrice }}</p>
                        </div>
                        <div class="col-md-6">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/7.webp"
                                 class="img-fluid" alt="Product Photo" style="">
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="price !== undefined" class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Cart Summary</h5>
                    <!--                    <h6 class="card-subtitle mb-2 text-muted">Gross Price: {{ price.grossPrice }}</h6>-->
                    <h6 class="card-subtitle mb-2 text-muted">Tax: {{ price.tax }}</h6>
                    <h2 class="card-title">Total Price: {{ cart.price }}</h2>
                    <button class="btn btn-primary" @click="addToCart(product)">Check Out</button>
                </div>
            </div>
        </div>


        <!-- Footer -->
        <footer class="bg-primary text-center text-white fi">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-linkedin-in"></i></a>

                    <!-- Github -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-github"></i></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
</template>


<script>
export default {
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
            axios.get('/api/products',{
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            })
                .then(response => {
                    this.products = response.data.products;
                    console.log(this.products);
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
            window.location.href = `/product/${name}/${number}`;
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
                    window.location.href = '/product/page';
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
}
</script>
<style>
@media (max-width: 600px) {
    .shopping-cart {
        width: 100%;
        top: 0;
        left: 0;
        bottom: 0;
        border-radius: 0;
    }
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

.fixed-top {
    position: fixed;
    top: 0;
    left: 30px; /* change this value to adjust the button's position */
    z-index: 9999; /* to ensure the button is always on top */
}
</style>
