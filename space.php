<?php
session_start();
if (isset($_POST["submit"])) {
    session_destroy();
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYspace</title>
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
.logo{
    width: 90px;
    height: 90px;
    border-radius: 100%;
    background-color: rgb(78, 78, 78);
}
header{
display: flex;
justify-content: space-between;
align-items: center;
padding: 0 2em;
box-shadow: 1px 0px 3px rgba(0, 0, 0, 0.521);
}
header a{
    text-decoration: none;
    color: white;
    width:120px;
    background-color: rgb(194, 0, 39);
    text-align: center;
    height: 40px;
    line-height: 40px;
    border-radius: 5px;
    font-weight: bold;
    box-shadow: 1px 0px 3px rgba(0, 0, 0, 0.521);
}
header a:hover{
    background-color: rgb(226, 0, 45);
}
main .my_information{
    width: 70%;
    height: 500px;
    margin: 1em auto;
    border-radius: 10px;
    box-shadow: 1px 1px 6px rgba(0, 0, 0, 0.521);
}
main h1{
    text-align: center;
}
main h2{
    padding: 1em;
}
@media (max-width:900px) {
    header{
       justify-content: center;
        }
        .logo{
          margin-right: 2em;
        }
        main .my_information{
            height: auto;
        }

}
@media (max-width:500px) {
    main h1{
        text-align: left;
    }
    main h2{
        padding:.7em 0;
    }
    main .my_information{
        height: auto;
    }
    .logo{
        width: 70px;
        height: 70px;
    }

}
@media (max-width:392px) {
    header a{
        width:100px;
        height: 30px;
        font-size: .8em;
        line-height: 30px;
    }
    main h2{
        padding:.4em 0;
        font-size:1em;
    }
}

    </style>
</head>
<body>
   <header>
       <div class="logo">
         
       </div>
       <div>
           <form action="" method="POST">
           <input type="submit" name="submit" value="se deconnecter">
           </form>
       </div>
        
   </header>
   <main >
        <div class="my_information">
        <h1>
         <?php echo "Bienvenue  ".$_SESSION["name"];?>
      </h1>
      <h2>
      <?php echo "Nom : ". $_SESSION["name"];?> 
     </h2>
      <h2>
      <?php echo "Prénoms : ".$_SESSION["prenom"];?> 
     </h2>
      <h2>
      <?php echo "Email : ".$_SESSION["my_email"];?> 
      </h2>
      <h2>
      <?php echo "Création : ".$_SESSION["time"]. " à : ".$_SESSION["heure"] ;?> 
      </h2>
      
        </div>
   </main>
</body>
</html>
