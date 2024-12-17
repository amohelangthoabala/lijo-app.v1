import { Link } from "@inertiajs/react";
import { Button } from "./ui/button";
import { Bell, ShoppingCart, Home, Utensils, Store, List } from "lucide-react";
import { Avatar, AvatarImage, AvatarFallback } from "./ui/avatar";
import { Tooltip, TooltipProvider, TooltipTrigger, TooltipContent } from "./ui/tooltip";

const navigation = [
  { name: "Home", href: route("home"), icon: <Home className="w-5 h-5" /> },
  { name: "Meal", href: route("meal.index"), icon: <Utensils className="w-5 h-5" /> },
  { name: "Restaurant", href: route("restaurant.index"), icon: <Store className="w-5 h-5" /> },
  { name: "Orders", href: route("order.index"), icon: <List className="w-5 h-5" /> },
];

export default function Navbar({ auth }) {
  return (
    <>
      {/* Desktop Sidebar */}
      <div className="hidden md:flex absolute top-0 left-0 h-full w-16 bg-gray-800 text-white flex-col items-center py-4 space-y-4 shadow-lg z-50">
        <TooltipProvider>
          {navigation.map((item) => (
            <Tooltip key={item.name}>
              <TooltipTrigger>
                <Link
                  href={item.href}
                  className="flex flex-col items-center text-sm hover:bg-gray-700 hover:text-white w-full py-2 rounded-lg"
                >
                  {item.icon}
                </Link>
              </TooltipTrigger>
              <TooltipContent>
                <span>{item.name}</span>
              </TooltipContent>
            </Tooltip>
          ))}
        </TooltipProvider>
      </div>

      {/* Mobile Bottom Navigation */}
      <div className="fixed md:hidden bottom-0 left-0 w-full bg-gray-800 text-white flex justify-between py-4 px-6 shadow-lg z-50">
        {navigation.map((item) => (
          <Link
            key={item.name}
            href={item.href}
            className="flex flex-col items-center text-sm hover:bg-gray-700 hover:text-white w-full py-2 rounded-lg"
          >
            {item.icon}
            <span className="text-xs">{item.name}</span>
          </Link>
        ))}
      </div>

      {/* Main Content Area */}
      <div className="ml-16 md:ml-0 pt-16 md:pt-0 flex-1">
        {/* Navbar */}
        <nav className="absolute top-0 left-0 w-full dark:bg-transparent z-40">
          <div className="flex items-center justify-between h-16 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            {/* Logo */}
            <div className="flex items-center">
              <img src="/logo lijo.png" alt="Logo" className="w-auto h-8" />
            </div>

            {/* Cart and Notifications */}
            <div className="flex items-center space-x-4">
              {/* Shopping Cart */}
              <Button
                variant="ghost"
                className="relative flex items-center rounded-full bg-gray-100 text-gray-900 dark:text-gray-400 hover:text-white px-4 py-2"
              >
                <ShoppingCart className="w-6 h-6" />
                <div className="ml-2 flex flex-col items-end text-sm">
                  <span className="font-semibold">R0.00</span>
                  <span className="text-xs text-gray-500">0 items</span>
                </div>
              </Button>

              {/* Notifications */}
              <Button variant="ghost" className="relative text-gray-900 dark:text-gray-400 hover:text-white">
                <Bell className="w-6 h-6" />
              </Button>

              {/* Profile or Login */}
              {auth?.user ? (
                <Button variant="ghost" className="relative flex items-center">
                  <Avatar>
                    <AvatarImage
                      src={`https://ui-avatars.com/api/?name=${auth.user?.name || "User"}&background=random&color=fff&size=256`}
                      alt="User Profile"
                    />
                    <AvatarFallback>U</AvatarFallback>
                  </Avatar>
                </Button>
              ) : (
                <Link href="/login">
                  <Button variant="ghost" className="text-gray-900 dark:text-gray-400 hover:text-white">
                    Login
                  </Button>
                </Link>
              )}
            </div>
          </div>
        </nav>
      </div>
    </>
  );
}
