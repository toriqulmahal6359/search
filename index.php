<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <form class="form-horizontal" action="index.php" method="post">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label">Gender</label>
                        <input type="radio" name="gender" value="Male"/>Male
                        <input type="radio" name="gender" value="Female"/>Female
                        <input type="radio" name="gender" value="Any" checked="true"/>Any
                    </div>
                </div>
                <div class="form-group">     
                    <div class="col-md-12">
                    <label class="control-label">Course</label>
                        <select name="course" class="form-control">
                            <option value="B.A">B.A</option>
                            <option value="B.COM">B.COM</option>
                            <option value="B.Sc">B.SC</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                    <label class="control-label"></label>
                        <input type="submit" name="submit" class="btn btn-primary"/>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Course</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    include("inc/database.php");
                        $name = ""; 
                        $gender = ""; 
                        $course = ""; 

                    if(isset($_POST['submit'])){
                        $name = $_POST['name'];
                        $gender = $_POST['gender'];
                        $course = $_POST['course'];
                    }

                    if(!empty($name) || !empty($gender) || !empty($course) || !empty($name)){
                        $query = "SELECT * FROM records WHERE name='$name' OR gender='$gender' OR course='$course'";
                        $data = mysqli_query($conn, $query) or die(mysqli_error($conn));
                        if(mysqli_num_rows($data) > 0){
                            while($row = mysqli_fetch_assoc($data)){
                                $id = $row['id'];
                                $name = $row['name'];
                                $email = $row['email'];
                                $gender = $row['gender'];
                                $course = $row['course'];
                            ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $gender; ?></td>
                                <td><?php echo $course; ?></td>
                            </tr>
                        <?php 
                            } 
                        }else{
                            ?>
                            <tr>
                                <td>Records not found</td>
                            </tr>   
                    <?php }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>