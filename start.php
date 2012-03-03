<?php

Autoloader::directories(array(
	Bundle::path('anbu').'classes'
));

Event::listen('laravel.log', function ($type, $message) {
	Anbu::log($type, $message);
});

Event::listen('laravel.query', function ($sql, $bindings, $time) {
	Anbu::sql($sql, $bindings, $time);
});