import { create } from 'zustand';
import { persist } from 'zustand/middleware';

// Define types for cart item, coupon, and the store state
type CartItem = {
  id: string;
  name: string;
  price: number;
  quantity: number;
};

type Coupon = {
  code: string;
  discount: number; // Discount in percentage (0-100)
};

type CartStoreState = {
  cart: CartItem[];
  subtotal: number;
  total: number;
  deliveryMethod: 'pickup' | 'delivery';
  taxRate: number;
  deliveryFee: number;
  coupon: Coupon;

  // Actions
  addToCart: (item: CartItem) => void;
  removeFromCart: (id: string) => void;
  updateQuantity: (id: string, action: 'increment' | 'decrement') => void;
  clearCart: () => void;
  setDeliveryMethod: (method: 'pickup' | 'delivery') => void;
  applyCoupon: (couponCode: string, discount: number) => void;
  calculateTotal: () => void;
};

const useCartStore = create<CartStoreState>()(
  persist(
    (set, get) => ({
      cart: [],
      subtotal: 0,
      total: 0,
      deliveryMethod: 'pickup',
      taxRate: 0.14,
      deliveryFee: 0,
      coupon: {
        code: '',
        discount: 0,
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

        set({
          cart: updatedCart,
          subtotal: updatedCart.reduce(
            (total, cartItem) => total + cartItem.price * cartItem.quantity,
            0
          ),
        });

        get().calculateTotal();
      },

      removeFromCart: (id) => {
        const cart = get().cart.filter((item) => item.id !== id);

        set({
          cart,
          subtotal: cart.reduce(
            (total, item) => total + item.price * item.quantity,
            0
          ),
        });

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

        set({
          cart,
          subtotal: cart.reduce(
            (total, item) => total + item.price * item.quantity,
            0
          ),
        });

        get().calculateTotal();
      },

      clearCart: () => set({ cart: [], subtotal: 0, total: 0 }),

      setDeliveryMethod: (method) => {
        const deliveryFee = method === 'delivery' ? 5 : 0;
        set({ deliveryMethod: method, deliveryFee });
        get().calculateTotal();
      },

      applyCoupon: (couponCode, discount) => {
        set({ coupon: { code: couponCode, discount } });
        get().calculateTotal();
      },

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
    { name: 'cart-storage' }
  )
);

export default useCartStore;
