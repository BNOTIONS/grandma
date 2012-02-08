<?php defined('SYSPATH') or die('No direct script access.');

// Configure the database module to use the proper database configuration based on environment
Database::$default = Kohana::$environment;

