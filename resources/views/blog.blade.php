<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br />
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h1>Blog</h1>
                    <br />
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input id="title" placeholder="Title" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <input id="content" placeholder="Content" type="text" class="form-control">
                            </div>

                            <button id="create-blog-btn" class="btn btn-primary btn-sm">Create</button>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-7">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                    </tr>
                                </thead>
                                <tbody id="blog-list">
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
        const url = "http://sekolahku-id.dev.com/api";

        // Run when page loaded
        getBlog();

        // Get Religion 
        function getBlog() {
            // Empty the children element before get data
            $("#blog-list").empty()
            
            $.get(url + "/blog/list", function(data, status) {

            console.log("data", data)
            console.log("status", status)

            let blogs = [];
            console.log("blog before", blogs)

            if (status === 'success') {
                blogs = data.blog;
                console.log("blog after", blogs)

                setUpList(blogs);
            }
            })
        }

        function setUpList(blogs) {
            blogs.forEach((blog, index) => { 
                let element = $("#blog-list");
                let no = index + 1;
                element.append(
                    "<tr>" 
                        + "<td>" 
                        + no
                        + "</td>"
                        + "<td>" 
                        + blog.title 
                        + "</td>"
                        + "<td>" 
                        + blog.content 
                        + "</td>"
                    + "</tr>"
                    );
            });
        }

        // Create Religion
        $("#create-blog-btn").click(function () {
            // console.log("tombol di klik")
            const getTitle = $("#title").val();
            const getContent = $("#content").val();
            const data = {
                title: getTitle,
                content: getContent
            }

            $.post(url + "/blog/create", data, function(data, status) {
                console.log("data", data)
                console.log("status", status)
                if (status === 'success') {
                    getBlog();
                }
            });
        })
    </script>
</body>
</html>