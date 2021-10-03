<?php
session_start();
$error_email="";
$error_pass="";
$connexion = mysqli_connect("localhost","root","","formulaire");
if (!$connexion) {
     echo "connexion failled".mysqli_connect_error($connexion);
}

if(isset($_POST["submit"])) {

    $email = $_POST['email'];
   
    $sql = "SELECT email FROM users WHERE email ='$email'";
    $query = mysqli_query($connexion,$sql);
    
    if(mysqli_num_rows($query)>0){

        $pass = $_POST['pass'];
        $pass_check = "SELECT pass FROM users WHERE pass ='$pass'";
        $query_check = mysqli_query($connexion,$pass_check);
        if (mysqli_num_rows($query_check)>0) {

        $email_check = "SELECT id,first_name,second_name,email,creation FROM users WHERE email = '$email'";
        $result = mysqli_query($connexion,$email_check);
     
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     
         $_SESSION["first_name"] = $row["first_name"];
         $_SESSION["second_name"] = $row["second_name"];
         $_SESSION["email"] = $row["email"];
         $_SESSION["creation"]= $row["creation"];
         header('location:space_connexion.php');
        }
        else {
            $error_pass="le mot de passe est incorrect"; ;
        }
    }
    else {
         $error_email="Veuillez-vous inscrire ?";;
    }
    
   

}

mysqli_close($connexion);


?>


<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>

    <style>
        *,*::after,*::before{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

body{
    background-color: rgb(238, 238, 238);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.content{
    width: 500px;
    background: crimson;
    height: auto;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    border-radius: 10px;
    box-shadow: 1px 1px 6px rgba(0, 0, 0, 0.534);
}
h1{
    text-align: center;
    color: white;
    font-size: 3em;
}
h1::first-letter{
    font-size: 2em;
}
.content form{
   padding: 10px 50px;
}
.content input{
    width: 100%;
    height: 40px;
    border: none;
    outline: none;
    border-radius: 5px;
    padding-left: 2em;
}
.content div:not(:first-child){
    margin-top: 2em;
}
input[type="submit"]{
    width: 120px;
    height: 40px;
    border-radius: 5px;
    border: none;
    font-size: 1.2em;
    color: white;
    font-weight: bold;
    background: #f05e3d;
    box-shadow: 0px 5px 1px black;
    text-align: center;
    padding: 0;
}
input[type="submit"]:hover{
    background: #f54923;
}
.content label{
    color: white;
    font-weight: bold;
    padding:.2em;
}
.content .input:focus{
    box-shadow: 1px 1px 3px  #000000d7 ;
}
::placeholder{
    font-size: 1.3em;
}

.se_connecter{
    text-align: center;
    padding:1em;
}
.se_connecter span{
    color:white;
    font-weight:bold;
}
.se_connecter a{
    text-decoration:none;
    font-weight:bold;
    font-size:1.2em;
}
.se_connecter a:hover,.se_connecter a:focus,.se_connecter a:active{
    color: #f54929;
}
.error{
    color:white;
    font-weight:bold;
}
@media (max-width:600px) {
    .content{
        width: 100%;
    }
    .content form{
        padding: 10px 30px;
     }
}
@media (max-width:400px){
    .content form{
        padding: 10px 20px;
     }
     .content{
        background: crimson;
        height: auto;
    }
}

@media (max-width:300px){
    .content form{
        padding: 10px 10px;
     }
     .content{
        background: crimson;
        height: auto;
    }
}
    </style>
</head>
<body>
   
    <div class="content">
        <h1>Se connecter</h1>
           <form action="" method="POST">

           <div class="form_email">
           <label for="email">Email:</label> <br>
            <input class="input" type="email" placeholder="email@gmail.com"  name="email" id="email" required value=" <?php if (isset($_POST['submit'])) {
                echo htmlspecialchars($_POST['email']);
            } ?>" autofocus>
           </div>
           <span class="error">
               <?php echo $error_email; ?>
           </span>
           <div class="form_pass">
           <label for="pass">Password:</label><br>
            <input class="input" type="password" placeholder="******"  name="pass" id="pass" required>
           </div>
           <span class="error">
               <?php echo $error_pass; ?>
           </span>
           <div>
            <input type="submit" name="submit" value="Envoyer">
              </div>
           </form>
           <div class="se_connecter">
               <span> pas Un compte ?</span>
               <a href="index.php">Inscription</a>
           </div>
    </div>
</body>
</html>