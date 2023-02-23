<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Armita Sabri Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="section" >
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

