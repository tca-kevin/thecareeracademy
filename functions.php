<?php

if (!defined('ABSPATH')) {
	exit;
}

include 'vendor/autoload.php';

define('POST_CATEGORIES', [
	'featured-benefit' => 'Featured Benefit',
	'featured-blog' => 'Featured Blog',
	'featured-certificate' => 'Featured Certificate',
	'featured-ebook' => 'Featured Ebook',
	'featured-guide' => 'Featured Guide',
	'featured-occupation' => 'Featured Occupation',
	'featured-partner' => 'Featured Partner',
	'featured-partner-award-winning' => 'Featured Partner Award Winning',
	'featured-story' => 'Featured Story',
	'featured-subject' => 'Featured Subject',
	'featured-testimonial-subject' => 'Featured Testimonial Subject',
	'featured-testimonial-tutor-support' => 'Featured Testimonial Tutor Support',
	'featured-testimonial-career-centre' => 'Featured Testimonial Career Centre',
	'featured-tutor' => 'Featured Tutor'
]);

define('SUBJECT_CATEGORIES', [
	'aat' => 'AAT',
	'accounting' => 'Accounting',
	'administration' => 'Administration',
	'animal-care' => 'Animal Care',
	'beauty-lifestyle' => 'Beauty & Lifestyle',
	'bookkeeping' => 'Bookkeeping',
	'creative' => 'Creative Skills',
	'business' => 'Business',
	'childcare' => 'Childcare',
	'counselling' => 'Counselling',
	'cryptocurrency' => 'Cryptocurrency',
	'excel' => 'Excel',
	'fitness' => 'Fitness',
	'health' => 'Health',
	'Hobby' => 'Hobbies',
	'hospitality-tourism' => 'Hospitality & Tourism',
	'it' => 'IT',
	'leadership' => 'Leadership',
	'management' => 'Management',
	'myob' => 'MYOB',
	'payroll' => 'Payroll',
	'psychology' => 'Psychology',
	'reception' => 'Reception',
	'teaching' => 'Teaching',
	'xero' => 'Xero',
	'zoology' => 'Zoology',
	'add-ons' => 'Add Ons',
	'short-courses' => 'Short Courses',
	'online-course-bundles' => 'Online Course Bundles',
	'internal-product' => 'Internal Product'
]);

define('PRODUCT_CATEGORIES', [
	'aat' => 'AAT',
	'accounting' => 'Accounting',
	'administration' => 'Administration',
	'animal-care' => 'Animal Care',
	'beauty-lifestyle' => 'Beauty & Lifestyle',
	'bookkeeping' => 'Bookkeeping',
	'creative' => 'Creative Skills',
	'business' => 'Business',
	'childcare' => 'Childcare',
	'counselling' => 'Couselling',
	'cryptocurrency' => 'Cryptocurrency',
	'excel' => 'Excel',
	'fitness' => 'Fitness',
	'health' => 'Health',
	'hobby' => 'Hobbies',
	'hospitality-tourism' => 'Hospitality & Tourism',
	'it' => 'IT',
	'leadership' => 'Leadership',
	'management' => 'Management',
	'myob' => 'MYOB',
	'oca' => 'OCA',
	'payroll' => 'Payroll',
	'psychology' => 'Psychology',
	'reception' => 'Reception',
	'sct' => 'SCT',
	'teaching' => 'Teaching',
	'xero' => 'Xero',
	'zoology' => 'Zoology',
	'add-ons' => 'Add Ons',
	'short-courses' => 'Short Courses',
	'online-course-bundles' => 'Online Course Bundles',
	'internal-product' => 'Internal Product'
]);

define('PAGES', [
	'home' => 'Home',
	'about-our-tutors' => 'About Our Tutors',
	'about-us' => 'About Us',
	'add-ons' => 'Add Ons',
	'blogs' => 'Blogs',
	'cancel' => 'Cancellation',
	'career-centre' => 'Career Centre',
	'contact-us' => 'Contact Us',
	'enrol-now' => 'Enrol Now',
	'faqs' => 'Frequently Asked Questions',
	'graduation' => 'Graduation',
	'next-steps' => 'Next Steps',
	'privacy-policy' => 'Privacy Policy',
	'reviews-and-student-stories' => 'Reviews & Student Stories',
	'accredited-courses' => 'Recognitions & Accreditations',
	'recognition-prior-learning-experience' => 'Recognition of Prior Learning Experience',
	'terms-conditions' => 'Terms & Conditions'
]);

require_once get_template_directory() . '/includes/Redis.php';

$redis = \TheCareerAcademy\Includes\Redis::getInstance();

require get_template_directory() . '/includes/admin-functions.php';
require get_template_directory() . '/includes/cli-functions.php';
require get_template_directory() . '/includes/footer-functions.php';
require get_template_directory() . '/includes/header-functions.php';
require get_template_directory() . '/includes/helper-functions.php';
require get_template_directory() . '/includes/shortcode-functions.php';
require get_template_directory() . '/includes/theme-functions.php';
