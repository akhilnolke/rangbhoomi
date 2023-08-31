<?php
session_start();
  $page = 'Artist Profile';
  include('inc/header.php'); 
 
  
 
   if (isset($_SESSION['UserID'])) {
    // ... (existing code to fetch profile information)
    // Output the profile information in an HTML form
  
  ?>
  
 <style>
 section.artist-art_sec {
    position: relative;
    z-index: -1;
}
  /* Basic CSS styles for the chat window */
#chatWindow {
    position: absolute;
    right: 0;
    width: 300px;
    border: 1px solid #ccc;
    z-index: auto;
    background-color: #f9f9f9;
    padding: 10px;
}

/* Chat window header styles */
.chat-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
}

/* Close button styles */
.close-button {
  padding: 5px 10px;
  background-color: #7b7d80;
  border: none;
  cursor: pointer;
}

/* Message area styles */
#messageArea {
    height: 168px;
    overflow-y: auto;
    border: 1px solid #e5e5e5;
    padding: 5px;
    background: #fff;
    margin-bottom: 10px;
}

/* Input and button styles */
input[type="text"] {
  width: 100%;
  margin-bottom: 5px;
  padding: 5px;
}

button {
  background-color: #212529;
  color: white;
  border: none;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;
}
   
   
 </style> 
  
  
  
<body>
  <main class="main-container">
    <div class="contain-wrapper">
      <!-- header -->
       
       
        <!--Product listing section-->
        <section class="product-listing-section">
          <div class="product-listing-content-wrap">
            <div class="m-4">
              <div class="filter-content-wrap">
                <div class="row">
                  <div class="col-md-2">
                    <img class="artist_img" src="assets/img/default_profile.png" alt="artist profile img">
                  </div>
                  <div class="col-md-5 artist-portfolio">
                    <div class="artist-name-location">
                      <p class="m-0"><span class="fw-bold">Name: </span><?=$artistprofile['username'];?></p>
                      <span style="font-size:12px;">
                        <svg viewBox="0 0 24 24">
                          <path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                        </svg>
                        <?=$artistprofile['state'];?> ,  <?=$artistprofile['country'];?>
                      </span>
                    </div>
                  </div>
                  <div class= "col-md-5 social-btn-icons text-right">
                    <div>
                        
                        <!--chat button code Start -->
                        
                      <button type="button" class="btn btn-dark" onclick="openChat()" >Chat</button>
                      
  <!-- Hidden chat window that will appear when the user clicks the chat button -->
<div id="chatWindow" style="display: none;">
  <div class="chat-header">
    <h3>Chat with Artist</h3>
    <button class="close-button" onclick="closeChat()">Close</button>
  </div>
  <div id="messageArea"></div>
  <input type="text" id="messageInput" placeholder="Type your message..." style=" border: 1px solid #e5e5e5;">
  <button onclick="sendMessage()">Send</button>
</div>

 <!--chat button code End -->



<svg id="shareButton" viewBox="0 0 24 24">
  <path d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" />
</svg>

<!-- Social icon links -->
<div id="socialIcons">
  <a href="https://example.com/facebook" target="_blank"><img src="assets/img/facebook-icon.jpg" style="height:50px; width:50px;" alt="Facebook"></a>
  <a href="https://example.com/twitter" target="_blank"><img src="assets/img/twitter-icon.png" style="height:50px; width:50px;" alt="Twitter"></a>
  <!-- Add more social icons and links as needed -->
