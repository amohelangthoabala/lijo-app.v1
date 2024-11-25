<?php

namespace App\Services;

use App\Models\Review;

class ReviewService
{
    public function createReview(array $data): Review
    {
        return Review::create($data);
    }

    public function updateReview(Review $review, array $data): Review
    {
        $review->update($data);
        return $review;
    }

    public function deleteReview(Review $review): void
    {
        $review->delete();
    }

    public function getReviews(string $reviewableType, int $reviewableId)
    {
        return Review::where('reviewable_type', $reviewableType)
                    ->where('reviewable_id', $reviewableId)
                    ->with('user') // Eager load the user relationship
                    ->latest()
                    ->get();
    }
}
