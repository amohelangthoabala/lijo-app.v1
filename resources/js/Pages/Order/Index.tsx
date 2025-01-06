import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/Components/ui/table';
import AppLayout from '@/Layouts/AppLayout';
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
    <AppLayout>
        <Head title="Orders" />

        <div className="py-6 mx-auto lg:py-10 max-w-7xl">
            <div className="overflow-hidden border rounded-lg border-default-200">
                <div className="relative overflow-x-auto">
                    <div className="inline-block min-w-full align-middle">
                    <div className="overflow-hidden">
                    <Table className="">
                        <TableHeader className="">
                            <TableRow>
                            <TableHead className="">
                                Order Number
                            </TableHead>
                            <TableHead className="">
                                Status
                            </TableHead>
                            <TableHead className="">
                                Date
                            </TableHead>
                            <TableHead className="">
                                Amount
                            </TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody className="">
                            {orders.data.map((order, index) => (
                            <TableRow key={index}>
                                <TableCell className="">
                                {order.number}
                                </TableCell>
                                <TableCell className="">
                                {order.delivery?.status}
                                </TableCell>
                                <TableCell className="">
                                {order.date}
                                </TableCell>
                                <TableCell className="">
                                ${(calculateTotal(order.items)).toFixed(2)}
                                </TableCell>
                            </TableRow>
                            ))}
                        </TableBody>
                    </Table>
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


    </AppLayout>
  )
}

export default Orders
