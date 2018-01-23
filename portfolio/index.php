<?php

  include("../header.html");

?>

  <div class="container body">
    <div class="row">
      <div class="col-sm-4">
        <a href="mochaMap" target="_blank"><img class="portfolioThumbnail" src="../files/mochaMap.png"></a>
        <br><br><center><strong><p><a href="mochaMap" target="_blank">MochaMap</a></p></strong></center>
        <p>Keep track of your coffee shops: the ones you've visited, your favorites, and those on your
          bucket list.
          <br>This app was built using data from the Google Maps and Google Places APIs. User-added data
          is stored in a MySQL database table. PHP scripts are called to add, update, and fetch data from the
          database. AJAX is used to call these PHP scripts; any data returned is in XML format and is parsed
          before use.<br>
          View the code in my <a href="https://github.com/kelly-martin/mochaMap" target="_blank">@mochaMap</a> repo on GitHub.</p>
      </div>
      <div class="col-sm-4">
        <a href="secretDiary/diary.php" target="_blank"><img class="portfolioThumbnail" src="../files/secretDiary.png"></a>
        <br><br><center><strong><p><a href="secretDiary/diary.php" target="_blank">Secret Diary</a></p></strong></center>
        <p>With serene imagery to calm you and a secure login system to give you peace of mind, this online diary
          is the perfect place to let your deepest thoughts flow freely.
          <br>I built this app as an exercise in implementing form validation and a login/registration system with PHP and
          jQuery. User login information and their diary entry is stored in a MySQL database table. AJAX is used to update
          their diary entry in the database without the need for a page load.<br>
          View the code in my <a href="https://github.com/kelly-martin/secretDiary" target="_blank">@secretDiary</a> repo on GitHub.</p>
      </div>
      <div class="col-sm-4">
        <a href="codePlayer" target="_blank"><img class="portfolioThumbnail" src="../files/codePlayer.png"></a>
        <br><br><center><strong><p><a href="codePlayer" target="_blank">CodePlayer</a></p></strong></center>
        <p>A minimalist version of CodePen. Edit HTML, CSS, and JavaScript code and see what it looks like - all on the same page.<br>
          View the code in my <a href="https://github.com/kelly-martin/codePlayer" target="_blank">@codePlayer</a> repo on GitHub.</p>
      </div>
    </div>
  </div>

<?php

  include("../footer.html");

?>
