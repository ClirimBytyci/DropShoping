<template>
    <div>
        <header class="bg-gray-800 text-white flex items-center justify-between px-4 py-3 fixed top-0 left-0 w-full z-50">
            <div class="flex items-center">
                <img src="../../../Free_logo.svg.png" alt="Shop logo" class="h-8">
            </div>
            <div class="flex items-center">
                <a class="text-reset me-3 hidden-arrow inline-flex items-center" role="button" aria-expanded="false">
                    <i class="fas fa-bell text-white"></i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <span class="inline-flex items-center justify-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-500 text-white" style="height: 24px; margin-bottom: 17px; margin-left: -10px;">0</span>
                </a>

                <button @click="goBack" class="bg-gray-700 hover:bg-gray-900 text-white rounded-full px-4 py-2 mr-4">
                    Back
                </button>
            </div>
        </header>
        <!--        <p>Product ID:{{ id }}</p><br>-->
        <!--        <button type="submit" @click="checkOut(id)">-->
        <!--            Sent Id-->
        <!--        </button>-->
        <div>
            <section class="py-12 sm:py-16">
                <div class="container mx-auto px-4">
                    <!---->

                    <div class="lg:col-gap-12 xl:col-gap-16 mt-8 grid grid-cols-1 gap-12 lg:mt-12 lg:grid-cols-5 lg:gap-16">
                        <div class="lg:col-span-3 lg:row-end-1">
                            <div class="lg:flex lg:items-start boxShadow">
                                <div class="lg:order-2 lg:ml-5" style="margin: auto">
                                    <div class="max-w-xl overflow-hidden rounded-lg" style="height: 480px; display: flex; justify-content: center; align-items: center;">
                                        <img style="max-height: 100%; max-width: fit-content; width: -webkit-fill-available;" :src="photoCover" alt="" />
                                    </div>
                                </div>
                                <div class="mt-2 w-auto lg:order-1 lg:w-32 lg:flex-shrink-0">
                                    <div class="flex flex-row items-start lg:flex-col">
                                        <button @click="changePhoto(data.media.url_main)" style="box-shadow: 2px 3px 14px gainsboro;" type="button" class="flex-0 aspect-square mb-3 h-20 overflow-hidden rounded-lg text-center">
                                            <img class="h-full w-full object-cover" :src="data.media.url_main" alt="" />
                                        </button>
                                        <button v-for="photo in data.media.url_additional" type="button" style="box-shadow: 2px 3px 14px gainsboro;" class="flex-0 aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-transparent text-center">
                                            <img @click="changePhoto(photo)" class="h-full w-full object-cover" :src="photo" alt="" />
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-2 lg:row-span-2 lg:row-end-2">
                            <h1 class="sm: text-2xl font-bold text-gray-900 sm:text-3xl">{{ data.name }}</h1>

                            <div class="mt-5 flex items-center">
                                <div class="flex items-center">
                                    <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
                                    </svg>
                                    <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
                                    </svg>
                                    <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
                                    </svg>
                                    <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
                                    </svg>
                                    <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
                                    </svg>
                                </div>
                                <p class="ml-2 text-sm font-medium text-gray-500">1,209 Reviews</p>
                            </div>

                            <h2 class="mt-8 text-base text-gray-900">Coffee Type</h2>
                            <div class="mt-3 flex select-none flex-wrap items-center gap-1">
                                <label class="">
                                    <input type="radio" name="type" value="Powder" class="peer sr-only" checked />
                                    <p class="peer-checked:bg-black peer-checked:text-white rounded-lg border border-black px-6 py-2 font-bold">Powder</p>
                                </label>
                                <label class="">
                                    <input type="radio" name="type" value="Whole Bean" class="peer sr-only" />
                                    <p class="peer-checked:bg-black peer-checked:text-white rounded-lg border border-black px-6 py-2 font-bold">Whole Bean</p>
                                </label>
                                <label class="">
                                    <input type="radio" name="type" value="Groud" class="peer sr-only" />
                                    <p class="peer-checked:bg-black peer-checked:text-white rounded-lg border border-black px-6 py-2 font-bold">Groud</p>
                                </label>
                            </div>

                            <h2 class="mt-8 text-base text-gray-900">Choose subscription</h2>
                            <div class="mt-3 flex select-none flex-wrap items-center gap-1">
                                <label class="">
                                    <input type="radio" name="subscription" value="4 Months" class="peer sr-only" />
                                    <p class="peer-checked:bg-black peer-checked:text-white rounded-lg border border-black px-6 py-2 font-bold">4 Months</p>
                                    <span class="mt-1 block text-center text-xs">$80/mo</span>
                                </label>
                                <label class="">
                                    <input type="radio" name="subscription" value="8 Months" class="peer sr-only" checked />
                                    <p class="peer-checked:bg-black peer-checked:text-white rounded-lg border border-black px-6 py-2 font-bold">8 Months</p>
                                    <span class="mt-1 block text-center text-xs">$60/mo</span>
                                </label>
                                <label class="">
                                    <input type="radio" name="subscription" value="12 Months" class="peer sr-only" />
                                    <p class="peer-checked:bg-black peer-checked:text-white rounded-lg border border-black px-6 py-2 font-bold">12 Months</p>
                                    <span class="mt-1 block text-center text-xs">$40/mo</span>
                                </label>
                            </div>

                            <div class="mt-10 flex flex-col items-center justify-between space-y-4 border-t border-b py-4 sm:flex-row sm:space-y-0">
                                <div class="flex items-end">
                                    <h1 class="text-3xl font-bold">${{ data.price }}</h1>
                                    <span class="text-base">/month</span>
                                </div>

                                <button @click="addToCart(data)" type="button" class="inline-flex items-center justify-center rounded-md border-2 border-transparent bg-gray-900 bg-none px-12 py-3 text-center text-base font-bold text-white transition-all duration-200 ease-in-out focus:shadow hover:bg-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    Add to cart
                                </button>
                            </div>

                            <ul class="mt-8 space-y-2">
                                <li class="flex items-center text-left text-sm font-medium text-gray-600">
                                    <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" class=""></path>
                                    </svg>
                                    Free shipping worldwide
                                </li>

                                <li class="flex items-center text-left text-sm font-medium text-gray-600">
                                    <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" class=""></path>
                                    </svg>
                                    Cancel Anytime
                                </li>
                            </ul>
                        </div>

                        <div class="lg:col-span-3">
                            <div class="border-b border-gray-300">
                                <nav class="flex gap-4">
                                    <a href="#" title="" class="border-b-2 border-gray-900 py-4 text-sm font-medium text-gray-900 hover:border-gray-400 hover:text-gray-800"> Description </a>

                                    <a href="#" title="" class="inline-flex items-center border-b-2 border-transparent py-4 text-sm font-medium text-gray-600">
                                        Reviews
                                        <span class="ml-2 block rounded-full bg-gray-500 px-2 py-px text-xs font-bold text-gray-100"> 1,209 </span>
                                    </a>
                                </nav>
                            </div>

                            <div class="mt-8 flow-root sm:mt-12">
                                <h1 class="mt-8 text-3xl font-bold">From the Fine Farms of Brazil</h1>
                                <p class="mt-4">{{data.description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</template>

<script>
export default {
    props: [
        'data',
    ],
    data(){
        return {
            photoCover: this.data.media.url_main,
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


    // mounted() {
    //     this.refreshCart();
    // },

    methods: {
        changePhoto(urlPhoto) {
            this.photoCover = urlPhoto;
        },

        addToCart(product) {
            axios.post(`/api/cart`, {
                product: product,
                _token: document.querySelector('meta[name="csrf-token-inside-product-page"]').getAttribute('content')
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

        // deleteItem(lineItemId) {
        //     axios.delete(`/api/delete/${lineItemId}`,
        //         {
        //             _token: document.querySelector('meta[name="csrf-token-inside-product-page"]').getAttribute('content')
        //         })
        //         .then(() => {
        //             this.refreshCart();
        //         })
        //         .catch(error => {
        //             console.error('Error deleting item:', error);
        //         });
        // },
        //
        // refreshCart() {
        //     axios.post('/api/products', {
        //         _token: document.querySelector('meta[name="csrf-token-inside-product-page"]').getAttribute('content')
        //     })
        //         .then(response => {
        //             this.products = response.data.products;
        //             this.isLogin = response.data.account.isLogin;
        //             this.name = response.data.account.name;
        //             this.img = response.data.account.url;
        //             this.cart = response.data.cart.cart;
        //             this.payload = response.data.cart.payload;
        //             this.order = response.data.cart.order;
        //             this.price = response.data.cart.price;
        //             this.account = response.data.account
        //             if (this.cart == null) {
        //                 this.opacity = 1;
        //                 this.notificationCart = 0;
        //             }
        //         })
        //         .catch(error => {
        //             console.log(error);
        //         });
        // },
        //
        // hideCart() {
        //     this.refreshCart();
        //     this.showCart = false;
        //     this.opacity = 1
        // },
        // clickCart() {
        //     if (this.showCart == false && this.cart !== undefined) {
        //         this.showCart = true;
        //         this.opacity = 0.5;
        //     } else {
        //         this.showCart = false;
        //         this.opacity = 1;
        //     }
        //     if (this.cart == null) {
        //         this.alertCart = true;
        //         setTimeout(() => {
        //             this.alertCart = false;
        //         }, 5000);
        //     }
        // },

        goBack(){
            window.history.back();
        }
    }

}
</script>
<style>
.boxShadow {
    padding: 16px;
    border-radius: 45px;
    box-shadow: 2px 3px 14px gainsboro;
    height: 520px;
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
