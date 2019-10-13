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
                    <h1>CLASSES</h1>
                    <br />
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="class_name">Class Name</label>
                                <input id="class_name" placeholder="Class Name" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="class_leader">Class Leader</label>
                                <input id="class_leader" placeholder="Class Leader" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="class_2nd_leader">Class 2nd Leader</label>
                                <input id="class_2nd_leader" placeholder="Class 2nd Leader" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="class_treasurer">Class Treasurer</label>
                                <input id="class_treasurer" placeholder="Class Treasurer" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="class_secretary">Class Secretary</label>
                                <input id="class_secretary" placeholder="Class Secretary" type="text" class="form-control">
                            </div>

                            <button id="create-classes-btn" class="btn btn-primary btn-sm">Create</button>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-7">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Class Name</th>
                                        <th>Class Leader</th>
                                        <th>Class 2nd Leader</th>
                                        <th>Class Treasurer</th>
                                        <th>Class Secretary</th>
                                    </tr>
                                </thead>
                                <tbody id="classes-lists">
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
        getClasses();

        // Get Religion 

        function getClasses() {
            // Empty the children element before get data
            $("#classes-lists").empty()
            
            $.get(url + "/class/list", function(data, status) {

            console.log("data", data)
            console.log("status", status)

            let classes = [];
            console.log("classes sebelumnya", classes)

            if (status === 'success') {
                classes = data.data;
                console.log("classes setelahnya", classes)

                setUpList(classes);
            }
            })
        }

        function setUpList(classes) {
            classes.forEach((classes, index) => { 
                let element = $("#classes-lists");
                let no = index + 1;
                element.append(
                    "<tr>" 
                        + "<td>" 
                        + no
                        + "</td>"
                        + "<td>" 
                        + classes.class_name 
                        + "</td>"
                        + "<td>" 
                        + classes.class_leader
                        + "</td>"
                        + "<td>" 
                        + classes.class_2nd_leader
                        + "</td>"
                        + "<td>" 
                        + classes.class_treasurer
                        + "</td>"
                        + "<td>" 
                        + classes.class_secretary
                        + "</td>"

                    + "</tr>"
                    );
            });
        }

        // Create Classes
        $("#create-classes-btn").click(function () {
            const getClassesName = $("#class_name").val();
            const getClassesLeader = $("#class_leader").val();
            const getClasses2ndLeader = $("#class_2nd_leader").val();
            const getClassesTreasurer = $("#class_treasurer").val();
            const getClassesSecretary = $("#class_secretary").val();
            const data = {
                class_name: getClassesName,
                class_leader: getClassesLeader,
                class_2nd_leader: getClasses2ndLeader,
                class_treasurer: getClassesTreasurer,
                class_secretary: getClassesSecretary
            }
            console.log(data);
            $.post(url + "/class/create", data, function(data, status) {
                console.log("data", data)
                console.log("status", status)
                if (status === 'success') {
                    getClasses();
                }
            });
        })
    </script>
</body>
</html>