import React, { useState } from "react";

const FilterSidebar = ({ filters, onChange }) => {
  const [selectedFilters, setSelectedFilters] = useState(
    filters.reduce((acc, filter) => {
      acc[filter.id] = filter.checked || false;
      return acc;
    }, {})
  );

  const handleFilterChange = (id) => {
    const updatedFilters = {
      ...selectedFilters,
      [id]: !selectedFilters[id],
    };
    setSelectedFilters(updatedFilters);
    onChange(updatedFilters);
  };

  return (
    <div
      className="fixed top-0 hidden w-full h-full max-w-xs transition-all transform -translate-x-full bg-white hs-overlay hs-overlay-open:translate-x-0 lg:max-w-full start-0 z-60 lg:z-auto lg:translate-x-0 lg:block lg:static lg:start-auto dark:bg-default-50"
      id="filter_Offcanvas"
      tabIndex="-1"
    >
      {/* Header for Mobile */}
      <div className="flex items-center justify-between px-4 py-3 border-b border-default-200 lg:hidden">
        <h3 className="font-medium text-default-800">Filter Options</h3>
        <button
          className="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-sm rounded-md text-default-500 hover:text-default-700"
          data-hs-overlay="#filter_Offcanvas"
          type="button"
        >
          <span className="sr-only">Close modal</span>
          <i className="w-5 h-5" data-lucide="x"></i>
        </button>
      </div>

      {/* Filter Content */}
      <div className="h-[calc(100vh-128px)] overflow-y-auto lg:h-auto" data-simplebar>
        <div className="p-6 divide-y lg:p-0 divide-default-200">
          <div>
            <button
              className="inline-flex items-center justify-between w-full gap-2 py-4 text-lg font-medium uppercase transition-all hs-collapse-toggle text-default-900 open"
              data-hs-collapse="#all_categories"
              id="hs-basic-collapse"
              type="button"
            >
              Category
            </button>
            <div
              className="hs-collapse w-full overflow-hidden transition-[height] duration-300 open"
              id="all_categories"
            >
              <div className="relative flex flex-col mb-6 space-y-4">
                {filters.map((filter) => (
                  <div key={filter.id} className="flex items-center">
                    <input
                      className="w-5 h-5 bg-transparent rounded-full cursor-pointer form-checkbox text-primary border-default-400 focus:ring-0 focus:ring-transparent ring-offset-0"
                      id={filter.id}
                      name={filter.id}
                      type="checkbox"
                      checked={selectedFilters[filter.id]}
                      onChange={() => handleFilterChange(filter.id)}
                    />
                    <label
                      className="inline-flex items-center text-sm select-none ps-3 text-default-600"
                      htmlFor={filter.id}
                    >
                      {filter.label}
                    </label>
                  </div>
                ))}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default FilterSidebar;
