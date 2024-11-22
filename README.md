<h1> HELLO THIS IS SEMESTRAL PROJECT FROM MY VAII</h1>

it's laravel project, sorry if i wasn't supposed to force git push
<h2>HOW TO RUN ON LINUX OR WSL:</h2>

* download and install php, composer and laravel by running: `/bin/bash -c "$(curl -fsSL https://php.new/install/linux)"` [add php to PATH](https://unix.stackexchange.com/questions/3809/how-can-i-make-a-program-executable-from-everywhere)
* download the project by running `git clone https://github.com/Yourzo/semestralProjectVAII`
* go to project folder
* create copy of .env.example called .env by running `cp .env.example .env`
* install all npm dependencies with `npm install`
* install all dependencies by running `composer install`
* build docker-compose and all needed with: `php artisan sail:install` (choose mysql)
* start docker
* (if on wsl ubuntu take these [steps](https://learn.microsoft.com/en-us/windows/wsl/tutorials/wsl-containers) and restart the wsl)
* to run it on docker: `./vendor/bin/sail up` you can add `-d` like with normal docker (first time run will take few minutes)
* migrate by running: `./vendor/bin/sail artisan migrate`
* project should be running on `localhost`
