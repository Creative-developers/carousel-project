<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



## About Project
This Project has been developed using Laravel 11 and tailwind CSS And Vue3 for the frontend.

## Installation & Setup
Follow these steps to set up the project on your local machine.

1) Install Dependencies
- composer install
- npm install

2) Run Project
- cp .env.example .env
- php artisan key:generate
- npm run dev ( for compiling assets)
- php artisan serve

## CLI CMD for Conerting CSV TO (JSON/XML)
- Run php artisan serve convert-csv:convert {file}  (file contains the path)
for eg php artisan serve convert-csv:convert ./slideshow.csv



## Future Improvements
1) Lazy Loading: Implement Lazy loading for images to improve load times.
2) Image Optimization: We can use some image optimization techniques to improve the faster loading of imags for slow network.
3) Adding API Security to not allow 3-Part users.