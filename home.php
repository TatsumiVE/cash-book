<?php
<<<<<<< HEAD
$balance=0;
$income=0;
$expense=0;
date_default_timezone_set('Asia/Yangon');
$currentDate=$currentDate = date('Y-m-d');
require("database.php");

if(!isset($_SESSION['user']['id'])){
=======
$balance = 0;

$currentDate = $currentDate = date('Y-m-d');
require("database.php");
if (!isset($_SESSION['user']['id'])) {
>>>>>>> c1167bf693b2525e74c3d2ef70382011873b14a2
  header("location:/login");
  exit;
} else {
  $query = $conn->prepare("SELECT cash.*,category_name FROM cash LEFT JOIN category ON cash.cid=category.cid where cash.user_id=? AND cash.createDate=? AND cash.isactive=1");
  $user_id = $_SESSION['user']['id'];

  if (isset($_POST['date'])) {
    $searchDate = $_POST['date'];
  } elseif (isset($_GET['date'])) {
    $searchDate = $_GET['date'];
  } else {
    $searchDate = $currentDate;
  }

  $query->bind_param("is", $user_id, $searchDate);
  $query->execute();
  $result = $query->get_result();
  $index = 1;
}
require("navbar.php");
<<<<<<< HEAD

?>
    <div class="container-fluid">
      <div class="d-flex flex-row justify-content-between m-3">
      <h4>Date : <?= $searchDate?></h4> 
      <form action="/" method="POST" class="d-block">
      <div>
            <label for="date" class="fs-5 fw-bold">Search Date :</label>
            <input type="date" id="date" name="date" value="<?=$searchDate?>" required>
          
          
          <button type="submit" class="bg-primary text-center text-light border-0 outline-0" style="width:4rem;height:2rem">Search</button>
</div>
      </form>
  
      </div>
   

<?php   if($result->num_rows >0):?>
    <table class="table m-2 text-center">
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
         <td><?= $rows['cash_status']===1? $rows['amount'] : '-'?><?php $rows['cash_status']===1? $income+=$rows['amount']  : '' ?></td> 
         <td><?= $rows['cash_status']===0? $rows['amount'] : '-'?><?php $rows['cash_status']===0? $expense+=$rows['amount']  : '' ?></td> 
         <td>
          <?=
         $balance+= $rows['cash_status']===1? $rows['amount']: -$rows['amount']
         ?>
         </td> 
          <td><a href="/edit?id=<?=$rows['sid']?>&status=<?=$rows['cash_status']?>"  class="text-light btn btn-info" >Edit</a></td>
          <td><a  href="/delete?id=<?=$rows['sid']?>" class="text-light btn btn-danger">Delete</a></button> </td>
        </tr>
        <?php $index++; ?>
        <?php endwhile;?>
        <tfoot>
          <td colspan="4" class="text-center">Total</td>
          <td><?=$income?></td>
          <td><?=$expense?></td>
          <td><?=$balance?></td>
          <td></td>
          <td></td>
          
        </tfoot>
        <?php else:?>
          <div class="m-5 text-center  text-primary">
          <h1>Data is not record in <?=$searchDate?></h1>
          
          </div>
         
          <?php endif;?>
      </tbody>
</table>
<div class="row position-absolute bottom-0 end-0">
<a href="/income" class="text-light">
<button type="button"  class="btn btn-primary btn-lg btn-floating m-1"  style="width: 5rem; height: 5rem">
 Cash IN
</button>
</a>
<a href="/expense" class="text-light">
<button type="button" class="btn btn-danger btn-floating m-1" data-mdb-ripple-color="dark"  style="width: 5rem; height: 5rem">
Cash Out
</button>
</a>
  
=======
?>



<div class="container-fluid bg-light" style="padding-top: 100px">
  <form action="/" method="POST">
    <div>
      <label for="date">Search Date:</label>
      <input type="date" id="date" name="date" value="<?= $searchDate ?>" required>


      <button type="submit" class="btn btn-success">Search</button>
    </div>
  </form>
  <h3>Date : <?= $searchDate ?></h3>
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

      <?php while ($rows = mysqli_fetch_assoc($result)) : ?>
        <tr>
          <th scope="row"><?= $index ?></th>
          <td> <?= $rows['createDate'] ?></td>
          <td> <?= $rows['category_name'] ?></td>
          <td> <?= $rows['detail'] ?></td>
          <td><?= $rows['cash_status'] === 1 ? $rows['amount'] : '-' ?></td>
          <td><?= $rows['cash_status'] === 0 ? $rows['amount'] : '-' ?></td>
          <td>
            <?=
            $balance += $rows['cash_status'] === 1 ? $rows['amount'] : -$rows['amount']
            ?>
          </td>
          <td><button type="button" class="btn btn-info"><a class="text-light" href="/edit?id=<?= $rows['sid'] ?>&status=<?= $rows['cash_status'] ?>">Edit</a></button></td>
          <td><button type="button" class="btn btn-danger"><a class="text-light" href="/delete?id=<?= $rows['sid'] ?>">Delete</a></button> </td>
        </tr>
        <?php $index++; ?>
      <?php endwhile; ?>

    </tbody>
  </table>
  <div class="row position-absolute" style="bottom: 50px; right: 50px">
    <button type="button" class="btn btn-primary btn-lg btn-floating" style="width: 5rem; height: 5rem; margin-right: 25px">
      <a href="/income" class="text-light">Cash IN</a>
    </button>
    <button type="button" class="btn btn-danger btn-lg btn-floating" data-mdb-ripple-color="dark" style="width: 5rem; height: 5rem">
      <a href="/expense" class="text-light">Cash Out</a>
    </button>
>>>>>>> c1167bf693b2525e74c3d2ef70382011873b14a2



  </div>

  </body>

  </html>