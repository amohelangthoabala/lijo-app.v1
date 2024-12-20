import FilterSidebar from '@/Components/FilterSidebar';
import MealCard from '@/Components/MealCard';
import PaginationComponent from '@/Components/Pagination';
import Pagination from '@/Components/Pagination'
import SelectInput from '@/Components/SelectInput';
import { Input } from '@/Components/ui/input';
import { Select, SelectContent, SelectGroup, SelectItem, SelectLabel, SelectTrigger, SelectValue } from '@/Components/ui/select';
import { Slider } from '@/Components/ui/slider';
import AppLayout from '@/Layouts/AppLayout';
import { Head, router } from '@inertiajs/react'
import { Settings, Settings2, X } from 'lucide-react';
import React, { useState } from 'react'
import debounce from "just-debounce-it";
import MultiRangeSlider from '@/Components/slider/Slider';

interface Category {
    id: number;
    menu_id: number;
    label: string,
    name: string;
    description: string;
    created_at: string;
    updated_at: string;
  }

  interface ContactInformation {
    phone: string;
    email: string;
  }

  interface OpeningHours {
    [day: string]: {
      open: string;
      close: string;
    };
  }

  interface Restaurant {
    id: number;
    name: string;
    description: string;
    logo: string;
    image: string;
    contact_information: ContactInformation;
    rating: string;
    opening_hours: OpeningHours;
    status: string;
    review_count: number;
    order_count: number;
    visit_count: number;
    last_activity_at: string;
    is_featured: boolean;
    sales_volume: number;
    user_id: number;
    created_at: string;
    updated_at: string;
  }

  interface Meal {
    id: number;
    name: string;
    description: string;
    price: string;
    image: string;
    is_available: boolean;
    preparation_time: number;
    category: Category;
    restaurant: Restaurant;
    reviews: any[]; // Adjust as needed for your review structure
  }

  interface Meals {
    data: Meal[];
    meta: any;
  }

  interface QueryParams {
    [key: string]: string | undefined;
  }

  interface IndexProps {
    meals: Meals;
    categories: Category[];
    queryParams?: QueryParams;
  }

  const Index: React.FC<IndexProps> = ({ meals, categories, queryParams = {} }) => {

    const [ open, setOpen ] = useState(false);

    const [searchQuery, setSearchQuery] = useState("");
    const [priceRange, setPriceRange] = useState([0, 900]);


    queryParams = queryParams || {};

    const updateQueryParams = (key: string, value: string | undefined) => {
        const updatedParams: QueryParams = { ...queryParams };
        if (value) {
          updatedParams[key] = value;
        } else {
          delete updatedParams[key];
        }
        router.get(route("meal.index"), updatedParams, { preserveScroll: true });
      };

      const searchFieldChanged = debounce((name: string, value: string) => {
        updateQueryParams(name, value);
      }, 300);

      const sortChanged = (name: string) => {
        const updatedParams: QueryParams = { ...queryParams };
        if (name === updatedParams.sort_field) {
          updatedParams.sort_direction = updatedParams.sort_direction === "asc" ? "desc" : "asc";
        } else {
          updatedParams.sort_field = name;
          updatedParams.sort_direction = "asc";
        }
        router.get(route("meal.index"), updatedParams, { preserveScroll: true });
      };

    //   const categories = Array.from(
    //     new Set(meals.data.map((meal) => meal.category))
    //   ).map((category) => ({
    //     id: category.name.toLowerCase().replace(/\s+/g, "_"), // ID generation
    //     label: category.name,
    //   }));

    //   console.log(categories)

      const resetFilters = () => {
        setSearchQuery("");
        setPriceRange([0, 900]);
        router.get(route("meal.index"), {}, { preserveScroll: true });
      };



  return (
    <AppLayout>
        <Head title="Meal" />

        <div className="px-10 py-12 mx-auto mt-1 bg-white dark:bg-gray-800 max-w-7xl">
            <div className=" w-100">
                <div className="gap-6 lg:flex">
                    <div className={`fixed top-0 w-full h-full max-w-xs transition-all transform ${open ? 'translate-x-0' : '-translate-x-full'} bg-white hs-overlay lg:max-w-full lg:w-1/4 start-0 z-60 lg:z-auto lg:translate-x-0 lg:block lg:static lg:start-auto dark:bg-gray-900`}>
                        <div className="flex items-center justify-between px-4 py-3 text-gray-900 border-b border-default-200 lg:hidden dark:text-white">
                            <h3 className="font-medium">
                                Filter Options
                            </h3>

                            <button onClick={() => setOpen(!open)} className="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-sm rounded-md text-default-500 hover:text-default-700" data-hs-overlay="#filter_Offcanvas" type="button">
                                <span className="sr-only">Close modal</span>
                                <X className="w-5 h-5"  />
                            </button>
                        </div>

                        {/* <FilterSidebar filters={filters} onChange={handleFilterChange} /> */}

                        {/* Filter Content */}
                        <div className="h-[calc(100vh-128px)] overflow-y-auto lg:h-auto">
                            <div className="p-6 divide-y divide-default-200">
                            {/* Search Input */}
                            <div className="mb-6">
                                <Input
                                    placeholder="Search Meals"
                                    value={searchQuery}
                                    // onChange={(e) => setSearchQuery(e.target.value)}
                                    className="mb-4"
                                />

                                {/* Category Filter */}
                                <Select
                                // onValueChange={(value) => handleFilterChange(value)}
                                    defaultValue=""
                                >
                                    <SelectTrigger className="w-full">
                                        <SelectValue placeholder="Select Category" />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectGroup>
                                        <SelectLabel>Categories</SelectLabel>
                                        {categories.map((category) => (
                                            <SelectItem key={category.name} value={category.name}>
                                            {category.label}
                                            </SelectItem>
                                        ))}
                                        </SelectGroup>
                                    </SelectContent>
                                </Select>
                            </div>

                            {/* Price Range Filter */}
                            <div className="pt-4">
                                <h4 className="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Price Range</h4>
                                <div className="mb-4">
                                    <MultiRangeSlider min={0} max={100} onChange={() => {}} />
                                {/* <Slider
                                    defaultValue={priceRange}
                                    max={1000}
                                    step={1}
                                    // onValueChange={(value) => handleSliderChange(value)}
                                    className="w-full"
                                /> */}
                                </div>
                                <div className="flex justify-between text-sm text-gray-500 dark:text-300">
                                {/* <span>${priceRange[0]}</span>
                                <span>${priceRange[1]}</span> */}
                                </div>
                            </div>
                            </div>
                        </div>

                        <div className="block px-4 py-4 border-t border-gray-200 lg:hidden">
                            <a className="w-full inline-flex items-center justify-center rounded border border-primary bg-primary px-6 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-primary-700 hover:bg-primary focus:ring focus:ring-primary/50" href="">Reset</a>
                        </div>

                    </div>

                    <div className="lg:w-3/4">
                        <div className="flex flex-wrap items-center justify-between gap-4 mb-10 text-gray-900 md:flex-nowrap dark:text-white">
                            <div className="flex flex-wrap items-center gap-4 md:flex-nowrap">
                                <button onClick={() => setOpen(!open)} type="button" className="inline-flex lg:hidden items-center gap-4 text-sm py-2.5 px-4 xl:px-5 rounded-full text-default-950 border border-default-200 transition-all" data-hs-overlay="#filter_Offcanvas">
                                    Filter <Settings2 className="w-4 h-4" />
                                </button>

                                <h6 className="hidden text-base lg:flex">Showing {meals.meta.from} – {meals.meta.to} of {meals.meta.total} results</h6>
                            </div>
                            <div className="flex items-center">
                                <span className="text-base text-default-950 me-3">Sort By :</span>
                                <div className="hs-dropdown relative inline-flex [--placement:bottom-left]">
                                    {/* <button type="button" className="hs-dropdown-toggle flex items-center gap-2 font-medium text-default-950 text-sm py-2.5 px-4 xl:px-5 rounded-full border border-default-200 transition-all">
                                        Latest <i data-lucide="chevron-down" className="w-4 h-4"></i>
                                    </button>

                                    <div className="hs-dropdown-menu hs-dropdown-open:opacity-100 min-w-[200px] transition-[opacity,margin] mt-4 opacity-0 hidden z-20 bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] rounded-lg border border-default-100 p-1.5 dark:bg-default-50">
                                        <ul className="flex flex-col gap-1">
                                            <li><a className="flex items-center gap-3 px-3 py-2 font-normal transition-all rounded text-default-700 bg-default-400/20" href="#">Latest</a></li>
                                            <li><a className="flex items-center gap-3 px-3 py-2 font-normal transition-all rounded text-default-600 hover:text-default-700 hover:bg-default-400/20" href="#">Featured</a></li>
                                            <li><a className="flex items-center gap-3 px-3 py-2 font-normal transition-all rounded text-default-600 hover:text-default-700 hover:bg-default-400/20" href="#">Release Date</a></li>
                                            <li><a className="flex items-center gap-3 px-3 py-2 font-normal transition-all rounded text-default-600 hover:text-default-700 hover:bg-default-400/20" href="#">Avg. Rating</a></li>
                                        </ul>
                                    </div> */}

                                    <Select onValueChange={(e) =>sortChanged(e)} defaultValue={queryParams?.sort_field}>

                                        <SelectTrigger className="w-[180px]">
                                            <SelectValue placeholder="Sort by" />
                                        </SelectTrigger>
                                        <SelectContent>
                                            <SelectGroup>
                                                <SelectLabel className=''>Sort By</SelectLabel>
                                                <SelectItem value="created_at">Latest</SelectItem>
                                                <SelectItem value="price">Price</SelectItem>
                                                <SelectItem value="name">Name</SelectItem>
                                                <SelectItem value="preparation_time">Preparation Time</SelectItem>
                                            </SelectGroup>
                                        </SelectContent>
                                    </Select>


                                    {/* <SelectInput
                                        className="w-full"
                                        defaultValue={queryParams.sort_field}
                                        onChange={(e) =>
                                            sortChanged(e.target.value)
                                        }
                                        >
                                        <option value="">Select Status</option>
                                        <option value="created_at">Lastest</option>
                                        <option value="price">Price</option>
                                        <option value="name">Name</option>
                                        <option value="preparation_time">Preparation Time</option>
                                    </SelectInput> */}
                                </div>
                            </div>
                        </div>

                        <div className="grid gap-5 xl:grid-cols-3 sm:grid-cols-2">
                            {/*
                            <div className="order-2 sm:col-span-2 xl:order-1">
                                <div className="relative rounded-lg overflow-hidden bg-cover bg-[url('https://img.freepik.com/free-photo/dark-surface-with-blank-space-fast-food-menu_23-2147684608.jpg?t=st=1732596757~exp=1732600357~hmac=78f546c55ddbb272900e3b13e4d6254d5176bbd325109f36403fe46060dc7c94&w=900')] h-full">

                                    <div className="absolute inset-0 bg-black/10"></div>


                                    <div className="relative p-8 md:p-12">
                                    <h4 className="mb-6 text-5xl font-semibold text-yellow-500">
                                        52% Discount
                                    </h4>
                                    <p className="mb-6 text-lg text-default-500">
                                        on your first order
                                    </p>
                                    <a
                                        className="inline-flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-center text-white transition-all duration-200 border rounded-full shadow-sm md:mb-10 border-primary bg-primary hover:border-primary-700 hover:bg-primary-500"
                                        href="#"
                                    >
                                        Shop Now
                                        <i className="w-4 h-4" data-lucide="move-right"></i>
                                    </a>
                                    </div>
                                </div>
                            </div> */}

                            {meals.data.map((meal, index) => (
                                <div
                                    key={meal.id}
                                    className={index === 0 ? "order-2 xl:order-1" : "order-3"}
                                >
                                    <MealCard meal={meal} />
                                </div>
                            ))}


                        </div>

                        <PaginationComponent links={meals.meta.links} />
                    </div>
                </div>
            </div>
            {/* <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div className="p-6 text-gray-900">
                        <pre>{JSON.stringify(categories, undefined, 2)}</pre>
                    </div>
                </div>
            </div> */}
        </div>

    </AppLayout>
  )
}

export default Index
