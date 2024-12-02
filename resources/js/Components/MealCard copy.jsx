import React, { useState, useRef } from "react";
import { motion } from "framer-motion";
import { FaShoppingCart, FaHeart, FaStar } from "react-icons/fa";
import { AiOutlineMinus, AiOutlinePlus } from "react-icons/ai";
import useCartStore from "@/Store/useCart";

const MealCard = ({ meal }) => {
    const { addToCart, updateQuantity } = useCartStore();
    const [isAnimating, setIsAnimating] = useState(false);
    const [isAdded, setIsAdded] = useState(false);
    const buttonRef = useRef(null); // To track button width

    const handleQuantityChange = (id, action) => {
        updateQuantity(id, action);
    };


    const handleAddToCart = () => {
        setIsAnimating(true);
        setIsAdded(false); // Reset "Added!" text
        addToCart(meal);
    };

    const handleAnimationComplete = () => {
        setIsAnimating(false); // End animation state
        setIsAdded(true); // Show "Added!" text

        // Automatically hide "Added!" text after 5 seconds
        setTimeout(() => {
            setIsAdded(false);
        }, 1000);
    };

    return (
        <div className={`p-4 overflow-hidden transition-all duration-300 border rounded-lg hover:border-orange-500 shadow-xl`}>
            <div className="relative overflow-hidden divide-y rounded-lg divide-default-200 group">
                {/* Image */}
                <div className="mx-auto mb-4">
                    <img
                        className="w-full h-full transition-all group-hover:scale-105"
                        src={meal.image || "/yum/assets/placeholder.png"}
                        alt={meal.name || "Product"}
                    />
                </div>


                 {/* Content */}
                 <div className="pt-2">
                    {/* Title and Favorite Icon */}
                    <div className="flex items-center justify-between mb-4">
                        <a
                            className="relative text-xl font-semibold text-default-800 line-clamp-1 after:absolute after:inset-0"
                            href={meal.show || `/meal/${meal.id}`} // Use meal.show or fallback
                        >
                            {meal.name}
                        </a>
                        <FaHeart
                            className="w-6 h-6 text-red-500 cursor-pointer"
                            title="Favorite"
                        />
                    </div>

                    {/* Rating */}
                    <span className="inline-flex items-center gap-2 mb-4">
                        <span className="p-1 bg-orange-500 rounded-full">
                            <FaStar className="w-3 h-3 text-white" />
                        </span>
                        <span className="text-sm text-default-950">
                            {meal.rating || "N/A"}
                        </span>
                    </span>

                    {/* Price and Quantity */}
                    <div className="flex items-end justify-between mb-4">
                        <h4 className="text-xl font-semibold text-default-900">
                            ${meal.price}
                        </h4>
                        <div className="relative z-10 inline-flex justify-between p-1 border rounded-full border-default-200">
                            <button
                                className="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 text-sm text-gray-800 bg-gray-200 rounded-full minus"
                                onClick={() => handleQuantityChange(item.id, 'decrement')}
                            >
                                <AiOutlineMinus />
                            </button>
                            <input
                                className="w-8 p-0 text-sm text-center bg-transparent border-0 text-default-800 focus:ring-0"
                                max="100"
                                min="0"
                                readOnly
                                type="text"
                                value={meal.quantity || 1}
                            />
                            <button
                                className="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 text-sm text-gray-800 bg-gray-200 rounded-full plus"
                                onClick={() => handleQuantityChange(item.id, 'increment')}
                            >
                                <AiOutlinePlus />
                            </button>
                        </div>
                    </div>

                    {/* Add to Cart Button */}
                    <motion.button
                        ref={buttonRef}
                        onClick={handleAddToCart}
                        className={`relative flex items-center w-full px-6 py-3 text-sm font-medium text-white bg-orange-500 border border-orange-500 rounded-full shadow-sm hover:bg-orange-600 ${
                            !isAnimating ? "justify-center" : ""
                        }`}
                        whileTap={{ scale: 0.95 }}
                        disabled={isAnimating} // Prevent repeated clicks during animation
                    >
                        {isAnimating ? (
                            <motion.div
                                className="absolute"
                                initial={{ x: 0 }} // Start at the left edge
                                animate={{
                                    x: buttonRef.current ? buttonRef.current.offsetWidth - 32 : 0, // Move to the right edge
                                }}
                                transition={{ duration: 0.9, ease: "easeInOut" }}
                                onAnimationComplete={handleAnimationComplete}
                            >
                                <FaShoppingCart className="w-5 h-5 text-white" />
                            </motion.div>
                        ) : isAdded ? (
                            "Added!"
                        ) : (
                            "Add to Cart"
                        )}
                    </motion.button>
                </div>

            </div>
        </div>
    );
};

export default MealCard;
