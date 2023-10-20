<?php

// all index.php nedded functions here.

//function to show share and reposrt of dropdown.
//value="https://lannister.deals2buy.in/blogs.php?poid=217 "

function dropdown_for_share($postid){
?>
<input class="focus:outline-none h-0 invisible hidden" type="text"
    value="https://lannister.deals2buy.in/blogs.php?poid=<?php echo($postid); ?> " id="myInput">

<div class="dropdown pt-3">

    <button class="focus:outline-none" type="button" data-bs-toggle="dropdown" aria-expanded="">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path
                d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" />
        </svg>
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">post id <?php echo($postid);?></a></li>
        
        <li>
            <a href="#" data-toggle="modal" data-target="#confirm-share<?php echo($postid);?>">Share
            </a>
        </li>
        <li><a class="dropdown-item" href="#">Report</a></li>

    </ul>
</div>



<div class="modal fade" id="confirm-share<?php echo($postid);?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content rounded-lg">
            <div class="modal-header">
                <h5 class="modal-title text-3xl">Where would you like to share?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row d-flex flex-col align-items-center w-100 mx-auto">

                    <div class="d-flex flex-row space-x-8 justify-center w-100">
                        <a href="https://api.whatsapp.com/send?text=<?php echo("https://lannister.deals2buy.in/blogs?poid=".$postid);  ?> "
                            data-action="share/whatsapp/share">
                            <img src="./assets/img/social_icons/logo-Whatsapp.png" alt="">
                            W
                        </a>
                        <a target="_blank"
                            href="http://www.facebook.com/sharer.php?u=<?php echo("https://lannister.deals2buy.in/blogs?poid=".$postid); ?> "
                            <img src="./assets/img/social_icons/logo-Facebook.png" alt="">
                            F
                        </a>
                        <a target="_blank"
                            href="http://twitter.com/share?url=<?php echo("https://lannister.deals2buy.in/blogs?poid=".$postid); ?> ">
                            <img src="./assets/img/social_icons/logo-Twitter.png" alt="">
                            T
                        </a>
                        <a target="_blank"
                            href="http://pinterest.com/pin/create/button/?url=<?php echo("https://lannister.deals2buy.in/blogs?poid=".$postid); ?> ">
                            <img src="./assets/img/social_icons/logo-Pinterest.png" alt="">
                            P
                        </a>
                        <a target="_blank"
                            href="https://telegram.me/share/url?url=<?php echo("https://lannister.deals2buy.in/blogs?poid=".$postid);?> ">
                            <img src="./assets/img/social_icons/logo-Telegram.png" alt="">
                            Tg
                        </a>
                    </div>

                    <div>
                        <h5 class="text-bold text-2xl mt-4">
                            <?php echo("https://lannister.deals2buy.in/blogs?poid=".$postid); ?>
                        </h5>
                    </div>
                    <input type="text" name="" placeholder="<?php echo("https://lannister.deals2buy.in/blogs?poid=".$postid); ?>"
                        class="w-100 p-3 my-3 rounded border rounded-r-none text-[#7C7C7C]" id="myInput">
                </div>
            </div>
        </div>
    </div>
</div>



<?php
}

