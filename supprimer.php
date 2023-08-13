<?php 
        require_once './connection.php';
        $query = $con->prepare('DELETE FROM taches WHERE id= :id');
        $id = $_GET['id'];
        $query->bindValue(':id',$id);

        try {
            $query->execute();
            echo "
                <script>
                    alert('suppression fait avec succés');
                </script>
            ";
        } catch (Exception $e) {
            echo $e;
        }


?>