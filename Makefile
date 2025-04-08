.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t kata-de-nota .

build-container:
	docker run -dt --name kata-de-nota -v .:/540/kata-de-nota kata-de-nota
	docker exec kata-de-nota composer install

start:
	docker start kata-de-nota

test: start
	docker exec kata-de-nota ./vendor/bin/phpunit tests/$(target)

shell: start
	docker exec -it kata-de-nota /bin/bash

stop:
	docker stop kata-de-nota

clean: stop
	docker rm kata-de-nota
	rm -rf vendor
