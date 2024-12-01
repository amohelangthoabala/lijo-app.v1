import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import { Head } from '@inertiajs/react'
import React from 'react'

function Orders({ auth, orders}) {
    const calculateTotal = (items) => {
        return items.reduce((total, item) => {
          return total + parseFloat(item.price) * item.quantity;
        }, 0);
    };

  return (
    <AuthenticatedLayout
        user={auth.user}
        header={
            <div className='flex items-center justify-between'>
                <div>
                    <h2 className="text-xl font-semibold leading-tight text-gray-800">
                        Orders
                    </h2>

                </div>


                <div>
                    <button className='p-2 px-4 ml-4 text-white bg-orange-500 rounded-lg border-1'>Go to Cart</button>
                </div>
            </div>
        }
    >
        <Head title="Orders" />

        <div className="py-6 mx-auto lg:py-10 max-w-7xl">
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
                                Order number
                            </th>
                            <th
                                scope="col"
                                className="px-5 py-3 text-xs font-medium uppercase text-start text-default-500 whitespace-nowrap"
                            >
                                status
                            </th>
                            <th
                                scope="col"
                                className="px-5 py-3 text-xs font-medium uppercase text-start text-default-500 whitespace-nowrap"
                            >
                                Date
                            </th>
                            <th
                                scope="col"
                                className="px-5 py-3 text-xs font-medium text-center uppercase text-default-500 whitespace-nowrap"
                            >
                                Amount
                            </th>
                            </tr>
                        </thead>
                        <tbody className="divide-y divide-default-200">
                            {orders.data.map((order, index) => (
                            <tr key={index}>
                                <td className="px-5 py-3 whitespace-nowrap">
                                    {order.number}
                                </td>
                                <td className="px-5 py-3 text-sm whitespace-nowrap text-default-800">
                                    {order.delivery.status}
                                </td>
                                <td className="px-5 py-3 text-sm whitespace-nowrap text-default-800">
                                    {order.date}
                                </td>
                                <td className="px-5 py-3 text-sm text-center whitespace-nowrap text-default-800">
                                ${(calculateTotal(order.items)).toFixed(2)}
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

        {/* <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div className="p-6 text-gray-900">
                        <pre>{JSON.stringify(orders, undefined, 2)}</pre>
                    </div>
                </div>
            </div> */}


    </AuthenticatedLayout>
  )
}

export default Orders
