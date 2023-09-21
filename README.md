Project Description:
Design your own database and RESTful API in Laravel, which provides a movie database and allows for movie management.

Levels of Implementation:

Level I:
CRUD operations for movies
Ability to upload a file as a cover image for a selected movie
Level II:
A movie can have multiple genres
Ability to search for a movie by title
Level III:
Movie rating system by users
Uploaded files (covers) are automatically resized to fixed dimensions
This project involves creating a database schema and developing a RESTful API in Laravel for managing movies. It includes features such as basic CRUD operations, file uploads for movie covers, multiple genres per movie, movie search by title, and user ratings for movies. Additionally, uploaded cover images are automatically resized to specific dimensions.
Setting up Laravel with Image Processing (Intervention Image)
This repository contains a Laravel project that incorporates the Intervention Image library for image processing. Follow the steps below to set up the project and configure the library.

Prerequisites
PHP and Composer installed on your system.
Postman was installed for testing.

Getting Started

1. Clone this repository to your local machine.

2. Install Laravel globally if you haven't already

3. Install Laravel project dependencies:

4. Create a .env file by duplicating the .env.example file and configure your database connection settings.

5. Run Laravel migrations to create the necessary database tables:

Installing and Configuring the Intervention Image Library

1. Install the Intervention Image library by running the following command in your Laravel project directory: composer require intervention/image

2. After the installation is complete, you need to publish the configuration file for the Intervention Image library: php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravel5"

3. Now, configure the Intervention Image library by editing the generated config/image.php file. Ensure that your configuration includes the following lines:
   'driver' => 'gd', // Use the GD driver for image processing (you can change this if needed).
   'cache' => [
    'driver' => 'file',
    'path' => storage_path('app/public'),
],                                            

Testing the Laravel Project

1. Start your Laravel application:
   php artisan serve

2. Import the provided Postman collection to test the API endpoints.

3. Use Postman to send requests to the API, such as creating, reading, updating, and deleting film records, as well as uploading cover images.

 Additional Notes

Customize the API routes, controllers, and models as per your project needs.

Intervention Image provides powerful image manipulation capabilities, so feel free to explore its features and use them in your project.

That's it! 

You've successfully set up Laravel with the Intervention Image library for image processing. 

Happy coding!











