<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-md-6">
          <h6>About Us</h6>
          <ul>


          <li><a href="../public/about-us">About Us</a></li>
         <li><a href="../public/contact">Contact US</a></li>
            <li><a href="../public/adminlogin">Admin Login</a></li>
          </ul>
        </div>

        <div class="col-md-3 col-sm-6">
          <h6>Subscribe Newsletter</h6>
          <div class="newsletter-form">
          <form method="post" action="{{ route('subscribe') }}">
          @csrf
              <div class="form-group">
                <input type="email" name="subscriberemail" class="form-control newsletter-input" required placeholder="Enter Email Address" />
              </div>
              <button type="submit" name="emailsubscibe" class="btn btn-block">Subscribe <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </form>
            <p class="subscribed-text">*We send great deals and latest auto news to our subscribed users very week.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-push-6 text-right">
          <div class="footer_widget">
            <p>Connect with Us:</p>
            <ul>
              <li><a href="https://facebook.com" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
              <li><a href="https://twitter.com" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
              <li><a href="https://linkedin.com" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
              <li><a href="https://google.com" target="_blank"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
              <li><a href="https://instagram.com" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-md-pull-6">
          <p class="copy-right">Copyright &copy; 2024 QuintAuto </p>
        </div>
      </div>
    </div>
  </div>
</footer>
