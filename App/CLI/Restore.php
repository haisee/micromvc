<?php

// Start database connection
$db = new DB(config('database'));

// Connect to databse server
$db->connect();

// Set name of migration object
$migration = '\Core\Migration\\'. $db->type;

// Create migration object
$migration = new $migration;

// Set database connection
$migration->db = $db;

// Set the database name
$migration->name = 'default';

// Load table configuration
$migration->tables = config(NULL, 'migration');

// Backup existing database table
$migration->restore_data();
