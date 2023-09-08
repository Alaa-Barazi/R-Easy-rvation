<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../CSS/Rating.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!--<link rel="stylesheet" type="text/css" href="style.css">-->
  
</head>


<body>
    

  <div class="container">
  <div style="text-align:center">
  <h1> Were you at the restaurant?</h1>
    <h2>Rate your experience!  </h2>
  </div>
  <div class="row " >
    
    <div class="column" >
      <form action="saveRating.php">
      
      
      <div class="container"> 
      <p>Rate</p>
      <p>Current Date and Time is <span id='date-time'></span> 
      .</p>
      <div class="rate">  
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" ></label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1">1 star</label>
    <div class="star-wrapper">
  <a href="#" class="fas fa-star s1"></a>
  <a href="#" class="fas fa-star s2"></a>
  <a href="#" class="fas fa-star s3"></a>
  <a href="#" class="fas fa-star s4"></a>
  <a href="#" class="fas fa-star s5"></a>
</div>
<script src="https://kit.fontawesome.com/5ea815c1d0.js"></script>
  </div>
  </div>
  <br> <br> <br>
    <p>Title</p>
        <textarea id="desc" name="desc" placeholder="Describe it" style="height:170px"></textarea>
        
        <p>Subject</p>
        <textarea id="descmore" name="descmore" placeholder="Tell us more what did you like and what didn't you like?" style="height:170px"></textarea>
        <input type="submit" value="Add">
        <br>
        <h2> Other's reviews</h2>
      </form>
    </div>
  </div>
</div>

  
</body>
<script>
var dt = new Date();
document.getElementById('date-time').innerHTML=dt.toDateString()+" "+dt.toTimeString();

</script>
</html>