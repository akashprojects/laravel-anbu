<?php

class Anbu
{
	private static $_watchlist = array();
	private static $_loglist = array();
	private static $_sqllist = array();

	public static function render()
	{
		$data = array(
			'watch' => static::$_watchlist,
			'log'	=> static::$_loglist,
			'sql'	=> static::$_sqllist
		);
		echo View::make('anbu::main', $data)->render();
	}

	public static function watch($name, &$object, $allow_change = true)
	{
		static::$_watchlist[$name] =& $object; 
	}

	public static function log($type, $message)
	{
		static::$_loglist[] = array($type, $message);
	}

	public static function sql($sql, $bindings, $time)
	{
		$sqlafter = $sql;

		foreach ($bindings as $b)
		{
			$count = 1;
			$sql = str_replace('?', '`'.$b.'`', $sql,$count);
		}


		static::$_sqllist[] = array($sql, $time);
	}
}