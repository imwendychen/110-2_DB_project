<?php
// Create connection
$conn = mysqli_connect("localhost", "root", "", "dbproject");
$sql = "SELECT * FROM post WHERE Title LIKE '%".$_POST['name']."%'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		echo "	<tr>
		          <td>".$row['Title']."</td>;
				  <td><a href = ".$row['url']."><h2>go!</h2></td>;
		        </tr>";
		echo $row['url'];
	}
}
else{
	echo "<tr><td>0 result's found</td></tr>";
}
?>

<!-- <td><a href = ".$row['url']."><h6>go to post</h6></a></td>; -->