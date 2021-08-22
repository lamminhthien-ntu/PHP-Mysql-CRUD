<?php include('db.php') ?>
<?php include('includes/header.php')?>

<div class="container p-2">
    <div class="row">
        <div class="col-md-4">

        <?php if (isset($_SESSION['message'])){ ?>
            <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php session_unset(); } ?>

            <form action="save_task.php" method="post">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
                </div>
                <div class="form-group">
                    <textarea name="description" id="" rows="2" class="form-control" 
                    placeholder="Task Description"></textarea>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save task">
            </form>
        </div>
    
        <div class="col-md-8">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Task Description</th>
                        <th>Time Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM task ";
                        $result_task = mysqli_query($conn, $query);
                        
                        
                        while ($row = mysqli_fetch_array($result_task))
                        { ?>
                            <tr>                 
                                <td><?php echo $row['title'] ?></td>
                                <td><?php echo $row['description'] ?></td>
                                <td><?php echo $row['created_at'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id'] ?>" <div class="btn btn-secondary"></div>
                                       <i class="far fa-marker"></i>
                                     </a>
                                     <a href="delete_task.php?id=<?php echo $row['id'] ?>" <div class="btn btn-danger"></div>
                                        <i class="far fa-trash-alt"></i>
                                     </a>
                                </td>
                            </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>



<?php include('includes/footer.php')?>