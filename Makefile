setup: install validate

install:
	composer install

validate:
	composer validate

brain-games:
	./bin/brain-games