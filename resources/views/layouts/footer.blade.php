<footer class="bg-dark text-white pt-5 pb-4">
  <div class="container">
    <div class="row">
      <!-- Company Info -->
      <div class="col-md-4 mb-4">
        <h5 class="text-uppercase mb-4" style="color: #20c997;">{{ config('app.name') }}</h5>
        <p>A premium platform for building modern web applications with Laravel and Bootstrap.</p>
        <p> Designed bu Sultanum Mobin </p>
        <div class="mt-3">
          <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
          <a href="#" class="text-white me-2"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="text-white"><i class="fab fa-github"></i></a>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="col-md-2 mb-4">
        <h5 class="text-uppercase mb-4" style="color: #20c997;">Quick Links</h5>
        <ul class="list-unstyled">
            <li class="mb-2"><a href="" class="text-white text-decoration-none">About Us</a></li>
            <li class="mb-2"><a href="" class="text-white text-decoration-none">Services</a></li>
            <li class="mb-2"><a href="" class="text-white text-decoration-none">Contact</a></li>
            <li class="mb-2"><a href="" class="text-white text-decoration-none">Privacy Policy</a></li>
            <li class="mb-2"><a href="" Class="text-white text-decoration-none">Home</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div class="col-md-3 mb-4">
        <h5 class="text-uppercase mb-4" style="color: #20c997;">Contact Us</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> Faridpur, Dhaka, Bangladesh</li>
          <li class="mb-2"><i class="fas fa-phone me-2"></i> +880 1723 332972</li>
          <li class="mb-2"><i class="fas fa-envelope me-2"></i> sultan.1021@fec.edu.bd</li>
        </ul>
      </div>

      <!-- Newsletter -->
      <div class="col-md-3 mb-4">
        <h5 class="text-uppercase mb-4" style="color: #20c997;">Newsletter</h5>
        <p>Subscribe to our newsletter for the latest updates.</p>
        <form>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Your Email" aria-label="Your Email">
            <button class="btn btn-outline-light" type="submit">Subscribe</button>
          </div>
        </form>
      </div>
    </div>

    <hr class="mb-4" style="border-color: rgba(255,255,255,0.1);">

    <!-- Copyright -->
    <div class="row align-items-center">
      <div class="col-md-6 text-center text-md-start">
        <p class="mb-0">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
      </div>
      <div class="col-md-6 text-center text-md-end">
        <a href="#" class="text-white text-decoration-none me-3">Terms of Service</a>
        <a href="#" class="text-white text-decoration-none">Privacy Policy</a>
      </div>
    </div>
  </div>
</footer>