<?php

/**
 * wrapper for apt-get
 */
function aptGet ($cmd = '', $pkg = '') {
  $result = '';

  if ($cmd && $pkg) {
    $result = `sudo apt-get -y $cmd $pkg`;
  }

  return $result;
}


/**
 * display readable message
 */
function logger ($info = []) {
  foreach ($info as $key => $value) {
    if ($key == 'output') echo "- $key:\n$value\n";
    else echo "- $key: $value\n";
  }
  echo "\n";
}
