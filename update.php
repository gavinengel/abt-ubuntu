#!/usr/bin/php
<?php

/**
 * declarations
 */
$path = dirname(__FILE__) . '/';
$manifest = json_decode(file_get_contents ($path . "manifest.json"), true);
require ($path . "functions.php");

/**
 * update this git repository
 */
echo "Updating $path:\n";
echo `cd $path && git pull && cd -;`;
echo "\n\n";

/**
 * perform apt-get commands
 */
foreach ($manifest['apt-get'] as $cmd => $pkgs) {
  $pkg = implode(' ', $pkgs);
  $output = aptGet($cmd, $pkg);
  $info = [
    'cmd' => "apt-get $cmd $pkg",
    'output' => $output
  ];
  
  logger ($info);

}

/**
 * run misc shell stuff
 */ 
echo "Misc shell commands:\n";
echo `sudo {$path}misc.sh;`;
echo "\n\n";
