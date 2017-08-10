<!DOCTYPE html>
<html>
<title>SBA</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card-2">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">HOME</a>
<a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CONTACT</a>
    </div>
  </div>
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

  <!-- The Band Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <h2 class="w3-wide">Welcome</h2>
    <p class="w3-opacity"><i>SMART BUILD ASIA</i></p>
    <p class="w3-justify">SmartBuild Asia has brought together construction and information technology specialists to increase efficiency and productivity in the construction industry in Singapore.</p>

	 <p class="w3-justify">To help you promote your products & services as well as find new business partners, SmartBuild Asia gathered 37,600+ companies in a single construction portal. This gives companies the opportunity to search within up to 500 data fields from 25+ trusted data sources in Singapore construction. We integrate all this data with a very powerful search engine that allows members to refine searches using 100+ construction focused filters. At every step, it helps construction contractors and suppliers to improve productivity by up to 99%!</p>

	 <p class="w3-justify">Additionally SmartBuild Asia provides information about 15,400+ ongoing construction projects in Singapore and 500 open tenders. Such information, all in one platform, helps Sales/Marketing/Business Development professionals to get new business opportunities and ultimately more revenues</p>

	 <p class="w3-justify">Our objective is to accompany the construction industry into a new era where the latest information technologies serve the optimisation of construction companies' operations. Above all, we aim to improve the sales & marketing, business development and the procurement processes in order to make it easier and more productive.</p>

	 <p class="w3-justify">Please feel free to reach out to us at contact@smartbuild.asia and we will be more than delighted to help you achieve your goals.</p>

  </div>


  <!-- Ticket Modal -->
  <div id="ticketModal" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal w3-center w3-padding-32"> 
        <span onclick="document.getElementById('ticketModal').style.display='none'" 
       class="w3-button w3-teal w3-xlarge w3-display-topright">×</span>
        <h2 class="w3-wide"><i class="fa fa-suitcase w3-margin-right"></i>Tickets</h2>
      </header>
      <div class="w3-container">
        <p><label><i class="fa fa-shopping-cart"></i> Tickets, $15 per person</label></p>
        <input class="w3-input w3-border" type="text" placeholder="How many?">
        <p><label><i class="fa fa-user"></i> Send To</label></p>
        <input class="w3-input w3-border" type="text" placeholder="Enter email">
        <button class="w3-button w3-block w3-teal w3-padding-16 w3-section w3-right">PAY <i class="fa fa-check"></i></button>
        <button class="w3-button w3-red w3-section" onclick="document.getElementById('ticketModal').style.display='none'">Close <i class="fa fa-remove"></i></button>
        <p class="w3-right">Need <a href="#" class="w3-text-blue">help?</a></p>
      </div>
    </div>
  </div>

  <!-- The Contact Section -->
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
    <h2 class="w3-wide w3-center">CONTACT</h2>
    <p class="w3-opacity w3-center"><i>Fan? Drop a note!</i></p>
		<div class="w3-row w3-padding-32">
	<div class="w3-wide w3-center w3-large w3-margin-bottom">
	 <i class="fa fa-envelope" style="width:30px"> </i> <a href="https://smartbuild.asia/"> Website</a> <br>
	 </div>
	 </div>
  </div>
  
<!-- End Page Content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">

  <p class="w3-medium">Powered by SMART BUILD ASIA</p>
</footer>
</body>
</html>