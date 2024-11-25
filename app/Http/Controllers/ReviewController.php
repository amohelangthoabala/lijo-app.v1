<?php

namespace App\Http\Controllers;

use App\Services\ReviewService;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reviewable_id' => 'required|integer',
            'reviewable_type' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string',
        ]);

        $review = $this->reviewService->createReview($validated);

        return response()->json($review, 201);
    }

    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'rating' => 'nullable|integer|min:1|max:5',
            'review' => 'nullable|string',
        ]);

        $updatedReview = $this->reviewService->updateReview($review, $validated);

        return response()->json($updatedReview);
    }

    public function destroy(Review $review)
    {
        $this->reviewService->deleteReview($review);

        return response()->json(['message' => 'Review deleted successfully'], 200);
    }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'reviewable_id' => 'required|integer',
            'reviewable_type' => 'required|string',
        ]);

        $reviews = $this->reviewService->getReviews($validated['reviewable_type'], $validated['reviewable_id']);

        return response()->json($reviews);
    }
}
