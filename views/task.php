<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Armita Sabri Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="section d-flex justify-content-between" >
            <div class="modal_section">
                <div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#imageModal">
                        upload
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="imageModalLabel">Choose your image</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div id="main">
                                        <form method="post" enctype="multipart/form-data" action="#">
                                            <input type="file" name="image" id="image" accept="image/*" />
                                        </form>
                                        <ul id="image-list" >
                                        </ul>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="input-group d-flex justify-content-end" >
                <div class="form-outline">
                    <label for="searchInput"></label><input id="searchInput" type="text" class="form-control" placeholder="Search inside the table..." />
                </div>

            </div>

        </div>
        <div class="section mt-2">
            <div class="d-flex flex-column">
                <table  id="myTable" class="table table-bordered table-responsive"  style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>task</th>
                        <th>title</th>
                        <th>description</th>
                        <th>colorCode</th>
                    </tr>
                    </thead>
                    <tbody  id="tableBody">

                    <?php if(count($tasks)>1) : ?>
                        <?php foreach ($tasks as $key => $rows) :?>
                            <tr >
                                <td><?php echo $key+1; ?></td>
                                <td> <?php echo $rows['task']; ?></td>
                                <td> <?php echo $rows['title']; ?></td>
                                <td> <?php echo $rows['description']; ?></td>
                                <td style="background-color:<?=$rows['colorCode']?>">
                                </td>
                            </tr>
                        <?php endforeach;?>
                    <?php endif;?>

                    </tbody>
                </table>


            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<script>

    $(document).ready(function(){


        var nextDate = new Date();

        if (nextDate.getMinutes() === 0) {
            callEveryHour()
        } else {
            nextDate.setHours(nextDate.getHours() + 1);
            nextDate.setMinutes(0);
            nextDate.setSeconds(0);// I wouldn't do milliseconds too ;)

            var difference = nextDate - new Date();
            setTimeout(callEveryHour, difference);
        }

        function callEveryHour() {
            setInterval(getResults, 1000 * 60 * 60);  // 1 hour in msec
        }

        function getResults() {
            // Creating the XMLHttpRequest object
            var request = new XMLHttpRequest();

            // Instantiating the request object
            request.open("POST", "/myTask/get_new_tasks");

            // Defining event listener for readystatechange event
            request.onreadystatechange = function() {
                // Check if the request is compete and was successful
                if(this.readyState === 4 && this.status === 200) {

                    //empty old data from tbody tag
                    const old_tbody = document.getElementById("tableBody");
                    const new_tbody = document.createElement('tbody');
                    old_tbody.parentNode.replaceChild(new_tbody, old_tbody);
                    new_tbody.setAttribute("id", "tableBody");


                    var json_response=JSON.parse(this.responseText);

                    var row = [];
                    for (var i=0;i<json_response.data.length;i++){
                        row[i] = new_tbody.insertRow(i);
                        row[i].innerHTML = " <td>"+(i+1)+"</td>" +
                            "<td>"+json_response.data[i].task+"</td>" +
                            "<td>"+json_response.data[i].title+"</td>" +
                            "<td>"+json_response.data[i].description+"</td>" +
                            "<td style=background-color:"+json_response.data[i].colorCode+"></td>";
                    }

                    alert('refreshed');

                }
            };

            // Sending the request to the server
            request.send();
        }



    });
</script>

