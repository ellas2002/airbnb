<?php
    include 'src/functions.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fake Airbnb</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
 
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="images/house-heart-fill.svg">
    <link rel="mask-icon" href="images/house-heart-fill.svg" color="#000000">

  </head>
  <body>

    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                <h4 class="text-white">About</h4>
                <p class="text-muted">Fake Airbnb. Data c/o http://insideairbnb.com/get-the-data/</p>
                </div>
            </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
            <a href="index.php" class="navbar-brand d-flex align-items-center">
                <i class="bi bi-house-heart-fill my-2"></i>    
                <strong> Fake Airbnb</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
        </div>
    </header>

    <main>

    <div class="album py-5 bg-light">
        <div class="container">
            <h1>Search for rentals in a Portland Area:</h1>

            <div class="col-auto">
                <form method="GET" action="results.php">
                    <!-- Neighborhood: an alphabetized select menu (populate w/SQL query) -->
                    <div class="neigh">
                        <label for="neighborhood" class="form-label">Neighborhood</label>
                        <select id="neigh-select" name="hood">
                            <option selected="selected" disabled="disabled">Any</option>
                            <?php foreach ($_SESSION['hoods'] as $hood): ?>
                                <option value="<?= htmlspecialchars($hood['id']); ?>"
                                    <?= (isset($_GET['hood']) && $_GET['hood'] == $hood['id']) ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($hood['neighborhood']); ?> 
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                


                <!-- Room Type: an alphabetized select menu (populate w/SQL query) -->
                <div class="mb-3">
                    <label for="roomType" class="form-label">Room Type</label>
                    <select id="roomType" name="room" >
                    <option selected="selected" disabled="disabled">Any</option>
                    <?php foreach ($_SESSION['room'] as $rooms): ?>
                        <option value="<?= htmlspecialchars($rooms['id']); ?>"
                            <?= (isset($_GET['room']) && $_GET['room'] == $hood['id']) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($rooms['type']); ?> <!-- Change 'name' to correct column -->
                        </option>
                    <?php endforeach; ?>
                    </select>
                </div>
            

                <!-- Number of guests: (1-10, using PHP’s “range” function) -->
                <div class="mb-3">
                    <label for="guestNum" class="form-label">Number of Guests</label>
                    <select id ="guestNum" name="guestNum">
                        <?php
                            for ($i=1; $i<=10; $i++)
                            {
                                ?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn-primary" style="background-color: #007bff; border-color: #007bff; color: white">Submit</button>

                </form>
            </div><!-- row -->
        </div><!-- .container-->
    </div><!-- album-->

    </main>

    <footer class="text-muted py-5">
    <div class="container">

        <p class="mb-1">CS 293, Spring 2025</p>
        <p class="mb-1">Lewis & Clark College</p>
    </div><!-- .container-->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    
</body>
</html>