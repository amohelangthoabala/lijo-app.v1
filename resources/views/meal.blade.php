@extends('layouts.app')

@section('title', 'Meal Details')

@section('content')

    <section class="lg:flex items-center hidden bg-default-400/10 h-14">
        <div class="container">
            <div class="flex items-center">
                <ol aria-label="Breadcrumb" class="flex items-center whitespace-nowrap min-w-0 gap-2">
                    <li class="text-sm">
                        <a class="flex items-center gap-2 align-middle text-default-800 transition-all leading-none hover:text-primary-500" href="">
                            <i class="w-4 h-4" data-lucide="home"></i>
                            Home
                            <i class="w-4 h-4" data-lucide="chevron-right"></i>
                        </a>
                    </li>

                    <li class="text-sm">
                        <a class="flex items-center gap-2 align-middle text-default-800 transition-all leading-none hover:text-primary-500" href="">
                            Product
                            <i class="w-4 h-4" data-lucide="chevron-right"></i>
                        </a>
                    </li>

                    <li aria-current="page" class="text-sm font-medium text-primary truncate leading-none hover:text-primary-500">
                        Details
                    </li>
                </ol>
            </div>
        </div>
    </section>
    <section class="lg:py-10 py-6">
        <div class="container">
            <div class="grid lg:grid-cols-2 gap-6">
                <div class="grid grid-cols-1">
                    <div>
                        <div class="swiper cart-swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://coderthemes.com/yum/assets/burrito-bowl-79a7c64f.png" class="max-w-full h-full mx-auto">
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://coderthemes.com/yum/assets/burrito-bowl-2-b0c1cb2a.png" class="max-w-full h-full mx-auto">
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://coderthemes.com/yum/assets/burrito-bowl-3-61929adc.png" class="max-w-full h-full mx-auto">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper cart-swiper-pagination justify-center">
                        <div class="swiper-wrapper justify-center gap-2 w-full">
                            <div class="swiper-slide cursor-pointer !w-24 !h-24 lg:!w-32 lg:!h-32">
                                <img src="https://coderthemes.com/yum/assets/burrito-bowl-79a7c64f.png" class="w-full h-full rounded">
                            </div>
                            <div class="swiper-slide cursor-pointer !w-24 !h-24 lg:!w-32 lg:!h-32">
                                <img src="https://coderthemes.com/yum/assets/burrito-bowl-2-b0c1cb2a.png" class="w-full h-full rounded">
                            </div>
                            <div class="swiper-slide cursor-pointer !w-24 !h-24 lg:!w-32 lg:!h-32">
                                <img src="https://coderthemes.com/yum/assets/burrito-bowl-3-61929adc.png" class="w-full h-full rounded">
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-4xl font-medium text-default-800 mb-1">Burrito Bowl</h3>
                    <h5 class="text-lg font-medium text-default-600 mb-2"><span class="text-base font-normal text-default-500">by</span> Blaze Pizza</h5>

                    <div class="flex items-center gap-3 mb-3">
                        <div class="flex gap-1.5">
                            <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                            <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                            <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                            <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                            <span><i class="fa-solid fa-star-half-stroke text-base text-yellow-400"></i></span>
                        </div>
                        <div class="h-4 w-px bg-default-400"></div>
                        <h5 class="text-sm text-default-500">54 Reviews</h5>
                    </div>

                    <p class="text-sm text-default-500 mb-4">Mexican burritos are usually made with a wheat tortilla and contain grilled meat, cheese toppings, and fresh vegetables which are sources of vitamins, proteins, fibers, minerals, and antioxidants.
                        This makes burritos a balanced meal that can be enjoyed in moderation as part of a healthy meal plan.</p>

                    <div class="flex gap-2 mb-5">
                        <div class="border border-default-200 rounded-full px-3 py-1.5 flex items-center gap-2.5">
                            <img src="https://coderthemes.com/yum/assets/non-veg-98aa631a.svg" class="w-4 h-4">
                            <span class="text-xs">Non Vegetable</span>
                        </div>

                        <div class="border border-default-200 rounded-full px-3 py-1.5 flex items-center">
                            <span class="text-xs">Mexican</span>
                        </div>

                        <div class="border border-default-200 rounded-full px-3 py-1.5 flex items-center">
                            <span class="text-xs">Breakfast</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 mb-8">
                        <h4 class="text-sm text-default-700">Size :</h4>

                        <div>
                            <input type="radio" name="option" id="1" value="1" class="peer hidden" checked />
                            <label for="1" class="w-9 h-9 flex justify-center items-center cursor-pointer select-none rounded-full text-sm text-center bg-default-200 peer-checked:bg-primary peer-checked:text-white">S</label>
                        </div>

                        <div>
                            <input type="radio" name="option" id="2" value="2" class="peer hidden" />
                            <label for="2" class="w-9 h-9 flex justify-center items-center cursor-pointer select-none rounded-full text-sm text-center bg-default-200 peer-checked:bg-primary peer-checked:text-white">M</label>
                        </div>

                        <div>
                            <input type="radio" name="option" id="3" value="3" class="peer hidden" />
                            <label for="3" class="w-9 h-9 flex justify-center items-center cursor-pointer select-none rounded-full text-sm text-center bg-default-200 peer-checked:bg-primary peer-checked:text-white">L</label>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 mb-8">
                        <div class="relative z-10 inline-flex justify-between border border-default-200 p-1 rounded-full">
                            <button type="button" class="minus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-9 w-9 text-sm inline-flex items-center justify-center">–</button>
                            <input type="text" class="w-12 border-0 text-sm text-center focus:ring-0 p-0 bg-transparent" value="1" min="0" max="100" readonly="">
                            <button type="button" class="plus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-9 w-9 text-sm inline-flex items-center justify-center">+</button>
                        </div>

                        <a href="cart.html" class="inline-flex items-center justify-center rounded-full border border-primary bg-primary px-10 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">
                            Buy Now
                        </a>

                        <i data-lucide="heart" class="h-8 w-8 text-default-400 cursor-pointer hover:fill-red-600 hover:text-red-600 focus:fill-red-600 focus:text-red-600"></i>
                    </div>

                    <div class="mb-6">
                        <h4 class="text-lg font-medium text-default-700 mb-4">Nutrition Facts <span class="text-sm text-default-400">(per serving)</span></h4>

                        <div class="border border-default-200 p-3 rounded-lg">
                            <div class="grid grid-cols-4 justify-center">
                                <div class="text-center">
                                    <h4 class="text-base font-medium text-default-700 mb-1">1524</h4>
                                    <h4 class="text-base text-default-700">Calories</h4>
                                </div>
                                <div class="text-center">
                                    <h4 class="text-base font-medium text-default-700 mb-1">56g</h4>
                                    <h4 class="text-base text-default-700">Fat</h4>
                                </div>
                                <div class="text-center">
                                    <h4 class="text-base font-medium text-default-700 mb-1">134g</h4>
                                    <h4 class="text-base text-default-700">Carbs</h4>
                                </div>
                                <div class="text-center">
                                    <h4 class="text-base font-medium text-default-700 mb-1">78g</h4>
                                    <h4 class="text-base text-default-700">Protein</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <i data-lucide="eye" class="w-5 h-5 me-2 text-primary"></i>
                        <h5 class="text-sm text-default-600"><span class="text-primary font-semibold">152</span>&nbsp; People are viewing this right now</h5>
                    </div>
                </div>
            </div><!-- end grid -->
        </div><!-- end container -->
    </section>

    <section class="lg:py-10 py-6">
        <div class="container">
            <h4 class="text-xl font-semibold text-default-800 mb-4">May you also like</h4>
            <div class="grid xl:grid-cols-4 sm:grid-cols-2 gap-5 mb-10">
                <div class="group border border-default-200 rounded-lg p-4 overflow-hidden hover:border-primary transition-all duration-300">
                    <div class="relative rounded-lg overflow-hidden divide-y divide-default-200">
                        <div class="w-56 h-52 mb-4 mx-auto">
                            <img src="https://coderthemes.com/yum/assets/burger-dee4db61.png" class="w-full h-full group-hover:scale-105 transition-all">
                        </div>

                        <div class="pt-2">
                            <div class="flex items-center justify-between mb-4">
                                <a href="/details" class="text-default-800 text-xl font-semibold line-clamp-1 after:absolute after:inset-0">Veg Burger</a>
                                <i data-lucide="heart" class="h-6 w-6 text-default-200 cursor-pointer hover:text-red-500 hover:fill-red-500 relative z-10 transition-all"></i>
                            </div>
                            <span class="inline-flex items-center gap-2 mb-4">
                                <span class="bg-primary rounded-full p-1"><i data-lucide="star" class="h-3 w-3 text-white fill-white"></i></span>
                                <span class="text-sm text-default-950 from-inherit">4.2</span>
                            </span>
                            <div class="flex items-end justify-between mb-4">
                                <h4 class="font-semibold text-xl text-default-900">$12.78</h4>
                                <div class="relative z-10 inline-flex justify-between border border-default-200 p-1 rounded-full">
                                    <button type="button" class="minus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center">–</button>
                                    <input type="text" class="w-8 border-0 text-sm text-center text-default-800 focus:ring-0 p-0 bg-transparent" value="1" min="0" max="100" readonly="">
                                    <button type="button" class="plus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center">+</button>
                                </div>
                            </div>

                            <a href="cart.html" class="relative z-10 w-full inline-flex items-center justify-center rounded-full border border-primary bg-primary px-6 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">Add to cart</a><!-- end btn -->
                        </div>
                    </div>
                </div><!-- end grid-cols -->

                <div class="group border border-default-200 rounded-lg p-4 overflow-hidden hover:border-primary transition-all duration-300">
                    <div class="relative rounded-lg overflow-hidden divide-y divide-default-200">
                        <div class="w-56 h-52 mb-4 mx-auto">
                            <img src="https://coderthemes.com/yum/assets/noodles-65d947ec.png" class="w-full h-full group-hover:scale-105 transition-all">
                        </div>

                        <div class="pt-2">
                            <div class="flex items-center justify-between mb-4">
                                <a href="/details" class="text-default-800 text-xl font-semibold line-clamp-1 after:absolute after:inset-0">Noodles</a>
                                <i data-lucide="heart" class="h-6 w-6 text-default-200 cursor-pointer hover:text-red-500 hover:fill-red-500 relative z-10 transition-all"></i>
                            </div>
                            <span class="inline-flex items-center gap-2 mb-4">
                                <span class="bg-primary rounded-full p-1"><i data-lucide="star" class="h-3 w-3 text-white fill-white"></i></span>
                                <span class="text-sm text-default-950 from-inherit">4.9</span>
                            </span>
                            <div class="flex items-end justify-between mb-4">
                                <h4 class="font-semibold text-xl text-default-900">$12.34</h4>
                                <div class="relative z-10 inline-flex justify-between border border-default-200 p-1 rounded-full">
                                    <button type="button" class="minus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center">–</button>
                                    <input type="text" class="w-8 border-0 text-sm text-center text-default-800 focus:ring-0 p-0 bg-transparent" value="1" min="0" max="100" readonly="">
                                    <button type="button" class="plus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center">+</button>
                                </div>
                            </div>
                            <a href="cart.html" class="relative z-10 w-full inline-flex items-center justify-center rounded-full border border-primary bg-primary px-6 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">Add to cart</a><!-- end btn -->
                        </div>
                    </div>
                </div><!-- end grid-cols -->

                <div class="group border border-default-200 rounded-lg p-4 overflow-hidden hover:border-primary transition-all duration-300">
                    <div class="relative rounded-lg overflow-hidden divide-y divide-default-200">
                        <div class="w-56 h-52 mb-4 mx-auto">
                            <img src="https://coderthemes.com/yum/assets/red-velvet-pastry-b09214ba.png" class="w-full h-full group-hover:scale-105 transition-all">
                        </div>

                        <div class="pt-2">
                            <div class="flex items-center justify-between mb-4">
                                <a href="/details" class="text-default-800 text-xl font-semibold line-clamp-1 after:absolute after:inset-0">Red Velvet Pastry</a>
                                <i data-lucide="heart" class="h-6 w-6 text-red-500 fill-red-500 cursor-pointer"></i>
                            </div>
                            <span class="inline-flex items-center gap-2 mb-4">
                                <span class="bg-primary rounded-full p-1"><i data-lucide="star" class="h-3 w-3 text-white fill-white"></i></span>
                                <span class="text-sm text-default-950 from-inherit">4.0</span>
                            </span>
                            <div class="flex items-end justify-between mb-4">
                                <h4 class="font-semibold text-xl text-default-900">$42.25</h4>
                                <div class="relative z-10 inline-flex justify-between border border-default-200 p-1 rounded-full">
                                    <button type="button" class="minus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center">–</button>
                                    <input type="text" class="w-8 border-0 text-sm text-center text-default-800 focus:ring-0 p-0 bg-transparent" value="1" min="0" max="100" readonly="">
                                    <button type="button" class="plus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center">+</button>
                                </div>
                            </div>

                            <a href="cart.html" class="relative z-10 w-full inline-flex items-center justify-center rounded-full border border-primary bg-primary px-6 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">Add to cart</a><!-- end btn -->
                        </div>
                    </div>
                </div><!-- end grid-cols -->

                <div class="group border border-default-200 rounded-lg p-4 overflow-hidden hover:border-primary transition-all duration-300">
                    <div class="relative rounded-lg overflow-hidden divide-y divide-default-200">
                        <div class="w-56 h-52 mb-4 mx-auto">
                            <img src="https://coderthemes.com/yum/assets/spaghetti-c5ad136f.png" class="w-full h-full group-hover:scale-105 transition-all">
                        </div>

                        <div class="pt-2">
                            <div class="flex items-center justify-between mb-4">
                                <a href="/details" class="text-default-800 text-xl font-semibold line-clamp-1 after:absolute after:inset-0">Spaghetti</a>
                                <i data-lucide="heart" class="h-6 w-6 text-default-200 cursor-pointer hover:text-red-500 hover:fill-red-500 relative z-10 transition-all"></i>
                            </div>
                            <span class="inline-flex items-center gap-2 mb-4">
                                <span class="bg-primary rounded-full p-1"><i data-lucide="star" class="h-3 w-3 text-white fill-white"></i></span>
                                <span class="text-sm text-default-950 from-inherit">4.9</span>
                            </span>
                            <div class="flex items-end justify-between mb-4">
                                <h4 class="font-semibold text-xl text-default-900">$12.42</h4>
                                <div class="relative z-10 inline-flex justify-between border border-default-200 p-1 rounded-full">
                                    <button type="button" class="minus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center">–</button>
                                    <input type="text" class="w-8 border-0 text-sm text-center text-default-800 focus:ring-0 p-0 bg-transparent" value="1" min="0" max="100" readonly="">
                                    <button type="button" class="plus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center">+</button>
                                </div>
                            </div>

                            <a href="cart.html" class="relative z-10 w-full inline-flex items-center justify-center rounded-full border border-primary bg-primary px-6 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">Add to cart</a><!-- end btn -->
                        </div>
                    </div>
                </div><!-- end grid-cols -->
            </div><!-- end grid -->

            <h4 class="text-xl font-semibold text-default-800 mb-4">Customer Rating</h4>

            <div class="grid lg:grid-cols-4 items-center gap-5">
                <div class="bg-primary/10 py-8 rounded-lg flex flex-col items-center justify-center">
                    <h1 class="text-6xl font-semibold text-default-800 mb-4">4.7</h1>

                    <div class="flex gap-1.5 mb-2">
                        <span><i class="fa-solid fa-star text-lg text-yellow-400"></i></span>
                        <span><i class="fa-solid fa-star text-lg text-yellow-400"></i></span>
                        <span><i class="fa-solid fa-star text-lg text-yellow-400"></i></span>
                        <span><i class="fa-solid fa-star text-lg text-yellow-400"></i></span>
                        <span><i class="fa-solid fa-star text-lg text-default-200"></i></span>
                    </div><!-- end flex -->

                    <h4 class="text-base font-medium text-default-700">Customer Rating <span class="font-normal text-default-500">(23,476)</span></h4>
                </div><!-- end card -->

                <div class="xl:col-span-2 md:col-span-3">
                    <div class="grid md:grid-cols-12 items-center gap-2 mb-3">
                        <div class="md:col-span-3 flex gap-1.5 lg:justify-center">
                            <span><i class="fa-solid fa-star text-lg text-yellow-400"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-yellow-400"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-yellow-400"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-yellow-400"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-yellow-400"></i></span>
                        </div><!-- end grid-cols -->
                        <div class="md:col-span-7">
                            <div class="flex w-full h-1 bg-default-200 rounded-full overflow-hidden">
                                <div class="flex flex-col justify-center overflow-hidden bg-primary w-4/6 rounded" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div><!-- end grid-cols -->
                        <div class="md:col-span-2">
                            <h4 class="inline-block text-sm font-medium text-default-700">66%</h4>
                            <span class="font-normal text-default-500">(94,532)</span>
                        </div><!-- end grid-cols -->
                    </div><!-- end grid -->

                    <div class="grid md:grid-cols-12 items-center gap-2 mb-3">
                        <div class="md:col-span-3 flex gap-1.5 lg:justify-center">
                            <span><i class="fa-solid fa-star text-lg text-yellow-400"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-yellow-400"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-yellow-400"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-yellow-400"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-default-200"></i></span>
                        </div><!-- end grid-cols -->
                        <div class="md:col-span-7">
                            <div class="flex w-full h-1 bg-default-200 rounded-full overflow-hidden">
                                <div class="flex flex-col justify-center overflow-hidden bg-primary w-1/4 rounded" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div><!-- end grid-cols -->
                        <div class="md:col-span-2">
                            <h4 class="inline-block text-sm font-medium text-default-700">25%</h4>
                            <span class="font-normal text-default-500">(6,717)</span>
                        </div><!-- end grid-cols -->
                    </div><!-- end grid -->

                    <div class="grid md:grid-cols-12 items-center gap-2 mb-3">
                        <div class="md:col-span-3 flex gap-1.5 lg:justify-center">
                            <span><i class="fa-solid fa-star text-lg text-yellow-400"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-yellow-400"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-yellow-400"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-default-200"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-default-200"></i></span>
                        </div><!-- end grid-cols -->
                        <div class="md:col-span-7">
                            <div class="flex w-full h-1 bg-default-200 rounded-full overflow-hidden">
                                <div class="flex flex-col justify-center overflow-hidden bg-primary w-2/12 rounded" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div><!-- end grid-cols -->
                        <div class="md:col-span-2">
                            <h4 class="inline-block text-sm font-medium text-default-700">16%</h4>
                            <span class="font-normal text-default-500">(714)</span>
                        </div><!-- end grid-cols -->
                    </div><!-- end grid -->

                    <div class="grid md:grid-cols-12 items-center gap-2 mb-3">
                        <div class="md:col-span-3 flex gap-1.5 lg:justify-center">
                            <span><i class="fa-solid fa-star text-lg text-yellow-400"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-yellow-400"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-default-200"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-default-200"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-default-200"></i></span>
                        </div><!-- end grid-cols -->
                        <div class="md:col-span-7">
                            <div class="flex w-full h-1 bg-default-200 rounded-full overflow-hidden">
                                <div class="flex flex-col justify-center overflow-hidden bg-primary w-1/12 rounded" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div><!-- end grid-cols -->
                        <div class="md:col-span-2">
                            <h4 class="inline-block text-sm font-medium text-default-700">8%</h4>
                            <span class="font-normal text-default-500">(643)</span>
                        </div><!-- end grid-cols -->
                    </div><!-- end grid -->

                    <div class="grid md:grid-cols-12 items-center gap-2">
                        <div class="md:col-span-3 flex gap-1.5 lg:justify-center">
                            <span><i class="fa-solid fa-star text-lg text-yellow-400"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-default-200"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-default-200"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-default-200"></i></span>
                            <span><i class="fa-solid fa-star text-lg text-default-200"></i></span>
                        </div><!-- end grid-cols -->
                        <div class="md:col-span-7">
                            <div class="flex w-full h-1 bg-default-200 rounded-full overflow-hidden">
                                <div class="flex flex-col justify-center overflow-hidden bg-primary w-[4%] rounded" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div><!-- end grid-cols -->
                        <div class="md:col-span-2">
                            <h4 class="inline-block text-sm font-medium text-default-700">4%</h4>
                            <span class="font-normal text-default-500">(152)</span>
                        </div><!-- end grid-cols -->
                    </div><!-- end grid -->
                </div><!-- end grid-cols -->
            </div><!-- end grid -->

            <div class="pt-10">
                <h4 class="text-base font-medium text-default-800">Customer Review</h4>

                <div class="border-b border-default-200 py-5">
                    <div class="flex items-center mb-3">
                        <img src="https://coderthemes.com/yum/assets/avatar1-25906796.png" class="h-12 w-12 rounded-full me-4">
                        <div class="">
                            <div class="flex items-center gap-2 mb-2">
                                <h4 class="text-sm font-medium text-default-800">Jaylon Botosh</h4>
                                <i class="fa-solid fa-circle text-[5px] text-default-400"></i>
                                <h4 class="text-sm font-medium text-default-400">Just now</h4>
                            </div>
                            <div class="flex gap-1.5">
                                <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                                <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                                <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                                <span><i class="fa-solid fa-star text-base text-default-200"></i></span>
                                <span><i class="fa-solid fa-star text-base text-default-200"></i></span>
                            </div>
                        </div>
                    </div>
                    <p class="text-default-600">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                </div><!-- end card -->

                <div class="border-b border-default-200 py-5">
                    <div class="flex items-center mb-3">
                        <img src="https://coderthemes.com/yum/assets/avatar2-189b0d01.png" class="h-12 w-12 rounded-full me-4">
                        <div class="">
                            <div class="flex items-center gap-2 mb-2">
                                <h4 class="text-sm font-medium text-default-800">Alfonso Korsgaard</h4>
                                <i class="fa-solid fa-circle text-[5px] text-default-400"></i>
                                <h4 class="text-sm font-medium text-default-400">12 hours ago</h4>
                            </div>
                            <div class="flex gap-1.5">
                                <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                                <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                                <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                                <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                                <span><i class="fa-solid fa-star text-base text-default-200"></i></span>
                            </div>
                        </div>
                    </div>
                    <p class="text-default-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div><!-- end card -->

                <div class="border-b border-default-200 py-5">
                    <div class="flex items-center mb-3">
                        <img src="https://coderthemes.com/yum/assets/avatar3-2bbdc0fd.png" class="h-12 w-12 rounded-full me-4">
                        <div class="">
                            <div class="flex items-center gap-2 mb-2">
                                <h4 class="text-sm font-medium text-default-800">Marcus Baptista</h4>
                                <i class="fa-solid fa-circle text-[5px] text-default-400"></i>
                                <h4 class="text-sm font-medium text-default-400">2 days ago</h4>
                            </div>
                            <div class="flex gap-1.5">
                                <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                                <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                                <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                                <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                                <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                            </div>
                        </div>
                    </div>
                    <p class="text-default-600">ed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate.</p>
                </div><!-- end card -->

                <div class="border-b border-default-200 py-5">
                    <div class="flex items-center mb-3">
                        <img src="https://coderthemes.com/yum/assets/avatar4-85475652.png" class="h-12 w-12 rounded-full me-4">
                        <div class="">
                            <div class="flex items-center gap-2 mb-2">
                                <h4 class="text-sm font-medium text-default-800">Jaxson Donin</h4>
                                <i class="fa-solid fa-circle text-[5px] text-default-400"></i>
                                <h4 class="text-sm font-medium text-default-400">5 days ago</h4>
                            </div>
                            <div class="flex gap-1.5">
                                <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                                <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                                <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                                <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                                <span><i class="fa-solid fa-star text-base text-default-200"></i></span>

                            </div>
                        </div>
                    </div>
                    <p class="text-default-600">Vestibulum tincidunt blandit odio vel finibus.</p>
                </div><!-- end card -->

                <div class="py-5">
                    <div class="flex items-center mb-3">
                        <img src="https://coderthemes.com/yum/assets/avatar5-504b77fd.png" class="h-12 w-12 rounded-full me-4">
                        <div class="">
                            <div class="flex items-center gap-2 mb-2">
                                <h4 class="text-sm font-medium text-default-800">Hanna Aminoff</h4>
                                <i class="fa-solid fa-circle text-[5px] text-default-400"></i>
                                <h4 class="text-sm font-medium text-default-400">7 days ago</h4>
                            </div>
                            <div class="flex gap-1.5">
                                <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                                <span><i class="fa-solid fa-star text-base text-yellow-400"></i></span>
                                <span><i class="fa-solid fa-star text-base text-default-200"></i></span>
                                <span><i class="fa-solid fa-star text-base text-default-200"></i></span>
                                <span><i class="fa-solid fa-star text-base text-default-200"></i></span>
                            </div>
                        </div>
                    </div>
                    <p class="text-default-600">Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur.</p>
                </div><!-- end card -->
            </div><!-- end py -->
        </div>
    </section>

@endsection
