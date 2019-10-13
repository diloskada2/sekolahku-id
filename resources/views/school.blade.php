<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</body>
<div class="container">
    <br />
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>School</h1>
                <br />
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="school-history">School History</label>
                            <textarea  id="school-history" cols="30" rows="10" placeholder="School History" style="width:325px; height:100px;" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="school-address">School Address</label>
                            <input id="school-address" placeholder="School Address" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="school-phone-number">School Phone Number</label>
                            <input id="school-phone-number" placeholder="School Phone Number" type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="school-map-location">School Map Location</label>
                            <input id="school-map-location" placeholder="School Map Location" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="school-name">School Name</label>
                            <input id="school-name" placeholder="School Name" type="text" class="form-control">
                        </div>
                        
                        <button id="create-school-btn" class="btn btn-primary btn-sm">Create</button>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-7">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>School History</th>
                                    <th>School Address</th>
                                    <th>School Phone Number</th>
                                    <th>School Map Location</th>
                                    <th>School Name</th>
                                </tr>
                            </thead>
                            <tbody id="school-lists">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Global Variable
    const url = "http://127.0.0.1:8000/api";

    // Run when page loaded
    getSchool();

    // Get School 

    function getSchool() {
        // Empty the children element before get data
        $("#school-lists").empty()
        
        $.get(url + "/school/list", function(data, status) {

        console.log("data", data)
        console.log("status", status)

        let schools = [];
        console.log("schools sebelumnya", schools)

        if (status === 'success') {
            schools = data.data;
            console.log("schools setelahnya", schools)

            setUpList(schools);
        }
        })
    }

    function setUpList(schools) {
        schools.forEach((school, index) => { 
            let element = $("#school-lists");
            let no = index + 1;
            element.append(
                "<tr>" 
                    + "<td>" 
                    + no
                    + "</td>"
                    + "<td>" 
                    + school.school_history
                    + "</td>"
                    + "<td>" 
                    + school.school_address
                    + "</td>"
                    + "<td>" 
                    + school.school_phone_number
                    + "</td>"
                    + "<td>" 
                    + school.school_map_location
                    + "</td>"
                    + "<td>" 
                    + school.school_name
                    + "</td>"
                + "</tr>"
                );
        });
    }

    // Create School
    $("#create-school-btn").click(function () {
        const getSchoolHistory = $("#school-history").val();
        const getSchoolAddress = $("#school-address").val();
        const getSchoolPhoneNumber = $("#school-phone-number").val();
        const getSchoolMapLocation = $("#school-map-location").val();
        const getSchoolName = $("#school-name").val();
        const data = {
            school_history      : getSchoolHistory,
            school_address      : getSchoolAddress,
            school_phone_number : getSchoolPhoneNumber,
            school_map_location : getSchoolMapLocation,
            school_name         : getSchoolName
        }

        $.post(url + "/school/create", data, function(data, status) {
            console.log("data", data)
            console.log("status", status)
            if (status === 'success') {
                getSchool();
            }
        });
    })
</script>
</html>