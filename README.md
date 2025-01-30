# Portfolio Website

Welcome to my portfolio website! This repository contains the codebase for [grossportfolio.com](https://www.grossportfolio.com), showcasing my professional work, skills, and projects.

---

## Website Details

- **URL**: [https://www.grossportfolio.com](https://www.grossportfolio.com)
- **Structure**: Built using [Bedrock by Roots](https://roots.io/bedrock/)
- **Theme**: Powered by [Sage by Roots](https://roots.io/sage/)
- **Database**: MariaDB

---

## Local Development Setup

<details>
<summary>Cloning from GitHub Package</summary>

### Steps

1. Clone the repository:

   ```bash
   git clone https://github.com/admiralyeoj/portfolio-website.git
   ```

2. Navigate to the directory:

   ```bash
   cd portfolio-website
   ```

3. Install dependencies using Composer:

   ```bash
   composer install
   ```

4. Set up the `.env` file as shown above.

5. Start the local server:
   ```bash
   docker-compose up
   ```

</details>

<details>
<summary>Using Docker Compose</summary>

### Example `docker-compose.yml`

```yaml
services:
  mariadb:
    image: mariadb:latest
    container_name: mariadb
    restart: always
    environment:
      MYSQL_DATABASE: "${DB_NAME}"
      MYSQL_ROOT_PASSWORD: "${DB_ROOT_PASSWORD}"
      MYSQL_USER: "${DB_USER}"
      MYSQL_PASSWORD: "${DB_PASSWORD}"
    ports:
      - 3030:3306
    volumes:
      - data:/var/lib/mysql
  wp:
    build:
      context: .
      dockerfile: ./build/wp.dockerfile
    container_name: wp
    restart: always
    links:
      - mariadb
    depends_on:
      - mariadb
    ports:
      - 8080:8080
      - 9001:9000
    env_file: .env
    volumes:
      - ./wordpress:/var/www/html
      - ./build/nginx/nginx.conf:/etc/nginx/nginx.conf
      - ./build/nginx/sites-enabled:/etc/nginx/conf.d
      - ./build/supervisor/supervisord.conf:/etc/supervisord.conf
  phpmyadmin:
    image: lscr.io/linuxserver/phpmyadmin:latest
    container_name: phpmyadmin
    environment:
      - PUID=1000
      - PGID=1000
      - TZ=America/New_York
      - PMA_HOST=mariadb
    volumes:
      - ./phpmyadmin:/config
    ports:
      - 8181:79
    restart: unless-stopped
    links:
      - mariadb
    depends_on:
      - mariadb

volumes:
  data:
```

### Example `.env` File

Create a `.env` file in the root directory with the following configuration:

```env
APP_NAME=gross-portfolio

DB_NAME=wordpress
DB_USER=admin
DB_PASSWORD=admin
DB_ROOT_PASSWORD=root

# Optionally, you can use a data source name (DSN)
# When using a DSN, you can remove the DB_NAME, DB_USER, DB_PASSWORD, and DB_HOST variables
# DATABASE_URL='mysql://database_user:database_password@database_host:database_port/database_name'

# Optional variables
DB_HOST='mariadb:3306'
DB_PREFIX='wp_'

WP_ENV='development'
WP_HOME='http://localhost:8080'
WP_SITEURL="${WP_HOME}/wp"

WP_USER=dev
WP_USER_EMAIL=admin@example.com
WP_PASSWORD=admin

#S3 Bucket URL Example: AWS_S3_URL=s3://ACCESS_ID:ACCESS_SECRET@s3-REGION.amazonaws.com/bucketName

AWS_S3_UPLOADS_BUCKET_URL=https://cdn.example.com
AWS_S3_URL=s3://ACCESS_ID:ACCESS_SECRET@s3-REGION.amazonaws.com/bucketName

ACF_PRO_KEY=XXXXXXXXXXXXXXXXXXXXXX

#Mail Infos3://ACCESS_ID:ACCESS_SECRET@s3-REGION.amazonaws.com/bucketName
MAIL_FROM_NAME='Gross Portfolio'

NPM_CONFIG_PRODUCTION=false

# Generate your keys here: https://roots.io/salts.html
AUTH_KEY='XXXXXXXXXXXXXXXXXXXXXX'
SECURE_AUTH_KEY='XXXXXXXXXXXXXXXXXXXXXX'
LOGGED_IN_KEY='XXXXXXXXXXXXXXXXXXXXXX'
NONCE_KEY='XXXXXXXXXXXXXXXXXXXXXX'
AUTH_SALT='XXXXXXXXXXXXXXXXXXXXXX'
SECURE_AUTH_SALT='XXXXXXXXXXXXXXXXXXXXXX'
LOGGED_IN_SALT='XXXXXXXXXXXXXXXXXXXXXX'
NONCE_SALT='XXXXXXXXXXXXXXXXXXXXXX'
```

</details>
<details>
<summary>For downloading ACF Pro</summary>

### Example `auth.json`

```json
{
  "http-basic": {
    "connect.advancedcustomfields.com": {
      "username": "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
      "password": "http://www.example.com"
    }
  }
}
```

</details>

---

## Features

- Modern development workflow with Bedrock and Sage.
- Customizable and easy to maintain theme.
- Robust database management with MariaDB.

---

## Contribution

Feel free to suggest improvements, raise issues, or submit pull requests. Feedback is always welcome!

---

## License

This project is licensed under the [MIT License](LICENSE).
