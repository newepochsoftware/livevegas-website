<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Live Vegas</title>
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.typekit.net/kof2hht.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!--- Navigation -->
<header class="livevegas-nav">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a href="#" class="navbar-brand">
        <img src="images/logo.png">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="/">Shows</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shows">Artists</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Experiences</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
      <div class="ticketmaster-logo">
        <img src="images/ticketmaster.png" alt="Ticketmaster Live Nation">
      </div>
    </nav>
  </div>
</header>
<!--- Hero Image -->
<div class="hero">
  <img src="images/header.jpg" alt="">
</div>

<!--- Filter -->
<div class="filter">
    <div class="row">
      <div class="col-md-2">
        <div class="filter-txt">filter by</div>
      </div>
      <div class="col-md-4 select-area">
        <select class="custom-select d-block w-100" id="state" required>
          <option value="">Choose...</option>
          <option>California</option>
        </select>
      </div>
      <div class="col-md-4 select-area">
        <select class="custom-select d-block w-100" id="state" required>
          <option value="">Choose...</option>
          <option>California</option>
        </select>
      </div>
      <div class="col">
        <button class="btn btn-search btn-block" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </div>

<!-- Body --->
<div class="shows">
  <div class="container">

    <div class="row">

      <div class="col-md-4 col-sm-6">
        <div class="show-container">
          <div class="show-main-img">
            <img src="images/aerosmith.jpg" alt="Aerosmith">
          </div>
          <div class="shows-cart-button"><i class="fas fa-shopping-cart"></i></div>
          <div class="show-info">
            <div class="show-dates">
              <div class="show-next-show-title">Next Show</div>
              <div class="show-next-show-month">APR</div>
              <div class="show-next-show-day">6</div>
            </div>
            <div class="show-location">
              <div class="show-location-title">Aerosmith- DEUCES ARE WILD</div>
              <div class="show-location-dates">Sat • Apr 06 • 8:00 PM</div>
              <div class="show-location-place">Park Theater, Las Vegas, NV</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6">
        <div class="show-container">
          <div class="show-main-img">
            <img src="images/aerosmith.jpg" alt="Aerosmith">
          </div>
          <div class="shows-cart-button"><i class="fas fa-shopping-cart"></i></div>
          <div class="show-info">
            <div class="show-dates">
              <div class="show-next-show-title">Next Show</div>
              <div class="show-next-show-month">APR</div>
              <div class="show-next-show-day">6</div>
            </div>
            <div class="show-location">
              <div class="show-location-title">Aerosmith- DEUCES ARE WILD</div>
              <div class="show-location-dates">Sat • Apr 06 • 8:00 PM</div>
              <div class="show-location-place">Park Theater, Las Vegas, NV</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6">
        <div class="show-container">
          <div class="show-main-img">
            <img src="images/aerosmith.jpg" alt="Aerosmith">
          </div>
          <div class="shows-cart-button"><i class="fas fa-shopping-cart"></i></div>
          <div class="show-info">
            <div class="show-dates">
              <div class="show-next-show-title">Next Show</div>
              <div class="show-next-show-month">APR</div>
              <div class="show-next-show-day">6</div>
            </div>
            <div class="show-location">
              <div class="show-location-title">Aerosmith- DEUCES ARE WILD</div>
              <div class="show-location-dates">Sat • Apr 06 • 8:00 PM</div>
              <div class="show-location-place">Park Theater, Las Vegas, NV</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6">
        <div class="show-container">
          <div class="show-main-img">
            <img src="images/aerosmith.jpg" alt="Aerosmith">
          </div>
          <div class="shows-cart-button"><i class="fas fa-shopping-cart"></i></div>
          <div class="show-info">
            <div class="show-dates">
              <div class="show-next-show-title">Next Show</div>
              <div class="show-next-show-month">APR</div>
              <div class="show-next-show-day">6</div>
            </div>
            <div class="show-location">
              <div class="show-location-title">Aerosmith- DEUCES ARE WILD</div>
              <div class="show-location-dates">Sat • Apr 06 • 8:00 PM</div>
              <div class="show-location-place">Park Theater, Las Vegas, NV</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6">
        <div class="show-container">
          <div class="show-main-img">
            <img src="images/aerosmith.jpg" alt="Aerosmith">
          </div>
          <div class="shows-cart-button"><i class="fas fa-shopping-cart"></i></div>
          <div class="show-info">
            <div class="show-dates">
              <div class="show-next-show-title">Next Show</div>
              <div class="show-next-show-month">APR</div>
              <div class="show-next-show-day">6</div>
            </div>
            <div class="show-location">
              <div class="show-location-title">Aerosmith- DEUCES ARE WILD</div>
              <div class="show-location-dates">Sat • Apr 06 • 8:00 PM</div>
              <div class="show-location-place">Park Theater, Las Vegas, NV</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6">
        <div class="show-container">
          <div class="show-main-img">
            <img src="images/aerosmith.jpg" alt="Aerosmith">
          </div>
          <div class="shows-cart-button"><i class="fas fa-shopping-cart"></i></div>
          <div class="show-info">
            <div class="show-dates">
              <div class="show-next-show-title">Next Show</div>
              <div class="show-next-show-month">APR</div>
              <div class="show-next-show-day">6</div>
            </div>
            <div class="show-location">
              <div class="show-location-title">Aerosmith- DEUCES ARE WILD</div>
              <div class="show-location-dates">Sat • Apr 06 • 8:00 PM</div>
              <div class="show-location-place">Park Theater, Las Vegas, NV</div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>

