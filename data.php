<?php
session_start();

include 'include/dbconnect.php';
include 'functions.php';


error_reporting(E_ALL ^ E_NOTICE);

$userid = $_SESSION['userid'];

$postid = $_GET['postid'];
//echo $postid."hello no";

//update post like to new added like.
/*
if($_GET['postid']){

    echo $postid = $_GET['postid'];
    echo $newlikes = $_GET['ncnt'];

    global $userid; // user id comes from user login session. 
    
    global $conn;
    $data = $conn->prepare("UPDATE `blog_posts` SET `likes` = $newlikes WHERE `postid` = $postid ");
    $data->execute();
}*/


//category wise show blogs
if ($category = $_GET['cat']) {

    $query = "SELECT * FROM blog_posts WHERE post_cat = '$category'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
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

        $timestamp = strtotime($shortdate);
        $formattedDate = date("M j", $timestamp);

        $shorttitle = $result['post_title'];
            ?>

<!----mobile view----->
<div class="bg-white px-2 my-2 rounded lg:hidden sm:hidden hover:bg-gray-120 Montserrat">
    <div class="flex flex-row">
        <div class="">
            <div>
                <p class="text-purple-800"><?php echo (show_category($catid)); ?></p>
                <a href="index.php?poid=<?php echo ($result['post_id']); ?>">
                    <h5 class="text-2xl text-gray-900 dark:text-black Montserrat">
                        <?php echo (substr($shorttitle,0,60)); ?></h5>
                </a>
            </div>

        </div>
        <img class="object-cover w-1/3 h-30 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
            src="images/<?php echo ($result['post_image']); ?>" alt="">
    </div>
    <div class="flex flex-row justify-between lg:justify-between my-3">
        <p class="visible lg:invisible sm:invisible"><?php echo (show_likes($result['post_id'])); ?>&nbsp; 5 min read
        </p>
        <button class="ml-52 focus:outline-none" id="saveicon<?php echo($result['post_id']);?>"
            onclick="savepost(this.value ,'<?php Check_post_saved_or_not($result['post_id'], $userid); ?>');replaceIcon()"
            value="<?php echo($result['post_id']); ?>">
            <svg xmlns="http://www.w3.org/2000/svg"
                fill=" <?php Check_post_saved_or_not($result['post_id'], $userid); ?> " viewBox="0 0 24 24"
                stroke-width="1.5" stroke="orange" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
            </svg>
        </button>
        <?php //dropdown_for_share($result['post_id']); ?>
      
    </div>
</div>

<!------desktop view------->
<div class="hover:bg-gray-100 flex flex-row items-center bg-white my-2 px-2 rounded hidden sm:flex Montserrat font-medium ">
    <div class="mr-6">
        <p class="text-purple-800"><?php echo (show_category($catid)); ?></p>
        <a href="index.php?poid=<?php echo ($result['post_id']); ?>">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white Montserrat">
                <?php echo (substr($shorttitle,0,50)); ?></h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo ($small); ?> </p>
        </a>
        <div class="flex justify-between">
            <!----date time ------>
            <div class="flex items-center justify-center ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                </svg>
                <p><?php echo ($formattedDate); ?> &nbsp;</p>
                <p class="pb-2">.</p>
                <p> &nbsp; 5 min read</p>
            </div>

            <div class="flex flex-row justify-between">
                <!----save post icon-->
                <button class="mr-5 saveicon" id="saveicon<?php echo($result['post_id']);?>"
                    status=" <?php Check_post_saved_or_not($result['post_id'], $userid); ?> "
                    onclick=" savepost(this.value ,'<?php Check_post_saved_or_not($result['post_id'], $userid); ?>'); replaceIcon();"
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
             
            </div>
        </div>
    </div>
    <img class=" object-cover w-1/3 h-52 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
        src="images/<?php echo ($result['post_image']); ?>" alt="">
</div>

<?php
    }
}


