**Gym Management System**
    This is a Laravel-based Gym Management System that provides APIs for user authentication, role management, trainers, classes, and bookings. The system includes functionalities for both web and API routes, with role-based access control (admin, trainer, trainee).

**Prerequisites**
    PHP 8.x or higher
    Composer (Dependency Manager for PHP)
    MySQL/MariaDB or any other supported database
    Node.js (if you're using Vue.js or require front-end dependencies)
    Laravel 9.x or higher
    Laravel Sanctum (for API authentication)

**Installation**
**Clone the Repository:**
    git clone https://github.com/your-repo/gym-management-system.git
    cd gym-management-system

**Install Composer Dependencies:**
    composer install

**Copy .env.example to .env:**
    cp .env.example .env

**Generate Application Key:**
    php artisan key:generate

**Set Up Database:**
    Update your .env file with your database credentials:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password


**Run Migrations:**
    php artisan migrate

**Run Seeders (Optional): This project includes a seeder for roles and permissions.**
    php artisan db:seed

**Install NPM Dependencies (if applicable):**
    npm install
    npm run dev

**Laravel Sanctum Authentication**
    This project uses Laravel Sanctum for API authentication. Sanctum provides a lightweight authentication system for SPAs (Single Page Applications), mobile applications, and simple API token-based authentication.

**Setup**
**Install Laravel Sanctum: Laravel Sanctum should already be installed. You can verify it by checking the dependencies in your composer.json file:**
    composer require laravel/sanctum

**Publish Sanctum Configuration:**
    php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

**Run Sanctum Migrations:**
    php artisan migrate

**Add Sanctum Middleware: In app/Http/Kernel.php, ensure that Sanctum middleware is applied in the API middleware group:
**
    'api' => [
        \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        'throttle:api',
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],

**Token Usage:**
API routes are protected by auth:sanctum. Users must be authenticated using Sanctum tokens.
Upon successful login, a token is generated which can be used to authenticate subsequent requests.
Login Example: After logging in via /api/login, a Sanctum token will be returned:
    {
        "token": "1|ZbVFZK7Hkr9eIXoX85QAVPlyHZzC2reCmIgHdC0I"
    }

**The token can then be used in the Authorization header for authenticated requests:**
    Authorization: Bearer {token}

**Usage
Running the Project Locally
Start the Local Development Server:**
    php artisan serve

**Open your browser and navigate to:**
    http://localhost:8000

**API Documentation
Authentication
Register:**
    POST /api/register
    Register a new user.

**Login:**
    POST /api/login
    Authenticate a user and generate a Sanctum token.

**Get Authenticated User:**
    GET /api/user
    Returns the authenticated user's information (requires Sanctum token in the Authorization header).

**User & Role Management
User:**
Role-based actions to create, read, update, and delete users.

**Example:**
Route::controller(UserController::class)->prefix('users')->group(function () {
    Route::get('/', 'index')->name('users.index');
    Route::get('/create', 'create')->name('users.create');
    Route::post('/store', 'store')->name('users.store');
    Route::get('/edit/{id}', 'edit')->name('users.edit');
    Route::put('/update/{id}', 'update')->name('users.update');
    Route::delete('/delete/{id}', 'delete')->name('users.delete');
});

**Roles:**
Similar route structure for role management.

**Trainers
Trainers:**
CRUD functionality for managing trainers.

**Example:**
Route::controller(TrainerController::class)->prefix('trainers')->group(function () {
    Route::get('/', 'index')->name('trainers.index');
    Route::get('/create', 'create')->name('trainers.create');
    Route::post('/store', 'store')->name('trainers.store');
    Route::get('/edit/{id}', 'edit')->name('trainers.edit');
    Route::put('/update/{id}', 'update')->name('trainers.update');
    Route::delete('/delete/{id}', 'delete')->name('trainers.delete');
});

**Classes
Classes:**
CRUD functionality for managing gym classes.

**Example:**
Route::controller(ClassController::class)->prefix('classes')->group(function () {
    Route::get('/', 'index')->name('classes.index');
    Route::get('/create', 'create')->name('classes.create');
    Route::post('/store', 'store')->name('classes.store');
    Route::get('/edit/{id}', 'edit')->name('classes.edit');
    Route::put('/update/{id}', 'update')->name('classes.update');
    Route::delete('/delete/{id}', 'delete')->name('classes.delete');
});

**Bookings
Bookings:**
CRUD functionality for managing bookings.

**Example:**
Route::controller(BookingController::class)->prefix('bookings')->group(function () {
    Route::get('/', 'index')->name('bookings.index');
    Route::get('/create', 'create')->name('bookings.create');
    Route::post('/store', 'store')->name('bookings.store');
    Route::get('/edit/{id}', 'edit')->name('bookings.edit');
    Route::put('/update/{id}', 'update')->name('bookings.update');
    Route::delete('/delete/{id}', 'delete')->name('bookings.delete');
});

**Role-Based Access Control**
Admins have full access to create, update, and delete users, roles, trainers, classes, and bookings.
Trainers can view and manage their own classes and bookings.
Trainees can view available classes and make bookings.
**Permissions
A seeder is included to manage roles and permissions:**

**PermissionSeeder:** Seeds permissions for users, roles, trainers, classes, and bookings.
Error Handling
All API requests return appropriate status codes (200, 403, 404, etc.) and messages for better API management.
License
This project is open-source under the MIT License.
