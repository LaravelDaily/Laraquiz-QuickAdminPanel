MAKEPATH := $(abspath $(lastword $(MAKEFILE_LIST)))
PWD := $(dir $(MAKEPATH))
DIR := $(subst -,,$(shell basename $(CURDIR) | tr A-Z a-z))
APP := $(DIR)_app_1
NETWORK := $(DIR)_laraquiz

setup:
	docker-compose build
	docker-compose up -d --force-recreate
	docker run -it --rm -v $(PWD):/opt -w /opt --network=$(NETWORK) php:7-fpm chmod o+w -R storage bootstrap/cache
    ifeq ($(wildcard bin/composer),)
	    php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=bin/ --filename=composer
    endif
	php bin/composer install
    ifeq ($(wildcard .env),)
	    cp .env.example .env
	    php artisan key:generate
    endif
	docker exec -it $(APP) php artisan migrate --seed

up:
	docker-compose up -d
	docker exec -it $(APP) php artisan migrate

artisan:
	docker run -it --rm -v $(PWD):/opt -w /opt --network=$(NETWORK) php:7-fpm php artisan $(filter-out $@,$(MAKECMDGOALS))

down:
	docker rm -f $(shell docker ps -aq) && docker volume rm `docker volume ls -q`

tinker:
	docker run -it --rm -v $(PWD):/opt -w /opt --network=$(NETWORK) php:7-fpm php artisan tinker

.PHONY: setup up down tinker artisan
