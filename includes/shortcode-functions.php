<?php

/**
 * Shortcode company currency
 *
 * @return void
 */
function shortcode_company_currency()
{
	return get_field('company_currency', 'option');
}

add_shortcode('company_currency', 'shortcode_company_currency');

/**
 * Shortcode company payment plan price per week
 *
 * @return void
 */
function shortcode_company_payment_plan_price_per_week()
{
	return get_field('company_payment_plan_price_per_week', 'option');
}

add_shortcode('company_payment_plan_price_per_week', 'shortcode_company_payment_plan_price_per_week');

/**
 * Shortcode company number of students
 *
 * @return void
 */
function shortcode_company_number_of_students()
{
	return get_field('company_number_of_students', 'option');
}

add_shortcode('company_number_of_students', 'shortcode_company_number_of_students');

/**
 * Shortcode company phone number
 *
 * @return void
 */
function shortcode_company_phone_number()
{
	return get_field('company_phone_number', 'option')['url'];
}

add_shortcode('company_phone_number', 'shortcode_company_phone_number');

/**
 * Shortcode company phone number label
 *
 * @return void
 */
function shortcode_company_phone_number_label()
{
	return get_field('company_phone_number', 'option')['title'];
}

add_shortcode('company_phone_number_label', 'shortcode_company_phone_number_label');

/**
 * Shortcode company phone number 2
 *
 * @return void
 */
function shortcode_company_phone_number_2()
{
	return get_field('company_phone_number_2', 'option')['url'];
}

add_shortcode('company_phone_number_2', 'shortcode_company_phone_number_2');

/**
 * Shortcode company phone number label 2
 *
 * @return void
 */
function shortcode_company_phone_number_label_2()
{
	return get_field('company_phone_number_2', 'option')['title'];
}

add_shortcode('company_phone_number_label_2', 'shortcode_company_phone_number_label_2');