</div>



                    </div>
                  </div>
                </div>
                <div class="artist-details p-3">
                  <div class="artist-details-content">
                    <!--<div class="about_artist ">-->
                    <!--            <h6 class="m-0 fw-bold">Passionate About</h6>-->
                    <!--            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>-->
                    <!--     </div>-->
                    <div class="about_artist">
                      <h6 class="m-0 fw-bold">About artist</h6>
                      <p class="m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="artist-menu-sec px-4">
              <div class="artist-menu-list ">
                <ul class="artist-list d-flex   list-unstyled">
                  <li class="rounded">Artworks</li>
                  <li class="rounded">Commission</li>
                  <li class="rounded">Bio</li>
                </ul>
              </div>
            </div>
            <section class="artist-art_sec">
              <div class="art-sec-content">
                <div class="contain-wrapper">
                  <h2 class="px-2 py-2">Commission </h2>
                  <div class="row mb-3">
                    <div class="col-md-3 col-rt-prod-list">
                      <div class="product-content_wrap rounded">
                        <div class="wish-image" style=" ">
                          <img src="assets/img/027384164265177 1.png" alt="wish-image"> 
                        </div>
                        <div class="title-artist-wrap px-1 py-1">
                          <h6 class="m-0 fw-bold">Water color painting of a girl standing ..</h6>
                          <p>Rahul Kumar</p>
                          <div class=" ">
                            <p class="text-black m-0">Print</p>
                            <p class="text-black m-0">Canvas</p>
                            <div class="d-flex justify-content-between" style="height:20px">
                              <p class="text-black m-0">100 X 100</p>
                              <p>₹123</p>
                            </div>
                          </div>
                        </div>
                        <div class="">
                          <div class="favorite-addcart-section d-flex justify-content-center align-items-center p-2   gap-2">
                            <div class="favorite-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
                              </svg>
                            </div>
                            <div class="add-to-cart-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M18 16.08C17.24 16.08 16.56 16.38 16.04 16.85L8.91 12.7C8.96 12.47 9 12.24 9 12S8.96 11.53 8.91 11.3L15.96 7.19C16.5 7.69 17.21 8 18 8C19.66 8 21 6.66 21 5S19.66 2 18 2 15 3.34 15 5C15 5.24 15.04 5.47 15.09 5.7L8.04 9.81C7.5 9.31 6.79 9 6 9C4.34 9 3 10.34 3 12S4.34 15 6 15C6.79 15 7.5 14.69 8.04 14.19L15.16 18.34C15.11 18.55 15.08 18.77 15.08 19C15.08 20.61 16.39 21.91 18 21.91S20.92 20.61 20.92 19C20.92 17.39 19.61 16.08 18 16.08M18 4C18.55 4 19 4.45 19 5S18.55 6 18 6 17 5.55 17 5 17.45 4 18 4M6 13C5.45 13 5 12.55 5 12S5.45 11 6 11 7 11.45 7 12 6.55 13 6 13M18 20C17.45 20 17 19.55 17 19S17.45 18 18 18 19 18.45 19 19 18.55 20 18 20Z"></path>
                              </svg>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-rt-prod-list">
                      <div class="product-content_wrap rounded">
                        <div class="wish-image" style=" ">
                          <img src="assets/img/027384164265177 1.png" alt="wish-image"> 
                        </div>
                        <div class="title-artist-wrap px-1 py-1">
                          <h6 class="m-0 fw-bold">Water color painting of a girl standing ..</h6>
                          <p>Rahul Kumar</p>
                          <div class=" ">
                            <p class="text-black m-0">Print</p>
                            <p class="text-black m-0">Canvas</p>
                            <div class="d-flex justify-content-between" style="height:20px">
                              <p class="text-black m-0">100 X 100</p>
                              <p>₹123</p>
                            </div>
                          </div>
                        </div>
                        <div class="">
                          <div class="favorite-addcart-section d-flex justify-content-center align-items-center p-2   gap-2">
                            <div class="favorite-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
                              </svg>
                            </div>
                            <div class="add-to-cart-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M18 16.08C17.24 16.08 16.56 16.38 16.04 16.85L8.91 12.7C8.96 12.47 9 12.24 9 12S8.96 11.53 8.91 11.3L15.96 7.19C16.5 7.69 17.21 8 18 8C19.66 8 21 6.66 21 5S19.66 2 18 2 15 3.34 15 5C15 5.24 15.04 5.47 15.09 5.7L8.04 9.81C7.5 9.31 6.79 9 6 9C4.34 9 3 10.34 3 12S4.34 15 6 15C6.79 15 7.5 14.69 8.04 14.19L15.16 18.34C15.11 18.55 15.08 18.77 15.08 19C15.08 20.61 16.39 21.91 18 21.91S20.92 20.61 20.92 19C20.92 17.39 19.61 16.08 18 16.08M18 4C18.55 4 19 4.45 19 5S18.55 6 18 6 17 5.55 17 5 17.45 4 18 4M6 13C5.45 13 5 12.55 5 12S5.45 11 6 11 7 11.45 7 12 6.55 13 6 13M18 20C17.45 20 17 19.55 17 19S17.45 18 18 18 19 18.45 19 19 18.55 20 18 20Z"></path>
                              </svg>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-rt-prod-list">
                      <div class="product-content_wrap rounded">
                        <div class="wish-image" style=" ">
                          <img src="assets/img/027384164265177 1.png" alt="wish-image"> 
                        </div>
                        <div class="title-artist-wrap px-1 py-1">
                          <h6 class="m-0 fw-bold">Water color painting of a girl standing ..</h6>
                          <p>Rahul Kumar</p>
                          <div class=" ">
                            <p class="text-black m-0">Print</p>
                            <p class="text-black m-0">Canvas</p>
                            <div class="d-flex justify-content-between" style="height:20px">
                              <p class="text-black m-0">100 X 100</p>
                              <p>₹123</p>
                            </div>
                          </div>
                        </div>
                        <div class="">
                          <div class="favorite-addcart-section d-flex justify-content-center align-items-center p-2   gap-2">
                            <div class="favorite-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
                              </svg>
                            </div>
                            <div class="add-to-cart-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M18 16.08C17.24 16.08 16.56 16.38 16.04 16.85L8.91 12.7C8.96 12.47 9 12.24 9 12S8.96 11.53 8.91 11.3L15.96 7.19C16.5 7.69 17.21 8 18 8C19.66 8 21 6.66 21 5S19.66 2 18 2 15 3.34 15 5C15 5.24 15.04 5.47 15.09 5.7L8.04 9.81C7.5 9.31 6.79 9 6 9C4.34 9 3 10.34 3 12S4.34 15 6 15C6.79 15 7.5 14.69 8.04 14.19L15.16 18.34C15.11 18.55 15.08 18.77 15.08 19C15.08 20.61 16.39 21.91 18 21.91S20.92 20.61 20.92 19C20.92 17.39 19.61 16.08 18 16.08M18 4C18.55 4 19 4.45 19 5S18.55 6 18 6 17 5.55 17 5 17.45 4 18 4M6 13C5.45 13 5 12.55 5 12S5.45 11 6 11 7 11.45 7 12 6.55 13 6 13M18 20C17.45 20 17 19.55 17 19S17.45 18 18 18 19 18.45 19 19 18.55 20 18 20Z"></path>
                              </svg>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-rt-prod-list">
                      <div class="product-content_wrap rounded">
                        <div class="wish-image" style=" ">
                          <img src="assets/img/027384164265177 1.png" alt="wish-image"> 
                        </div>
                        <div class="title-artist-wrap px-1 py-1">
                          <h6 class="m-0 fw-bold">Water color painting of a girl standing ..</h6>
                          <p>Rahul Kumar</p>
                          <div class=" ">
                            <p class="text-black m-0">Print</p>
                            <p class="text-black m-0">Canvas</p>
                            <div class="d-flex justify-content-between" style="height:20px">
                              <p class="text-black m-0">100 X 100</p>
                              <p>₹123</p>
                            </div>
                          </div>
                        </div>
                        <div class="">
                          <div class="favorite-addcart-section d-flex justify-content-center align-items-center p-2   gap-2">
                            <div class="favorite-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
                              </svg>
                            </div>
                            <div class="add-to-cart-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M18 16.08C17.24 16.08 16.56 16.38 16.04 16.85L8.91 12.7C8.96 12.47 9 12.24 9 12S8.96 11.53 8.91 11.3L15.96 7.19C16.5 7.69 17.21 8 18 8C19.66 8 21 6.66 21 5S19.66 2 18 2 15 3.34 15 5C15 5.24 15.04 5.47 15.09 5.7L8.04 9.81C7.5 9.31 6.79 9 6 9C4.34 9 3 10.34 3 12S4.34 15 6 15C6.79 15 7.5 14.69 8.04 14.19L15.16 18.34C15.11 18.55 15.08 18.77 15.08 19C15.08 20.61 16.39 21.91 18 21.91S20.92 20.61 20.92 19C20.92 17.39 19.61 16.08 18 16.08M18 4C18.55 4 19 4.45 19 5S18.55 6 18 6 17 5.55 17 5 17.45 4 18 4M6 13C5.45 13 5 12.55 5 12S5.45 11 6 11 7 11.45 7 12 6.55 13 6 13M18 20C17.45 20 17 19.55 17 19S17.45 18 18 18 19 18.45 19 19 18.55 20 18 20Z"></path>
                              </svg>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-3 col-rt-prod-list">
                      <div class="product-content_wrap rounded">
                        <div class="wish-image" style=" ">
                          <img src="assets/img/027384164265177 1.png" alt="wish-image"> 
                        </div>
                        <div class="title-artist-wrap px-1 py-1">
                          <h6 class="m-0 fw-bold">Water color painting of a girl standing ..</h6>
                          <p>Rahul Kumar</p>
                          <div class=" ">
                            <p class="text-black m-0">Print</p>
                            <p class="text-black m-0">Canvas</p>
                            <div class="d-flex justify-content-between" style="height:20px">
                              <p class="text-black m-0">100 X 100</p>
                              <p>₹123</p>
                            </div>
                          </div>
                        </div>
                        <div class="">
                          <div class="favorite-addcart-section d-flex justify-content-center align-items-center p-2   gap-2">
                            <div class="favorite-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
                              </svg>
                            </div>
                            <div class="add-to-cart-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M18 16.08C17.24 16.08 16.56 16.38 16.04 16.85L8.91 12.7C8.96 12.47 9 12.24 9 12S8.96 11.53 8.91 11.3L15.96 7.19C16.5 7.69 17.21 8 18 8C19.66 8 21 6.66 21 5S19.66 2 18 2 15 3.34 15 5C15 5.24 15.04 5.47 15.09 5.7L8.04 9.81C7.5 9.31 6.79 9 6 9C4.34 9 3 10.34 3 12S4.34 15 6 15C6.79 15 7.5 14.69 8.04 14.19L15.16 18.34C15.11 18.55 15.08 18.77 15.08 19C15.08 20.61 16.39 21.91 18 21.91S20.92 20.61 20.92 19C20.92 17.39 19.61 16.08 18 16.08M18 4C18.55 4 19 4.45 19 5S18.55 6 18 6 17 5.55 17 5 17.45 4 18 4M6 13C5.45 13 5 12.55 5 12S5.45 11 6 11 7 11.45 7 12 6.55 13 6 13M18 20C17.45 20 17 19.55 17 19S17.45 18 18 18 19 18.45 19 19 18.55 20 18 20Z"></path>
                              </svg>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-rt-prod-list">
                      <div class="product-content_wrap rounded">
                        <div class="wish-image" style=" ">
                          <img src="assets/img/027384164265177 1.png" alt="wish-image"> 
                        </div>
                        <div class="title-artist-wrap px-1 py-1">
                          <h6 class="m-0 fw-bold">Water color painting of a girl standing ..</h6>
                          <p>Rahul Kumar</p>
                          <div class=" ">
                            <p class="text-black m-0">Print</p>
                            <p class="text-black m-0">Canvas</p>
                            <div class="d-flex justify-content-between" style="height:20px">
                              <p class="text-black m-0">100 X 100</p>
                              <p>₹123</p>
                            </div>
                          </div>
                        </div>
                        <div class="">
                          <div class="favorite-addcart-section d-flex justify-content-center align-items-center p-2   gap-2">
                            <div class="favorite-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
                              </svg>
                            </div>
                            <div class="add-to-cart-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M18 16.08C17.24 16.08 16.56 16.38 16.04 16.85L8.91 12.7C8.96 12.47 9 12.24 9 12S8.96 11.53 8.91 11.3L15.96 7.19C16.5 7.69 17.21 8 18 8C19.66 8 21 6.66 21 5S19.66 2 18 2 15 3.34 15 5C15 5.24 15.04 5.47 15.09 5.7L8.04 9.81C7.5 9.31 6.79 9 6 9C4.34 9 3 10.34 3 12S4.34 15 6 15C6.79 15 7.5 14.69 8.04 14.19L15.16 18.34C15.11 18.55 15.08 18.77 15.08 19C15.08 20.61 16.39 21.91 18 21.91S20.92 20.61 20.92 19C20.92 17.39 19.61 16.08 18 16.08M18 4C18.55 4 19 4.45 19 5S18.55 6 18 6 17 5.55 17 5 17.45 4 18 4M6 13C5.45 13 5 12.55 5 12S5.45 11 6 11 7 11.45 7 12 6.55 13 6 13M18 20C17.45 20 17 19.55 17 19S17.45 18 18 18 19 18.45 19 19 18.55 20 18 20Z"></path>
                              </svg>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-rt-prod-list">
                      <div class="product-content_wrap rounded">
                        <div class="wish-image" style=" ">
                          <img src="assets/img/027384164265177 1.png" alt="wish-image"> 
                        </div>
                        <div class="title-artist-wrap px-1 py-1">
                          <h6 class="m-0 fw-bold">Water color painting of a girl standing ..</h6>
                          <p>Rahul Kumar</p>
                          <div class=" ">
                            <p class="text-black m-0">Print</p>
                            <p class="text-black m-0">Canvas</p>
                            <div class="d-flex justify-content-between" style="height:20px">
                              <p class="text-black m-0">100 X 100</p>
                              <p>₹123</p>
                            </div>
                          </div>
                        </div>
                          <div class="">
                          <div class="favorite-addcart-section d-flex justify-content-center align-items-center p-2   gap-2">
                            <div class="favorite-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
                              </svg>
                            </div>
                            <div class="add-to-cart-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M18 16.08C17.24 16.08 16.56 16.38 16.04 16.85L8.91 12.7C8.96 12.47 9 12.24 9 12S8.96 11.53 8.91 11.3L15.96 7.19C16.5 7.69 17.21 8 18 8C19.66 8 21 6.66 21 5S19.66 2 18 2 15 3.34 15 5C15 5.24 15.04 5.47 15.09 5.7L8.04 9.81C7.5 9.31 6.79 9 6 9C4.34 9 3 10.34 3 12S4.34 15 6 15C6.79 15 7.5 14.69 8.04 14.19L15.16 18.34C15.11 18.55 15.08 18.77 15.08 19C15.08 20.61 16.39 21.91 18 21.91S20.92 20.61 20.92 19C20.92 17.39 19.61 16.08 18 16.08M18 4C18.55 4 19 4.45 19 5S18.55 6 18 6 17 5.55 17 5 17.45 4 18 4M6 13C5.45 13 5 12.55 5 12S5.45 11 6 11 7 11.45 7 12 6.55 13 6 13M18 20C17.45 20 17 19.55 17 19S17.45 18 18 18 19 18.45 19 19 18.55 20 18 20Z"></path>
                              </svg>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-rt-prod-list">
                      <div class="product-content_wrap rounded">
                        <div class="wish-image" style=" ">
                          <img src="assets/img/027384164265177 1.png" alt="wish-image"> 
                        </div>
                        <div class="title-artist-wrap px-1 py-1">
                          <h6 class="m-0 fw-bold">Water color painting of a girl standing ..</h6>
                          <p>Rahul Kumar</p>
                          <div class=" ">
                            <p class="text-black m-0">Print</p>
                            <p class="text-black m-0">Canvas</p>
                            <div class="d-flex justify-content-between" style="height:20px">
                              <p class="text-black m-0">100 X 100</p>
                              <p>₹123</p>
                            </div>
                          </div>
                        </div>
                        <div class="">
                          <div class="favorite-addcart-section d-flex justify-content-center align-items-center p-2   gap-2">
                            <div class="favorite-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
                              </svg>
                            </div>
                            <div class="add-to-cart-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M18 16.08C17.24 16.08 16.56 16.38 16.04 16.85L8.91 12.7C8.96 12.47 9 12.24 9 12S8.96 11.53 8.91 11.3L15.96 7.19C16.5 7.69 17.21 8 18 8C19.66 8 21 6.66 21 5S19.66 2 18 2 15 3.34 15 5C15 5.24 15.04 5.47 15.09 5.7L8.04 9.81C7.5 9.31 6.79 9 6 9C4.34 9 3 10.34 3 12S4.34 15 6 15C6.79 15 7.5 14.69 8.04 14.19L15.16 18.34C15.11 18.55 15.08 18.77 15.08 19C15.08 20.61 16.39 21.91 18 21.91S20.92 20.61 20.92 19C20.92 17.39 19.61 16.08 18 16.08M18 4C18.55 4 19 4.45 19 5S18.55 6 18 6 17 5.55 17 5 17.45 4 18 4M6 13C5.45 13 5 12.55 5 12S5.45 11 6 11 7 11.45 7 12 6.55 13 6 13M18 20C17.45 20 17 19.55 17 19S17.45 18 18 18 19 18.45 19 19 18.55 20 18 20Z"></path>
                              </svg>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-3 col-rt-prod-list">
                      <div class="product-content_wrap rounded">
                        <div class="wish-image" style=" ">
                          <img src="assets/img/027384164265177 1.png" alt="wish-image"> 
                        </div>
                        <div class="title-artist-wrap px-1 py-1">
                          <h6 class="m-0 fw-bold">Water color painting of a girl standing ..</h6>
                          <p>Rahul Kumar</p>
                          <div class=" ">
                            <p class="text-black m-0">Print</p>
                            <p class="text-black m-0">Canvas</p>
                            <div class="d-flex justify-content-between" style="height:20px">
                              <p class="text-black m-0">100 X 100</p>
                              <p>₹123</p>
                            </div>
                          </div>
                        </div>
                        <div class="">
                          <div class="favorite-addcart-section d-flex justify-content-center align-items-center p-2   gap-2">
                            <div class="favorite-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
                              </svg>
                            </div>
                            <div class="add-to-cart-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M18 16.08C17.24 16.08 16.56 16.38 16.04 16.85L8.91 12.7C8.96 12.47 9 12.24 9 12S8.96 11.53 8.91 11.3L15.96 7.19C16.5 7.69 17.21 8 18 8C19.66 8 21 6.66 21 5S19.66 2 18 2 15 3.34 15 5C15 5.24 15.04 5.47 15.09 5.7L8.04 9.81C7.5 9.31 6.79 9 6 9C4.34 9 3 10.34 3 12S4.34 15 6 15C6.79 15 7.5 14.69 8.04 14.19L15.16 18.34C15.11 18.55 15.08 18.77 15.08 19C15.08 20.61 16.39 21.91 18 21.91S20.92 20.61 20.92 19C20.92 17.39 19.61 16.08 18 16.08M18 4C18.55 4 19 4.45 19 5S18.55 6 18 6 17 5.55 17 5 17.45 4 18 4M6 13C5.45 13 5 12.55 5 12S5.45 11 6 11 7 11.45 7 12 6.55 13 6 13M18 20C17.45 20 17 19.55 17 19S17.45 18 18 18 19 18.45 19 19 18.55 20 18 20Z"></path>
                              </svg>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-rt-prod-list">
                      <div class="product-content_wrap rounded">
                        <div class="wish-image" style=" ">
                          <img src="assets/img/027384164265177 1.png" alt="wish-image"> 
                        </div>
                        <div class="title-artist-wrap px-1 py-1">
                          <h6 class="m-0 fw-bold">Water color painting of a girl standing ..</h6>
                          <p>Rahul Kumar</p>
                          <div class=" ">
                            <p class="text-black m-0">Print</p>
                            <p class="text-black m-0">Canvas</p>
                            <div class="d-flex justify-content-between" style="height:20px">
                              <p class="text-black m-0">100 X 100</p>
                              <p>₹123</p>
                            </div>
                          </div>
                        </div>
                        <div class="">
                          <div class="favorite-addcart-section d-flex justify-content-center align-items-center p-2   gap-2">
                            <div class="favorite-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
                              </svg>
                            </div>
                            <div class="add-to-cart-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M18 16.08C17.24 16.08 16.56 16.38 16.04 16.85L8.91 12.7C8.96 12.47 9 12.24 9 12S8.96 11.53 8.91 11.3L15.96 7.19C16.5 7.69 17.21 8 18 8C19.66 8 21 6.66 21 5S19.66 2 18 2 15 3.34 15 5C15 5.24 15.04 5.47 15.09 5.7L8.04 9.81C7.5 9.31 6.79 9 6 9C4.34 9 3 10.34 3 12S4.34 15 6 15C6.79 15 7.5 14.69 8.04 14.19L15.16 18.34C15.11 18.55 15.08 18.77 15.08 19C15.08 20.61 16.39 21.91 18 21.91S20.92 20.61 20.92 19C20.92 17.39 19.61 16.08 18 16.08M18 4C18.55 4 19 4.45 19 5S18.55 6 18 6 17 5.55 17 5 17.45 4 18 4M6 13C5.45 13 5 12.55 5 12S5.45 11 6 11 7 11.45 7 12 6.55 13 6 13M18 20C17.45 20 17 19.55 17 19S17.45 18 18 18 19 18.45 19 19 18.55 20 18 20Z"></path>
                              </svg>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-rt-prod-list">
                      <div class="product-content_wrap rounded">
                        <div class="wish-image" style=" ">
                          <img src="assets/img/027384164265177 1.png" alt="wish-image"> 
                        </div>
                        <div class="title-artist-wrap px-1 py-1">
                          <h6 class="m-0 fw-bold">Water color painting of a girl standing ..</h6>
                          <p>Rahul Kumar</p>
                          <div class=" ">
                            <p class="text-black m-0">Print</p>
                            <p class="text-black m-0">Canvas</p>
                            <div class="d-flex justify-content-between" style="height:20px">
                              <p class="text-black m-0">100 X 100</p>
                              <p>₹123</p>
                            </div>
                          </div>
                        </div>
                        <div class="">
                          <div class="favorite-addcart-section d-flex justify-content-center align-items-center p-2   gap-2">
                            <div class="favorite-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
                              </svg>
                            </div>
                            <div class="add-to-cart-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M18 16.08C17.24 16.08 16.56 16.38 16.04 16.85L8.91 12.7C8.96 12.47 9 12.24 9 12S8.96 11.53 8.91 11.3L15.96 7.19C16.5 7.69 17.21 8 18 8C19.66 8 21 6.66 21 5S19.66 2 18 2 15 3.34 15 5C15 5.24 15.04 5.47 15.09 5.7L8.04 9.81C7.5 9.31 6.79 9 6 9C4.34 9 3 10.34 3 12S4.34 15 6 15C6.79 15 7.5 14.69 8.04 14.19L15.16 18.34C15.11 18.55 15.08 18.77 15.08 19C15.08 20.61 16.39 21.91 18 21.91S20.92 20.61 20.92 19C20.92 17.39 19.61 16.08 18 16.08M18 4C18.55 4 19 4.45 19 5S18.55 6 18 6 17 5.55 17 5 17.45 4 18 4M6 13C5.45 13 5 12.55 5 12S5.45 11 6 11 7 11.45 7 12 6.55 13 6 13M18 20C17.45 20 17 19.55 17 19S17.45 18 18 18 19 18.45 19 19 18.55 20 18 20Z"></path>
                              </svg>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-rt-prod-list">
                      <div class="product-content_wrap rounded">
                        <div class="wish-image" style=" ">
                          <img src="assets/img/027384164265177 1.png" alt="wish-image"> 
                        </div>
                        <div class="title-artist-wrap px-1 py-1">
                          <h6 class="m-0 fw-bold">Water color painting of a girl standing ..</h6>
                          <p>Rahul Kumar</p>
                          <div class=" ">
                            <p class="text-black m-0">Print</p>
                            <p class="text-black m-0">Canvas</p>
                            <div class="d-flex justify-content-between" style="height:20px">
                              <p class="text-black m-0">100 X 100</p>
                              <p>₹123</p>
                            </div>
                          </div>
                        </div>
                        <div class="">
                          <div class="favorite-addcart-section d-flex justify-content-center align-items-center p-2   gap-2">
                            <div class="favorite-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
                              </svg>
                            </div>
                            <div class="add-to-cart-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M18 16.08C17.24 16.08 16.56 16.38 16.04 16.85L8.91 12.7C8.96 12.47 9 12.24 9 12S8.96 11.53 8.91 11.3L15.96 7.19C16.5 7.69 17.21 8 18 8C19.66 8 21 6.66 21 5S19.66 2 18 2 15 3.34 15 5C15 5.24 15.04 5.47 15.09 5.7L8.04 9.81C7.5 9.31 6.79 9 6 9C4.34 9 3 10.34 3 12S4.34 15 6 15C6.79 15 7.5 14.69 8.04 14.19L15.16 18.34C15.11 18.55 15.08 18.77 15.08 19C15.08 20.61 16.39 21.91 18 21.91S20.92 20.61 20.92 19C20.92 17.39 19.61 16.08 18 16.08M18 4C18.55 4 19 4.45 19 5S18.55 6 18 6 17 5.55 17 5 17.45 4 18 4M6 13C5.45 13 5 12.55 5 12S5.45 11 6 11 7 11.45 7 12 6.55 13 6 13M18 20C17.45 20 17 19.55 17 19S17.45 18 18 18 19 18.45 19 19 18.55 20 18 20Z"></path>
                              </svg>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <hr class="border-art">
            <section class="all-reviews-section">
              <div class="row">
                <div class="col-lg-12">
                  <div class="reviews d-flex">
                    <p>
                      269 reviews
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                      </svg>
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                      </svg>
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                      </svg>
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                      </svg>
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                      </svg>
                    </p>
                  </div>
                  <!--tabs-->
                  <ul class="nav nav-pills border-bottom all-review-tabs" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Reviews for this item</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Reviews for this shop</button>
                    </li>
                  </ul>
                  <div class="tab-content py-3 px-2" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                      <div class="d-flex gap-2">
                        <img src="assets/img/027384164265177 1.png" class="rounded-circle person-review-profile-img">
                        <div class="revw-name-title">
                          <p class="m-0">Rahul</p>
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                          </span>
                        </div>
                        <div style="width: 75%;text-align: right;">
                          <p class="date-m-y">07 Jun, 2023</p>
                        </div>
                      </div>
                      <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                      <hr>
                      <div class="d-flex gap-2">
                        <img src="assets/img/027384164265177 1.png" class="rounded-circle person-review-profile-img">
                        <div class="revw-name-title">
                          <p class="m-0">Rahul</p>
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                          </span>
                        </div>
                        <div style="width: 75%;text-align: right;">
                          <p class="date-m-y">07 Jun, 2023</p>
                        </div>
                      </div>
                      <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                      <div class="d-flex gap-2">
                        <img src="assets/img/027384164265177 1.png" class="rounded-circle person-review-profile-img">
                        <div class="revw-name-title">
                          <p class="m-0">Rahul</p>
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                          </span>
                        </div>
                        <div style="width: 75%;text-align: right;">
                          <p class="date-m-y">07 Jun, 2023</p>
                        </div>
                      </div>
                      <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                      <hr>
                      <div class="d-flex gap-2">
                        <img src="assets/img/027384164265177 1.png" class="rounded-circle person-review-profile-img">
                        <div class="revw-name-title">
                          <p class="m-0">Rahul</p>
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                            </svg>
                          </span>
                        </div>
                        <div style="width: 75%;text-align: right;">
                          <p class="date-m-y">07 Jun, 2023</p>
                        </div>
                      </div>
                      <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                    </div>
                  </div>
                  <!--tabs-->
                </div>
                <div class="col-lg-5">
                </div>
              </div>
            </section>
          </div>
        </section>
      </div>
        <!-- footer -->
        <?php
          include('inc/footer.php'); 
          ?>
     
  </main>
