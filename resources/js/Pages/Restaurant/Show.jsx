import CustomerRating from '@/Components/CustomerRating';
import CustomerReviews from '@/Components/CustomerReviews';
import RatingsSummary from '@/Components/RatingSummary';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import { Head } from '@inertiajs/react'
import React, { useState } from 'react'
import { AiOutlineCheckCircle, AiOutlineCloseCircle, AiOutlineMail, AiOutlinePhone } from 'react-icons/ai';
import { IoMdLocate } from "react-icons/io";

function Show({ auth, restaurant}) {
    const [isOpen, setIsOpen] = useState()
    // Get unique categories from meals
    const categories = ["All", ...new Set(restaurant.data.meals.map((meal) => meal.category?.name || "Uncategorized"))];

     // State for selected category
     const [selectedCategory, setSelectedCategory] = useState("All");

     // Filter meals based on the selected category
     const filteredMeals =
         selectedCategory === "All"
             ? restaurant.data.meals
             : restaurant.data.meals.filter((meal) => meal.category?.name === selectedCategory);

  return (
    <AuthenticatedLayout
        user={auth.user}
        header={
            // <h2 className="text-xl font-semibold leading-tight text-gray-800">
            //     Restaurant {restaurant.data.name}
            // </h2>

            <div className="flex items-center gap-3 md:items-end">
                {/* Profile Image */}
                <img
                src={restaurant.data.logo}
                alt={`Logo`}
                className="rounded-full shadow-md w-14 h-14 bg-gray-50"
                />

                {/* Details */}
                <div>
                {/* Restaurant Name */}
                <h4 className="mb-1 text-lg font-semibold text-gray-800">{restaurant.data.name}</h4>

                {/* Since */}
                <p className="flex items-center gap-1 text-sm text-gray-600">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    className="w-4 h-4 text-gray-500"
                    >
                    <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="2"
                        d="M8 7v10l8-5-8-5z"
                    />
                    </svg>
                    Since {1969}
                </p>
                </div>
            </div>
        }
    >
        <Head title="Restaurant" />

        <section className="px-4 py-6 mx-auto mt-1 bg-white lg:py-10 max-w-7xl">
            <div className="container">
                <div className="grid gap-6 lg:grid-cols-2">
                    {/* Image Carousel */}
                    <div className="grid grid-cols-1">
                        <img
                            src={restaurant.data.logo}
                            alt={`restaurant Image`}
                            className="h-full max-w-full mx-auto rounded-lg"
                        />
                    </div>

                    {/* Restaurant details */}
                    <div className="">
                        <h3 className="mb-1 text-4xl font-medium text-default-800">{restaurant.data.name}</h3>

                        <h5 className="mb-2 text-lg font-medium text-default-600">
                            <span className="text-base font-normal text-default-500">by</span> {restaurant.data.owner.name}
                        </h5>

                        {/* Ratings */}
                        <RatingsSummary reviews={restaurant.data.reviews} />

                        {/* Description */}
                        <p className="mb-4 text-sm text-default-500">{restaurant.data.description}</p>

                        {restaurant.data.contact_information.phone && (
                        <div className="flex items-center gap-2 my-4">
                            <AiOutlinePhone className="mr-2 text-lg text-gray-500 " />
                            <span>{restaurant.data.contact_information.phone}</span>
                        </div>
                        )}

                        {restaurant.data.contact_information.email && (
                        <div className="flex items-center gap-2 mb-4">
                            <AiOutlineMail className="mr-2 text-lg text-gray-500" />
                            <span>{restaurant.data.contact_information.email}</span>
                        </div>
                        )}

                        {restaurant.data.address?.name && (
                        <div className="flex items-center gap-2 mb-2">
                            <IoMdLocate className="mr-2 text-lg text-gray-500" />
                            <span>{restaurant.data.address.name}</span>
                        </div>
                        )}

                         {/* Availability */}
                        <div className="flex items-center gap-2 mb-4">
                            {isOpen ? (
                            <span className="flex items-center gap-1 text-green-600">
                                <AiOutlineCheckCircle className="mr-2 text-lg" />
                                Open Now
                            </span>
                            ) : (
                            <span className="flex items-center gap-1 text-red-600">
                                <AiOutlineCloseCircle className="mr-2 text-lg" />
                                Closed
                            </span>
                            )}
                        </div>


                        {/* Contact and Rating */}
                        <div className="flex items-center gap-4 mt-4 text-gray-600">

                            {/* <div className="flex items-center gap-2 text-yellow-500">
                                <AiFillStar className="text-lg" />
                                <span>{rating}</span>
                            </div> */}
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {/* Meals */}
        <section className="px-4 py-6 mx-auto bg-white lg:py-10 max-w-7xl">
            <h4 className="mb-4 text-xl font-semibold text-default-800">Menu</h4>

            {/* Category Pills */}
            <div className="flex flex-wrap gap-2 mb-6">
                {categories.map((category) => (
                    <button
                        key={category}
                        className={`px-4 py-2 text-sm rounded-full border ${
                            selectedCategory === category
                                ? "bg-orange-500 text-white border-orange-500"
                                : "bg-gray-100 text-gray-700 border-gray-300"
                        }`}
                        onClick={() => setSelectedCategory(category)}
                    >
                        {category}
                    </button>
                ))}
            </div>

            {/* Meals Grid */}
            <div className="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4">
                {filteredMeals.length > 0 ? (
                    filteredMeals.map((meal) => (
                        <div
                            key={meal.id}
                            className={`p-4 border rounded-lg shadow-sm hover:shadow-md transition ${
                                meal.is_available ? "border-green-500" : "border-red-500"
                            }`}
                        >
                            {/* Meal Image */}
                            <img
                                src={meal.image}
                                alt={meal.name}
                                className="object-cover w-full h-32 mb-3 rounded-md"
                            />

                            {/* Meal Name */}
                            <h4 className="font-medium text-gray-800 text-md">{meal.name}</h4>

                            {/* <RatingsSummary reviews={meal.reviews} /> */}
                            {/* Meal Description */}
                            <p className="text-sm text-gray-600">
                                {meal.description.length > 100
                                    ? `${meal.description.substring(0, 100)}...`
                                    : meal.description}
                            </p>

                            {/* Availability */}
                            <p
                                className={`mt-2 text-sm font-medium ${
                                    meal.is_available ? "text-green-600" : "text-red-600"
                                }`}
                            >
                                {meal.is_available ? "Available" : "Unavailable"}
                            </p>

                            {/* Meal Price */}
                            <p className="mt-2 font-bold text-gray-800">${meal.price}</p>
                        </div>
                    ))
                ) : (
                    <p className="text-center text-gray-600 col-span-full">No meals available in this category.</p>
                )}
            </div>
        </section>

        <section className="px-4 py-6 mx-auto bg-white lg:py-10 max-w-7xl">
            <div className="container px-1 mx-auto">
                <CustomerRating reviews={restaurant.data.reviews}/>

                <CustomerReviews reviews={restaurant.data.reviews} />
            </div>
        </section>

        <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div className="p-6 text-gray-900">
                        <pre>{JSON.stringify(restaurant, undefined, 2)}</pre>
                    </div>
                </div>
            </div>
    </AuthenticatedLayout>
  )
}

export default Show
