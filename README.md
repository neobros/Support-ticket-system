Support Ticket System

This project is a Laravel-based support ticket system designed to allow customers to submit tickets and support agents to manage and respond to them.

Technologies Used

Laravel 12 – PHP web framework

Laravel Breeze – Lightweight authentication starter kit

Blade – Laravel's templating engine

Bootstrap 5 – UI framework for table layout and pagination (added manually)

Mailtrap – Email testing environment (for development mail delivery)

Features

Guests can submit support tickets with details

Customers receive a reference number to check ticket status

Email notifications on ticket submission and replies

Support agents login via Laravel Breeze

Agents can view, filter, and respond to tickets

Responsive UI with Bootstrap 5 integration

Pagination and table layout for ticket management


Credits & References

This project includes custom-written code and uses public Laravel & Bootstrap 5 documentation as reference. Bootstrap 5 CSS was added via CDN. No part of this codebase was directly copied from any external project or commercial source. If any reused snippets were included, they were adapted and clearly integrated.

Setup Instructions

Clone the repository

Run composer install

Run npm install && npm run dev

Set up .env with your database and Mailtrap credentials

Run php artisan migrate

php artisan db:seed

Start development server: php artisan serve



Passwords

test@example.com
12345678
