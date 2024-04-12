<?php
//--------------------------------------------- comando che connette al database---------------------------//
$host = "localhost";
$db = "candidature";
$user = "root";
$pass = "";
$dsn = "mysql:host=$host;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $user, $pass, $options);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastname = $_POST['lastName'];

    $city= $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $file = $_POST['file'];
   
    $errors = [];

//----------------------------------------------------Validation------------------------------------------------------------//
 /*    if (($name)) {
        $errors['name'] = 'Nome non può essere vuoto';
    }

    if (($surname)) {
        $errors['surname'] = 'Cognome non può essere vuoto';
    } */


    //------------------------------------- chiamata al database insrimento-------------------------------------------------//
    if (($errors)) {
        $stmt = $pdo->prepare("INSERT INTO candidature (firstName,lastName, city,state,zip,file) VALUES (:firstName,:lastName, :city,:state,:zip,:file)");
        $stmt->execute([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'city' => $city,
            'state' => $state,
            'zip' => $zip,
            'file' => $file,
        ]);
        echo "Dati inseriti con successo!";
       /*  header('Location: /w-1/d.3%20php/index2.php'); */
      /*   exit(); */
    } else {
        echo '<pre>' . print_r($errors, true) . '</pre>';
    }
}?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Example</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- Optional: Bootstrap Icons (for icons within Bootstrap) -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Navbar2</a>
    </div>
  </nav>

  <div class="container">
    <div class="logocandidati d-flex">
      <img src="/img/iknos2.png" alt="" style="width: 200px;" />
    </div>
    <form class="needs-validation" novalidate>
      <div class="row mb-3">
        <div class="col-md-4 position-relative">
          <label for="firstName" class="form-label">First name</label>
          <input type="text" class="form-control" id="firstName" name="firstName" required>
          <div class="valid-feedback">Looks good!</div>
        </div>
        <div class="col-md-4 position-relative">
          <label for="lastName" class="form-label">Last name</label>
          <input type="text" class="form-control" id="lastName" name="lastName" required>
          <div class="valid-feedback">Looks good!</div>
        </div>
        
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6 position-relative">
          <label for="city" class="form-label">City</label>
          <input type="text" class="form-control" id="city" name="city" required>
          <div class="invalid-feedback"></div>
        </div>
        <div class="col-md-3 position-relative">
          <label for="state" class="form-label">State</label>
          <input type="text" class="form-control" id="state" name="state" required>
          <div class="invalid-feedback"></div>
        </div>
        <div class="col-md-3 position-relative">
          <label for="zip" class="form-label">Zip</label>
          <input type="text" class="form-control" id="zip" name="zip" required>
          <div class="invalid-feedback"></div>
        </div>
      </div>
      <div class="position-relative mb-3">
        <label for="file" class="form-label">File</label>
        <input type="file" class="form-control" id="file" name="file" required>
        <div class="invalid-feedback"></div>
      </div>
      <!-- <div class="position-relative mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="terms" name="terms" required>
          <label class="form-check-label" for="terms">Agree to terms and conditions</label>
          <div class="invalid-feedback"></div>
        </div> -->
      </div>
      <button type="submit" class="btn btn-primary">Submit form</button>
    </form>
  </div>

  <!-- Bootstrap JS and Optional: Bootstrap Icons (for icons within Bootstrap) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
