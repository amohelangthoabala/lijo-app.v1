import React, { useState } from "react";
import { Select, SelectContent, SelectGroup, SelectItem, SelectLabel, SelectTrigger, SelectValue } from "./ui/select";
import { Input } from "./ui/input";
import { Slider } from "@/Components/ui/slider";
import { X } from "lucide-react";

const FilterSidebar = ({ filters, onChange, maxPrice = 100 }) => {
  const [selectedFilters, setSelectedFilters] = useState(
    filters.reduce((acc, filter) => {
      acc[filter.id] = filter.checked || false;
      return acc;
    }, {})
  );
  const [searchQuery, setSearchQuery] = useState("");
  const [priceRange, setPriceRange] = useState([0, maxPrice]);

  const handleFilterChange = (id) => {
    const updatedFilters = {
      ...selectedFilters,
      [id]: !selectedFilters[id],
    };
    setSelectedFilters(updatedFilters);
    onChange({ ...updatedFilters, priceRange, searchQuery });
  };

  const handleSliderChange = (value) => {
    setPriceRange(value);
    onChange({ ...selectedFilters, priceRange: value, searchQuery });
  };

  return (
    <div
      className="fixed top-0 w-full h-full max-w-xs transition-transform transform translate-x-0 bg-white lg:block lg:static lg:translate-x-0 dark:bg-default-50"
      id="filter_Offcanvas"
      tabIndex="-1"
    >
      {/* Header for Mobile */}
      <div className="flex items-center justify-between px-4 py-3 border-b border-default-200 lg:hidden">
        <h3 className="font-medium text-default-800">Filter Options</h3>
        <button
          className="inline-flex items-center justify-center w-8 h-8 text-sm rounded-md text-default-500 hover:text-default-700"
          onClick={() => document.getElementById("filter_Offcanvas").classList.toggle("-translate-x-full")}
          type="button"
        >
          <span className="sr-only">Close modal</span>
          <X className="w-5 h-5" />
        </button>
      </div>

      {/* Filter Content */}
      <div className="h-[calc(100vh-128px)] overflow-y-auto lg:h-auto">
        <div className="p-6 divide-y divide-default-200">
          {/* Search Input */}
          <div className="mb-6">
            <Input
              placeholder="Search Meals"
              value={searchQuery}
              onChange={(e) => setSearchQuery(e.target.value)}
              className="mb-4"
            />

            {/* Category Filter */}
            <Select onValueChange={(value) => handleFilterChange(value)} defaultValue="">
              <SelectTrigger className="w-full">
                <SelectValue placeholder="Select Category" />
              </SelectTrigger>
              <SelectContent>
                <SelectGroup>
                  <SelectLabel>Categories</SelectLabel>
                  {filters.map((filter) => (
                    <SelectItem key={filter.id} value={filter.id}>
                      {filter.label}
                    </SelectItem>
                  ))}
                </SelectGroup>
              </SelectContent>
            </Select>
          </div>

          {/* Price Range Filter */}
          <div className="pt-4">
            <h4 className="mb-2 text-sm font-medium text-gray-700">Price Range</h4>
            <div className="mb-4">
              <Slider
                defaultValue={priceRange}
                max={maxPrice}
                step={1}
                onValueChange={(value) => handleSliderChange(value)}
                className="w-full"
              />
            </div>
            <div className="flex justify-between text-sm text-gray-500">
              <span>${priceRange[0]}</span>
              <span>${priceRange[1]}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default FilterSidebar;
