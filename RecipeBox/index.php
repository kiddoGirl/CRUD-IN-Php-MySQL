<?php 

   include('config/db_connect.php');

   //query for all receipes
   $sql = 'SELECT name, ingredients, id FROM receipes ORDER BY created_at';

   //query to get results
   $result = mysqli_query($conn , $sql);

   //fetch resulting rows as an array
   $receipes = mysqli_fetch_all($result , MYSQLI_ASSOC);

   //free result from memory
   mysqli_free_result($result);

   //close connextion
   mysqli_close($conn);

   //explode(',' , $receipes[0]['ingredients']);

?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php'); ?>


    <h1 class="center grey-text"> Receipes </h1>

    <div class="container">
        <div class="row">

            <?php foreach($receipes as $receipe): ?>

                <div class="col s6 md3">
                    <div class="card z-depth-0">

                        <img src="images/img-2.png" class="receipe_img">

                        <div class="card-content center">

                            <h3><?php echo htmlspecialchars($receipe['name']); ?></h3>

                            <ul>
                                <?php foreach(explode(',' , $receipe['ingredients']) as $ing): ?>
                                    <li><?php echo htmlspecialchars($ing); ?></li>
                                <?php endforeach; ?>
                            </ul>

                        </div>

                        <div class="card-action right-align">
                            <a href="details.php?id=<?php echo $receipe['id'] ?>" class="btn brand z-depth-0">More Info</a>
                        </div>

                    </div>
                </div>

            <?php endforeach; ?>


            <!-- <?php if(count($receipes) >= 3): ?>
                <p>There are 3 or more receipes</p>
            <?php else: ?>
                <p>There are less than 3 receipes</p>
            <?php endif; ?> -->



        </div>
    </div>

    <?php include('templates/footer.php'); ?>   

</html>