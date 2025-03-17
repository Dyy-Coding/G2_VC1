<!-- <div class="container ">
    <div class="profile-card card card-registration card-registration-2" style="border-radius: 15px;">
        <div class="d-flex align-items-center p-4">
            <img src="views/assets/img/ivana-square.jpg" alt="Profile Image" class="profile-image rounded-circle"
                style="width: 10%; height: 10%;">
            <div class="ml-3" style="margin: 20px;">
                <h5 class="fw-bold mb-1" style="color: #4835d4;">Alec Thompson</h5>
                <p class="mb-0 text-muted">CEO / Co-Founder</p>
            </div>
        </div> -->
        <!-- <div class="toggle-btn p-4">
            <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
            </label>
        </div> -->
    <!-- </div>
</div> -->

<!-- <form action="/register" method="POST" class="h-100 h-custom gradient-custom-2 py-2 mb-5">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <h3 class="fw-normal mb-5" style="color: #4835d4;">General Information</h3>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <input type="text" id="form3Examplev2" name="first_name"
                                                class="form-control form-control-lg" placeholder="First name" />
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <input type="text" id="form3Examplev3" name="last_name"
                                                class="form-control form-control-lg" placeholder="Last name" />
                                        </div>
                                    </div>
                                    <div class="mb-4 pb-2">
                                        <input type="text" id="form3Examplev4" name="role"
                                            class="form-control form-control-lg" placeholder="Admin, User, ...." />
                                    </div>
                                    <div class="mb-4 pb-2">
                                        <input type="email" id="form3Examplev4" name="email"
                                            class="form-control form-control-lg" placeholder="Email" />
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">
                                            <input type="password" id="form3Examplev5" name="password"
                                                class="form-control form-control-lg" placeholder="Password" />
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">
                                            <input type="password" id="form3Examplev6" name="confirm_password"
                                                class="form-control form-control-lg" placeholder="Confirm password" />
                                        </div>
                                    </div>
                                    <div class="mb-4 pb-2">
                                        <input type="text" id="form3Examplea2" name="street"
                                            class="form-control form-control-lg" placeholder="St. 371,...." />
                                    </div>
                                    <div class="mb-4 pb-2">
                                        <input type="text" id="form3Examplea5" name="city"
                                            class="form-control form-control-lg" placeholder="Phnom Penh, ...." />
                                    </div>
                                    <div class="mb-4 pb-2">
                                        <input type="text" id="form3Examplea8" name="phone_number"
                                            class="form-control form-control-lg" placeholder="Phone number" />
                                    </div>
                                    <div class="form-check d-flex justify-content-start pb-3">
                                        <input class="form-check-input me-3" type="checkbox" value=""
                                            id="form2Example3c" />
                                        <label class="form-check-label text-black" for="form2Example3"> I do accept the
                                            <a href="#!" class="text-black"><u>Terms and Conditions</u></a> of your
                                            site. </label>
                                    </div>
                                    <button type="submit" class="btn btn-light btn-lg py-2"
                                        data-mdb-ripple-color="dark">Update User</button>
                                </div>
                            </div>
                            <div class="col-lg-6 bg-indigo text-white d-flex flex-column align-items-center justify-content-center">
                                <div class="mb-4">
                                    <img src="views/assets/img/imgforform.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form> -->

<form action="/register" method="POST" class="h-150 h-custom gradient-custom-2 py-2">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <h3 class="fw-normal mb-4" style="color: #4835d4; font-family: 'Arial', sans-serif;">General Information</h3>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <input type="text" id="form3Examplev2" name="first_name" class="form-control form-control-lg" placeholder="First Name" required style="border-radius: 10px; padding: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);"/>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="text" id="form3Examplev3" name="last_name" class="form-control form-control-lg" placeholder="Last Name" required style="border-radius: 10px; padding: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);"/>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" id="form3Examplev4" name="role" class="form-control form-control-lg" placeholder="Role (Admin, User, etc.)" required style="border-radius: 10px; padding: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);"/>
                                    </div>

                                    <div class="mb-3">
                                        <input type="email" id="form3Examplev5" name="email" class="form-control form-control-lg" placeholder="Email Address" required style="border-radius: 10px; padding: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);"/>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <input type="password" id="form3Examplev6" name="password" class="form-control form-control-lg" placeholder="Password" required style="border-radius: 10px; padding: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);"/>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="password" id="form3Examplev7" name="confirm_password" class="form-control form-control-lg" placeholder="Confirm Password" required style="border-radius: 10px; padding: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);"/>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" id="form3Examplea2" name="street" class="form-control form-control-lg" placeholder="Street Address" required style="border-radius: 10px; padding: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);"/>
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" id="form3Examplea3" name="city" class="form-control form-control-lg" placeholder="City" required style="border-radius: 10px; padding: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);"/>
                                    </div>

                                    <div class="mb-3    ">
                                        <input type="tel" id="form3Examplea4" name="phone_number" class="form-control form-control-lg" placeholder="Phone Number" required style="border-radius: 10px; padding: 8px;     box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);"/>
                                    </div>

                                    <div class="form-check d-flex justify-content-start pb-2">
                                        <input class="form-check-input me-3" type="checkbox" value="" id="form2Example3c" required />
                                        <label class="form-check-label text-black" for="form2Example3">
                                            I accept the <a href="#!" class="text-black"><u>Terms and Conditions</u></a> of your site.
                                        </label>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg py-2 w-100" data-mdb-ripple-color="dark" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">Register</button>
                                </div>
                            </div>

                            <div class="col-lg-6 bg-indigo text-white d-flex flex-column align-items-center justify-content-center">
                                <img src="views/assets/img/adduserimage.jpg" alt="userimage" style="width: 500px; height: auto; margin-bottom: 2rem;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



























<!-- <form action="/change-password" method="POST" class="h-100 h-custom gradient-custom-2 mb-5">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-5">
                        <h3 class="fw-normal mb-5" style="color: #4835d4;">Change Password</h3>
                        <div class="mb-4 pb-2">
                            <input type="password" id="form3Examplev4" name="current_password"
                                class="form-control form-control-lg" placeholder="Current Password" />
                        </div>
                        <div class="mb-4 pb-2">
                            <input type="password" id="form3Examplev4" name="new_password"
                                class="form-control form-control-lg" placeholder="New Password" />
                        </div>
                        <div class="mb-4 pb-2">
                            <input type="password" id="form3Examplev4" name="confirm_password"
                                class="form-control form-control-lg" placeholder="Confirm New Password" />
                        </div>
                        <button type="submit" class="btn btn-light btn-lg py-2" data-mdb-ripple-color="dark">Update
                            Password</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form> -->

<!-- <div class="container">
    <div class="profile-card card card-registration card-registration-2" style="border-radius: 15px;">
        <div class="text-center p-4">
            <h3 class="fw-normal mb-2" style="color: rgb(37, 0, 4);">Delete Account</h3>
            <p class="mb-2">Once you delete your account, there is no going back. Please be certain.</p>
        </div>

        <div class="d-flex justify-content-between mb-4 px-6">

            <div class="form-check form-switch flex-grow-1">
                <input class="form-check-input" type="checkbox" id="confirmDelete" />
                <label class="form-check-label" for="confirmDelete">Confirm</label>
            </div>

            <div class="d-flex gap-2 flex-grow-1 justify-content-end">
                <button type="button" class="btn btn-outline-secondary px-4 py-2">Deactivate</button>
                <button type="submit" class="btn btn-danger px-4 py-2">Delete Account</button>
            </div>
        </div>
    </div>
</div> -->