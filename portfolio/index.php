<?php

  include("../header.html");

?>

  <div class="container body">
    <div class="row">
      <div class="col-sm-4">
        <a href="https://skycast-app.herokuapp.com/" target="_blank"><img class="portfolioThumbnail" src="../files/skyCast.png"></a>
        <br><br><center><strong><p><a href="https://skycast-app.herokuapp.com/" target="_blank">SkyCast</a></p></strong></center>
        <p>A weather forecast app that uses the Google Places, the Google Geocoding, and the Dark Sky API to show
          current, future, and historical weather data for a user-searched location.
          <br>This app is hosted on Heroku and is comprised of a ReactJS UI running on a NodeJS server with ExpressJS.
          <br>View the code in my <a href="https://github.com/kelly-martin/skyCast" target="_blank">@skyCast</a> repo on GitHub.</p>
      </div>
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
