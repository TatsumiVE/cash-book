<?php
require("../database.php");

$query=$conn->prepare("SELECT * FROM cash  where sid=? AND isactive=1");
$id=$_GET['id'];
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();

$row=mysqli_fetch_assoc($result);


$query=$conn->prepare("SELECT * FROM category where category_status=?");
$status=$_GET['status'];

$query->bind_param("i", $status);
$query->execute();
$results = $query->get_result();

require("../navbar.php");

?>


<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <form action="/update?id=<?=$row['sid']?>" method="post">
            <h3 class="mb-5">Update <?=$row['cash_status']===1? "Income":"Expense";?></h3>
            <div>
            <label for="date">Income:</label>
            <input type="date" id="date" name="date" value="<?=$row['createDate']?>" required>
          </div>
            
            <div class="form-outline mb-4">
              <input type="number" name="amount" id="amount" value="<?=$row['amount']?>" class="form-control form-control-lg" />
              <label class="form-label" for="amount">Amount</label>
            </div>
            <div class="dropdown">
            <label for="cars">Choose a category:</label>
            <select name="category" id="category">
            <?php while($category=mysqli_fetch_assoc($results)):?>
    
           <option value="<?= $category['cid'] ?>" <?=$row['cid']===$category['cid']? "selected":"";?>><?=$category['category_name'] ?></option>
              <?php endwhile;?>
</select>

</div>
          
            <div class="form-outline mb-4">
              <input type="text" name="description" id="description" class="form-control form-control-lg" value="<?=$row['detail']?>" />
              <label class="form-label" for="description">Description</label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit"><?=$row['cash_status']===1? "Income":"Expense";?></button>
            </form>
 
          </div>
        </div>
      </div>
    </div>
  </div>
</section>