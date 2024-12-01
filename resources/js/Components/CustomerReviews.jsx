import React from "react";
import { FaStar, FaCircle } from "react-icons/fa";

const Review = ({ review }) => {
  const totalStars = 5;

  return (
    <div className="py-5 border-b border-gray-300">
      <div className="flex items-center mb-3">
        {/* User Avatar */}
        <img
          src={"https://coderthemes.com/yum/assets/avatar5-504b77fd.png"} // Replace with a user-specific avatar if available
          alt={`${review.user.name}'s avatar`}
          className="w-12 h-12 rounded-full me-4"
        />
        <div>
          {/* User Name and Review Timestamp */}
          <div className="flex items-center gap-2 mb-2">
            <h4 className="text-sm font-medium text-gray-800">
              {review.user.name}
            </h4>
            <FaCircle className="text-[5px] text-gray-400" />
            <h4 className="text-sm font-medium text-gray-400">
              {new Date(review.created_at).toLocaleDateString("en-US", {
                year: "numeric",
                month: "short",
                day: "numeric",
              })}
            </h4>
          </div>
          {/* Star Rating */}
          <div className="flex gap-1.5">
            {Array.from({ length: totalStars }, (_, index) => (
              <FaStar
                key={index}
                className={`text-base ${
                  index < review.rating ? "text-yellow-400" : "text-gray-300"
                }`}
              />
            ))}
          </div>
        </div>
      </div>
      {/* Review Text */}
      <p className="text-gray-600">{review.review}</p>
    </div>
  );
};

const CustomerReviews = ({ reviews }) => {
  return (
    <section className="pt-10">
      <h4 className="mb-5 text-base font-medium text-gray-800">
        Customer Reviews
      </h4>
      {reviews.length > 0 ? (
        reviews.map((review) => (
          <Review key={review.id} review={review} />
        ))
      ) : (
        <p className="text-gray-500">No reviews yet.</p>
      )}
    </section>
  );
};

export default CustomerReviews;
