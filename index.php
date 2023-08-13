<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    </script>
</head>

<body class="md:mt-20 mt-0 flex justify-start md:justify-center">
    <!-- Affichage de notre table -->

    <div class="max-w-screen-xl mx-auto px-4 md:px-8 shadow-xl p-5 rounded-xl">
        <div class="items-start justify-between md:flex">
            <div class="max-w-lg">
                <h3 class="text-gray-800 text-xl font-bold sm:text-2xl">
                    Tâche à faire
                </h3>
                <p class="text-gray-600 mt-2">
                    Apprenez à gérer votre temps !
                </p>
            </div>
            <div class="mt-3 md:mt-0">
                <a href=""
                    class="inline-block px-4 py-2 text-white duration-150 font-medium bg-indigo-600 rounded-lg hover:bg-indigo-500 active:bg-indigo-700 md:text-sm"
                    id="ProductButton">
                    Ajouter une tâche
                </a>

            </div>
        </div>




        <div class="mt-12 shadow-sm border rounded-lg overflow-x-auto">
            <table class="w-full table-auto text-sm text-left">
                <thead class="bg-gray-50 text-gray-600 font-medium border-b">
                    <tr>
                        <th class="py-3 px-6">id</th>
                        <th class="py-3 px-6">Nom tache</th>
                        <th class="py-3 px-6">Description tâche</th>
                        <th class="py-3 px-6">Statut</th>
                        <th class="py-3 px-6"></th>

                    </tr>
                </thead>

                <tbody class="text-gray-600 divide-y">
                    <?php
                    require_once './connection.php';
                    
                    $query = $con->prepare("SELECT * from taches");
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount()>0)
                    {
                        foreach($results as $result)
                        {
                ?>

                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlentities($result->id)?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlentities($result->nomtache)?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlentities($result->description)?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlentities($result->statut)?></td>
                        <td class="text-right px-6 whitespace-nowrap">
                            <a href="modifier.php?id=<?php echo htmlentities($result->id)?>"
                                class="py-2 px-3 font-medium text-indigo-600 hover:text-indigo-500 duration-150 hover:bg-gray-50 rounded-lg">
                                Edit
                            </a>
                            <a href="supprimer.php?id=<?php echo htmlentities($result->id)?>"
                                class="py-2 leading-none px-3 font-medium text-red-600 hover:text-red-500 duration-150 hover:bg-gray-50 rounded-lg">
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php                
                        }
                    }
                ?>
                </tbody>

            </table>
        </div>
    </div>
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
    <script>
    document.addEventListener("DOMContentLoaded", function(event) {
        document.getElementById('ProductButton').click();
    });
    </script>
</body>

</html>