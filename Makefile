.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t lista-de-la-compra .

build-container:
	docker run -dt --name lista-de-la-compra -v .:/540/Boilerplate lista-de-la-compra
	docker exec lista-de-la-compra composer install

start:
	docker start lista-de-la-compra

test: start
	docker exec lista-de-la-compra ./vendor/bin/phpunit tests/$(target)

shell: start
	docker exec -it lista-de-la-compra /bin/bash

stop:
	docker stop lista-de-la-compra

clean: stop
	docker rm lista-de-la-compra
	rm -rf vendor
