RED='\033[0;31m'
CYAN='\033[0;36m'
GREEN='\033[1;32m'
ORANGE='\033[0;33m'
NC='\033[0m' # No color

deploy() {
	# Put the application into maintenance mode
	php artisan down

	printf "\n${GREEN}Running Composer...${NC}\n"
	# Update composer dependecies
	sudo composer update
	sudo composer dump-autoload

	printf "\n${GREEN}Setting file permissions...${NC}\n"
	sudo chmod -R 664 storage/
	sudo chmod -R +X storage/
	sudo chmod -R 664 bootstrap/cache/
	sudo chmod -R +X bootstrap/cache/
	sudo chown -R root:www-data .
	sudo chown -R root:www-data public/uploads
	sudo chmod -R g+s public/uploads
	sudo find public/uploads -type d -exec chmod 775 {} +
	sudo chmod +x deploy.sh

	printf "\n${GREEN}Clearing Laravel cache etc...${NC}\n"
	php artisan cache:clear

	# Clear view cache
	php artisan view:clear

	# Optimize class loading
	php artisan clear-compiled

	# Cache the application routes
	php artisan route:clear
	php artisan route:trans:cache

	# Cache the configuration files
	php artisan config:clear
	php artisan config:cache

	# Flush expired password reset tokens
	php artisan auth:clear-resets

	# Bring the application out of maintenance mode
	php artisan up

	printf "\n${GREEN}Deploy Script End.${NC}\n"
}

printf "\n${CYAN}Laravel Deploy Script for lazy people :D${NC}\n"


printf "\n${ORANGE}To set everything correctly, you must be the owner of the files in this folder!${NC}\n"

read -r -p "${1:-Continue? [y/N]} " response
case $response in
    [yY][eE][sS]|[yY])
        deploy
        ;;
    *)
        printf "\n\n${RED}Stopping script.${NC}\n"
        exit 0
        ;;
esac
