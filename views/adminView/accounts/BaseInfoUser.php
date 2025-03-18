<!-- <div class="container ">
    <div class="profile-card card card-registration card-registration-2" style="border-radius: 15px;">
        <div class="d-flex align-items-center p-4">
            <img src="views/assets/img/ivana-square.jpg" alt="Profile Image" class="profile-image rounded-circle"
                style="width: 10%; height: 10%;">
            <div class="ml-3" style="margin: 20px;">
                <h5 class="fw-bold mb-1" style="color: #4835d4;">Alec Thompson</h5>
                <p class="mb-0 text-muted">CEO / Co-Founder</p>
            </div>
        </div>
    </div>
</div>

<form action="/register" method="POST" class="h-100 h-custom gradient-custom-2 py-2">
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
                                                class="form-control form-control-lg" placeholder="First name" style="padding: 8px;"/>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <input type="text" id="form3Examplev3" name="last_name"
                                                class="form-control form-control-lg" placeholder="Last name" style="padding: 8px;"/>
                                        </div>
                                    </div>
                                    <div class="mb-4 pb-2">
                                        <input type="text" id="form3Examplev4" name="role"
                                            class="form-control form-control-lg" placeholder="Admin, User, ...." style="padding: 8px;"/>
                                    </div>
                                    <div class="mb-4 pb-2">
                                        <input type="email" id="form3Examplev4" name="email"
                                            class="form-control form-control-lg" placeholder="Email" style="padding: 8px;"/>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">
                                            <input type="password" id="form3Examplev5" name="password"
                                                class="form-control form-control-lg" placeholder="Password" style="padding: 8px;"/>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">
                                            <input type="password" id="form3Examplev6" name="confirm_password"
                                                class="form-control form-control-lg" placeholder="Confirm password" style="padding: 8px;"/>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-light btn-lg py-2"
                                        data-mdb-ripple-color="dark">Update User</button>
                                </div>
                            </div>


                            <div class="col-lg-6 bg-indigo text-white">
                                <div class="p-5">
                                    <h3 class="fw-normal mb-5" style="color: #4835d4;">Address Information</h3>
                                    <div class="mb-4 pb-2">
                                        <input type="text" id="form3Examplea2" name="street"
                                            class="form-control form-control-lg" placeholder="St. 371,...." style="padding: 8px;"/>
                                    </div>
                                    <div class="mb-4 pb-2">
                                        <input type="text" id="form3Examplea5" name="city"
                                            class="form-control form-control-lg" placeholder="Phnom Penh, ...." style="padding: 8px;"/>
                                    </div>
                                    <div class="mb-4 pb-2">
                                        <input type="text" id="form3Examplea8" name="phone_number"
                                            class="form-control form-control-lg" placeholder="Phone number" style="padding: 8px;"/>
                                    </div>
                                    <div class="form-check d-flex justify-content-start pb-3">
                                        <input class="form-check-input me-3" type="checkbox" value=""
                                            id="form2Example3c" style="padding: 8px;"/>
                                        <label class="form-check-label text-black" for="form2Example3"> I do accept
                                            the
                                            <a href="#!" class="text-black"><u>Terms and Conditions</u></a> of your
                                            site. </label>
                                    </div>
                                    <button type="submit" class="btn btn-light btn-lg py-2"
                                        data-mdb-ripple-color="dark">Update User</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="/change-password" method="POST" class="h-100 h-custom gradient-custom-2">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-5">
                        <h3 class="fw-normal mb-5" style="color: #4835d4;">Change Password</h3>
                        <div class="mb-4 pb-2">
                            <input type="password" id="form3Examplev4" name="current_password"
                                class="form-control form-control-lg" placeholder="Current Password" style="padding: 8px;"/>
                        </div>
                        <div class="mb-4 pb-2">
                            <input type="password" id="form3Examplev4" name="new_password"
                                class="form-control form-control-lg" placeholder="New Password" style="padding: 8px;"/>
                        </div>
                        <div class="mb-4 pb-2">
                            <input type="password" id="form3Examplev4" name="confirm_password"
                                class="form-control form-control-lg" placeholder="Confirm New Password" style="padding: 8px;"/>
                        </div>
                        <button type="submit" class="btn btn-light btn-lg py-2" data-mdb-ripple-color="dark">Update
                            Password</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="container mb-5">
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