function dropdown_for_share_desktop($postid){
    ?>
    <input class="focus:outline-none h-0 invisible hidden" type="text"
        value="https://lannister.deals2buy.in/blogs.php?poid=<?php echo($postid); ?> " id="myInput">
    
    <div class="dropdown pt-3">
    
        <button class="focus:outline-none" type="button" data-bs-toggle="dropdown" aria-expanded="">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                <path
                    d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" />
            </svg>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">post id <?php echo($postid);?></a></li>
            <!---
            <li><button class="focus:outline-none ml-3" id="copyTextBtn" onclick="copy_post_link()">Share</button></li>
            --->
            <li><button type="button" class="" data-toggle="modal33" data-target="#exampleModalCenter33">
                  Share
                </button>
            </li>
            <li><a class="dropdown-item" href="#">Report</a></li>
        </ul>
    </div>
    
    
    <!---
    <div class="modal fade" id="confirm-share" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content rounded-lg">
                <div class="modal-header">
                    <h5 class="modal-title text-3xl">Where would you like to share?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex flex-col align-items-center w-100 mx-auto">
    
                        <div class="d-flex flex-row space-x-8 justify-center w-100">
                            <a href="https://api.whatsapp.com/send?text=<?php echo isset($baseUrl) ? rawurlencode($baseUrl) : "" ?> "
                                data-action="share/whatsapp/share">
                                <img src="./assets/img/social_icons/logo-Whatsapp.png" alt="">
                            </a>
                            <a target="_blank"
                                href="http://www.facebook.com/sharer.php?u=<?php echo isset($baseUrl) ? rawurlencode($baseUrl) : "" ?>">
                                <img src="./assets/img/social_icons/logo-Facebook.png" alt="">
                            </a>
                            <a target="_blank"
                                href="http://twitter.com/share?url=<?php echo isset($baseUrl) ? rawurlencode($baseUrl) : "" ?>&text=<?php echo isset($deal_title) ? urlencode($deal_title) : "" ?>&hashtags=<?php echo BASE_NAME ?>,shoponline,offers,deals">
                                <img src="./assets/img/social_icons/logo-Twitter.png" alt="">
                            </a>
                            <a target="_blank"
                                href="http://pinterest.com/pin/create/button/?url=<?php echo isset($baseUrl) ? rawurlencode($baseUrl) : "" ?>">
                                <img src="./assets/img/social_icons/logo-Pinterest.png" alt="">
                            </a>
                            <a target="_blank"
                                href="https://telegram.me/share/url?url=<?php echo isset($baseUrl) ? rawurlencode($baseUrl) : "" . "&text=" . $deal_title ?>">
                                <img src="./assets/img/social_icons/logo-Telegram.png" alt="">
                            </a>
                        </div>
                        
                        <div>
                            <h5 class="text-bold text-2xl mt-4">
                                <?php echo $deal_title; ?>
                            </h5>
                        </div>
                        <input type="text" name="" placeholder="shorturl.at/bdO79"
                            class="w-100 p-3 my-3 rounded border rounded-r-none text-[#7C7C7C]" id="myInput">
                    </div>
                </div>
            </div>
        </div>
    </div>
    ---->
    
    <!-- Button trigger modal -->
    
    
    <!-- Modal -->
    <div class="modal33 fade" id="exampleModalCenter33" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Share This Posts</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <?php
}

//Complete list  of categories with view button in modal.
function list_of_category(){
    global $conn;
    $qr ="SELECT * FROM blog_post_category ";
    $stmt = $conn->prepare($qr);
    $stmt->execute();
    $results = $stmt->fetchAll();
    
    foreach ($results as $result) {
        
        $catname = $result['post_cat_name'];
        $catid = $result['post_cat_id'];
        ?>
<div class="mx-3 my-4 hover:bg-gray-100 px-2 flex flex-row justify-center">
    <div class="w-32">
        <h1 class="text-black"><?php echo($catname); ?></h1>
        <p class="text-gray-400"><?php post_count($catid); ?></p>
    </div>
    <div class="my-2">
        <button class="focus:outline-none">
            <a href="index.php?cat=<?php echo($catid); ?> "
                class="rounded-sm py-1 mx-10 px-3 my-3 bg-purple-500 text-white">View</a>
        </button>
    </div>
</div>
<?php
    }
}


//this categories are in desctop views.
//show category
function showCate($limit)
{
    global $ar;
    global $conn;
    $quer = "SELECT * FROM blog_post_category WHERE post_cat_id > 0 ORDER BY post_cat_id ASC LIMIT $limit";
    $statement = $conn->prepare($quer);
    $statement->execute();
    $results = $statement->fetchAll();
    foreach ($results as $result) {
        //store all id in an array 
        $ar[] = $result['post_cat_id'];
        $catid = $result['post_cat_id'];
        $catname = $result['post_cat_name'];
    ?>
<button class="focus:outline-none mx-2 text-2xl focus:text-purple-800"
    onclick="showBlog(this.value); catenavigation('<?php echo ($catname); ?> ')"
    value="<?php print_r($result['post_cat_id']); ?>" class="col">
    <?php echo ($catname); ?>
</button>
<?php
    }
}


//this categories are in desctop views.
function dropdownCats($ar)
{
    global $conn;
    $in_values = implode(',', $ar);
    $qr = "SELECT * FROM blog_post_category WHERE post_cat_id NOT IN (" . $in_values . ")";
    $statement = $conn->prepare($qr);
    $statement->execute();
    $results = $statement->fetchAll();
    foreach ($results as $result) {
        $catname = $result['post_cat_name'];
        $catid = $result['post_cat_id'];
    ?>
<li>
    <button class="focus:outline-none mx-2 text-purple-800 "
        onclick="showBlog(this.value);catenavigation('<?php echo ($catname); ?> ')"
        value="<?php print_r($result['post_cat_id']); ?> " class="col">
        <?php echo ($catname); ?>
    </button>
    <hr />
</li>
<?php
    }
}