//show latest blogs
elseif ($_GET['Latest']) {
    $qr = "SELECT * FROM blog_posts ORDER BY post_id DESC LIMIT 5";
    $stmt = $conn->prepare($qr);
    $stmt->execute();
    $results = $stmt->fetchAll();

    foreach ($results as $result) {
        $name = $result['post_content'];
        $small = substr($name, 0, 100);

        $date = $result['date'];
        $shortdate = substr($date,0,10);
        
        $timestamp = strtotime($shortdate);
        $formattedDate = date("M j", $timestamp);

        $catid = $result['post_cat'];
        $shorttitle = $result['post_title'];
        ?>
<!---mobile view---->
<div class="bg-white px-2 my-2 rounded lg:hidden sm:hidden hover:bg-gray-500">
    <div class="flex flex-row">
        <div class="">
            <div>
                <p class="text-purple-800"><?php echo (show_category($catid)); ?></p>
                <a href="index.php?poid=<?php echo ($result['post_id']); ?>">
                    <h5 class="text-2xl text-gray-900 dark:text-black Montserrat">
                        <?php echo (substr($shorttitle,0,60)); ?></h5>
                </a>
            </div>

        </div>
        <img class=" object-cover w-1/3 h-30 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
            src="images/<?php echo ($result['post_image']); ?>" alt="">
    </div>
    <div class="flex flex-row justify-between lg:justify-between my-3">
        <p class="visible lg:invisible sm:invisible"><?php echo (show_likes($result['post_id'])); ?>&nbsp; 5 min read
        </p>
        <button class="ml-52 focus:outline-none" id="saveicon<?php echo($result['post_id']);?>"
            onclick="savepost(this.value ,'<?php Check_post_saved_or_not($result['post_id'], $userid); ?>');replaceIcon()"
            value="<?php echo($result['post_id']); ?>">
            <svg xmlns="http://www.w3.org/2000/svg"
                fill=" <?php Check_post_saved_or_not($result['post_id'], $userid); ?> " viewBox="0 0 24 24"
                stroke-width="1.5" stroke="orange" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
            </svg>
        </button>
        <?php //dropdown_for_share($result['post_id']); ?>
    
    </div>
</div>
<!------desktop view------->
<div
    class="hover:bg-gray-100 flex flex-row items-center bg-white my-2 px-2 rounded hidden sm:flex Montserrat font-medium">
    <div class="mr-6">
        <p class="text-purple-800"><?php echo (show_category($catid)); ?></p>
        <a href="index.php?poid=<?php echo ($result['post_id']); ?>">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white Montserrat">
                <?php echo (substr($shorttitle,0,50)); ?></h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo ($small); ?> </p>
        </a>
        <div class="flex  justify-between">
            <!----date time ------>
            <div class="flex items-center justify-center ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                </svg>
                <p><?php echo ($formattedDate); ?> &nbsp;</p>
                <p class="pb-2">.</p>
                <p> &nbsp; 5 min read</p>
            </div>
            <div class="flex flex-row justify-between">
                <!----save post icon-->
                <button class="mr-5 saveicon" id="saveicon<?php echo($result['post_id']);?>"
                    status=" <?php Check_post_saved_or_not($result['post_id'], $userid); ?> "
                    onclick=" savepost(this.value ,'<?php Check_post_saved_or_not($result['post_id'], $userid); ?>'); replaceIcon();"
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
             
            </div>
        </div>
    </div>
    <img class=" object-cover w-1/3 h-52 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
        src="images/<?php echo ($result['post_image']); ?>" alt="">
</div>
<?php
    }
}


