<?php
if (isset($_POST['bio_form'])) {
    // Connection variables
    $servername = "lrgs.ftsm.ukm.my";
    $username = "a150854";
    $password = "a150854";
    $dbname = "a150854";

    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "assigment2";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO biodata(name,age,sex,address,email,dob,height,phone,color,fbtwig,univ) VALUES (:name,:age,:sex,:address,:email,:dob,:height,:phone,:color,:fbtwig,:univ)");
        // Bind the parameters
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);
        $stmt->bindParam(':sex', $sex, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':dob', $dob, PDO::PARAM_STR);
        $stmt->bindParam(':height', $height, PDO::PARAM_INT);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':color', $color, PDO::PARAM_STR);
        $stmt->bindParam(':fbtwig', $fbtwig, PDO::PARAM_STR);
        $stmt->bindParam(':univ', $univ, PDO::PARAM_STR);
        // insert a row
        $name = $_POST['name'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $height = $_POST['height'];
        $phone = $_POST['phone'];
        $color = $_POST['color'];
        $fbtwig = $_POST['fbtwig'];
        $univ = $_POST['univ'];
        $stmt->execute();

  ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-offset-1 col-xs-10"> <start <!-- start col-lg-8 -->
          <div id='alert'  class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Success !</strong>Record of <?php echo $name ?> has been added
        </div>
      </div>
    </div>
    <?php }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
$conn = null;
}
?>

<?php
$univ = array
  (
  array("name"=>"Universiti Putra Malaysia","abb"=>"UPM"),
  array("name"=>"Universiti Kebangsaan Malaysia","abb"=>"UKM"),
  array("name"=>"Universiti Teknologi Malaysia","abb"=>"UTM"),
  array("name"=>"Universiti Sains Malaysia","abb"=>"USM"),
  array("name"=>"Universiti Malaysia","abb"=>"UM")
  // insert other universities here
  );
 ?>
<!-- data univ -->

<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <!-- Bootstrap -->
       <link href="css/bootstrap.min.css" rel="stylesheet">
       <link href="css/style.css" rel="stylesheet">

       <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
       <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
       <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
         <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
       <![endif]-->
   <title>Biodata</title>

</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
              <div class="col-xs-offset-1 col-xs-10">
                <form action="form.php" method="post">
                    <h1>Biodata Form</h1>
                        <hr>
                    <div class="panel panel-default">
                        <div class="panel-heading">

                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Name:</label>
                                            <input type="text" name="name" class="form-control" placeholder="Insert your name"  autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Age:</label>
                                            <input type="number" name="age" class="form-control" min="0" max="100" step="1">
                                    </div>
                                    <div class="form-group">
                                        <label>Sex:</label>
                                            <div class="radio">
                                                <label>
                                            <input type="radio" name="sex" id="male" value="male">Male<br>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                            <input type="radio" name="sex" id="female" value="female">Female<br>
                                                </label>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address:</label>
                                            <td><textarea name="address" class="form-control" cols="50" rows="5" placeholder="Insert your address"></textarea></td>
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                            <td><input type="email" class="form-control" name="email" placeholder="Insert your email"></td>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                          <div class="form-group">
                                              <label>Date of Birth:</label>
                                                  <td><input type="date" class="form-control" name="dob"></td>
                                          </div>
                                        <div class="form-group">
                                            <label>Height(cm):</label>
                                                <td><input type="range" name="height"  id="heightId" min = "100" max = "200" value = "150" oninput="outputId.value = heightId.value">
                                                    <output id="outputId">150</output></td>
                                        </div>
                                        <div class="form-group">
                                            <label>Tel:</label>
                                                <td><input type="tel" class="form-control" name="phone" pattern="\+60\d{2}-\d{7}" placeholder="+60##-#######"></td>
                                        </div>
                                        <div class="form-group">
                                            <label>My Favourite Color:</label>
                                                <td><input type="color" class="form-control" name="color"></td>
                                        </div>
                                        <div class="form-group">
                                            <label>FB/TW/IG:</label>
                                                <td><input type="url" name="fbtwig" class="form-control" placeholder="Insert the URL"></td>
                                        </div>
                                        <div class="form-group">
                                            <label>My University:</label>
                                                <td>
                                                    <select name="univ" class="form-control">
                                                        <option value="" selected>Select</option>
                                                        <?php
                                                        foreach ($univ as $u) {
                                                            echo "<option value=".$u['abb'].">".$u['name']."</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            <input type="hidden" name="matricnum" value="a150854">
                            <button type="submit" id="submit" name="bio_form" value="send" class="btn btn-danger btn-lg btn-block">Submit My Biodata</button>
                            <button type="reset" class="btn btn-warning btn-lg btn-block">Reset</button>
                </form>
            </div>
        </div>
    </div>
  </div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
