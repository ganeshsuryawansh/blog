<?php
session_start();
include('include/dbconnect.php');


error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 0);

include('functions.php');
require_once('blog_header.php');

//these variable get values from url
$postid = $_GET['poid'];
$catid = $_GET['cat'];
$popular = $_GET['pop'];
$saved = $_GET['saved'];


$catname;
$name;
$postcateid;
$userid = $_SESSION['userid'];

//logout button
if (isset($_SESSION['userid'])) {

    ?>
    <a href="logout.php">Logout</a>
    <h1>
        <?php echo ($userid); ?>
    </h1>
    <?php
} else {
    ?>
    <a href="login.php">login</a>
    <?php
}



//this is for navigatoer to print post name
if ($postid) {
    $query = "SELECT * FROM blog_posts WHERE post_id='$postid'";
    $data = $conn->prepare($query);
    $data->execute();
    $rows = $data->fetchAll();
    foreach ($rows as $row) {
        $name = $row['post_title'];
        $postcateid = $row['post_cat'];
    }
}



//these userid comes from main website.

//$userid = "sam@gmail.com";



?>
<input class="inputField h-0 hidden" style="Display:none" type="text" id="userid"
    value="<?php echo ($_SESSION['userid']) ?>" />
<?php

?>
<!--
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
-->
<link rel="stylesheet" href="css/Style.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="https://cdn.tailwindcss.com"></script>

