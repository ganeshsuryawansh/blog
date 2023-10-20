<?php
include 'include/dbconnect.php';
error_reporting(E_ALL ^ E_NOTICE);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
        

        .leftside {
            background-color: dimgrey;
            color: white;
        }
    </style>

</head>

<body id="body">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Blog Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <div class="">

        <div class="row">
            <div class="col-2 leftside text-center">
                <h4 class="my-5">Category</h4>
                <hr>
                <h4>Users</h4>
                <hr>
                <h4>Blogs</h4>
            </div>
            <div class="col my-5 mr-10">
                <h4>Add new post</h4>

                <form action="admin.php" method="POST" enctype="multipart/form-data">


                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">POST TITLE</label>
                        <input type="text" class="form-control" name="postname" id="" aria-describedby="emailHelp" required>
                    </div>

                    <label for="exampleInput" class="form-label">FIRST PARAGRAPH</label>
                    <div class="form-floating">
                        <textarea class="form-control" name="posttext" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
                    </div>

                    <label for="exampleInput" class="form-label">SECOND PARAGRAPH</label>
                    <div class="form-floating">
                        <textarea class="form-control" name="posttext2" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    </div>

                    <label for="exampleInput" class="form-label">THIRD PARAGRAPH</label>
                    <div class="form-floating">
                        <textarea class="form-control" name="posttext3" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    </div>


                    <div class="mb-3">
                        <label for="number" class="form-label">POST IMAGE</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="number" class="form-label">POST SECOND IMAGE</label>
                        <input type="file" accept="jpeg/png/JPEG/JPG" name="postimg2" class="form-control" id="">
                    </div>

                    <div class="mb-3">
                        <label for="number" class="form-label">POST THIRD IMAGE</label>
                        <input type="file" accept="jpeg/png/JPEG/JPG" name="postimg3" class="form-control" id="">
                    </div>
                    

                    <div class="mb-3">
                        <label for="text" class="form-label">POST CATEGORY</label>

                        <p><b>Categoris with Category id:</b><?php getcategory(); ?>
                        <input type="number" class="form-control" name="postcat" id="" aria-describedby="emailHelp" required>
                    </div>

                    <div class="mb-3">
                        <label for="text" class="form-label">ADD NEW CATEGORY</label>
                        <input type="text" class="form-control" name="newcat" id="" aria-describedby="emailHelp" >
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary" >Submit</button>
                    
                </form>
                <hr>
                <div>
                    <h4>All Blog Posts</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sr.no</th>
                                <th scope="col">Post name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Date</th>
                                <th scope="col">Remove Posts</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php all_blog_posts(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
    <script>
        function deletepost(postid){
            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "admin.php?remov="+postid, true);
            xmlhttp.send();

            alert("Blog Post Detele Where POST ID ="+postid);
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
<?php


$title = $_POST["postname"];

//first image upload
if($title){
    global $newImageName;
    $image =$_FILES['file']['name']; 
    $imageArr=explode('.',$image); //first index is file name and second index file type

    //$rand = rand(10000,99999);
    //$newImageName =$imageArr[0].$rand.'.'.$imageArr[1];
    $newImageName =$imageArr[0].''.$imageArr[1];

    $uploadPath="images/".$newImageName;
    $isUploaded =move_uploaded_file($_FILES["file"]["tmp_name"],$uploadPath);
    
    if($isUploaded){
        //echo 'successfully file uploaded';
    }
    else{
        echo 'First Image Not Uploded';
    }
}

//second image upload
if($title){
    global $newImageName2;
    $image =$_FILES['postimg2']['name']; 
    $imageArr=explode('.',$image); //first index is file name and second index file type

    //$rand=rand(10000,99999);
    //$newImageName2 =$imageArr[0].$rand.'.'.$imageArr[1];
    $newImageName2 =$imageArr[0].''.$imageArr[1];

    $uploadPath="images/".$newImageName2;
    $isUploaded =move_uploaded_file($_FILES["postimg2"]["tmp_name"],$uploadPath);
    
    if($isUploaded){
        //echo 'successfully file uploaded';
    }
    else{
        echo 'Second Image Not Uploded';
    }
}

//Third image upload
if($title){
    global $newImageName3;
    $image =$_FILES['postimg3']['name']; 
    $imageArr=explode('.',$image); //first index is file name and second index file type

    //$rand=rand(10000,99999);
    //$newImageName3 =$imageArr[0].$rand.'.'.$imageArr[1];
    $newImageName3 =$imageArr[0].''.$imageArr[1];

    $uploadPath="images/".$newImageName3;
    $isUploaded =move_uploaded_file($_FILES["postimg3"]["tmp_name"],$uploadPath);
    
    if($isUploaded){
        //echo 'successfully file uploaded';
    }
    else{
        echo 'Third Image Not Uploded';
    }
}

//insert blog data into database
if(isset($_POST["submit"]))
{
    if (!$title == "") {
        global $newImageName;
        $text = $_POST["posttext"];
        $text2 = $_POST["posttext2"];
        $text3 = $_POST["posttext3"];
    
        $cate = $_POST["postcat"];
        //these emailid comes from main webise admin id or email id.
        $email1 = "ganesh@gmail.com";
    
        $data = $conn->prepare("INSERT INTO `blog_posts` (`post_title`, `post_content`, `post_content2`,`post_content3`,`post_image`,`post_image2`,`post_image3`,`emailid`, `post_cat`,`date`) VALUES (?, ?, ?,?,?,?,?,?, ?, current_timestamp())");
        $data->execute(array($title, $text, $text2, $text3, $newImageName, $newImageName2, $newImageName3, $email1, $cate));
        
        $newcat = $_POST["newcat"];
        if($newcat){
            $data = $conn->prepare("INSERT INTO `blog_post_category` (`post_cat_name`) VALUES (?)");
            $data->execute(array($newcat));
        }
    
        if ($data) {
            //echo (" \n Blog Post Succesfully Submited");
        }
        
        
    
    } else {
        //echo (" \n Do not insert blank data");
    }
}


//function to show category
function show_category($catid){
    global $conn;

    $qer = " SELECT * FROM blog_post_category WHERE post_cat_id = $catid";
    $smt = $conn->prepare($qer);
    $smt->execute();
    $datas = $smt->fetchAll();

    foreach ($datas as $data) {
        echo($data['post_cat_name']);
    }
}

//show all blog posts.
function all_blog_posts(){
    global $conn;
    $qr = "SELECT * FROM blog_posts";
    $stmt = $conn->prepare($qr);
    $stmt->execute();
    $results = $stmt->fetchAll();
    $postcnt = 0;
    foreach ($results as $result) {
        $postcnt = $postcnt+1;
        $name = $result['post_content'];
        $small = substr($name, 0, 100);
        $date = $result['date'];
        $catid = $result['post_cat'];
        $postid = $result['post_id'];
        ?>
        <tr>
            <th scope="row"><?php echo($postcnt);?></th>
            <td><?php echo($small);?></td>
            <td><?php show_category($catid) ?></td>
            <td><?php echo($date); ?></td>
            <td><button class="btn btn-danger" onclick="deletepost(<?php echo($postid);?>)">Delete</button></td>
        </tr>
        <?php
    }
}


//save post with user the Id
$postid = $_GET['remov'];//post id this post is1 remove.
if (isset($postid)) {
    global $conn;
    $data = $conn->prepare("DELETE FROM blog_posts WHERE post_id = $postid");
    $data->execute();
}

//fetch all categories from db
function getcategory(){
    global $conn;
    $q = $conn->prepare(" SELECT * FROM blog_post_category");
    $q->execute();
    $results = $q->fetchAll();
    foreach ($results as $result) {
    echo("   ".$result['post_cat_id'].".".$result['post_cat_name']."   ");
    }
}
?>