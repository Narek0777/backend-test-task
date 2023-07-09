To Initialize Project on your side please do the following: 


Clone The App <br>
Run Composer install <br>
Create your .env and modify database credentials to match yours <br>
do same for .env.testing also and phpunit.xml <br>
Run php artisan generate:key <br>
Then to I have made 'User' as 'Organization' So you need to login to have access to events routes <br>
So Run php artisan migrate:fresh --seed , then you'll have user : {
"email":"test@example.com",
"password":"password"
} in your database <br>

To test the endpoints you can run php artisan test <br>
Also All mentioned endpoints in task are there. <br>
Important Note : you need to call /api/login take token then call all endpoints 
