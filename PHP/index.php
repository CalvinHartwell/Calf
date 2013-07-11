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

	/* Include other files and start the session */ 
	require './includes/autoloader.php'; 
	session_start(); 
	
	/* Create a new controller object and pass the URL string provided by the
	   htaccess redirect to the new object through the constructor. */ 
	utility::set_item('controller', new controller($_GET['u'])); 
	
	/* Create and render the view */
	$view = new view(); 
	utility::get_item('controller')->render(); 
	$content = $view->finish(); 
	echo view::show('shell', array('body'=>$content)); 
?>