<div class="container">
    <div class="profile-card card card-registration card-registration-2" style="border-radius: 15px;">
        <div class="d-flex align-items-center p-4">
            <img src="views/assets/img/ivana-square.jpg" alt="Profile Image" class="profile-image rounded-circle"
                style="width: 20%; height: 20%; max-width: 100px;">
            <div class="ml-3" style="margin: 20px;">
                <h5 class="fw-bold mb-1" style="color: #4835d4;">Alec Thompson</h5>
                <p class="mb-0 text-muted">CEO / Co-Founder</p>
            </div>
        </div>
    </div>
</div>

<form action="/register" method="POST" class="h-100 h-custom gradient-custom-2 py-2">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-6 col-md-12">
                                <div class="p-5">
                                    <h3 class="fw-normal mb-5" style="color: #4835d4;">General Information</h3>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <input type="text" id="form3Examplev2" name="first_name"
                                                class="form-control form-control-lg" placeholder="First name" style="padding: 8px;"/>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <input type="text" id="form3Examplev3" name="last_name"
                                                class="form-control form-control-lg" placeholder="Last name" style="padding: 8px;"/>
                                        </div>
                                    </div>
                                    <div class="mb-4 pb-2">
                                        <input type="text" id="form3Examplev4" name="role"
                                            class="form-control form-control-lg" placeholder="Admin, User, ...." style="padding: 8px;"/>
                                    </div>
                                    <div class="mb-4 pb-2">
                                        <input type="email" id="form3Examplev4" name="email"
                                            class="form-control form-control-lg" placeholder="Email" style="padding: 8px;"/>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">
                                            <input type="password" id="form3Examplev5" name="password"
                                                class="form-control form-control-lg" placeholder="Password" style="padding: 8px;"/>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">
                                            <input type="password" id="form3Examplev6" name="confirm_password"
                                                class="form-control form-control-lg" placeholder="Confirm password" style="padding: 8px;"/>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-light btn-lg py-2"
                                        data-mdb-ripple-color="dark">Update User</button>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 bg-indigo text-white">
                                <div class="p-5">
                                    <h3 class="fw-normal mb-5" style="color: #4835d4;">Address Information</h3>
                                    <div class="mb-4 pb-2">
                                        <input type="text" id="form3Examplea2" name="street"
                                            class="form-control form-control-lg" placeholder="St. 371,...." style="padding: 8px;"/>
                                    </div>
                                    <div class="mb-4 pb-2">
                                        <input type="text" id="form3Examplea5" name="city"
                                            class="form-control form-control-lg" placeholder="Phnom Penh, ...." style="padding: 8px;"/>
                                    </div>
                                    <div class="mb-4 pb-2">
                                        <input type="text" id="form3Examplea8" name="phone_number"
                                            class="form-control form-control-lg" placeholder="Phone number" style="padding: 8px;"/>
                                    </div>
                                    <div class="form-check d-flex justify-content-start pb-3">
                                        <input class="form-check-input me-3" type="checkbox" value=""
                                            id="form2Example3c" style="padding: 8px;"/>
                                        <label class="form-check-label text-black" for="form2Example3"> I do accept
                                            the
                                            <a href="#!" class="text-black"><u>Terms and Conditions</u></a> of your
                                            site. </label>
                                    </div>
                                    <button type="submit" class="btn btn-light btn-lg py-2"
                                        data-mdb-ripple-color="dark">Update User</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="/change-password" method="POST" class="h-100 h-custom gradient-custom-2">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-5">
                        <h3 class="fw-normal mb-5" style="color: #4835d4;">Change Password</h3>
                        <div class="mb-4 pb-2">
                            <input type="password" id="form3Examplev4" name="current_password"
                                class="form-control form-control-lg" placeholder="Current Password" style="padding: 8px;"/>
                        </div>
                        <div class="mb-4 pb-2">
                            <input type="password" id="form3Examplev4" name="new_password"
                                class="form-control form-control-lg" placeholder="New Password" style="padding: 8px;"/>
                        </div>
                        <div class="mb-4 pb-2">
                            <input type="password" id="form3Examplev4" name="confirm_password"
                                class="form-control form-control-lg" placeholder="Confirm New Password" style="padding: 8px;"/>
                        </div>
                        <button type="submit" class="btn btn-light btn-lg py-2" data-mdb-ripple-color="dark">Update
                            Password</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



<div class="container mb-5">
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
                <button type="button" class="btn btn-outline-secondary px-4 py-2">Logout</button>
            </div>
        </div>
    </div>
</div>
