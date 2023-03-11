# user_management

For running this project in your machine

*clone this url repo using the "git clone https://github.com/josedianicious/user_management"

*create a database 

*open your temrinal and run "composer update" command

*copying the .env.example file and rename it to .env file

*enter the database details in .env file 

*in terminal run the command "php artisan migrate --seed" for creating the tables for your project

*run the command "php artisan key:generate" 

*run the command "php artisan serve" and use the generated link(like Development Server (http://127.0.0.1:8000) started) to run the program 

*API List
*get menu
http://127.0.0.1:8000/api/get-menu

method : get

*user create

http://127.0.0.1:8000/api/user/register

method : post

params :
name
email
sex
profile_image

*user login

http://127.0.0.1:8000/api/user/login

method : post

params : 
user_name
password

*Note: consider the user name as email you have entered and password as 123456

