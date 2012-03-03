<?php

// all we need is the classes dir, Anbu is tiny!
Autoloader::directories(array(
	Bundle::path('anbu').'classes'
));

// listen for laravel logs, pass them to anbu
Event::listen('laravel.log', function ($type, $message) {
	Anbu::log($type, $message);
});

// listen to sql queries, pass them to anbu
Event::listen('laravel.query', function ($sql, $bindings, $time) {
	Anbu::sql($sql, $bindings, $time);
});