# Project Documentation: TifawinSouk

## Introduction
This documentation provides a detailed overview of the TifawinSouk E-commerce project. It starts by outlining the data models and their relationships, forming the backbone of the application's business logic.

---

## 1. Models & Database Schema

The application uses Laravel's Eloquent ORM. Below is a detailed breakdown of each model, its fields, relationships, and special behaviors.

### 1.1 User
Represents a registered user of the platform.

*   **Table:** `users`
*   **Purpose:** Handles authentication and user-specific data.
*   **Key Attributes:**
    *   `name`: User's full name.
    *   `email`: User's email address (unique).
    *   `password`: Hashed password.
*   **Relationships:**
    *   `cart()`: A user has one active cart (`HasOne`).
*   **Special Features:**
    *   **Hidden Fields:** `password` and `remember_token` are hidden from array/JSON serialization.
    *   **Casts:** `email_verified_at` is cast to `datetime`, `password` is cast to `hashed`.
    *   Uses `Notifiable` trait for sending notifications.

### 1.2 Category
Represents a product category.

*   **Table:** `categories`
*   **Purpose:** Organizes products into logical groups.
*   **Key Attributes:**
    *   `name`: Name of the category.
    *   `slug`: URL-friendly version of the name.
    *   `description`: Optional description of the category.
*   **Relationships:**
    *   `products()`: A category has many products (`HasMany`).

### 1.3 Supplier
Represents a supplier of products.

*   **Table:** `suppliers`
*   **Purpose:** Stores information about product sources.
*   **Key Attributes:**
    *   `first_name`: Supplier's first name.
    *   `last_name`: Supplier's last name.
    *   `email`: Contact email.
    *   `phone`: Contact phone number.
    *   `city`: Base city of the supplier.
*   **Relationships:**
    *   *Note: While not explicitly defined in the `Supplier` model, the `Product` model has a `belongsTo` relationship with `Supplier`, implying a `HasMany` relationship here.*

### 1.4 Product
Represents an item available for sale.

*   **Table:** `products`
*   **Purpose:** The core entity for the e-commerce catalog.
*   **Key Attributes:**
    *   `category_id`: Foreign key to `categories`.
    *   `supplier_id`: Foreign key to `suppliers`.
    *   `name`: Product name.
    *   `reference`: Unique SKU or reference code.
    *   `description`: Detailed information about the product.
    *   `price`: Unit price.
    *   `stock`: Quantity available in inventory.
    *   `image_path`: Path to the product image.
*   **Relationships:**
    *   `category()`: Belongs to a specific category (`BelongsTo`).
    *   `supplier()`: Belongs to a specific supplier (`BelongsTo`).
    *   `cartItems()`: Can be in many carts (`HasMany`).
    *   `orderItems()`: Can be in many orders (`HasMany`).
*   **Special Features:**
    *   **Soft Deletes:** Records are not permanently deleted but marked as deleted.
    *   **Casts:** `price` is cast to `decimal:2` (2 decimal places), `stock` is cast to `integer`.

### 1.5 Cart
Represents a user's shopping cart.

*   **Table:** `carts`
*   **Purpose:** Holds items a user intends to purchase.
*   **Key Attributes:**
    *   `user_id`: Foreign key to the user who owns the cart.
*   **Relationships:**
    *   `user()`: Belongs to a user (`BelongsTo`).
    *   `cartItems()`: Has many individual cart items (`HasMany`).
    *   `products()`: Retrieves all products in the cart via `cart_items` pivot table (`BelongsToMany`). Accesses pivot fields `quantity` and `price`.

### 1.6 CartItem
Represents a specific product within a cart.

*   **Table:** `cart_items`
*   **Purpose:** Links a product to a cart with a specific quantity.
*   **Key Attributes:**
    *   `cart_id`: Foreign key to `carts`.
    *   `product_id`: Foreign key to `products`.
    *   `quantity`: Number of units of the product.
    *   `price`: Price of the item (likely snapshot or current price).
*   **Relationships:**
    *   `cart()`: Belongs to a cart (`BelongsTo`).
    *   `product()`: Belongs to a product (`BelongsTo`).

### 1.7 Order
Represents a completed or in-progress purchase.

*   **Table:** `orders`
*   **Purpose:** Captures the details of a transaction.
*   **Key Attributes:**
    *   `user_id`: Foreign key to the user who placed the order.
    *   `status`: Current state of the order (e.g., pending, shipped).
    *   `shipping_address`: Delivery location.
    *   `is_paid`: Boolean flag for payment status.
*   **Relationships:**
    *   `user()`: Belongs to the user who placed the order (`BelongsTo`).
    *   `products()`: Retrieves all products in the order via `order_items` pivot table (`BelongsToMany`). Accesses pivot fields `quantity` and `unit_price`.
*   **Special Features:**
    *   **Soft Deletes:** Orders can be soft deleted.

### 1.8 OrderItem
Represents a specific line item within an order.

*   **Table:** `order_items`
*   **Purpose:** Links a product to an order, preserving the price and quantity at the time of purchase.
*   **Key Attributes:**
    *   `order_id`: Foreign key to `orders`.
    *   `product_id`: Foreign key to `products`.
    *   `quantity`: Number of units purchased.
    *   `unit_price`: Price per unit at the time of order.
*   **Relationships:**
    *   `order()`: Belongs to an order (`BelongsTo`).
    *   `product()`: Belongs to a product (`BelongsTo`).
*   **Special Features:**
    *   Extends `Pivot` class, indicating it's explicitly modeled as a pivot model for the Many-to-Many relationship between Order and Product.

---

## 2. Entity Relationship Diagram (ERD) Summary

*   **User** (1) ---- (1) **Cart**
*   **User** (1) ---- (M) **Order**
*   **Cart** (1) ---- (M) **CartItem**
*   **Order** (1) ---- (M) **OrderItem**
*   **Category** (1) ---- (M) **Product**
*   **Supplier** (1) ---- (M) **Product**
*   **Product** (1) ---- (M) **CartItem**
*   **Product** (1) ---- (M) **OrderItem**

This documentation will be updated as we explore more modules of the project (Controllers, Routes, Views, etc.).
