@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <!-- Hero Section -->
    <section class="lg:py-16 py-6 relative">
        <div class="absolute inset-0 blur-[60px] bg-gradient-to-l from-orange-600/20 via-orange-600/5 to-orange-600/0"></div>
        <div class="container relative">
            <div class="grid lg:grid-cols-2 items-center">
                <div class="py-20 px-10">
                    <div class="flex items-center justify-center lg:justify-start order-last lg:order-first z-10">
                        <div class="text-center lg:text-start">
                            <span class="inline-flex py-2 px-4 text-sm text-primary rounded-full bg-primary/20 mb-8 lg:mb-2">#Special Food 🍇</span>
                            <h1 class="lg:text-6xl/normal md:text-5xl/snug text-3xl font-bold text-default-950 capitalize mb-5">Your
                                <span class="inline-flex relative">
                                    <span>Favourite</span>
                                    <img src="data:image/png;base64,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" class="absolute -z-10 h-full w-full lg:flex hidden">
                                </span>
                                <span class="text-primary">Food</span> Freshly Delivered
                            </h1>
                            <p class="text-lg text-default-700 font-medium mb-8 md:max-w-md lg:mx-0 mx-auto">Explore your favorite dishes from top-rated restaurants, delivered fresh to your doorstep with Lijo</p>
                            <div class="flex flex-wrap items-center justify-center lg:justify-normal gap-5 mt-10">
                                <a href="javascript:void(0)" class="py-5 px-10 font-medium text-white bg-primary rounded-full hover:bg-primary-500 transition-all">Order Now</a>
                                <a href="javascript:void(0)" class="text-primary flex items-center">
                                    <span class="h-14 w-14 rounded-full border-2 border-e-transparent border-yellow-400 flex items-center justify-center me-2">
                                        <i data-lucide="play" class="h-6 w-6 fill-primary"></i>
                                    </span>
                                    <span class="font-semibold">How to Order</span>
                                </a>
                            </div>
                            <div class="mt-14">
                                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4">
                                    <div class="flex items-center -space-x-1">
                                        <div class="h-12 w-12">
                                            <img class="h-full w-full rounded-full object-cover object-center ring ring-default-50" src="https://coderthemes.com/yum/assets/avatar1-25906796.png" />
                                        </div>
                                        <div class="h-12 w-12">
                                            <img class="h-full w-full rounded-full object-cover object-center ring ring-default-50" src="https://coderthemes.com/yum/assets/avatar2-189b0d01.png" />
                                        </div>
                                        <div class="h-12 w-12">
                                            <img class="h-full w-full rounded-full object-cover object-center ring ring-default-50" src="https://coderthemes.com/yum/assets/avatar3-2bbdc0fd.png" />
                                        </div>
                                    </div>
                                    <div>
                                        <h1 class="text-base font-medium text-default-800">Our Happy Customer</h1>
                                        <p class="text-base text-default-900"><i data-lucide="star" class="h-4 w-4 inline text-yellow-400 fill-yellow-400"></i> 4.7 <span class="text-default-500 text-sm">(13.7k Reviews)</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end grid-col -->

                <div class="relative flex items-center justify-center py-20">
                    <span class="absolute top-0 start-0 text-3xl -rotate-[40deg]">🔥</span>
                    <span class="absolute top-0 end-[10%] -rotate-12 h-14 w-14 inline-flex items-center justify-center bg-yellow-400 text-white rounded-lg">
                        <i data-lucide="clock-3" class="h-6 w-6"></i>
                    </span>
                    <span class="absolute top-1/4 end-0 -rotate-12 h-4 w-4 inline-flex items-center justify-center bg-primary text-white rounded"></span>
                    <div class="absolute bottom-1/4 -end-0 2xl:-end-24 hidden md:block lg:hidden xl:block">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFQAAACpCAMAAACCueo0AAAAQlBMVEUAAAD/xwD/xwD/ywD/xwD/xgD/xwD/xwD/xgD/xgD/xwD/xwD/xwD/xwD/xQD/wwD/xwD/xwD/xwD/yAD/xgD/xwBcJNpgAAAAFXRSTlMAIN8Q72C/nzCQcFDPQIBAgI+vf6De6s6XAAADjklEQVRo3u2a626jMBCFPb7hGzQhnfd/1XUEuwQoWzscS6ma86eVqn6ZwZ5rEEKJBuqkgzMNM18VGioz1Quw6JO5E3CZoMRPUidvcCbdbwGcmjI1EZrqM1XCqZdM1R9oatQZG9FUki0CgZKO4rfLjVc81LY4rsAtqJcfRr01oRo49RNfD7MG/7NKVwuFq4IzI7OFQ/ulxoKva4BTPzPVoaEqMUv4YZFudVgfcOoF/1SzYi9+uz4inkmnw1U5Y4Kaf51+ulP3SoVR8l2juEsya3uNTownAuvGk+YKrXiWzFAenoTKO0GnsZvdvyTN/6TpOWiQNmz+VfWDzWT7TIel/nsOvVH3HGBsMnX9fvi+GbxLFmNddtB/nwS9rMCSLJmhFAky5dixYi7L2KLCZeoK0SVjU8ntHOoWDzIWGFrqfJdMeRk2xclKP1pjxKHI2tJcoR+TlQEN85fHWI2gYb7P/qv1MA+otHKVrHsNGQ38OpxJfk0lm1yV/1JsqfsEF6vypMoOqy3V76eQutnGstx5SntoXYyqWHCnJyhA7aEGMjCHFOFQ2hRwd8+4Fbp+1VUpuW7ila6DMvNXQbEpMdHTeajwS6qpFy1xunsAw4nkZw+nGHr+Bo5F6yylqnLfcDxwrRJNqFkzfxwW0G51U3XNQvz4j9saWZ5Pu+IaaYtNNar041vMtJ8Fplb346RBa3PJdvVUZUG/na7fJwb1ELkFUJLftrF25TF5B+jht71GkZ3sYNuxhWmKG9hF5nronStgzsG5ZrjjZ6YyU5uyfON2gaXDUcxJ91yr7zKVuy+NpUCl6TbuT2OLVTdTdUdGv3fT36npXyQHC1hLzld8nqtnGcRyb3BTxE2yUUC/ltGpMy+xl29hhAGvcJfch1YCV7sl9cO070te+yuMv+3by5+TanROVsDlpRNvvbrcQHAmyQb36cacGhjKpoGhEm4oNzC0a2MoPuk1eStIsyY4NHbvN42Aoi4A4jEe7L5PqN9syq7MTIB4DJvvLwdE7KR1F+8BLdgmyp2FZCN8G6J5MRX5YjH8LeBxgmoF7RVnDWjv0UdlZ6YmZCWaFRp4303bBaj3Uk3rH2mA3pMQYcYbAnk/CLL8V/J2Epvm9z6C5kd1dNp76ezCOx+0foLqDVKfslTyXtr36uQ4tydC0vMiuRBB3ttLLxDqF2IgXKs8ExW2rdUWvVDzL7Kie+utt36V/gAoj0UJQoRlYQAAAABJRU5ErkJggg==">
                        <div class="flex items-center gap-2 p-2 pe-6 bg-default-50 rounded-full shadow-lg">
                            <img src="https://coderthemes.com/yum/assets/avatar1-25906796.png" class="h-16 w-16 rounded-full">
                            <div class="">
                                <h6 class="text-sm font-medium text-default-900">Jakob Culhane</h6>
                                <p class="text-[10px] font-medium text-default-900">Healthy and Delicious Food</p>
                                <span class="inline-flex gap-0.5">
                                    <i data-lucide="star" class="h-3 w-3 text-yellow-400 fill-yellow-400"></i>
                                    <i data-lucide="star" class="h-3 w-3 text-yellow-400 fill-yellow-400"></i>
                                    <i data-lucide="star" class="h-3 w-3 text-yellow-400 fill-yellow-400"></i>
                                    <i data-lucide="star" class="h-3 w-3 text-yellow-400 fill-yellow-400"></i>
                                    <i data-lucide="star" class="h-3 w-3 text-default-200 fill-default-200"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <span class="absolute bottom-0 end-0 -rotate-12 h-4 w-4 inline-flex items-center justify-center bg-primary text-white rounded-full"></span>
                    <span class="absolute -bottom-16 end-1/3 text-3xl">🔥</span>
                    <div class="absolute bottom-0 start-0">
                        <div class="flex items-center gap-2 p-2 pe-6 bg-default-50 rounded-full shadow-lg">
                            <span class="inline-flex items-center justify-center h-16 w-16 bg-primary/20 rounded-full"><img src="https://coderthemes.com/yum/assets/burger-1-0c3ba5a6.svg" class="h-10 w-10 rounded-full"></span>
                            <div class="">
                                <h6 class="text-sm font-medium text-default-900">MCD Veg Burger</h6>
                                <span class="inline-flex gap-0.5">
                                    <i data-lucide="star" class="h-3 w-3 text-yellow-400 fill-yellow-400"></i>
                                    <i data-lucide="star" class="h-3 w-3 text-yellow-400 fill-yellow-400"></i>
                                    <i data-lucide="star" class="h-3 w-3 text-yellow-400 fill-yellow-400"></i>
                                    <i data-lucide="star" class="h-3 w-3 text-yellow-400 fill-yellow-400"></i>
                                    <i data-lucide="star" class="h-3 w-3 text-default-200 fill-default-200"></i>
                                </span>
                                <h6 class="text-sm font-medium text-default-900"><span class="text-sm text-primary">$</span> 8.14</h6>
                            </div>
                        </div>
                    </div>
                    <!-- end icons && img -->

                    <img src="https://coderthemes.com/yum/assets/hero-f578fbc8.png" class="mx-auto">
                </div><!-- end grid-col -->
            </div><!-- end grid -->
        </div><!-- end container -->
    </section>

    <!-- About Us Section -->
    <section class="lg:py-16 py-6">
        <div class="container">
            <div class="grid lg:grid-cols-2 items-start gap-10">
                <div class="flex items-center justify-center h-full w-full bg-default-500/5 rounded-lg">
                    <img src="https://coderthemes.com/yum/assets/about-us-d5778dfe.png" class="h-full w-full">
                </div>
                <div class="">
                    <span class="inline-flex py-2 px-4 text-sm text-primary rounded-full bg-primary/20 mb-6">About Lijo</span>
                    <h2 class="text-3xl font-semibold text-default-900 max-w-xl mb-6">Where Hunger Meets Happiness.</h2>
                    <p class="text-default-500 font-medium max-w-2xl mb-16 xl:mb-20">It’s the perfect dining experience where every dish is crafted with fresh, high-quality ingredients and served by friendly staff who go.</p>

                    <div class="grid xl:grid-cols-3 sm:grid-cols-2 gap-6">
                        <div class="bg-transparent rounded-md shadow-lg border border-default-100 hover:border-primary transition-all duration-200">
                            <div class="p-6">
                                <div class="mb-6">
                                    <img src="data:image/png;base64,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" class="">
                                </div>
                                <h3 class="text-xl font-medium text-default-900 mb-6">Easy-to-Use App</h3>
                                <p class="text-base text-default-500"> Browse, order, and track. Finding your next meal has never been easier.</p>
                            </div>
                        </div><!-- end grid-cols -->
                        <div class="bg-transparent rounded-md shadow-lg border border-default-100 hover:border-primary transition-all duration-200">
                            <div class="p-6">
                                <div class="mb-6">
                                    <img src="https://coderthemes.com/yum/assets/vegetables-5e491677.png" class="">
                                </div>
                                <h3 class="text-xl font-medium text-default-900 mb-6">Diverse Choices</h3>
                                <p class="text-base text-default-500">From local gems to international cuisine, there’s something for everyone.</p>
                            </div>
                        </div><!-- end grid-cols -->
                        <div class="bg-transparent rounded-md shadow-lg border border-default-100 hover:border-primary transition-all duration-200">
                            <div class="p-6">
                                <div class="mb-6">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAzESURBVHgB7VoJdFTVGf4ms2VfyAKEBAiENQgSQBMhASJQzALlWFk84NJa61qsHrGnVi2nNih6etRWPO2prcqhHJQ9uIQCJoQQ4JCAyBIMSHayb5OZ7Hn9//vmDZPJTJgJaLHOd86X+5Z733v/f//t3gnghhtuuOGGG2644caPEyrcPOiJicQU4kxiFHGI+V4d8QrxFPEz4n6ihP8TBBJfITZCFkpQp9NJYWFhUkhIiKTRaCTre8Ri4jrz2P8pbtQClhP/QgwjITE3cS6WLFmCxIREjBgxAh4eHqKTJEkoKirC6dOnsTdjL77I/EIZX0z8LXEbfmBgxb0B84zev+p+6czpM1JdTV0f1tfWC9peP5V/Slq5cqW1RfwRPyCw8O8TpaFDh0q7d+62CNZQ2yAZDUaps7NT6u3tlebOnSstXrxY6unpkTo7OqVWQ6vUUNdg6b9l8xYpPDxcUcJf8QPBn4jSyJEjxUwqgptMJiG0NXx9fUUMsEWbsc2iiIKTBVJkZKSihHTc4lhDlCIiIizCN9Y3Sj3dPZI9rFq1SnrggQfs3uMxPJafkX8yXygKshJScIsiFHLQknbt2GURvrenV3IVNTU1Unx8vLRgwQKLErZt3aYooILoj1sQL8Ec8JQA52jmryf85MmThbDJyclSd3e3JVBSBlGU8HvcYuB8VkK0mH6bqU1yFSx8TEyMEDIuLk5qbm4W141Go3hm3tE8SaVS8f0qohq3EJKJUkpyimz6dY2Sq3AkPIODpxIUE+YkKFYwD98DPJzsxwpAWlqaONHqtXAFtbW1mD9/Ps6dOwcSHpmZmfD3v+bmNOvQe+rFcVpqmnJ5MW4hHCFKx/OOi1nq6uwacLZ5RtevXy/qhDFjxkhUFdqdeWtwnaC4AfdVq1QHpXue1jPpfDvR6IAG4ibc3HVNP1RqtVqprlouYGzzvS1eeOEFWQgPteLT0vjx4x0Kz+BiiZ9dWV4pUQktjfD0looW3SddWrxCujd6ohTs6WWXWuoL2WVuxyCgcbLfkMDAQIuO582bh1OnTmHRokXYvn17v85bt26Fh8oDSxYtE9+2O3MnqFDqY/YK2K2ys7ORkJCAjz74CLSIgp+fHwymNnGftI135i1y+GGLdm3FufpaPjxG7IRj8Er0Qcip3AJnFdDLfipADVV44kMDAgLsdqZSGEp/MT20GGKh7MHb21s8i1vLy0holXT91fJVY6sQ3lungZdeza6it+cIHV29aG3r4qX6R5CX7BY4q4DGpqYmL/4wXuHt27fPIqAtOODp9Xr09PbQzO+wXF+9erXd/tu2yQtBKqjQ2NCIrq4utLa2YqSXj7iu8nAcp09UV8rPTozC3355F+BJmTNIb7dv+LIPcbXedIftdWcV8C3NanhFeQUiR0aip6sHGl3/oUq0LykpQXR0NNRqtTD9J598EhQXBnwBxQDRnj9/XlgMxQBxrtI6/sQDpVdEmxo7Ur7g6bivWi0U2a+DswrIJ87JOpyFNavXCBO3p4CUlBSHqe566OjoEO2ZM2dEe1uAvJnkMUDKPVFVCTbEORNDxXljexde+/AENmd+A1N7d5++zUYRHvqZrbN1QAb/2bN3jzhpb28Xs2QL2gESgdFV4flZlFrF8Z4M+R1zgoeKVu1p36QvNNSjvNWA+HFhCPLRo5tEi3tqJzb++zTqWnrQq/GBpL1GM/opwFkLyCE25OTkDCktLQUthdHe1g4vb68+nTg2DAb8LI4vxcXFyMrKIvP3QdyQMKg0Hg4VoPh/0pRhot2SfRnflDVjSmw8Nv7jU4SFBCHA81r/eTNGo6KshBXAtMyesxbA9vMO++mG1zaIC7QWsPjtjYAFbzOnvI1vbBTto2MmiFZto2BrHDT7/8Kp4aLdfqxYHvtcOvwCgvqFA5XKvqjOKoDxFrHqk+2fICs7S5itodkgBBgseGxzU7N41s6dO/HxJx+L2b83PIq/GFpfH/vjqD/7vy9JOXtCGNgbjxTWUDnthakz54g+ahvJrLJWnzuuKKCZ+BgfPP7E42BXYAtgARwpITU1FStWrLB7j5bS8lhKfyWlJXjp5ZfE9Vcm3Q49pT6tvw+5gP0F4cnqqzB0dWLOhKEkqApHi2rQREFu2qxEqDXy1NdRkVxluMbea+6vGqwCGByhXud0t3TZUpSWlQoBmhqaLGZsDa7wDh061OcazzZtiVmEZ79f+tOlqK6pxlNjYzA/NFwIrvX3dfgRhytKRZs6I0K0RdUG0U6YMsPhGCsX6KMAZ4OgNXgb26+srOyJ1LRUbEjfAFomw2Q0iezAVR1TQ/mby1s/Xz9hIbTxISI9pzupV45Bn3/xOdY+sxYNDQ34+agJWDt2sjBVz7Bg4QKOcKSyTLQJE+VMMWl8iGg3v5eO3Vveszum1dCkHHLRcBn2tOEieCtb7NysXLES655fJ7KDM7hQeAHp6elCAQyeeRaeoQsNgsbL0+HYls4OTN78d0QM8ULppvtkCYZ5450dZ/Herq9RWW+yO66HJsHYJmqDdsi7W2/yCQ/PJsbAOXCee0g5WTNq3KZD1RWPV7TLL7076W6xuJk2dRomTZoEjdkfeda5Osw5koOMjAzkHs0VrjCcglZ6zCw559OM64YEQOPjNeAHHCgrxoOZe3H/7Chs+TWV9XqKE0P0Tn18+uYCvPz+CVKGsMBdxKf4C3Vmuow/TJoe8SzN3s7KEvyz+CIOHjooyGBT5kUTrx0Mhr7ZIkzvidUjx+HByGh4k5LY5/XBQQNWfQoOlMjpLyVW9n+hACfxuzWxWJ40Fgt/k4HiKgMvVQNvaBOh6CfL62kqlR9AcbS+Bjn1VTjX0oiKNhMauzqEiflqtIjy9sMUys8JwcMwKyiElsvyq9U047og/wEXPdZI2rEFFxvrUfruzxAZQmkylNxF41osbzV1YdTyzWho6egcrAJG08BD6yfHRq2KGAuXQcKrPXUi0nvonTe+MkML4rZ9II5D/c1xwgnZX1wzA2vvm4qaxjYkPbOXWhNqmzgUoNA2Cxwg3ubgOez/vzAfJ5MXRdW2i4dATUFLF+CLHoryve0d6O3qhkR5XlkvqChXq2hl6KHTCoG5wuNrrkIpf7U0VgQ0pbAdAKwfYy3FqCoTdFQrdNIiqanVsm9y1FYBvmbag7WDip3Lu0LkNKTxI4FIOA0Rvt74rqAsf/c8PBf3TKQSOJj838dJ86e5CPTW4Zu3luGhTUfwYbbIhJ/aKiDOiUdx1JnjQ8ErNiBYXPDQOReFbxQnqq6Kyi8hKky+oB+cB3PZrBwOphCaTfSdGRgqAhlHbmtzbqGU9/75r8RipZK2rIb5+CItKhqPTJlOputq4XkNZ2nrq8rUKoT31dNna+mdmr4KaKHg9u7+QnxWUIFvawwYFuiF5OkjsC5tCvy8ZQMurGjCZblyPE6sGUgBmcRp5uO9xEfNxwv5T1LocPmM3ZzzKimhoOYqHjnwGapNRnGLUyAff1VbjS/LS7DtnmUOt9Kuh+NVsv8vHC+7HWwy5teljUh9/SBK6669u5KCXcGVeuwrKMexV5Oh16qRU1irDOH6Z8BSOMBMhnV1ksR/ZgbJ5WcvBT5TRTUuG1uwIu8ATD3diB41jsrTGAT6B8JgNODL3IPIrSxHRn4BFgwdgcFgf1GhaO+Oltf/MJHSy+RNlOKGViS9nUkLoA6MihiNmPG3ITgomHaWDTicl4XTxfX4YNdF/Cp+HPblliiPzBSKGuCdcWbBmWvM1/h/euLDab9uvK/VjjBF+0fyDwvhp02ejviZs4XwDD8fP7omb9lzjSDWri6ym4qok411CPLSIX5UiNV7ZS7912Eh/DRaSSbeOU8IL95Ntcf0KbHiOPdKLbIvV2PfeWFJHAR4k8fltQDvVBTyoFB933q9pqMdw0KHYWHiYjRRIZSd9yXumB6P4WHDUVFVjkO5B8CB00c9mLAjP58x3L9/qXy1pQ0BfgHidwie9YM5/8H0mFhhDdV11dif/Tn0VCx1dFuq0edhXgu4+jUXiW+R0h+jD7JWHj9HPTpyjDjpoE3TDqoCu7vkfFtC9TvD2N3dQcSNgIW1gXj32NHjxAlv2PbQO3hbnvFt8SX5m7p7edf1AvHPxM3K4Jv1e9qrxBfvot2YsaOi+9y4VFyEvPxcPiwmToX8W97NxHPEN2dNuxMToyf1uaFYHuSf22cRy20HDz4v9UUW/zl38SxaKfUxOskCCs7m41jBUaXPs7j5wjNO8p/CS+et3t2Jr86fQlaeZTPmZdgR/mZD+e9PyVPvaflRFPJW2sP4brHVwbt5nf40vidwOciuwHGCHZXzDW/zDi7vuQa2ZN6pOmd+N8/228RouOGGG2644YYbbrjhhl38F/PucPDfRnBWAAAAAElFTkSuQmCC" class="">
                                </div>
                                <h3 class="text-xl font-medium text-default-900 mb-6">Fast Delivery</h3>
                                <p class="text-base text-default-500">Your favorite meals, delivered on time, every time.</p>
                            </div>
                        </div><!-- end grid-cols -->
                    </div><!-- end grid -->

                    <div class="flex flex-wrap items-center md:justify-start justify-center gap-4 mt-10">
                        <a href="javascript:void(0)" class="py-3 px-10 font-medium text-white bg-primary rounded-full hover:bg-primary-500 transition-all">Get started</a>
                        <div class="flex items-center gap-2">
                            <img src="https://coderthemes.com/yum/assets/avatar3-2bbdc0fd.png" class="h-12 w-12 rounded-full">
                            <div class="">
                                <h6 class="text-base font-medium text-default-900">Marley Culhane</h6>
                                <p class="text-sm font-medium text-default-500">Founder CEO</p>
                            </div>
                        </div>
                    </div><!-- end flex -->
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Section -->
    <section class="lg:py-16 py-6">
        <div class="container">
            <div class="grid lg:grid-cols-4 lg:gap-10 gap-6">
                <div>
                    <div>
                        <span class="inline-flex py-2 px-4 text-sm text-primary rounded-full bg-primary/20 mb-6">Menu</span>
                        <h2 class="text-3xl font-semibold text-default-900 mb-6">Special Menu for you...</h2>
                    </div>

                    <div class="flex flex-wrap w-full">
                        <div class="lg:h-[30rem] h-auto lg:w-full w-screen custom-scroll overflow-auto lg:mx-0 -mx-4 px-2">
                            <nav class="flex lg:flex-col gap-2" aria-label="Tabs" role="tablist" data-hs-tabs-vertical="true">
                                <!-- Coffee Menu Tab Button -->
                                <button type="button" class="flex p-1" id="coffee-menu-item" data-hs-tab="#coffee-menu" aria-controls="coffee-menu" role="tab">
                                    <span class="hs-tab-active:bg-primary text-default-900 flex items-center justify-start gap-4 p-2 pe-6 lg:w-2/3 w-full transition-all hover:text-primary rounded-full">
                                        <span class="hs-tab-active:bg-white h-14 w-14 inline-flex items-center justify-center rounded-full">
                                            <img src="https://coderthemes.com/yum/assets/cup-3dff3c2f.svg" class="h-8 w-8">
                                        </span>
                                        <span class="hs-tab-active:text-white text-base font-medium">Coffee</span>
                                    </span>
                                </button>

                                <!-- Burger Menu Tab Button -->
                                <button type="button" class="flex p-1" id="burger-menu-item" data-hs-tab="#burger-menu" aria-controls="burger-menu" role="tab">
                                    <span class="hs-tab-active:bg-primary text-default-900 flex items-center justify-start gap-4 p-2 pe-6 lg:w-2/3 w-full transition-all hover:text-primary rounded-full">
                                        <span class="hs-tab-active:bg-white h-14 w-14 inline-flex items-center justify-center rounded-full">
                                            <img src="https://coderthemes.com/yum/assets/burger-1-0c3ba5a6.svg" class="h-8 w-8">
                                        </span>
                                        <span class="hs-tab-active:text-white text-base font-medium">Burger</span>
                                    </span>
                                </button>

                                <!-- Noodles Menu Tab Button -->
                                <button type="button" class="flex p-1" id="noodles-menu-item" data-hs-tab="#noodles-menu" aria-controls="noodles-menu" role="tab">
                                    <span class="hs-tab-active:bg-primary text-default-900 flex items-center justify-start gap-4 p-2 pe-6 lg:w-2/3 w-full transition-all hover:text-primary rounded-full">
                                        <span class="hs-tab-active:bg-white h-14 w-14 inline-flex items-center justify-center rounded-full">
                                            <img src="https://coderthemes.com/yum/assets/noodles-8ff3aeb9.svg" class="h-8 w-8">
                                        </span>
                                        <span class="hs-tab-active:text-white text-base font-medium">Noodles</span>
                                    </span>
                                </button>

                                <!-- Pizza Menu Tab Button -->
                                <button type="button" class="flex p-1 active" id="pizza-menu-item" data-hs-tab="#pizza-menu" aria-controls="pizza-menu" role="tab">
                                    <span class="hs-tab-active:bg-primary text-default-900 flex items-center justify-start gap-4 p-2 pe-6 lg:w-2/3 w-full transition-all hover:text-primary rounded-full">
                                        <span class="hs-tab-active:bg-white  p-4 h-14 w-14 inline-flex items-center justify-center rounded-full">
                                            <img src="https://coderthemes.com/yum/assets/pizza-slice 1-79554296.svg" class="h-8 w-8">
                                        </span>
                                        <span class="hs-tab-active:text-white text-base font-medium">Pizza</span>
                                    </span>
                                </button>

                                <!-- Wraps Menu Tab Button -->
                                <button type="button" class="flex p-1" id="wraps-menu-item" data-hs-tab="#wraps-menu" aria-controls="wraps-menu" role="tab">
                                    <span class="hs-tab-active:bg-primary text-default-900 flex items-center justify-start gap-4 p-2 pe-6 lg:w-2/3 w-full transition-all hover:text-primary rounded-full">
                                        <span class="hs-tab-active:bg-white h-14 w-14 inline-flex items-center justify-center rounded-full">
                                            <img src="https://coderthemes.com/yum/assets/taco-96e6ecf3.svg" class="h-8 w-8">
                                        </span>
                                        <span class="hs-tab-active:text-white text-base font-medium">Wraps</span>
                                    </span>
                                </button>

                                <!-- Appetizers Menu Tab Button -->
                                <button type="button" class="flex p-1" id="appetizers-menu-item" data-hs-tab="#appetizers-menu" aria-controls="appetizers-menu" role="tab">
                                    <span class="hs-tab-active:bg-primary text-default-900 flex items-center justify-start gap-4 p-2 pe-6 lg:w-2/3 w-full transition-all hover:text-primary rounded-full">
                                        <span class="hs-tab-active:bg-white h-14 w-14 inline-flex items-center justify-center rounded-full">
                                            <img src="https://coderthemes.com/yum/assets/skewer-86331503.svg" class="h-8 w-8">
                                        </span>
                                        <span class="hs-tab-active:text-white text-base font-medium">Appetizers</span>
                                    </span>
                                </button>

                                <!-- Desserts Menu Tab Button -->
                                <button type="button" class="flex p-1" id="desserts-menu-item" data-hs-tab="#desserts-menu" aria-controls="desserts-menu" role="tab">
                                    <span class="hs-tab-active:bg-primary text-default-900 flex items-center justify-start gap-4 p-2 pe-6 lg:w-2/3 w-full transition-all hover:text-primary rounded-full">
                                        <span class="hs-tab-active:bg-white h-14 w-14 inline-flex items-center justify-center rounded-full">
                                            <img src="https://coderthemes.com/yum/assets/dessert-97434bb7.svg" class="h-8 w-8">
                                        </span>
                                        <span class="hs-tab-active:text-white text-base font-medium">Desserts</span>
                                    </span>
                                </button>
                            </nav><!-- end tab -->
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <div class="relative lg:mt-24">
                        <div class="bg-primary/10 rounded-lg lg:pb-16">
                            <div class="lg:p-6 p-4">
                                <div id="pizza-menu" role="tabpanel" aria-labelledby="pizza-menu-item">
                                    <div class="grid grid-cols-1">
                                        <div class="swiper menu-swiper w-full h-full">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/pizza-1-b135e62c.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Italian Pizza</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 8.75</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->

                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/pizza-2-3b9c935a.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Margarita Pizza</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 5.86</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->

                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/pizza-3-c0ae558f.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Vegetarian Pizza</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 9.56</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->

                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/pizza-4-50931b5d.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Turkish pizza</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 8.75</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                            </div>
                                        </div><!-- end pizza menu slider -->
                                    </div><!--end grid-->
                                </div>
                                <!-- end pizza-menu -->

                                <div id="burger-menu" class="hidden" role="tabpanel" aria-labelledby="burger-menu-item">
                                    <div class="grid grid-cols-1">
                                        <div class="swiper menu-swiper w-full h-full">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/burger-1-021e31a4.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Cheese Burger</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 5.99</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/burger-2-d7610231.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Fried Egg Burger</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 12.75</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/burger-3-6e7710e6.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Meat Burger</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 19.25</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/burger-4-f1185701.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Gourmet cheeseburger</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 16.52</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                            </div>
                                        </div><!-- end pizza menu slider -->
                                    </div><!--end grid-->
                                </div>
                                <!-- end burger-menu -->

                                <div id="coffee-menu" class="hidden" role="tabpanel" aria-labelledby="coffee-menu-item">
                                    <div class="grid grid-cols-1">
                                        <div class="swiper menu-swiper w-full h-full">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/coffee-1-612dd0f4.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Espresso Coffee</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 5.99</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/coffee-2-dfb227c1.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Cappuccino</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 12.45</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/coffee-3-718baa54.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Iced Cold Coffee</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 25.14</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/coffee-4-45c54394.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Flat white</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 8.75</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                            </div><!-- end pizza menu slider -->
                                        </div>
                                    </div><!--end grid-->
                                </div>
                                <!-- end coffee-menu -->

                                <div id="desserts-menu" class="hidden" role="tabpanel" aria-labelledby="desserts-menu-item">
                                    <div class="grid grid-cols-1">
                                        <div class="swiper menu-swiper w-full h-full">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/cake-1-9d9540a5.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Brownie Cake</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 12.99</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/cake-2-9211ac31.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Berry Cheesecake</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 18.25</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/cake-3-6694deb8.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Chocolate Donuts</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 35.46</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/cake-4-2c43086d.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Carrot Cake</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 19.62</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                            </div>
                                        </div><!-- end pizza menu slider -->
                                    </div><!--end grid-->
                                </div>
                                <!-- end desserts-menu -->

                                <div id="noodles-menu" class="hidden" role="tabpanel" aria-labelledby="noodles-menu-item">
                                    <div class="grid grid-cols-1">
                                        <div class="swiper menu-swiper w-full h-full">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/noodles-1-f7f891c2.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Asian Noodles</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 12.78</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/noodles-3-0ee0ebc5.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Meat Noodles</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 31.00</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/noodles-3-0ee0ebc5.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Veg Noodles</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 22.99</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/noodles-1-f7f891c2.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Italian Noodles Pasta</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 18.82</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                            </div>
                                        </div><!-- end pizza menu slider -->
                                    </div><!--end grid-->
                                </div>
                                <!-- end noodles-menu -->

                                <div id="wraps-menu" class="hidden" role="tabpanel" aria-labelledby="wraps-menu-item">
                                    <div class="grid grid-cols-1">
                                        <div class="swiper menu-swiper w-full h-full">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/wraps-1-29f98d78.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Asian wraps</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 12.78</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/wraps-2-133d7406.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Meat wraps</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 31.00</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/wraps-3-e3b1839b.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Veg wraps</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 22.99</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/wraps-4-c45dbf71.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Buritto wraps Pasta</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 18.82</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                            </div>
                                        </div><!-- end pizza menu slider -->
                                    </div><!--end grid-->
                                </div>
                                <!-- end wraps-menu -->

                                <div id="appetizers-menu" class="hidden" role="tabpanel" aria-labelledby="appetizers-menu-item">
                                    <div class="grid grid-cols-1">
                                        <div class="swiper menu-swiper w-full h-full">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/appetizer-1-c7c5179d.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Veg Salad</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 12.78</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/appetizer-2-1b1dbbda.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Chicken Skewers </h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 31.00</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/appetizer-3-d7e86e6c.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Nachos Salsa Dip</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 22.99</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                                <div class="swiper-slide">
                                                    <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                        <img src="https://coderthemes.com/yum/assets/appetizer-4-03b1a990.png" class="h-full w-full">
                                                        <div class="absolute inset-0 bg-default-950/20">
                                                            <div class="inline-flex items-end h-full w-full">
                                                                <div class="p-6">
                                                                    <h5 class="text-xl font-medium text-white mb-2">Paneer tikka Skewers</h5>
                                                                    <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 18.82</h5>
                                                                    <a href="/explore" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end slide -->
                                            </div>
                                        </div><!-- end pizza menu slider -->
                                    </div><!--end grid-->
                                </div>
                                <!-- end appetizers-menu -->
                            </div>
                        </div>

                        <div class="lg:flex items-center gap-1 absolute !-top-10 !end-15 hidden">
                            <div class="swiper-button-next after:content-[] h-12 w-12 flex justify-center items-center rounded-full text-white bg-primary transition-all">
                                <i class="fa-solid fa-angle-left"></i>
                            </div>
                            <div class="swiper-button-prev after:content-[] h-12 w-12 flex justify-center items-center rounded-full text-white bg-primary transition-all">
                                <i class="fa-solid fa-angle-right"></i>
                            </div>
                        </div>


                        <div class="lg:flex hidden">
                            <div class="swiper-pagination !bottom-12 !start-0"></div>

                            <span class="absolute bottom-0 start-1/4 z-10">
                                <img src="data:image/png;base64,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">
                            </span>
                            <span class="absolute -bottom-12 -end-0 z-10">
                                <img src="https://coderthemes.com/yum/assets/leaf-ed221ba8.png">
                            </span>
                        </div>
                    </div><!-- end menu-sliders -->
                </div>
            </div>
        </div><!-- end container -->
    </section>

    <!-- Testimonials Section -->
    <section class="lg:py-16 py-6">
        <div class="container">
            <div class="grid lg:grid-cols-2 grid-cols-1 items-center gap-20">
                <div>
                    <div class="relative">
                        <img src="https://coderthemes.com/yum/assets/testimonial-img-11d36fc9.png" class="lg:mx-0 mx-auto">

                        <div class="absolute -bottom-10 end-20">
                            <div class="bg-white shadow-lg rounded-xl dark:bg-default-100">
                                <div class="p-6">
                                    <h6 class="text-base font-semibold text-default-900 mb-2">Our Reviewers</h6>
                                    <div class="flex items-center justify-center -space-x-1">
                                        <div class="h-12 w-12">
                                            <img class="h-full w-full rounded-full object-cover object-center ring ring-default-100" src="https://coderthemes.com/yum/assets/avatar1-25906796.png" />
                                        </div>
                                        <div class="h-12 w-12">
                                            <img class="h-full w-full rounded-full object-cover object-center ring ring-default-100" src="https://coderthemes.com/yum/assets/avatar2-189b0d01.png" />
                                        </div>
                                        <div class="h-12 w-12">
                                            <img class="h-full w-full rounded-full object-cover object-center ring ring-default-100" src="https://coderthemes.com/yum/assets/avatar3-2bbdc0fd.png" />
                                        </div>
                                        <div class="flex h-12 w-12 items-center justify-center overflow-hidden rounded-full bg-primary text-default-50 font-medium ring ring-default-100">
                                            <span class="text-base"> 12K </span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end Reviewers -->
                        </div>
                    </div>
                </div>

                <div>
                    <span class="inline-flex py-2 px-4 text-sm text-primary rounded-full bg-primary/20 mb-6">Testimonials</span>
                    <h2 class="text-3xl font-semibold text-default-900 max-w-xl mb-4">What They Say About Us.</h2>

                    <div class="product-img-slider sticky-side-div">
                        <div class="swiper clients-testimonial p-2 ">
                            <div class="swiper-wrapper mb-4">
                                <div class="swiper-slide">
                                    <div class="relative cursor-pointer">
                                        <div class="flex items-center gap-3 mb-12">
                                            <img src="https://coderthemes.com/yum/assets/avatar1-25906796.png" class="h-12 w-12 rounded-full">
                                            <div class="">
                                                <h6 class="text-base/none font-medium text-default-900 mb-2">Madelyn Baptista</h6>
                                                <div class="flex gap-1.5">
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="relative px-12">
                                            <div class="absolute -top-5 start-0">
                                                <i data-lucide="quote" class="h-8 w-8 text-primary fill-primary rotate-180"></i>
                                            </div>
                                            <div class="absolute -bottom-5 end-0">
                                                <i data-lucide="quote" class="h-8 w-8 text-primary fill-primary"></i>
                                            </div>
                                            <p class="text-base text-default-400 font-medium">Food is the best. Besides the many and delicious meals, the service is also very good, especially in the very fast delivery. I highly recommend Food to you.</p>
                                        </div>
                                    </div>
                                </div><!-- end slide -->
                                <div class="swiper-slide">
                                    <div class="relative cursor-pointer">
                                        <div class="flex items-center gap-3 mb-12">
                                            <img src="https://coderthemes.com/yum/assets/avatar1-25906796.png" class="h-12 w-12 rounded-full">
                                            <div class="">
                                                <h6 class="text-base/none font-medium text-default-900 mb-2">Marc Y. Sellers</h6>
                                                <div class="flex gap-1.5">
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="relative px-12">
                                            <div class="absolute -top-5 start-0">
                                                <i data-lucide="quote" class="h-8 w-8 text-primary fill-primary rotate-180"></i>
                                            </div>
                                            <div class="absolute -bottom-5 end-0">
                                                <i data-lucide="quote" class="h-8 w-8 text-primary fill-primary"></i>
                                            </div>
                                            <p class="text-base text-default-400 font-medium">Food is the best. Besides the many and delicious meals, the service is also very good, especially in the very fast delivery. I highly recommend Food to you.</p>
                                        </div>
                                    </div>
                                </div><!-- end slide -->
                                <div class="swiper-slide">
                                    <div class="relative cursor-pointer">
                                        <div class="flex items-center gap-3 mb-12">
                                            <img src="https://coderthemes.com/yum/assets/avatar1-25906796.png" class="h-12 w-12 rounded-full">
                                            <div class="">
                                                <h6 class="text-base/none font-medium text-default-900 mb-2">Nancy C. Hunter</h6>
                                                <div class="flex gap-1.5">
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="relative px-12">
                                            <div class="absolute -top-5 start-0">
                                                <i data-lucide="quote" class="h-8 w-8 text-primary fill-primary rotate-180"></i>
                                            </div>
                                            <div class="absolute -bottom-5 end-0">
                                                <i data-lucide="quote" class="h-8 w-8 text-primary fill-primary"></i>
                                            </div>
                                            <p class="text-base text-default-400 font-medium">Food is the best. Besides the many and delicious meals, the service is also very good, especially in the very fast delivery. I highly recommend Food to you.</p>
                                        </div>
                                    </div>
                                </div><!-- end slide -->
                                <div class="swiper-slide">
                                    <div class="relative cursor-pointer">
                                        <div class="flex items-center gap-3 mb-12">
                                            <img src="https://coderthemes.com/yum/assets/avatar1-25906796.png" class="h-12 w-12 rounded-full">
                                            <div class="">
                                                <h6 class="text-base/none font-medium text-default-900 mb-2">Jeannette C. Siebert</h6>
                                                <div class="flex gap-1.5">
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                    <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="relative px-12">
                                            <div class="absolute -top-5 start-0">
                                                <i data-lucide="quote" class="h-8 w-8 text-primary fill-primary rotate-180"></i>
                                            </div>
                                            <div class="absolute -bottom-5 end-0">
                                                <i data-lucide="quote" class="h-8 w-8 text-primary fill-primary"></i>
                                            </div>
                                            <p class="text-base text-default-400 font-medium">Food is the best. Besides the many and delicious meals, the service is also very good, especially in the very fast delivery. I highly recommend Food to you.</p>
                                        </div>
                                    </div>
                                </div><!-- end slide -->
                            </div>
                        </div>
                        <div class="swiper h-24 clients-testimonial-pagination relative !mt-6">
                            <div class="swiper-wrapper ps-12 !py-6 space-x-2">
                                <div class="swiper-slide cursor-pointer !w-12 !h-12">
                                    <img src="https://coderthemes.com/yum/assets/avatar1-25906796.png" class="h-12 w-12 rounded-full">
                                </div>
                                <div class="swiper-slide cursor-pointer !w-12 !h-12">
                                    <img src="https://coderthemes.com/yum/assets/avatar2-189b0d01.png" class="h-12 w-12 rounded-full">
                                </div>
                                <div class="swiper-slide cursor-pointer !w-12 !h-12">
                                    <img src="https://coderthemes.com/yum/assets/avatar3-2bbdc0fd.png" class="h-12 w-12 rounded-full">
                                </div>
                                <div class="swiper-slide cursor-pointer !w-12 !h-12">
                                    <img src="https://coderthemes.com/yum/assets/avatar4-85475652.png" class="h-12 w-12 rounded-full">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Offer Section -->
    <section class="lg:py-28 py-10 relative bg-no-repeat bg-cover bg-[url(../images/home/offer-bg.png)]">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="container">
            <div class="relative lg:w-1/2 w-full">
                <h4 class="font-handrawn text-2xl text-yellow-500 mb-6">Special Combo Offer</h4>
                <h2 class="text-4xl font-semibold text-white mb-8">We make best Food in your town</h2>
                <p class="text-base text-white/75 max-w-2xl mb-10">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                <div class="inline-flex flex-wrap items-center justify-center gap-4">
                    <a href="javascript:void(0)" class="py-4 px-10 font-medium text-white bg-primary rounded-full hover:bg-primary-500 transition-all">Get started</a>
                    <h4 class="text-yellow-400 font-medium text-2xl">$23.47 <span class="text-lg line-through text-white/75">$44.99</span></h4>
                </div>

                <div class="absolute end-0 lg:-bottom-16 bottom-10">
                    <img src="https://coderthemes.com/yum/assets/offer-popup-78034aee.svg" class="lg:w-auto w-20">
                </div>
            </div>
        </div><!-- end container -->
    </section>

    <!-- Download App Section -->
    <section class="lg:py-16 py-6">
        <div class="container">
            <div class="bg-primary/10 rounded-lg">
                <div class="grid lg:grid-cols-2 items-center gap-6">
                    <div class="relative lg:p-20 p-6 h-full">
                        <span class="absolute end-16 top-1/3 text-xl rotate-45">😃</span>
                        <span class="absolute end-0 top-1/2 text-xl rotate-45">🔥</span>
                        <span class="absolute bottom-40 end-40 h-2 w-2 inline-flex items-center justify-center bg-primary text-white rounded-full"></span>
                        <div class="hidden sm:block absolute -bottom-10 lg:bottom-10 lg:end-0 end-10">
                            <div class="bg-default-50 rounded-full p-2 shadow-lg">
                                <div class="flex items-center gap-4">
                                    <div class="h-14 w-14 rounded-full overflow-hidden">
                                        <img src="https://coderthemes.com/yum/assets/avatar4-85475652.png">
                                    </div>
                                    <div class="">
                                        <h6 class="text-base font-medium text-default-900 mb-1">Richard Watson</h6>
                                        <p class="text-sm font-medium text-default-500">Food Courier</p>
                                    </div>
                                    <div class="h-14 w-14 inline-flex items-center justify-center rounded-full bg-primary text-white">
                                        <i data-lucide="phone" class=""></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="inline-flex py-2 px-4 text-sm text-primary rounded-full bg-primary/20 mb-6">Download App</span>
                        <h2 class="text-3xl/relaxed font-semibold text-default-900 max-w-sm mb-6">Get Started With Us Today!</h2>
                        <p class="text-default-900 text-base max-w-md mb-10">Discover food wherever and whenever and get your food delivered quickly.</p>
                        <a href="javascript:void(0)" class="inline-flex py-4 px-10 font-medium text-white bg-primary rounded-full hover:bg-primary-500 transition-all">Get started</a>
                    </div>
                    <div class="relative pt-20 px-20">
                        <span class="absolute end-10 bottom-28 text-3xl -rotate-45">🔥</span>
                        <span class="absolute bottom-10 end-20 h-3 w-3 inline-flex items-center justify-center bg-primary text-white rounded-full"></span>
                        <span class="absolute top-1/4 end-10 h-2.5 w-2.5 inline-flex items-center justify-center bg-yellow-400 text-white rounded-full"></span>
                        <span class="absolute end-1/4 top-12 text-xl -rotate-45">😋</span>
                        <span class="absolute start-10 top-12 h-2 w-2 inline-flex items-center justify-center bg-primary text-white rounded-full"></span>
                        <img src="https://coderthemes.com/yum/assets/mockup-c20fe925.png" class="max-w-full max-h-full">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


