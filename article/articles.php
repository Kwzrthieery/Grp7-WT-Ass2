<?php
// Database connection details kayihurapio 222004477
$servername = "localhost";
$username = "admin";
$password = "bityear2@2024";
$database = "bityeartwo2024";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection kayihura pio 2220044777
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle like button click
    if (isset($_POST["like-btn"])) {
        // Get content id from form data (you'll need to adjust this based on your implementation)
        $contentId = $_POST["content_id"];
        
        // Get user id (you'll need to adjust this based on your implementation)
        $userId = 1; // Assuming user id is 1 for demonstration
        
        // Insert like into the database
        $sql = "INSERT INTO `like` (contentid, userid) VALUES ($contentId, $userId)";
        if ($conn->query($sql) === TRUE) {
            echo "Like inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    // Handle unlike button click kayihura pio 222004477
    if (isset($_POST["unlike-btn"])) {
        // Get content id from form data (you'll need to adjust this based on your implementation)
        $contentId = $_POST["content_id"];
        
        // Get user id (you'll need to adjust this based on your implementation)
        $userId = 1; // Assuming user id is 1 for demonstration
        
        // Insert unlike into the database
        $sql = "INSERT INTO unlike (contentid, userid) VALUES ($contentId, $userId)";
        if ($conn->query($sql) === TRUE) {
            echo "Unlike inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    // Handle comment submission kayihura pio222004477
    if (isset($_POST["comment"])) {
        // Get content id from form data (you'll need to adjust this based on your implementation)
        $contentId = $_POST["content_id"];
        
        // Get user id (you'll need to adjust this based on your implementation)
        $userId = 1; // Assuming user id is 1 for demonstration
        
        // Get comment from form data
        $comment = $_POST["comment"];
        
        // Insert comment into the database
        $sql = "INSERT INTO comment (contentid, userid, comment) VALUES ($contentId, $userId, '$comment')";
        if ($conn->query($sql) === TRUE) {
            echo "Comment inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>

<!--kayihura pio work on article-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All In One BIT 2024</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body style="background-color: #f0f0f0;">
    <div class="container">
        <div class="row">
            <div class="col-auto">
                <div class="box">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#">BIT 2 HUYE</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <!-- Navbar items -->
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h1>Articles</h1>
                <!-- Latest Article -->
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Michael Jackson: The King of Pop</h5>
                        <p class="card-text">Michael Jackson, often referred to as the King of Pop, was an iconic
                            figure in the world of music and entertainment. Born on August 29, 1958, in Gary, Indiana,
                            Jackson rose to fame as a member of the Jackson 5 alongside his brothers. However, it was
                            his solo career that truly solidified his status as a global superstar.</p>
                        <!-- Comment section -->
                        <div class="comment-section">
                            <h6>Comments:</h6>
                            <div class="comments"></div>
                            <form class="comment-form">
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Your Comment:</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="3"
                                        required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <!-- Like and Unlike buttons -->
                        <div class="d-flex align-items-center mt-3">
                            <!-- Like button -->
                            <button class="btn btn-outline-primary me-2 like-btn">Like</button>
                            <!-- Unlike button -->
                            <button class="btn btn-outline-danger unlike-btn">Unlike</button>
                        </div>
                    </div>
                </div>

                <!-- President Paul Kagame Article -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">President Paul Kagame</h5>
                                <p class="card-text">President Paul Kagame, the current leader of Rwanda, is a figure
                                    known for his transformative leadership and dedication to progress. Born on October
                                    23, 1957, in Gitarama, Rwanda, Kagame has played a pivotal role in shaping the
                                    country's trajectory since assuming office in 2000.</p>
                                <p class="card-text">Author: Pio KAYIHURA</p>
                                <p class="card-text">Published: December 15, 2023</p>
                                <!-- Comment section -->
                                <div class="comment-section">
                                    <h6>Comments:</h6>
                                    <div class="comments"></div>
                                    <form class="comment-form">
                                        <div class="mb-3">
                                            <label for="comment" class="form-label">Your Comment:</label>
                                            <textarea class="form-control" id="comment" name="comment" rows="3"
                                                required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                                <!-- Like and Unlike buttons -->
                                <div class="d-flex align-items-center mt-3">
                                    <!-- Like button -->
                                    <button class="btn btn-outline-primary me-2 like-btn">Like</button>
                                    <!-- Unlike button -->
                                    <button class="btn btn-outline-danger unlike-btn">Unlike</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            // Like button click event
            $('.like-btn').click(function() {
                // Implement your like functionality here
                // Example: Send an AJAX request to your server to increment the like count
                alert('Liked!');
            });

            // Unlike button click event
            $('.unlike-btn').click(function() {
                // Implement your unlike functionality here
                // Example: Send an AJAX request to your server to decrement the like count
                alert('Unliked!');
            });

            // Comment form submission
            $('.comment-form').submit(function(e) {
                e.preventDefault();
                var comment = $(this).find('textarea[name="comment"]').val();
                // Here you can send the comment to your server using AJAX
                // After successful submission, you can append the comment to the comments section
                $(this).siblings('.comments').append('<div class="comment">' + comment + '</div>');
                // Clear the comment textarea
                $(this).find('textarea[name="comment"]').val('');
            });
        });
    </script>
</body>

</html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All In One BIT 2024</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body style="background-color: #f0f0f0;">
    <div class="container">
        <div class="row">
            <div class="col-auto">
                <div class="box">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#">BIT 2 HUYE</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <!-- Navbar items -->
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

   <!-- Main content -->
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1>Articles</h1>
            <!-- Latest Article -->
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Michael Jackson: The King of Pop</h5>
                    <p class="card-text">Michael Jackson, often referred to as the King of Pop, was an iconic
                        figure in the world of music and entertainment. Born on August 29, 1958, in Gary, Indiana,
                        Jackson rose to fame as a member of the Jackson 5 alongside his brothers. However, it was
                        his solo career that truly solidified his status as a global superstar.</p>
                    <!-- Comment section -->
                    <div class="comment-section">
                        <h6>Comments:</h6>
                        <div class="comments"></div>
                        <!-- Comment form -->
                        <form class="comment-form" method="post" action="process.php">
                            <div class="mb-3">
                                <input type="hidden" name="content_id" value="1"> <!-- Adjust content_id accordingly -->
                                <label for="comment" class="form-label">Your Comment:</label>
                                <textarea class="form-control" id="comment" name="comment" rows="3"
                                    required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <!-- Like and Unlike buttons -->
                    <div class="d-flex align-items-center mt-3">
                        <!-- Like button -->
                        <form method="post" action="process.php">
                            <input type="hidden" name="content_id" value="1"> <!-- Adjust content_id accordingly -->
                            <button type="submit" class="btn btn-outline-primary me-2" name="like-btn">Like</button>
                        </form>
                        <!-- Unlike button -->
                        <form method="post" action="process.php">
                            <input type="hidden" name="content_id" value="1"> <!-- Adjust content_id accordingly -->
                            <button type="submit" class="btn btn-outline-danger" name="unlike-btn">Unlike</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


                <!-- President Paul Kagame Article -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">President Paul Kagame</h5>
                                <p class="card-text">President Paul Kagame, the current leader of Rwanda, is a figure
                                    known for his transformative leadership and dedication to progress. Born on October
                                    23, 1957, in Gitarama, Rwanda, Kagame has played a pivotal role in shaping the
                                    country's trajectory since assuming office in 2000.</p>
                                <p class="card-text">Author: Pio KAYIHURA</p>
                                <p class="card-text">Published: December 15, 2023</p>
                                <!-- Comment section -->
                                <div class="comment-section">
                                    <h6>Comments:</h6>
                                    <div class="comments"></div>
                                    <form class="comment-form">
                                        <div class="mb-3">
                                            <label for="comment" class="form-label">Your Comment:</label>
                                            <textarea class="form-control" id="comment" name="comment" rows="3"
                                                required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                                <!-- Like and Unlike buttons -->
                                <div class="d-flex align-items-center mt-3">
                                    <!-- Like button -->
                                    <button class="btn btn-outline-primary me-2 like-btn">Like</button>
                                    <!-- Unlike button -->
                                    <button class="btn btn-outline-danger unlike-btn">Unlike</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            // Like button click event
            $('.like-btn').click(function() {
                // Implement your like functionality here
                // Example: Send an AJAX request to your server to increment the like count
                alert('Liked!');
            });

            // Unlike button click event
            $('.unlike-btn').click(function() {
                // Implement your unlike functionality here
                // Example: Send an AJAX request to your server to decrement the like count
                alert('Unliked!');
            });

            // Comment form submission
            $('.comment-form').submit(function(e) {
                e.preventDefault();
                var comment = $(this).find('textarea[name="comment"]').val();
                // Here you can send the comment to your server using AJAX
                // After successful submission, you can append the comment to the comments section
                $(this).siblings('.comments').append('<div class="comment">' + comment + '</div>');
                // Clear the comment textarea
                $(this).find('textarea[name="comment"]').val('');
            });
        });
    </script>
</body>

</html>
