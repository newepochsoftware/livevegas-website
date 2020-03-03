<div class="leads-footer" id="subscribe">
  <div class="container">
    <div class="leads-body">
      <div class="row">
        <div class="col-md-6">
          <div class="leads-cta-title">
            BE THE FIRST TO KNOW
            WHAT'S <span class="leads-cta-highlight">LIVE</span> IN VEGAS!
          </div>
          <div class="leads-cta-desc">
            Complete this form to receive our residency announcements, access to earlybird ticket sales, specials you don't want to miss, and exclusive access to Live Vegas giveaways for VIP experiences and
            meet & greets with artists!
          </div>
        </div>
        <div class="col-md-6">

          <form id="contest_form" action="{{url('submit')}}" method="POST">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />

            <div class="col-xs-12">
               <label for="firstName">First Name*</label>
               <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required>
               <div class="invalid-feedback">
                 Valid first name is required.
               </div>
            </div>
            <div class="col-xs-12">
               <label for="lastName">Last name*</label>
               <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="" required>
               <div class="invalid-feedback">
                 Valid Last name is required.
               </div>
            </div>
            <div class="col-xs-12">
               <label for="email">Email*</label>
               <input type="text" class="form-control" id="email" name="email" placeholder="" value="" required>
               <div class="invalid-feedback">
                 Valid Email is required.
               </div>
            </div>
            <!-- <div class="col-xs-12">
               <label for="phone">Phone*</label>
               <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="" required>
               <div class="invalid-feedback">
                 Valid phone is required.
               </div>
            </div> -->
            <div class="col-xs-12">
               <label for="firstName">Zip Code*</label>
               <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="" value="" required>
               <div class="invalid-feedback">
                 Valid Zip Code is required.
               </div>
            </div>
            <div class="col-xs-12">
              <div class="custom-control custom-checkbox leads-checkbox">
               <input type="checkbox" class="custom-control-input" id="save-info">
               <label class="custom-control-label age-label" for="save-info">I am 18 years of age or older.*</label>
              </div>
              <button class="btn btn-danger btn-lg btn-block" type="submit">Join Now</button>
              <div class="disclaimer-txt">
                By submitting this form, I agree by electronic signature to: (1) be contacted
                by email (Consent is not required as a condition of purchase); and (2) the <a href="/privacy">Privacy Policy</a> and <a href="https://help.ticketmaster.com/s/article/Terms-of-Use?language=en_US" target="_blank">Terms of Use</a>.
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="footer">
  <div class="container">
      © 2020 Live Vegas All rights reserved | <a href="/privacy">Privacy Policy</a> |  <a href="/my-info">Do Not Sell My Info</a> | <a href="https://help.ticketmaster.com/s/article/Terms-of-Use?language=en_US" target="_blank">Terms Of Use</a>
  </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
