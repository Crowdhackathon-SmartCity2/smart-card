<?php
   ob_start();
   session_start();
   require_once 'php_assets/db_msqli.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8" />
      <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
      <link rel="icon" type="image/png" href="assets/img/favicon.png">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>Smart Card</title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
      <!--     Fonts and icons     -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
      <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
      <!-- CSS Files -->
      <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
      <link href="assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />
      <!-- CSS Just for demo purpose, don't include it in your project -->
      <link href="assets/demo/demo.css" rel="stylesheet" />
      <link href="assets/css/main.css" rel="stylesheet" />
	  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
	function changeTables(str) {
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
            if (str == "week1") {
			if (this.readyState == 4 && this.status == 200) {
                document.getElementById("id1").innerHTML = "3/6/2018 09:15";
            }
			}
        };
        xmlhttp.open("GET", "index.php?q=" + str, true);
        xmlhttp.send();
    }

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Ημερομηνία', 'Κόστος', 'Bonus'],
          ['25/6/18',  30,      10],
          ['25/6/18',  45,      20],
          ['27/6/18',  40,       5],
          ['28/6/18',  30,      5],
		  ['29/6/18',  50,      50],
		  ['30/6/18',  30,      5],
		  ['1/7/18',  25,      5],
        ]);

        var options = {
          title: 'Πόντοι',
          hAxis: {title: 'Ημερομηνία',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body class="">
  <div class="wrapper">
  <div class="sidebar" data-color="green">
  <div class="logo">
                <a class="simple-text logo-normal">
                    SMART CARD
                </a>
  </div>
  <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                        <a href="index.php">
                            <!--<i class="now-ui-icons design_app"></i>-->
                            <p>ΟΙ ΔΙΑΔΡΟΜΕΣ ΜΟΥ</p>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <!--<i class="now-ui-icons users_single-02"></i>-->
                            <p>ΑΝΑΝΕΩΣΗ ΥΠΟΛΟΙΠΟΥ</p>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <!--<i class="now-ui-icons location_map-big"></i>-->
                            <p>ΣΥΜΒΟΥΛΕΣ</p>
                        </a>
                    </li>
                </ul>
  </div>
  </div>
  <div class="main-panel">
  <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand">ΥΠΟΛΟΙΠΟ: 240 ΠΟΝΤΟΙ (30 ΕΥΡΩ)</a>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="../php_assets/logout.php">Αποσύνδεση</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
  <div class="panel-header panel-header-sm"></div>
  <div class="content">
  <div class="row">
  <div class="col-md-12">
  <div class="card ">
  <div class="card-header ">
        <h4 class="card-title">Οι διαδρομές μου</h4>
		<a href="syncwithgooglefit.php"><button id="btn-new" type="button" class="btn btn-fill btn-primary-form f-right">Συγχρονισμός με Google Fit</button></a>
  </div>
  <div class="card-body">
  <select>
	<option value="default">Ανά εβδομάδα</option>
	<option value="week1" onchange="changeTables(this.value)"><a href="">3/6 έως 10/6/2018</a></option>
	<option value="week2" onchange="changeTables(this.value)"><a href="">10/6 έως 17/6/2018</a></option>
	<option value="week3" onchange="changeTables(this.value)"><a href="">17/6 έως 24/6/2018</a></option>
	<option value="week4" onchange="changeTables(this.value)"><a href="">24/6 έως 1/7/2018</a></option>
  </select>
		<br><br><p class="card-title"><b>Χρήση Μέσων Μαζικής Μεταφοράς:</b>
		<div class="table-responsive">
		<table class="table" id="table1">
		<thead class=" text-primary">
		<th>Ημερομηνία & ώρα</th>
		<th>Δρομολόγιο</th>
		<th>Κόστος</th>
		<th>Bonus</th>
		<th>Τελικό</th>
		</thead>
		<tbody>
		<tr>
		<td id="id1">
		27/6/2018 10:43
		</td>
		<td id="id2">
		Ερμού - Πανεπιστήμιο
		</td>
		<td id="id3">
		-30
		</td>
		<td id="id4">
		+5
		</td>
		<td id="id5">
		-25
		</td>
		</tr>
		<tr>
		<td id="id6">
		27/6/2018 12:58
		</td>
		<td id="id7">
		Πανεπιστήμιο - Ρίο
		</td>
		<td id="id8">
		-10
		</td>
		<td id="id9">
		0
		</td>
		<td id="id10">
		-10
		</td>
		</tr>
		</tbody>
		</table>
		</div>

		<br><br><p class="card-title"><b>Φυσική Δραστηριότητα:</b>
		<div class="table-responsive">
		<table class="table" id="table2">
		<thead class=" text-primary">
		<th>Ημερομηνία & ώρα</th>
		<th>Τύπος Δραστηριότητας</th>
		<th>Διάρκεια Δραστηριότητας</th>
		<th>Bonus</th>
		</thead>
		<tbody>
		<tr>
		<td>
		26/6/2018 11:38
		</td>
		<td>
		Περπάτημα
		</td>
		<td>
		48 λεπτά
		</td>
		<td>
		+10
		</td>
		</tr>
		<tr>
		<td>
		27/6/2018 23:45
		</td>
		<td>
		Ποδήλατο
		</td>
		<td>
		1 ώρα και 30 λεπτά
		</td>
		<td>
		+20
		</td>
		</tr>
		</tbody>
		</table>
		</div>
		<div id="chart_div" style="width: 100%; height: 500px;"></div>
		<ul class="list-group">
		<li class="list-group-item">Κέρδος από bonus μεγάλων διαδρομών: <b>10 πόντοι (2 ευρώ)</b></li>
		<li class="list-group-item">Κέρδος από φυσική δραστηριότητα: <b>30 πόντοι (6 ευρώ)</b></li>
		<li class="list-group-item">Βαθμός οικολογικότητας (βρίσκεστε στο top 40% της πόλης): <b>46%</b></li>
		<li class="list-group-item"><b>Tips: </b>Για να αυξήσετε το σκορ σας και να εξοικονομήσετε πιο πολλά χρήματα μπορείτε:</li>
			<ol><li class="list-group-item"><b>-</b> Να αποφύγετε τις κοντινές διαδρομές με τα Μέσα Μαζικής Μεταφοράς.</li>
			<li class="list-group-item"><b>-</b> Να αυξήσετε τη φυσική σας δραστηριότητα.</li>
			<li class="list-group-item"><b>-</b> Οι δημότες με μεγάλο βαθμό οικολογικότητας απολαμβάνουν διάφορες προσφορές από καταστήματα του δήμου.</li>
			</ol>
		<ul>
		</p>
  <?php
  ?>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </body>
</html>