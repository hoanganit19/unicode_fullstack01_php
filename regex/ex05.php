<?php

$names = 'Ibraheem Ferrell
Gethin Spencer
Bella Sutherland
Zaki Campbell
Haris Irwin
Olive Brooks
Saffron Dawson
Madiha Villanueva
Jessica Bonilla
Raihan Benton';

$names = '<h3>'.preg_replace('/\n/', '</h3><h3>', $names).'</h3>';

echo $names;
