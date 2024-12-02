import React, { useState, useRef } from "react";
import { motion } from "framer-motion";
import { FaShoppingCart, FaHeart, FaStar } from "react-icons/fa";
import { AiOutlineMinus, AiOutlinePlus } from "react-icons/ai";
import useCartStore from "@/Store/useCart";
import RatingsSummary from "./RatingSummary";
import { toast } from "react-toastify";

const MealCard = ({ meal }) => {
    const { cart, addToCart, updateQuantity } = useCartStore();
    const [isAnimating, setIsAnimating] = useState(false);
    const [isAdded, setIsAdded] = useState(false);
    const buttonRef = useRef(null); // To track button width

    // Check if meal exists in the cart
    const cartItem = cart.find((item) => item.id === meal.id);

    console.log("cart in items", cart)

    const handleQuantityChange = (id, action) => {
        updateQuantity(id, action);

        toast.info(
            `${meal.name} quantity ${action === "increment" ? "increased" : "decreased"}.`,
            {
                position: "top-right",
                autoClose: 2000,
                hideProgressBar: false,
                closeOnClick: true,
                pauseOnHover: true,
                draggable: true,
                progress: undefined,
                theme: "light",
            }
        );
    };


    const handleAddToCart = () => {
        addToCart(meal);
        // Show toast notification
        toast.success(`${meal.name} added to cart!`, {
            position: "top-right",
            autoClose: 2000,
            hideProgressBar: false,
            closeOnClick: true,
            pauseOnHover: true,
            draggable: true,
            progress: undefined,
            theme: "light",
        });
    };

    return (
        <>
            <div
                key={meal.id}
                className={`p-4 rounded-lg shadow-lg  transition ${
                    meal.is_available ? "border hover:border-green-500" : "border hover:border-red-500"
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

                <RatingsSummary reviews={meal.reviews} />

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

                <div className="flex items-center justify-between">
                    {/* Meal Price */}
                    <p className="mt-2 font-bold text-gray-800">${meal.price}</p>

                    {/* Add to Cart or Quantity Selector - Only visible if the meal is available */}
                    {meal.is_available && (
                        cartItem ? (
                            <div className="flex items-center p-1 border rounded-full border-default-200">
                                <button
                                    className="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 text-sm text-gray-800 bg-gray-200 rounded-full minus"
                                    onClick={() => handleQuantityChange(cartItem.id, "decrement")}
                                >
                                    <AiOutlineMinus />
                                </button>
                                <input
                                    className="w-8 p-0 text-sm text-center bg-transparent border-0 text-default-800 focus:ring-0"
                                    max="100"
                                    min="0"
                                    readOnly
                                    type="text"
                                    value={cartItem.quantity}
                                />
                                <button
                                    className="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 text-sm text-gray-800 bg-gray-200 rounded-full plus"
                                    onClick={() => handleQuantityChange(cartItem.id, "increment")}
                                >
                                    <AiOutlinePlus />
                                </button>
                            </div>
                        ) : (
                            <button
                                onClick={handleAddToCart}
                                className="px-4 py-2 text-white bg-orange-500 rounded-lg hover:bg-orange-600 text-sm"
                            >
                                Add to Cart
                            </button>
                        )
                    )}
                </div>


            </div>
        </>

    );
};

export default MealCard;
