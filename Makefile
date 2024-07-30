composer:
	docker run --rm --interactive --tty --volume $(shell pwd):/app composer require basis-company/nats

nat-server-start:
	docker run -p 4222:4222 -p 8222:8222 -p 6222:6222 --name nats-server -ti nats:latest
	
php:
	docker run --add-host host.docker.internal:host-gateway --rm --interactive --tty --volume $(shell pwd):/app php:8.3.9-cli php /app/index.php

