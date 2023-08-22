<?php
       $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

        
    ];
    $categories = array_keys($hotels[0]);
    

    $parkingFilter = $_GET['car-park'] ?? 'any';
    
    echo $parkingFilter;

    if($parkingFilter === 'true'){

        foreach($hotels as $i => $hotel){

            foreach($hotel as $key => $value){

                if($key == 'parking' && $value === false){
                    var_dump($hotel);
                    array_splice($hotels,array_search($hotel,$hotels),1);
                }
            }

        }

    }

    else if($parkingFilter === 'false'){

        foreach($hotels as $i => $hotel){

            foreach($hotel as $key => $value){

                if($key == 'parking' && $value === true){
                    var_dump($hotel);

                    array_splice($hotels,array_search($hotel,$hotels),1);
                }
            }

        }

    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Hotels</title>

        <!--Google Fonts-->
        

        <!-- FA -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Bootstrap -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        
        
        
        <!-- CSS -->
        <link rel="stylesheet" href="css/style.css">
        
        
    </head>
    
    <body class="debug">
        
        <!-- header -->
        <header>
            <form action="" method="get">

                <label for="any">Any</label>
                <input type="radio" name="car-park" id="any" value="any" checked>

                <label for="yes">Yes</label>
                <input type="radio" name="car-park" id="yes" value="true">

                <label for="no">No</label>
                <input type="radio" name="car-park" id="no" value="false">
                

                <button type="submit">
                    filtra
                </button>

            </form>
        </header>
        <!-- fine header -->
        
        <!-- main -->
        <main>

            <table class="table">


                    <thead>

                        <tr>

                            <th scope="col">
                                #
                            </th>


                            <?php

                                foreach($categories as $category ) {

                                

                            ?>
                                <th scope="col">

                                    <?php

                                        if (str_contains($category,'_')){

                                           $replaced = str_replace ('_', ' ', $category) ;

                                           echo ucfirst ($replaced);

                                        }

                                        else{

                                            echo ucfirst ($category);

                                        }

                                    ?>

                                </th>
                                
                            <?php

                                }

                            ?>
                        </tr>

                    </thead>

                    <tbody>

                        <?php
        
                            foreach ($hotels as $index => $hotel) {
        
                        ?>

                            <tr>

                       

                                <th scope="row">

                                    <?php

                                        echo $index + 1;

                                    ?>

                                </th>

                                <?php

                                    foreach ($hotel as $key => $value){


                                        echo "$key = $value ";


                                ?>

                                <td>

                                    
                                    <?php  

                                        if($key=='parking'&& $value === true){
                                            echo 'Si';
                                        }

                                        elseif($key=='parking'&& $value === false){
                                            echo 'No';
                                        }

                                        else{

                                            echo "$value";

                                        }
                                    ?>

                                </td>

                                <?php

                                    }

                                ?>

                            </tr>


                        <?php

                            }

                        ?>

                    </tbody>
            </table>

        </main>
        <!-- fine main -->

        <!-- foooter -->
        <footer>
            
        </footer>
        <!-- fine footer -->
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>

</html>