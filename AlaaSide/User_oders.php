<html>
<head>
<link rel=stylesheet href="CSS/User_orders.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="alert alert-info" role="alert">
   <center> Hi! Here Are Your Orders</center>
</div>
<div style="margin-left:105px;width:1300px"> 
<h2 class="border border-info">Orders For <span id='date-time'></span> </h2>
&nbsp; &nbsp; &nbsp; &nbsp;
<div  id="fb_contentarea_col1down">
            <div id="selectFieldType">
                <select class=" border-info mrg" id="fieldType" style="">
                    <option id="Option1" value="Text" selected="selected">Month</option>
                    <option id="Option2" value="Januray" >Januray</option>
                    <option id="Option3" value="February" >February</option>
                    <option id="Option4" value="March" >March</option>
                    <option id="Option5" value="April" >April</option>
                    <option id="Option6" value="May" >May</option>
                    <option id="Option7" value="June" >June</option>
                    <option id="Option8" value="July" >July</option>
                    <option id="Option9" value="August" >August</option>
                    <option id="Option10" value="September" >September</option>
                    <option id="Option11" value="October" >October</option>
                    <option id="Option12" value="November" >November</option>
                    <option id="Option13" value="December" >December</option>
                </select>
            </div>
</div>
<hr>
<table class="table table-hover table-active ">
    <tr class="table" style="background-color:black;color:white">
        <th>Restaurant's Name </th>
        <th>Date </th>
        <th> Time</th>
        <th> Table properties</th>
        <th> Time remained</th>
   
    </tr>
    <tr>
        <td> Cramim</td>
        <td> 15/12/2022</td>
        <td> 18:00</td>
        <td> Near a window </td>
        <td> 10 days </td>
        
    </tr>
    <tr>
        <td> TAIZU</td>
        <td> 17/12/2022</td>
        <td> 17:00</td>
        <td> Smoking area </td>
        <td> 12 days</td>
    </tr>
    <tr>
        <td> Abu salah</td>
        <td> 20/12/2022 </td>
        <td> 20:00 </td>
        <td> Anywhere </td>
        <td> 5 days </td>
    </tr>
    <tr>
    <td> TAIZU</td>
        <td> 23/12/2022 </td>
        <td> 21:00 </td>
        <td> Big Table </td>
        <td> 1.5 hours </td>
       
    </tr>
    <tr>
        <td> Mazag</td>
        <td> 28/12/2022 </td>
        <td> 20:00 </td>
        <td> Outside </td>
        <td> 5 days </td>
    </tr>
    <tr>
    <td> Cramim </td>
        <td> 30/12/2022 </td>
        <td> 21:00 </td>
        <td> Smoking area </td>
        <td> 1.5 hours </td>
       
    </tr>
</body>
</div>
<script>
var dt = new Date();
document.getElementById('date-time').innerHTML=dt.toDateString();
$(document).ready ( function() {
            $("a.test").click ( function () {
                var text = $(this).attr('id');
                $("#fieldType option[value='" + text + "']").attr ( 'selected' , 'selected' );
            });
        });
</script>
</html>