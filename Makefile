SHELL := /bin/bash

start: up
	symfony serve -d

stop: down
	symfony server:stop

up:
	docker-compose up -d

down:
	docker-compose stop
