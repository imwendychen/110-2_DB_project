<?php 


include 'book_function.php';


if ($_GET['input_text']) {
	$customer_info = $_GET['input_text'];
	$searchResult = new Controller();
	$searchResult->findCustomer($customer_info);
}