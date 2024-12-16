import Pagination from '@/Components/Pagination';
import AppLayout from '@/Layouts/AppLayout';
import { Head, Link } from '@inertiajs/react'
import React from 'react'
import { AiFillStar, AiOutlineMail, AiOutlinePhone } from 'react-icons/ai'
import { MdCancel, MdCheckCircle } from 'react-icons/md';

function Index({ auth, restaurants}) {
    // Helper function to check availability
    const isOpen = (openingHours) => {
        const currentDay = new Date().toLocaleString('en-US', { weekday: 'long' }).toLowerCase();
        const currentTime = new Date().toTimeString().slice(0, 5);

        if (openingHours[currentDay]) {
            const { open, close } = openingHours[currentDay];
            return currentTime >= open && currentTime <= close;
        }

        return false;
    };

  return (
    <AppLayout>
        <Head title="Restaurant" />

        <div className="container p-4 mx-auto max-w-7xl">
            {/* <h1 className="mb-4 text-2xl font-bold">Restaurant List</h1> */}
            <div className="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                {restaurants.data.map((restaurant) => (
                    <div key={restaurant.id} className="p-4 bg-white rounded-lg shadow">
                        <img
                            src={restaurant.logo}
                            alt={restaurant.name}
                            className="object-cover w-full h-48 mb-3 rounded-md"
                        />
                        <h2 className="mb-2 text-lg font-bold">{restaurant.name}</h2>
                        <p className="mb-2 text-sm text-gray-600 line-clamp-2">{restaurant.description}</p>
                        <div className="mt-2 text-sm text-gray-800">
                            <div className="flex items-center mb-1 space-x-2">
                                <AiFillStar className="text-yellow-500" />
                                <span>{restaurant.rating}/5</span>
                            </div>
                            <div className="flex items-center mb-1 space-x-2">
                                <AiOutlinePhone className="text-blue-500" />
                                <span>{restaurant.contact_information.phone}</span>
                            </div>
                            <div className="flex items-center mb-1 space-x-2">
                                <AiOutlineMail className="text-red-500" />
                                <span>{restaurant.contact_information.email}</span>
                            </div>

                            <div className="flex items-center mt-2 mb-1 space-x-2">
                                {isOpen(restaurant.opening_hours) ? (
                                    <>
                                        <MdCheckCircle className="text-green-500" />
                                        <span className="text-green-500">Open</span>
                                    </>
                                ) : (
                                    <>
                                        <MdCancel className="text-red-500" />
                                        <span className="text-red-500">Closed</span>
                                    </>
                                )}
                            </div>

                            {/* <div className="flex items-center space-x-2">
                                <FaUtensils className="text-green-500" />
                                <span>{restaurant.menus_count + restaurant.meals_count} items</span>
                            </div> */}
                        </div>
                        <Link
                            href={`/restaurant/${restaurant.id}`}
                            className="inline-block p-2 mt-3 text-sm text-white bg-orange-500 rounded-lg hover:bg-white hover:border hover:border-orange-500 hover:text-orange-500 "
                        >
                            View Details {'->'}
                        </Link>
                    </div>
                ))}
            </div>

            <Pagination links={restaurants.meta.links}/>
        </div>

        {/* <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div className="p-6 text-gray-900">
                        <pre>{JSON.stringify(restaurants, undefined, 2)}</pre>
                    </div>
                </div>
            </div> */}

    </AppLayout>
  )
}

export default Index
