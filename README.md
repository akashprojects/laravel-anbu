#Anbu

Front end debug and profiling for the Laravel Framework.

##Installation

Install using artisan for Laravel :

	php artisan bundle:install anbu

Now simply add anbu to your application/bundles.php with auto start enabled :

	return array('anbu' => array('auto' => true));

Finally, add Anbu to your View master template, or individual views with :

	<?php Anbu::render(); ?>

right at the start of the file!

All done!

##Watching Variables

Simply use :

	Anbu::watch('descriptive name', $variable);

##Logging

Use laravels built in logging methods :

	Log::info('Oh hai!');

##SQL Queries

Will be logged automatically as they are executed!


Enjoy!