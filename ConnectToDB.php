<!DOCTYPE html>
<html>
<body>
<head>
<title>View</title>
	<link rel="stylesheet" type="text/css" href="Login.css">
        <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>

<?php
ini_set('display_errors', 1);

?>

<?php


if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     echo '<p>The DB exists</p>';
     echo getenv("dbname");
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
        "host=

ec2-52-200-48-116.compute-1.amazonaws.com
;port=5432;user=hzxvtahusyfeii;password=0ec932d437daae6077be3cfbf510fc7b03c0de67d7fa93bbcf8f560d65ea9c51;dbname=dasohfkqs080jg",
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  

$sql = "SELECT * FROM product";
$stmt = $pdo->prepare($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$resultSet = $stmt->fetchAll();
echo '<p>productinformation:</p>';

?>
	

</body>
<div id="container">
<table class="table table-bordered table-condensed">
    <thead>
      <tr>
        <th>product ID</th>
        <th>product name</th>
        <th>size</th>
        <th>basicprice</th>
        <th>residual</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // tạo vòng lặp 
         //while($r = mysql_fetch_array($result)){
             foreach ($resultSet as $row) {
      ?>
   
      <tr>
        <td scope="row"><?php echo $row['productid'] ?></td>
        <td><?php echo $row['productname'] ?></td>
        <td><?php echo $row['size'] ?></td>
        <td><?php echo $row['basicprice'] ?></td>
        <td><?php echo $row['residual'] ?></td>
        
      </tr>
     
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
