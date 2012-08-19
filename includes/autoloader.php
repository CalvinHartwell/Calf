<?php
	/*
		Project Name: Calf - Free PHP Framework
		Author(s): Calvin Hartwell
		Release Date: 20th July 2010
		Website: http://www.calvinhartwell.com
		
    	This file is part of Calf. Calf is free software: you can redistribute 
		it and/or modify it under the terms of the GNU General Public License as published by
    	the Free Software Foundation, either version 3 of the License, or
    	(at your option) any later version.

   		 Calf is distributed in the hope that it will be useful,
    	 but WITHOUT ANY WARRANTY; without even the implied warranty of
    	 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   		 GNU General Public License for more details.

   		 You should have received a copy of the GNU General Public License
    	 along with Calf.  If not, see <http://www.gnu.org/licenses/>.
	*/ 

/*  See: http://www.php.net/manual/en/ref.spl.php  */ 
class auto_loader
{
		/* Loads .php files in includes folder  */
	public static function includes_aloader($file_name)
	{
		$path = $_SERVER['DOCUMENT_ROOT'] . "/includes/{$file_name}.php"; 
		if(is_readable($path)) require $path; 
	}
	
	
	/* Loads .php files from modules folder (Part of MVC) */
	public static function module_aloader($file_name)
	{
		$path = $_SERVER['DOCUMENT_ROOT'] . "/modules/{$file_name}.php"; 
		if(is_readable($path)) require $path; 
	}
	
}

// Register the functions to invoke the include
spl_autoload_register('auto_loader::includes_aloader');
spl_autoload_register('auto_loader::module_aloader');

?>