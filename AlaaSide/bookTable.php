<link href="CSS/bookT.css" rel="stylesheet">
<div class="container">
    <br>
  <center><div class="title">Book A Table!</div></center>
  <form action="" method="post">
    <div class="user__details">
      <div class="input__box">
        <span class="details">Name booking is Under</span>
        <input type="text" placeholder="Your Name" required>
      </div>
      <div class="input__box">
        <span class="details">PARTY SIZE</span>
        <select name="PaSi" id="PaSi" form="PS">
            <option value="1p">1 Person</option>
            <option value="2p">2 People</option>
            <option value="3p">3 People</option>
            <option value="4p">4 People</option>
            <option value="5p">5 People</option>
            <option value="6p">6 People</option>
            <option value="7p">7 People</option>
            <option value="8p">8 People</option>
            <option value="9p">9 People</option>
            <option value="10p">10 People</option>
            <option value="11p">11 People</option>
            <option value="12p">12 People</option>
            <option value="13p">13 People</option>
            <option value="14p">14 People</option>
            <option value="15p">15 People</option>
            <option value="16p">16 People</option>
            <option value="lp">Larger Party</option>
</select>
      </div>
      <div class="input__box">
        <span class="details">Date</span>
        <input type="date" required>
      </div>
      <div class="input__box">
        <span class="details">Time</span>
        <input type="time" name="Time" required>
      </div>
    </div>
    <div class="button">
      <input type="submit" value="Book!">
    </div>
  </form>
</div>