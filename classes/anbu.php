<?php

/**
 * Anbu, the light weight profiler for Laravel.
 * 
 * @author Dayle Rees <me@daylerees.com>
 * @copyright 2012 Dayle Rees <me@daylerees.com>
 * @license MIT License <http://www.opensource.org/licenses/mit>
 */
class Anbu
{
	/**
	 * A list of attributes to watch.
	 *
	 * @var array
	 */
	private static $_watchlist = array();

	/**
	 * Contains the logs written by Laravel.
	 *
	 * @var array
	 */	
	private static $_loglist = array();

	/**
	 * A list of SQL queries exectued.
	 *
	 * @var array
	 */	
	private static $_sqllist = array();

	/**
	 * Render Anbu, assign view params and echo out the main view.
	 * 
	 * @return void
	 */
	public static function render()
	{
		$data = array(
			'watch' => static::$_watchlist,
			'log'	=> static::$_loglist,
			'sql'	=> static::$_sqllist
		);
		echo View::make('anbu::main', $data)->render();
	}

	/**
	 * Watch an object (assigned by reference) to show within Anbu
	 * 
	 * @param string A friendly name for the object.
	 * @param mixed The object itself.
	 * @param bool This switch will later be used to pass by reference or not.
	 * @return void
	 */
	public static function watch($name, &$object, $allow_change = true)
	{
		// pass the actual object in
		static::$_watchlist[$name] =& $object; 
	}

	/**
	 * Add a log entry to the Anbu array.
	 * 
	 * @param string The type of log entry.
	 * @param string The message.
	 * @return void
	 */
	public static function log($type, $message)
	{
		static::$_loglist[] = array($type, $message);
	}

	/**
	 * Add a performed SQL query to Anbu.
	 * 
	 * @param string the SQL query performed.
	 * @param array The bindings for the query.
	 * @param float The time taken to run the query.
	 * @return void
	 */
	public static function sql($sql, $bindings, $time)
	{
		// I used this method to swap in the bindings, its very ugly
		// will be replaced later, hopefully will find something in
		// the core
		foreach ($bindings as $b)
		{
			$count = 1;
			$sql = str_replace('?', '`'.$b.'`', $sql,$count);
		}

		static::$_sqllist[] = array($sql, $time);
	}
}