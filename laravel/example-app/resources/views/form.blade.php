<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2>STUDENT FORM</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/">
                            @csrf
                            <div class="mb-3">
                                <label for="first-name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first-name" name="first_name">
                            </div>
                            <div class="mb-3">
                                <label for="last-name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last-name" name="last_name">
                            </div>
                            <div class="mb-3">
                                <label for="mobile-number" class="form-label">Mobile Number</label>
                                <input type="tel" class="form-control" id="mobile-number" name="mobile_number">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="branch-select" class="form-label">Branch</label>
                                <select name="branch_select" id="branch-select" class="form-select">
                                    <option value="">select the branch you like </option>
                                    <option value="ECE">ECE</option>
                                    <option value="CSE">CSE</option>
                                    <option value="EEE">EEE</option>
                                    <option value="ME">ME</option>
                                    <option value="AE">AE</option>
                                    <option value="BME">BME</option>
                                </select>
                            </div>
                            <div class=" mb-2 position-relative">
                                <label for="hostel" class="form-label ">Do You Need Hostel Facility :</label>
                                <div class="form-check form-check-inline fix">
                                    <input type="radio" class="form-check-input" name="hostel" id="hostel-yes" value="1" />
                                    <label class="form-check-label" for="hostel-yes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline fix">
                                    <input type="radio" class="form-check-input" name="hostel" id="hostel-no" value="0" />
                                    <label class="form-check-label" for="hostel-no">
                                        No
                                    </label>
                                </div>
                            </div>
                            <div class=" mb-2 position-relative">
                                <label>Choose Additional Subjects :</label>
                                <label class="wrapper check-wrapper">
                                    <input type="checkbox" name="additional_subjects[]" value="Cyber-security" />
                                    Cyber security
                                </label>
                                <label class="wrapper check-wrapper">
                                    <input type="checkbox" name="additional_subjects[]" value="Artificial-Intelligence" />
                                    Artificial Intelligence
                                </label>
                                <label class="wrapper check-wrapper">
                                    <input type="checkbox" name="additional_subjects[]" value="Block-chain" />
                                    Block chain
                                </label>
                                <label class="wrapper check-wrapper">
                                    <input type="checkbox" name="additional_subjects[]" value="IoT" />
                                    IoT
                                </label>
                                <label class="wrapper check-wrapper">
                                    <input type="checkbox" name="additional_subjects[]" value="Robotics" />
                                    Robotics
                                </label>
                            </div>
                            <div class="mb-3">
                                <label for="permanent-address" class="form-label">Permanent Address</label>
                                <textarea class="form-control" name="permanent_address" id="permanent-address"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>