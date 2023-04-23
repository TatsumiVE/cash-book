<?php

require("../database.php");

if (isset($_SESSION['user'])) {
  header('location: /');
  exit();
}


$errors = [];
if (isset($_POST['email']) && ($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (
    strlen($email) > 0 && filter_var($email, FILTER_VALIDATE_EMAIL)
    && strlen($password) > 0
  ) {
    $query = sprintf("SELECT * FROM user WHERE email = '%s'", mysqli_real_escape_string($conn, $email));

<<<<<<< HEAD
      $result = mysqli_query($conn, $query);
      if(!$result){
        $errors['body']= "Errors when select the data.";
      }else{
        $row = mysqli_fetch_assoc($result);
        if(!empty($row)){
          if(password_verify( $password,$row['password'])){
              
            login([
              'id' => $row['user_id'],
              'email' => $email,
              'name' => $row['username'],

            ]);
            header('location: /');
          
            exit();
          }else{
            $errors['body']= "Enter valid email and password.";
          }
        }else{
            $errors['body']= "Enter valid email and password.";
          }
      }
    }else{
      $errors['body'] = "Input field is required";
=======
    $result = mysqli_query($conn, $query);
    if (!$result) {
      $errors['body'] = "Errors when select the data.";
    } else {
      $row = mysqli_fetch_assoc($result);
      if (!empty($row)) {
        if (password_verify($password, $row['password'])) {
          var_dump($_SESSION);

          login([
            'id' => $row['user_id'],
            'email' => $email,
            'name' => $row['username'],
          ]);
          header('location: /');

          exit();
        } else {
          $errors['body'] = "Enter valid email and password.";
        }
      } else {
        $errors['body'] = "Enter valid email and password.";
      }
>>>>>>> c1167bf693b2525e74c3d2ef70382011873b14a2
    }
  } else {
    $errors['body'] = "Enter valid email and password.";
  }
<<<<<<< HEAD
 
=======
}
>>>>>>> c1167bf693b2525e74c3d2ef70382011873b14a2

?>


<?php require("../navbar.php"); ?>

<section class="vh-100 " style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <form method="post">
              <h3 class="mb-5">Sign in</h3>

<<<<<<< HEAD
            <div class="form-outline mb-4">
              <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" required />
              <label class="form-label" for="typeEmailX-2">Email</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" required/>
              <label class="form-label" for="typePasswordX-2">Password</label>
            </div>
=======
              <div class="form-outline mb-4">
                <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX-2">Email</label>
              </div>

              <div class="form-outline mb-4">
                <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX-2">Password</label>
              </div>
>>>>>>> c1167bf693b2525e74c3d2ef70382011873b14a2

              <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            </form>
            <?php if (!empty($errors)) : ?>
              <div class="text-center">
                <?= $errors['body'] ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
</body>

</html>