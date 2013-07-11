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
	
	// Generic error page class 
	class error
	{
		// Each page should have a default action 
		public function defaultaction()
		{
			// Show the default view
			echo view::show('error/errorview');
		}
	}
?>