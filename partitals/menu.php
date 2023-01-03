<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <?php 
            $sql = "SELECT * FROM danhmuc_info ";
            $result = mysqli_query($conn, $sql);
            ?>
            <?php 
            while($row = mysqli_fetch_array($result)) {
            ?>
         <ul class="main-nav nav navbar-nav">
                  <!-- <li class="active"><a href="/electro-master/index.php">Home</a></li> -->
        
                   <li><a href="danhsachhanghoa.php?category_id=<?php echo $row['id'] ?> "><?php echo $row['tendanhmuc'] ;?> &nbsp;</a></li>
                 
               </ul>
          <?php   
    }

        ?>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
</body>
</html>