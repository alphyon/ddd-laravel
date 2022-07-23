.RECIPEPREFIX +=
.DEFAULT_GOAL := help
model="User"
include .env
help:
	@echo "Useful  commands"
install:
	@composer install
test:
	@docker exec $(PROJECT_NAME)_php php artisan test
migrate:
	@docker exec $(PROJECT_NAME)_php php artisan migrate
showmodel:
	@docker exec $(PROJECT_NAME)_php php artisan model:show $(model)
migrater:
	@docker exec $(PROJECT_NAME)_php php artisan migrate:fresh
seed:
	@docker exec $(PROJECT_NAME)_php php artisan db:seed
optimize:
	@docker exec $(PROJECT_NAME)_php php artisan optimize
analyse:
	./vendor/bin/phpstan analyse
pint:
	./vendor/bin/pint
generate:
	@docker exec $(PROJECT_NAME)_php php artisan ide-helper:models --write
nginx:
	@docker exec -it $(PROJECT_NAME)_nginx /bin/sh
php:
	@docker exec -it $(PROJECT_NAME)_php /bin/sh
database:
	@docker exec -it $(PROJECT_NAME)_database /bin/sh
redis:
	@docker exec -it $(PROJECT_NAME)_redis /bin/sh
up:
	@docker-compose up -d
down:
	@docker-compose down
