import AppLayout from '@/Layouts/AppLayout';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import useCartStore from '@/Store/useCart';
import { Head, Link } from '@inertiajs/react'
import React, { useState } from 'react'
import { MdOutlineCancel } from "react-icons/md";
import { toast } from 'react-toastify';

function Cart() {
    // Access cart store state and actions
    const { cart, coupon, subtotal, total, updateQuantity, removeFromCart, applyCoupon, calculateTotal } = useCartStore();

    const [couponCode, setCouponCode] = useState("");
    const [couponDiscount, setCouponDiscount] = useState(0);

    const handleQuantityChange = (id, action) => {
        updateQuantity(id, action);

        toast.info(
            `meal quantity ${action === "increment" ? "increased" : "decreased"}.`,
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

    const removeItem = (id) => {
        removeFromCart(id);

        // Show toast notification
        toast.success(`meal removed from cart!`, {
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

    const handleCouponApply = () => {
        // Assume you have some logic to calculate the discount based on the coupon code
        // For now, we'll just apply a flat discount of 10% for example
        const discount = 10;  // For example purposes, you could replace this with an actual coupon validation
        applyCoupon(couponCode, discount);
        calculateTotal();
    };

  return (
    <AppLayout
    >
        <Head title="Cart" />

        <section className="py-6 mx-auto lg:py-10 max-w-7xl">
            <div className="container">
                <div className="grid grid-cols-1 gap-6 lg:grid-cols-3">
                    <div className="col-span-1 lg:col-span-2">
                        <div className="border rounded-lg border-default-200">
                            <div className="px-6 py-5 border-b border-default-200">
                                <h4 className="text-lg font-medium text-default-800">Shopping Cart</h4>
                            </div>

                            <div className="flex flex-col overflow-hidden">
                                <div className="-m-1.5 overflow-x-auto">
                                    <div className="p-1.5 min-w-full inline-block align-middle">
                                        <div className="overflow-hidden">
                                            <table className="min-w-full divide-y divide-default-200">
                                                <thead className="bg-default-400/10">
                                                    <tr>
                                                        <th
                                                            scope="col"
                                                            className="min-w-[14rem] px-5 py-3 text-start text-xs font-medium text-default-500 uppercase"
                                                        >
                                                            Products
                                                        </th>
                                                        <th
                                                            scope="col"
                                                            className="px-5 py-3 text-xs font-medium uppercase text-start text-default-500"
                                                        >
                                                            Price
                                                        </th>
                                                        <th
                                                            scope="col"
                                                            className="px-5 py-3 text-xs font-medium uppercase text-start text-default-500"
                                                        >
                                                            Quantity
                                                        </th>
                                                        <th
                                                            scope="col"
                                                            className="px-5 py-3 text-xs font-medium text-center uppercase text-default-500"
                                                        >
                                                            Sub-Total
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody className="divide-y divide-default-200">
                                                    {cart.map((item) => (
                                                        <tr key={item.id}>
                                                            <td className="px-5 py-3 whitespace-nowrap">
                                                                <div className="flex items-center gap-2">
                                                                    <button
                                                                        onClick={() => removeItem(item.id)}
                                                                    >
                                                                        <MdOutlineCancel className="w-5 h-5 text-default-400" />
                                                                    </button>
                                                                    <img
                                                                        src={item.image}
                                                                        className="w-16 h-16"
                                                                        alt={item.name}
                                                                    />
                                                                    <h4 className="text-sm font-medium text-default-800">
                                                                        {item.name}
                                                                    </h4>
                                                                </div>
                                                            </td>
                                                            <td className="px-5 py-3 text-sm whitespace-nowrap text-default-800">
                                                                ${item.price}
                                                            </td>
                                                            <td className="px-5 py-3 whitespace-nowrap">
                                                                <div className="inline-flex justify-between p-1 border rounded-full border-default-200">
                                                                    <button
                                                                        onClick={() => handleQuantityChange(item.id, 'decrement')}
                                                                        className="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 text-sm rounded-full minus bg-default-200 text-default-800"
                                                                    >
                                                                        –
                                                                    </button>
                                                                    <input
                                                                        type="text"
                                                                        className="w-8 p-0 text-sm text-center bg-transparent border-0 text-default-800 focus:ring-0"
                                                                        value={item.quantity}
                                                                        readOnly
                                                                    />
                                                                    <button
                                                                        onClick={() => handleQuantityChange(item.id, 'increment')}
                                                                        className="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 text-sm rounded-full plus bg-default-200 text-default-800"
                                                                    >
                                                                        +
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <td className="px-5 py-3 text-sm text-center whitespace-nowrap text-default-800">
                                                                ${(item.price * item.quantity).toFixed(2)}
                                                            </td>
                                                        </tr>
                                                    ))}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div className="px-6 py-5 border-t border-default-200">
                                <div className="flex flex-wrap items-center justify-between gap-2">
                                    <button className="inline-flex items-center justify-center px-6 py-3 text-sm font-medium text-center text-orange-500 transition-all duration-500 border border-orange-500 rounded-full shadow-sm hover:bg-orange-500 hover:text-white">
                                        Return to Shop
                                    </button>

                                    <button className="inline-flex items-center justify-center px-6 py-3 text-sm font-medium text-center text-orange-500 transition-all duration-500 border border-orange-500 rounded-full shadow-sm hover:bg-orange-500 hover:text-white">
                                        Update Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div className="p-5 mb-5 border rounded-lg border-default-200">
                            <h4 className="mb-5 text-lg font-semibold text-default-800">Cart Totals</h4>
                            <div className="mb-6">
                                <div className="flex justify-between mb-3">
                                    <p className="text-sm text-default-500">Sub-total</p>
                                    <p className="text-sm font-medium text-default-700">${subtotal.toFixed(2)}</p>
                                </div>
                                <div className="flex justify-between mb-3">
                                    <p className="text-sm text-default-500">Delivery</p>
                                    <p className="text-sm font-medium text-default-700">Free</p>
                                </div>
                                <div className="flex justify-between mb-3">
                                    <p className="text-sm text-default-500">Discount</p>
                                    <p className="text-sm font-medium text-default-700">${(subtotal * coupon.discount / 100).toFixed(2)}</p>
                                </div>
                                <div className="flex justify-between mb-3">
                                    <p className="text-sm text-default-500">Tax</p>
                                    <p className="text-sm font-medium text-default-700">${((subtotal - couponDiscount) * 0.14).toFixed(2)}</p>
                                </div>
                                <div className="my-4 border-b border-default-200"></div>
                                <div className="flex justify-between mb-3">
                                    <p className="text-base text-default-700">Total</p>
                                    <p className="text-base font-medium text-default-700">${total.toFixed(2)}</p>
                                </div>
                            </div>

                            <Link
                                href={route('checkout')}
                                className="inline-flex items-center justify-center w-full px-10 py-3 text-sm font-medium text-center text-white transition-all duration-500 bg-orange-500 border border-orange-500 rounded-full shadow-sm hover:bg-orange-500-500"
                            >
                                Proceed to Checkout
                            </Link>
                        </div>

                        <div className="border rounded-lg border-default-200">
                            <div className="px-6 py-5 border-b border-default-200">
                                <h4 className="text-lg font-semibold text-default-800">Coupon Code</h4>
                            </div>
                            <div className="p-6">
                                <input
                                    id="couponCode"
                                    className="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200"
                                    type="text"
                                    value={couponCode}
                                    onChange={(e) => setCouponCode(e.target.value)}
                                    placeholder="Enter Coupon Code"
                                />

                                <div className="flex justify-end mt-4">
                                    <button
                                        onClick={handleCouponApply}
                                        className="inline-flex items-center justify-center px-6 py-3 text-sm font-medium text-center text-white transition-all duration-500 bg-orange-500 border border-orange-500 rounded-full shadow-sm hover:bg-orange-500-500"
                                    >
                                        Apply Coupon
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AppLayout>
  )
}

export default Cart
