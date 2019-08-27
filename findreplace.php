<?php

$offset = 0;

if (isset($_POST['text']) && isset($_POST['search_for']) && isset($_POST['replace_with'])) {
	$text = $_POST['text'];
	$search = $_POST['search_for'];
	$replace = $_POST['replace_with'];
	
	$search_length = strlen($search);
	
	if (!empty($text) && !empty($search) && !empty($replace)) {
		
		while ($strpos = strpos($text, $search, $offset)) {
			$offset = $strpos + $search_length;
			$text = substr_replace($text, $replace, $strpos, $search_length);
		}
		echo $text;
		
		
	} else {
		echo 'Please fill in all fields.';
	}
}
?>

<form action = "findreplace.php" method = "POST">
		<textarea name = "text" rows = 6 cols = 30></textarea><br/><br/>
		Search for:<br/ >
		<input type = "text" name = "search_for"/><br/><br/>
		Replace with:<br/>
		<input type = "text" name = "replace_with"/><br/><br/>
		<input type = "submit" value = "Find and Replace">
</form>