//show popular posts in mobile and tab views.
if($_GET['Popular']){

    global $userid;
    global $conn;
    //echo"function callled";
    $query = "SELECT * FROM blog_posts ORDER BY likes DESC LIMIT 10";
    $stmt = $conn->prepare($query); 
    $stmt->execute();
    $results = $stmt->fetchAll();
    if (!$results) {
        echo ("No Blog Found...");
    }
    foreach ($results as $result) {
        $name = $result['post_content'];
        $small = substr($name, 0, 150);
        $catid = $result['post_cat'];
        $date = $result['date'];
        $shortdate = substr($date,0,10);

        $timestamp = strtotime($shortdate);
        $formattedDate = date("M j", $timestamp);

        $shorttitle = $result['post_title'];
        
            ?>

<!---mobile view---->
<div class="bg-white px-2 my-2 rounded lg:hidden sm:hidden hover:bg-gray-500 Montserrat font-medium">
    <div class="flex flex-row">
        <div class="">
            <div>
                <p class="text-purple-800"><?php echo (show_category($catid)); ?></p>
                <a href="index.php?poid=<?php echo ($result['post_id']); ?>">
                    <h5 class="text-2xl text-gray-900 dark:text-black Montserrat">
                        <?php echo (substr($shorttitle,0,60)); ?></h5>
                </a>
            </div>

        </div>
        <img class="object-cover w-1/3 h-30 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
            src="images/<?php echo ($result['post_image']); ?>" alt="">
    </div>

    <div class="flex flex-row justify-between lg:justify-between my-3 Montserrat font-medium">

        <p class="visible lg:invisible sm:invisible"><?php echo (show_likes($result['post_id'])); ?>&nbsp; 5 min read
        </p>

        <button class="ml-52 focus:outline-none" id="saveicon<?php echo($result['post_id']);?>"
            onclick="savepost(this.value ,'<?php Check_post_saved_or_not($result['post_id'], $userid); ?>');replaceIcon()"
            value="<?php echo($result['post_id']); ?>">
            <svg xmlns="http://www.w3.org/2000/svg"
                fill=" <?php Check_post_saved_or_not($result['post_id'], $userid); ?> " viewBox="0 0 24 24"
                stroke-width="1.5" stroke="orange" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
            </svg>
        </button>

        <?php //dropdown_for_share($result['post_id']); ?>
        
    </div>
</div>
<!------desktop view------->
<div
    class="hover:bg-gray-100 flex flex-row items-center bg-white my-2 px-2 rounded hidden sm:flex Montserrat font-medium">
    <div class="mr-6">
        <p class="text-purple-800"><?php echo (show_category($catid)); ?></p>
        <a href="index.php?poid=<?php echo ($result['post_id']); ?>">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white Montserrat">
                <?php echo (substr($shorttitle,0,50)); ?></h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo ($small); ?> </p>
        </a>
        <div class="flex  justify-between">
            
            <!----show likes ------>
            <div class="flex items-center justify-center ">
                
                <p><?php show_likes($result['post_id']) ?> &nbsp;</p>
                <p class="pb-2">.</p>
                <p> &nbsp; 5 min read</p>
            </div>

            <div class="flex flex-row justify-between">
                <!----save post icon-->
                <button class="mr-5 saveicon" id="saveicon<?php echo($result['post_id']);?>"
                    status=" <?php Check_post_saved_or_not($result['post_id'], $userid); ?> "
                    onclick=" savepost(this.value ,'<?php Check_post_saved_or_not($result['post_id'], $userid); ?>'); replaceIcon();"
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
               

            </div>
        </div>
    </div>
    <img class=" object-cover w-1/3 h-52 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
        src="images/<?php echo ($result['post_image']); ?>" alt="">
</div>
<?php
        }
}

