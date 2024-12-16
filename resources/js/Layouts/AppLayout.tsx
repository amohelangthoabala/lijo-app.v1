import Navbar from '@/Components/Navbar';
import { Link, usePage } from '@inertiajs/react';
import React, { PropsWithChildren } from 'react';

const AppLayout = ({ children }: PropsWithChildren) => {
    const { auth } = usePage().props;

    return (
        <>
            <div className="flex flex-col min-h-screen bg-white dark:bg-gray-800">
                <Navbar />
                <main className="flex-grow">{children}</main>
            </div>
        </>
        // <div className="min-h-screen bg-gray-100">
        //     <header className="bg-white shadow">
        //         <div className="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        //             <nav className="flex justify-between">
        //                 <div className="">
        //                     <Link
        //                         href="/examples/dashboard"
        //                         className="text-sm font-medium transition-colors hover:text-primary"
        //                     >
        //                         Overview
        //                     </Link>
        //                     <Link
        //                         href="/examples/dashboard"
        //                         className="text-sm font-medium transition-colors text-muted-foreground hover:text-primary"
        //                     >
        //                         Customers
        //                     </Link>
        //                     <Link
        //                         href="/examples/dashboard"
        //                         className="text-sm font-medium transition-colors text-muted-foreground hover:text-primary"
        //                     >
        //                         Products
        //                     </Link>
        //                     <Link
        //                         href="/examples/dashboard"
        //                         className="text-sm font-medium transition-colors text-muted-foreground hover:text-primary"
        //                     >
        //                         Settings
        //                     </Link>
        //                 </div>


        //                 <div>
        //                     {auth?.user ? (
        //                         <span className="text-sm">
        //                             Welcome, {auth.user.name}
        //                         </span>
        //                     ) : (
        //                         <Link href="/login" className="text-sm text-blue-500">
        //                             Login
        //                         </Link>
        //                     )}
        //                 </div>
        //             </nav>
        //         </div>
        //     </header>
        //     <main>{children}</main>
        //     <footer className="py-4 text-center bg-gray-200">
        //         &copy; {new Date().getFullYear()} My App. All rights reserved.
        //     </footer>
        // </div>
    );
};

export default AppLayout;
