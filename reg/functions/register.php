<?php

  require_once('../config/dbconf2.php');

  $db = new db();

  if($_POST['cpassword'] != $_POST['password']) {
    exit("<div class='alert alert-danger'><strong>Failed !</strong> Passwords Missmatch !</div>");
  }

  // Get POST data and validate.
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = validateInput($_POST['username']);
    $email = validateInput($_POST['email']);
    $password = validateInput($_POST['password']);
  }

  if (!isset($username) || !is_string($username))
    throw new InvalidArgumentException("Username is invalid or empty.");

  if (!isset($password) || !is_string($password))
    throw new InvalidArgumentException("Password is invalid or empty.");

  if (!isset($email))
    throw new InvalidArgumentException("Email is empty.");

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<div class='alert alert-danger'><strong>Failed !</strong> Invalid Email !</div>";
    return;
  }

  try {

    // First, we need to check if the account name already exists.
    $accountCheckQuery = "SELECT * FROM account WHERE username = ?";
    $accountCheckParams = array($username);

    $results = $db->queryMultiRow($accountCheckQuery, $accountCheckParams);

    if ($db->getRowCount($results) > 0) {

      // Account already exists, inform user and stop transaction.
      echo "<div class='alert alert-danger'><strong>Failed !</strong> Account already exist !</div>";

      // Close connection to the database.
      $db->close();

      return;
    }

    // If no account exists, create a new one.

    // Get the SHA1 encrypted password.
    list($salt, $verifier) = $db->getRegistrationData($username, $password);

    $accountCreateQuery = "INSERT INTO account(username, salt, verifier, email) VALUES(?, ?, ?, ?)";
    $accountCreateParams = array($username, $salt, $verifier, $email);

    // Execute the query.
    $db->insertQuery($accountCreateQuery, $accountCreateParams);

    // Close connection to the database.
    $db->close();

    // Return successful to AJAX call.
    echo "<div class='alert alert-success'><strong>Success !</strong> Account has been created !</div>";

  }
  catch(PDOException $e) {
    echo "<div class='alert alert-danger'><strong>Failed !</strong> An unknown PDO Error has occured !</div>";
    error_log("PDO Database error occurred: " . $e->getMessage());
  }
  catch (Exception $e) {
    echo "<div class='alert alert-danger'><strong>Failed !</strong> An unknown PDO Error has occured !</div>";
    error_log("Unknown error occurred: " . $e->getMessage());
  }

  // Validates POST input data.
  function validateInput($param) {
    $param = trim($param);
    $param = stripslashes($param);
    $param = htmlspecialchars($param);

    return $param;
  }
