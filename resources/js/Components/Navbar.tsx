import { Link } from "@inertiajs/react";
import { Button } from "./ui/button";
import {
  DropdownMenu,
  DropdownMenuTrigger,
  DropdownMenuContent,
  DropdownMenuItem,
} from "./ui/dropdown-menu";
import { Sheet, SheetTrigger, SheetContent } from "./ui/sheet";
import { Bell, Menu, ShoppingBag, X } from "lucide-react";

// Define the navigation links
const navigation = [
  { name: "Home", href: route("home"), current: route().current("home") },
  { name: "Meal", href: route("meal.index"), current: route().current("meal.index") },
  { name: "Restaurant", href: route("restaurant.index"), current: route().current("restaurant.index") },
];

// Utility function to merge class names
function classNames(...classes: string[]) {
  return classes.filter(Boolean).join(" ");
}

// Define props for Navbar
interface NavbarProps {
  auth: {
    user: {
      id: number;
      name: string;
      email: string;
    };
  };
}

export default function Navbar({ auth }: NavbarProps) {
  return (
    <nav className="dark:bg-gray-800">
      <div className="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div className="flex items-center justify-between h-16">
          {/* Mobile Menu */}
          <Sheet>
            <SheetTrigger asChild>
              <Button
                variant="ghost"
                className="dark:text-gray-400 sm:hidden hover:text-white focus:outline-none"
              >
                <Menu className="w-6 h-6" />
              </Button>
            </SheetTrigger>
            <SheetContent side="left" className="dark:text-white dark:bg-gray-800">
              <div className="space-y-1">
                {navigation.map((item) => (
                  <a
                    key={item.name}
                    href={item.href}
                    className={classNames(
                      item.current
                        ? "bg-gray-900 text-white"
                        : "text-gray-300 hover:bg-gray-700 hover:text-white",
                      "block rounded-md px-3 py-2 text-base font-medium"
                    )}
                  >
                    {item.name}
                  </a>
                ))}
              </div>
            </SheetContent>
          </Sheet>

          {/* Logo */}
          <div className="flex items-center">
            <img
              src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"
              alt="Logo"
              className="w-auto h-8"
            />
          </div>

          {/* Desktop Navigation */}
          <div className="hidden sm:block">
            <div className="flex space-x-4">
              {navigation.map((item) => (
                <Link
                  key={item.name}
                  href={item.href}
                  className={classNames(
                    item.current
                      ? "bg-gray-900 text-white"
                      : "text-gray-900 dark:text-gray-400 hover:bg-gray-700 hover:text-white",
                    "rounded-md px-3 py-2 text-sm font-medium"
                  )}
                >
                  {item.name}
                </Link>
              ))}
            </div>
          </div>

          {/* Notifications and Profile */}
          <div className="flex items-center space-x-4">
            {/* Notifications */}
            <Button
              variant="ghost"
              className="relative text-gray-900 dark:text-gray-400 hover:text-white"
            >
              <Bell className="w-6 h-6" />
            </Button>

            <Button
              variant="ghost"
              className="relative text-gray-900 dark:text-gray-400 hover:text-white"
            >
              <ShoppingBag className="w-6 h-6" />
            </Button>

            {/* Profile Dropdown */}
            <DropdownMenu>
              <DropdownMenuTrigger asChild>
                <Button variant="ghost" className="relative flex items-center">
                  <img
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt="User Profile"
                    className="w-8 h-8 rounded-full"
                  />
                </Button>
              </DropdownMenuTrigger>
              <DropdownMenuContent align="end" className="bg-white">
                <DropdownMenuItem>
                  <span className="text-sm text-gray-700">Signed in as</span>
                  <p className="text-sm font-bold text-gray-900">{auth.user.name}</p>
                </DropdownMenuItem>
                <DropdownMenuItem>
                  <a href="#" className="text-sm text-gray-700">
                    Your Profile
                  </a>
                </DropdownMenuItem>
                <DropdownMenuItem>
                  <a href="#" className="text-sm text-gray-700">
                    Settings
                  </a>
                </DropdownMenuItem>
                <DropdownMenuItem>
                  <a href={route("logout")} className="text-sm text-gray-700">
                    Sign Out
                  </a>
                </DropdownMenuItem>
              </DropdownMenuContent>
            </DropdownMenu>
          </div>
        </div>
      </div>
    </nav>
  );
}
