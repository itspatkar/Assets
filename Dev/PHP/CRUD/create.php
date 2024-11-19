<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Add Employee</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Select2 CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        div {
            font-size: 1.25rem;
        }
    </style>
</head>

<body>
    <div>
        <h2 class="p-5 text-center">Add New Employee</h2>

        <div class="container">
            <div class="jumbotron">
                <form method="post" action="PHP/create.php">
                    <label for="name"><b>Name :</b> </label>
                    <input type="text" name="name" autofocus required>
                    <br>
                    <label for="dob"><b>Birthdate :</b> </label>
                    <input type="date" name="dob" required>
                    <br>
                    <label for="gender"><b>Gender :</b> </label>
                    <input type="radio" name="gender" value="Male" required> Male
                    <input type="radio" name="gender" value="Female" required> Female
                    <br>
                    <label for="dob"><b>State :</b> </label>
                    <select id="state" name="state">
                        <option value="select" selected disabled>Select State</option>
                        <?php include "PHP/states.php"; ?>
                    </select>
                    <br>
                    <label for="dob"><b>City :</b> </label>
                    <select id="city" name="city">
                        <option value="select" selected disabled>Select City</option>
                        <?php include "PHP/cities.php"; ?>
                    </select>
                    <br>
                    <div id="educationDetails">
                        <div class="education-row">
                            <label for="dob"><b>Education :</b> </label>
                            <br>
                            <input type="text" name="education[]" placeholder="Education" required>
                            <input type="text" name="yearOfCompletion[]" placeholder="Year Of Completion" required>
                            <button type="button" onclick="addEducation()">Add</button>
                        </div>
                    </div>
                    <br>
                    <label for="profilepic"><b>Profile Picture :</b> </label>
                    <input type="file" name="profilepic" accept="image/*" required>
                    <br>
                    <label><b>Skills :</b> </label>
                    <select class="skills" name="skills[]" multiple="multiple">
                        <?php include "PHP/skills.php"; ?>
                    </select>
                    <br>
                    <label for="certificates"><b>Certificates :</b> </label>
                    <input type="file" name="certificates[]" multiple required>
                    <br>
                    <label for="profession"><b>Profession :</b> </label>
                    <input type="radio" name="profession" id="salaried" value="Salaried" required> Salaried
                    <input type="radio" name="profession" id="self-employed" value="Self-Employed" required> Self-employed
                    <br>
                    <div id="optSalaried" style="display:none;">
                        <label for="companyname"><b>Company Name :</b> </label>
                        <input id="salariedCompany" type="text" name="companyname" autofocus required>
                        <br>
                        <label for="jobdate"><b>Job Stated From :</b> </label>
                        <input id="salariedJobDate" type="date" name="jobdate" required>
                    </div>
                    <div id="optSelfemployed" style="display:none;">
                        <label for="businessname"><b>Business Name :</b> </label>
                        <input id="selfemployedBusiness" type="text" name="businessname" autofocus required>
                        <br>
                        <label for="businesslocation"><b>Business Location :</b> </label>
                        <input id="selfemployedLocation" type="text" name="businesslocation" required>
                    </div>
                    <label for="email"><b>Email :</b> </label>
                    <input type="email" name="email" required>
                    <br>
                    <label for="mobile"><b>Mobile Number :</b> </label>
                    <input type="number" name="mobile" min="1000000000" max="9999999999" pattern="\d{10}" required>
                    <br>
                    <input class="m-3" type="submit" name="submit" value="Submit">
                </form>
            </div>

            <div class="text-center"><button type="button" class="btn btn-outline-primary "><a href="index.php">HOME</a></button></div>
        </div>
    </div>

    <script src="JS/profession.js"></script>
    <script src="JS/education.js"></script>
    <script>
        $(document).ready(function() {
            $('.skills').select2();
        });
    </script>
</body>

</html>