//related blog posts in rights side of blog.
function related_post(){//related blog posts
    global $conn;
    global $postcateid;
    $qer = "SELECT * FROM blog_posts WHERE post_cat = $postcateid LIMIT 15";
    $smt = $conn->prepare($qer);
    $smt->execute();
    $fields = $smt->fetchAll();
    foreach($fields as $field){
        $date = $field['date'];
        $updateddate = substr($date,0,10);

        $timestamp = strtotime($updateddate);
        $formattedDate = date("M j", $timestamp);

        $title = $field['post_title'];
        $limittitle = substr($title,0, 30);
?>
<a href="index.php?poid=<?php echo($field['post_id']); ?> " class="px-2">
    <div class="mx-3 bg-gray-100 px-2">
        <h5 class="text-black">
            <?php echo($limittitle); ?>
        </h5>
        <div class="flex flex-row text-gray-500">
            <p class=""><?php echo($formattedDate);?>&nbsp;</p>
            <p class="pb-2 ">.</p>
            <p>&nbsp; 5 min read</p>
        </div>
    </div>
</a>
<?php
    }
}


//function to show related posts in mobile and tablete.

function related_posts_mobile_and_tab(){
    global $userid;
    global $conn;
    global $postcateid;
    

    $qer = " SELECT * FROM blog_posts WHERE post_cat = $postcateid ";
    $smt = $conn->prepare($qer);
    $smt->execute();
    $fields = $smt->fetchAll();
    foreach($fields as $field){
        $date = $field['date'];
        $shortdate = substr($date,0,10);
        $shorttitle = $field['post_title'];
        $postsubtitle = substr($field['post_content'], 0, 100);
            ?>
<!----mobile view----->

<!------desktop view------->
<div class="flex flex-row  items-center bg-white ">
    <div class="">
        <p class="text-purple-800"><?php  ?></p>
        <a href="index.php?poid=<?php echo ($field['post_id']); ?>">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                <?php echo ($field['post_title']); ?></h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo ($postsubtitle); ?> </p>
        </a>
        <div class="flex flex-row justify-between">
            <div>
                <p><?php echo ($shortdate); ?>&nbsp; 5 min read</p>

            </div>
            <div>
                <button class="focus:outline-none mr-5" id="saveicon"
                    onclick="savepost(this.value ,'<?php Check_post_saved_or_not($field['post_id'], $userid); ?>'); replaceIcon()"
                    value="<?php echo($field['post_id']); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill=" <?php Check_post_saved_or_not($field['post_id'], $userid); ?> " viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="orange" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                    </svg>
                </button>
                <?php //dropdown_for_share($field['post_id']); ?>
                
            </div>
        </div>
    </div>
    <img class="object-cover w-1/3 h-52 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
        src="images/<?php echo ($field['post_image']); ?>" alt="">
</div>
<?php
    }
}


//show saved posts on sidebar posts
function saved_post($userid){
    global $conn;
    //    $query = "SELECT * FROM blog_posts_saved Where `user_id`='$userid'";

    $query = "SELECT * FROM blog_posts_saved Where `user_id`='$userid' LIMIT 4";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll();
    
    foreach ($results as $result) {// post ids
        $post_id = $result['post_id'];
        $userid = $result['user_id'];
        //$qer = " SELECT * FROM blog_posts WHERE LENGTH(post_id)< 4 AND post_id = $post_id";
        $qer = " SELECT * FROM blog_posts WHERE post_id = $post_id ";

        $smt = $conn->prepare($qer);
        $smt->execute();
        $datas = $smt->fetchAll();
        
        foreach ($datas as $data) {//blog post loop
            $name = $data['post_content'];
            $small = substr($name, 0, 100);
            $date = $data['date'];
            $updateddate = substr($date, 0, 10);

            $timestamp = strtotime($updateddate);
            $formattedDate = date("M j", $timestamp);
        ?>
<a href="index.php?poid=<?php echo($data['post_id']); ?> " class=" px-2 font-light">
    <div class="mx-3  px-2 text-gray-500">
        <h5 class="text-black">
            <?php echo(substr($data['post_title'],0,30));?>
        </h5>
        <div class="flex flex-row">
            <p class=""><?php echo($formattedDate);?> &nbsp;</p>
            <p class="pb-2">.</p>
            <p>&nbsp; 5 min read</p>
        </div>
    </div>
</a>
<?php
        }
    }
}


//saved post cnt
function saved_count($userid){
    global $conn;
    $query = "SELECT * FROM blog_posts_saved WHERE `user_id`='$userid'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll();
    
    $count = 0;
    foreach ($results as $result) {// post ids
        $count = $count + 1;
    }
    
    return($count);
}

