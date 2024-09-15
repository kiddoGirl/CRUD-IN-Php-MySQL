<?php 

    include('config/db_connect.php');

    $email = $name = $ingredients = $description = '';

    $errors = array('email' => '' , 'name' => '' , 'ingredients' => '' , 'description' => '');


   if(isset($_POST['submit'])){


    // Email Validation
    if(empty($_POST['email'])){
        $errors['email'] = 'An email is required <br>';
    } else{
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'email must be a valid email address' ;
        }
    }


    // Name Validation
    if(empty($_POST['name'])){
        $errors['name'] = 'An name is required <br>';
    } else{
        $name = $_POST['name'];
        if(!preg_match('/^[a-zA-Z\s]+$/' , $name)){
            $errors['name'] = 'Receipe Name must be letters and spaces only';
        }
    }


    // Ingredients Validation
    if(empty($_POST['ingredients'])){
        $errors['ingredients'] = 'At least one ingredient is required <br />';
    } else{
        $ingredients = $_POST['ingredients'];
        if(!preg_match('/^([a-zA-Z0-9\s]+)(,\s*[a-zA-Z0-9\s]*)*$/', $ingredients)){
            $errors['ingredients'] = 'Ingredients must be a comma-separated list of letters, numbers, and spaces';
        }
    }


    // Description Validation
    if(empty($_POST['description'])){
        $errors['description'] = 'A short description is required <br>';
    } else{
        $description = $_POST['description'];
        if(strlen($description) < 10){
            $errors['description'] = 'Description must be at least 50 characters long';
        }
    }


    if(array_filter($errors)){
        // echo 'errors in the form';
    }else{

        $email = mysqli_real_escape_string($conn , $_POST['email']);
        $name = mysqli_real_escape_string($conn , $_POST['name']);
        $ingredients = mysqli_real_escape_string($conn , $_POST['ingredients']);
        $description = mysqli_real_escape_string($conn , $_POST['description']);

        $sql = "INSERT INTO receipes(email,name,ingredients,description) VALUES ('$email' , '$name' , '$ingredients' , '$description')";


        //save to db and check
        if(mysqli_query($conn , $sql)){
            header ('Location: index.php');
        }else{
            echo 'query error - ' . mysqli_error($conn);
        }
       
    }
    
   }

?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php'); ?>

    <section class="container grey-text">

        <h1 class="center">Add Your Receipe</h1>

        <form action="add.php" method="POST" class="white">

            <label for="email">Your Email</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
            <div class="red-text"><?php echo $errors['email']; ?></div>


            <label for="email">Recipe Name</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
            <div class="red-text"><?php echo $errors['name']; ?></div>


            <label for="email">Ingredients List (Comma seperated)</label>
            <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
            <div class="red-text"><?php echo $errors['ingredients']; ?></div>


            <label for="email">Short Description</label>
            <input type="text" name="description" value="<?php echo htmlspecialchars($description) ?>">
            <div class="red-text"><?php echo $errors['description']; ?></div>


            <div class="center">

                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">

            </div>

        </form>

    </section>

    <?php include('templates/footer.php'); ?>   

</html>