# Laravel Project Setup

## Project Overview

This is a **Laravel Project** that provides a robust backend for managing blog data. This document will guide you on how to set up, configure, and run the Laravel project locally.

## Prerequisites

Before you proceed, make sure you have the following:

- **PHP** (version 7.4 or higher) installed.
- **Composer** (dependency manager for PHP) installed.
- **MySQL** or another supported database set up.
- A web server (e.g., Apache or Nginx).

## Installation and Setup

### Step 1: Clone the Repository

First, clone the repository from your version control system (GitHub):

# bash
git clone repository-url
#
cd project-directory

### Step 2: Install Dependencies:

# bash
composer install

### Step 3: Copy the Environment File

# bash
cp .env.example .env

### Step 4: Generate the Application Key

# bash
php artisan key:generate

### Step 5: Set Up Database Configuration

Open the .env file and configure your database settings:

DB_DATABASE=your_database_nam

### Step 6: Run Database Migrations

# bash
php artisan migrate

### Step 7: Start the Development Server

# bash
php artisan serve
