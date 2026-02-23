<p align="center">
    <div style="width: 100px; height: 100px; background: linear-gradient(135deg, #f6aa1c 0%, #bc3908 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 32px; color: #220901;">
        TS
    </div>
</p>

<h1 align="center">TifawinSouk</h1>
<p align="center">
    <strong>Authentic Moroccan E-Commerce Platform</strong>
</p>

<p align="center">
    <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=flat-square&logo=laravel" alt="Laravel">
    <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php" alt="PHP">
    <img src="https://img.shields.io/badge/Tailwind-3.x-38B2AC?style=flat-square&logo=tailwind-css" alt="Tailwind CSS">
    <img src="https://img.shields.io/badge/Database-SQLite-003B57?style=flat-square&logo=sqlite" alt="SQLite">
</p>

---

## 📋 About TifawinSouk

TifawinSouk is a modern e-commerce platform dedicated to showcasing and selling authentic Moroccan products and handcrafted items. The platform provides a seamless shopping experience for customers while offering comprehensive management tools for administrators.

### ✨ Key Features

- **Product Management**: Add, edit, and manage products with categories and suppliers
- **Category Organization**: Organize products into logical categories
- **Inventory Tracking**: Real-time stock management
- **Order Management**: Complete order tracking and status updates
- **User Authentication**: Secure login and registration system
- **Shopping Cart**: Easy-to-use shopping cart functionality
- **Admin Dashboard**: Comprehensive analytics and quick access controls
- **Responsive Design**: Mobile-friendly interface with modern UI
- **Activity Tracking**: Monitor recent products, orders, and customers

---

## 🚀 Getting Started

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & npm
- SQLite or MySQL

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/Kadiri-Mohamed/TifawinSouk.git
   cd TifawinSouk
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**
   ```bash
   npm install
   ```

4. **Setup environment file**
   ```bash
   cp .env.example .env
   ```

5. **Generate application key**
   ```bash
   php artisan key:generate
   ```

6. **Run database migrations**
   ```bash
   php artisan migrate
   ```

7. **Seed the database** (optional - adds sample data)
   ```bash
   php artisan db:seed
   ```

8. **Build assets**
   ```bash
   npm run build
   ```

9. **Start the development server**
   ```bash
   php artisan serve
   ```

The application will be accessible at `http://127.0.0.1:8000`

---

## 📁 Project Structure

```
TifawinSouk/
├── app/
│   ├── Http/
│   │   └── Controllers/        # Application controllers
│   │       ├── Admin/          # Admin panel controllers
│   │       └── Client/         # Client side controllers
│   ├── Models/                 # Eloquent models
│   └── Providers/              # Service providers
├── database/
│   ├── migrations/             # Database migrations
│   ├── factories/              # Model factories
│   └── seeders/                # Database seeders
├── resources/
│   ├── views/                  # Blade templates
│   │   ├── admin/              # Admin panel views
│   │   ├── client/             # Client side views
│   │   └── layouts/            # Layout components
│   ├── css/                    # CSS stylesheets
│   └── js/                     # JavaScript files
├── routes/
│   ├── web.php                 # Web routes
│   └── auth.php                # Authentication routes
├── config/                     # Configuration files
└── public/                     # Public assets
```

---

## 🗄️ Database Schema

### Key Tables

- **users**: User accounts and authentication
- **categories**: Product categories
- **products**: Product inventory
- **suppliers**: Supplier information
- **carts**: Shopping cart items
- **orders**: Customer orders
- **order_items**: Items within orders

---

## 🎯 Main Features

### For Customers
- Browse and search products
- Filter by category
- View product details
- Add items to shopping cart
- Manage user profile
- View order history

### For Administrators
- **Dashboard**: Overview of key metrics
- **Product Management**: CRUD operations for products
- **Category Management**: Organize product categories
- **Order Management**: Track and update orders
- **Supplier Management**: Manage supplier information
- **Analytics**: View recent activity and statistics

---

## 🛠️ Technology Stack

- **Backend**: Laravel 11.x
- **Frontend**: Blade Templates, Tailwind CSS
- **Database**: SQLite (development)
- **Build Tool**: Vite
- **Package Manager**: Composer, npm
- **Authentication**: Laravel built-in authentication

---

## 📦 Dependencies

Key packages used in this project:

- `laravel/framework`: Core framework
- `tailwindcss`: Utility-first CSS framework
- `@tailwindcss/forms`: Form styling
- `alpinejs`: Lightweight JavaScript framework

---

## 🔐 Roles & Permissions

The application supports different user roles:

- **Admin**: Full access to dashboard and management features
- **User/Customer**: Access to shopping and profile features

---

## 📝 Available Scripts

```bash
# Development
npm run dev          # Watch for changes
npm run build        # Build for production

# Artisan commands
php artisan migrate              # Run migrations
php artisan db:seed              # Seed database
php artisan tinker               # Interactive shell
php artisan serve                # Start dev server
```

---

## 🧪 Testing

```bash
# Run tests
php artisan test

# Run specific test file
php artisan test tests/Feature/RegisterTest.php
```

---

## 📄 Configuration

Key configuration files:

- `.env` - Environment variables
- `config/app.php` - Application settings
- `config/database.php` - Database configuration
- `config/auth.php` - Authentication settings
- `config/filesystems.php` - File storage configuration

---

## 🐛 Troubleshooting

### Database Issues
```bash
# Reset database
php artisan migrate:fresh --seed
```

### Cache Issues
```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Asset Issues
```bash
# Rebuild assets
npm run build
```

---

## 🤝 Contributing

-- Ali kara

-- Hajar Elmouhili

---

## 📄 License

This project is open-source software licensed under the [MIT license](LICENSE).


---

## 📞 Support

For support, please create an issue in the repository or contact the development team.

---

<p align="center">
    Made with ❤️ for Moroccan merchants and artisans
</p>