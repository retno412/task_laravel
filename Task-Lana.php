<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muhammad Isfa'Lana Task</title>
</head>
<body>
    <!-- Migration -->
    <h1>How to Create Migration</h1>
    <p>
        Open your code editor and open in laravel application folder. Go to the .env section to see all the existing settings,
        then look for "DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME and DB_PASSWORD" which are usually located on lines 11-16 then match them with your port in the phpMySql and apache port section,
        if you use The "XAMPP" application is usually located right next to the start button and right next to the action's section.
        If so, you can equate the "DB_DATABASE" section with the name of the Laravel application folder that you have installed.
        For example, I have a folder called "laravel-app" then DB_DATABASE= laravel-app, if you have changed it,
        leave the password and username as they were before so that no errors occur during migration,
        after that you save the folder or you can use "ctrl+s".
    </p>
    <p>
        After you are finished with the .env section you can open your terminal, if you use vs code you can do this by clicking "ctrl+~",
        if you have opened your terminal enter the command line "php artisan make:migration create_example_table".
        For example, if I want to create a student table, the command line I use is "php artisan make:migration create_student_table" then click enter.
        If you have successfully entered the database/migrations/"name of the file you have created" section, if you have, you can edit it in the schema section according to your needs, if you have, you can save it.
    </p>
    <p>
        After you are finished with the migrations section, you can go to the terminal and type "php artisan migrate" to make a migration in the database. If it is done, check in your respective database section.
    </p>
    <!-- Seeder -->
    <h1>How to create Seeder</h1>
    <p>
        if you have migrated
        You can create a seeder by typing this command line in your terminal "php artisan make:sedeer the_seeder_name_you_want" for example: I want to create a seeder for students so the command line I will use is "php artisan make:seeder StudentSeeder".
    </p>
    <p>
        If it has been created, you can look for the folder in the database/seeders section. If so, you can edit "function run" according to your needs and don't forget to add "use Illuminate\Support\Facades\DB;"
        at the top so that your function can be sent to the database, you can enter "DB::table('example')->insert($data);"
    </p>
    <p>
        If so, don't forget to save, then you can go to your terminal to run this function. You can type this command line "php artisan db:seed --class=yourseederfilename",
        for example the seeder file that I created earlier is called StudentSedeer then the command line it is "php artisan db:seed --class=StudentSeeder"
    </p>

    <!-- MVC laravel FrameWork -->
    <h1>How to Create</h1>
    <p>
        The first step you have to do is create a model first with the command line "php artisan make:model example" or in the case I use, namely "php artisan make:model Student".
        When finished, you can go into the models folder located in /app/Models/. If so, you can modify the contents according to your needs.
    </p>
    <p>
        If so, you can create the routing first by clicking on the routes folder and creating (name).php.
        If so, you can modify the routing, for example: 
        "Route::get('/greeting', function () {
            return('Hello World');"
    </p>
    <p>
        Continue to the views section, you can create the file manually in the /resources/views/ section, then click on the folder then you create a file in it using "blade"
        for example: "example.blade.php" and you can also fill in the file inside with html tags
    </p>
    <p>
        To run the view program you can type a function in the routers section, 
        for example: 
            "Route::get("/greeting", function () {
                return view("example");" 
        then you can add /greeting to your search address.
    </p>
    <p>
        To run the view program you can type a function in the routers section, 
        for example: 
            "Route::get("/greeting", function () {
            return view("example");"
        then you can add /greeting to your search address.
    </p>
    <p>
        After all that has been done, don't forget to save and you can check whether it is connected or not
        by typing "php artisan serve" then click serve with ctrl+click to enter the server provided by Laravel.
    </p>
    <p>
        After that you can see the program code that you have entered.
        Thank you for reading my little tutorial
    </p>
</body>
</html>