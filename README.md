### Pizza Place Backbone Application

### System Requirements:
- php: ^7.2.5
- fideloper/proxy": ^4.2
- fruitcake/laravel-cors": ^1.0
- guzzlehttp/guzzle": ^6.3
- laravel/framework": ^7.0
- laravel/tinker": ^2.0

### Environment Requirements:
- Application hosting: Heroku
- Database server: MySQL

### Deployment:

Setup your local database config with .env and remote
> heroku config:set DB_DATABASE=... DB_USERNAME=... DB_PASSWORD=...

Then run either locally or from Heroku shell
> php artisan migrate:fresh && php artisan db:seed

Afterwards it's time to push local git repository to remote Heroku branch, Procfile included.

That's pretty much it at the moment.

### Sample API JSON response
[Observable here](https://pizza-place-backend.herokuapp.com/api/v1/Pizza)