//by default show blogs posts
if ($defaultblogcategory = $_GET['defaultcat']) {
    
    $q = $conn->prepare("SELECT * FROM blog_posts ORDER BY post_id DESC LIMIT 5");
    $q->execute();
    $results = $q->fetchAll();
    foreach ($results as $result) {//this loop fetch blog posts.
        $name = $result['post_content'];
        $small = substr($name, 0, 200);
        $shorttitle = $result['post_title'];

        $catid = $result['post_cat'];
        $date = $result['date'];
        $shortdate = substr($date,0,10);

        $timestamp = strtotime($shortdate);
        $formattedDate = date("M j", $timestamp);
        //$dttxtfrmt = DATE_FORMAT("2023-8-5", "%b");

        //echo $dttxtfrmt;
        
        ?>
<!----mobile view----->
<div class="bg-white px-2 my-2 rounded lg:hidden sm:hidden Montserrat">
    <div class="flex flex-row ">
        <div class="">
            <div>
                <p class="text-purple-800"><?php echo (show_category($catid)); ?></p>
                <a href="index.php?poid=<?php echo ($result['post_id']); ?>">
                    <h5 class="text-2xl text-gray-900 dark:text-black Montserrat">
                        <?php echo (substr($shorttitle,0,60)); ?></h5>
                </a>
            </div>

        </div>
        <img class="object-cover w-1/3 h-30 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
            src="images/<?php echo ($result['post_image']); ?>" alt="">
    </div>
    <div class="flex flex-row justify-between lg:justify-between my-3">
        <p class=""><?php echo (show_likes($result['post_id'])); ?>&nbsp; 5 min read</p>

        <div class="flex flex-row ">
            <button class="ml-52 focus:outline-none px-2" id="saveicon<?php echo($result['post_id']);?>"
            status="<?php Check_post_saved_or_not($result['post_id'], $userid); ?>" onclick=" savepost(this.value, "<?php Check_post_saved_or_not($result['post_id'], $userid); ?>"); replaceIcon();"
            value="<?php echo($result['post_id']); ?>">
            <svg xmlns="http://www.w3.org/2000/svg"
                fill=" <?php Check_post_saved_or_not($result['post_id'], $userid); ?> " viewBox="0 0 24 24"
                stroke-width="1.5" stroke="orange" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
            </svg>
            </button>
            <?php //dropdown_for_share($result['post_id']); ?>
        </div>
       
        
    </div>
</div>

<!------desktop view------->
<div
    class="hover:bg-gray-100 flex flex-row items-center bg-white my-2 px-2 rounded hidden sm:flex Montserrat font-medium">
    <div class="mr-6">
        <p class="text-purple-800 pb-3"><?php echo (show_category($catid)); ?></p>
        <a href="index.php?poid=<?php echo ($result['post_id']); ?>">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white Montserrat">
                <?php echo (substr($shorttitle,0,50)); ?></h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo ($small); ?> </p>
        </a>
        <div class="flex justify-between" >
            <!---
            <div class="flex flex-row">
                <p class="flex flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                    </svg>
                    <?php echo ($formattedDate); ?>&nbsp;<p class="pb-1 bg-red-500 h-1">.</p> 5 min read
                </p>
            </div>
            --->
            <!----date time ------>
            <div class="flex items-center justify-center ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                </svg>
                <p><?php echo ($formattedDate); ?> &nbsp;</p>
                <p class="pb-2">.</p>
                <p> &nbsp; 5 min read</p>
            </div>
            

            <div class="flex flex-row justify-between">
                <!----save post icon-->
                <button class="mr-5 saveicon" id="saveicon<?php echo($result['post_id']);?>"
                    status=" <?php Check_post_saved_or_not($result['post_id'], $userid); ?> "
                    onclick=" savepost(this.value ,'<?php Check_post_saved_or_not($result['post_id'], $userid); ?>'); replaceIcon();"
                    value="<?php echo($result['post_id']); ?>">

                    <svg xmlns="http://www.w3.org/2000/svg" id="<?php echo($result['post_id']); ?>"
                        fill=" <?php Check_post_saved_or_not($result['post_id'], $userid); ?> " viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="orange" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                    </svg>

                </button>

                <!--dropdown for share and report--->
                <?php //dropdown_for_share_desktop($result['post_id']); ?>
               
            </div>
        </div>
    </div>
    <img class=" object-cover w-1/3 h-52 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
        src="images/<?php echo ($result['post_image']); ?>" alt="">
</div>
<?php

    }
   
}

//save post with user the Id
if ($save_post_id = $_GET['saveid'] ) {
    global $userid; // user id comes from user login session. 

    $token = $save_post_id."_".$userid;

    global $conn;
    $data = $conn->prepare("INSERT INTO `blog_posts_saved` (`post_id`,`user_id`,`token`) VALUES (?,?,?)");
    $data->execute([$save_post_id, $userid, $token]);
}

//unsave post with user the Id
if ($unsave_post_id = $_GET['unsaveid'] ) {
        
    global $userid; // user id comes from user login session. 
    global $conn;
    $token = $unsave_post_id."_".$userid;
        //DELETE FROM table_name WHERE condition;

    $data = $conn->prepare(" DELETE FROM `blog_posts_saved` WHERE `token`= '$token'");
    $data->execute();
}

