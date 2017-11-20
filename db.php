<?php 
$config = array(
		'title' => 'myBlog',
		'db' => array(
			'server' => 'localhost',
			'username' => 'root',
			'password' => '',
			'name' => 'comments_db'
		),
	);
$connection = mysqli_connect(
				$config['db']['server'],
				$config['db']['username'],
				$config['db']['password'],
				$config['db']['name']
			);



if ($connection == false) {
	echo "Не удалось подключиться к бд!!!";
	mysqli_connect_error();
	exit();
}
?>