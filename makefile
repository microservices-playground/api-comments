test: phpunit phpcs

build: phpunit-coverage phpcs

phpunit:
	vendor/bin/phpunit --no-coverage

phpunit-coverage:
	vendor/bin/phpunit

phpcbf:
	vendor/bin/phpcbf -p --standard=PSR2 src tests

phpcs:
	vendor/bin/phpcs -p --standard=PSR2 src tests

db-rebuild: db-drop db-create db-schema db-data-copy

db-drop:
	bin/console doctrine:database:drop --force

db-create:
	bin/console doctrine:database:create

db-schema:
	bin/console doctrine:schema:create

db-data-copy:
	bin/console legacy:data:copy-from-legacy-db

composer.phar:
	curl -Ss https://getcomposer.org/installer | php

install: composer.phar
	php composer.phar install
