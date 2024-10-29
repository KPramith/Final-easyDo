
<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="css/contact.css">
<script src="javascrpt/contact.js"></script>


<div class="container">
      <span class="big-circle"></span>
      <!-- <img src="images/shape3.jpg" class="square" alt="" /> -->
    
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
            “Need reliable workers for your project? We're here to help! Reach out today,
            and let’s discuss how we can provide the skilled labor you need, right when you need it.
            Contact us for inquiries, quotes, or any questions you may have.”
          </p>
          <div class="info">
            <div class="information">
              <img src="images/location.png" class="icon" alt="" />
              <p>294/A colombo street</p>
            </div>
            <div class="information">
              <img src="images/email.jpg" class="icon" alt="" />
              <p>info@easyDo.com</p>
            </div>
            <div class="information">
              <img src="images/phone.jpg" class="icon" alt="" />
              <p>123-456-789</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="https://www.facebook.com/">
                <img src="images/facebook.webp" class="social-icons" alt="" />
              </a>
              <a href="https://www.twitter.com/">
                <img src="images/twitter.webp" class="social-icons" alt="" />
              </a>
              <a href="https://www.instagram.com/">
                <img src="images/instegram.png" class="social-icons" alt="" />
              </a>
              <a href="https://www.linkedin.com/">
                <img src="images/linkdin.png" class="social-icons" alt="" />
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

            <form id="contactForm" autocomplete="off" onsubmit="return validateForm()">
              <h3 class="title">Contact us</h3>
            
              <div class="input-container">
                <input type="text" name="name" placeholder="Username" class="input" />
                <span>Username</span>
                <small class="error-message"></small>
              </div>
            
              <div class="input-container">
                <input type="email" name="email" placeholder="Email" class="input" />
                <small class="error-message"></small>
              </div>
            
              <div class="input-container">
                <input type="tel" name="phone" placeholder="Phone" class="input" />
                <small class="error-message"></small>
              </div>
            
              <div class="input-container textarea">
                <textarea name="message" placeholder="Message" class="input"></textarea>
                <span>Message</span>
                <small class="error-message"></small>
              </div>
            
              <input type="submit" value="Send" class="btn" />
            </form>
            
        </div>
      </div>
    </div>

    </main>
    <script src="javascrpt/contact.js"></script>

    <?php include('includes/footer.php'); ?>

