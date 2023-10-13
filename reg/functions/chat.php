<?php
include("../config/dbconf1.php");
$stmt = $conn->prepare("SELECT * FROM shoutchat ORDER BY id");
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['ip'] == $_SERVER['REMOTE_ADDR']) {
      echo "<div class='msg-bar'>";
      echo "<div class='msg-you'>".$row['message']."</div>";
      echo "</div>";
    }else{
      echo "<div class='msg-bar'>";
      echo "<div class='msg-friend'>".$row['message']."</div>";
      echo "</div>";
    }
  }
}
?>
