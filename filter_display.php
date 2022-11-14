<!-- filter display -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Font Logo : Orbitron -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Orbitron:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <form action="index.php" method="GET">
        <div class="card shadow mt-3">
            <div class="card-header">
                <h5>Filter
                    <button type="submit" class="btn btn-primary btn-sm float-end" name="filter-apply">Apply</button>
                </h5>
            </div>
            <div class="card-body">
                <!-- Category -->
                <h6>Category</h6>
                <hr>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="category[]" value="Body and Hair" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Body and Hair
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="category[]" value="Sports" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Sports
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="category[]" value="Phones" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Phones
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="category[]" value="Books" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Books
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="category[]" value="Arts" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Arts
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="category[]" value="Toys" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Toys
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="category[]" value="Cameras" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Cameras
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="category[]" value="Jewellery and Watch" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Jewellery and Watch
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="category[]" value="Cars" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Cars
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="category[]" value="Music Instrument" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Musical Instrument
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="category[]" value="Laptops" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Laptops
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="category[]" value="Furniture" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Furniture
                    </label>
                </div>
                <!-- Status -->
                <hr>
                <h6>Bid Status</h6>
                <hr>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status[]" value="Ongoing" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Ongoing
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status[]" value="Upcoming" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Upcoming
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status[]" value="Finished" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Finished
                    </label>
                </div>
                <!-- Price range -->
                <hr>
                <h6>Price Range</h6>
                <hr>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="price-range[]" value="low" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Under 500 £
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="price-range[]" value="med1" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        500 £ to 1500 £
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="price-range[]" value="med2" id="flexRadioDefault3">
                    <label class="form-check-label" for="flexRadioDefault3">
                        1500 £ to 4500 £
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="price-range[]" value="high1" id="flexRadioDefault3">
                    <label class="form-check-label" for="flexRadioDefault3">
                        4500 £ to 10000 £
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="price-range[]" value="high2" id="flexRadioDefault3">
                    <label class="form-check-label" for="flexRadioDefault3">
                        Over 10000 £
                    </label>
                </div>
                <!-- Sort -->
                <hr>
                <h6>Sort By</h6>
                <hr>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sort-price" value="highestprice" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Highest Price
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sort-price" value="lowestprice" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Lowest Price
                    </label>
                </div>

            </div>
        </div>
    </form>

    <!-- This is Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>