//saved_count("sam@gmail.com");
//show main blog contenet
function showblogpost($id){ //show main blog contenet
    global $conn;
    global $userid;
    $postid = $id;
    $query = "SELECT * FROM blog_posts WHERE post_id ='$postid'";
    $data = $conn->prepare($query);
    $data->execute();
    $rows = $data->fetchAll();
    foreach ($rows as $row) {
        $name = $row['post_title'];
        $post_content = $row['post_content'];
        $post_content2 = $row['post_content2'];
        $post_content3 = $row['post_content3'];

        $date = $row['date'];//date with time stamp
        $updateddate = substr($date,0,10);// only date.
        $timestamp = strtotime($updateddate);
        $formattedDate = date("M j", $timestamp);

        $img = $row['post_image'];
        $img2 = $row['post_image2'];
        $img3 = $row['post_image3'];
        //$pid = $row['post_id'];
        $emailid = $row['emailid'];
        $postcate = $row['post_cat'];
        $small = substr($post_content, 0, 50);

    ?>
<!-- Post Content-->
<article class="mb-4 Montserrat px-5">
    <div class=" ">
        <div class="grid-cols-1">
            <div class=" grid grid-cols-2 pt-5">
                <div class="">
                    <p class="text-purple-800"><?php show_category($postcate) ?></p>
                    <p class="text-gray-500"><?php echo($formattedDate);?> . 5 min read</p>
                </div>
                <div class=" item-center flex justify-end">
                    <div class="p-0">
                        <input class="focus:outline-none h-0 invisible hidden" type="text"
                            value="blog/index.php?poid=<?php echo($postid); ?> " id="myInput">
                        <!---link copy button--->
                        <button class="focus:outline-none" id="copyTextBtn" onclick="copy_post_link()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                            </svg>
                        </button>
                    </div>

                    <div class="p-0 mx-2">
                        <?php //dropdown_for_share($postid); ?>
                        
                    </div>

                    <div class="p-0">
                        <!----save post button--->
                        <button class="focus:outline-none mx-2" id="saveicon"
                            onclick="savepost(this.value ,'<?php Check_post_saved_or_not($row['post_id'], $userid); ?>'); replaceIcon()"
                            value="<?php echo($postid); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                fill="<?php Check_post_saved_or_not($row['post_id'], $userid );?>" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="orange" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                            </svg>
                        </button>


                    </div>

                </div>
            </div>


            <h2 class="text-center text-black text-2xl Montserrat"><b><?php echo ($name); ?></b></h2>
            <?php if($img){?>
            <div class="flex flex-row justify-center">
                <img class="lg:h-96 xl:w-3/4 lg:w-3/4 h-96" src="images/<?php echo ($img); ?>">
            </div>

            <?php } ?>

            <p class="Montserrat my-2"><?php echo ($post_content); ?> </p>

            <?php if($img2){?>
            <div class="flex flex-row justify-center">
                <img class="lg:h-96 xl:w-3/4 lg:w-3/4 h-96" src="images/<?php echo ($img2); ?>">
            </div>
            <?php } ?>

            <p class="Montserrat my-2"><?php echo ($post_content2); ?></p>

            <?php if(isset($img3)){?>
            <div class="flex flex-row justify-center">
                <img class="lg:h-96 xl:w-3/4 lg:w-3/4 h-96" src="images/<?php echo ($img3); ?>">
            </div>
            <?php } ?>

            <p class="Montserrat my-2"><?php echo ($post_content3); ?></p>



            <!--blog footer icons likes -->
            <div class=" grid grid-cols-2 pt-3">
                <div class="flex">
                   
                    <!--like button--->
                    <button id="likebtn" class="focus:outline-none mb-10 mr-2"
                        onclick="newlike('<?php echo($postid);?>'); showlike('<?php echo($postid);?>')">
                        <svg xmlns="http://www.w3.org/2000/svg" id="likesvg" fill="<?php user_likes_or_not_btn_color($userid,$postid); ?>" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                        </svg>
                    </button>
                    <div class="text-purple-800 " id="showlike">
                        <?php   substr(show_likes($postid),0,2);
                                //like($postid , $userid);
                        ?>
                    </div>

                </div>
                <div class=" item-center flex flex-row justify-end">
                    <div class="p-0">
                        <input class=" h-0 invisible hidden" type="text"
                            value="blog/index.php?poid=<?php echo($postid); ?> " id="myInput">
                        <!---link copy button--->
                        <button class="focus:outline-none" id="copyTextBtn" onclick="copy_post_link()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                            </svg>
                        </button>
                    </div>
                    <div class="p-0 mx-2 flex flex-row">
                        <?php //dropdown_for_share($postid); ?>
                      
                        <div class="p-0">
                            <!----save post button--->
                            <!--
                        <button class="mx-2 focus:outline-none" id="saveicon"
                            onclick="savepost(this.value ,'<?php Check_post_saved_or_not($row['post_id'], $userid); ?>'); replaceIcon()" value="<?php echo($postid); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                fill="<?php Check_post_saved_or_not($row['post_id'], $userid );?>" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="orange" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                            </svg>
                        </button>
                        --->
                            <?php savepostbtn($row['post_id'],$userid)?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</article>
<?php
        }
} 

