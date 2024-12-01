@extends('layouts.app')

@section('title', 'Cart')

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


                    <li aria-current="page" class="text-sm font-medium text-primary truncate leading-none hover:text-primary-500">
                        Cart
                    </li>
                </ol>
            </div>
        </div>
    </section>
    <section class="lg:py-10 py-6">
        <div class="container">
            <div class="grid lg:grid-cols-3 grid-cols-1 gap-6">
                <div class="lg:col-span-2 col-span-1">
                    <div class="border border-default-200 rounded-lg">
                        <div class="border-b border-default-200 px-6 py-5">
                            <h4 class="text-lg font-medium text-default-800">Shopping Cart</h4>
                        </div>

                        <div class="flex flex-col overflow-hidden">
                            <div class="-m-1.5 overflow-x-auto">
                                <div class="p-1.5 min-w-full inline-block align-middle">
                                    <div class="overflow-hidden">
                                        <table class="min-w-full divide-y divide-default-200">
                                            <thead class="bg-default-400/10">
                                                <tr>
                                                    <th scope="col" class="min-w-[14rem] px-5 py-3 text-start text-xs font-medium text-default-500 uppercase">Products</th>
                                                    <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-default-500 uppercase">Price</th>
                                                    <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-default-500 uppercase">Quantity</th>
                                                    <th scope="col" class="px-5 py-3 text-center text-xs font-medium text-default-500 uppercase">Sub-Total</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-default-200">
                                                <tr>
                                                    <td class="px-5 py-3 whitespace-nowrap">
                                                        <div class="flex items-center gap-2">
                                                            <button><i data-lucide="x-circle" class="w-5 h-5 text-default-400"></i></button>
                                                            <img src="https://coderthemes.com/yum/assets/onion-rings-6902e6d8.png" class="h-18 w-18">
                                                            <h4 class="text-sm font-medium text-default-800">Onion Rings</h4>
                                                        </div>
                                                    </td>
                                                    <td class="px-5 py-3 whitespace-nowrap text-sm text-default-800">$29</td>
                                                    <td class="px-5 py-3 whitespace-nowrap">
                                                        <div class="inline-flex justify-between border border-default-200 p-1 rounded-full">
                                                            <button type="button" class="minus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center">–</button>
                                                            <input type="text" class="w-8 border-0 text-sm text-center text-default-800 focus:ring-0 p-0 bg-transparent" value="1" min="0" max="100" readonly="">
                                                            <button type="button" class="plus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center">+</button>
                                                        </div>
                                                    </td>
                                                    <td class="px-5 py-3 whitespace-nowrap text-sm text-center text-default-800">$50</td>
                                                </tr>

                                                <tr>
                                                    <td class="px-5 py-3 whitespace-nowrap">
                                                        <div class="flex items-center gap-2">
                                                            <button><i data-lucide="x-circle" class="w-5 h-5 text-default-400"></i></button>
                                                            <img src="https://coderthemes.com/yum/assets/burrito-bowl-79a7c64f.png" class="h-18 w-18">
                                                            <h4 class="text-sm font-medium text-default-800">Burrito Bowl</h4>
                                                        </div>
                                                    </td>
                                                    <td class="px-5 py-3 whitespace-nowrap text-sm text-default-800">$50</td>
                                                    <td class="px-5 py-3 whitespace-nowrap">
                                                        <div class="inline-flex justify-between border border-default-200 p-1 rounded-full">
                                                            <button type="button" class="minus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center">–</button>
                                                            <input type="text" class="w-8 border-0 text-sm text-center text-default-800 focus:ring-0 p-0 bg-transparent" value="3" min="0" max="100" readonly="">
                                                            <button type="button" class="plus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center">+</button>
                                                        </div>
                                                    </td>
                                                    <td class="px-5 py-3 whitespace-nowrap text-sm text-center text-default-800">$150</td>
                                                </tr>

                                                <tr>
                                                    <td class="px-5 py-3 whitespace-nowrap">
                                                        <div class="flex items-center gap-2">
                                                            <button><i data-lucide="x-circle" class="w-5 h-5 text-default-400"></i></button>
                                                            <img src="https://coderthemes.com/yum/assets/garlic-herb-bread-8a00951d.png" class="h-18 w-18">
                                                            <h4 class="text-sm font-medium text-default-800">Garlic & Herb Bread</h4>
                                                        </div>
                                                    </td>
                                                    <td class="px-5 py-3 whitespace-nowrap text-sm text-default-800">$42</td>
                                                    <td class="px-5 py-3 whitespace-nowrap">
                                                        <div class="inline-flex justify-between border border-default-200 p-1 rounded-full">
                                                            <button type="button" class="minus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center">–</button>
                                                            <input type="text" class="w-8 border-0 text-sm text-center text-default-800 focus:ring-0 p-0 bg-transparent" value="2" min="0" max="100" readonly="">
                                                            <button type="button" class="plus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center">+</button>
                                                        </div>
                                                    </td>
                                                    <td class="px-5 py-3 whitespace-nowrap text-sm text-center text-default-800">$84</td>
                                                </tr>

                                                <tr>
                                                    <td class="px-5 py-3 whitespace-nowrap">
                                                        <div class="flex items-center gap-2">
                                                            <button><i data-lucide="x-circle" class="w-5 h-5 text-default-400"></i></button>
                                                            <img src="https://coderthemes.com/yum/assets/red-velvet-pastry-b09214ba.png" class="h-18 w-18">
                                                            <h4 class="text-sm font-medium text-default-800">Red Velvet Pastry</h4>
                                                        </div>
                                                    </td>
                                                    <td class="px-5 py-3 whitespace-nowrap text-sm text-default-800">$68</td>
                                                    <td class="px-5 py-3 whitespace-nowrap">
                                                        <div class="inline-flex justify-between border border-default-200 p-1 rounded-full">
                                                            <button type="button" class="minus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center">–</button>
                                                            <input type="text" class="w-8 border-0 text-sm text-center text-default-800 focus:ring-0 p-0 bg-transparent" value="1" min="0" max="100" readonly="">
                                                            <button type="button" class="plus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center">+</button>
                                                        </div>
                                                    </td>
                                                    <td class="px-5 py-3 whitespace-nowrap text-sm text-center text-default-800">$68</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-default-200 px-6 py-5">
                            <div class="flex flex-wrap justify-between items-center gap-2">
                                <button class="inline-flex items-center justify-center rounded-full border border-primary text-primary hover:bg-primary hover:text-white px-6 py-3 text-center text-sm font-medium shadow-sm transition-all duration-500">
                                    Return to Shop
                                </button>

                                <button class="inline-flex items-center justify-center rounded-full border border-primary text-primary hover:bg-primary hover:text-white px-6 py-3 text-center text-sm font-medium shadow-sm transition-all duration-500">
                                    Update Cart
                                </button>
                            </div>
                        </div>
                    </div><!-- end grid-cols -->
                </div>

                <div>
                    <div class="border border-default-200 rounded-lg p-5 mb-5">
                        <h4 class="text-lg font-semibold text-default-800 mb-5">Cart Totals</h4>
                        <div class="mb-6">
                            <div class="flex justify-between mb-3">
                                <p class="text-sm text-default-500">Sub-total</p>
                                <p class="text-sm text-default-700 font-medium">$320</p>
                            </div>
                            <div class="flex justify-between mb-3">
                                <p class="text-sm text-default-500">Delivery</p>
                                <p class="text-sm text-default-700 font-medium">Free</p>
                            </div>
                            <div class="flex justify-between mb-3">
                                <p class="text-sm text-default-500">Discount</p>
                                <p class="text-sm text-default-700 font-medium">$24</p>
                            </div>
                            <div class="flex justify-between mb-3">
                                <p class="text-sm text-default-500">Tax</p>
                                <p class="text-sm text-default-700 font-medium">$61.99</p>
                            </div>
                            <div class="border-b border-default-200 my-4"></div>
                            <div class="flex justify-between mb-3">
                                <p class="text-base text-default-700">Total</p>
                                <p class="text-base text-default-700 font-medium">$357.99 USD</p>
                            </div>
                        </div>

                        <a href="checkout.html" class="w-full inline-flex items-center justify-center rounded-full border border-primary bg-primary px-10 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">Proceed to Checkout</a>
                    </div>

                    <div class="border border-default-200 rounded-lg">
                        <div class="px-6 py-5 border-b border-default-200">
                            <h4 class="text-lg font-semibold text-default-800">Coupon Code</h4>
                        </div>
                        <div class="p-6">
                            <input id="LoggingEmailAddress" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200" type="text" placeholder="Enter Coupon Code">

                            <div class="flex justify-end mt-4">
                                <button class="inline-flex items-center justify-center rounded-full border border-primary bg-primary px-6 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
