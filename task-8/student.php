<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form using bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>
<body>
    <?php
        // define variables and set to empty values
        $first_name = $last_name = $mobile_number = $email = $branch_select = $permanent_address = $hostel = $add_subjects = $add_subject = '';
        $first_name_error = $last_name_error = $mobile_number_error =$email_error = $branch_select_error = $permanent_address_error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            // validate First name
            if (empty($_POST["first_name"])) {
                $first_name_error = 'First name is mandatory';
            }else{
                $first_name = sanitizeField($_POST['first_name']);
            }
            // validate Last name
            if (empty($_POST["last_name"])) {
                $last_name_error = 'Last name is mandatory';
            }else{
                $last_name = sanitizeField($_POST['last_name']);
            }
            // validate Mobile number
             if (empty($_POST["mobile_number"])) {
                $mobile_number_error ='Mobile number is mandatory';
            }else{
                $mobile_number = sanitizeField($_POST['mobile_number']);
            }
            // validate email id
             if (empty($_POST["email"])) {
                $email_error = 'email is mandatory';
            }else{
                $email = sanitizeField($_POST['email']);
            }
            // validate Branch select
            if (empty($_POST["branch_select"])) {
                $branch_select_error = 'branch select is mandatory';
            }else{
                $branch_select = sanitizeField($_POST['branch_select']);
            }
            // //Hostel
            // $hostel = sanitizeField($_POST['hostel']);
            // //Additional subjects
            // $add_subjects =$_POST['add_subjects'];
		    // foreach ($add_subjects as $row) {
			//     $add_subject .= $row . ",";
		    // }
            // validate Permanent address
            if (empty($_POST["permanent_address"])) {
                $permanent_address_error = 'permanent address is mandatory';
            }else{
                $permanent_address = sanitizeField( $_POST['permanent_address']);
            }     
            // if there are no errors, insert data into database
            if (empty($first_name_error) && empty($last_name_error) && empty($mobile_number_error) && empty($email_error) && empty( $branch_select_error) && empty($permanent_address_error)) {
                $server_name = "localhost";
                $username = "root";
                $password = "";
                $dbname = "schools";

                // create connection
                $conn = new mysqli($server_name, $username, $password, $dbname);

                // check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // prepare and bind statement
                $stmt = $conn->prepare("INSERT INTO students (first_name, last_name, mobile_number, email, branch_select, hostel, add_subject , permanent_address) VALUES (?, ?, ?, ?, ?, ?, ?,?)");
                $stmt->bind_param("ssssssss", $first_name,$last_name,$mobile_number,$email,$branch_select,$hostel,$add_subject,$permanent_address);

                // execute statement
                if ($stmt->execute() === TRUE) {
                    echo "New record created successfully";
                    header("Location: main.php");
                    exit();
                } else {
                    echo "Error: " . $stmt->error;
                }

                // close statement and connection
                $stmt->close();
                $conn->close();
            }
         }
         function sanitizeField($field)
         {
            $field = trim($field);
            $field = stripcslashes($field);
            return $field;
         }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid justify-content-between">
             <a class="navbar-brand font-weight-bold"href="index.php">
                <img src="images/logo.png" alt="Logo" width="60" height="70" class="d-inline-block align-text-center" />
                ONE SCHOOL
             </a>
             <a class="navbar-brand" href="#">
                <img class="rounded-circle" src="images/image.jpg" alt="profile" width="60" height="60" />
             </a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="container_height row">
            <div class="sidebar_border col-2 border-end bg-light">
                <ul class="list-unstyled">
                    <li class="my-4 mx-5 font-weight-bold">STUDENTS</li>
                    <li class="my-4 mx-5 font-weight-bold">STAFF</li>
                    <li class="my-4 mx-5 font-weight-bold">EXAMS</li>
                </ul>
            </div>
            <div class="col-10">
				<div class="row-12 my-3 font-weight-bold">STUDENT REGISTRATION</div>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="row g-3 needs-validation" novalidate method="POST">
                    <!-- First name -->
                    <div class="col-sm-12 col-md-6 mb-2">
                        <label for="fname" class="form-label">First Name <span class="text-danger">*</span> </label>
                        <input type="text" id="fname" name="first_name" class="form-control
                                                    <?php if(!empty($first_name_error)) {
                                                            echo 'is-invalid';
                                                    } ?>"
                                                    placeholder="Enter student's first name" required 
                                                    value="<?php echo $first_name ; ?>"/>
                        <div class="invalid-feedback">
                                                    <?php if(!empty($first_name_error)) {
                                                            echo $first_name_error;
                                                    }else{
                                                        echo "First Name is Required";
                                                    }
                                                    ?>
                        </div>
                    </div>
                    <!-- Last name -->
                    <div class="col-sm-12 col-md-6 mb-2">
                        <label for="lname" class="form-label">Last Name<span class="text-danger">*</span></label>
                        <input type="text" id="lname" name="last_name" class="form-control 
                                                    <?php if(!empty($last_name_error)) {
                                                            echo 'is-invalid';
                                                    } ?>"
                                                    placeholder="Enter student's last name" required  value="<?php echo $last_name ; ?>"/>
                        <div class="invalid-feedback">
                                                    <?php if(!empty($last_name_error)) {
                                                            echo $last_name_error;
                                                    }else{
                                                        echo "Last Name is Required";
                                                    }
                                                    ?>
                        </div>
                    </div>
                    <!-- Mobile number -->
                    <div class="col-sm-12 col-md-6 mb-2">
                        <label for="phone-no" class="form-label">Mobile Number<span class="text-danger">*</span> </label>
                        <input type="tel" id="phone-no" name="mobile_number" class="form-control
                                                    <?php if(!empty($mobile_number_error)) {
                                                            echo 'is-invalid';
                                                    } ?>"placeholder="Enter your mobile number" required  value="<?php echo $mobile_number ; ?>"/>
                        <div class="invalid-feedback">
                                                    <?php if(!empty($mobile_number_error)) {
                                                            echo $mobile_number_error;
                                                    }else{
                                                        echo "Mobile Number is Required";
                                                    }
                                                    ?>
                        </div>
                    </div>
                    <!-- email -->
                    <div class="col-sm-12 col-md-6 mb-2">
                        <label for="email" class="form-label">Email<span class="text-danger">*</span> </label>
                        <input type="email" id="email" name="email" class="form-control
                                                    <?php if(!empty($email_error)) {
                                                            echo 'is-invalid';
                                                    } ?>"placeholder="Enter your email id" required  value="<?php echo $email ; ?>"/>
                        <div class="invalid-feedback">
                                                    <?php if(!empty($email_error)) {
                                                            echo $email_error;
                                                    }else{
                                                        echo "Student's email id Required";
                                                    }
                                                    ?>
                        </div>
                    </div>
                    <!-- Branch -->
                    <div class="col-sm-12 col-md-6 mb-2">
                        <label for="branch-name" class="form-label">Branch<span class="text-danger">*</span> </label>
                        <select name="branch_select" id="branch-name" class="form-select
                                                    <?php if(!empty($branch_select_error)) {
                                                            echo 'is-invalid';
                                                    } ?>" required  value="<?php echo $branch_select ; ?>">
                            <option value="">select the branch you like </option>
                            <option value="ECE">ECE</option>
                            <option value="CSE">CSE</option>
                            <option value="EEE">EEE</option>
                            <option value="ME">ME</option>
                            <option value="AE">AE</option>
                            <option value="BME">BME</option>
                        </select>
                        <div class="invalid-feedback">
                                                    <?php if(!empty($branch_select_error)) {
                                                            echo $branch_select_error;
                                                    }else{
                                                        echo "student's branch is Required";
                                                    }
                                                    ?>
                        </div>
                    </div>
                    <!-- Hostel facility -->
                    <div class="col-sm-12 col-md-6 mb-2 position-relative">
                        <label for="hostel" class="form-label d-block">Do You Need Hostel Facility :</label>
                        <div class="form-check form-check-inline fix">
                            <input type="radio" class="form-check-input" name="hostel_stay" id="hostel-yes"/>
                            <label class="form-check-label" for="hostel-yes">
                                Yes
                            </label>
                        </div>
                        <div class="form-check form-check-inline fix">
                            <input type="radio" class="form-check-input" name="no_hostel_stay" id="hostel-no"/>
                            <label class="form-check-label" for="hostel-no">
                                No
                            </label>
                        </div>  
                    </div>
                    <!-- Additional subjects -->
                    <div class="col-md-7 col-xs-12 mb-2 position-relative">
                        <label for="subject" class="form-label d-block">Choose Additional Subjects :</label>
                        <div class="form-check form-check-inline ">
                            <input class="form-check-input" type="checkbox" value="Cyber-security" id="cyber-security">
                            <label class="form-check-label" for="cyber-security">
                                Cyber security
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Artificial-Intelligence" id="artificial-intelligence">
                            <label class="form-check-label" for="artificial-intelligence">
                                Artificial Intelligence
                            </label>
                        </div>
                        <div class="form-check form-check-inline ">
                            <input class="form-check-input" type="checkbox" value="Block-chain" id="block-chain">
                            <label class="form-check-label" for="block-chain">
                                Block chain
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="IoT" id="iot">
                            <label class="form-check-label" for="iot">
                                IoT
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Robotics" id="robotics">
                            <label class="form-check-label" for="robotics">
                                Robotics
                            </label>
                        </div>
                    </div>
                    <!-- Permanent Address -->
                    <div class="col-md-6 col-sm-12 mb-2">
                        <label for="address" class="form-label">Permanent Address <span class="text-danger">*</span></label>
                        <textarea class="form-control" placeholder="Enter student's address" id="address" style="height: 80px" required  value="<?php echo $permanent_address ; ?>"></textarea>
                        <div class="invalid-feedback">
                                                        <?php if(!empty($permanent_address_error)) {
                                                                echo $permanent_address_error;
                                                        }else{
                                                            echo "Student's address is Required";
                                                        }
                                                        ?>
                        </div>
                    </div>
                    <!-- Submit -->
                    <div class="col-md-6 col-sm-12 offset-md-6 text-end ">
                        <button type="reset" class="btn btn-danger btn-sm ">
                            <i class="bi bi-reply"></i>
                            Clear
                        </button>
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="bi bi-person-plus-fill"></i>
                            Submit
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()
    </script>
</body>
</html>