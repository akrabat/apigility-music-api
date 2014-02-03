Apigility Tutorial Application
==============================

See [Create a RESTful API with Apigility](http://techportal.inviqa.com/2013/12/03/create-a-restful-api-with-apigility/) on techPortal.

Installation
------------

* Clone or download this repository
* `$ composer.phar install`
* Copy data/music.db.dist to data/music.db
* run `$ php public/index.php development enable`


Run
---

* `php -S 0:8080 -t public/ public/index.php`
* `curl -s -H "Accept: application/vnd.music.v1+json" http://localhost:8080/albums`

