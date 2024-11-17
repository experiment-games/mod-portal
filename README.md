# Experiment Web Portal

This web portal allows users to publish their Source Engine Mods based on the [Experiment Source](https://github.com/experiment-games/experiment-source) project.

<div align="middle">

![Experiment Redux logo](./logo.png)

</div>

> [!WARNING]
> This project is still in early development and is **not yet ready for use**.
> Additionally it is currently being worked on on-and-off, by a single developer.
>
> Check out the [main repository (`experiment-source`)](https://github.com/experiment-games/experiment-source) for more information.

## Features

- **User Authentication**: Users can sign up and log in to the portal.
- **Mod Publishing**: Users can publish their mods to the portal.
- **Mod Management**: Users can manage their mods.
- **Mod Download**: Users can download mods from the portal.
- **Mod Rating**: Users can rate mods.

## Requirements

- PHP 8.1 or higher
- [Composer](https://getcomposer.org)
- [Node.js and NPM](https://nodejs.org)
- [MySQL](https://www.mysql.com)

## Installation

1. Clone the repository.

    ```bash
    git clone https://github.com/luttje/experiment-source-web
    ```

2. Install the dependencies.

    ```bash
    composer install
    ```

    And

    ```bash
    npm install
    ```

3. Create a `.env` file.

    ```bash
    cp .env.example .env
    ```

4. Fill in the database credentials in the `.env` file.

5. Generate an application key.

    ```bash
    php artisan key:generate
    ```

6. Migrate the database and seed it.

    ```bash
    php artisan migrate:fresh --seed
    ```

7. Serve the application.

    ```bash
    php artisan serve
    ```

8. Speed up development by caching the blade icons.

    ```bash
    php artisan icons:cache
    ```

9. Visit the application in your browser.

    *Typically, the application will be available at [`http://127.0.0.1:8000`](http://127.0.0.1:8000).*
