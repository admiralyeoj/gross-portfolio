# Introduction

While [bedrock/trellis/sage](https://roots.io) is a very well thought project, and makes the complete development lifecycle i.e. `design -> code -> release -> deploy` a breeze, the trellis dependency on vagrant makes it slow to develop. This is my attempt to create a boiler plate.

## Project Structure

<details>
 <summary>Bedrock</summary>

  [bedrock](https://roots.io/bedrock) is present at `site` folder
</details>

<details>
 <summary>Sage</summary>

  [sage](https://roots.io/sage) is present at `/site/web/app/themes/portfolio`. To rename, you can do the following, but you should really follow getting started.

  ```bash
  unlink theme
  cd /site/web/app/themes
  rm -rf humans
  composer create-project roots/sage <theme-name>
  cd ../../../
  ln -s /site/web/app/themes/<theme-name>
  ```

  forget about yarn for now.
</details>

<details>
 <summary>Trellis</summary>

  [Trellis](https://roots.io/trellis) is at `/trellis`.
</details>

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

  First clone the project.

  ```bash
  git clone --depth=1 git@github.com:admiralyeoj/gross-portfolio.git $PROJECT_NAME && rm -rf $PROJECT_NAME/.git
  ```

  where `$PROJECT_NAME` is your project name e.g. `www.example.com` or `blog.your-name.com` or whatever.

  ### Trellis/Sage: The latest and greatest

  To upgrade to latest trellis

  ```bash
  cd $PROJECT_NAME && rm -rf trellis && git clone --depth=1 git@github.com:roots/trellis.git && rm -rf trellis/.git
  ```

  This will remove this trellis and download the latest release.

  If you look at the folder structure, you will see a _soft link_ by the name `theme -> site/web/app/themes/humans`. _humans_ is basically [sage](https://roots.io/sage). You would want the latest and greatest here too? right? No Problem. Follow the steps. This assumes that you are in your `$PROJECT_NAME` folder.

  ```bash
  unlink theme
  rm -rf humans
  composer create-project roots/sage $THEME_NAME
  ```

  When composer is creating a new project for you, On the prompt, devUrl, point it to `http://wp:8080`. This is important, if you don't want to mess with `docker-compose.yml` file. Also, don't do `yarn install` or `yarn build`. Leave that. **Docker** will take care of that.

  ```bash
  cd ../../../
  ln -s /site/web/app/themes/$THEME_NAME theme
  ```

  you can take a look at `docker-compose.yml`. All the docker related files are at `/docker` folder. This is a minamal setup, to get you quickly started wtih docker, bedrock, trellis and sage without loosing any of the benefits of either of these. Follow the instructions on each of the package documentation to get started on all them. Now for the fireworks ...

  ```bash
  docker-compose up --build --force-recreate -d
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