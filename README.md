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
<summary>Using Docker Compose</summary>

### Example `docker-compose.yml`

```yaml
version: '3.9'
services:
  web:
    image: wordpress:php7.4-fpm
    ports:
      - "8080:80"
    volumes:
      - ./web:/var/www/html
    depends_on:
      - db

  db:
    image: mariadb:10.5
    environment:
      MYSQL_ROOT_PASSWORD: root_password
      MYSQL_DATABASE: portfolio
      MYSQL_USER: user
      MYSQL_PASSWORD: password
    ports:
      - "3306:3306"

  phpmyadmin:
    image: phpmyadmin
    ports:
      - "8081:80"
    environment:
      PMA_HOST: db
```

### Example `.env` File

Create a `.env` file in the root directory with the following configuration:

```env
DB_NAME=portfolio
DB_USER=user
DB_PASSWORD=password
DB_HOST=db:3306
WP_ENV=development
WP_HOME=http://localhost:8080
WP_SITEURL=http://localhost:8080/wp
```

</details>

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

