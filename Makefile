setup: 
	install validate

install:
	composer install

build:
	composer install
	composer validate

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

lintfix:
	composer exec --verbose phpcbf -- --standard=PSR12 src bin

brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even

brain-calc:
	./bin/brain-calc
	
brain-gcd:
	./bin/brain-gcd

brain-progression:
	./bin/brain-progression
	
brain-prime:
	./bin/brain-prime

test:
	./bin/brain-even