// show saved posts 
if($_GET['Saved']){
    if(isset($userid)){
        
    $query = "SELECT * FROM blog_posts_saved WHERE user_id = '$userid' ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll();

    if(isset($result)){
        echo("No saved post...");
    }
    
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
            $shorttitle=$data['post_title'];
            $catid = $data['post_cat'];

            $date = $data['date'];
            $shortdate = substr($date,0,10);

            $timestamp = strtotime($shortdate);
            $formattedDate = date("M j", $timestamp);
        ?>

<!----mobile view----->
<div class="bg-white px-2 my-2 rounded lg:hidden sm:hidden hover:bg-gray-500 Montserrat">
    <div class="flex flex-row">
        <div class="">
            <div>
                <p class="text-purple-800"><?php echo (show_category($catid)); ?></p>
                <a href="index.php?poid=<?php echo ($data['post_id']); ?>">
                    <h5 class="text-2xl text-gray-900 dark:text-black Montserrat ">
                        <?php echo (substr($shorttitle,0,60)); ?></h5>
                </a>
            </div>

        </div>
        <img class="object-cover w-1/3 h-30 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
            src="images/<?php echo ($data['post_image']); ?>" alt="">
    </div>
    <div class="flex flex-row justify-between lg:justify-between my-3">
        <p class="visible lg:invisible sm:invisible Montserrat"><?php echo (show_likes($data['post_id'])); ?>&nbsp; 5
            min read</p>
        <button class="ml-52 focus:outline-none" id="saveicon<?php echo($data['post_id']);?>"
            onclick="savepost(this.value ,'<?php Check_post_saved_or_not($data['post_id'], $userid); ?>'); replaceIcon()"
            value="<?php echo($data['post_id']); ?>">
            <svg xmlns="http://www.w3.org/2000/svg"
                fill=" <?php Check_post_saved_or_not($data['post_id'], $userid); ?> " viewBox="0 0 24 24"
                stroke-width="1.5" stroke="orange" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
            </svg>
        </button>
        <?php //dropdown_for_share($data['post_id']); ?>
        
    </div>
</div>
<!------desktop view------->
<div
    class="hover:bg-gray-100 flex flex-row items-center bg-white my-2 px-2 rounded hidden sm:flex Montserrat font-medium">
    <div class="mr-6">
        <p class="text-purple-800"><?php echo (show_category($catid)); ?></p>
        <a href="index.php?poid=<?php echo ($data['post_id']); ?>">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white Montserrat">
                <?php echo (substr($shorttitle,0,50)); ?></h5>
            <p class="mb-3 font-normal text-gray-700 "><?php echo ($small); ?> </p>
        </a>
        <div class="flex  justify-between">

            <!----date time ------>
            <div class="flex items-center justify-center ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                </svg>
                <p><?php echo ($formattedDate); ?> &nbsp;</p>
                <p class="pb-2">.</p>
                <p> &nbsp; 5 min read</p>
            </div>
            <div class="flex flex-row justify-between">
                <!----save post icon-->
                <button class="mr-5 saveicon" id="<?php echo($result['post_id']);?>"
                    status=" <?php Check_post_saved_or_not($data['post_id'], $userid); ?> "
                    onclick=" savepost(this.value ,'<?php Check_post_saved_or_not($result['post_id'], $userid); ?>'); replaceIcon();"
                    value="<?php echo($result['post_id']); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill=" <?php Check_post_saved_or_not($data['post_id'], $userid); ?> " viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="orange" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                    </svg>
                </button>

                <!--dropdown for share and report--->
                <?php //dropdown_for_share($result['post_id']); ?>
               
            </div>
        </div>
    </div>
    <img class=" object-cover w-1/3 h-52 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
        src="images/<?php echo ($data['post_image']); ?>" alt="">
</div>

<?php
        }
        }
    }else{

        ?>
        <h1 class="my-5">No Saved Post</h1>
        <?php
    }
}


