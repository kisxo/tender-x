<?php

// development mode config
if ($_SERVER["SERVER_NAME"] == "localhost") {
    /** database config */
    define("DBNAME", "tenderx");
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "");
    define("DBDRIVER", "mysql");

// production mode config
} else {

    /** database config */
    define("DBNAME", "tenderx");
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "");
    define("DBDRIVER", "mysql");
}

define("APP_NAME", "Tenderx");
define("APP_DESC", "Best tender bidding website");

/** [ true=Development / false=Production ] */
define("DEBUG", true);