import FilterSidebar from '@/Components/FilterSidebar';
import MealCard from '@/Components/MealCard';
import Pagination from '@/Components/Pagination'
import SelectInput from '@/Components/SelectInput';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import { Head, router } from '@inertiajs/react'
import React from 'react'

function Index({auth, meals, queryParams = null}) {

    queryParams = queryParams || {};
    const searchFieldChanged = (name, value) => {
        if (value) {
        queryParams[name] = value;
        } else {
        delete queryParams[name];
        }

        router.get(route("meal.index"), queryParams);
    };

    const onKeyPress = (name, e) => {
        if (e.key !== "Enter") return;

        searchFieldChanged(name, e.target.value);
      };

      const sortChanged = (name) => {
        if (name === queryParams.sort_field) {
          if (queryParams.sort_direction === "asc") {
            queryParams.sort_direction = "desc";
          } else {
            queryParams.sort_direction = "asc";
          }
        } else {
          queryParams.sort_field = name;
          queryParams.sort_direction = "asc";
        }
        router.get(route("meal.index"), queryParams);
      };

    const filters = [
        { id: "all", label: "All", checked: true },
        { id: "wraps_roll", label: "Wraps", checked: false },
        { id: "noodles_bowl", label: "Noodles", checked: false },
        { id: "burrito_bowls", label: "Burrito Bowls", checked: false },
        { id: "thalis", label: "Thalis", checked: false },
        { id: "smart_meals", label: "Smart Meals", checked: false },
        { id: "salads", label: "Salads", checked: false },
        { id: "beverages_desserts", label: "Beverages & Desserts", checked: false },
        { id: "appetizers", label: "Appetizers", checked: false },
        { id: "burger_more", label: "Burger & More", checked: false },
      ];

      const handleFilterChange = (updatedFilters) => {
        console.log("Updated Filters:", updatedFilters);
      };

  return (
    <AuthenticatedLayout
        user={auth.user}
        header={
            <h2 className="text-xl font-semibold leading-tight text-gray-800">
                Meals
            </h2>
        }
    >
        <Head title="Meal" />

        <div className="px-10 py-12 mx-auto mt-1 bg-white max-w-7xl">
            <div className=" w-100">
                <div className="gap-6 lg:flex">
                    <div className="fixed top-0 hidden w-full h-full max-w-xs transition-all transform -translate-x-full bg-white hs-overlay hs-overlay-open:translate-x-0 lg:max-w-full lg:w-1/4 start-0 z-60 lg:z-auto lg:translate-x-0 lg:block lg:static lg:start-auto dark:bg-default-50">
                        <div className="flex items-center justify-between px-4 py-3 border-b border-default-200 lg:hidden">
                            <h3 className="font-medium text-default-800">
                                Filter Options
                            </h3>

                            <button className="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-sm rounded-md text-default-500 hover:text-default-700" data-hs-overlay="#filter_Offcanvas" type="button">
                                <span className="sr-only">Close modal</span>
                                <i className="w-5 h-5" data-lucide="x"></i>
                            </button>
                        </div>

                        <FilterSidebar filters={filters} onChange={handleFilterChange} />

                        <div className="block px-4 py-4 border-t lg:hidden border-default-200">
                            <a className="w-full inline-flex items-center justify-center rounded border border-primary bg-primary px-6 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-primary-700 hover:bg-primary focus:ring focus:ring-primary/50" href="">Reset</a>
                        </div>

                    </div>

                    <div className="lg:w-3/4">
                        <div className="flex flex-wrap items-center justify-between gap-4 mb-10 md:flex-nowrap">
                            <div className="flex flex-wrap items-center gap-4 md:flex-nowrap">
                                <button type="button" className="inline-flex lg:hidden items-center gap-4 text-sm py-2.5 px-4 xl:px-5 rounded-full text-default-950 border border-default-200 transition-all" data-hs-overlay="#filter_Offcanvas">
                                    Filter <i data-lucide="settings-2" className="w-4 h-4"></i>
                                </button>

                                <h6 className="hidden text-base lg:flex text-default-950">Showing {meals.meta.from} – {meals.meta.to} of {meals.meta.total} results</h6>
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

                                    <SelectInput
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
                                    </SelectInput>
                                </div>
                            </div>
                        </div>

                        <div className="grid gap-5 xl:grid-cols-3 sm:grid-cols-2">

                            <div className="order-2 sm:col-span-2 xl:order-1">
                                <div className="relative rounded-lg overflow-hidden bg-cover bg-[url('https://img.freepik.com/free-photo/dark-surface-with-blank-space-fast-food-menu_23-2147684608.jpg?t=st=1732596757~exp=1732600357~hmac=78f546c55ddbb272900e3b13e4d6254d5176bbd325109f36403fe46060dc7c94&w=900')] h-full">
                                    {/* Overlay */}
                                    <div className="absolute inset-0 bg-black/10"></div>

                                    {/* Content */}
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
                            </div>



                            {meals.data.map((meal, index) => (
                                <div
                                    key={meal.id}
                                    className={index === 0 ? "order-2 xl:order-1" : "order-3"}
                                >
                                    <MealCard meal={meal} />
                                </div>
                            ))}


                        </div>

                        <Pagination links={meals.meta.links} />
                    </div>
                </div>
            </div>
            {/* <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div className="p-6 text-gray-900">
                        <pre>{JSON.stringify(meals, undefined, 2)}</pre>
                    </div>
                </div>
            </div> */}
        </div>

    </AuthenticatedLayout>
  )
}

export default Index