//show all category wise posts in mobile and tab views.
if($_GET['allcatposts']){

    global $userid;
    global $conn;
    //echo"function callled";
    $query = "SELECT * FROM blog_posts";
    $stmt = $conn->prepare($query); 
    $stmt->execute();
    $results = $stmt->fetchAll();
    if (!$results) {
        echo ("No Blog Found...");
    }
    foreach ($results as $result) {
        $name = $result['post_content'];
        $small = substr($name, 0, 150);
        $catid = $result['post_cat'];
        $date = $result['date'];
        $shortdate = substr($date,0,10);

        $timestamp = strtotime($shortdate);
        $formattedDate = date("M j", $timestamp);

        $shorttitle = $result['post_title'];
        
            ?>

<!---mobile view---->
<div class="bg-white px-2 my-2 rounded lg:hidden sm:hidden hover:bg-gray-500 Montserrat font-medium">
    <div class="flex flex-row">
        <div class="">
            <div>
                <p class="text-purple-800"><?php echo (show_category($catid)); ?></p>
                <a href="index.php?poid=<?php echo ($result['post_id']); ?>">
                    <h5 class="text-2xl text-gray-900 dark:text-black Montserrat">
                        <?php echo (substr($shorttitle,0,60)); ?></h5>
                </a>
            </div>

        </div>
        <img class="object-cover w-1/3 h-30 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
            src="images/<?php echo ($result['post_image']); ?>" alt="">
    </div>

    <div class="flex flex-row justify-between lg:justify-between my-3 Montserrat font-medium">

        <p class="visible lg:invisible sm:invisible"><?php echo (show_likes($result['post_id'])); ?>&nbsp; 5 min read
        </p>

        <button class="ml-52 focus:outline-none" id="saveicon<?php echo($result['post_id']);?>"
            onclick="savepost(this.value ,'<?php Check_post_saved_or_not($result['post_id'], $userid); ?>');replaceIcon()"
            value="<?php echo($result['post_id']); ?>">
            <svg xmlns="http://www.w3.org/2000/svg"
                fill=" <?php Check_post_saved_or_not($result['post_id'], $userid); ?> " viewBox="0 0 24 24"
                stroke-width="1.5" stroke="orange" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
            </svg>
        </button>

        <?php //dropdown_for_share($result['post_id']); ?>
        
    </div>
</div>
<!------desktop view------->
<div
    class="hover:bg-gray-100 flex flex-row items-center bg-white my-2 px-2 rounded hidden sm:flex Montserrat font-medium">
    <div class="mr-6">
        <p class="text-purple-800"><?php echo (show_category($catid)); ?></p>
        <a href="index.php?poid=<?php echo ($result['post_id']); ?>">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white Montserrat">
                <?php echo (substr($shorttitle,0,50)); ?></h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo ($small); ?> </p>
        </a>
        <div class="flex  justify-between">
            
            <!----date time ------>
            <div class="flex items-center justify-center ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                </svg>
                <p><?php echo ($formattedDate); ?> &nbsp;</p>
                <p class="pb-2">.</p>
                <p> &nbsp; 5 min read</p>
            </div>

            <div class="flex flex-row justify-between">
                <!----save post icon-->
                <button class="mr-5 saveicon" id="saveicon<?php echo($result['post_id']);?>"
                    status=" <?php Check_post_saved_or_not($result['post_id'], $userid); ?> "
                    onclick=" savepost(this.value ,'<?php Check_post_saved_or_not($result['post_id'], $userid); ?>'); replaceIcon();"
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
                

            </div>
        </div>
    </div>
    <img class=" object-cover w-1/3 h-52 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
        src="images/<?php echo ($result['post_image']); ?>" alt="">
</div>
<?php
        }
}


