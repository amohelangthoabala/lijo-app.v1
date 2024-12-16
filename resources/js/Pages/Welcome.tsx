import AboutUs from '@/Components/About';
import HeroSection from '@/Components/Hero';
import AppLayout from '@/Layouts/AppLayout';
import { PageProps } from '@/types';
import { Head, Link } from '@inertiajs/react';

export default function Welcome({
    auth,
    laravelVersion,
    phpVersion,
}: PageProps<{ laravelVersion: string; phpVersion: string }>) {
    const handleImageError = () => {
        document
            .getElementById('screenshot-container')
            ?.classList.add('!hidden');
        document.getElementById('docs-card')?.classList.add('!row-span-1');
        document
            .getElementById('docs-card-content')
            ?.classList.add('!flex-row');
        document.getElementById('background')?.classList.add('!hidden');
    };

    return (
        <>
            <Head title="Welcome" />
            <AppLayout>

                <div className="mx-auto mt-1 max-w-7xl">
                    <HeroSection />

                    <AboutUs />
                </div>
            </AppLayout>

        </>
    );
}
