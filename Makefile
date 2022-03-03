include .env

build: 	 		## Build app.
	@docker-compose build app

up: 	 		## Start all Containers.
	@docker-compose up -d

ps: 	 		## To list running Docker containers.
	@docker-compose ps

down: 	 		## Stop all Containers.
	@docker-compose down

ls: 	 		## Execute the command "ls -l" inside the container app.
	@docker-compose exec app ls -l

install: 	 	## Download and install all dependencies of the project..
	@docker-compose exec app composer install

key: 	 		## Generate a key for Artisan.
	@docker-compose exec app php artisan key:generate

first-install:    	## Execute the first install of the project.
	echo "Starting the installation:"
	make build
	make up
	make install
	make key
	echo "Finished the installation."
