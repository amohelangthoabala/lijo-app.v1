import React from "react";
import { FaStar, FaRegStar, FaStarHalfAlt } from "react-icons/fa"; // Import half star icon
import ProgressBar from "@ramonak/react-progress-bar"; // Import ProgressBar

const CustomerRating = ({ reviews }) => {
  // Aggregate ratings data dynamically
  const ratingsData = [1, 2, 3, 4, 5].map((stars) => {
    const count = reviews.filter((review) => review.rating === stars).length;
    const percentage = reviews.length
      ? (count / reviews.length) * 100
      : 0; // Handle zero data gracefully
    return { stars, count, percentage: percentage.toFixed(1) };
  });

  // Calculate total reviews and average rating
  const totalReviews = reviews.length;
  const averageRating =
    totalReviews > 0
      ? reviews.reduce((sum, review) => sum + review.rating, 0) / totalReviews
      : 0;

  return (
    <div>
      <h4 className="mb-4 text-xl font-semibold text-default-800">Customer Rating</h4>
      <div className="grid items-center gap-5 lg:grid-cols-4">
        {/* Average Rating Card */}
        <div className="flex flex-col items-center justify-center py-8 rounded-lg bg-orange-600/10">
          <h1 className="mb-4 text-6xl font-semibold text-default-800">
            {totalReviews > 0 ? averageRating.toFixed(1) : "N/A"}
          </h1>
          <div className="flex gap-1.5 mb-2">
            {totalReviews > 0 ? (
              <>
                {/* Full Stars */}
                {[...Array(Math.floor(averageRating))].map((_, i) => (
                  <FaStar key={i} className="text-lg text-yellow-400" />
                ))}
                {/* Half Star */}
                {averageRating % 1 !== 0 && (
                  <FaStarHalfAlt className="text-lg text-yellow-400" />
                )}
                {/* Empty Stars */}
                {[...Array(5 - Math.ceil(averageRating))].map((_, i) => (
                  <FaRegStar
                    key={i + Math.ceil(averageRating)}
                    className="text-lg text-default-200"
                  />
                ))}
              </>
            ) : (
              <span className="text-sm text-default-500">No ratings yet</span>
            )}
          </div>
          <h4 className="text-base font-medium text-default-700">
            Customer Rating{" "}
            <span className="font-normal text-default-500">
              ({totalReviews > 0 ? totalReviews.toLocaleString() : "0"} reviews)
            </span>
          </h4>
        </div>

        {/* Star Ratings */}
        <div className="xl:col-span-2 md:col-span-3">
          {ratingsData.reverse().map((rating, index) => (
            <div key={index} className="grid items-center gap-2 mb-3 md:grid-cols-12">
              {/* Star Icons */}
              <div className="md:col-span-3 flex gap-1.5 lg:justify-center">
                {[...Array(rating.stars)].map((_, i) => (
                  <FaStar key={i} className="text-lg text-yellow-400" />
                ))}
                {/* Handle Half Star for Partial Ratings */}
                {/* {rating.stars % 1 !== 0 && (
                  <FaStarHalfAlt className="text-lg text-yellow-400" />
                )} */}
                {[...Array(5 - rating.stars)].map((_, i) => (
                  <FaRegStar key={i + rating.stars} className="text-lg text-yellow-500" />
                ))}
              </div>

              {/* Progress Bar */}
              <div className="md:col-span-7">
                <ProgressBar
                  completed={rating.percentage}
                  bgColor="#f7b500"
                  height="8px"
                  isLabelVisible={false}
                />
              </div>

              {/* Rating Percentage and Count */}
              <div className="md:col-span-2">
                <h4 className="inline-block text-sm font-medium text-default-700">
                  {rating.percentage}%
                </h4>
                <span className="font-normal text-default-500">
                  ({rating.count.toLocaleString()})
                </span>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default CustomerRating;
