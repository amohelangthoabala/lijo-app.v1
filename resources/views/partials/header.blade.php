    <!-- Main Navigation Menu -->
    <header id="navbar" class="sticky top-0 z-20 border-b border-default-200 bg-transparent transition-all">
        <div class="lg:h-20 h-14 flex items-center">
            <div class="container">
                <div class="grid lg:grid-cols-3 grid-cols-2 items-center gap-4">
                    <div class="flex">
                        <!-- Mobile Menu Toggle Button -->
                        <button class="lg:hidden block " data-hs-overlay="#mobile-menu">
                            <i data-lucide="menu" class="w-7 h-7 text-default-600 me-4 hover:text-primary"></i>
                        </button>

                        <!-- Navbar Brand Logo -->
                        <a href="home.html">
                            <img src="https://coderthemes.com/yum/assets/logo-dark-6dbab3e1.png" alt="logo" class="h-10 flex dark:hidden">
                            <img src="https://coderthemes.com/yum/assets/logo-light-35c89c2c.png" alt="logo" class="h-10 hidden dark:flex">
                        </a>
                    </div>

                    <!-- Nevigation Menu -->
                    <ul class="menu lg:flex items-center justify-center hidden relative">
                        <!-- Home Menu -->
                        <li class="menu-item">
                            <a class="inline-flex items-center text-sm lg:text-base font-medium text-default-800 py-2 px-4 rounded-full hover:text-primary " href="/">Home </a>
                        </li>

                        <!-- Explore Menu -->
                        <li class="menu-item">
                            <a class="inline-flex items-center text-sm lg:text-base font-medium text-default-800 py-2 px-4 rounded-full hover:text-primary " href="/explore">Explore </a>
                        </li>

                        <!-- Product Menu -->
                        {{-- <li class="menu-item">
                            <div class="hs-dropdown relative inline-flex [--trigger:hover] [--placement:bottom]">
                                <a class="hs-dropdown-toggle after:absolute hover:after:-bottom-10 after:inset-0 inline-flex items-center text-sm lg:text-base font-medium text-default-700 py-2 px-4 rounded-full hover:text-primary" href="">Product <i class="w-4 h-4 ms-2" data-lucide="chevron-down"></i></a>

                                <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 min-w-[200px] transition-[opacity,margin] mt-4 opacity-0 hidden z-10 bg-white shadow-lg rounded-lg border border-default-100 p-1.5 dark:bg-default-50">
                                    <ul class="flex flex-col gap-1">
                                        <li>
                                            <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="product-grid.html">Product Grid</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="product-list.html">Product List</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="product-detail.html">Product Detail</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li> --}}

                        <!-- Mega Menu -->
                        {{-- <li class="menu-item">
                            <div class="hs-dropdown relative inline-flex [--trigger:hover] [--auto-close:inside]">
                                <a class="hs-dropdown-toggle after:absolute hover:after:-bottom-10 after:inset-0 inline-flex items-center text-sm whitespace-nowrap lg:text-base font-medium text-default-700 py-2 px-4 rounded-full hover:text-primary" href="">
                                    Mega Menu <i class="w-4 h-4 ms-2" data-lucide="chevron-down"></i>
                                </a>

                                <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 top-full inset-x-0 w-full min-w-full absolute mt-4 transition-[opacity,margin] opacity-0 hidden z-10 duration-300">
                                    <div class="container">
                                        <div class="bg-white shadow-lg rounded-lg border border-default-200 overflow-hidden dark:bg-default-50">
                                            <div class="grid grid-cols-12">
                                                <div class="col-span-2 text-sm">
                                                    <div class="bg-default-100 h-full w-full py-10 px-6">
                                                        <nav aria-label="Tabs" class="flex flex-col space-y-3.5" data-hs-tabs-vertical="true" role="tablist">
                                                            <button class="hs-tab-active:text-primary !bg-transparent inline-flex items-center text-base font-medium text-default-600 hover:text-primary transition-all active" data-hs-tab="#wraps" role="tab" type="button">
                                                                Wraps <i class="w-5 h-5 ms-auto" data-lucide="chevron-right"></i>
                                                            </button>
                                                            <button class="hs-tab-active:text-primary !bg-transparent inline-flex items-center text-base font-medium text-default-600 hover:text-primary transition-all" data-hs-tab="#noodles" role="tab" type="button">
                                                                Noodles <i class="w-5 h-5 ms-auto" data-lucide="chevron-right"></i>
                                                            </button>
                                                            <button class="hs-tab-active:text-primary !bg-transparent inline-flex items-center text-base font-medium text-default-600 hover:text-primary transition-all" data-hs-tab="#mexican" role="tab" type="button">
                                                                Mexican cuisine <i class="w-5 h-5 ms-auto" data-lucide="chevron-right"></i>
                                                            </button>
                                                            <button class="hs-tab-active:text-primary !bg-transparent inline-flex items-center text-base font-medium text-default-600 hover:text-primary transition-all" data-hs-tab="#tacos" role="tab" type="button">
                                                                Tacos <i class="w-5 h-5 ms-auto" data-lucide="chevron-right"></i>
                                                            </button>
                                                            <button class="hs-tab-active:text-primary !bg-transparent inline-flex items-center text-base font-medium text-default-600 hover:text-primary transition-all" data-hs-tab="#smart-meals" role="tab" type="button">
                                                                Smart Meals <i class="w-5 h-5 ms-auto" data-lucide="chevron-right"></i>
                                                            </button>
                                                            <button class="hs-tab-active:text-primary !bg-transparent inline-flex items-center text-base font-medium text-default-600 hover:text-primary transition-all" data-hs-tab="#burger" role="tab" type="button">
                                                                Burger <i class="w-5 h-5 ms-auto" data-lucide="chevron-right"></i>
                                                            </button>
                                                            <button class="hs-tab-active:text-primary !bg-transparent inline-flex items-center text-base font-medium text-default-600 hover:text-primary transition-all" data-hs-tab="#beverages-desserts" role="tab" type="button">
                                                                Beverages & Desserts <i class="w-5 h-5 ms-auto" data-lucide="chevron-right"></i>
                                                            </button>
                                                        </nav>
                                                    </div>
                                                </div>

                                                <div class="col-span-10">
                                                    <div class="py-10">
                                                        <div id="wraps" role="tabpanel">
                                                            <div class="grid grid-cols-4 divide-x divide-default-200">
                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Bean-Based Wraps</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Black Bean Wrap</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Refried Bean and Cheese Wrap</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Falafel Wrap</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Chickpea and Hummus Wrap</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Grilled Vegetable Wraps</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Grilled Veggie Wrap</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Roasted Red Pepper Wrap</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Portobello Mushroom Wrap</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Eggplant Parmesan Wrap</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Cheese and Spinach Wraps</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Spinach and Feta Wrap</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Paneer Tikka Wrap</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Caprese Wrap</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Chicken Wraps</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Grilled Chicken Wrap</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Buffalo Chicken Wrap</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Chicken Caesar Wrap</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Chicken Shawarma Wrap</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="hidden" id="noodles" role="tabpanel">
                                                            <div class="grid grid-cols-4 divide-x divide-default-200">

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Italian Pasta Dishes</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Spaghetti Bolognese</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Fettuccine Alfredo</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Lasagna</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Carbonara</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Penne alla Vodka</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Asian Noodle Dishes</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Ramen</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Pad Thai</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Pho</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Chow Mein</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Udon Stir-Fry</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Soba Noodles</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Lo Mein</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Chinese Noodle Dishes</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Beef Chow Fun</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Dan Dan Noodles</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Sesame Noodles</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Wonton Noodle Soup</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Zha Jiang Mian</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Japanese Noodle Dishes</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Yakisoba</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Tempura Udon</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Hiyashi Chukakies</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Sushi Rolls</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="hidden" id="mexican" role="tabpanel">
                                                            <div class="grid grid-cols-4 divide-x divide-default-200">
                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Thai Noodle Dishes</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Drunken Noodles</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Tom Yum Noodle Soup</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Green Curry Noodles</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Glass Noodle Salad</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">Indian Noodle Dishes</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Veg Hakka Noodles</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Maggi Noodles</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Masala Instant Noodles</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">Korean Noodle Dishes</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Japchae</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Jajangmyeon</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Ramyeon</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Naengmyeon</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Western Noodle Dishes</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Chicken Noodle Soup</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Beef Stroganoff</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Tuna Noodle Casserole</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Macaroni and Cheese</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="hidden" id="tacos" role="tabpanel">
                                                            <div class="grid grid-cols-4 divide-x divide-default-200">
                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Tacos</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Street Tacos</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Carnitas Tacos</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Barbacoa Tacos</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Fish Tacos</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Vegetarian Tacos</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Enchiladas</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Chicken Enchiladas</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Cheese Enchiladas</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Beef Enchiladas</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Suizas Enchiladas</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Tamales</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Pork Tamales</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Chicken Tamales</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Sweet Tamales</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Quesadillas</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Cheese Quesadillas</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Chicken Quesadillas</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Vegetarian Quesadillas</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="hidden" id="smart-meals" role="tabpanel">
                                                            <div class="grid grid-cols-3 divide-x divide-default-200">
                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Balanced Meals</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Grilled chicken breast with steamed broccoli and quinoa</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Baked salmon with asparagus and brown rice</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Low-Carb Meals</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Cauliflower rice stir-fry with tofu and mixed vegetables</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Zucchini noodles with pesto and grilled shrimp</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        High-Protein Meals</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Lean beef or turkey burger with a side salad</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Greek yogurt parfait with berries and nuts</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="hidden" id="burger" role="tabpanel">
                                                            <div class="grid grid-cols-4 divide-x divide-default-200">
                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">Classic Burgers</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Cheeseburger</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Bacon Cheeseburger</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Double Cheeseburger</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Triple Cheeseburger</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Classic Veggie Burger</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Patty Variations</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Turkey Burger</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Chicken Burger</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Bison Burger</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Salmon Burger</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Black Bean Burger</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Portobello Mushroom Burger</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Flavorful Toppings</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">BBQ Burgerges</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Mushroom Swiss Burger</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Western/Cowboy Burger</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Blue Cheese Burger</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Jalapeño Burger</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Guacamole Burger</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Breakfast Burger</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Avocado Burger</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Caprese Burger</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Mediterranean Burger</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Tex-Mex Burger</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Reuben Burger</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="hidden" id="beverages-desserts" role="tabpanel">
                                                            <div class="grid grid-cols-4 divide-x divide-default-200">
                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">Coffee Based</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Espresso</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Cappuccino</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Latte</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Americano</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Mocha</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Macchiato</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Tea</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Black Tea</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Green Tea</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Herbal Tea</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Chai Tea</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Earl Grey</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Cakes</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Chocolate Cake</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Carrot Cake</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Red Velvet Cake</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Cheesecake</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="ps-6">
                                                                    <h6 class="text-base font-medium text-default-800">
                                                                        Cookies & Pastries</h6>
                                                                    <ul class="grid space-y-3 mt-4">
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Chocolate Chip Cookies</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Oatmeal Raisin Cookies</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Peanut Butter Cookies</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Sugar Cookies</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Croissant</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-sm font-medium text-default-600 hover:text-primary transition-all" href="">Danish Pastry</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li> --}}

                        <!-- Pages Menu -->
                        {{-- <li class="menu-item">
                            <div class="hs-dropdown relative inline-flex [--trigger:hover] [--placement:bottom]">
                                <a class="hs-dropdown-toggle after:absolute hover:after:-bottom-10 after:inset-0 inline-flex items-center text-sm lg:text-base font-medium text-default-700 py-2 px-4 rounded-full hover:text-primary" href="">
                                    Pages <i class="w-4 h-4 ms-2" data-lucide="chevron-down"></i>
                                </a>

                                <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 min-w-[200px] transition-[opacity,margin] mt-4 opacity-0 hidden z-10 bg-white shadow-md rounded-lg border border-default-100 p-1.5 dark:bg-default-50">
                                    <ul class="flex flex-col gap-1">
                                        <li>
                                            <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="cart.html">Cart</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="wishlist.html">Wishlist</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="checkout.html">Checkout</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="faqs.html">FAQs</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="contact-us.html">Contact Us</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="error-404.html">Error 404</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="auth-login.html">Login</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="auth-register.html">Register</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="auth-recoverpw.html">Forgot Password</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="auth-reset-password.html">Reset Password</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li> --}}

                        <!-- Admin Link -->
                        <li class="menu-item">
                            <a class="inline-flex items-center text-sm lg:text-base font-medium text-default-700 py-2 px-4 rounded-full hover:text-primary" href="/admin/" target="_blank">Admin</a>
                        </li>
                    </ul>

                    <ul class="flex items-center justify-end gap-x-6">
                        <!-- Search Form Input -->
                        <li class="2xl:flex relative menu-item hidden">
                            <input class="ps-10 pe-4 py-2.5 block w-64 border-transparent placeholder-primary-500 rounded-full text-sm bg-primary-400/40 text-primary" placeholder="Search for items..." type="search">
                            <span class="absolute start-4 top-3">
                                <i class="w-4 h-4 text-primary-500" data-lucide="search"></i>
                            </span>
                        </li>

                        <!-- Search Button (small screen) -->
                        <li class="2xl:hidden flex menu-item">
                            <button data-hs-overlay="#mobileSearchSidebar" class="relative flex text-base transition-all text-default-600 hover:text-primary">
                                <i class="w-5 h-5" data-lucide="search"></i>
                            </button>
                        </li>

                        <!-- Cart Page link -->
                        <li class="flex menu-item">
                            <a href="cart.html" class="relative flex text-base transition-all text-default-600 hover:text-primary">
                                <i class="w-5 h-5" data-lucide="shopping-bag"></i>
                                <span class="absolute z-10 -top-2.5 end-0 inline-flex items-center justify-center p-1 h-5 w-5 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 bg-red-500 rounded-full">1</span>
                            </a>
                        </li>

                        <!-- User Dropdown -->
                        <li class="flex menu-item">
                            <div class="hs-dropdown relative inline-flex [--trigger:hover] [--placement:bottom]">
                                <a class="hs-dropdown-toggle after:absolute hover:after:-bottom-10 after:inset-0 relative flex items-center text-base transition-all text-default-600 hover:text-primary" href="">
                                    <i class="w-5 h-5" data-lucide="user"></i>
                                </a>

                                <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 min-w-[200px] transition-[opacity,margin] mt-4 opacity-0 hidden z-20 bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] rounded-lg border border-default-100 p-1.5 dark:bg-default-50">
                                    <ul class="flex flex-col gap-1">
                                        <li>
                                            <a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="admin-dashboard.html" target="_blank"><i class="h-4 w-4" data-lucide="user-circle"></i> Admin</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="cart.html"><i class="h-4 w-4" data-lucide="shopping-cart"></i>
                                                Cart</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="wishlist.html"><i class="h-4 w-4" data-lucide="heart"></i>
                                                Wishlist</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="auth-login.html"><i class="h-4 w-4" data-lucide="log-out"></i> Log Out</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
