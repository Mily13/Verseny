# Mozaik-Verseny
Mozaik-Verseny app V1.0

A fejlesztés alatt XAMPP (Apache, MySQL) volt használva.
A weboldal adatbázisként egy MySQL adatbázis lett létrehozva PhpMyAdmin-ban, aminek kiexportált változata megtalálható a projekt root-ban 'versenydb.sql' néven.
Az adatbázis fel lett töltve minta adatokkal is.

A '.env' fájlt létrehozni a '.env.example' fájlból lehet másolás és átnevezéssel.
A MYSQL adatbázis beállításához az én .env fájlomban a következő sorok szerepelnek:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=versenydb
DB_USERNAME=root
DB_PASSWORD=
```
Futtatási követelmények:
1) megfelelő PHP verzió 
2) Composer

Repo klónozása és beüzemelés fejlesztői környezet termináljából:
```
git clone https://github.com/Mily13/Mozaik-Verseny.git
cd Verseny
cd verseny-app
composer install
```

XAMPP-pal való futtatáskor PhpMyAdmin-ban importálható az adatbázis a kapott 'versenydb.sql' fájból.



