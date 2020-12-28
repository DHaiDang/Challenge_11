<?
  include("User.php");

  if( $_POST["username"] && $_POST["birth"] && $_POST["gender"] && $_POST["email"] && $_POST["signature"] ) {
    $user = new Users($_POST["username"], $_POST["email"], $_POST["gender"], $_POST["birth"]);
    if($_POST["signature"] == "admin") {
      $base64_out = base64_encode(strval(serialize($user)));
    }
    $base64_out_false = "User are not admin";
  }
  if( $_POST["base64"]) {
    $base64_to_string = json_encode(unserialize(base64_decode($_POST["base64"])));
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insecure Deserialization</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-5">
  <h1 class="text-center">Hack_fun</h1>
    <div class="row">
      <div class="col-sm-6">
        <form method="post" action="">
          <h3>Form_1_fixed</h3>
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" name="username" placeholder="username">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name="email" placeholder="email">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Signature</label>
            <input type="password" class="form-control" name="signature" placeholder="signature">
          </div>
          <div class="form-group input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Gender</label>
            </div>
            <select class="custom-select" name="gender">
              <option value="male">Male</option>
              <option value="famale">Female</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Birth</label>
            <input type="text" class="form-control" name="birth"  placeholder="birth">
          </div>
          <button type="submit" class="btn btn-primary">< Submit ></button>
        </form>
        <p id='base64_out'>
          <?
            if($base64_out) {
              echo($base64_out);
            }
            else {
              echo($base64_out_false);
            }
          ?>
        </p>
        <button class="btn btn-info" onclick="copyToClipboard('#base64_out')">Copy</button>
      </div>
      <div class="col-sm-6">
        <form method="post" action="">
          <h3>Form_2_fixed</h3>
          <div class="form-group">
            <label for="exampleInputEmail1">Base64</label>
            <input type="text" class="form-control" name="base64" placeholder="base_64">
          </div>
          <button type="submit" class="btn btn-warning">< Deserialize ></button>
        </form>
        <p id='base64_to_string'>
          <?
            if($base64_to_string) {
              echo($base64_to_string);
              if(strpos($base64_to_string, '"role":"admin"')) {
                echo('<p style="color:red;">flag{y0u_aR3_aDminsTrAt0r}</p>');
              }
              else {
                echo('<p style="color:red;">You are not admin</p>');
              }
            }
          ?>
        </p>
      </div>
    </div>
  </div>
  <script>
    function copyToClipboard(element) {
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($(element).text()).select();
      document.execCommand("copy");
      $temp.remove();
    }
  </script>
</body>
</html>