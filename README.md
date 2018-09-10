# AndrosAdventure
PHP 7 based microservices for adventure room booking system. This project is using slim microframework for creation of 3 simple api calls and behind these calls is using symphony's doctrine orm in order to communicate with a MySQL DB.

## Requirements
* **PHP >= 7.0**
* **PHP mysql,json,bcmath modules also required**
* **MySQL >= 5.7 or compatible**
* **Apache 2 / Nginx >= 1.20**
* **Composer installed globally**
* **Cli to server**

### Deploy server
* Use a LAMP or LEMP stack enabled server/container whatsoever
* Create a database with UTF-8 collation preferably
* Import to that db the schema of db from andros-adventures.sql
* Insert one record to tbl_users table with every tool you prefer
  * User must have superuser = 1
  * User must be enabled with status = 1
* Enable rewrites on Web Server
* Clone repository to a Web Server and PHP readable folder
* Create (and make web server user it's owner) folder **logs** under /
* Copy paste `src/config.php.sample` to `src/config.php`
* Inside `src/config.php` fill in "Port","Database","Username","Password" array keys with your DB's credentials
* **Suggestion**: create (and grant all to this user) a DB user for newly created app DB
* `chmod +x updatedb` & `chmod +x updatedbgetset` in order to update `src/entities` classes
* Use andros.postman_collection.json for testing
* Use `api/appointments` via GET method (no parameters) in order to receive all appointments that are starting from the time of query and forward
* Use `api/appointments` via POST method (with: *name (string 100),start (datetime 'Y-m'd H : m : s),end (datetime 'Y-m'd H : m : s),color (string 45),email (string 45),phone (string 45)* ) in order to create a new appointment
* Use `api/appointments` via DELETE method  (with: *username (string 20), password_hash (string 128), id (integer 11)*) in order to delete **appointment with id=** *id*
