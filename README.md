
# Docker Compose and Bedrock

Use WordPress locally with Docker using [Docker compose](https://docs.docker.com/compose/) and deploy to [Heroku](https://www.heroku.com/)

## Supported technologies
- Apache 
- PHP 8.1.5
- MySQL 8
- PhpMyAdmin
- Composer
- [Bedrock](https://roots.io/bedrock/) - modern development tools, easier configuration, and an improved secured folder structure for WordPress
- [WP-CLI](https://wp-cli.org/) - WP-CLI is the command-line interface for WordPress.
- [PhpMyAdmin](https://www.phpmyadmin.net/) - free and open source administration tool for MySQL and MariaDB
- CLI script to create a SSL certificate

## Instructions

<details>
 <summary>Requirements</summary>

+ [Docker](https://www.docker.com/get-started)
+ PHP 7.4 >=
  - [Mac](https://www.php.net/manual/en/install.macosx.php)
  - [Windows](https://www.php.net/manual/en/install.windows.php)
+ [Composer](https://getcomposer.org/download/)
+ [Yarn](https://classic.yarnpkg.com/lang/en/docs/install/)
+ [ACF Pro](https://www.advancedcustomfields.com/)

</details>

<details>
 <summary>Setup</summary>

 ### Setup Environment variables


#### 1. Setting Up Dependencies (Required step)

Copy `.env.example` in the project root to `.env` and edit to your preferences.<br />
Note: Change `APP_NAME` to the desired name for the project.

Example:

```dotenv
APP_NAME=project-name

DB_NAME=wordpress
DB_USER=admin
DB_PASSWORD=admin
DB_ROOT_PASSWORD=root

# Optionally, you can use a data source name (DSN)
# When using a DSN, you can remove the DB_NAME, DB_USER, DB_PASSWORD, and DB_HOST variables
# DATABASE_URL='mysql://database_user:database_password@database_host:database_port/database_name'

# Optional variables
DB_HOST='db:3306'
# DB_PREFIX='wp_'

WP_ENV='development'
WP_HOME='http://localhost'
WP_SITEURL="${WP_HOME}/wp"

#S3 Bucket URL Example: AWS_S3_URL=s3://ACCESS_ID:ACCESS_SECRET@s3-REGION.amazonaws.com/bucketName

# Generate your keys here: https://roots.io/salts.html
AUTH_KEY='generateme'
SECURE_AUTH_KEY='generateme'
LOGGED_IN_KEY='generateme'
NONCE_KEY='generateme'
AUTH_SALT='generateme'
SECURE_AUTH_SALT='generateme'
LOGGED_IN_SALT='generateme'
NONCE_SALT='generateme'
```

Run the following command to install composer and all dependencies
```
composer install
```

#### 2. Setting Up Local Enviorment (Required step)

To create the images and containers needed, run the following command

```
docker-compose up -d
```

</details>

<details>
 <summary>Install</summary>

```shell
docker-compose run composer create-project
```

</details>



<details>
 <summary>Tools</summary>

### Update WordPress Core and Composer packages (plugins/themes)

```shell
docker-compose run composer update
```

#### Use WP-CLI

```shell
docker exec -it myapp-wordpress bash
```

Login to the container

```shell
wp search-replace https://olddomain.com https://newdomain.com --allow-root
```

Run a wp-cli command

> You can use this command first after you've installed WordPress using Composer as the example above.

### Useful Docker Commands

When making changes to the Dockerfile, use:

```bash
docker-compose up -d --force-recreate --build
```

Login to the docker container

```shell
docker exec -it myapp-wordpress bash
```

Stop

```shell
docker-compose stop
```

Down (stop and remove)

```shell
docker-compose down
```

Cleanup

```shell
docker-compose rm -v
```

Recreate

```shell
docker-compose up -d --force-recreate
```

Rebuild docker container when Dockerfile has changed

```shell
docker-compose up -d --force-recreate --build
```
</details>

<details>
 <summary>Run</summary>

```shell
docker-compose up -d
```

Docker Compose will now start all the services for you:

```shell
Starting gross-portfolio-phpmyadmin    ... Started
Starting myapp-composer ... Started
Starting myapp-nodejs ... Started
Starting myapp-wpcli-1  ... Started
Starting myapp-php81      ... Started
Starting myapp-mysql8    ... Started
```

🚀 Open [http://localhost](http://localhost) in your browser

if you recieve the following error message, this means an app is already running on localhost
```
Bind for 0.0.0.0:3306 failed: port is already allocated
```

## PhpMyAdmin

PhpMyAdmin comes installed as a service in docker-compose.

🚀 Open [http://localhost:8080/](http://localhost:8080/) in your browser

## MailHog (will be in future setup)

MailHog comes installed as a service in docker-compose.

🚀 Open [http://0.0.0.0:8025/](http://0.0.0.0:8025/) in your browser

</details>

<details>
 <summary>ToDo</summary>

- Add instructions to add ACF Pro and set ACF to Default
- Add MailHog Container

</details>