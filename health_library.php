<?php 
session_start();
$showDivFlag=false;
if(isset($_SESSION['logged_in'])){
  $showDivFlag=true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="index.css" type="text/css">
</head>
<body style="background-color:#efe">
	<?php
session_start();
require_once("cart.php");
$showDivFlag=false;
if(isset($_SESSION['logged_in'])){
  $showDivFlag=true;
}
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("bettermeds", $con);
?>
<!DOCTYPE html>
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="productpage.css" type="text/css">
      <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
      <script type="text/javascript">
        $( document ).ready( function() {
 $( "span.addToCart" ).on( "click", function() {
  var id = $(this).attr("data-id");
  // alert(id);
  $.ajax( {
   type: "GET",
   url: "add_to_cart.php?id=" + id + "&action=add"
  })
  .done(function()
  {
   alert("Product have been added.");
  });
 });
});
    </script>
</head>
<body style="background-color:#efe">
  <div class="sidebar" style="display:none" id="mySidebar">
    <ul>
    <li><a onclick="close()" id="closeside">&#10008;Close </a></li>
    <li><a href="account_details.php" class="w3-bar-item w3-button">MyAccount</a></li>
    <li><a href="myorders.php" class="w3-bar-item w3-button">MyOrders</a></li>
    <li><a href="show-cart.php" class="w3-bar-item w3-button">MyCart</a></li>
    <li><a href="offers.php" class="w3-bar-item w3-button">MyOffers</a></li>
    <li><a href="" class="w3-bar-item w3-button">HelpCentre</a></li>
  </ul>
</div>
<div class="logo">
   <span ><strong><img src="logo.png" width="7%" height="7%"><i style="vertical-align: center">Better meds!</i></strong></span><br></div>
<div class="headers">

  <form method="post" action="productsearch.php">
      <div id="searchbox">
      <span style="position: relative;">
        <span onclick="open()" id="menu"><i class="fa fa-bars fa-lg" style="color: azure">  </i>
        </span>
        <input type="text" id="search" name="Search" placeholder="search here">
        <button id="Submit" type="submit" style="height:0.27in"> 
        <i class="fa fa-search"></i></button>
      </span>
</div>
  </form>

        <span class="sides">
        <a class="cart" href="show-cart.php"><i class="fa fa-cart-plus fa-lg" style="color: azure">  </i>
        </a>
&emsp;
<span id="account_name" <?php if ($showDivFlag===false){?>style="display:none"<?php } ?>><?php echo $_SESSION['Name'];?></span>
&emsp;
        <a class="user" href="account_details.php"><i class="fa fa-user fa-lg" style="color: azure">  </i>
        </a>
&emsp;
<a class="logout" href="logout.php"><button <?php if ($showDivFlag===false){?>style="display:none"<?php } ?>>Logout</button><!-- <i class="fa fa-user fa-lg" style="color: azure">  </i> -->
        </a>
&emsp;

      </span>
    <nav class="nav">
      <ul>
        <li><a class="nav-item" href="index.php"><span><i class="fa fa-home"></i>Home</span> </a></li>
        <li class="dropdown"><a class="nav-item" href=""  ><span>Explore <i class="fa fa-chevron-down fa-xs"></i></span> </a>
        <div class="dropdown-content">
          <a href="prescription.html"><img src="medical-prescription.png" class="icon1">  </img>Prescription</a>
        <a href="#"><img src="support.png" class="icon2"></img>Lifestyle</a>
        <a href="#"><img src="running.png" class="icon3"></img>Fitness</a>
        <a href="#"><img src="icon.png" class="icon4"></img>Devices</a>
        <a href="#"><img src="familiar-group-of-three.png" class="icon5"></img>Family Care</a>
      </div>
        </li>
        <li><a class="nav-item" href="health_library.php"><span>Health Library</span> </a></li>
        <li><a class="nav-item" href="productpage.php"> <span>Daily Meds</span> </a></li>
        <li><a class="nav-item" href=""> <span>Touring Meds</span> </a></li>
       </ul>
  </nav>
</div>ss
<div class="health_library">
    <h1>Health Library</h1><br>
    <strong>Introduction:</strong><br><br>
<p class="intro">A medication (also referred to as medicine, pharmaceutical drug, or simply drug) is a drug used to diagnose, cure, treat, or prevent disease. Drug therapy (pharmacotherapy) is an important part of the medical field and relies on the science of pharmacology for continual advancement and on pharmacy for appropriate management.<br><br>
        Drugs are classified in various ways. One of the key divisions is by level of control, which distinguishes prescription drugs (those that a pharmacist dispenses only on the order of a physician, physician assistant, or qualified nurse) from over-the-counter drugs(those that consumers can order for themselves).</p> 
<br>
    <strong>Usage:</strong><br><br>
<p class="use">Drug use among elderly Americans has been studied; in a group of 2377 people with average age of 71 surveyed between 2005 and 2006, 84% took at least one prescription drug, 44% took at least one over-the-counter (OTC) drug, and 52% took at least one dietary supplement; in a group of 2245 elderly Americans (average age of 71) surveyed over the period 2010 – 2011, those percentages were 88%, 38%, and 64%.</p>


    <br><strong>Classification:</strong><br><br>
An elaborate and widely used classification system is the Anatomical Therapeutic Chemical Classification System (ATC system). The World Health Organization keeps a list of essential medicines.<br><br>

A sampling of classes of medicine includes:<br><br>
    <details><summary><strong> Antipyretics: reducing fever (pyrexia/pyresis)</strong></summary>
    <section><br>Antipyretics are substances that reduce fever.Antipyretics cause the hypothalamus to override a prostaglandin-induced increase in temperature. The most common antipyretics used are <strong>aspirin</strong> and <strong>ibuprofen.</strong></section></details><br>
    <details>
        <summary>
            <strong>Analgesics: reducing pain (painkillers)</strong>
        </summary>
        <section><br>
            An analgesic or painkiller is any member of the group of drugs used to achieve analgesia, relief from pain.<br><br>
Analgesic drugs act in various ways on the peripheral and central nervous systems. They are distinct from anesthetics, which temporarily affect, and in some instances completely eliminate, sensation. Analgesics include paracetamol,the nonsteroidal anti-inflammatory drugs (NSAIDs) such as the <strong>salicylates</strong>, and <strong>opioid drugs</strong> such as <strong>morphine</strong> and <strong>oxycodone.</strong>
When choosing analgesics, the severity and response to other medication determines the choice of agent; the World Health Organization(WHO) pain ladder specifies mild analgesics as its first step.
        </section>
    </details><br>
    <details>
    <summary>
        <strong>Antimalarial drugs: treating malaria
        </strong>
    </summary>
    <section><br>
        Antimalarial medications, also known as antimalarials, are designed to <strong>prevent or cure malaria.</strong> Such drugs may be used for some or all of the following:<br>
Treatment of malaria in individuals with suspected or confirmed infection
Prevention of infection in individuals visiting a malaria-endemic region who have no immunity (malaria prophylaxis)<br><br>
Routine intermittent treatment of certain groups in endemic regions (intermittent preventive therapy)
Some antimalarial agents, particularly <strong>chloroquine</strong> and <strong>hydroxychloroquine</strong>, are also used in the treatment of rheumatoid arthritis and lupus-associated arthritis.<br><br>
Current practice in treating cases of malaria is based on the concept of combination therapy (e.g., Coartem), since this offers several advantages, including reduced risk of treatment failure, reduced risk of developing resistance, enhanced convenience, and reduced side-effects. Prompt parasitological confirmation by microscopy, or alternatively by rapid diagnostic tests, is recommended in all patients suspected of malaria before treatment is started. Treatment solely on the basis of clinical suspicion should only be considered when a parasitological diagnosis is not accessible.
    </section>
    </details><br>
    <details>
    <summary>
        <strong>Antibiotics: inhibiting germ growth
        </strong>
    </summary>
    <section><br>
        An antibiotic is a type of antimicrobial substance active against bacteria and is the most important type of <strong>antibacterial agent for fighting bacterial infections.</strong> Antibiotic medications are widely used in the treatment and prevention of such infections. They may either kill or inhibit the growth of bacteria. A limited number of antibiotics also possess antiprotozoal activity. Antibiotics are not effective against viruses such as the common cold or influenza; drugs which inhibit viruses are termed antiviral drugs or antivirals rather than antibiotics<br><br>
<strong>Side effects:</strong><br><br>
Antibiotics are screened for any negative effects before their approval for clinical use, and are usually considered safe and well tolerated. However, some antibiotics have been associated with a wide extent of adverse side effects ranging from mild to very severe depending on the type of antibiotic used, the microbes targeted, and the individual patient. Side effects may reflect the pharmacological or toxicological properties of the antibiotic or may involve hypersensitivity or allergic reactions. Adverse effects range from fever and nausea to major allergic reactions, including photodermatitis and anaphylaxis.
    </section>
    </details><br>
<details>
    <summary>
        <strong>Antiseptics: prevention of germ growth near burns, cuts and wounds
        </strong>
    </summary>
    <section><br>
        Antiseptics  are antimicrobial substances that are applied to living tissue/skin to reduce the possibility of infection, sepsis, or putrefaction. Antiseptics are generally distinguished from antibiotics by the latter's ability to be transported through the lymphatic system to destroy bacteria within the body, and from disinfectants, which destroy microorganisms found on non-living objects.<br><br>
Some antiseptics are true germicides, capable of destroying microbes (bacteriocidal), while others are bacteriostatic and only prevent or inhibit their growth.<br><br>
Antibacterials include antiseptics that have the proven ability to act against bacteria.<strong>Microbicides</strong> which destroy virus particles are called viricides or antivirals. <strong>Antifungals</strong>, also known as an <strong>antimycotics</strong>, are pharmaceutical fungicides used to treat and prevent mycosis (fungal infection).
    </section>
    </details><br>
<details>
    <summary>
        <strong>Mood stabilizers: lithium and valpromide
        </strong>
    </summary>
    <section><br>
        A mood stabilizer is a psychiatric pharmaceutical drug used to treat mood disorders characterized by intense and sustained mood shifts, typically bipolar disorder type I or type II, borderline personality disorder (BPD) and schizoaffective disorder.<br><br>
<strong>Uses:</strong><br><br>
Used to treat bipolar disorder,mood stabilizers suppress swings between mania and depression. Mood-stabilizing drugs are also used in borderline personality disorder and schizoaffective disorder.<br><br>
<strong>Examples:<br><br>
Minerals(Lithium),Anticonvulsants(Valproate,Lamotrigine ,Carbamazepine ),Antipsychotics</strong>
    </section>
    </details><br>
<details>
    <summary>
        <strong>Stimulants: methylphenidate, amphetamine
        </strong>
    </summary>
    <section><br>
        Stimulants (also often referred to as psychostimulants or colloquially as uppers) is an overarching term that covers many drugs including those that <strong>increase activity of the central nervous system and the body</strong>, drugs that are pleasurable and invigorating, or drugs that have sympathomimetic effects.Stimulants are widely used throughout the world as prescription medicines as well as without a prescription (either legally or illicitly) as performance-enhancing or recreational drugs. The most frequently prescribed stimulants as of 2013 were <strong>lisdexamfetamine , methylphenidate, and amphetamine.</strong> It is estimated that the percentage of the population that has abused amphetamine-type stimulants (e.g., <strong>amphetamine, methamphetamine, MDMA,</strong> etc.) and <strong>cocaine</strong> combined is between 0.8% and 2.1%.<br><br>
Effects are <strong>acute</strong> and <strong>chronic</strong>
    </section>
    </details><br>
<details>
    <summary>
        <strong>Tranquilizers: meprobamate, chlorpromazine, reserpine, chlordiazepoxide, diazepam, and alprazolam
        </strong>
    </summary>
    <section><br>
        A tranquilizer refers to a drug which is designed for the treatment of anxiety, fear, tension, agitation, and disturbances of the mind, specifically to reduce states of anxiety and tension.<br><br>
Tranquilizer, as a term, was brought into existence by F.F. Yonkman (1953), from the conclusions of investigative studies using the drug Reserpine, showed the drug had a calming effect on all animals it was administered to. Reserpine, is a Centrally Acting Rauwolfia Alkaloid. The word directly refers to the state of tranquility in a person and other animals.<br><br>
The term is generally used as a synonym for sedative. When used by health care professionals, it is usually qualified or replaced with more precise terms:
<ul><li>Minor tranquilizer usually refers to anxiolytics.</li>
<li>Major tranquilizer might refer to antipsychotics.</li>
    </ul>
Mood stabilizers might also be considered to belong to the classification of tranquilizing agents.
    </section>
    </details><br><br><br>

    
    <p style="text-align: center">&#42;&#42;Note:- Source of information is from wikipedia.org&#42;&#42;</p>
    
</div>

<footer>
            <div class="row"><hr><br>
            <div class="Col-1">
                COMPANY INFO:<br>
                <a href="about_us.html">About Bettermeds.com</a><br>
                <a href="terms.html">Terms and Conditions</a><br>
                <a href="privacy.html">Privacy Policy</a><br>
            </div>
            
            <div class="Col-2">
                &#9888; Need Help?<br>
                &#9743; 100-250-1006<br>
                &#9755; care&#64;bettermeds.com<br><br>
            </div>
            <br>
            <hr>
            <div class="footer">
                Copyright &copy; 2018 Bettermeds Marketplace Limited. All rights reserved
            </div>
            </div>
        </footer>
<script type="text/javascript">
	document.getElementById("menu").onclick=function() {open()};
	document.getElementById("closeside").onclick=function() {close()};
	function open() {
    document.getElementById("mySidebar").style.display = "block";
}
function close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
</body>
</html>