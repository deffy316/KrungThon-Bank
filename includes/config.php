<?php
// Detect protocol (HTTP or HTTPS)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";

// Get domain (e.g., localhost or example.com)
$domain = $_SERVER['HTTP_HOST'];

// Move up one directory to get the project root
$projectRoot = dirname(__DIR__); // Instead of dirname(__FILE__)

// Calculate the project folder dynamically
$folder = str_replace($_SERVER['DOCUMENT_ROOT'], '', $projectRoot);

// Define BASE_URL
define('BASE_URL', rtrim($protocol . $domain . "/" . trim($folder, "/") . "/", "/") . "/");

// Define ROOT_PATH (absolute path for includes)
define('ROOT_PATH', $projectRoot);

// Show error if any
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

// Start session
session_start();

?>
