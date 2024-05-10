<x-guest-layout>

    <section class="h-100">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
              <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                <div class="card-body p-0">
                  <div class="row g-0">
                    <div class="col-lg-6">
                      <div class="p-5">
                        <h3 class="fw-normal mb-5" style="color: #4835d4;">Membership Registration</h3>
      
                        <form method="POST" action="{{ route('register') }}" onsubmit="return validateForm()">
                          @csrf
                        <div class="row">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-lg"  />
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
      
                        <div class="row">
                          <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg"  />
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
      
                        <div class="row">
                          <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg"  />
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>
      
                        <div class="row">
                          <div class="mb-3">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control form-control-lg"  />
                            @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>

                      </div>
                    </div>
                    <div class="col-lg-6 bg-indigo text-white">
                      <div class="p-5">
                        <h3 class="fw-normal mb-5">Card Details</h3>
                        <p><strong>Membership Fee: £200 Annually</strong></p>
                        <p>Our membership fee is £200 for the full year, covering the period from January 
                          1st to December 31st. Regardless of when you join as a member, the annual fee remains 
                          consistent.</p>
                        <p>Subsequent charges will occur on January 1st of each subsequent year until
                           membership is terminated, which is accessible via the 'My Profile Page'.</p>
      
                        <div class="mb-4 pb-2">
                          <div data-mdb-input-init class="form-outline form-white">
                              <label class="form-label" for="card_number">Card Number</label>
                              <input id="card_number" class="form-control form-control-lg" type="text" name="card_number" minlength="8" maxlength="8" required>
                          </div>
                        </div>
      
                        <div class="mb-4 pb-2">
                          <div data-mdb-input-init class="form-outline form-white">
                            <label class="form-label" for="card_expiry">Card Expiry</label>
                            <input id="card_expiry" class="form-control form-control-lg" type="date" name="card_expiry" required>
                          </div>
                        </div>

                        <div class="mb-4 pb-2">
                          <div data-mdb-input-init class="form-outline form-white">
                            <label for="card_cvv">CVV</label>
                            <input id="card_cvv" class="form-control" type="text" name="card_cvv" minlength="3" maxlength="3" required>
                          </div>
                        </div>
      
                        <!-- Terms and conditions checkbox -->
                        <div class="form-check d-flex justify-content-start mb-4 pb-3">
                          <input class="form-check-input me-3" type="checkbox" value="" id="termsCheckbox" required />
                          <label class="form-check-label text-white" for="termsCheckbox">
                              I do accept the <a href="#!" class="text-white"><u>Terms and Conditions</u></a> of your site.
                          </label>
                      </div>

                        {{-- Submit button --}}
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-light btn-lg"
                          data-mdb-ripple-color="dark">Register</button>
                        <div class="mt-3">
                            <a href="{{ route('login') }}" style="text-decoration: none;"><span class="text-white">Already registered? <u>Login</u></span></a>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

</x-guest-layout>


<!-- JavaScript to validate terms and conditions checkbox -->
<script>
  function validateForm() {
      var checkbox = document.getElementById("termsCheckbox");
      if (!checkbox.checked) {
          alert("Please accept the Terms and Conditions.");
          return false; // Prevent form submission
      }
      return true; // Allow form submission
  }
</script>