</body>
</html>

<!--chat button code script start-->



<!-- JavaScript to handle chat functionality -->
<script>
  function openChat() {
    document.getElementById("chatWindow").style.display = "block";
    // Load previous messages (you'll need to fetch messages from the database here)
    loadMessages();
  }

  function closeChat() {
    document.getElementById("chatWindow").style.display = "none";
  }

  function loadMessages() {
    // Your PHP code to fetch previous messages and display them in the message area
    // You can use AJAX or WebSockets for real-time updates
  }

  function sendMessage() {
    var message = document.getElementById("messageInput").value;
    // Your PHP code to save the message to the database and handle sending notifications to the artist
    // You can use AJAX or WebSockets for real-time updates

    // For this example, let's just display the message in the message area
    document.getElementById("messageArea").innerHTML += "<p><?=$artistprofile['username'];?>: " + message + "</p>";
    document.getElementById("messageInput").value = "";
  }
</script>

<!--chat button code script end-->
 <!--share icon script-->
<!-- Script with transition effect -->
<script>
  const shareButton = document.getElementById('shareButton');
  const socialIcons = document.getElementById('socialIcons');

  // Hide the social icons initially
  socialIcons.style.opacity = '0';
  socialIcons.style.pointerEvents = 'none';

  // Toggle the visibility of social icons when the share button is clicked
  shareButton.addEventListener('click', () => {
    if (socialIcons.style.opacity === '0') {
      socialIcons.style.display = 'block';
      setTimeout(() => {
        socialIcons.style.opacity = '1';
        socialIcons.style.pointerEvents = 'auto';
      }, 10); // Delay the appearance to ensure transition effect
    } else {
      socialIcons.style.opacity = '0';
      socialIcons.style.pointerEvents = 'none';
      setTimeout(() => {
        socialIcons.style.display = 'none';
      }, 300); // Delay the disappearance to match the transition duration
    }
  });
</script>


<?php
} else {
    // ... (existing code for handling when the artist is not logged in)
}

