<?php
$balance=0;

$currentDate=$currentDate = date('Y-m-d');
require("database.php");
if(!isset($_SESSION['user']['id'])){
  header("location:/login");
  exit;
}else{
$query=$conn->prepare("SELECT cash.*,category_name FROM cash LEFT JOIN category ON cash.cid=category.cid where cash.user_id=? AND cash.createDate=? AND cash.isactive=1");
$user_id=$_SESSION['user']['id'];

if(isset($_POST['date'])){
  $searchDate=$_POST['date'];
}elseif(isset($_GET['date'])){
  $searchDate=$_GET['date'];
}else{
  $searchDate=$currentDate;
}

$query->bind_param("is", $user_id,$searchDate);
$query->execute();
$result = $query->get_result();
$index=1;

}
require("navbar.php");
require('header.php');
?>



    <div class="container-fluid">
      <form action="/" method="POST">
      <div>
            <label for="date">Search Date:</label>
            <input type="date" id="date" name="date" value="<?=$searchDate?>" required>
          
          
          <button type="submit">Search</button>
</div>
      </form>
<h3>Date : <?= $searchDate?></h3> 
    <table class="table m-2">
      <thead class="table-primary">
        <tr>
           <th scope="col">#</th>
          <th scope="col">Date</th>
          <th scope="col">Category</th>
          <th scope="col">Description</th>
          <th scope="col">Cash_In</th>
          <th scope="col">Cash_Out</th>
          <th scope="col">Balance</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
   
      <?php while($rows=mysqli_fetch_assoc($result)):?>
        <tr>
          <th scope="row"><?=$index?></th>
          <td> <?= $rows['createDate']?></td>
          <td> <?= $rows['category_name']?></td>
          <td> <?= $rows['detail']?></td>
         <td><?= $rows['cash_status']===1? $rows['amount'] : '-'?></td> 
         <td><?= $rows['cash_status']===0? $rows['amount'] : '-'?></td> 
         <td>
          <?=
         $balance+= $rows['cash_status']===1? $rows['amount']: -$rows['amount']
         ?>
         </td> 
          <td><button type="button" class="btn btn-info"><a class="text-light" href="/edit?id=<?=$rows['sid']?>&status=<?=$rows['cash_status']?>">Edit</a></button></td>
          <td><button type="button" class="btn btn-danger"><a class="text-light" href="/delete?id=<?=$rows['sid']?>">Delete</a></button> </td>
        </tr>
        <?php $index++; ?>
        <?php endwhile;?>

      </tbody>
</table>
<div class="row position-absolute bottom-0 end-0">
<button type="button"  class="btn btn-primary btn-lg btn-floating me-2"  style="width: 5rem; height: 5rem">
  <a href="/income" class="text-light">Cash IN</a>
</button>
<button type="button" class="btn btn-danger btn-floating me-3" data-mdb-ripple-color="dark"  style="width: 5rem; height: 5rem">
<a href="/expense" class="text-light">Cash Out</a>
</button>
  
  

    </div>

</body>
</html>
