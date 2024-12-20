import { Link } from "@inertiajs/react";
import { Star } from "lucide-react";
import React from "react";
import { FaClock, FaPlay, FaStar } from "react-icons/fa";
import { usePage } from '@inertiajs/react';

const HeroSection = () => {
    const { auth } = usePage().props;
  return (
    <section className="relative py-6 lg:py-16 px-2">
      <div className="absolute inset-0 blur-[60px] bg-gradient-to-l from-orange-600/20 via-orange-600/5 to-orange-600/0"></div>
      <div className="container relative">
        <div className="grid items-center lg:grid-cols-2">
          {/* Left Column */}
          <div className="px-10 py-20">
            <div className="z-10 flex items-center justify-center order-last lg:justify-start lg:order-first">
              <div className="text-center lg:text-start">
                <span className="inline-flex px-4 py-2 mb-8 text-sm text-orange-500 rounded-full bg-primary/20 lg:mb-2">
                  #Special Food 🍇
                </span>
                <h1 className="mb-5 text-3xl font-bold capitalize lg:text-6xl/normal md:text-5xl/snug text-gray-950 dark:text-white">
                  Authentic {" "}
                  <span className="relative inline-flex">
                    <span> Taste</span>
                  </span>
                  <span className="text-orange-500"> Reimagined</span> For You
                </h1>
                <p className="mx-auto mb-8 text-lg font-medium text-gray-700 dark:text-gray-200 md:max-w-md lg:mx-0">
                    Discover meals from top-rated spots and unknown gems, delivered fresh with Lijo
                </p>
                <div className="flex flex-wrap items-center justify-center gap-5 mt-10 lg:justify-normal">
                  <Link
                    href={route('meal.index')}
                    className="px-10 py-5 font-medium text-white transition-all bg-orange-500 rounded-full hover:bg-white hover:border-orange-500 hover:text-orange-500"
                  >
                    Order Now
                  </Link>
                  <Link href={route('meal.index')} className="flex items-center text-primary">
                    <span className="flex items-center justify-center border-2 border-yellow-400 rounded-full h-14 w-14 border-e-transparent me-2">
                      <FaPlay data-lucide="play" className="w-6 h-6 fill-orange-500" />
                    </span>
                    <span className="font-semibold text-orange-400">How to Order</span>
                  </Link>
                </div>
                {/* <div className="mt-14">
                  <div className="flex flex-wrap items-center justify-center gap-4 lg:justify-start">
                    <div className="flex items-center -space-x-1">
                      <div className="w-12 h-12">
                        <img
                          className="object-cover object-center w-full h-full rounded-full ring ring-default-50"
                          src="https://images.unsplash.com/photo-1522529599102-193c0d76b5b6?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8YmxhY2slMjBwZW9wbGV8ZW58MHx8MHx8fDA%3D"
                          alt="Customer 1"
                        />
                      </div>
                      <div className="w-12 h-12">
                        <img
                          className="object-cover object-center w-full h-full rounded-full ring ring-default-50"
                          src="https://images.unsplash.com/photo-1544995228-a7a3abc39d89?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fGJsYWNrJTIwcGVvcGxlfGVufDB8fDB8fHww"
                          alt="Customer 2"
                        />
                      </div>
                      <div className="w-12 h-12">
                        <img
                          className="object-cover object-center w-full h-full rounded-full ring ring-default-50"
                          src="https://plus.unsplash.com/premium_photo-1723683613486-a15861aa678a?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NjR8fGJsYWNrJTIwcGVvcGxlfGVufDB8fDB8fHww"
                          alt="Customer 3"
                        />
                      </div>
                    </div>
                    <div>
                      <h1 className="text-base font-medium text-gray-800 dark:text-gray-200">
                        Our Happy Customer
                      </h1>
                      <p className="flex items-center text-base text-gray-900 dark:text-white">
                        <Star className="inline w-4 h-4 mr-2 text-yellow-400 fill-yellow-400" /> 4.7{" "}
                        <span className="text-sm text-gray-500 dark:text-gray-300">(13.7k Reviews)</span>
                      </p>
                    </div>
                  </div>
                </div> */}
              </div>
            </div>
          </div>

          {/* Right Column */}
          <div className="relative flex items-center justify-center py-20">
            {/* Decorative Flame */}
            <span className="absolute top-0 left-0 text-3xl -rotate-[40deg]">🔥</span>

            {/* Clock Icon */}
            <span className="absolute top-0 right-[10%] -rotate-12 h-14 w-14 inline-flex items-center justify-center bg-yellow-400 text-white rounded-lg">
                <FaClock className="w-6 h-6" />
            </span>

            {/* Small Circle */}
            <span className="absolute right-0 inline-flex items-center justify-center w-4 h-4 text-white bg-orange-500 rounded top-1/4 -rotate-12"></span>

            {/* Customer Avatar */}
            <div className="absolute hidden bottom-1/4 -right-0 2xl:-right-24 md:block lg:hidden xl:block">
                <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFQAAACpCAMAAACCueo0AAAAQlBMVEUAAAD/xwD/xwD/ywD/xwD/xgD/xwD/xwD/xgD/xgD/xwD/xwD/xwD/xwD/xQD/wwD/xwD/xwD/xwD/yAD/xgD/xwBcJNpgAAAAFXRSTlMAIN8Q72C/nzCQcFDPQIBAgI+vf6De6s6XAAADjklEQVRo3u2a626jMBCFPb7hGzQhnfd/1XUEuwQoWzscS6ma86eVqn6ZwZ5rEEKJBuqkgzMNM18VGioz1Quw6JO5E3CZoMRPUidvcCbdbwGcmjI1EZrqM1XCqZdM1R9oatQZG9FUki0CgZKO4rfLjVc81LY4rsAtqJcfRr01oRo49RNfD7MG/7NKVwuFq4IzI7OFQ/ulxoKva4BTPzPVoaEqMUv4YZFudVgfcOoF/1SzYi9+uz4inkmnw1U5Y4Kaf51+ulP3SoVR8l2juEsya3uNTownAuvGk+YKrXiWzFAenoTKO0GnsZvdvyTN/6TpOWiQNmz+VfWDzWT7TIel/nsOvVH3HGBsMnX9fvi+GbxLFmNddtB/nwS9rMCSLJmhFAky5dixYi7L2KLCZeoK0SVjU8ntHOoWDzIWGFrqfJdMeRk2xclKP1pjxKHI2tJcoR+TlQEN85fHWI2gYb7P/qv1MA+otHKVrHsNGQ38OpxJfk0lm1yV/1JsqfsEF6vypMoOqy3V76eQutnGstx5SntoXYyqWHCnJyhA7aEGMjCHFOFQ2hRwd8+4Fbp+1VUpuW7ila6DMvNXQbEpMdHTeajwS6qpFy1xunsAw4nkZw+nGHr+Bo5F6yylqnLfcDxwrRJNqFkzfxwW0G51U3XNQvz4j9saWZ5Pu+IaaYtNNar041vMtJ8Fplb346RBa3PJdvVUZUG/na7fJwb1ELkFUJLftrF25TF5B+jht71GkZ3sYNuxhWmKG9hF5nronStgzsG5ZrjjZ6YyU5uyfON2gaXDUcxJ91yr7zKVuy+NpUCl6TbuT2OLVTdTdUdGv3fT36npXyQHC1hLzld8nqtnGcRyb3BTxE2yUUC/ltGpMy+xl29hhAGvcJfch1YCV7sl9cO070te+yuMv+3by5+TanROVsDlpRNvvbrcQHAmyQb36cacGhjKpoGhEm4oNzC0a2MoPuk1eStIsyY4NHbvN42Aoi4A4jEe7L5PqN9syq7MTIB4DJvvLwdE7KR1F+8BLdgmyp2FZCN8G6J5MRX5YjH8LeBxgmoF7RVnDWjv0UdlZ6YmZCWaFRp4303bBaj3Uk3rH2mA3pMQYcYbAnk/CLL8V/J2Epvm9z6C5kd1dNp76ezCOx+0foLqDVKfslTyXtr36uQ4tydC0vMiuRBB3ttLLxDqF2IgXKs8ExW2rdUWvVDzL7Kie+utt36V/gAoj0UJQoRlYQAAAABJRU5ErkJggg=="
                alt="Customer Avatar"
                />
                <div className="flex items-center gap-2 p-2 pr-6 rounded-full shadow-lg bg-default-50">
                {/* <img
                    src="https://malukelereko.github.io/img/my_photo.jpeg"
                    alt="Customer"
                    className="w-16 h-16 rounded-full"
                /> */}
                {/* <div>
                    <h6 className="text-sm font-medium text-gray-900 dark:text-gray-200">
                    Lereko Maluke
                    </h6>
                    <p className="text-[10px] font-medium text-gray-900 dark:text-gray-200">
                    Healthy and Delicious Food
                    </p>
                    <span className="inline-flex gap-0.5">
                    {[...Array(4)].map((_, i) => (
                        <FaStar key={i} className="w-3 h-3 text-yellow-400" />
                    ))}
                    <FaStar className="w-3 h-3 text-gray-200" />
                    </span>
                </div> */}
                </div>
            </div>

            {/* Other Decorative Elements */}
            <span className="absolute bottom-0 right-0 inline-flex items-center justify-center w-4 h-4 text-white bg-orange-500 rounded-full -rotate-12"></span>
            <span className="absolute text-3xl -bottom-16 right-1/3">🔥</span>

            {/* Product Card */}
            <div className="absolute bottom-0 left-0">
                <div className="flex items-center gap-2 p-2 pr-6 rounded-full shadow-lg bg-default-50">
                {/* <span className="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary/20">
                    <img
                    src="https://coderthemes.com/yum/assets/burger-1-0c3ba5a6.svg"
                    alt="Burger"
                    className="w-10 h-10"
                    />
                </span> */}
                {/* <div>
                    <h6 className="text-sm font-medium text-gray-900 dark:text-gray-200">
                    MCD Veg Burger
                    </h6>
                    <span className="inline-flex gap-0.5">
                    {[...Array(4)].map((_, i) => (
                        <FaStar key={i} className="w-3 h-3 text-yellow-400" />
                    ))}
                    <FaStar className="w-3 h-3 text-gray-200" />
                    </span>
                    <h6 className="text-sm font-medium text-gray-900 dark:text-gray-200">
                    <span className="text-sm text-orange-500">$</span> 8.14
                    </h6>
                </div> */}
                </div>
            </div>

            {/* Hero Image */}
            <img
                src="https://coderthemes.com/yum/assets/hero-f578fbc8.png"
                alt="Hero"
                className="mx-auto"
            />
            </div>
        </div>
      </div>
    </section>
  );
};

export default HeroSection;
