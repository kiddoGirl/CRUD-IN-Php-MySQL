<?php 

    include('config/db_connect.php');


    //delete
    if(isset($_POST['delete'])){

        $id_to_delete = mysqli_real_escape_string($conn , $_POST['id_to_delete']);

        $sql = "DELETE FROM receipes WHERE id = $id_to_delete";

        if(mysqli_query($conn , $sql)){
            header('Location: index.php');
        }else{
            echo 'query error - ' . mysqli_error($conn);
        }
    }


    //check GET req id param
    if(isset($_GET['id'])){

        $id = mysqli_real_escape_string($conn , $_GET['id']);

        //make sql
        $sql = "SELECT * FROM receipes WHERE id = $id";

        //get the query
        $result = mysqli_query($conn , $sql);

        //fetch result
        $receipe = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);

    }

?>


<!DOCTYPE html>
<html lang="en">


    <?php include('templates/header.php'); ?>

    <h1 class="center grey-text">Receipe Details</h1>

    <div class="card container center-card ">

        <?php if($receipe): ?>

            <h1 style="text-align: center;"><?php echo htmlspecialchars($receipe['name']); ?></h1>

            <p>created By - <?php echo htmlspecialchars($receipe['email']); ?></p>

            <h4>Ingredients</h4>

            <p><?php echo htmlspecialchars($receipe['ingredients']); ?></p>

            <h4>Receipe Short Description</h4>

            <p>Receipe short Description - <?php echo htmlspecialchars($receipe['description']); ?></p>

            <p><?php echo date($receipe['created_at']); ?></p>



            <!-- delete form -->
            <form action="details.php" method="POST">

                <input type="hidden" name="id_to_delete" value="<?php echo $receipe['id'] ?>" >
                <div style="text-align: center;">
                    <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
                </div>
            </form>


        <?php else: ?>

            <h5> No such Receipe Exists !</h5>

        <?php endif; ?>

    </div>

    <?php include('templates/footer.php'); ?>

</html>