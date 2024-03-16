<?php



session_start();

include('server/connection.php');






if(isset($_POST['register'])){

          $name = $_POST['name'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $confirmPassword= $_POST['confirmPassword'];
    //if password not match
        if($password !== $confirmPassword){

          header('location: register.php?error=passwords not match');
        

        //if password is not 6 characters
        }else if(strlen($password)<6){

            header('location:register.php?error=password must be at least 6 characters');
        
        //if there is no error
       }else{
                //check wheter there is user with this email or not

                $stmt1 = $conn->prepare("SELECT count(*) FROM  users WHERE user_email=?");
                $stmt1->bind_param('s', $email);
                $stmt1->execute();
                $stmt1->bind_result($num_rows);
                $stmt1->store_result();
                $stmt1->fetch();

          // if there is user already registed with thids email
                if($num_rows !=0){
                header('location:register.php?error=user with this email already exists');
//if no user register before
                }else{

                    //create new user
                        $stmt =   $conn->prepare("INSERT INTO users (user_name, user_email, user_password) 
                        VALUES (?,?,?)");


                    $stmt->bind_param('sss',$name, $email, md5($password));




                  //if account was created susse
                 if   ($stmt->execute()){

                  $user_id = $stmt->insert_id;
                  $_SESSION['user_id'] = $user_id;

                      $_SESSION['user_email'] = $email;
                      $_SESSION['user_name'] = $name;
                      $_SESSION['logged_in'] = true;
                      header('location: account.php?register_success=you register sucessfully');

                    //account could not be created
                 }else{
                    header('location: register.php?error=could not crate an account now');
                 }

                 }
                }

}





 


?>




    <?php  include('layouts/header.php');  ?>





    <!--Register Page-->

    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Register</h2>
           <!-- <hr clasas="mx-center">-->
        </div>
        <div class="mx-auto container">
                       <form id="register-form" action ="register.php" method="POST">
                        <p style ="colo:red"><?php if(isset($_GET['error'])){echo $_GET['error'];}?> </p>
                       <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="register-name"  name="name" placeholder="Enter Your Name"requied/>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="register-email"  name="email" placeholder=" Enter Your Email"requied/>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="register-password"  name="password" placeholder="Enter Your Password"requied/>
                        </div>

                        <div class="form-group">
                            <label> ConfoirmPassword</label>
                            <input type="password" class="form-control" id="register-conformpassword"  name="confirmPassword" placeholder="Enter Your Password Again"requied/>
                        </div>


                        <div class="form-group">
                         
                            <input type="submit" class="btn" id="register-btn"  name ="register" value="register"/>
                        </div> 

                        <div class="form-group">
                            <a id="register-url"  href="login.php" class="btn">Do you have account? Login</a>
                        </div>





                       </form>     

        </div>
    </section>

    <?php  include('layouts/footer.php');  ?>