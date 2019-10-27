<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br />
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h1>Staff</h1>
                    <br />
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="staff_name">Staff Name</label>
                                <input id="staff_name" placeholder="Staff Name" type="text" class="form-control">
                                <br>
                                <label for="religion_id">Religion Name</label>
                                <input id="religion_id" placeholder="Religion Name" type="text" class="form-control">
                            </div>
                            <br>
                            <button id="create-staff-btn" class="btn btn-primary btn-md ">Create</button>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-7">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Staff Name</th>
                                        <th>Religion Name</th>
                                    </tr>
                                </thead>
                                <tbody id="staff-lists">
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
        getStaff();

        // Get staff 

        function getStaff() {
            // Empty the children element before get data
            $("#staff-lists").empty()
            
            $.get(url + "/staff/list", function(data, status) {

            console.log("data", data)
            console.log("status", status)

            let staffs = [];
            console.log("staffs sebelumnya", staffs)

            if (status === 'success') {
                staffs = data.data;
                console.log("staffs setelahnya", staffs)

                setUpList(staffs);
            }
            })
        }

        function setUpList(staffs) {
            staffs.forEach((staff, index) => { 
                let element = $("#staff-lists");
                let no = index + 1;
                element.append(
                    "<tr>" 
                        + "<td>" 
                        + no
                        + "</td>"
                        + "<td>" 
                        + staff.staff_name
                        + "</td>"
                        + "<td>" 
                        + staff.religion_id 
                        + "</td>"
                    + "</tr>"
                    );
            });
        }

        // Create staff
        $("#create-staff-btn").click(function () {
            const getStaffName = $("#staff_name").val();
            const getReligionId = $("#religion_id").val();
            const data = {
                staff_name: getStaffName,
                religion_id: getReligionId
            }

            $.post(url + "/staff/create", data, function(data, status) {
                console.log("data", data)
                console.log("status", status)
                if (status === 'success') {
                    getStaff();
                }
            });
        })
    </script>
</body>
</html>