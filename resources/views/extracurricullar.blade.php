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
                    <h1>EXTRACURRICULAR</h1>
                    <br />
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="extracurricular_name">Extracurricular Name</label>
                                <input type="text" name="" id="extracurricular_name" placeholder="Extracurricular Name">
                            </div>
                            <div class="form-group">
                                <label for="extracurricular_leader_id">Extracurricular Leader</label>
                                <input type="text" name="" id="extracurricular_leader_id" placeholder="Extracurricular Leader">
                            </div>
                            <div class="form-group">
                                <label for="extracurricular_coach_id">Extracurricular Coach</label>
                                <input type="text" name="" id="extracurricular_coach_id" placeholder="Extracurricular Coach">
                            </div>
                                

                            <button id="create-extracuricullar-btn" class="btn btn-primary btn-sm">Create</button>
                        </div>
                        <div class="com-md-1"></div>
                        <div class="col-md-7">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Extracurricular Name</th>
                                        <th>Extracurricular Leader</th>
                                        <th>Extracurricular Coach</th>
                                    </tr>
                                </thead>
                                <tbody id="extracurricular-lists">
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

        // run when page loaded
        getextracurricular();

        // Get extracurricular

        function getextracurricular() {
            // empty the children element before get data
            $("#extracurricular-lists").empty()

            $.get(url + "/extracurricular/list", function(data, status) {

                console.log("data", data)
                console.log("status", status)

                let extracurriculars = [];
                console.log("extracurricular sebelumnya", extracurriculars)

                if (status === 'success') {
                    extracurriculars = data.data;
                    console.log("extracurricular setelahnya", extracurriculars)
                    
                    setUpList(extracurriculars);
                }
            })
        }

        function setUpList(extracurriculars) {
            extracurriculars.forEach((extracurricular, index) => { 
                let element = $("#extracurricular-lists");
                let no = index + 1;
                element.append(
                    "<tr>" 
                        + "<td>" 
                        + no
                        + "</td>"
                        + "<td>" 
                        + extracurricular.extracurricular_name 
                        + "</td>"
                        + "<td>" 
                        + extracurricular.extracurricular_leader_id 
                        + "</td>"
                        + "<td>" 
                        + extracurricular.extracurricular_coach_id
                        + "</td>"
                    + "</tr>"
                    );
            });
        }

        // Create Religion
        $("#create-extracuricullar-btn").click(function () {
            const getextracurricularName = $("#extracurricular_name").val();
            const getextracurricularLeaderId = $("#extracurricular_leader_id").val();
            const getextracurricularCoachId = $("#extracurricular_coach_id").val();
            const data = {
                extracurricular_name: getextracurricularName,
                extracurricular_leader_id: getextracurricularLeaderId,
                extracurricular_coach_id: getextracurricularCoachId
            }

            $.post(url + "/extracurricular/create", data, function(data, status) {
                console.log("data", data)
                console.log("status", status)
                if (status === 'success') {
                    getextracurricular();
                }
            });
        })
    </script>
</body>
</html>