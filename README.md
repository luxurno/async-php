### Run app
docker-compose up -d

## Database access
#### Mysql
##### user password 3306 default
#### MSSQL
##### sa Pass@word 5434 default

###
### Exec bash in container
docker-compose exec app bash

### Install dependencies
composer install

#### Create Database
docker-compose exec app /usr/local/bin/php /var/www/app/bin/console doctrine:database:create --connection=mssql
docker-compose exec app /usr/local/bin/php /var/www/app/bin/console doctrine:database:create --connection=mysql

#### Create Entities
docker-compose exec app /usr/local/bin/php /var/www/app/bin/console doctrine:schema:create --em=mysql
docker-compose exec app /usr/local/bin/php /var/www/app/bin/console doctrine:schema:create --em=mssql

#### Async validation
curl -v -X POST -H "Content-Type: application/json" http://localhost:8000/order/save -d '{"products":[{"name":"Shopping bag","producer":"company_fourth","color":"red","height":90,"width":50,"type":"App\\Entity\\Mysql\\Bags"},{"name":"Sports bag","producer":"company_one","color":"white","height":90,"width":40,"type":"App\\Entity\\Mysql\\Bags"},{"name":"Autumn jacket","producer":"company_three","color":"red","height":85,"width":55,"type":"App\\Entity\\Mssql\\Jacket"}]}'

#### Async Successfully endpoint
curl -v -X POST -H "Content-Type: application/json" http://localhost:8000/order/save -d '{"products":[{"name":"Shopping bag","producer":"company_one","color":"red","height":90,"width":50,"type":"App\\Entity\\Mysql\\Bags"},{"name":"Sports bag","producer":"company_one","color":"white","height":90,"width":40,"type":"App\\Entity\\Mysql\\Bags"},{"name":"Autumn jacket","producer":"company_three","color":"red","height":85,"width":55,"type":"App\\Entity\\Mssql\\Jacket"}]}'

#### Async Unsuccessfully Mssql endpoint
curl -v -X POST -H "Content-Type: application/json" http://localhost:8000/order/save -d '{"products":[{"name":"Shopping bag","producer":"company_one","color":"red","height":90,"width":50,"type":"App\\Entity\\Mysql\\Bags"},{"name":"Sports bag","producer":"company_one","color":"white","height":90,"width":40,"type":"App\\Entity\\Mysql\\Bags"},{"name":"Jacket aQhXe8OMPkWC5dqFX6z1ZLJGbStvBREQJWBxn1ANzIS9m9AsNfhkH66RW0lqfPdXYOtYMT5BMHejMDZfYpWEr5GKsRHybgce8l1Eg630eS3iFlDqt6wR0cGtHl14eSQAxirYZ77H66sXu6PWrtRGzhHtSFf0SsQfUx9lJHxSZYQ7jNVzmpzqzRDkXZNefrB3Hqp2QtGbXHSK4WVDT0xpHt4f80kuobzQbuht1UI0qjBK4brrvNyZAF","producer":"company_three","color":"red","height":85,"width":55,"type":"App\\Entity\\Mssql\\Jacket"}]}'
