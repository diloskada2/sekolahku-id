<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Councils</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br />
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h1>STUDENT COUNCILS</h1>
                    <br />
                    <div class="row">
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="leader">Leader</label>
                                <input id="leader" placeholder="Leader" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="vice_leader">Vice Leader</label>
                                <input id="vice_leader" placeholder="vice_leader" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="secretary">Secretary</label>
                                <input id="secretary" placeholder="secretary" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="treasurer">Treasurer</label>
                                <input id="treasurer" placeholder="treasurer" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="coach">coach</label>
                                <input id="coach" placeholder="coach" type="text" class="form-control">
                            </div>

                            <button id="create-student-councils-btn" class="btn btn-primary btn-sm">Create</button>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-7">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Leader</th>
                                        <th>Vice Leader</th>
                                        <th>Secretary</th>
                                        <th>Treasurer</th>
                                        <th>Coach</th>
                                    </tr>
                                </thead>
                                <tbody id="student-councils-lists">
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
        getStudentCouncils();

        // Get STudent Councils

        function getStudentCouncils() {
            // Empty the children element before get data
            $("#student-councils-lists").empty()

            $.get(url + "/student-councils/list", function(data, status) {

            console.log("data", data)
            console.log("status", status)

            let studentCouncils = [];
            console.log("student councils sebelumnya", studentCouncils)

            if (status === 'success') {
                studentCouncils = data.student_councils;
                console.log("student councils setelahnya", studentCouncils)

                setUpList(studentCouncils);
            }
            })
        }

        function setUpList(studentCouncils) {
            studentCouncils.forEach((student_councils, index) => {
                let element = $("#student-councils-lists");
                let no = index + 1;
                element.append(
                    "<tr>"
                        + "<td>"
                        + no
                        + "</td>"
                        + "<td>"
                        + student_councils.leader
                        + "</td>"
                        + "<td>"
                        + student_councils.vice_leader
                        + "</td>"
                        + "<td>"
                        + student_councils.secretary
                        + "</td>"
                        + "<td>"
                        + student_councils.treasurer
                        + "</td>"
                        + "<td>"
                        + student_councils.coach
                        + "</td>"
                    + "</tr>"
                    );
            });
        }

        // Create Religion
        $("#create-student-councils-btn").click(function () {
            const getLeader = $("#leader").val();
            const getViceLeader = $("#vice_leader").val();
            const getSecretary = $("#secretary").val();
            const getTreasurer = $("#treasurer").val();
            const getCoach = $("#coach").val();
            const data = {
                leader: getLeader,
                vice_leader: getViceLeader,
                secretary: getSecretary,
                treasurer: getTreasurer,
                coach: getCoach
            }

            $.post(url + "/student-councils/create", data, function(data, status) {
                console.log("data", data)
                console.log("status", status)
                if (status === 'success') {
                    getStudentCouncils();
                }
            });
        })
    </script>
</body>
</html>
