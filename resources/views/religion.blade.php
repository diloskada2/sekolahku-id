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
                    <h1>RELIGION</h1>
                    <br />
                    <div class="row">
                        <div class="col-md-4">
                            <h5>CREATE</h5>
                            <div class="form-group">
                                <input id="religion-name" placeholder="Religion Name" type="text" class="form-control">
                            </div>

                            <button id="create-religion-btn" class="btn btn-primary btn-sm">Create</button>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-7">
                            <h5>LIST</h5>
                            <ul id="religion-lists"></ul>
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
        getReligion();

        // Get Religion 

        function getReligion() {
            // Empty the children element before get data
            $("#religion-lists").empty()
            
            $.get(url + "/religion/list", function(data, status) {

            console.log("data", data)
            console.log("status", status)

            let religions = [];
            console.log("religions sebelumnya", religions)

            if (status === 'success') {
                religions = data.data;
                console.log("religions setelahnya", religions)

                setUpList(religions);
            }
            })
        }

        function setUpList(religions) {
            religions.forEach(religion => { 
                let element = $("#religion-lists");
                element.append("<li>" + religion.religion_name + "</li>");
            });
        }

        // Create Religion
        $("#create-religion-btn").click(function () {
            const getReligionName = $("#religion-name").val();
            const data = {
                religion_name: getReligionName
            }

            $.post(url + "/religion/create", data, function(data, status) {
                console.log("data", data)
                console.log("status", status)
                if (status === 'success') {
                    getReligion();
                }
            });
        })
    </script>
</body>
</html>