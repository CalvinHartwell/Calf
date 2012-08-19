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
	
	
	/* This class determines which module/view to invoke */
	class controller
	{
		// URL string information
		protected $url_parts; 
		public $parameters; // URL params available for modules/views etc

		// The url string is taken apart and stored in the variables above
		public function __construct($urlString)
		{
			// Validation, lower case, remove trailing forward-slash, etc.
			$urlString = strtolower($urlString); 
			if(substr($urlString, -1, 1) == '/')
			{
				// remove slash
				$urlString = substr($urlString, 0, strlen($urlString)-1); 
			}
			
			// Split the URL string into an array
			$url_parts = explode('/', $urlString); 
			
			// Default module and action assigned if not set... 
			if(empty($url_parts[0]))
			{
				// By default, index module is used 
				$url_parts[0] = 'index'; 
			}
			if(empty($url_parts[1]))
			{
				// By default, the defaultaction should be invoked
				$url_parts[1] = 'defaultaction'; 
			}	
			
			$this->url_parts = $url_parts; 
			
			// Create the section action var
			$this->section_action = $url_parts[0] . '/' . $url_parts[1];
			
			// Module/Action are encapsulated and therefore removed 
			array_shift($url_parts);
			array_shift($url_parts); 
			
			// assign url_parts to the public params var for the module to use
			$this->parameters = $url_parts;  
		}
		
		// Error checkin on module/action performed here and invoked 
		public function render()
		{
			if(!class_exists($this->url_parts[0]))
			{
				// If module doesn't exist, redirect to error page 
				utility::redirect("/error/"); 
			}
			
			if(!method_exists($this->url_parts[0], $this->url_parts[1]))
			{
				// If module and action doesn't exist, redirect to error page 
				utility::redirect("/error/"); 
			}
			
			// invoke the module/action
			$invoke_module = call_user_func_array(array(new $this->url_parts[0], $this->url_parts[1]), array($url_parts)); 
			
			// If it fails, redirect to the error page 
			if($invoke_module === FALSE)
					utility::redirect("/error/"); 
		}
		
	}
?>