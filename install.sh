# Let the user run script only once
if [ ! -d "vendor" ]; then
    composer install
    composer run-script post-create-project-cmd
    npm install
    npm run dev

    # package-setup-commands

    php artisan storage:link

    php artisan migrate --seed

    git add . && git commit -m "App installation"
fi