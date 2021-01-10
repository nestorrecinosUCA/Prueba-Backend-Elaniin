# Api Documentation

This api allows you to ask for information about users and products that have been stored in a database.
You can create, update, delete or read information from users, you can also read, create, update and delete information about products.

**Install the project**

First, you have to select the folder in which you will install the project.
Once you have selected the folder, run the following comand:

    git clone https://github.com/nestorrecinosUCA/Prueba-Backend-Elaniin.git

**Install dependences**

Now that you have already installed the project, you need to install the necessary dependences that were used tu develop this project, so you can use all te functions in the best way, so, for installing the dependences, you need to change to the directory in which you save the project, and run the following comand:

    composer install

**Configurate the .env file**

There is a file called .env.example which have some configurations, but it is not the one that you will use for running the project, so, you can copy that file manually and change the name to .env or you can run the following comand:

    copy .env.example .env

Now that the .env file is copied, we need to configurate it, so, you will add the name of the database that you will use in the DB_DATABASE= field, and the information of authentication (if you have a password in your database) in the DB_USERNAME= and DB_PASSWORD= fields, you also have to specify the type of database that you wil use in the DB_CONNECTION= 

After that, you need make the encryption key for your project, so you have to run the following comand:

    php artisan key:generate

And for finishing this part, you need to create the secret key for JWT Authentication, so you have to run the following command:

    php artisan jwt:secret

**Migrate and seed the database**

Now that you have completed the configuration in the .env file, you need to migrate the database and its seeders for you to start using the project and for that, you have to run the following command

    php artisan migrate --seed