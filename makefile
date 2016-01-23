db-rebuild: db-drop db-create db-schema db-data-copy

db-drop:
	bin/console doctrine:database:drop --force

db-create:
	bin/console doctrine:database:create

db-schema:
	bin/console doctrine:schema:create

db-data-copy:
	bin/console legacy:data:copy-from-legacy-db
