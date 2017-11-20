<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<style>
.item{
	margin: 0;
}
</style>
<?php 
function select1111(){
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

	$result = mysqli_query($connection, "SELECT `comment` FROM `comments` ORDER BY `id` DESC ");
		if ($result) {
                $data = array();
                while ($row = mysqli_fetch_array($result))
                {
                    array_push($data, $row);
                }
                mysqli_free_result($result);
               return $data;
            } else {
                throw new Exception("Can't execute get country method.");
            }     
	/*echo $comments;*/

	
				
}
?>

<form  method="POST" class="list" style=>
	<textarea name="text" id="text" cols="30" rows="10" class="textcom">
		
	</textarea><br>
	<button type="submit" name="submit" id="submit">Отправить</button>
</form>

<div>
	<p class="item"></p>
	<?php
		$arrayComments = array();
		$arrayComments = select1111();
		foreach ($arrayComments as $value) {
			echo "<p class='item'>".$value['comment']."</p><br>";
		}
		

	?>
</div>
<script type="text/javascript">


	jQuery(document).ready(function(){
		jQuery('#submit').click(function(e){
		
		var value = $("#text").val();

        e.preventDefault();

			
			$.ajax({
				  type: "POST",
				  url: "ajax.php",
				  data: {name:value},

				  success: function(msg){
				 
				    	//console.log(msg);
				    
				    	var event = JSON.parse(msg, function(key, value) {
							  if (key == 'date') return new Date(value);
							  return value;
							});
				    
					    	 $(".item:first").prepend("<p class='item'>" + event[0].comment + "</p>");
					    	 $(".textcom").val(' ');
				    	 //$(".item").val(msg['comment']);
				
				  }
});
				
				
		})
	});
	</script>

