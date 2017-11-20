	<?php

function select($lastId){
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

	$result = mysqli_query($connection, "SELECT `comment` FROM `comments` WHERE id = '$lastId'");
	//$result = mysqli_query($connection, "SELECT `comment` FROM `comments` ");
		if ($result) {
                $data = array();
                while ($row = mysqli_fetch_array($result))
                {
                    array_push($data, $row);
                }
                mysqli_free_result($result);
                echo json_encode($data);
            } else {
                throw new Exception("Can't execute get country method.");
            }     
	/*echo $comments;*/

	
				
}

test();
			 function test() {
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
				$value = $_POST['name'];
				mysqli_query($connection, "INSERT INTO `comments`(`comment`) VALUES ( '$value')");

				$lastId = mysqli_insert_id($connection); //последний id поля комментариев


				
				select($lastId);	
			}
 ?>