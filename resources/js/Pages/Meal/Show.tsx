import CustomerRating from '@/Components/CustomerRating';
import CustomerReviews from '@/Components/CustomerReviews';
import RatingsSummary from '@/Components/RatingSummary';
import AppLayout from '@/Layouts/AppLayout';
import { Head, Link } from '@inertiajs/react'
import React, { useState } from 'react'

function Show({ auth, success, meal, reviews, queryParams }) {

  const [quantity, setQuantity] = useState(1);
  const [size, setSize] = useState("S");

  const handleSizeChange = (size) => {
    setSize(size);
  };

  const increaseQuantity = () => setQuantity((prev) => Math.min(prev + 1, 100));
  const decreaseQuantity = () => setQuantity((prev) => Math.max(prev - 1, 1));

  return (

    <AppLayout>
        <Head title={`Meal ${meal.data.name}`} />

        <section className="px-4 py-6 mx-auto mt-1 bg-white lg:py-10 max-w-7xl">
            <div className="container">
                <div className="grid gap-6 lg:grid-cols-2">
                {/* Image Carousel */}
                <div className="grid grid-cols-1">
                    <img
                        src={meal.data.image}
                        alt={`image meal`}
                        className="h-full max-w-full mx-auto"
                    />
                    {/* <div> */}
                    {/* Replace this div with a Swiper component implementation */}
                    {/* <div className="swiper cart-swiper">
                        <div className="swiper-wrapper">
                        {["burrito-bowl-79a7c64f.png", "burrito-bowl-2-b0c1cb2a.png", "burrito-bowl-3-61929adc.png"].map(
                            (src, index) => (
                            <div key={index} className="swiper-slide">
                                <img
                                src={`/yum/assets/${src}`}
                                alt={`Burrito Bowl ${index + 1}`}
                                className="h-full max-w-full mx-auto"
                                />
                            </div>
                            )
                        )}
                        </div>
                    </div>
                    </div> */}

                    {/* Pagination */}
                    {/* <div className="justify-center swiper cart-swiper-pagination">
                    <div className="justify-center w-full gap-2 swiper-wrapper">
                        {["burrito-bowl-79a7c64f.png", "burrito-bowl-2-b0c1cb2a.png", "burrito-bowl-3-61929adc.png"].map(
                        (src, index) => (
                            <div
                            key={index}
                            className="swiper-slide cursor-pointer !w-24 !h-24 lg:!w-32 lg:!h-32"
                            >
                            <img
                                src={`/yum/assets/${src}`}
                                alt={`Thumbnail ${index + 1}`}
                                className="w-full h-full rounded"
                            />
                            </div>
                        )
                        )}
                    </div>
                    </div> */}
                </div>

                {/* Product Details */}
                <div>
                    <h3 className="mb-1 text-4xl font-medium text-default-800">{meal.data.name}</h3>
                    <h5 className="mb-2 text-lg font-medium text-default-600">
                    <span className="text-base font-normal text-default-500">by</span> {meal.data.restaurant.name}
                    </h5>

                    {/* Ratings */}
                    <RatingsSummary reviews={meal.data.reviews} />

                    {/* Description */}
                    <p className="mb-4 text-sm text-default-500">{meal.data.description}</p>

                    {/* Tags */}
                    <div className="flex gap-2 mb-5">
                    {["Non Vegetable", "Mexican", "Breakfast"].map((tag, index) => (
                        <div
                        key={index}
                        className="border border-gray-300 rounded-full px-3 py-1.5 flex items-center"
                        >
                        <span className="text-xs">{tag}</span>
                        </div>
                    ))}
                    </div>

                    {/* Size Selector */}
                    <div className="flex items-center gap-3 mb-8">
                    <h4 className="text-sm text-default-700">Size :</h4>
                    {["S", "M", "L"].map((label, index) => (
                        <div key={index}>
                        <input
                            type="radio"
                            name="option"
                            id={`size-${index}`}
                            value={index + 1}
                            className="hidden peer"
                            checked={size === String(index + 1)}
                            onChange={() => setSize(String(index + 1))}
                        />
                        <label
                            htmlFor={`size-${index}`}
                            className="flex items-center justify-center text-sm text-center bg-gray-200 rounded-full cursor-pointer select-none w-9 h-9 peer-checked:bg-primary peer-checked:text-white"
                        >
                            {label}
                        </label>
                        </div>
                    ))}
                    </div>

                    {/* Quantity Selector */}
                    <div className="flex items-center gap-2 mb-8">
                    <div className="relative z-10 inline-flex justify-between p-1 border border-gray-300 rounded-full">
                        <button
                        type="button"
                        className="inline-flex items-center justify-center flex-shrink-0 text-sm bg-gray-200 rounded-full minus text-default-800 h-9 w-9"
                        onClick={() => handleQuantityChange("decrement")}
                        >
                        –
                        </button>
                        <input
                        type="text"
                        className="w-12 p-0 text-sm text-center bg-transparent border-0 focus:ring-0"
                        value={quantity}
                        readOnly
                        />
                        <button
                        type="button"
                        className="inline-flex items-center justify-center flex-shrink-0 text-sm bg-gray-200 rounded-full plus text-default-800 h-9 w-9"
                        onClick={() => handleQuantityChange("increment")}
                        >
                        +
                        </button>
                    </div>

                    {/* Buy Now Button */}
                    <Link
                        href="/cart"
                        className="inline-flex items-center justify-center px-10 py-3 text-sm font-medium text-center text-white transition-all duration-500 border rounded-full shadow-sm border-primary bg-primary hover:bg-primary-500"
                    >
                        Buy Now
                    </Link>

                    {/* Wishlist Icon */}
                    <i
                        className="w-8 h-8 cursor-pointer text-default-400 hover:fill-red-600 hover:text-red-600 focus:fill-red-600 focus:text-red-600"
                        data-lucide="heart"
                    ></i>
                    </div>

                    {/* Nutrition Facts */}
                    <div className="mb-6">
                    <h4 className="mb-4 text-lg font-medium text-default-700">
                        Nutrition Facts <span className="text-sm text-default-400">(per serving)</span>
                    </h4>
                    <div className="p-3 border border-gray-#00 rounded-lg">
                        <div className="grid justify-center grid-cols-4">
                        {[
                            { label: "Calories", value: "1524" },
                            { label: "Fat", value: "56g" },
                            { label: "Carbs", value: "134g" },
                            { label: "Protein", value: "78g" },
                        ].map((item, index) => (
                            <div key={index} className="text-center">
                            <h4 className="mb-1 text-base font-medium text-default-700">{item.value}</h4>
                            <h4 className="text-base text-default-700">{item.label}</h4>
                            </div>
                        ))}
                        </div>
                    </div>
                    </div>

                    {/* Viewer Count */}
                    <div className="flex items-center">
                    <i data-lucide="eye" className="w-5 h-5 me-2 text-primary"></i>
                    <h5 className="text-sm text-default-600">
                        <span className="font-semibold text-primary">152</span>&nbsp; People are viewing
                        this right now
                    </h5>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <section className="px-4 py-6 mx-auto bg-white lg:py-10 max-w-7xl">
            <div className="container px-1 mx-auto">
                <CustomerRating reviews={meal.data.reviews}/>

                <CustomerReviews reviews={meal.data.reviews} />
            </div>
        </section>

        {/* <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div className="p-6 text-gray-900">
                    <pre>{JSON.stringify(meal, undefined, 2)}</pre>
                </div>
            </div>
        </div> */}
    </AppLayout>
  )
}

export default Show
