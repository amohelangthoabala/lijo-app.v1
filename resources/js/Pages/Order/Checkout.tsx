import OrderSummary from '@/Components/OrderSummary';
import { Button } from '@/Components/ui/button';
import { Card, CardFooter, CardHeader, CardContent } from '@/Components/ui/card';
import { Input } from '@/Components/ui/input';
import { Label } from '@/Components/ui/label';
import { Select, SelectContent, SelectGroup, SelectItem, SelectLabel, SelectTrigger, SelectValue } from '@/Components/ui/select';
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/Components/ui/table';
import AppLayout from '@/Layouts/AppLayout';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import useCartStore from '@/Store/useCart';
import { Head, useForm } from '@inertiajs/react'
import React, { useState } from 'react'

function Checkout({ addresses }) {


    const {
        cart,
        subtotal,
        total,
        updateQuantity,
        removeFromCart,
    } = useCartStore(); // Access cart store state and actions

    const { data, setData, post } = useForm({
        // number: orderDefaults.number,
        // user_id: "",
        type: "delivery",
        date: "",
        status: "pending",
        delivery: {
            // driver_id: "",
            address_id: "",
            status: "pending",
            // time: "",
        },
        items: [], // Initialize items
    });



    // useState(() => {
    //     setData("items", cart);
    // });

    const handleSubmit = (e: any) => {
        e.preventDefault();
        post("/order"); // Submit form to backend
    };

    return (
        <AppLayout>
            <Head title="Checkout" />

            <div className="py-6 mx-auto lg:py-10 max-w-7xl">
                <h1 className="text-2xl font-bold">Checkout</h1>
                <div className="grid grid-cols-1 gap-6 lg:grid-cols-3">
                    <div className="col-span-1 lg:col-span-2">
                        <Card>
                            <CardHeader>
                                <h2 className="text-lg font-semibold">Order Details</h2>
                            </CardHeader>
                            <CardContent >
                                <form onSubmit={handleSubmit}>
                                    <div className="grid grid-cols-2 gap-4">
                                        {/* Order Number */}
                                        {/* <div>
                                            <Label htmlFor="number">Order Number</Label>
                                            <Input
                                                id="number"
                                                value={data.number}
                                                readOnly
                                                className="mt-1"
                                            />
                                        </div> */}

                                        {/* Customer */}
                                        {/* <div>
                                            <Label htmlFor="user_id">Customer</Label>
                                            <Select
                                                id="user_id"
                                                onValueChange={(value) => setData("user_id", value)}
                                                placeholder="Select a customer"
                                                value={data.user_id}
                                                className="mt-1"
                                            >
                                                {Object.entries(customers).map(([id, name]) => (
                                                    <Select.Item key={id} value={id}>
                                                        {name}
                                                    </Select.Item>
                                                ))}
                                            </Select>
                                        </div> */}

                                        {/* Order Type */}
                                        <div>
                                            <Label htmlFor="type">Order Type</Label>
                                            <Select
                                                // defaultValue={data.type}
                                                onValueChange={(value) => setData("type", value)}
                                                placeholder="Select order type"
                                                value={data.type}
                                                className="mt-1"
                                            >
                                                <SelectTrigger className="">
                                                    <SelectValue placeholder="Select a fruit" />
                                                </SelectTrigger>
                                                <SelectContent>
                                                    <SelectGroup>
                                                    <SelectLabel>Types</SelectLabel>
                                                    <SelectItem value="delivery">Delivery</SelectItem>
                                                    <SelectItem value="pickup">Pickup</SelectItem>
                                                    </SelectGroup>
                                                </SelectContent>
                                                {/* {Object.entries(orderDefaults.typeOptions).map(([value, label]) => (
                                                    <Select.Item key={value} value={value}>
                                                        {label}
                                                    </Select.Item>
                                                ))} */}
                                            </Select>
                                        </div>

                                        {/* Order Date */}
                                        <div>
                                            <Label htmlFor="date">Order Date</Label>
                                            <Input
                                                id="date"
                                                type="datetime-local"
                                                value={data.date}
                                                onChange={(e) => setData("date", e.target.value)}
                                                className="mt-1"
                                            />
                                        </div>
                                    </div>

                                    {/* Delivery Info (Conditional) */}
                                    {data.type === "delivery" && (
                                        <div className="mt-6">
                                            <h2 className="mb-2 font-semibold">Delivery Info</h2>
                                            <div className="grid grid-cols-2 gap-4">
                                                {/* Driver */}
                                                {/* <div>
                                                    <Label htmlFor="driver_id">Driver</Label>
                                                    <Select
                                                        id="driver_id"
                                                        onValueChange={(value) => setData("delivery.driver_id", value)}
                                                        placeholder="Select a driver"
                                                        value={data.delivery.driver_id}
                                                        className="mt-1"
                                                    >
                                                        {Object.entries(drivers).map(([id, name]) => (
                                                            <Select.Item key={id} value={id}>
                                                                {name}
                                                            </Select.Item>
                                                        ))}
                                                    </Select>
                                                </div> */}

                                                {/* Delivery Address */}
                                                <div>
                                                    <Label htmlFor="address_id">Delivery Address</Label>

                                                    <Select>
                                                        <SelectTrigger className="">
                                                            <SelectValue placeholder="Select an address" />
                                                        </SelectTrigger>
                                                        <SelectContent>
                                                            <SelectGroup>
                                                                <SelectLabel>Addresses</SelectLabel>

                                                                {addresses.map((address) => (
                                                                    <SelectItem value="address.id">{address.name}</SelectItem>
                                                                ))}

                                                                {/* <SelectItem value="banana">Banana</SelectItem>
                                                                <SelectItem value="blueberry">Blueberry</SelectItem>
                                                                <SelectItem value="grapes">Grapes</SelectItem>
                                                                <SelectItem value="pineapple">Pineapple</SelectItem> */}
                                                            </SelectGroup>
                                                        </SelectContent>
                                                    </Select>
                                                </div>

                                                {/* Delivery Status */}
                                                {/* <div>
                                                    <Label htmlFor="delivery_status">Delivery Status</Label>
                                                    <Select
                                                        id="delivery_status"
                                                        onValueChange={(value) => setData("delivery.status", value)}
                                                        placeholder="Select delivery status"
                                                        value={data.delivery.status}
                                                        className="mt-1"
                                                    >



                                                    </Select>
                                                </div> */}

                                                {/* Scheduled Delivery Time */}
                                                {/* <div>
                                                    <Label htmlFor="time">Scheduled Delivery Time</Label>
                                                    <Input
                                                        id="time"
                                                        type="datetime-local"
                                                        value={data.delivery.time}
                                                        onChange={(e) => setData("delivery.time", e.target.value)}
                                                        className="mt-1"
                                                    />
                                                </div> */}
                                            </div>
                                        </div>
                                    )}

                                    {/* Order Type */}
                                    <div>
                                            <Label htmlFor="type">Payment Method</Label>
                                            <Select
                                                // defaultValue={data.type}
                                                onValueChange={(value) => setData("payment", value)}
                                                placeholder="Select payment method"
                                                value={data.type}
                                                className="mt-1"
                                            >
                                                <SelectTrigger className="">
                                                    <SelectValue placeholder="Select a Payment Method" />
                                                </SelectTrigger>
                                                <SelectContent>
                                                    <SelectGroup>
                                                    <SelectLabel>Cash</SelectLabel>
                                                    <SelectItem value="delivery">Cash</SelectItem>
                                                    <SelectLabel>Mobile Money</SelectLabel>
                                                    <SelectItem value="pickup">Mpesa</SelectItem>
                                                    <SelectItem value="pickup">Ecocash</SelectItem>
                                                    <SelectItem value="pickup">C-Pay</SelectItem>
                                                    </SelectGroup>
                                                </SelectContent>
                                                {/* {Object.entries(orderDefaults.typeOptions).map(([value, label]) => (
                                                    <Select.Item key={value} value={value}>
                                                        {label}
                                                    </Select.Item>
                                                ))} */}
                                            </Select>
                                    </div>

                                    {/* Submit Button */}
                                    <CardFooter className="mt-6">
                                        <Button type="submit">Submit Order</Button>
                                    </CardFooter>
                                </form>
                            </CardContent >
                        </Card>
                    </div>

                    <OrderSummary />
                </div>
            </div>

            <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div className="p-6 text-gray-900">
                        <pre>{JSON.stringify(addresses, undefined, 2)}</pre>
                    </div>
                </div>
            </div>

        </AppLayout>
    )
}

export default Checkout
