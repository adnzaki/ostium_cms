<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Pagination Styling
|--------------------------------------------------------------------------
|
| These settings is used to style pagination so it will look better
| then its default style. Data configuration keep in controller to make it
| easier to customize and maintain.
|
*/

// Set pagination container style
$config['full_tag_open']        = '<div class="row os-paging"><div class="col-sm-5 col-xs-12 col-sm-push-7"><ul class="pagination os-body-paging">';
$config['full_tag_close']       = '</ul></div></div>';

// Set the first and last link style
$config['first_link']           = 'Pertama';
$config['last_link']            = 'Terakhir';
$config['first_tag_open']       = '<li class="waves-effect">';
$config['first_tag_close']      = '</li>';
$config['last_tag_open']        = '<li class="waves-effect">';
$config['last_tag_close']       = '</li>';

// Set the next and previous link style
$config['next_link']            = '<i class="material-icons">chevron_right</i>';
$config['prev_link']            = '<i class="material-icons">chevron_left</i>';
$config['next_tag_open']        = '<li class="waves-effect">';
$config['next_tag_close']       = '</li>';
$config['prev_tag_open']        = '<li class="waves-effect">';
$config['prev_tag_close']       = '</li>';

// Set the digit link style
$config['num_tag_open']         = '<li class="waves-effect">';
$config['num_tag_close']        = '</li>';

// Set the current page number
$config['cur_tag_open']         = '<li><a href="javascript:void(0);" class="waves-effect active-link">';
$config['cur_tag_close']        = '</a></li>';



?>
