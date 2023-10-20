





function newlike(id) {
 // user_not_found_alert();

  let like = $('#likesvg');
  like.attr("fill","black");

  var response;
  $.ajax({
    type: "GET",
    url: "data.php?newlike=" + id,
    async: false,
    success: function (text) {
      response = text;
    },
  });

  //showlike(id);
}

function showlike(id) {
  console.log("inside showlike...");
  $.ajax({
    type: "GET",
    url: "data.php?showlike=" + id,
    async: false,
    success: function (text) {
      response = text;
      document.getElementById("showlike").innerHTML = text;
    },
  });
}

function user_not_found_alert() {
  var user_session = document.getElementById("userid").value;

  if (user_session == "") {
    //alert("user id is: "+user_session)
    window.location.href = "login.php";
  }
}

//user_not_found_alert();

/*
let alternatingBoolean = false;

//show drpodown in desktop cards.
function drop_desktop(b) {
    //console.log("inside func , id is: "+b)
    alternatingBoolean = !alternatingBoolean;

    let elem = document.getElementById(b);
    //return alternatingBoolean;
    if(elem){
        
        
        if(alternatingBoolean){
            
            var html=`
            <p class="bg-white"><a href="#">Share</a></p>
            <p class="bg-white"><a href="#">Report</a></p>`;

            elem.innerHTML=html;
        }
        else{
            elem.innerHTML="";
        }
    }
    else{
    }
}

//show dropdown in mobile phone
function drop_mobile(id){
    alternatingBoolean = !alternatingBoolean;

    let elem = document.getElementById(id);
    //return alternatingBoolean;
    console.log(alternatingBoolean);

    if(elem){
        if(alternatingBoolean){
            
            var html=`
            <p class="bg-white"><a href="#">Share</a></p>
            <p class="bg-white"><a href="#">Report</a></p>`;

            elem.innerHTML=html;
        }
        else{
            elem.innerHTML="";
        }
    }
    else{
        //console.log("element not get");
    }
}



*/

let limit = 2;
//view more related posts button function.
function view_more_related_posts() {
  limit = limit + 3;

  var response = "";
  $.ajax({
    type: "GET",
    url: "data.php?showmoreposts=" + 12 + "&limit=" + limit,
    async: false,
    success: function (text) {
      response = text;
    },
  });
  document.getElementById("related_posts_mobile_tab").innerHTML = response;

  $.ajax({
    type: "GET",
    url: "data.php?bydefaultrelated=null",
    async: false,
    success: function (text) {
      response = text;
    },
  });

  function loadPosts(page){
    var response = "";
    $.ajax({
      type: "GET",
      url: "data.php?showmoreposts=" + 12 + "&limit=" + limit,
      async: false,
      success: function (text) {
        response = text;
      },
    });
    document.getElementById("related_posts_mobile_tab").innerHTML = response;

    $.ajax({
      type: "GET",
      url: "data.php?bydefaultrelated=null",
      async: false,
      success: function (text) {
        response = text;
      },
    });
  }

  $(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !isLoading) {
      //alert($(window).scrollTop())
      page++;
      loadPosts(page);
    }
  });
}

//by default blog posts show
$(document).ready(function () {

  
  const prev = document.querySelector('.prev')
  const next = document.querySelector('.next')
  const slider = document.querySelector('.slider')

  prev.addEventListener('click', ()=>{
      slider.scrollLeft -=150
  })
  next.addEventListener('click', ()=>{
      slider.scrollLeft +=150
  })


  var page = 1;
  var isLoading = false;

  var response = "hello";
  $.ajax({
    type: "GET",
    url: "data.php?defaultcat=1",
    async: false,
    success: function (text) {
      response = text;
      console.log(response)
    },
  });
  document.getElementById("mydata").innerHTML = response;
  /*
  function loadPosts(page){
    var response = "hello";
    $.ajax({
      type: "GET",
      url: "data.php?defaultcat=1",
      async: false,
      success: function (text) {
        response = text;
        //console.log(response)
      },
    });
    document.getElementById("mydata").innerHTML = response;
  }

  $(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !isLoading) {
      //alert($(window).scrollTop())
      page++;
      loadPosts(page);
    }
  });
  */
  
  /*
  var latest = $("#latest_desk");
  latest.classList.add("text-purple-800");

  
  var latestmobile = ("#latest_mobile");
  latestmobile.classList.add("text-purple-800");
  */
});

