	<?php

function select($lastId){
	require 'db.php';

	$result = mysqli_query($connection, "SELECT `comment` FROM `comments` WHERE id = '$lastId'");
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
			
}

test();
			 function test() {
					require 'db.php';
				$value = $_POST['name'];
				mysqli_query($connection, "INSERT INTO `comments`(`comment`) VALUES ( '$value')");

				$lastId = mysqli_insert_id($connection); //последний id поля комментариев

				select($lastId);	
			}
 ?>