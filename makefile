# Variables
IMAGE_NAME := lijo
CONTAINER_NAME := lijo

# Check if the Docker image exists
image_exists:
	@if [ "$(shell docker images -q $(IMAGE_NAME))" = "" ]; then \
		echo "Docker image $(IMAGE_NAME) does not exist. Building and starting containers..."; \
		docker-compose up --build -d; \
		docker-compose exec $(CONTAINER_NAME) php artisan migrate; \
	else \
		echo "Docker image $(IMAGE_NAME) already exists."; \
	fi

# Default target
all: image_exists
