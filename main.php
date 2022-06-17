<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://cdn.tailwindcss.com"></script>

  <title>Certificate Generator</title>
</head>

<body>

  <center>
    <br><br><br>
    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Certificate Generator</h1>
    <br><br>
    <form method="post" action="" >
      <div class="form-group col-sm-6">
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name Here...">
      </div>
      <div class="form-group col-sm-6">
        <input type="text" name="reason" class="form-control" id="organization" placeholder="Enter reason of certificate...">
      </div>
      <button type="submit" name="generate" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
        Button
      </button>
    </form>
    <br>
  <?php
    if (isset($_POST['generate'])) {
      $name = strtoupper($_POST['name']);
      $name_len = strlen($_POST['name']);

      $reason = ucfirst($_POST['reason']);
      if ($reason) {
        $font_size_reason = 15;
      }

      if ($name == "" || $reason == "") {
        echo
        "
          <div class='alert alert-danger col-sm-6' role='alert'>
              Ensure you fill all the fields!
          </div>
          ";
      } else {
        echo
        "
          <div class='alert alert-success col-sm-6' role='alert'>
              Congratulations! $name on your excellent success.
          </div>
          ";

        //designed certificate picture
        $image = "certi.png";

        $createimage = imagecreatefrompng($image);

        //this is going to be created once the generate button is clicked
        $output = "certificate.png";

        //then we make use of the imagecolorallocate inbuilt php function which i used to set color to the text we are displaying on the image in RGB format
        $white = imagecolorallocate($createimage, 205, 245, 255);
        $black = imagecolorallocate($createimage, 0, 0, 0);

        //Then we make use of the angle since we will also make use of it when calling the imagettftext function below
        $rotation = 0;

        //we then set the x and y axis to fix the position of our text name
        $origin_x = 200;
        $origin_y = 260;

        //we then set the x and y axis to fix the position of our text reason
        $origin1_x = 160;
        $origin1_y = 300;

        $origin2_x = 155;
        $origin2_y = 380;

        //we then set the differnet size range based on the lenght of the text which we have declared when we called values from the form
        if ($name_len <= 7) {
          $font_size = 25;
          $origin_x = 190;
        } elseif ($name_len <= 12) {
          $font_size = 30;
        } elseif ($name_len <= 15) {
          $font_size = 26;
        } elseif ($name_len <= 20) {
          $font_size = 18;
        } elseif ($name_len <= 22) {
          $font_size = 15;
        } elseif ($name_len <= 33) {
          $font_size = 11;
        } else {
          $font_size = 10;
        }

        $certificate_text = $name;

        $date = date("F j, Y");


        //font directory for name
        $drFont = dirname(__FILE__) . "/developer.ttf";

        // font directory for reason name
        $drFont1 = dirname(__FILE__) . "/Aleo-Regular.ttf";

        //function to display name on certificate picture

        //function to display reason name on certificate picture
        
        //https://stackoverflow.com/questions/6926613/php-imagettftext-letter-spacing

        function getBBoxW($bBox)
        {
          return $bBox[2] - $bBox[0];
        }
        function imagettftextSpacing($image, $size, $x, $y, $color, $font, $text, $spacing = 0)
        {
          $testStr = 'test';
          $testW   = getBBoxW(imagettfbbox($size, 0, $font, $testStr));
          foreach (mb_str_split($text) as $char) {
            $fullBox = imagettfbbox($size, 0, $font, $char . $testStr);
            imagettftext($image, $size, 0, $x - $fullBox[0], $y, $color, $font, $char);
            $x += $spacing + getBBoxW($fullBox) - $testW;
          }
        }

        imagettftextSpacing($createimage, $font_size_reason, $origin1_x + 2, $origin1_y, $black, $drFont1, $reason, 1);
        imagettftextSpacing($createimage, $font_size, $origin_x + 2, $origin_y, $black, $drFont, $certificate_text, 1);
        // $text1 = imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $black, $drFont, $certificate_text);
        // $text2 = imagettftext($createimage, $font_size_reason, $rotation, $origin1_x + 2, $origin1_y, $black, $drFont1, $reason);
        $text3 = imagettftext($createimage, $font_size_reason, $rotation, $origin2_x + 2, $origin2_y, $black, $drFont1, $date);

        imagepng($createimage, $output);

  ?>
        <!-- this displays the image below -->
        <img src="<?php echo $output; ?>">
        <br>
        <br>

        <!-- this provides a download button -->
        <a href="<?php echo $output; ?>" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Download Certificate</a>
        <br><br>
    <?php
      }
    }

    ?>

  </center  >

</body>

</html>