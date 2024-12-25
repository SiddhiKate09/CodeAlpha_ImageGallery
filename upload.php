<?php
include('dbconnection.php');
if (isset($_POST['submit'])) {
    $file = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'Images/' . $file;
    echo "Path:" .$folder;

    
    if (move_uploaded_file($tempname, $folder)) {
        
        $query = mysqli_query($con, "INSERT INTO images (file_name) VALUES ('$file')");
        if ($query) {
            echo "<h5>File Uploaded Successfully!</h5>";
        } else {
            echo "<h5>Database Insert Failed!</h5>";
        }
    } else {
        echo "<h5>File Not Uploaded</h5>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <style>
       
        .file-input {
            display: none;
        }

       
        .custom-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }

       
        .custom-button:hover {
            background-color: #45a049;
        }
    </style>
    

</head>
<body>
    
    <div class="header">
        <h1 class="title">Photo Gallery</h1>
        <div class="search-bar">
            <input type="text" placeholder="Search photos..." id="search-input">
        </div>
    </div>

    <div class="gallery-wrapper">
        <div class="all-photos-bar">
            <span>All Photos</span>
        </div>

        <div class="gallery">
            <div class="source" onclick="openLightbox();currentSlide(1)">
              <img src="img1.jpg" alt="Image 1">
            </div>
            <div class="source" onclick="openLightbox();currentSlide(2)">
              <img src="img2.jpg" alt="Image 2">
            </div>
            <div class="source" onclick="openLightbox();currentSlide(3)">
              <img src="img3.jpg" alt="Image 3">
            </div>
            <div class="source" onclick="openLightbox();currentSlide(4)">
              <img src="img3.jpg" alt="Image 4" >
            </div>
            <div class="source" onclick="openLightbox();currentSlide(5)">
              <img src="img1.jpg" alt="Image 5" >
            </div>
            <div class="source" onclick="openLightbox();currentSlide(6)">
              <img src="img2.jpg" alt="Image 6" >
            </div>
            <div class="source" onclick="openLightbox();currentSlide(7)">
              <img src="flower1.jpg" alt="Image 7" >
            </div>

            <?php
            $res = mysqli_query($con, "SELECT * FROM images");
            if ($res) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $file = htmlspecialchars($row['file_name']);
                    echo '<div class="source"><img src="Images/' . $file . '" alt="Image"></div>';
                }
            } else {
                echo 'Error fetching images: ' . mysqli_error($con);
            }
            ?>
        </div>

        <form method="POST" enctype="multipart/form-data">
           
            <input type="file" name="image" class="file-input" id="file-input"/>
            <label for="file-input" class="custom-button">Upload File</label>
            <br>
            <button type="submit" name="submit" class="custom-button">Upload Product</button>
        </form>
    </div>
   
<div id="lightbox" style="display: none;">
  <span onclick="closeLightbox()" style="cursor: pointer;">&times;</span>
  <img id="lightbox-image" src="" alt="Lightbox Image">
  <button onclick="changeSlide(-1)">Prev</button>
  <button onclick="changeSlide(1)">Next</button>
</div>

    <script src="script.js"></script>
</body>
</html>
