import React from "react";
import { FaStar, FaStarHalfAlt, FaRegStar } from "react-icons/fa";

const RatingsSummary = ({ reviews }) => {

    const totalReviews = reviews.length;
    const averageRating =
    totalReviews > 0
        ? reviews.reduce((sum, review) => sum + review.rating, 0) / totalReviews
        : 0;

        const totalStars = 5;

    // Calculate full, half, and empty stars
    const fullStars = Math.floor(averageRating);
    const hasHalfStar = averageRating % 1 !== 0;
    const emptyStars = totalStars - fullStars - (hasHalfStar ? 1 : 0);

  return (
    <div className="flex items-center gap-3 mb-3">
      {/* Stars */}
      <div className="flex gap-1.5">
        {Array.from({ length: fullStars }, (_, i) => (
          <FaStar key={`full-${i}`} className="text-base text-yellow-400" />
        ))}
        {hasHalfStar && (
          <FaStarHalfAlt className="text-base text-yellow-400" />
        )}
        {Array.from({ length: emptyStars }, (_, i) => (
          <FaRegStar key={`empty-${i}`} className="text-base text-gray-300" />
        ))}
      </div>
      {/* Divider */}
      <div className="w-px h-4 bg-gray-400"></div>
      {/* Review Count */}
      <h5 className="text-sm text-gray-500">{totalReviews} Reviews</h5>
    </div>
  );
};

export default RatingsSummary;