<div class="leads-footer">
  <div class="container">
    <div class="leads-body">
      <div class="row">
        <div class="col-md-6">
          <div class="leads-cta-title">
            BE THE FIRST TO KNOW
            WHAT'S <span class="leads-cta-highlight">LIVE</span> IN VEGAS!
          </div>
          <div class="leads-cta-desc">
            Complete this form to receive our residency announcements, access to earlybird ticket sales, specials you don't want to miss, and exclusive access to Live Nation giveaways for VIP experiences and
            meet & greets with artists!
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-xs-12">
             <label for="firstName">First Name*</label>
             <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
             <div class="invalid-feedback">
               Valid first name is required.
             </div>
          </div>
          <div class="col-xs-12">
             <label for="lastName">Last name*</label>
             <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
             <div class="invalid-feedback">
               Valid Last name is required.
             </div>
          </div>
          <div class="col-xs-12">
             <label for="email">Email*</label>
             <input type="text" class="form-control" id="email" placeholder="" value="" required>
             <div class="invalid-feedback">
               Valid Email is required.
             </div>
          </div>
          <div class="col-xs-12">
             <label for="phone">Phone*</label>
             <input type="text" class="form-control" id="phone" placeholder="" value="" required>
             <div class="invalid-feedback">
               Valid phone is required.
             </div>
          </div>
          <div class="col-xs-12">
             <label for="firstName">Zip Code*</label>
             <input type="text" class="form-control" id="zipcode" placeholder="" value="" required>
             <div class="invalid-feedback">
               Valid Zip Code is required.
             </div>
          </div>
          <div class="col-xs-12">
            <div class="custom-control custom-checkbox leads-checkbox">
             <input type="checkbox" class="custom-control-input" id="save-info">
             <label class="custom-control-label" for="save-info">I am 18 years of age or older.*</label>
            </div>
            <button class="btn btn-danger btn-lg btn-block" type="submit">Join Now</button>
            <div class="disclaimer-txt">
              By submitting this form, I agree by electronic signature to: (1) be contacted by SMS text at my mobile phone number and
              by email (Consent is not required as a condition of purchase); and (2) the Privacy Policy and Terms of Use.
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="footer">
  <div class="container">
      © 2019 Live Vagas | Live Nation | All rights reserved
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script src="js/app.js"></script>
<script src="js/lv.js"></script>
</body>
</html>