function savepostbtn($postid,$userid){
    ?>
<button class="focus:outline-none mx-2" id="saveicon"
    onclick="savepost(this.value ,'<?php Check_post_saved_or_not($postid, $userid); ?>'); replaceIcon()"
    value="<?php echo($postid); ?>">
    <svg xmlns="http://www.w3.org/2000/svg" fill="<?php Check_post_saved_or_not($postid, $userid );?>"
        viewBox="0 0 24 24" stroke-width="1.5" stroke="orange" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
    </svg>
</button>
<?php
}
//function to show posts likes count.
function show_likes($postid){
    global $conn;

    $qer = " SELECT * FROM blog_posts WHERE post_id = '$postid' ";
    $smt = $conn->prepare($qer);
    $smt->execute();
    $datas = $smt->fetchAll();

    foreach($datas as $data){
        if(!$data['likes']){
            echo("0 likes");
        }
        else{
            echo($data['likes']." likes");
        }
    }
}


//function to show category
function show_category($catid){
    global $conn;

    $qer = "SELECT * FROM `blog_post_category` WHERE `post_cat_id` = '$catid'";
    $smt = $conn->prepare($qer);
    $smt->execute();
    $datas = $smt->fetchAll();

    foreach ($datas as $data) {
        echo($data['post_cat_name']);
    }
}

//function like 
function Check_user_likes_or_not($token){
    global $conn;

    $query = " SELECT * FROM `blog_posts_user_likes` WHERE `token` = '$token'";// fetch post preveous likes before new user likes.
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll();
    if($results){
        //echo"token id found..";
        return(false);
    }
    else{
        return(true);
        //echo"token id not found..";
    }
}

//Check_user_likes_or_not("1_ganesh@gmail.com");

function user_likes_or_not_btn_color($userid, $postid){
    global $conn;

    $token = $postid."_".$userid;
    $query = "SELECT * FROM `blog_posts_user_likes` WHERE `token` = '$token'";// fetch post preveous likes before new user likes.
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll();

    if($results){
        echo"Black";
    }
    else{
        echo"none";
    }
}

//user_likes_or_not_btn_color('gs@gmail.com','215');



function like($postid , $userid){
    global $conn;
    global $check;

    $token = $postid."_".$userid;

    if(Check_user_likes_or_not($token)){//check user already like or not
        
        if($_GET['like']){ //check user klick like button or not .
            $query = " SELECT * FROM `blog_posts` WHERE `post_id` = '$postid'";// fetch post preveous likes before new user likes.
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $results = $stmt->fetchAll();
            
            if($results){
                //echo("first query execute.");
            }
            foreach ($results as $result) {
                //echo"inside foreach";

                $dblikes = $result['likes'];
                //update new user likes
                $qr = " UPDATE `blog_posts` SET `likes` = '$dblikes'+1  WHERE `post_id` = '$postid' ";
                $data = $conn->prepare($qr);
                $data->execute();
                
                //insert new user data into blog_posts_user_likes table.
                $userdata = $conn->prepare(" INSERT INTO `blog_posts_user_likes` (`postid`, `userid`,`token`, `likes`) VALUES (?, ?, ?, ?) ");
                $userdata->execute(array($postid, $userid, $token, "liked"));
            } 
        }
    }
    else{
        //echo("     !You Liked");
    }
}



//function to show sidebar popular posts.
function show_popular_posts($limit){
    global $conn;
    global $postcateid;//semicolon in the sql query.
    $qer = "SELECT * FROM blog_posts ORDER BY Cast(likes AS int) DESC LIMIT $limit";
    $smt = $conn->prepare($qer);
    $smt->execute();
    $fields = $smt->fetchAll();
    foreach($fields as $field){
        $date = $field['date'];
        $poid = $field['post_id'];
    ?>
<a href="index.php?poid=<?php echo($field['post_id']); ?> " class=" px-2 font-light">
    <div class="mx-3  hover:bg-gray-100 px-2">
        <h5 class="text-black Montserrat">
            <?php echo(substr($field['post_title'],0,50)); ?>
        </h5>
        <p class="text-gray-500 font-medium"><?php echo(show_likes($poid));?></p>
    </div>
</a>
<?php
    }
}

