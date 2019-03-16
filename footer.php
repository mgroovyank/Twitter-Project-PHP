<footer class="footer">
    <div class="container">
        <p>&copy;My Website 2018</p>
    </div>
</footer>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="alert alert-danger" id="loginAlert"></div>
          <form>
            <input type="hidden" name="loginActive" value="1" id="loginActive">  
            <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </div>
</form>
      </div>
      <div class="modal-footer">
        <a id="toggleLogin">Sign up</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="loginSignupButton">Login</button>
      </div>
    </div>
  </div>
</div>

<script>
    $("#toggleLogin").click(function(){
        if($("#loginActive").val()=="1"){
            $("#loginActive").val("0");
            $("#loginModalTitle").html("Sign up");
            $("#loginSignupButton").html("Sign up");
             $("#toggleLogin").html("Login");
        }else{
             $("#loginActive").val("1");
            $("#loginModalTitle").html("Login");
            $("#loginSignupButton").html("Login");
             $("#toggleLogin").html("Signup");
        }
    });
    $("#loginSignupButton").click(function(){
        $.ajax({
            type:"POST",
            url:"actions.php?action=loginSignup",
            data:"email="+$("#email").val()+"&password="+$("#password").val()+"&loginActive="+$("#loginActive").val(),
            success:function(result){
                if(result==1){
                    window.location.assign("https://mayankchhipa.000webhostapp.com/12-twitter/");
                }else{
                    $("#loginAlert").html(result).show();
                }
            }
        });
    });
    
    $(".toggleFollow").click(function(){
     
        var id= $(this).attr("data-userId");
         $.ajax({
            type:"POST",
            url:"actions.php?action=toggleFollow",
            data:"userId="+id,
            success:function(result){
                if(result=="1"){
                    $("a[data-userId='"+id+"']").html("follow");
                }else if(result=="2"){
                    $("a[data-userId='"+id+"']").html("unfollow");
                }
            }
         });
        
    });
    $("#postTweetButton").click(function(){
        $.ajax({
            type:"POST",
            url:"actions.php?action=postTweet",
            data:"tweetContent="+$("#tweetContent").val(),
            success:function(result){
              if(result=="1"){
                  $("#tweetSuccess").show();
                  $("#tweetFail").hide();
                  
              }else if(result!=""){
                  $("#tweetFail").html(result).show();
                  $("#tweetSuccess").hide();
              }
            }
         });
    });
    
    
    
    
    
    
</script>
  </body>
</html>