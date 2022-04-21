<?php
$dir = trailingslashit( get_stylesheet_directory() );
$files = [ 'setup', 'acf', 'theme-functions', 'assets', 'nav-walker' ];

foreach($files as $file)
  include "{$dir}/inc/{$file}.php";

