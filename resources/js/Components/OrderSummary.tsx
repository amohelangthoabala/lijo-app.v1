import useCartStore from "@/Store/useCart";
import React from "react";
import { Button } from "./ui/button";
// Assuming the cart store is already implemented

export default function OrderSummary() {
    const { cart, subtotal, total, calculateTotal } = useCartStore();

    // Calculate sub-total
    // const subtotal = cart.reduce((acc, item) => acc + item.price * item.quantity, 0);

    // Example calculations for tax and discount
    const discount = 24; // Static or calculated value
    const tax = (subtotal - discount) * 0.15; // 15% tax
    // const total = calculateTotal(); // Assuming calculateTotal handles it, or use your formula

    return (
        <div className="mb-5">
            <div className="p-5 border rounded-lg border-default-200">
                <h4 className="mb-5 text-lg font-semibold text-default-700">Order Summary</h4>

                {cart.map((item) => (
                    <div key={item.id} className="flex items-center mb-4">
                        <img
                            src={item.image} // Assuming each item has an `image` property
                            alt={item.name}
                            className="w-20 h-20 me-2"
                        />
                        <div>
                            <h4 className="mb-2 text-sm text-default-600">{item.name}</h4>
                            <h4 className="text-sm text-default-400">
                                {item.quantity} x{" "}
                                <span className="font-semibold text-primary">
                                    ${item.price}
                                </span>
                            </h4>
                        </div>
                    </div>
                ))}

                <div className="mb-6">
                    <div className="flex justify-between mb-3">
                        <p className="text-sm text-default-500">Sub-total</p>
                        <p className="text-sm font-medium text-default-700">${subtotal?.toFixed(2)}</p>
                    </div>
                    <div className="flex justify-between mb-3">
                        <p className="text-sm text-default-500">Shipping</p>
                        <p className="text-sm font-medium text-default-700">Free</p>
                    </div>
                    <div className="flex justify-between mb-3">
                        <p className="text-sm text-default-500">Discount</p>
                        <p className="text-sm font-medium text-default-700">-${discount?.toFixed(2)}</p>
                    </div>
                    <div className="flex justify-between mb-3">
                        <p className="text-sm text-default-500">Tax</p>
                        <p className="text-sm font-medium text-default-700">${tax?.toFixed(2)}</p>
                    </div>
                    <div className="my-4 border-b border-default-200"></div>
                    <div className="flex justify-between mb-3">
                        <p className="text-base text-default-700">Total</p>
                        <p className="text-base font-medium text-default-700">${total?.toFixed(2)} USD</p>
                    </div>
                </div>

                <Button >
                    Place Order
                </Button>
            </div>
        </div>
    );
}