//bydefault show related posts after individual blog posts.
if($_GET['bydefaultrelated']!=null){

    global $userid;
    global $conn;
    $postcateid = $_SESSION['related_post_catid'];
    
    $qer = "SELECT * FROM blog_posts WHERE post_cat = $postcateid LIMIT 3";
    $smt = $conn->prepare($qer);
    $smt->execute();
    $fields = $smt->fetchAll();
    foreach($fields as $field){
        $date = $field['date'];
        $shortdate = substr($date,0,10);
        $timestamp = strtotime($shortdate);
        $formattedDate = date("M j", $timestamp);

        $shorttitle = $field['post_title'];
        $small = substr($field['post_content'], 0, 100);
            ?>
<!----mobile view----->
<div class="bg-white px-2 my-2 mx-4 rounded lg:hidden sm:hidden hover:bg-gray-500 Montserrat">
    <div class="flex flex-row">
        <div class="">
            <div>
                <p class="text-purple-800"><?php  ?></p>
                <a href="index.php?poid=<?php echo ($field['post_id']); ?>">
                    <h5 class="text-2xl text-gray-900 dark:text-black Montserrat">
                        <?php echo (substr($shorttitle,0,60)); ?></h5>
                </a>
            </div>

        </div>
        <img class="object-cover w-1/3 h-30 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
            src="images/<?php echo ($field['post_image']); ?>" alt="">
    </div>
    <div class="flex flex-row justify-between lg:justify-between my-3">
        <p class="visible lg:invisible sm:invisible Montserrat"> <?php echo (show_likes($field['post_id'])); ?> &nbsp; 5
            min read </p>

        <button class="lg:mr-60 sm:mr-52 focus:outline-none" id="saveicon<?php echo($field['post_id']);?>"
            onclick="savepost(this.value ,'<?php Check_post_saved_or_not($field['post_id'], $userid); ?>');replaceIcon()"
            value="<?php echo($field['post_id']); ?>">
            <svg xmlns="http://www.w3.org/2000/svg"
                fill=" <?php Check_post_saved_or_not($field['post_id'], $userid); ?> " viewBox="0 0 24 24"
                stroke-width="1.5" stroke="orange" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
            </svg>
        </button>

        <!--dropdown for share and report--->
        <?php //dropdown_for_share($field['post_id']); ?>
    </div>
</div>
<!------desktop view------->

<div
    class="hover:bg-gray-100 flex flex-row items-center bg-white my-2 px-2 mx-4 rounded hidden sm:flex Montserrat font-medium">
    <div class="mr-6">
        <p class="text-purple-800"><?php echo (show_category($catid)); ?></p>
        <a href="index.php?poid=<?php echo ($field['post_id']); ?>">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white Montserrat">
                <?php echo (substr($shorttitle,0,50)); ?></h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo ($small); ?> </p>
        </a>
        <div class="flex  justify-between">
            <!----date time ------>
            <div class="flex items-center justify-center ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                </svg>
                <p><?php echo ($formattedDate); ?> &nbsp;</p>
                <p class="pb-2">.</p>
                <p> &nbsp; 5 min read</p>
            </div>

            <div class="flex flex-row justify-between">
                <!----save post icon-->
                <button class="mr-5 saveicon" id="saveicon<?php echo($field['post_id']);?>"
                    status=" <?php Check_post_saved_or_not($field['post_id'], $userid); ?> "
                    onclick=" savepost(this.value ,'<?php Check_post_saved_or_not($field['post_id'], $userid); ?>'); replaceIcon();"
                    value="<?php echo($field['post_id']); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill=" <?php Check_post_saved_or_not($field['post_id'], $userid); ?> " viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="orange" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                    </svg>
                </button>

                <!--dropdown for share and report--->
                <?php //dropdown_for_share($field['post_id']); ?>
               
            </div>
        </div>
    </div>
    <img class=" object-cover w-1/3 h-52 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
        src="images/<?php echo ($field['post_image']); ?>" alt="">
</div>


<?php
    }
}

