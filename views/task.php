<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Armita Sabri Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
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

