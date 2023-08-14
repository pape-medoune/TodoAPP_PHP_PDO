<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à jours</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    clifford: '#da373d',
                }
            }
        }
    }
    </script>
    <script src="https://kit.fontawesome.com/f14c73f20d.js" crossorigin="anonymous"></script>
</head>


<?php 
    require_once './connection.php';
    if(isset($_POST['submit']))
    {
        $nomtache = $_POST['nomtache'];
        $description = $_POST['description'];
        $statut = $_POST['statut'];
        $query = $con->prepare('UPDATE taches SET taches.nomtache= :nomtache ,taches.description= :description ,taches.statut= :statut  WHERE id= :id');
        $id = $_GET['id'];
        $query->bindValue(':id',$id);
        $query->bindValue(':nomtache', $nomtache);
        $query->bindValue(':description', $description);
        $query->bindValue(':statut', $statut);

        $query->execute();
        header("Location: index.php");
    }
?>

<body class="flex flex-col items-center mt-10 md:mt-20">
    <div class="w-[80%] p-5 border shadow-xl">
        <form action="#" method="POST" enctype="multipart/form-data">
            <?php
                require_once './connection.php';

                $query = $con->prepare("SELECT * from taches where id= :id");
                $id = $_GET['id'];
                $query->bindValue(':id',$id);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if($results)
                { 
                    foreach ($results as $row){
                ?>
            
            <h1 class="font-bold text-3xl uppercase">Modifier Tâche</h1>
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nom
                        tâche</label>
                    <input name="nomtache" type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="<?php echo htmlentities($row->nomtache)?>" placeholder="Nom de votre tâche" required="">
                </div>
                <div>
                    <label for="category"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Statut</label>
                    <select name="statut" id="category" value="<?php echo htmlentities($row->statut)?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected=""></option>
                        <option name="statutderiv" value="Valider">Valider</option>
                        <option name="statutderiv" value="En attente">En attente</option>
                        <option name="statutderiv" value="Pas encore entamer">Pas encore entamer</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Ecrire ici la description de votre tâche"><?php echo htmlentities($row->description)?></textarea>
                </div>
            </div>
            <button type="submit" name="submit"
                class="text-black border-2 border-sky-500 inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd"></path>
                </svg>
                Modifier tâche
            </button>
            <?php
                    }
            }
        ?>
        </form>


     <?php
        
        

        // if(isset($_POST['']))
        // {
        //     $nomtache = $_POST['nomtache'];
        //     $description = $_POST['description'];
        //     $statut = $_POST['statut'];
        //     if(empty($nomtache) || empty($description) || empty($statut))
        //     {
        //         echo "Veuillez remplir tous les champs";
        //     }
        //     else
        //     {
        //         $query = $con->prepare('INSERT INTO taches (taches.nomtache,taches.description,taches.statut) values (:nomtache,:description,:statut)');
                
        //         // bind values
        //         $query->bindValue(':nomtache', $nomtache);
        //         $query->bindValue(':description', $description);
        //         $query->bindValue(':statut', $statut);

                
        //         try {
        //             $query->execute();
        //             header("Location: index.php");
                    
        //             echo
        //             "
        //                 <script>
        //                     alert('Insertion fait avec succés');
        //                 </script>

        //             ";
                    
        //             exit();
        //         } catch (Exception $e) {
        //             echo $e;
        //         }
                
        //     }
        // }
    ?>
    </div>
</body>

</html>