<?php
if (isset($_FILES["fileToUpload"])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  
  if ($uploadOk == 0) {
    $response = array("message" => "Sorry, your file was not uploaded.");
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $url = "http://localhost/uploads/" . basename($_FILES["fileToUpload"]["name"]);
      $response = array("message" => "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.", "url" => $url);
    } else {
      $response = array("message" => "Sorry, there was an error uploading your file.");
    }
  }
  
  echo json_encode($response);
}
?>