//relatesd posts after individual post.
//show more posts after clking button show more post.
if($_GET['showmoreposts']){
    $limit = $_GET['limit'];

    $postcateid = $_SESSION['related_post_catid'];

    $qer = " SELECT * FROM blog_posts WHERE post_cat = $postcateid LIMIT $limit";
    $smt = $conn->prepare($qer);
    $smt->execute();
    $fields = $smt->fetchAll();
    foreach($fields as $field){
        $date = $field['date'];
        $shortdate = substr($date,0,10);
        $timestamp = strtotime($shortdate);
        $formattedDate = date("M j", $timestamp);

        $shorttitle = $field['post_title'];
        $small = substr($field['post_content'], 0, 100);
            ?>
<!----mobile view----->
<div class="bg-white px-2 mx-4 my-2 rounded lg:hidden sm:hidden hover:bg-gray-500 Montserrat">
    <div class="flex flex-row">
        <div class="">
            <div>
                <p class="text-purple-800"><?php  ?></p>
                <a href="index.php?poid=<?php echo ($field['post_id']); ?>">
                    <h5 class="text-2xl text-gray-900 dark:text-black Montserrat">
                        <?php echo (substr($shorttitle,0,60)); ?></h5>
                </a>
            </div>

        </div>
        <img class=" object-cover w-1/3 h-30 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
            src="images/<?php echo ($field['post_image']); ?>" alt="">
    </div>
    <div class="flex flex-row justify-between lg:justify-between my-3">
        <p class="visible lg:invisible sm:invisible Montserrat"><?php echo (show_likes($field['post_id'])); ?>&nbsp; 5
            min read</p>

        <button class="lg:mr-60 sm:mr-52 focus:outline-none" id="saveicon<?php echo($field['post_id']);?>"
            onclick="savepost(this.value ,'<?php Check_post_saved_or_not($field['post_id'], $userid); ?>');replaceIcon()"
            value="<?php echo($field['post_id']); ?>">
            <svg xmlns="http://www.w3.org/2000/svg"
                fill=" <?php Check_post_saved_or_not($field['post_id'], $userid); ?> " viewBox="0 0 24 24"
                stroke-width="1.5" stroke="orange" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
            </svg>
        </button>

        <div class="flex flex-col">
            <button class="focus:outline-none" onclick="drop_mobile('<?php echo($field['post_id'].'5');?>')"><svg
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path
                        d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" />
                </svg></button>
            <div id="<?php echo($field['post_id'].'5');?>" class="flex flex-col">
            </div>
        </div>
    </div>
</div>
<!------desktop view------->
<div
    class="hover:bg-gray-100 flex flex-row items-center bg-white my-2 px-2 mx-4 rounded hidden sm:flex Montserrat font-medium">
    <div class="mr-6">
        <p class="text-purple-800"><?php echo (show_category($catid)); ?></p>
        <a href="index.php?poid=<?php echo ($field['post_id']); ?>">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white Montserrat">
                <?php echo (substr($shorttitle,0,50)); ?></h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo ($small); ?> </p>
        </a>
        <div class="flex  justify-between">
            <!----date time ------>
            <div class="flex items-center justify-center ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                </svg>
                <p><?php echo ($formattedDate); ?> &nbsp;</p>
                <p class="pb-2">.</p>
                <p> &nbsp; 5 min read</p>
            </div>
            <div class="flex flex-row justify-between">
                <!----save post icon-->
                <button class="mr-5 saveicon" id="saveicon<?php echo($field['post_id']);?>"
                    status=" <?php Check_post_saved_or_not($field['post_id'], $userid); ?> "
                    onclick=" savepost(this.value ,'<?php Check_post_saved_or_not($field['post_id'], $userid); ?>'); replaceIcon();"
                    value="<?php echo($field['post_id']); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill=" <?php Check_post_saved_or_not($field['post_id'], $userid); ?> " viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="orange" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                    </svg>
                </button>

                <!--dropdown for share and report--->
                <?php //dropdown_for_share($field['post_id']); ?>
                <!--
                    <div class="flex flex-col mr-5">
                        <button class="focus:outline-none" class="focus:outline-none" onclick="drop_desktop('<?php echo($field['post_id']);?>')"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" />
                        </svg></button>
                        <div id="<?php echo($field['post_id']);?>" class="flex flex-col">
                        </div>
                    </div>
                    --->
            </div>
        </div>
    </div>
    <img class=" object-cover w-1/3 h-52 md:w-1/3  md:h-52 lg:h-52 lg:w-1/3 "
        src="images/<?php echo ($field['post_image']); ?>" alt="">
</div>
<?php
    }
}


$postid = $_GET['showlikes'];
if(isset($postid)){
    echo("inside if");
    
    $qer = "SELECT * FROM blog_posts WHERE post_id = 1";
    $smt = $conn->prepare($qer);
    $smt->execute();
    $datas = $smt->fetchAll();

    foreach($datas as $data){
        if(!$data['likes']){
            echo(0);
        }
        else{
            echo($data['likes']." likes");
        }
    }
}


// new like of posts...
$newlikepostid = $_GET['newlike'];

if(isset($newlikepostid)){

    if(isset($userid)){
        $token = $newlikepostid."_".$userid;

        //if(Check_user_likes_or_not($token)){    //check user already like or not
            //echo("inside Check_user_likes_or_not  if");
    
            $query = "SELECT * FROM `blog_posts` WHERE `post_id` = '$newlikepostid'"; // fetch post preveous likes before new user likes.
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
                $qr = "UPDATE `blog_posts` SET `likes` = '$dblikes'+1  WHERE `post_id` = '$newlikepostid' ";
                $data = $conn->prepare($qr);
                $data->execute();
                
                //insert new user data into blog_posts_user_likes table.
                $userdata = $conn->prepare("INSERT INTO `blog_posts_user_likes` (`postid`, `userid`,`token`, `likes`) VALUES (?, ?, ?, ?) ");
                $userdata->execute(array($newlikepostid, $userid, $token, "liked"));

            } 
        //}
       
    }else{
        echo("Login Please...");
    }
    
    //echo("like done");
}

$postid = $_GET['showlike'];
if(isset($postid)){
    show_likes($postid);
}



?>