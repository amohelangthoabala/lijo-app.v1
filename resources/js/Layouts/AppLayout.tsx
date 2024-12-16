import Navbar from '@/Components/Navbar';
import { Link, usePage } from '@inertiajs/react';
import React, { PropsWithChildren } from 'react';

const AppLayout = ({ children }: PropsWithChildren) => {
    const { auth } = usePage().props;

    return (
        <>
            <div className="flex flex-col min-h-screen bg-white dark:bg-gray-800">
                <Navbar auth={auth} />
                <main className="flex-grow">{children}</main>
            </div>
        </>
    );
};

export default AppLayout;
