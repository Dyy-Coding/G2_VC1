<div class="col-lg-6 d-none d-lg-flex position-fixed top-0 end-0 w-100 vh-100 text-center justify-content-center flex-column">
  <div class="position-relative h-100 w-100 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" 
       style="background-image: url('https://structuralengineeringbasics.com/wp-content/uploads/2019/05/STRUCTURAL-ENGINEERING-MATERIALS-1024x530-1-1200x720.webp'); 
              background-size: cover; background-position: center; background-repeat: no-repeat;">
    
    <span class="bg-gradient-primary opacity-6"></span>
  </div>
</div>

<section class="vh-100">
<div class="container py-5 h-100">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card p-4 text-center">
                <h3 class="mb-4 text-primary">Login</h3>

                <form action="/users/login" method="post">
                    <div class="form-outline mb-3 text-start">
                        <label class="form-label fw-bold fs-6" for="email">Email:</label>
                        <input type="email" id="email" placeholder="Enter email..." name="email" class="form-control" required />
                    </div>

                    <div class="form-outline mb-3 text-start">
                        <label class="form-label fw-bold fs-6" for="pwd">Password:</label>
                        <input type="password" id="pwd" placeholder="Enter password..." name="password" class="form-control" required />
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                          <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="rememberMe">
                              <label class="form-check-label fs-6" for="rememberMe">Remember me</label>
                          </div>
                          <a href="/forgot_password" class="text-primary fs-8">Forgot password?</a>
                    </div>

                    <button class="btn btn-primary w-100" type="submit">Login</button>
                </form>

                <div class="mt-4">
                    <small>Don't have an account? <a href="/register" class="text-primary fw-bold">Register</a></small>
                </div>
               
              </div>
            </div>
        </div>
    </div>
  </div>
</section>
