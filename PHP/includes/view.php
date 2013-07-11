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
	
	/* View class gathers content and determines which view to use, etc. */ 
	class view
	{
		protected static $viewtype; 
		
		public function __construct()
		{
			// Start content gathering/collection 
			ob_start(); 
		}
		
		public function finish()
		{
			// return a clean copy of the gathered content
			$content = ob_get_clean(); 
			return $content; 
		}
		
		// Client Identification (Mobile, desktop, etc)
		protected static function setviewtype()
		{
			// Switch the different browsers 
			switch(TRUE) 
			{
				// Windows CE
				case stripos($_SERVER['HTTP_USER_AGENT'], 'Windows CE') !== FALSE:
					self::$viewtype = 'mobile'; 
				break; 
				
				// IPhone
				case stripos($_SERVER['HTTP_USER_AGENT'], 'iPhone') !== FALSE:
					self::$viewtype = 'mobile'; 
				break; 
				
				// IPod
				case stripos($_SERVER['HTTP_USER_AGENT'], 'iPod') !== FALSE:
					self::$viewtype = 'mobile'; 
				break; 
				
				
				// IPad
				case stripos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== FALSE:
					self::$viewtype = 'mobile'; 
				break; 
				
				
				// Android
				case stripos($_SERVER['HTTP_USER_AGENT'], 'Android') !== FALSE:
					self::$viewtype = 'mobile'; 
				break; 
				
				
				// Default machines (desktops, etc)...
				default:
					self::$viewtype = 'default'; 
				break; 
			}
		}
		
		// Show - get the corresponding view, return the gathered content 
		public static function show($location, $params = array())
		{
			if(empty(self::$viewtype)) {
				self::setviewtype(); 
			}
			
			$views = array(); 
			
			if(self::$viewtype != 'default')
			{
				$views[] = $_SERVER['DOCUMENT_ROOT'] . '/views/' . self::$viewtype . '/' . $location .'.php';
			}
			
			$views[] = $_SERVER['DOCUMENT_ROOT'] . '/views/default/' . $location . '.php'; 
			
			$content = ''; 
			
			foreach($views as $viewlocation)
			{
				if(is_readable($viewlocation))
				{
					$view = $params; 
					ob_start(); 
					include $viewlocation; 
					$content = ob_get_clean(); 
					break; 
				}
			}
			
			return $content; 
		}
	}

?>