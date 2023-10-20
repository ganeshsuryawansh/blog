

console.log("save_unsave_post")
var saveButton = document.getElementById('saveicon');

//save post 
function savepost(id, color){
    console.log(id);
    console.log(color);
}


const saveButton = document.getElementById('saveicon');
//const statusValue = saveButton.getAttribute('status'); // retrieves the value of the "status" attribute, which is "orange".
console.log(statusValue+"status value");

// Add an event listener to the button
saveButton.addEventListener("click", function() {
  if (statusValue === "orange") {
    // If the button text is "Save Post", change it to "Unsave Post"
    
    // Call a function to save the post.
    saveBlogPost(id);
  } else {
    // Call a function to unsave the post
    unsavePost();
  }
});

// Function to save the post


// Function to unsave the post
function unsavePost() {
  // Add your code to unsave the post here
    console.log("Post unsaved");
}