//individual category posts.
//category wise blog posts.
function show_cat_blogposts($id){
    global $userid;
    global $catname;
    global $conn;
    $query = "SELECT * FROM blog_posts WHERE post_cat = '$id'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll();
    if (!$results) {
        //echo ("No Blog Found...");
    }
?>
<div class="bg-purple-500 text-white py-3 rounded">
    <h1><?php echo(show_category($id)); ?> Posts</h1>
</div>
<?php

    foreach ($results as $result) {
        $name = $result['post_content'];
        $small = substr($name, 0, 100);
        $catid = $result['post_cat'];

        $date = $result['date'];
        $shortdate = substr($date,0,10);
        $shorttitle = $result['post_title'];
        ?>
<!---mobile view---->
<div class="bg-white my-2 rounded lg:hidden sm:hidden hover:bg-gray-500">
    <div class="flex flex-row">
        <div class="">
            <div>
                <p class="text-purple-800"><?php echo (show_category($catid)); ?></p>
                <a href="index.php?poid=<?php echo ($result['post_id']); ?>">
                    <h5 class=" text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <?php echo (substr($shorttitle,0,30)); ?></h5>
                </a>
            </div>

        </div>
        <img class="object-cover w-1/3 h-30 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
            src="images/<?php echo ($result['post_image']); ?>" alt="">
    </div>
    <div class="flex flex-row justify-between lg:justify-between my-3">
        <p class="visible lg:invisible sm:invisible"><?php echo (show_likes($result['post_id'])); ?>&nbsp; 5 min read
        </p>
        <button class="ml-52 focus:outline-none" id="saveicon"
            onclick="savepost(this.value ,'<?php Check_post_saved_or_not($result['post_id'], $userid); ?>'); replaceIcon()"
            value="<?php echo($result['post_id']); ?>">
            <svg xmlns="http://www.w3.org/2000/svg"
                fill=" <?php Check_post_saved_or_not($result['post_id'], $userid); ?> " viewBox="0 0 24 24"
                stroke-width="1.5" stroke="orange" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
            </svg>
        </button>
        <!--dropdown for share and report--->

        <?php //dropdown_for_share($result['post_id']); ?>
        <!--
        <div class="flex flex-col">
            <button class="focus:outline-none" onclick="drop_mobile('<?php echo($result['post_id'].'5');?>')"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                <path d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" />
            </svg></button>
            <div id="<?php echo($result['post_id'].'5');?>" class="flex flex-col">
            </div>
        </div>
        --->
    </div>
</div>
<!------desktop view------->
<div class="flex flex-row items-center bg-white my-2 px-5 rounded max-[640px]:hidden">
    <div class="">
        <p class="text-purple-800"><?php echo (show_category($catid)); ?></p>
        <a href="index.php?poid=<?php echo ($result['post_id']); ?>">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                <?php echo (substr($shorttitle,0,50)); ?></h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo ($small); ?> </p>
        </a>
        <div class="flex flex-row justify-between">
            <p><?php echo (show_likes($result['post_id'])); ?>&nbsp; 5 min read</p>

            <div class="flex flex-row justify-between">
                <!----save post icon-->
                <button class="mr-5 focus:outline-none" id="saveicon"
                    onclick="savepost(this.value ,'<?php Check_post_saved_or_not($result['post_id'], $userid); ?>'); replaceIcon()"
                    value="<?php echo($result['post_id']); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill=" <?php Check_post_saved_or_not($result['post_id'], $userid); ?> " viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="orange" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                    </svg>
                </button>
                <?php //dropdown_for_share($result['post_id']); ?>
                <!--
                <div class="flex flex-col mr-5">
                    <button class="focus:outline-none" onclick="drop_desktop('<?php echo($result['post_id']);?>')"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" />
                    </svg></button>
                    <div id="<?php echo($result['post_id']);?>" class="flex flex-col">
                    </div>
                </div>
                --->
            </div>
        </div>
    </div>
    <img class="object-cover w-1/3 h-52 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
        src="images/<?php echo ($result['post_image']); ?>" alt="">
</div>
<?php
    }
}







