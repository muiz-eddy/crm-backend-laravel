import ApplicationLogo from '@/Components/ApplicationLogo';
import TypeWriter from '@/Components/TypeWriter';
import { Link } from '@inertiajs/react';

export default function Guest({ children }) {
    return (
        <div className="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <Link href="/">
                    {/* TODO: Add Logo Border */}
                    <ApplicationLogo className="w-21 h-21 fill-current text-gray-500 rounded-full border border-solid border-black-200" />
                </Link>
            </div>
            <TypeWriter className="login-welcome" text="Welcome Back Mr. SoyDev"/>
            <div className="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {children}
            </div>
        </div>
    );
}
