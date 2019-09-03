<?php
include("connection.php");
 $id=$_GET["id"];
 mysqli_query($conn,"UPDATE tbltasks SET status=1,date=CURRENT_TIME WHERE tid=$id");

?>
<script type="text/javascript">
window.location="todo.php";
</script>


