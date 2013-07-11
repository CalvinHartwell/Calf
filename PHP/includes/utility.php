<?php
	/*
		Project Name: Calf - Free PHP Framework
		Author(s): Calvin Hartwell
		Release Date: 20th July 2010
		Website: http://www.calvinhartwell.com
		
    	This file is part of Calf. Calf is free software: you can redistribute 
		it and/or modify it under the terms of the GNU General Public License as
		published by the Free Software Foundation, either version 3 of the 
		License, or (at your option) any later version.

   		Calf is distributed in the hope that it will be useful,
    	but WITHOUT ANY WARRANTY; without even the implied warranty of
    	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   		GNU General Public License for more details.

   		You should have received a copy of the GNU General Public License
    	along with Calf.  If not, see <http://www.gnu.org/licenses/>.
		
	*/ 
class utility
{
	// set session data 
	static function get_item($item_name, $persist = TRUE)
	{
		// test if set and return item, else return null 
		if(isset($_SESSION[$item_name]))
		{
			return $_SESSION[$item_name]; 
			// remove item if no persist required 
			if(!$persist) unset($_SESSION[$item_name]); 
		}
		else
			return NULL; 
	}
	
	// get session data 
	static function set_item($item_name, $item_value, $is_array = FALSE)
	{
		// set an array 
		if($is_array)
		{
			if(!isset($_SESSION[$item_name]))
			{
				// new array obj, then assign
				$_SESSION[$item_name] = array(); 
				$_SESSION[$item_name][] = $item_value; 
			}
		} // set single session variable 
		else
		{
			$_SESSION[$item_name] = $item_value; 
		}
	}
	
	/* Redirect/Forward function */ 
	static function redirect($url)
	{
		// Redirect user to given URL using header 
		header("Location: ".$url); 
	}
}

?>