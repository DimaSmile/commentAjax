<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" /><!-- Style -->	

<?php 
function select1111(){
	require 'db.php';

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
	}
?>

<form  method="POST" class="list" >
	<textarea name="text" id="text" cols="30" rows="10" class="textcom" autofocus
>
		
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

<!-- jQuery AJAX -->
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
				 	 }
				});	
		})
	});
</script>

