import OrderSteps from '@/Components/OrderSteps'
import AppLayout from '@/Layouts/AppLayout'
import { Head, router } from '@inertiajs/react'
import React, { useEffect } from 'react'
import { MdLocationOn } from "react-icons/md";
import { RiEBike2Fill } from "react-icons/ri";
import { BsDot } from "react-icons/bs";
import useCartStore from '@/Store/useCart';

function Show({auth, order, success}) {

    const {clearCart} = useCartStore(); // Access cart store state and actions

    if(success) {
        clearCart();
    }

    useEffect(() => {
        setInterval(() => {
            router.reload({ only: ['order'] });
        }, 3000);
    }, []);


    const formatDateTime = (timestamp) => {
        const date = new Date(timestamp);

        // Get date components
        const month = date.toLocaleString("default", { month: "long" }); // "April"
        const day = String(date.getDate()).padStart(2, "0"); // "05"
        const year = date.getFullYear(); // "2024"

        // Get time components
        const hours = String(date.getHours()).padStart(2, "0");
        const minutes = String(date.getMinutes()).padStart(2, "0");

        return `${month}, ${day} ${year} at ${hours}:${minutes}`;
    };

  return (
    <AppLayout>
        {/* <Head title="Order" /> */}

        <div className="py-6 mx-auto lg:py-10 max-w-7xl">
            <div className="p-6">
                <div className="grid grid-cols-1 gap-6 xl:grid-cols-4 md:grid-cols-2">
                    <div className="p-2 bg-white rounded-lg shadow xl:col-span-3 md:col-span-2">
                        <OrderSteps />

                        <div className="overflow-hidden border rounded-lg border-default-200">
                            <div className="relative overflow-x-auto">
                                <div className="inline-block min-w-full align-middle">
                                <div className="overflow-hidden">
                                    <table className="min-w-full divide-y divide-default-200">
                                    <thead className="bg-orange-400/10">
                                        <tr>
                                        <th
                                            scope="col"
                                            className="min-w-[14rem] px-5 py-3 text-start text-xs font-medium text-default-500 whitespace-nowrap uppercase"
                                        >
                                            Item
                                        </th>
                                        <th
                                            scope="col"
                                            className="px-5 py-3 text-xs font-medium uppercase text-start text-default-500 whitespace-nowrap"
                                        >
                                            Price
                                        </th>
                                        <th
                                            scope="col"
                                            className="px-5 py-3 text-xs font-medium uppercase text-start text-default-500 whitespace-nowrap"
                                        >
                                            Quantity
                                        </th>
                                        <th
                                            scope="col"
                                            className="px-5 py-3 text-xs font-medium text-center uppercase text-default-500 whitespace-nowrap"
                                        >
                                            Sub-Total
                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody className="divide-y divide-default-200">
                                        {order.data.items.map((product, index) => (
                                        <tr key={index}>
                                            <td className="px-5 py-3 whitespace-nowrap">
                                            <div className="flex items-center gap-2">
                                                <img
                                                    src={product.meal.image}
                                                    alt={product.meal.name}
                                                    className="object-cover w-16 h-16 rounded"
                                                />
                                                <h4 className="text-sm font-medium text-default-800">
                                                    {product.meal.name}
                                                </h4>
                                            </div>
                                            </td>
                                            <td className="px-5 py-3 text-sm whitespace-nowrap text-default-800">
                                            ${product.price}
                                            </td>
                                            <td className="px-5 py-3 text-sm whitespace-nowrap text-default-800">
                                            x{product.quantity}
                                            </td>
                                            <td className="px-5 py-3 text-sm text-center whitespace-nowrap text-default-800">
                                            ${(product.price * product.quantity).toFixed(2)}
                                            </td>
                                        </tr>
                                        ))}
                                    </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div className="xl:col-span-1 md:col-span-2">
                        <div className="mb-2 bg-white border rounded-lg shadow border-default-200">
                            <div className="p-4">
                            <h4 className="text-sm font-medium text-default-800">Payment Details</h4>
                            </div>
                            <div className="px-4 ">
                                <div className="px-4 bg-gray-200 rounded-lg">
                                    <div className="flex justify-between pt-2 mb-1 rounded-lg">
                                        <h4 className="text-sm text-default-700">Subtotal </h4>
                                        <h4 className="text-sm font-medium text-default-800">$3159.95</h4>
                                    </div>

                                    <div className="flex justify-between pt-2 mb-2 rounded-lg">
                                        <h4 className="text-sm text-default-700">Discount (10%) </h4>
                                        <h4 className="text-sm font-medium text-default-800">-$315.95</h4>
                                    </div>

                                    <div className="flex justify-between pt-2 mb-2 rounded-lg">
                                        <h4 className="text-sm text-default-700">Delivery </h4>
                                        <h4 className="text-sm font-medium text-default-800">$20.00</h4>
                                    </div>

                                    <hr className=''/>

                                    <div className="flex justify-between py-2 mb-2 rounded-lg">
                                        <h4 className="text-sm text-default-700">Total </h4>
                                        <h4 className="text-sm font-medium text-default-800">$212.79</h4>
                                    </div>
                                </div>

                            {/* {details.map((detail, index) => (
                                <div
                                key={index}
                                className={`py-4 flex justify-between ${
                                    index < details.length - 1 ? "border-b border-default-200" : ""
                                }`}
                                >
                                <h4 className="text-sm text-default-700">{detail.label} :</h4>
                                <h4 className="text-sm font-medium text-default-800">{detail.value}</h4>
                                </div>
                            ))} */}
                            </div>
                        </div>

                        <div className="bg-white border rounded-lg shadow border-default-200">
                            <div className="p-4">
                            <h4 className="text-sm font-medium text-default-800">Delivery Details</h4>
                            </div>
                            <div className="p-2 px-4 mx-4 mb-2 bg-gray-200 rounded-lg">
                                <h4 class="text-base font-medium text-default-800 mb-1">Address</h4>
                                <p class="text-sm text-default-600 mb-4">2123 Parker st. Allentown, New Mexico 123456</p>

                                <h4 class="text-base font-medium text-default-800 mb-1">Driver</h4>
                                <p class="text-sm text-default-600 mb-4">{order.data.delivery.driver.name}</p>

                                <h4 class="text-base font-medium text-default-800 mb-1">Expected Delivery Time</h4>
                                <p class="text-sm text-default-600 mb-4">{order.data.date || 'unknown'}</p>



                                {/* <div className="px-4 mb-2 bg-gray-200 rounded-lg">
                                    <div className="flex items-center justify-between py-1 mb-2 rounded-lg">
                                        <span className="mr-2 text-sm text-default-700"><MdLocationOn size={18}/></span>
                                        <h4 className="text-sm font-medium text-default-800">{order.data.delivery.address.name}</h4>
                                    </div>

                                    <div className="flex items-center gap-2 py-1 mb-2 rounded-lg">
                                        <span className="mr-2 text-sm text-default-700"><RiEBike2Fill size={18}/></span>
                                        <h4 className="text-sm font-medium text-default-800">{order.data.delivery.driver.name}</h4>
                                    </div>


                                </div> */}

                            {/* {details.map((detail, index) => (
                                <div
                                key={index}
                                className={`py-4 flex justify-between ${
                                    index < details.length - 1 ? "border-b border-default-200" : ""
                                }`}
                                >
                                <h4 className="text-sm text-default-700">{detail.label} :</h4>
                                <h4 className="text-sm font-medium text-default-800">{detail.value}</h4>
                                </div>
                            ))} */}
                            </div>
                        </div>
                    </div>

                </div>
            </div>




        </div>


        {/* <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div className="p-6 text-gray-900">
                        <pre>{JSON.stringify(order, undefined, 2)}</pre>
                    </div>
                </div>
            </div> */}

    </AppLayout>
  )
}

export default Show
