


<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://kit.fontawesome.com/c1963ffa07.js"></script>
  <title>To do</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body class="bg-info">
<?php
  include ("connection.php");
  
if(isset($_POST["Submit"]))
{
  $tname=$_POST["txtTask"];
  
  mysqli_query($conn,"INSERT INTO tbltasks(tname,date,status) VALUES('$tname',CURRENT_TIME,0)");
}
/*if(isset($_POST["btnTodo"]))
{

  $tid=$_POST["hiddenField"];
echo $tid;
  mysqli_query($conn,"UPDATE tbltasks SET status=1,date=CURRENT_TIME WHERE tid=$tid");
}
if(isset($_POST["btnDone"]))
{
 
  $tid=$_POST["hiddenField2"];
  mysqli_query($conn,"UPDATE tbltasks SET status=0,date=CURRENT_TIME WHERE tid=$tid");
}*/
?>
<form name="frmTodo" action="todo.php" method="post">
  <div class="container ">
  <div class="row">
    <div class="col">
      <h1 class="mb5 text-center text-white">My Plans</h1>
    </div>
  </div>
  <div class="row">
    <div class="col">
      
        <div class="input-group mb-3">
        <input type="text" name="txtTask" class="form-control" placeholder="Enter task to do..">
        <div class="input-group-append">
        <button class="btn btn-primary" type="submit" name="Submit" id="btnAdd">Add Task</button>
        </div>
        </div>
     
    </div>
  </div>
  <div class="row">
    <div class="col">
      <h4 class="mb3 text-light">TO DO</h4>
      <ul class="list-group">

      <?php
        $qry2=mysqli_query($conn,"SELECT tid,tname,date,status FROM tbltasks WHERE status=0 ORDER BY date DESC");
        if(mysqli_num_rows($qry2)>0)
        {
	        while($row=mysqli_fetch_array($qry2))
	        {
      ?>

       <li class="list-group-item">
       <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1"><?php echo $row['tname']; ?></h5>
        <button class="btn" type="submit" id="btnTodo" name="btnTodo" ><a href="update.php?id=<?php echo $row['tid'];?>"><i class="far fa-check-circle"></i></a></button>
       </div>
        <small class="text-secondary"><?php echo $row['date']; ?></small>
        </li>
       <?php }} ?>
      </ul>
    </div>
    <div class="col">
      <h4 class="mb3 text-light">DONE</h4>
       <ul class="list-group">

       <?php
        $qry3=mysqli_query($conn,"SELECT tid,tname,date,status FROM tbltasks WHERE status=1 ORDER BY date DESC");
        if(mysqli_num_rows($qry3)>0)
        {
	        while($row=mysqli_fetch_array($qry3))
	        {
      ?>

      <li class="list-group-item">
       <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1"><?php echo $row['tname']; ?></h5>
        <button class="btn" type="submit" id="btnDone" name="btnDone" ><a href="update2.php?id=<?php echo $row['tid'];?>"><i class="fas fa-check-circle"></i></a></button>
      </div>
        <small class="text-secondary"><?php echo $row['date']; ?></small>
        </li>
        <?php }} ?>
        </ul>
    </div>
  </div>
  </div>
</div>
</form>
</body>
</html>