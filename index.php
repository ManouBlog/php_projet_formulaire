<?php
session_start();
$error_email="";

$connexion = mysqli_connect("localhost","root","","formulaire");
if (!$connexion) {
     echo "connexion failled".mysqli_connect_error($connexion);
}
 if (isset($_POST['submit'])) {

     $first_name = $_POST['first_name'];
     $second_name = $_POST['second_name'];
     $email = $_POST['email'];
     $password = $_POST['pass'];
     $search_email = "SELECT email FROM users WHERE email='$email'";
     $query_email = mysqli_query($connexion,$search_email);

     if (mysqli_num_rows($query_email) > 0) {
        $error_email="l'email existe deja";
     }
     else {
        $_SESSION["name"] = $first_name;
        $_SESSION["prenom"] = $second_name;
        $_SESSION["my_email"] =  $email;
        $_SESSION["time"] = date('d-m-y');
        $_SESSION["heure"] = date('H\h i\m\i\n s\s');
   
   
        $sql = "INSERT INTO users (first_name,second_name,email,pass) VALUES ('$first_name','$second_name','$email','$password')";
        $query = mysqli_query($connexion,$sql);
        if ($query) {
            header('location:space.php');
        }else {
            echo "erreur".$sql.mysqli_error($connexion);
        }
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
    <title>Page_inscription</title>

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
h1::first-letter{
    font-size: 2em;
}

.conteneur{
    width: 80%;
    display: flex;
    position: absolute;
    flex-direction: row;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    height: 90vh;
    box-shadow: 1px 1px 6px rgba(0, 0, 0, 0.534);
    border-radius: 10px;
 
}
.conteneur_formulaire{
  flex: 4.2;
  background-color: crimson;
  border-radius: 0px 10px 10px 0;
}
::placeholder{
    font-size: 1.3em;
}
.conteneur_formulaire h1{
    text-align: center;
    color: white;
}
.conteneur_formulaire label{
    color: white;
    font-weight: bold;
}
.conteneur_formulaire form{
    padding: 10px 80px;
}
.conteneur_formulaire div{
    margin-top: 1em;
}

.conteneur_formulaire .input{
    width: 100%;
    height: 40px;
    border: none;
    outline: none;
    border-radius: 5px;
    padding-left: 2em;
}

.conteneur_formulaire .input:focus{
    box-shadow: 1px 1px 3px  #000000d7 ;
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
}
input[type="submit"]:hover{
    background: #f54923;
}
.conteneur_image{
background:url("./images/image.jpg");
background-size: cover;
background-position:center;
background-repeat: no-repeat;
flex: 5.6;
border-radius: 10px 0 0 10px;
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
@media (max-width:1020px) {
    ::placeholder{
        font-size: 1em;
    }
    .conteneur{
        position: none;
        float: none;
        display: block;
        top:0;
        transform: translate(-50%,0);
    }
    .conteneur_image{
        height: 100%;
        border-radius: 0px;
    }
    .conteneur_formulaire{
        border-radius: 0px;
      }
    
}
@media (max-width:800px){
    .conteneur{
        width: 100%;
       
    }
} 
@media (max-width:500px){
    .conteneur_formulaire form{
        padding: 10px 50px;
    }
    .conteneur{
        width: 100%;
       
    }
} 

@media (max-width:400px){
    .conteneur_formulaire form{
        padding: 10px 30px;
    }
    .conteneur_formulaire .input{
        padding-left: .6em;
    }
    
} 
@media (max-width:205px){
    input[type="submit"]{
        width: 50px;
        height: 20px;
        border-radius: 2px;
        font-size: .6em;

    }
    ::placeholder{
        font-size: .7em;
    }
    .conteneur_formulaire h1{
        font-size: 1.3em;
    }
    .conteneur{
        width: 100%;
       
    }
    
}


    </style>
</head>
<body>
    <div class="conteneur">
       <div class="conteneur_image">
       </div>
       <div class="conteneur_formulaire">
           <h1>Inscription</h1>
           <form  id= "my_form" action="" method="post">
              <div>
              <label for="name">Fisrt Name:</label><br>
               <input type="text" class="input" placeholder="write your name" name="first_name" id="name" value="<?php if (isset($_POST['submit']))
               {echo htmlspecialchars($_POST['first_name']);} ?>" required autofocus> 
              </div>
              <div>
              <label for="prenom">Second Name:</label><br>
               <input type="text" class="input" placeholder="write your second name" name="second_name" id="prenom" value="<?php if (isset($_POST['submit'])){echo htmlspecialchars($_POST['second_name']);} ?>" required autofocus> 
              </div>
              <div>
                  <label for="email">Email:</label> <br>
                  <input class="input" type="email" placeholder="email@gmail.com"  name="email" id="email" value="<?php if (isset($_POST['submit'])){echo htmlspecialchars($_POST['email']);} ?>"  required>
              </div>
              <span class="error">
                  <?php echo $error_email ?>
              </span>
              <div>
                  <label for="pass">Password:</label><br>
                  <input class="input" type="password" placeholder="******"  name="pass" id="pass"  required>
              </div>
              <div>
                  <input type="submit" name="submit" value="Envoyer">
              </div>
           </form>
           <div class="se_connecter">
               <span>Avez-vous un compte ?</span>
               <a href="connexion.php">Se connecter</a>
           </div>
       </div>
    </div>
</body>
</html>