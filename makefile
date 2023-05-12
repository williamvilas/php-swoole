build:
	docker build -t php-swoole .

bash:
	docker run -itv ${PWD}:/app -w /app -p 8088:8080 php-swoole bash