let selectedCategory ='';

function alldatafetch(catname){
  //alert(catname);
  var latest = document.getElementById("latest_desk");
  latest.classList.remove("text-purple-800");

  var latest_mobile = document.getElementById("latest_mobile");
  latest_mobile.classList.remove("text-purple-800");

  //show the right sidebar after click on popular button
  var hide = document.getElementById("rightsidebar");
  hide.classList.remove("hidden");

  var response = "";
  $.ajax({
    type: "GET",
    url: "data.php?"+catname+"=pop",
    async: false,
    success: function (text) {
      response = text;
    },
  });
  document.getElementById("mydata").innerHTML = response;

  selectedCategory = catname;
  var page = 1;
  var isLoading = false;

  function loadPosts(page){

    if (isLoading) {
      return; // Prevent loading posts multiple times
    }
    isLoading = true;

    
    
    $.ajax({
      type: "GET",
      url: "data.php?"+selectedCategory+"=pop",
      async: false,
      success: function (response) {
        document.getElementById("mydata").innerHTML = response;
      },
      error: function (error) {
        console.error('Error retrieving posts:', error);
        isLoading = false;
      },
    });
  }
  loadPosts(page);

  $(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100 && !isLoading) {
      //alert($(window).scrollTop())
      page++;
      loadPosts(page);
    }
  });
  catname ="";
}

/*
$(document).ready(function() {
  var page = 1;
  var isLoading = false;
  var response ="";
  function loadPosts(page) {
    $.ajax({
      url: 'data.php?defaultcat=1',
      type: 'GET',
      data: {page: page},
      beforeSend: function() {
        isLoading = true;
        //$('#loader').show();
      },
      success: function(response) {
        //$('#loader').hide();
        //$('#posts').append(response);
        isLoading = false;
      }
    });
    document.getElementById("mydata").innerHTML = response;

  }

  loadPosts(page);

  $(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !isLoading) {
      page++;
      loadPosts(page);
    }
  });
});
*/

//default show related posts after a individual post.
$(document).ready(function () {
  var catid = 0;
  catid = document.getElementById("postcateid").value;
  //catid = ("#postcateid").value;

  var response = "";
  $.ajax({
    type: "GET",
    url: "data.php?bydefaultrelated=" + catid,
    async: false,
    success: function (text) {
      response = text;
      document.getElementById("related_posts_mobile_tab").innerHTML = text;
    },
  });
  
  /*
  var page = 1;
  var isLoading = false;

  function loadPosts(page){
    
    var response = "";
    $.ajax({
      type: "GET",
      url: "data.php?bydefaultrelated=" + catid,
      async: false,
      success: function (text) {
        response = text;
        document.getElementById("related_posts_mobile_tab").innerHTML = text;
      },
    });
  }

  $(window).scroll(function() {
   if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100 && !isLoading) {
     //alert($(window).scrollTop())
     page++;
     loadPosts(page);
   }
  });
  */
});

// copy posts link to clipbord.
function copy_post_link() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyToClipboard(copyText.value);
}

function copyToClipboard(txt) {
  navigator.clipboard.writeText(txt);
}

