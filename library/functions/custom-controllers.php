<?php
function add_winpubg_controller($controllers){
	$controllers[] = 'winpubg';
	return $controllers;
}
add_filter('json_api_controllers', 'add_winpubg_controller');
function set_winpubg_controller_path(){
	return GTHEME_CLASSES. 'mobile-app-classes/class-json-api-winpubg.php';
}
add_filter('json_api_winpubg_controller_path', 'set_winpubg_controller_path');
?>