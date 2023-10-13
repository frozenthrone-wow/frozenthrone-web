# Legion Web 1.0.0

## Requirements:
- PHP >= 8.1
- MySQL >= 8.0 
- NPM (to build Tailwind)

## How To:
*Note: If vendor folder is missing, run `composer update`*

1. Copy `.env.example` and rename it into `.env`
2. Open the new `.env` file and do the steps from **Configuration**, below.
3. Run `php artisan key:generate`
4. run `npm install`
5. run `npm run dev`.  
We're using Tailwind so we need this running to have our code parsed and CSS generated.

3. When you are done with the visual changes, run `npm run build`  
*In case website is acting up, delete the `hot` file from `public` directory.*

## Configuration
In `.env` file:
- Website link 
    - `APP_URL`
- Database credentials 
    - `DB_CONNECTION`
    - `DB_HOST`
    - `DB_PORT`
    - `DB_DATABASE`
    - `DB_USERNAME`
    - `DB_PASSWORD`

In `config/legionweb.php`
- Server info
    - `name`
    - `version`
    - `about`
    - `registration` settings
## Control Panel [ `yourwebsite/cpanel` ]



### How to give access to Control Panel -- NOT IMPLEMENTED YET

1. Navigate to the "legion_website" database in MySQL (after running web_db.sql)
2. In the table "access", you have the following:
    - id (index, autocompletes)
    - wowid (the UUID of the account)
    - level (access level of the user 0, 1 or 9)

What do access levels do?  
- Level 0: allows user to see server statistics
- Level 1: allows user to change download links/news
- Level 9: master account. has access to everything.

### Using the Control Panel

* Authenticate by visiting `yourwebsite/cpanel/authenticate`
* Enjoy posting/deleting/editing news and downloads!

----
<p>Powered by: <br> <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo"></a></p>


# Screenshots
![Main Page](https://i.imgur.com/0A2lrLK.png)
![Register Sidebar](https://i.imgur.com/axXjy03.png)
![Downloads Modal](https://i.imgur.com/5ZuEdYx.png)
