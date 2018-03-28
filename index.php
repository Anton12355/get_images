<?php
if ( isset( $_POST['site-address'] ) ) {
	$site_address = $_POST['site-address'];
	$homepage     = file_get_contents( $site_address );

	preg_match_all( '/img.+?src=[\"\']([^\"]*\.(\w{3,4}))[\"\']/', $homepage, $matches, PREG_SET_ORDER );

	/*echo '<pre>';
	print_r($matches);
	echo '</pre>';*/

	$sorted_matches = [];
	foreach ( $matches as $number => $values ) {
		foreach ( $values as $key => $value ) {
			if ( $key === 0 ) {
				$sorted_matches[ $number ] = $value;
			}
		}
	}

	/*echo '<pre>';
	print_r($sorted_matches);
	echo '</pre>';*/

	foreach ( $sorted_matches as $key => $value ) {
		echo '<' . $value . '>';
	}
}
?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
<form method="post">
	<label for="site-address">Введите адрес сайта, с которого хотите получить картинки</label>
	<input id="site-address" name="site-address" type="text">
	<input type="submit" value="ОК">
</form>
</body>
</html>
