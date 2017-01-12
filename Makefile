docker = docker-compose run --rm app
composer-install = $(docker) php bin/composer install
migrate = ./docker/wait-for-it.sh -q -t 8 db:3306 -- $(docker) php artisan migrate

setup:
	docker-compose build
	docker-compose up -d --force-recreate
	$(docker) chmod o+w -R storage bootstrap/cache
    ifeq ($(wildcard bin/composer),)
	    php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=bin/ --filename=composer
    endif
	$(composer-install)
    ifeq ($(wildcard .env),)
	    cp .env.example .env
	    $(docker) php artisan key:generate
    endif
	$(migrate)

up:
	docker-compose up -d
	$(composer-install)
	$(migrate)

artisan:
	$(docker) php artisan $(filter-out $@,$(MAKECMDGOALS))

down:
	docker rm -f $(shell docker ps -aq) && docker volume rm `docker volume ls -q`

tinker:
	$(docker) php artisan tinker

.PHONY: setup up down tinker artisan
