# Dasalomao Hammond Assessment - (Laravel Back End API)

<!-- PROJECT -->
<br />
<p align="center">

  <img src="https://avatars.githubusercontent.com/u/96804932?s=200&v=4" alt="Logo" width="80" height="80">

  <h3 align="center">Dasalomao Hammond Assessment - (Laravel Back End API)</h3>
<br\>
<br\>
<br\>
  <p>
     This application is an API with two CRUD structures beeing:
    <br />
    <br />
  </p>
    <ul>
        <li>Store</li>
        <li>Book</li>
    </ul>
</p>

### Installation

1.  Clone the repo
    ```sh
    git clone https://github.com/dsalomao/hammond-assessment.git
    ```
2.  Install the packages

    ```sh
    composer install
    ```

3.  Build Docker Containers

    ```sh
    sail up --build
    ```

    or

    ```sh
    ./vendor/bin/sail up --build
    ```

4.  generate .env

    ```sh
    create a new .env file based in .env.example
    run php artisan key:generate
    ```

5.  config env variables

    ```sh
    The application uses some environment variables to work properly
    that can be edited for your dev environment:
    ```

    ```
    - Laravel Sanctum :
        (these variables coordinate the cors services to allow or deny access to the application)
        (they should reflect your front end and back end domains and ports)

        - APP_URL=http://localhost:80
        - FRONTEND_URL=http://localhost:8888
        - SANCTUM_STATEFUL_DOMAINS=localhost:8888
        - SESSION_DOMAIN=localhost
    ```

    ```sh
    - DB connection:
        The default we use here is for the sail docker container

        - DB_CONNECTION=mysql
        - DB_HOST=mysql
        - DB_PORT=3306
        - DB_DATABASE=hammond-assessment
        - DB_USERNAME=root
        - DB_PASSWORD=password
    ```

6.  Migrate Database

    ```sh
    Migrate the database inside sail container
    ```

    ```sh
    sail artisan migrate:fresh --seed
    This will generate the DB and seed it with a couple of stores and books
    ```

    or

    ```sh
    ./vendor/bin/sail artisan migrate:fresh --seed
    ```

7.  Testing

    ```sh
    I inserted inside the project a file called 'hammond-assessment.postman_collection.json'
    This file is the export file of a postman collection for this project, it contains all the requests and example data to test the api
    ```