<div class="lg:px-32 bg-gray-200 lg:my-0">

    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full  max-h-full">
            <!-- Modal content -->
            <div class=" align-center relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h1 class="just">List Of All Categories</h1>
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
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <?php list_of_category(); ?>
                </div>

            </div>
        </div>
    </div>

    <div class="h-16 flex justify-end sm:pr-5 lg:pr-0">
        <div id="notification"></div>
    </div>

    <!--Navigator -->
    <div class="my-1 flex sm:ml-5 lg:ml-0 my-2">
        <!---HOME ICON FOR NAVIGATOR---->
        <a class="flex flex-row" href="https://lannister.deals2buy.in/">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path
                    d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                <path
                    d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
            </svg>
            Home </a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        <a href="index.php" class="text-purple-800">Blogs</a>
        <div class="text-purple-800 flex flex-row" id="catnavigator"></div>
        <?php if ($postid) { ?>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        <?php } ?>
        <a href="index.php?poid=<?php echo ($postid); ?>" class="text-purple-800 max-[1100px]:hidden">
            <?php if ($postid) {
                echo substr($name, 0, 60);
            } ?>
        </a>
        <?php if ($catid) { ?>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
            <?php
        } ?>
        <a href="index.php?cat=<?php echo ($catid); ?>"
            class="text-purple-800 visible sm:visible lg:visible xl:visible 2xl:visible">
            <?php if ($catid) {
                echo (show_category($catid));
            } ?>
        </a>
    </div>

    <div class=" lg:grid-cols-3  lg:flex ">
        <!--left side bar-->
        <div class="lg:w-56 max-[1100px]:hidden rounded-lg Montserrat">
            <div class="">
                <div class="shadow-lg Montserrat font-medium bg-[#ffffff] rounded-lg">
                    <h5 class="sm:py-2 ml-2 focus:text-purple-700 active:text-purple-700"><a
                            href="https://lannister.deals2buy.in/about">About Us</a> </h5>
                    <h5 class="sm:py-2 ml-2"><a href="https://lannister.deals2buy.in/advertisewithus">Advertise with
                            us</a> </h5>
                    <h5 class="sm:py-2 ml-2"><a href="https://lannister.deals2buy.in/safetytips">Safety Tips </a> </h5>
                    <h5 class="sm:py-2 ml-2"><a href="https://lannister.deals2buy.in/faq">FAQs </a> </h5>
                    <h5 class="sm:py-2 ml-2"><a href="https://lannister.deals2buy.in/blog/index">Blogs </a> </h5>
                    <h5 class="sm:py-2 ml-2"><a href="https://lannister.deals2buy.in/termsandcondition">Terms &
                            Condition </a> </h5>
                    <h5 class="sm:py-2 ml-2"><a href="https://lannister.deals2buy.in/privacypolicy">Privacy Policy </a>
                    </h5>
                    <h5 class="sm:py-2 ml-2"><a href="https://lannister.deals2buy.in/contact">Contact Us </a> </h5>
                </div>
            </div>
        </div>


        <!--main content middle bar--->
        <div class="lg:w-2/3 sm:mx-4 shadow-lg Montserrat font-medium bg-[#ffffff] rounded-lg Montserrat">
            <?php
            if (!isset($postid) and !isset($catid) and !isset($popular) and !isset($saved)) {
                ?>
            <!--blog nav-->
                <div class="flex flex-col">
                    <!--Desktop view--->
                <div class="text-center max-[640px]:hidden text-gray-700 overflow-x-scroll hide-scroll-bar">
                    <button onclick="alldatafetch(this.value); catenavigation('Latest') " id="latest_desk"
                        class="focus:outline-none mx-2 text-2xl" value="Latest">Latest</button>
                    <button onclick="alldatafetch(this.value); catenavigation('Popular')"
                        class="focus:outline-none mx-2 text-2xl" value="Popular">Popular</button>
                    <button onclick="ShowSaved(); catenavigation('Saved')" class="focus:outline-none mx-2 text-2xl"
                        value="Saved">Saved</button>
                    <?php showCate(5); ?>
                    <!--
                        <button id="dropdownDefaultButton1" onclick="allcatposts();catenavigation('See All Posts')" data-dropdown-toggle="dropdown1" class="inline-flex mx-2 text-2xl focus:outline-none" type="button">See All
                        </button>
                        -->
                        <!-- Dropdown menu -->
                        <!---
                        <div id="dropdown1" class="bg-white z-10 hidden  divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton1">
                                <?php
                                //dropdownCats($ar);
                                ?>
                            </ul>
                        </div>
                        --->
                </div>

                <!--Mobile view--->
                <div class="lg:hidden sm:hidden flex flex-row mt-3">
                    <!---
                        <div class="flex flex-col bg-white m-auto p-auto text-gray-700 visible sm:visible lg:visible">
                            <div class="flex overflow-x-scroll pb-10 hide-scroll-bar">
                                <div class="flex flex-nowrap  ">
                                    <div class=" bg-white ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="orange" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                                        </svg>
                                    </div>
                                    <?php //showcate_mobile_view(); ?>
                                    <div class="bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="orange" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ---->
                        <button class=" bg-white prev ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="orange" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </button>

                        <div class="slider flex flex-row overflow-hidden">
                            <?php showcate_mobile_view(); ?>
                        </div>

                        <button class="bg-white next mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="orange" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>

                    </div>
                </div>
                <!--blog card-->
                <div class="grid place-items-center py-10">
                    <div class="grid place-items-center mydata px-3" id="mydata">
                    </div>
                </div>
                <?php
            } else {
                if ($postid) { //view individual blog posts in main container.
                    showblogpost($postid);
                }
                if ($catid) { //view individual category wise blog posts in main container.
                    show_cat_blogposts($catid);
                }
                if ($popular) { //show all popular blog post in main container.
                    show_popular_blogposts();
                }
                if ($saved) { //show all saved posts in main container.
                    show_saved_posts();
                }
            }
            ?>
        </div>

        <!---right sidebar--->
        <div class="lg:w-56 rounded-lg Montserrat" id="rightsidebar">
            <?php
            if (!isset($postid)) {
                if (!isset($popular)) {
                    if (!isset($saved)) {
                        if (!isset($catid)) {
                            ?>
            <!---popular posts in right sidebar----->
            <div class="max-[1100px]:hidden shadow-lg Montserrat font-medium bg-[#ffffff] rounded-lg pb-3">
                <h5 class="pt-6 ml-3"><b>Popular Posts </b></h5>
                <?php show_popular_posts(3); ?>
                <a href="index.php?pop=1" class="text-purple-800 font-bold ml-3" type="button">
                    See more posts
                </a>
            </div>
            <?php
                        }
                        ?>
            <!-----categories in right sidebar--->
            <div class="max-[1100px]:hidden shadow-lg Montserrat font-medium bg-[#ffffff] rounded-lg my-3 pb-3">
                <h5 class="pt-6 ml-3"><b>Discover More</b></h5>
                <?php discover_more_cat(3); ?>
                <!-- Modal toggle -->
                            <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                                class="text-purple-800 font-bold ml-3 focus:outline-none" type="button">
                                See All Categories
                            </button>
                        </div>
                        <?php
                        if (!isset($catid)) {

                            if (saved_count($userid) == 0) {

                            } else {
                                ?>
                                <!--saved posts in right sidebar--->
            <div class="max-[1100px]:hidden shadow-lg Montserrat font-medium bg-[#ffffff] rounded-lg pb-3">
                <h5 class="pt-6 ml-3"><b>Saved Posts</b></h5>
                <?php saved_post($userid); ?>
                <a class="text-purple-800 font-bold ml-3 focus:outline-none " href="index.php?saved=1"
                    onclick="catenavigation('Saved'); user_not_found_alert();">
                    See All Saved(
                    <?php echo (saved_count($userid)); ?>)
                </a>
            </div>
            <?php
                            }
                        }
                    }
                }
                ?>
            <?php
            } else {
                ?>
            <!---these related posts shows in desktop mode at right side of screen-->
                <!---Related posts show after one blog post can open-->
                <div class="max-[1024px]:hidden shadow-lg Montserrat font-medium bg-[#ffffff] rounded-lg">
                    <h5 class="pt-6 ml-3"><b>Related Posts</b></h5>
                    <?php related_post(); ?>
                </div>
                <?php
            }
            ?>
            <div class="min-[950px]:hidden">
                <?php
                if ($postid) {
                    $_SESSION['related_post_catid'] = $postcateid;
                    ?>
                    <!---
                        <h1 class="font-bold flex justify-center text-4xl Montserrat" >Products you need to Organise </h1>
                        <div>
                            Products You Need To Organise.-
                        </div>
                        --->
                <h1 class="font-bold flex justify-center text-4xl Montserrat">Related posts</h1>
                <div id="related_posts_mobile_tab">
                    <!---related posts in tab and mobile views-->
                        <input class="inputField h-0 hidden" type="number" id="postcateid"
                            value="<?php echo ($postcateid); ?>" />
                    </div>

                    <div class=" flex justify-center">

                        <button onclick="view_more_related_posts()" type="button"
                            class="focus:outline-none w-full sm:w-1/3 sm:visible lg:invisible mx-4 px-2 py-3 bg-gradient-to-br from-[#FF8C42] to-[#EC5A58] rounded-md Montserrat text-xl text-white font-[400] ">
                            VIEW MORE</button>
                    </div>
                    <?php

                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script src="js/ajax.js"></script>

<?php require_once('blog_footer.php'); ?>