<?php
/**
 * All the user informations saved on the database can be called by calling the functions in this library
 */
 
/**
 * Returns first name of the logged in user.
 * @return string
 */
function first_name(){
    return Session::get('first_name');   
}
/**
 * Returns last name of the logged in user.
 * @return string
 */
function last_name(){
    return Session::get('last_name');   
}
/**
 * Returns full name of the logged in user.
 * @return string
 */
function full_name(){
    return Session::get('full_name');   
}
/**
 * Returns id of the logged in user.
 * @return integer
 */
function user_id(){
    return Session::get('id');
}
/**
 * Returns profile pic link of the logged in user.
 * @return string
 */
function profile_pic_link(){
    return Session::get('profile_pic_link');   
}
/**
 * Returns gender of the logged in user.
 * @return string
 */
function gender(){
    return Session::get('gender');   
}
/**
 * Returns email of the logged in user.
 * @return string
 */
function user_email(){
    return Session::get('email');   
}
/**
 * Returns date of birth in format MM/DD/YYYY of the logged in user.
 * @return date
 */
function dob(){
    return changeDateFormatFromDB((Session::get('dob')));   
}
?>