//function to show seperate saved posts.
function show_saved_posts(){
    global $userid;
    global $conn;

    ?>
<div class="bg-purple-500 pl-5 py-3 rounded text-white ">
    <h1 class="px-4">Saved Posts</h1>
</div>
<?php
    $query = " SELECT * FROM blog_posts_saved WHERE user_id = '$userid' ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll();
    
    foreach ($results as $result) {// post ids
        $post_id = $result['post_id'];
        $userid = $result['user_id'];
        $qer = "SELECT * FROM blog_posts WHERE post_id = $post_id";
        $smt = $conn->prepare($qer);
        $smt->execute();
        $datas = $smt->fetchAll();
        
        foreach ($datas as $data) {//blog post loop
            $name = $data['post_content'];
            $small = substr($name, 0, 100);
            $catid =$data['post_cat'];
            $shorttitle =$data['post_title'];
            $date = $data['date'];
            $shortdate = substr($date,0,10);
        ?>


<!----mobile view----->
<div class="bg-white  my-2 rounded lg:hidden sm:hidden hover:bg-gray-500">
    <div class="flex flex-row">
        <div class="">
            <div>
                <p class="text-purple-800"><?php  ?></p>
                <a href="index.php?poid=<?php echo ($post_id); ?>">
                    <h5 class=" text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <?php echo (substr($shorttitle,0,30)); ?></h5>
                </a>
            </div>

        </div>
        <img class="object-cover w-1/3 h-30 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
            src="images/<?php echo ($data['post_image']); ?>" alt="">
    </div>
    <div class="flex flex-row justify-between lg:justify-between my-3">
        <p class="visible lg:invisible sm:invisible"><?php echo (show_likes($data['post_id'])." likes ."); ?>&nbsp; 5
            min read</p>

        <button class="lg:mr-60 sm:mr-52 focus:outline-none" id="saveicon"
            onclick="savepost(this.value ,'<?php Check_post_saved_or_not($result['post_id'], $userid); ?>'); replaceIcon()"
            value="<?php echo($data['post_id']); ?>">
            <svg xmlns="http://www.w3.org/2000/svg"
                fill=" <?php Check_post_saved_or_not($data['post_id'], $userid); ?> " viewBox="0 0 24 24"
                stroke-width="1.5" stroke="orange" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
            </svg>
        </button>
        <div class="flex flex-col">
            <button class="focus:outline-none" onclick="drop_mobile('<?php echo($result['post_id'].'5');?>')"><svg
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path
                        d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" />
                </svg>
            </button>
            <div id="<?php echo($result['post_id'].'5');?>" class="flex flex-col">
            </div>
        </div>
    </div>
</div>
<!------desktop view------->
<div class="flex flex-row items-center bg-white my-2 px-5 rounded max-[640px]:hidden">
    <div class="">
        <p class="text-purple-800"><?php  ?></p>
        <a href="index.php?poid=<?php echo ($post_id); ?>">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                <?php echo (substr($data['post_title'],0,50)); ?></h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo ($small); ?> </p>
        </a>
        <div class="flex flex-row justify-between">
            <div>
                <p><?php echo ($shortdate); ?>&nbsp; 5 min read</p>

            </div>
            <div class="flex flex-row">
                <button class="mr-5 focus:outline-none" id="saveicon"
                    onclick="savepost(this.value ,'<?php Check_post_saved_or_not($result['post_id'], $userid); ?>'); replaceIcon()"
                    value="<?php echo($post_id); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill=" <?php Check_post_saved_or_not($post_id, $userid); ?> " viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="orange" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                    </svg>
                </button>
                <?php// dropdown_for_share($post_id); ?>
                <!--
                <div class="flex flex-col mr-5">
                    <button class="focus:outline-none" onclick="drop_desktop('<?php echo($result['post_id']);?>')"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" />
                    </svg></button>
                    <div id="<?php echo($result['post_id']);?>" class="flex flex-col">
                    </div>
                </div>
                --->
            </div>
        </div>
    </div>
    <img class="  object-cover w-1/3 h-52 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
        src="images/<?php echo ($data['post_image']); ?>" alt="">
</div>
<?php
        }
    }
}

//function to popular blog posts in main container.
function show_popular_blogposts(){
    global $userid;
    global $conn;
    //echo"function callled";
?>
<div class="bg-purple-500 text-white py-3 rounded lg:pl-12 pl-3">
    <h1>Popular Posts</h1>
</div>
<?php

    $query = "SELECT * FROM `blog_posts` ORDER BY Cast(likes AS int) DESC LIMIT 15";
    $stmt = $conn->prepare($query);
    $stmt->execute();//remove the extra space from query
    $results = $stmt->fetchAll();
    if (!$results) {
        echo ("No Blog Found...");
    }
    foreach ($results as $result) {
        $name = $result['post_content'];
        $small = substr($name, 0, 100);
        $catid = $result['post_cat'];
        $date = $result['date'];
        $shortdate = substr($date,0,10);
        $qer = "SELECT * FROM blog_post_category WHERE post_cat_id = $catid";
        $smt = $conn->prepare($qer);
        $smt->execute();
        $datas = $smt->fetchAll();
        foreach ($datas as $data) {
            ?>
<div class="flex flex-row  items-center bg-white my-3 px-5 rounded style-none">
    <div class="">
        <p class="text-purple-800"><?php echo ($data['post_cat_name']); ?></p>
        <a href="index.php?poid=<?php echo ($result['post_id']); ?>">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                <?php echo (substr($result['post_title'],0,60)); ?></h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo ($small); ?> </p>
        </a>
        <div class="flex flex-row justify-between">
            <p class="text-gray-500"> <?php echo (show_likes($result['post_id'])); ?>&nbsp;. 5 min read</p>
            <div class="flex flex-row">
                <div>
                    <button class="mr-5 my-3 focus:outline-none" id="saveicon"
                        onclick="savepost(this.value ,'<?php Check_post_saved_or_not($result['post_id'], $userid); ?>'); replaceIcon()"
                        value="<?php echo($result['post_id']); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="<?php Check_post_saved_or_not($result['post_id'], $userid);?>" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="orange" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                        </svg>
                    </button>
                </div>
                <!--dropdown for share and report--->
                <div class="flex flex-col mr-5 mt-3">
                    <button class="focus:outline-none" onclick="drop_desktop('<?php echo($result['post_id']);?>')"><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path
                                d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" />
                        </svg></button>
                    <div id="<?php echo($result['post_id']);?>" class="flex flex-col">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img class="object-cover w-1/3 h-52 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
        src="images/<?php echo ($result['post_image']); ?>" alt="">
</div>
<?php
        }
    }
}




