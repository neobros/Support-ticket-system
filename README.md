# Support Ticket System

A Laravel-based support ticket system that allows customers to submit issues and support agents to manage and respond to them. Designed for small to medium-sized teams needing a simple, email-enabled ticketing platform.

## 🛠 Technologies Used

- **Laravel 12** – PHP web framework  
- **Laravel Breeze** – Lightweight starter kit for authentication  
- **Blade** – Templating engine  
- **Bootstrap 5** – UI framework (manually integrated via CDN)  
- **Mailtrap** – Email testing environment  

## ✨ Features

- Guests can submit support tickets with full details  
- Customers receive a reference number to check ticket status  
- Email notifications on ticket creation and replies  
- Laravel Breeze login system for support agents  
- Admin dashboard to view, filter, and respond to tickets  
- Responsive UI with Bootstrap 5  
- Pagination and clean table layout for ticket management  

## 📦 Setup Instructions

1. Clone the repository  
2. Run `composer install`  
3. Run `npm install && npm run dev`  
4. Configure your `.env` file with database and Mailtrap credentials  
5. Run `php artisan migrate`  
6. Seed the database with `php artisan db:seed`  
7. Start development server: `php artisan serve`

## 🔐 Test Credentials

- Email: `test@example.com`  
- Password: `12345678`

## 📝 Credits & References

This project was built with custom-written code and referenced official documentation from Laravel and Bootstrap. No external commercial codebases were used directly. Any reused snippets have been adapted and clearly integrated.