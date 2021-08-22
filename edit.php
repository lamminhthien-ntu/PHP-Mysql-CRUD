<?php
    include('db.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = '$id'";
        $result =  mysqli_query($conn,$query);
        if (mysqli_num_rows($result) == 1) {
            // echo 'You can edit';
            $row = mysqli_fetch_array($result);
            // Test 1 row we are editting
            $title = $row['title'];
            $description = $row['description'];
            // echo $title;
        }

    }

    if (isset($_POST['update']))
    {
       $id = $_GET['id'];
       $title = $_POST['title'];
       $description = $_POST['description'];

       $query = "UPDATE task set title = '$title', description = '$description' WHERE id = '$id'";
       mysqli_query($conn,$query);

       $_SESSION['message'] = 'Task Updated successfully';
       $_SESSION['message_type'] = 'warning';
       header("location:index.php");
    }
?>

<?php include('includes/header.php'); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $row['id']?>" method="post">
                    <div class="form-group">
                        <input type="text" name="title" 
                        value="<?php echo $title; ?>" placeholder="Update Title">

                        <textarea name="description"  rows="2" 
                        value="<?php echo $description; ?>" placeholder="Update Description">
                        </textarea>

                        <button class="btn btn-success" name="update">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>