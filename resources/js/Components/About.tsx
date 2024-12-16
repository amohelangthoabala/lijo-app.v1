import { Link } from '@inertiajs/react';
import React from 'react';
// import { InertiaLink } from '@inertiajs/inertia-react'; // If you need Inertia navigation

const AboutUs = () => {
    return (
        <section className="px-4 py-6 lg:py-16">
            <div className="container">
                <div className="grid items-start gap-10 lg:grid-cols-2">
                    <div className="flex items-center justify-center w-full h-full rounded-lg bg-blue-500/5">
                        <img
                            src="https://img.freepik.com/free-photo/chicken-skewers-with-onions-top-salad_1220-567.jpg?t=st=1732716719~exp=1732720319~hmac=230e6a074025e4cf84759fbac556f15fc25fcff36592e9999154bb1c4e7a5a74&w=1380"
                            className="w-full h-full"
                            alt="About Us"
                        />
                    </div>
                    <div>
                        <span className="inline-flex px-4 py-2 mb-6 text-sm text-orange-500 rounded-full bg-orange-500/20">
                            About Lijo
                        </span>
                        <h2 className="max-w-xl mb-6 text-3xl font-semibold text-gray-900 dark:text-gray-200">
                            Where Hunger Meets Happiness.
                        </h2>
                        <p className="max-w-2xl mb-16 font-medium text-gray-500 dark:text-gray-200 xl:mb-20">
                            It’s the perfect dining experience where every dish is crafted with fresh, high-quality ingredients and served by friendly staff who go the extra mile to make your meal special.
                        </p>

                        <div className="grid gap-6 xl:grid-cols-3 sm:grid-cols-2">
                            <div className="transition-all duration-200 bg-transparent border rounded-md shadow-lg border-default-100 hover:border-primary">
                                <div className="p-6">
                                    <div className="mb-6">
                                        <img
                                            src="data:image/png;base64,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"
                                            alt="Easy-to-Use App"
                                        />
                                    </div>
                                    <h3 className="mb-6 text-xl font-medium text-gray-900 dark:text-gray-200">Easy-to-Use App</h3>
                                    <p className="text-base text-gray-500 dark:text-gray-200">
                                        Browse, order, and track. Finding your next meal has never been easier.
                                    </p>
                                </div>
                            </div>
                            <div className="transition-all duration-200 bg-transparent border rounded-md shadow-lg border-default-100 hover:border-primary">
                                <div className="p-6">
                                    <div className="mb-6">
                                        <img
                                            src="https://coderthemes.com/yum/assets/vegetables-5e491677.png"
                                            alt="Diverse Choices"
                                        />
                                    </div>
                                    <h3 className="mb-6 text-xl font-medium text-gray-900 dark:text-gray-200">Diverse Choices</h3>
                                    <p className="text-base text-gray-500 dark:text-gray-200">
                                        From local gems to international cuisine, there’s something for everyone.
                                    </p>
                                </div>
                            </div>
                            <div className="transition-all duration-200 bg-transparent border rounded-md shadow-lg border-default-100 hover:border-primary">
                                <div className="p-6">
                                    <div className="mb-6">
                                        <img
                                            src="data:image/png;base64,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"
                                            alt="Quality Ingredients"
                                        />
                                    </div>
                                    <h3 className="mb-6 text-xl font-medium text-gray-900 dark:text-gray-200">Quality Ingredients</h3>
                                    <p className="text-base text-gray-500 dark:text-gray-200">
                                        Only the finest ingredients are used to ensure the best dining experience.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div className="flex flex-wrap items-center justify-center gap-4 mt-10 md:justify-start">
                            <Link
                                href={route('meal.index')}
                                className="px-10 py-3 font-medium text-white transition-all bg-orange-500 rounded-full hover:bg-primary-500"
                            >
                                Get started
                            </Link>
                            <div className="flex items-center gap-2">
                                <img
                                    src="https://avatars.githubusercontent.com/u/38657357?v=4"
                                    className="w-12 h-12 rounded-full"
                                    alt="Founder"
                                />
                                <div>
                                    <h6 className="text-base font-medium text-gray-900 dark:text-gray-200">Amohelang Thoabala</h6>
                                    <p className="text-sm font-medium text-gray-500 dark:text-gray-200">Founder CEO</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
};

export default AboutUs;
