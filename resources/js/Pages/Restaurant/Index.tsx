import React from 'react';
import Pagination from '@/Components/Pagination';
import AppLayout from '@/Layouts/AppLayout';
import { Head, Link } from '@inertiajs/react';
import { AiFillStar, AiOutlineMail, AiOutlinePhone } from 'react-icons/ai';
import { MdCancel, MdCheckCircle } from 'react-icons/md';

// Define types for restaurant and props
interface Restaurant {
  id: number;
  name: string;
  description: string;
  logo: string;
  rating: number;
  contact_information: {
    phone: string;
    email: string;
  };
  opening_hours: Record<string, { open: string; close: string }>; // e.g., { monday: { open: "08:00", close: "22:00" } }
}

interface PaginationLinks {
  url: string | null;
  label: string;
  active: boolean;
}

interface RestaurantMeta {
  links: PaginationLinks[];
}

interface Restaurants {
  data: Restaurant[];
  meta: RestaurantMeta;
}

interface IndexProps {
  auth: any; // Replace with specific auth type if known
  restaurants: Restaurants;
}

const Index: React.FC<IndexProps> = ({ auth, restaurants }) => {
  // Helper function to check availability
  const isOpen = (openingHours: Restaurant['opening_hours']): boolean => {
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

        <Pagination links={restaurants.meta.links} />
      </div>
    </AppLayout>
  );
};

export default Index;
