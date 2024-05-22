<?php 
/**
Template Name: Homepage One
*/
get_header();
	
	get_template_part('sections/gruj','slider');
	get_template_part('sections/gruj','call-action');
	get_template_part('sections/gruj','service');	
	get_template_part('sections/specia','features');
	get_template_part('sections/gruj','portfolio');		
	get_template_part('sections/specia','blog');
	
get_footer();
