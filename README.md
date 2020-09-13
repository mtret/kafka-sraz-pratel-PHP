### Running with docker

Build the app with:
```bash
docker-compose build
```

Load up the containers:
```bash
docker-compose up
```

And run the app from the console's docker with this command:
```bash
docker-compose run console bash
```

Install dependencies if needed:
```bash
composer install
```

Then inside the container
```bash
php symfony/bin/console
```
and execute the command of your choice.


Possible kafka configuration:
```
https://github.com/edenhill/librdkafka/blob/master/CONFIGURATION.md
```