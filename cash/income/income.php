<?php
require("../database.php");
$currentDate = $currentDate = date('Y-m-d');
if (!isset($_SESSION['user']['id'])) {
  header("location:/login");
  exit;
} else {
  $query = $conn->prepare("SELECT * FROM  category  where category_status=1");

  $query->execute();
  $result = $query->get_result();

<<<<<<< HEAD
require("../header.php");
=======
  require("../header.php");
  require("../navbar.php");
>>>>>>> c1167bf693b2525e74c3d2ef70382011873b14a2
}

?>

<section class="vh-100 pt-5 bg-primary">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <form action="income/create" method="post">
              <h3 class="mb-5">Income</h3>
              <div class="text-start mb-4">
                <label for="date">Date :</label>
                <input type="date" id="date" name="date" class="ms-1" required>
              </div>

              <div class="form-outline mb-4">
                <input type="number" name="amount" id="amount" class="form-control form-control-lg" />
                <label class="form-label" for="amount">Amount</label>
              </div>
              <div class="text-start mb-4">
                <label for="cars">Choose a category:</label>

<<<<<<< HEAD
            </div>
          
            <div class="form-outline mb-4">
              <input type="text" name="description" id="description" class="form-control form-control-lg" />
              <label class="form-label" for="description">Description</label>
            </div>
            <div class="d-flex justify-content-between">
            <a href="/" class="btn btn-warning btn-lg text-center text-decoration-none text-light">Cancel</a>
            <button class="btn btn-primary btn-lg" type="submit">Income</button>
            </div>
=======
                <select name="category" id="category" class="ms-1">
                  <?php while ($rows = mysqli_fetch_assoc($result)) : ?>
                    <option value="<?= $rows['cid'] ?>"><?= $rows['category_name'] ?></option>
                  <?php endwhile; ?>
                </select>

              </div>

              <div class="form-outline mb-4">
                <input type="text" name="description" id="description" class="form-control form-control-lg" />
                <label class="form-label" for="description">Description</label>
              </div>

              <button class="btn btn-primary btn-lg btn-block" type="submit">Income</button>
>>>>>>> c1167bf693b2525e74c3d2ef70382011873b14a2
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>