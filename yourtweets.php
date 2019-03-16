<div class="container mainContainer">
     <div class="row">
  <div class="col-8">
      <h2>Your tweets</h2>
      <?php
      displayTweets('yourtweets');
      ?>
      </div>
  <div class="col-4">
      <?php
       displaySearch();
       displayTweetBox();
      ?>
  </div>
</div>
</div>