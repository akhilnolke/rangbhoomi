<footer class="footer p-5" style="background-image:url(assets/img/bg-footer.jpg) ;">
    <div class="row text-center align-items-center foot-row">
        <div class="col-md-4 left-col-footer">
            <h2 class="text-white">Quick Menu</h2>
            <p><a class="text-white" href="#">Painting</a></p>
            <p><a class="text-white" href="#">Drawing</a></p>
            <p><a class="text-white" href="#">Prints</a></p>
            <p><a class="text-white" href="#">Photography</a></p>
        </div>
        <div class="col-md-4 mid-col-footer position-relative">
          <img src="assets/img/logo-footer.png" alt="footer logo">
          <p class="text-white">"Largest aggregator for original paintings"</p>
        </div>
        <div class="col-md-4 right-col-footer">
            <h2 class="text-white">Connect With Us</h2>
            <div class="social-links">
                <a href="#"><img src="assets/img/facebook.png" alt="facebook"></a>
                <a href="#"><img src="assets/img/instagram.png" alt="instagram"></a>
                <a href="#"><img src="assets/img/twitter.png" alt="twitter"></a>
                <a href="#"><img src="assets/img/youtube.png" alt="youtube"></a>
        </div>
        <p class="text-white py-3 m-0">2023 | Privacy Policy</p>
        </div>
    </div>
</footer>

 <script>
     // sticky header js
$(function() {
    $(window).on("scroll", function() {
        if($(window).scrollTop() > 50) {
            $(".stickyhead").addClass("activee");
        } else {
            //remove the background property so it comes transparent again (defined in your css)
           $(".stickyhead").removeClass("activee");
        }
    });
});

 </script>
<!--phone number maxlength validation-->
 <script>
    function enforceMaxLength() {
      var phoneNumberInput = document.getElementById("usr");
      phoneNumberInput.value = phoneNumberInput.value.slice(0, 10);
    }
  </script>
  
 <!--match password script-->
 
<script>
$(document).ready(function() {
  // Get references to the password and confirm password input fields
  var passwordInput = $("#pass");
  var confirmPasswordInput = $("#confirmpass");
  var errorDiv = $("#password-match-error");
  var submitBtn = $("#submitBtn");

  // Function to validate password match
  function validatePasswordMatch() {
    if (passwordInput.val() !== confirmPasswordInput.val()) {
      errorDiv.text("Passwords do not match");
      submitBtn.prop("disabled", true);
    } else {
      errorDiv.text("");
      submitBtn.prop("disabled", false);
    }
  }

  // Add event listener to the password and confirm password input fields
  passwordInput.on("input", validatePasswordMatch);
  confirmPasswordInput.on("input", validatePasswordMatch);
});
</script>

<!--alert timeout script-->
<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
</script>

 <!--wish list script -->
  
<script>
document.addEventListener("DOMContentLoaded", function () {
  const wishlistButtons = document.querySelectorAll(".wishlist-button");

  wishlistButtons.forEach(function (wishlistButton) {
    const artworkId = wishlistButton.getAttribute("data-artwork-id");
    const storageKey = `wishlist_${artworkId}`;

    const storedState = localStorage.getItem(storageKey);
    if (storedState === "true") {
      wishlistButton.querySelector("#wishlist-svg").classList.add("clicked");
       wishlistButton.classList.add("in-wishlist"); // Add this line
    }

    wishlistButton.addEventListener("click", function () {
      const svg = wishlistButton.querySelector("#wishlist-svg");
      const isClicked = svg.classList.contains("clicked");

      svg.classList.toggle("clicked");

      if (isClicked) {
        localStorage.removeItem(storageKey);
        // Remove the following lines that handle double-click deletion
        /*
        const artworkId = wishlistButton.getAttribute("data-artwork-id");
        const userId = wishlistButton.getAttribute("data-user-id");
        const productName = wishlistButton.getAttribute("data-product-name");
        const productPrice = wishlistButton.getAttribute("data-product-price");
        const productImage = wishlistButton.getAttribute("data-product-image");
        const productWidth = wishlistButton.getAttribute("data-product-width");
        const productHeight = wishlistButton.getAttribute("data-product-height");
        const productCategory = wishlistButton.getAttribute("data-product-category");

        removeFromWishlistAndDatabase(artworkId, userId, productName, productPrice, productImage, productWidth, productHeight, productCategory);
        */
      } else {
        localStorage.setItem(storageKey, "true");
        // Keep the addition to the wishlist functionality
        const artworkId = wishlistButton.getAttribute("data-artwork-id");
        const userId = wishlistButton.getAttribute("data-user-id");
        const productName = wishlistButton.getAttribute("data-product-name");
        const productPrice = wishlistButton.getAttribute("data-product-price");
        const productImage = wishlistButton.getAttribute("data-product-image");
        const productWidth = wishlistButton.getAttribute("data-product-width");
        const productHeight = wishlistButton.getAttribute("data-product-height");
        const productCategory = wishlistButton.getAttribute("data-product-category");

        addToWishlistAndDatabase(artworkId, userId, productName, productPrice, productImage, productWidth, productHeight, productCategory);
        location.reload();
      }
    });
  });
});

// Remove the removeFromWishlistAndDatabase function since it's not needed anymore

function addToWishlistAndDatabase(artworkId, userId, productName, productPrice, productImage, productWidth, productHeight, productCategory) {
  fetch(`admin/inc/process.php?action=wishlist&artwork_id=${artworkId}&user_id=${userId}&product_name=${productName}&product_price=${productPrice}&product_image=${productImage}&product_width=${productWidth}&product_height=${productHeight}&product_category=${productCategory}`, {
    method: "GET",
  })
    .then(response => response.json())
    .then(data => {
      // Handle response from the server if needed
      console.log(data);
    })
    .catch(error => {
      // Handle errors
      console.error(error);
    });
}
</script>
