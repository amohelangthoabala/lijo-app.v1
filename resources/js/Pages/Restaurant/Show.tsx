import React, { useState } from 'react';
import { Head } from '@inertiajs/react';
import AppLayout from '@/Layouts/AppLayout';
import CustomerRating from '@/Components/CustomerRating';
import CustomerReviews from '@/Components/CustomerReviews';
import MealCard from '@/Components/MealCard';
import RatingsSummary from '@/Components/RatingSummary';
import { AiOutlineCheckCircle, AiOutlineCloseCircle, AiOutlineMail, AiOutlinePhone } from 'react-icons/ai';
import { IoMdLocate } from 'react-icons/io';

// Define types for data
interface ContactInformation {
  phone?: string;
  email?: string;
}

interface Address {
  name: string;
}

interface Owner {
  name: string;
}

interface Review {
  id: number;
  rating: number;
  comment: string;
  created_at: string;
}

interface MealCategory {
  name: string;
}

interface Meal {
  id: number;
  name: string;
  description: string;
  price: number;
  category?: MealCategory;
  image?: string;
}

interface RestaurantData {
  id: number;
  name: string;
  description: string;
  logo: string;
  owner: Owner;
  contact_information: ContactInformation;
  address?: Address;
  meals: Meal[];
  reviews: Review[];
}

interface ShowProps {
  auth: any; // Replace `any` with the correct type if available
  restaurant: {
    data: RestaurantData;
  };
}

const Show: React.FC<ShowProps> = ({ auth, restaurant }) => {
  const [selectedCategory, setSelectedCategory] = useState<string>('All');
  const categories = ['All', ...new Set(restaurant.data.meals.map((meal) => meal.category?.name || 'Uncategorized'))];

  // Filter meals based on selected category
  const filteredMeals = selectedCategory === 'All'
    ? restaurant.data.meals
    : restaurant.data.meals.filter((meal) => meal.category?.name === selectedCategory);

  // Placeholder for isOpen (should be set based on business logic)
  const isOpen = true;

  return (
    <AppLayout>
      <Head title="Restaurant" />

      {/* Header Section */}
      <div className="flex items-center gap-3 px-4 py-6 mx-auto md:items-end max-w-7xl">
        <img
          src={restaurant.data.logo}
          alt="Restaurant Logo"
          className="rounded-full shadow-md w-14 h-14 bg-gray-50"
        />
        <div>
          <h4 className="mb-1 text-lg font-semibold text-gray-800">{restaurant.data.name}</h4>
          <p className="flex items-center gap-1 text-sm text-gray-600">Since 1969</p>
        </div>
      </div>

      {/* Details Section */}
      <section className="px-4 py-6 mx-auto mt-1 bg-white lg:py-10 max-w-7xl">
        <div className="grid gap-6 lg:grid-cols-2">
          {/* Restaurant Image */}
          <div>
            <img
              src={restaurant.data.logo}
              alt="Restaurant"
              className="h-full max-w-full mx-auto rounded-lg"
            />
          </div>

          {/* Restaurant Info */}
          <div>
            <h3 className="mb-1 text-4xl font-medium text-default-800">{restaurant.data.name}</h3>
            <h5 className="mb-2 text-lg font-medium text-default-600">
              <span className="text-base font-normal text-default-500">by</span> {restaurant.data.owner.name}
            </h5>
            <RatingsSummary reviews={restaurant.data.reviews} />
            <p className="mb-4 text-sm text-default-500">{restaurant.data.description}</p>

            {/* Contact Information */}
            {restaurant.data.contact_information.phone && (
              <div className="flex items-center gap-2 my-4">
                <AiOutlinePhone className="mr-2 text-lg text-gray-500" />
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
          </div>
        </div>
      </section>

      {/* Menu Section */}
      <section className="px-4 py-6 mx-auto bg-white lg:py-10 max-w-7xl">
        <h4 className="mb-4 text-xl font-semibold text-default-800">Menu</h4>

        {/* Category Selection */}
        <div className="flex flex-wrap gap-2 mb-6">
          {categories.map((category) => (
            <button
              key={category}
              className={`px-4 py-2 text-sm rounded-full border ${
                selectedCategory === category
                  ? 'bg-orange-500 text-white border-orange-500'
                  : 'bg-gray-100 text-gray-700 border-gray-300'
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
              <MealCard key={meal.id} meal={meal} />
            ))
          ) : (
            <p className="text-center text-gray-600 col-span-full">No meals available in this category.</p>
          )}
        </div>
      </section>

      {/* Reviews Section */}
      <section className="px-4 py-6 mx-auto bg-white lg:py-10 max-w-7xl">
        <div className="container px-1 mx-auto">
          <CustomerRating reviews={restaurant.data.reviews} />
          <CustomerReviews reviews={restaurant.data.reviews} />
        </div>
      </section>
    </AppLayout>
  );
};

export default Show;
