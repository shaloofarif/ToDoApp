# Laravel Todo Application

A task management application built with Laravel that helps users organize and prioritize their tasks.

## Features

- User authentication and authorization
- Create, read, update, and delete tasks
- Task prioritization (High, Medium, Low)
- Mark tasks as complete/incomplete
- Priority-based task sorting

## Prerequisites

- PHP >= 8.1
- Composer
- MySQL
- Laragon or similar local development environment

## Installation

1. Clone the repository:

git clone <repository-url>
cd todo-app


2. Install PHP dependencies:

composer install


4. Configure environment:

cp .env.example .env
php artisan key:generate

5. Update `.env` with your database credentials:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_app
DB_USERNAME=root
DB_PASSWORD=


6. Run migrations:

php artisan migrate


## Usage

1. Register a new account
2. Login to access the dashboard
3. Create new tasks with title, description, and priority
4. Manage tasks using the provided interface

## Technologies Used

- Laravel 10
- Bootstrap 5
- MySQL
- PHP 8.1