//category wise blog
function showBlog(str) {

  var latest = document.getElementById("latest_desk");
  latest.classList.remove("text-purple-800");

  
  var latest_mobile = document.getElementById("latest_mobile");
  latest_mobile.classList.remove("text-purple-800");

  var hide = document.getElementById("rightsidebar");
  hide.classList.remove("hidden");
  if (str == "") {
    document.getElementById("mydata").innerHTML = "";
    return;
  }

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    document.getElementById("mydata").innerHTML = this.responseText;
  };

  xmlhttp.open("GET", "data.php?cat=" + str, true);
  xmlhttp.send();

  var page = 1;
  var isLoading = false;

  function loadPosts(page){
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      document.getElementById("mydata").innerHTML = this.responseText;
    };
  
    xmlhttp.open("GET", "data.php?cat=" + str, true);
    xmlhttp.send();
  }

  $(window).scroll(function() {
   if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100 && !isLoading) {
     //alert($(window).scrollTop())
     page++;
     loadPosts(page);
     
   }
   
  });

}

//category navigation
function catenavigation(catname) {
  //console.log("function called gs")
  var b = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>`;
  document.getElementById("catnavigator").innerHTML = b + catname;
}

//function to save the post.
function saveBlogPost(id) {

  //let iconid = document.getElementById('saveicon'+id);
  //console.log("save icon id "+iconid)

  

  console.log("Post saved");

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", "data.php?saveid=" + id, true);
  xmlhttp.send();

  //alert("function called"+id);
  let notify = `
    <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ml-3 text-sm font-normal"><b>Posts Saved</b></b>
        <a href="?saved=1" class="mx-2 text-purple-700"><b>See All Saved<b/></a>
        </div>
    </div>`;

  var user_session = document.getElementById("userid").value;
  console.log("user id is: " + user_session);

  if (user_session == "") {
    console.log("user not found");

  } else {
    const notification = document.createElement("div");
    notification.innerHTML = notify;
    document.getElementById("notification").appendChild(notification);
    setTimeout(() => {
      notification.remove();
    }, 3000);


    //let postid = 'saveicon'+id;
    //replaceIconSave(postid);
  }
}

// Function to unsave the post
function unsavePost(id) {
  console.log("Post unsaved");


  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", "data.php?unsaveid=" + id, true);
  xmlhttp.send();

   
 

  let notify = `
    <div id="toast-red" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ml-3 text-sm font-normal"><b>Posts Unsaved</b></b>
        <a href="?saved=1" class="mx-2 text-purple-700"><b>See All Saved<b/></a>
        </div>
    </div>`;

  var user_session = document.getElementById("userid").value;
  console.log("user id is: " + user_session);

  if (user_session == "") {
    console.log("user not found");
  
  } else {
    const notification = document.createElement("div");
    notification.innerHTML = notify;
    document.getElementById("notification").appendChild(notification);
    setTimeout(() => {
      notification.remove();
    }, 3000);

     
    //let postid = 'saveicon'+id;
    //replaceIconUnsave(postid);
  }
}


//save post
function savepost(id, color) {
  user_not_found_alert();

  console.log(color+"  "+id);

  save_unsave_icon_changer(id,color);


  if (color === "white") {
    // Call a function to save the post.
    saveBlogPost(id);
  }
  
  if(color=="orange") {
    // Call a function to unsave the post
    unsavePost(id);
   
  }
}

function save_unsave_icon_changer(id,color){
  //var svg = document.getElementById(id);
  var svg = $("#" + id);
  console.log(svg);

  if (color === "white") {
    
    svg.removeAttr("fill");
    svg.attr("fill","orange");
  }
  else{
    svg.removeAttr("fill");
    svg.attr("fill","white");
  }
}


//letest blogs
function latest() {

  var latest = document.getElementById("latest_desk");
  latest.classList.remove("text-purple-800");

  var latest_mobile = document.getElementById("latest_mobile");
  latest_mobile.classList.remove("text-purple-800");

  //hide the right side bar after click on save post 
  var hide = document.getElementById("rightsidebar");
  hide.classList.remove("hidden");

  var response = "";
  $.ajax({
    type: "GET",
    url: "data.php?rcblog=rc",
    async: false,
    success: function (text) {
      response = text;
    },
  });
  document.getElementById("mydata").innerHTML = response;
  


  var page = 1;
  var isLoading = false;

  function loadPosts(page){
    
    var response = "";
    $.ajax({
      type: "GET",
      url: "data.php?rcblog=rc",
      async: false,
      success: function (text) {
        response = text;
      },
    });
    document.getElementById("mydata").innerHTML = response;
  }

   $(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100 && !isLoading) {
      //alert($(window).scrollTop())
      page++;
      loadPosts(page);
    }
  });
}

var selectedCategory2 = ''; 
function Popular() {

  var latest = document.getElementById("latest_desk");
  latest.classList.remove("text-purple-800");

  var latest_mobile = document.getElementById("latest_mobile");
  latest_mobile.classList.remove("text-purple-800");

  //show the right sidebar after click on popular button
  var hide = document.getElementById("rightsidebar");
  hide.classList.remove("hidden");

  var response = "";
  $.ajax({
    type: "GET",
    url: "data.php?popular=pop",
    async: false,
    success: function (text) {
      response = text;
    },
  });
  document.getElementById("mydata").innerHTML = response;


  var page = 1;
  var isLoading = false;

  function loadPosts(page){
    if (isLoading) {
      return; // Prevent loading posts multiple times
    }

    isLoading = true;

    $.ajax({
      type: "GET",
      url: "data.php?popular=pop",
      async: false,
      success: function (response) {
        document.getElementById("mydata").innerHTML = response;
      },
      error: function (error) {
        console.error('Error retrieving posts:', error);
        isLoading = false;
      },
    });
  }

  loadPosts(page);

   $(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !isLoading) {
      //alert($(window).scrollTop())
      page++;
      loadPosts(page);
    }
  });
}

function allcatposts(){
  var latest = document.getElementById("latest_desk");
  latest.classList.remove("text-purple-800");

  var latest_mobile = document.getElementById("latest_mobile");
  latest_mobile.classList.remove("text-purple-800");

  //show the right sidebar after click on popular button
  var hide = document.getElementById("rightsidebar");
  hide.classList.remove("hidden");


  var response = "";
  $.ajax({
    type: "GET",
    url: "data.php?allcatposts=allposts",
    async: false,
    success: function (text) {
      response = text;
    },
  });
  document.getElementById("mydata").innerHTML = response;

  var page = 1;
  var isLoading = false;

  function loadPosts(page){
    var response = "";
    $.ajax({
      type: "GET",
      url: "data.php?allcatposts=allposts",
      async: false,
      success: function (text) {
        response = text;
      },
    });
    document.getElementById("mydata").innerHTML = response;
  }

   $(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !isLoading) {
      //alert($(window).scrollTop())
      page++;
      loadPosts(page);
    }
  });
}

//show saved posts.
function ShowSaved() {
  
  var page = 1;
  var isLoading= false;

  var latest = document.getElementById("latest_desk");
  latest.classList.remove("text-purple-800");

  var latest_mobile = document.getElementById("latest_mobile");
  latest_mobile.classList.remove("text-purple-800");

  //show the right sidebar after click on popular button
  var hide = document.getElementById("rightsidebar");
  hide.classList.add("hidden");

  user_not_found_alert();
  var response = "";
  $.ajax({
    type: "GET",
    url: "data.php?Saved=savedpost",
    async: false,
    success: function (text) {
      response = text;
    },
  });
  document.getElementById("mydata").innerHTML = response;

  /*
  //infinite scrolling
  function loadPosts(page){
    var response = "";
    $.ajax({
      type: "GET",
      url: "data.php?saved=savedpost",
      async: false,
      success: function (text) {
        response = text;
    },
  });
  document.getElementById("mydata").innerHTML = response;

  $(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !isLoading) {
      //alert($(window).scrollTop())
      page++;
      loadPosts(page);
    }
  });
  }
  */
}


