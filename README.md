
# docker-lamp

Docker with Apache, MySQL 8.0, PHPMyAdmin and PHP.

 run these containers:

```
docker-compose up -d
```

Open phpmyadmin at [http://127.0.0.1:8000](http://127.0.0.1:8000)
Open web browser to look at a simple php example at [http://127.0.0.1:81](http://127.0.0.1:81)

Clone YourProject on `www/` and then, open web [http://127.0.0.1/YourProject](http://127.0.0.1/YourProject)

Run MySQL client:

- `docker-compose exec db mysql -u root -p` 

Infrastructure as code!

Apache, PHP, MySQL y PHPMyAdmin con Docker LAMP

