
<?php 
/*
include('include/dbconnect.php');
include('functions.php');
require_once('blog_header.php');

?>

  <link rel="stylesheet" href="css/Style.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="js/ajax.js"></script>

<!--Desktop view--->
<div class="text-center max-[640px]:hidden text-gray-700 overflow-x-scroll hide-scroll-bar">
    <button onclick="latest(); catenavigation('Latest') " class="focus:outline-none mx-2 focus:text-purple-700 active:text-purple-700">Latest</button>
    <button onclick="Popular(); catenavigation('Popular')" class="focus:outline-none mx-2 focus:text-purple-700 active:text-purple-700">Popular</button>
    <button onclick="ShowSaved();catenavigation('Saved')" class="focus:outline-none mx-2 focus:text-purple-700 active:text-purple-700">Saved</button>
    <?php showCate(5); ?>
    <button id="dropdownDefaultButton1" data-dropdown-toggle="dropdown1" class="inline-flex mx-2 focus:text-purple-700 active:text-purple-700 focus:outline-none" type="button" >See All
    </button>
    <!-- Dropdown menu -->
    <div id="dropdown1" class="bg-white z-10 hidden  divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton1">
            <?php
                dropdownCats($ar);
                ?>
        </ul>
    </div>
</div>

<button class="lg:mr-5 sm:mr-5 focus:outline-none" id="dropdownButton" data-dropdown-toggle="ganesh" 
  type="button">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
      <path
          d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" />
  </svg>
</button>

<div id="ganesh" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
  <ul class="py-2 text-center text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownButton">
      <li>
          <a href="#" class="block  py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Share->ganesh</a>
      </li>
      <li>
          <a href="#" class="block  py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
      </li>
  </ul>
</div>



<button class="lg:mr-5 sm:mr-5 focus:outline-none" id="dropdownButton" data-dropdown-toggle="dropdown55" type="button">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
      <path
          d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" />
  </svg>
</button>

<div id="dropdown55" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
  <ul class="py-2 text-center text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownButton">
      <li>
          <a href="#" class="block  py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Share->surya</a>
      </li>
      <li>
          <a href="#" class="block  py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
      </li>
  </ul>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>


<?php require_once('blog_footer.php');
*/
?>








<?php
session_start();
include('include/dbconnect.php');
include('functions.php');
error_reporting(E_ALL ^ E_NOTICE);

//these variable get values from url
$postid = $_GET['poid'];
$catid = $_GET['cat'];
$popular = $_GET['pop'];
$saved = $_GET['saved'];


global $catname;
global $name;
global $postcateid;
global $userid;


//these userid comes from main website.
$userid = "sam@gmail.com";

$_SESSION['userid'] = $userid;

//this is for navigatoer to print post name
if($postid){
    $query = "SELECT * FROM blog_posts WHERE post_id='$postid'";
    $data = $conn->prepare($query);
    $data->execute();
    $rows = $data->fetchAll();
    foreach ($rows as $row) {
        $name = $row['post_title'];
        $postcateid = $row['post_cat'];
    }
}




?>

<?php //require_once('blog_header.php'); ?>
<!--
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/Style.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">



    
-->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
    

<div class="lg:px-32 bg-gray-200 lg:my-0">

    <!-- Main modal -
    <div id="defaultModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full  max-h-full">
            <div class=" align-center relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h1 class="just" >List Of All Categories</h1>
                    <button type="button"
                        class="focus:outline-none text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <?php list_of_category(); ?>
                </div>
            
            </div>
        </div>
    </div>
    --->
    <div class="h-16 flex justify-end sm:pr-5 lg:pr-0" >
        <div id="notification"></div>
    </div>
        
    <!--Navigator -->
    <!----
    <div class="my-1 flex sm:ml-5 lg:ml-0 my-2">
            
            <a class="flex flex-row" href="https://lannister.deals2buy.in/"> 
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
            </svg>
            Home </a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            <a href="index.php" class="text-purple-800">Blogs</a>
            <div class="text-purple-800 flex flex-row" id="catnavigator"></div>
            <?php if($postid){ ?>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            <?php }?>
            <a href="index.php?poid=<?php echo($postid);?>" class="text-purple-800 max-[1100px]:hidden"> <?php if($postid){ echo substr($name,0,60);}?></a>
            <?php if($catid){ ?>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg><?php
             }?>
            <a href="index.php?cat=<?php echo($catid);?>" class="text-purple-800 "> <?php if($catid){ echo(show_category($catid));}?></a>
    </div>
            ---->
    <div class=" lg:grid-cols-3  lg:flex ">
            <!--left side bar-->    
       
        
        <!--main content middle bar--->
        <div class="lg:w-2/3 mx-2 bg-white rounded Montserrat">
            <?php
            if (!isset($postid ) and !isset($catid) and !isset($popular) and !isset($saved ) )
            { 
            ?>
                <!--blog nav-->
                <div class="flex flex-col">
                    <!--Desktop view--->
                    <!--
                    <div class="text-center max-[640px]:hidden text-gray-700 overflow-x-scroll hide-scroll-bar">
                        <button onclick="latest(); catenavigation('Latest') " class="focus:outline-none mx-2 focus:text-purple-700 active:text-purple-700">Latest</button>
                        <button onclick="Popular(); catenavigation('Popular')" class="focus:outline-none mx-2 focus:text-purple-700 active:text-purple-700">Popular</button>
                        <button onclick="ShowSaved();catenavigation('Saved')" class="focus:outline-none mx-2 focus:text-purple-700 active:text-purple-700">Saved</button>
                        <?php showCate(5); ?>
                        <button id="dropdownDefaultButton1" data-dropdown-toggle="dropdown1" class="inline-flex mx-2 focus:text-purple-700 active:text-purple-700 focus:outline-none" type="button" >See All
                        </button>
                        <div id="dropdown1" class="bg-white z-10 hidden  divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton1">
                                <?php
                                    dropdownCats($ar);
                                    ?>
                            </ul>
                        </div>
                    </div>
            -->

                    <!--Mobile view--->
                    <div class="lg:hidden sm:hidden">
                        <div
                            class="flex flex-col bg-white m-auto p-auto text-gray-700">
                            <div class="flex overflow-x-scroll pb-10 hide-scroll-bar">
                                <div class="flex flex-nowrap  ">
                                    <div class=" bg-white ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="orange" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                                        </svg>
                                    </div>
                                    <?php showcate_mobile_view(); ?>
                                    <div class="bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="orange" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--blog card-->
                <div class="grid place-items-center py-10">
                    <div class="grid place-items-center mydata" id="mydata">
                    </div>
                </div>
            <?php
            } else {
                if($postid){//view individual blog posts in main container.
                    showblogpost($postid);
                }
                if($catid){//view individual category wise blog posts in main container.
                    show_cat_blogposts($catid);
                }
                if($popular){//show popular blog post in main container.
                    show_popular_blogposts();
                }
                if($saved){//show saved posts in main container.
                    show_saved_posts();
                }
            }
            ?>
        </div>

        <!---right sidebar--->
        
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

<script src="js/ajax.js"></script>
</body>
</html>

<?php //require_once('blog_footer.php'); ?>