//discover more categories and show modal.
function discover_more_cat($no){
    
    global $conn;
    $qr ="SELECT * FROM blog_post_category ORDER BY post_cat_id ASC LIMIT $no ";
    $stmt = $conn->prepare($qr);
    $stmt->execute();
    $results = $stmt->fetchAll();
    
    foreach ($results as $result) {
        
        $catname = $result['post_cat_name'];
        $catid = $result['post_cat_id'];
        ?>
<a href="index.php?cat=<?php echo($catid); ?> " class=" px-2 font-light	">
    <div class="mx-3  hover:bg-gray-100  px-2">
        <h5 class="text-black Montserrat">
            <?php echo($catname);?>
        </h5>
        <p class="text-gray-500 font-medium"><?php post_count($catid); ?></p>
    </div>
</a>
<?php
    }
    
}



//category wise post count.
//return no of posts in given category id.
function post_count($catid){
    global $conn;

    $q = $conn->prepare(" SELECT * FROM blog_posts WHERE post_cat ='$catid' ");
    $q->execute();
    $results = $q->fetchAll();

    $postcnt = 0;
    foreach ($results as $result) {
        $postcnt = $postcnt + 1;
    }

    echo($postcnt." posts");
}


//function to check blog post is saved or not.
function Check_post_saved_or_not($poid , $userid){
    global $conn;

    $token = $poid."_".$userid;
    //select saved posts by user id 
    $query = "SELECT * FROM `blog_posts_saved` WHERE `token` = '$token'";
    $data = $conn->prepare($query);
    $data->execute();
    $results = $data->fetchAll();

    if($results){
            
        echo("orange");
    }
    if(!$results){
        echo("white");
    }
}


//this categories are in mobile view.
function showcate_mobile_view()
{
    global $conn;
    $quer = "SELECT * FROM blog_post_category";
    $statement = $conn->prepare($quer);
    $statement->execute();
    $results = $statement->fetchAll();
    ?>


<!---
<div class="inline-block px-3">
    <div
        class="focus:text-purple-700 active:text-purple-700 max-w-xs overflow-hidden rounded-lg  bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
        <button onclick="latest();catenavigation('Latest')" id="latest_mobile"
            class="focus:outline-none mx-2 focus:text-purple-700 active:text-purple-700">Latest</button>
    </div>
</div>
<div class="inline-block px-3">
    <div
        class=" max-w-xs overflow-hidden rounded-lg  bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
        <button onclick="ShowSaved();catenavigation('Saved')"
            class="focus:outline-none mx-2 focus:text-purple-700 active:text-purple-700">Saved</button>
    </div>
</div>
<div class="inline-block px-3">
    <div
        class=" max-w-xs overflow-hidden rounded-lg  bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
        <button onclick="Popular();catenavigation('Popular')"
            class="focus:outline-none mx-2 focus:text-purple-700 active:text-purple-700">Popular</button>
    </div>
</div>
--->
<button onclick="latest();catenavigation('Latest')" id="latest_mobile" class="focus:outline-none mx-4 focus:text-purple-700 active:text-purple-700">Latest</button>

<button onclick="ShowSaved();catenavigation('Saved')" class="focus:outline-none mx-4 focus:text-purple-700 active:text-purple-700">Saved</button>

<button onclick="Popular();catenavigation('Popular')" class="focus:outline-none mx-4 focus:text-purple-700 active:text-purple-700">Popular</button>

<?php
    foreach ($results as $result) {
        $catname = $result['post_cat_name'];
    ?>

    <button class="focus:outline-none focus:text-purple-700 active:text-purple-700 mx-4" onclick="showBlog(this.value);catenavigation('<?php echo ($catname); ?> ') " value="<?php echo($result['post_cat_id']); ?> " class="col">
        <?php echo ($catname); ?>
    </button>

    <!---
    <div class="inline-block px-3">
        <div
            class=" max-w-xs overflow-hidden rounded-lg  bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
            <button class="focus:outline-none focus:text-purple-700 active:text-purple-700"
                onclick="showBlog(this.value);catenavigation('<?php echo ($catname); ?> ') "
                value="<?php print_r($result['post_cat_id']); ?> " class="col">
                <?php echo ($catname); ?>
            </button>
        </div>
    </div>
    --->
<?php
    }
}

?>