import { create } from 'zustand';
import { persist } from 'zustand/middleware';

const useCartStore = create(
    persist(
        (set, get) => ({
            cart: [],
            subtotal: 0, // Subtotal amount before taxes and discounts
            total: 0,    // Total amount after discounts, taxes, and delivery fee
            deliveryMethod: 'pickup',
            taxRate: 0.14, // Default tax rate
            deliveryFee: 0, // Delivery fee starts at 0

            // Coupon
            coupon: {
                code: '',
                discount: 0, // Discount in percentage (0-100)
            },

            addToCart: (item) => {
                const cart = get().cart;
                const existingItem = cart.find((cartItem) => cartItem.id === item.id);

                const updatedCart = existingItem
                    ? cart.map((cartItem) =>
                          cartItem.id === item.id
                              ? { ...cartItem, quantity: cartItem.quantity + 1 }
                              : cartItem
                      )
                    : [...cart, { ...item, quantity: 1 }];

                // Update the cart and recalculate the subtotal and total
                set({
                    cart: updatedCart,
                    subtotal: updatedCart.reduce((total, item) => total + item.price * item.quantity, 0),
                });

                // Recalculate the total after cart update
                get().calculateTotal();
            },

            removeFromCart: (id) => {
                const cart = get().cart.filter((item) => item.id !== id);

                // Update the cart and recalculate the subtotal and total
                set({
                    cart,
                    subtotal: cart.reduce((total, item) => total + item.price * item.quantity, 0),
                });

                // Recalculate the total after cart update
                get().calculateTotal();
            },

            updateQuantity: (id, action) => {
                const cart = get().cart.map((item) =>
                    item.id === id
                        ? {
                              ...item,
                              quantity:
                                  action === 'increment'
                                      ? item.quantity + 1
                                      : item.quantity > 1
                                      ? item.quantity - 1
                                      : item.quantity,
                          }
                        : item
                );

                // Update the cart and recalculate the subtotal and total
                set({
                    cart,
                    subtotal: cart.reduce((total, item) => total + item.price * item.quantity, 0),
                });

                // Recalculate the total after quantity update
                get().calculateTotal();
            },

            clearCart: () => set({ cart: [], subtotal: 0, total: 0 }),

            // Set the delivery method and update the delivery fee
            setDeliveryMethod: (method) => {
                const deliveryFee = method === 'delivery' ? 5 : 0; // Example: delivery fee of $5 for delivery method
                set({ deliveryMethod: method, deliveryFee });

                // Recalculate the total after delivery method change
                get().calculateTotal();
            },

            // Apply a coupon and calculate discount
            applyCoupon: (couponCode, discount) => {
                set({
                    coupon: { code: couponCode, discount },
                });

                // Recalculate the total after coupon application
                get().calculateTotal();
            },

            // Calculate total with taxes, coupon, and delivery fee
            calculateTotal: () => {
                const subtotal = get().subtotal;
                const discount = get().coupon.discount;
                const taxRate = get().taxRate;
                const deliveryFee = get().deliveryFee;

                const discountAmount = (subtotal * discount) / 100;
                const taxAmount = (subtotal - discountAmount) * taxRate;
                const total = subtotal - discountAmount + taxAmount + deliveryFee;

                set({ total });
            },
        }),
        { name: 'cart-storage' } // Key for localStorage
    )
);

export default useCartStore;
