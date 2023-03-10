<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Armita Sabri Task</title>
    <link rel="stylesheet" href="./public/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">

<!--        <button type="button" id="myInput" class="btn btn-info mb-4 mt-2" >-->
<!--            get new tasks-->
<!--        </button>-->

        <div class="section d-flex justify-content-between" >
            <div class="modal_section">
                <div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#imageModal">
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
                                            <button type="submit" id="btn">Upload Files!</button>
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

                <nav aria-label="Page navigation example">
                    <ul class="pagination" id="pagination">
                    </ul>
                </nav>


            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="./public/assets/js/pagination.js"></script>
    <script src="./public/assets/js/search.js"></script>
    <script src="./public/assets/js/upload.js"></script>
    <script src="./public/assets/js/auto_refreshing.js"></script>

</body>
</html>

<script>

    $(document).ready(function(){

        pagination();
        search();

        $('.pagination').on('click','button.page-link', function(e) {
            e.preventDefault();
            var clickedPage=parseInt(this.innerText)
            buildPage(clickedPage)
            search()
        });

        auto_refreshing();

    });
</script>

