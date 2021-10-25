<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About laravel News App
Installation Steps:-

- Get Clone From https://github.com/malaymehta/laravel-nick-test Repository.
- Go to Project Root Directory then run command <code>composer install</code>.
- If Previous Command Throws error then run <code>composer install --ignore-platform-reqs</code>.
- Create .env File by following commands:-
  - <code>cp .env.example .env</code>. 
  - <code>php artisan key:generate</code>
  - Create Mysql Database and give privileges to app by editing .env file.
  - Add Application Email Related Configurations.
  
- To Create Fresh Database Tables Run Command <code>php artisan migrate</code>.
- Add Test Data by running this following command.
  - Go To following file:- <code>[Database\Seeders\DatabaseSeeder.php](Database\Seeders\DatabaseSeeder.php)</code> And Replace Email Address by actual email address.
  - Run Command <code>php artisan db:seed</code>.

**  **
## RESTful API Configuration

- To Create New Post import POSTMAN REST Api Collection that Provided in root directory of this project with file name [postman_collection.json](postman_collection.json).
- Go to Collection Variables and add secretKey that you recently added on [`.env`](.env) file with name of "API_HEADER_SECRET_KEY" of this project.
- Update Base Url Variable by your Application Domain.
- In Postman Client After Import Collection Got to `{{baseUrl}}post/create` Request and add form data. and click on submit button to test api.
  - On API Response Status 200, System will send email to all subscribed users for related website along with provided title and content.
  
    - Now You are All set! Thanks to Invest your valuable time.
