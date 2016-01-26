test: phpunit-dev phpcs

build: phpunit-report phpcs

phpunit-dev:
	vendor/bin/phpunit

phpunit-report:
	vendor/bin/phpunit -c phpunit.xml.report

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
