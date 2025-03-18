<form action="/register" method="POST" class="h-150 h-custom gradient-custom-2 py-2">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2"
                    style="border-radius: 15px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <h3 class="fw-normal mb-4"
                                        style="color: #4835d4; font-family: 'Arial', sans-serif;">General Information
                                    </h3>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <input type="text" id="form3Examplev2" name="first_name"
                                                class="form-control form-control-lg" placeholder="First Name" required
                                                style="border-radius: 10px; padding: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="text" id="form3Examplev3" name="last_name"
                                                class="form-control form-control-lg" placeholder="Last Name" required
                                                style="border-radius: 10px; padding: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);" />
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" id="form3Examplev4" name="role"
                                            class="form-control form-control-lg" placeholder="Role (Admin, User, etc.)"
                                            required
                                            style="border-radius: 10px; padding: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);" />
                                    </div>

                                    <div class="mb-3">
                                        <input type="email" id="form3Examplev5" name="email"
                                            class="form-control form-control-lg" placeholder="Email Address" required
                                            style="border-radius: 10px; padding: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);" />
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <input type="password" id="form3Examplev6" name="password"
                                                class="form-control form-control-lg" placeholder="Password" required
                                                style="border-radius: 10px; padding: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="password" id="form3Examplev7" name="confirm_password"
                                                class="form-control form-control-lg" placeholder="Confirm Password"
                                                required
                                                style="border-radius: 10px; padding: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);" />
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" id="form3Examplea2" name="street"
                                            class="form-control form-control-lg" placeholder="Street Address" required
                                            style="border-radius: 10px; padding: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);" />
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" id="form3Examplea3" name="city"
                                            class="form-control form-control-lg" placeholder="City" required
                                            style="border-radius: 10px; padding: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);" />
                                    </div>

                                    <div class="mb-3    ">
                                        <input type="tel" id="form3Examplea4" name="phone_number"
                                            class="form-control form-control-lg" placeholder="Phone Number" required
                                            style="border-radius: 10px; padding: 8px;     box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);" />
                                    </div>

                                    <div class="form-check d-flex justify-content-start pb-2">
                                        <input class="form-check-input me-3" type="checkbox" value=""
                                            id="form2Example3c" required />
                                        <label class="form-check-label text-black" for="form2Example3">
                                            I accept the <a href="#!" class="text-black"><u>Terms and Conditions</u></a>
                                            of your site.
                                        </label>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg py-2 w-100"
                                        data-mdb-ripple-color="dark"
                                        style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">Register</button>
                                </div>
                            </div>

                            <div
                                class="col-lg-6 bg-indigo text-white d-flex flex-column align-items-center justify-content-center">
                                <img src="views/assets/img/adduserimage.jpg" alt="userimage"
                                    style="width: 500px; height: auto; margin-bottom: 2rem;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>