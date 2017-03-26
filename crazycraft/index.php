<?php
$name = $_POST['name'];
		$namerl = $_POST['namerl'];
		$brojt = $_POST['brojt'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$slikau = $_POST['slikau'];
		$human = intval($_POST['human']);
		$nick = htmlspecialchars($_POST["name"]);
		$email2 = htmlspecialchars($_POST["email"]);
		$message2 = htmlspecialchars($_POST["message"]);
		$human2 = htmlspecialchars($_POST["human"]);
		$namerl2 = htmlspecialchars($_POST["namerl"]);
		$brojt2 = htmlspecialchars($_POST["brojt"]);
		$slikau2 = htmlspecialchars($_POST["slikau"]);
		$errName = null;
	$errEmail = null;
	$errMessage = null;
	$errimep = null;
	$errHuman = null;
	$result = null;
echo "<head>";
echo "<script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>";
echo "<script type=\"text/javascript\" src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js\"></script>";
echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css\" />";
echo "<script src='https://assets.fortumo.com/fmp/fortumopay.js' type='text/javascript'></script>";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/style.css\">";
echo "<script>";
echo "	window.onload=function () {";
echo "$(function() {";

echo "var lastTab = localStorage.getItem('lastTab');";
echo "if(lastTab != '#potvrdid') {";
echo "$('#portald').removeClass('hidden');";
echo "localStorage.clear();";
echo "}";

echo "    $('a[data-toggle=\"tab\"]').on('shown.bs.tab', function (e) {";
echo "        localStorage.setItem('lastTab', $(this).attr('href'));";
echo "    });";
echo "    var lastTab = localStorage.getItem('lastTab');";
echo "		$('#skypvpd').addClass('hidden');";
echo "		$('#factionsd').addClass('hidden');";
echo "		$('#roleplayd').addClass('hidden');";
echo "		$('#potvrdid').addClass('hidden');";
echo "    	$(\"#youtubed\").addClass('hidden');";
echo "    	$(\"#dodatcid\").addClass('hidden');";
echo "	  $(lastTab).removeClass('hidden');";
echo "	  if(lastTab == 'null') {";
echo "	  $('#portald').removeClass('hidden');";
echo "	  }";
echo "    if (lastTab) {";
echo "        $('[href=\"' + lastTab + '\"]').tab('show');";
echo "		$('#portald').addClass('hidden');";
echo "    }";
echo "});";
echo "	}";
echo "</script>";
echo "</head>";
	if (isset($_POST["submit"])) {
		$from = 'Potvrda uplate donacije'; 
		$to = 'vuzee113@gmail.com'; 
		$subject = 'Potvrda uplate';
		$body = "Nick: $name\nIme i Prezime: $namerl\nE-Mail: $email\nBroj Telefona: $brojt\nSlika Uplatnice: $slikau\n Poruka:\n $message";
 
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Molimo upisite vase InGame ime.';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Molimo upisite vasu email adresu.';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Molimo upisite poruku.';
		}
		
		if (!$_POST['namerl']) {
			$errimep = 'Molimo upisite vase Ime i prezime.';
		}	
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Vas anti-spam odgovor nije tacan.';
		}
 
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Hvala vam na donaciji, uskoro cete biti obavjesteni.</div>';
		$_POST['submit'] = null;
		
	} else {
		$result='<div class="alert alert-danger">Desila se greska pri salnju poruke, molimo pokusajte ponovo.</div>';
	}
}
	}

echo "<body>";
echo "<nav class=\"navbar navbar-inverse navbar-fixed-top\">";
echo "  <div class=\"container\">";
echo "  <div class=\"navbar-header\">";
echo "      <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">";
echo "              <span class=\"sr-only\">Toggle navigation</span>";
echo "              <span class=\"icon-bar\"></span>";
echo "             <span class=\"icon-bar\"></span>";
echo "              <span class=\"icon-bar\"></span>";
echo "            </button>";
echo "     <a class=\"navbar-brand\" href=\"#portald\">Crazy Craft</a>";
echo "    </div>";

echo "        <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">";
echo "          <ul class=\"nav navbar-nav\">";
echo "            <li id=\"portal\"><a href=\"#portald\" data-toggle=\"tab\">Portal <span class=\"sr-only\">(current)</span></a></li>";
echo "    		<li><a href=\"http://www.crazy-craft.org/forum/\">Forum</a></li>";
echo "    		<script>jQuery(\"#portal\").click(function(e){";
echo "    			$(\"#portald\").removeClass('hidden');";
echo "    			$(\"#skypvpd\").addClass('hidden');";
echo "    			$(\"#factionsd\").addClass('hidden');";
echo "    			$(\"#roleplayd\").addClass('hidden');";
echo "    			$(\"#potvrdid\").addClass('hidden');";
echo "    			$(\"#youtubed\").addClass('hidden');";
echo "    			$(\"#dodatcid\").addClass('hidden');";
echo "    		});";
echo "    		</script>";
echo "           <li class=\"dropdown\">";
		
echo "              <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Donacije <span class=\"caret\"></span></a>";
echo "              <ul class=\"dropdown-menu\">";
echo "                <li><a id=\"roleplay\" href=\"#roleplayd\" data-toggle=\"tab\">RolePlay</a></li>";
echo "                <li><a id=\"skypvp\" href=\"#skypvpd\" data-toggle=\"tab\">Sky PvP</a></li>";
echo "                <li><a id=\"factions\" href=\"#factionsd\" data-toggle=\"tab\">Fanctions</a></li>";
echo "                <li><a id=\"youtube\" href=\"#youtubed\" data-toggle=\"tab\">Youtube</a></li>";
echo "                <li><a id=\"dodatci\" href=\"#dodatcid\" data-toggle=\"tab\">Dodatci</a></li>";
echo "    			<li role=\"separator\" class=\"divider\"></li>";
echo "    			<li><a id=\"potvrdi\" href=\"#potvrdid\" data-toggle=\"tab\">Potvrdi Uplatu</a></li>";
echo "              </ul>";
echo "            </li>";
echo "    		<script>jQuery(\"#roleplay\").click(function(e){";
echo "    			$(\"#roleplayd\").removeClass('hidden');";
echo "    			$(\"#skypvpd\").addClass('hidden');";
echo "    			$(\"#factionsd\").addClass('hidden');";
echo "    			$(\"#portald\").addClass('hidden');";
echo "    			$(\"#potvrdid\").addClass('hidden');";
echo "    			$(\"#youtubed\").addClass('hidden');";
echo "    			$(\"#dodatcid\").addClass('hidden');";
echo "    		});";
echo "    		jQuery(\"#skypvp\").click(function(e){";
echo "    			$(\"#skypvpd\").removeClass('hidden');";
echo "    			$(\"#roleplayd\").addClass('hidden');";
echo "    			$(\"#factionsd\").addClass('hidden');";
echo "    			$(\"#portald\").addClass('hidden');";
echo "    			$(\"#potvrdid\").addClass('hidden');";
echo "    			$(\"#youtubed\").addClass('hidden');";
echo "    			$(\"#dodatcid\").addClass('hidden');";
echo "    		});";
echo "    		jQuery(\"#factions\").click(function(e){";
echo "    			$(\"#factionsd\").removeClass('hidden');";
echo "    			$(\"#roleplayd\").addClass('hidden');";
echo "    			$(\"#skypvpd\").addClass('hidden');";
echo "    			$(\"#portald\").addClass('hidden');";
echo "    			$(\"#potvrdid\").addClass('hidden');";
echo "    			$(\"#youtubed\").addClass('hidden');";
echo "    			$(\"#dodatcid\").addClass('hidden');";
echo "    		});";
echo "    		jQuery(\"#potvrdi\").click(function(e){";
echo "    			$(\"#potvrdid\").removeClass('hidden');";
echo "    			$(\"#factionsd\").addClass('hidden');";
echo "    			$(\"#roleplayd\").addClass('hidden');";
echo "    			$(\"#skypvpd\").addClass('hidden');";
echo "    			$(\"#portald\").addClass('hidden');";
echo "    			$(\"#youtubed\").addClass('hidden');";
echo "    			$(\"#dodatcid\").addClass('hidden');";
echo "    		});";
echo "    		jQuery(\"#youtube\").click(function(e){";
echo "    			$(\"#youtubed\").removeClass('hidden');";
echo "    			$(\"#factionsd\").addClass('hidden');";
echo "    			$(\"#roleplayd\").addClass('hidden');";
echo "    			$(\"#skypvpd\").addClass('hidden');";
echo "    			$(\"#portald\").addClass('hidden');";
echo "    			$(\"#potvrdid\").addClass('hidden');";
echo "    			$(\"#dodatcid\").addClass('hidden');";
echo "    		});";
echo "    		jQuery(\"#dodatci\").click(function(e){";
echo "    			$(\"#dodatcid\").removeClass('hidden');";
echo "    			$(\"#youtubed\").addClass('hidden');";
echo "    			$(\"#factionsd\").addClass('hidden');";
echo "    			$(\"#roleplayd\").addClass('hidden');";
echo "    			$(\"#skypvpd\").addClass('hidden');";
echo "    			$(\"#portald\").addClass('hidden');";
echo "    			$(\"#potvrdid\").addClass('hidden');";
echo "    		});";
echo "    		</script>";
echo "         </ul>   ";
echo "        </div>";
echo "      </div>";
echo "    </nav>";

echo "    <div class=\"container\">";

echo "    <div id=\"roleplayd\" class=\"hidden\">";
echo "    <div class=\"starter-template\"><h1><center>Crazy Craft - Donacije</center></h1></div>";
echo "      <div class=\"row\">";
  
echo "      <div class=\"col-sm-6 col-md-4\">";
echo "       <div class=\"thumbnail\">";
echo "      <img src=\"img/sword.png\" alt=\"sword\" height=\"80\" width=\"80\">";
echo "      <div class=\"caption\">";
echo "        <h3><font color=\"#ffff00\">CrazyFly</font></h3>";
echo "       <p>- 1 plot</p>";
echo "		<p>- 1 warp (/warp create [ime]),/warp delete[ime]</p>";
echo "		<p>- fly (neogranicen)</p>";
echo "		<p>- Promena nicka (/nick)</p>";
echo "		<p>- chat u boji (/me)</p>";
echo "		<p>- /ec (enderchest)</p>";
echo "		<p>- virtuelni crafting table (/wb)</p>";
echo "		<p>- hat</p>";
echo "		<p>- /ci (brisanje inventara)</p>";
echo "		<p>- cooldown bypass</p>";
echo "		<p>- promena vremena</p>";
echo "		<p>- /pv 1</p>";
echo "		<p>- ljubimci /pets - pas,enderman,zec</p>";
echo "		<h4><font color=\"#0073e6\">300  DIN</font></h4>";
echo "		<h6><font color=\"#0073e6\">2.42 EUR / 3 SMS-a</font></h6>";
echo "        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\" data-toggle=\"modal\" data-target=\"#kupi\">Kupi</a></p>";
//echo "		<p><br></p>"; //prostor da izravna linije dolje
echo "      </div>";
echo "   </div>";
echo " </div>";
  
echo "      <div class=\"col-sm-6 col-md-4\">";
echo "       <div class=\"thumbnail\">";
echo "      <img src=\"img/axe.png\" alt=\"axe\" height=\"80\" width=\"80\">";
echo "      <div class=\"caption\">";
echo "        <h3><font color=\"#009999\">CrazyWand</font></h3>";
echo "       <p>- 2 plota</p>";
echo "		<p>- 2 warp (/warp create [ime]),/warp delete[ime]</p>";
echo "		<p>- fly (neogranicen)</p>";
echo "		<p>- Promena nicka (/nick)</p>";
echo "		<p>- chat u boji (/me)</p>";
echo "		<p>- /ec (enderchest)</p>";
echo "		<p>- virtuelni crafting table (/wb)</p>";
echo "		<p>- hat</p>";
echo "		<p>- /ci (brisanje inventara)</p>";
echo "		<p>- cooldown bypass</p>";
echo "		<p>- promena vremena</p>";
echo "		<p>- /pv 1</p>";
echo "		<p>- ljubimci /pets -svi dostupni</p>";
echo "		<p>- Creative (/gm1)</p>";
echo "		<h4><font color=\"#0073e6\">500 DIN</font></h4>";
echo "		<h6><font color=\"#0073e6\">4.04 EUR / 4 SMS-a</font></h6>";
echo "        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\" data-toggle=\"modal\" data-target=\"#kupi\">Kupi</a></p>";
echo "      </div>";
echo "   </div>";
echo " </div>";
  
  
echo "      <div class=\"col-sm-6 col-md-4\">";
echo "      <div class=\"thumbnail\">";
echo "      <img src=\"img/shovel.png\" alt=\"shovel\" height=\"80\" width=\"80\">";
echo "      <div class=\"caption\">";
echo "      <h3><font color=\"#ff9999\">CrazyRol</font></h3>";
echo "      <p>- fly (neogranicen)</p>";
echo "		<p>- chat u boji (/me)</p>";
echo "		<p>- cooldown bypass</p>";
echo "		<p>- promena vremena</p>";
echo "		<p>- ljubimac po izboru</p>";
echo "		<h4><font color=\"#0073e6\">2 nedelje aktivnosti</font></h4>";;
//echo "        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\" data-toggle=\"modal\" data-target=\"#kupi\">Kupi</a></p>";
echo "      </div>";
echo "   </div>";
echo " </div>";

echo "      <div class=\"col-sm-6 col-md-4\">";
echo "      <div class=\"thumbnail\">";
echo "      <img src=\"img/shovel.png\" alt=\"shovel\" height=\"80\" width=\"80\">";
echo "      <div class=\"caption\">";
echo "      <h3><font color=\"#ff9999\">CrazyRol</font><font color=\"#ff3300\">+</font></h3>";
echo "      <p>- 1 plot</p>";
echo "		<p>- 1 warp</p>";
echo "		<p>- chat u boji</p>";
echo "		<p>- /ec (enderchest)</p>";
echo "		<p>- cooldown bypass</p>";
echo "		<p>- promena vremena</p>";
echo "		<p>- ljubimac po izboru</p>";
echo "		<h4><font color=\"#0073e6\">Mesec dana aktivnosti</font></h4>";;
//echo "        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\" data-toggle=\"modal\" data-target=\"#kupi\">Kupi</a></p>";
echo "      </div>";
echo "   </div>";
echo " </div>";
  
echo "</div></div>";
echo "<div id=\"skypvpd\" class=\"hidden\">";
echo "<div class=\"starter-template\"><h1><center>Crazy Craft - Donacije</center></h1></div>";
echo "<div class=\"row\">";

echo "      <div class=\"col-sm-6 col-md-4\">";
echo "       <div class=\"thumbnail\">";
echo "      <img src=\"img/sword.png\" alt=\"sword\" height=\"80\" width=\"80\">";
echo "      <div class=\"caption\">";
echo "        <h3><font color=\"#ffff00\">CrazyPro</font></h3>";
echo "       <p>- diamond helmet (ptotection 3,unbreaking 3)  </p>";
echo "		<p>- diamond chestplate (ptotection 3,unbreaking 3)</p>";
echo "		<p>- diamond leggings (ptotection 3,unbreaking 3)</p>";
echo "		<p>- diamond boots (ptotection 3,unbreaking 3)</p>";
echo "		<p>- diamond sword (unbreaking 2,s2,knockback1,fire aspect 1)</p>";
echo "		<p>- 1 enchanted golden apple</p>";
echo "		<p>- 8 ender pearls</p>";
echo "      <h3><font color=\"#ff8c1a\">Kit Archer:</font></h3>";
echo "      <p><font color=\"#ff3300\" size=\"1\">Svakih 12h</font></p>";
echo "		<h6>- Bow (infinity 1,unbreaking3,flame 1,punch 1,power 3)</h6>";
echo "		<h6>- beskonacne strele  </h6>";
echo "		<h6>- 64 golden apple</h6>";
echo "		<h6>- napitak za brzinu (3 min)</h6>";
echo "		<h4><font color=\"#0073e6\">250 DIN</font></h4>";
echo "		<h6><font color=\"#0073e6\">2 EUR / 2 SMS-a</font></h6>";
echo "        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\" data-toggle=\"modal\" data-target=\"#kupi\">Kupi</a></p>";
echo "      </div>";
echo "   </div>";
echo " </div>";
  
echo "      <div class=\"col-sm-6 col-md-4\">";
echo "       <div class=\"thumbnail\">";
echo "      <img src=\"img/axe.png\" alt=\"axe\" height=\"80\" width=\"80\">";
echo "      <div class=\"caption\">";
echo "        <h3><font color=\"#009999\">CrazyLegend</font></h3>";
echo "       <p>- diamond helmet (protection4,unbreaking 3,projectile protection 3)</p>";
echo "		<p>- diamond chestplate (protection 4,unbreaking 3,thorns 1)</p>";
echo "		<p>- diamond leggings (protection 4,unbreaking 3)</p>";
echo "		<p>- diamond boots (protection 4,unbreaking 3,feather falling 3) </p>";
echo "		<p>- diamond boots (protection 4,unbreaking 3,feather falling 3)</p>";
echo "		<p>- diamond sword (unbreaking 3,s5,knockback 2,fire aspect 2)</p>";
echo "		<p>- 64 golden apple</p>";
echo "		<p>- 3 enchant golden apple</p>";
echo "		<p>- 16 ender pearls</p>";
echo "		<p>- napitak snaga 2</p>";
echo "      <h3><font color=\"#ff8c1a\">Kit Archerplus:</font></h3>";
echo "      <p><font color=\"#ff3300\" size=\"1\">Svakih 24h</font></p>";
echo "		<h6>- Bow (infinity 1,unbreaking3,flame 1,punch 2,power 5)</h6>";
echo "		<h6>- beskonacne strele </h6>";
echo "		<h6>- 64 golden apple</h6>";
echo "		<h6>- 1 enchanted golden apple</h6>";
echo "		<h6>- 8 ender pearls</h6>";
echo "		<h6>- napitak za snagu (8 min)</h6>";
echo "		<h6>-  napitak za brzinu (8 min)</h6>";
echo "		<h4><font color=\"#0073e6\">300  DIN</font></h4>";
echo "		<h6><font color=\"#0073e6\">2.42 EUR / 3 SMS-a</font></h6>";
echo "        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\" data-toggle=\"modal\" data-target=\"#kupi\">Kupi</a></p>";
echo "      </div>";
echo "   </div>";
echo " </div>";
  
echo "      <div class=\"col-sm-6 col-md-4\">";
echo "      <div class=\"thumbnail\">";
echo "      <img src=\"img/shovel.png\" alt=\"shovel\" height=\"80\" width=\"80\">";
echo "      <div class=\"caption\">";
echo "      <h3><font color=\"#ff9999\">CrazySky</font></h3>";
echo "      <p>- set diamond armor (protection 2,unbreaking 2)</p>";
echo "		<p>- diamond sword (s1,unbreaking 2,fire aspect 1)</p>";
echo "		<p>- 30 golden apple</p>";
echo "		<p>- 2 napitka za snagu (3 min)</p>";
echo "		<p> - 16 steak</p>";
echo "		<h4><font color=\"#0073e6\">2 nedelje aktivnosti</font></h4>";;
//echo "        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\" data-toggle=\"modal\" data-target=\"#kupi\">Kupi</a></p>";
echo "      </div>";
echo "   </div>";
echo " </div>";

echo "      <div class=\"col-sm-6 col-md-4\">";
echo "      <div class=\"thumbnail\">";
echo "      <img src=\"img/shovel.png\" alt=\"shovel\" height=\"80\" width=\"80\">";
echo "      <div class=\"caption\">";
echo "      <h3><font color=\"#ff9999\">CrazySky</font><font color=\"#ff3300\">+</font></h3>";
echo "      <p>-set diamond armor (protection 3,unbreaking 2)</p>";
echo "		<p>- diamond sword (s3,unreaking 3,fire aspect 1)</p>";
echo "		<p>- 1 enchanted golden apple</p>";
echo "		<p>- 15 golden apple</p>";
echo "		<p>- 15 bread</p>";
echo "		<p>- 8 ender pearls</p>";
echo "		<p>- 2 napitka za snagu(3 min)</p>";
echo "		<p>- bow (punch 2,unreaking 2,infinity 1)</p>";
echo "		<p>- beskonacne strele</p>";
echo "		<h4><font color=\"#0073e6\">Mesec dana aktivnosti</font></h4>";;
//echo "        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\" data-toggle=\"modal\" data-target=\"#kupi\">Kupi</a></p>";
echo "      </div>";
echo "   </div>";
echo " </div>";
  
echo " </div></div>";

echo " <div id=\"factionsd\" class=\"hidden\">";
echo " <div class=\"starter-template\"><h1><center>Crazy Craft - Donacije</center></h1></div>";
echo " <div class=\"row\">";
  
echo "      <div class=\"col-sm-6 col-md-4\">";
echo "       <div class=\"thumbnail\">";
echo "      <img src=\"img/sword.png\" alt=\"sword\" height=\"80\" width=\"80\">";
echo "      <div class=\"caption\">";
echo "      <h3><font color=\"#ffff00\">CrazyZombie</font></h3>";
echo "       <p>- broj kuca: 5</p>";
echo "		<p>- cooldown bypass</p>";
echo "		<p>- chat u boji (/me)</p>";
echo "		<p>- hat</p>";
echo "		<p>- virtualni crafting table (/wb)</p>";
echo "		<p>- /ec (enderchest)  </p>";
echo "		<p>- /ci (brisanje inventara)</p>";
echo "		<p>- promena vremena</p>";
echo "		<p>- promena spawnera (zombie,pig,hicken,spider,sheep(/spawner) </p>";
echo "		<p>- virtuelni double čestovi (/pv 1)</p>";
echo "		<p>- fly</p>";
echo "      <h3><font color=\"#ff8c1a\">Kit Zombie:</font></h3>";
echo "      <p><font color=\"#ff3300\" size=\"1\">Svakih 12h</font></p>";
echo "		<h6>- diamond sword (S3,Unbreaking3,FireAspect 2)</h6>";
echo "		<h6>- Full Armor (Protection 3, Unbreaking 3)</h6>";
echo "		<h6>- 3 napitka za brzinu (8 min)</h6>";
echo "		<h6>- 3 napitka za nevidljivost</h6>";
echo "		<h6>- 10 Golden Apple</h6>";
echo "		<h6>- 1 enchanted golden apple</h6>";
echo "		<h6>- 1 encantovana sekira(ef 3,unreaking 2)</h6>";
echo "		<h6>- bow (infinity 1,unbreaking3,flame 1,punch 1,power 3)</h6>";
echo "		<h4><font color=\"#0073e6\">300 DIN</font></h4>";
echo "		<h6><font color=\"#0073e6\">2.42 EUR / 3 SMS-a</font></h6>";
echo "        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\" data-toggle=\"modal\" data-target=\"#kupi\">Kupi</a></p>";
echo "      </div>";
echo "   </div>";
echo " </div>";
  
echo "      <div class=\"col-sm-6 col-md-4\">";
echo "       <div class=\"thumbnail\">";
echo "      <img src=\"img/axe.png\" alt=\"axe\" height=\"80\" width=\"80\">";
echo "      <div class=\"caption\">";
echo "      <h3><font color=\"#009999\">CrazySkeleton</font></h3>";
echo "       <p>- broj kuca: 7</p>";
echo "		<p>- cooldown bypass</p>";
echo "		<p>- chat u boji</p>";
echo "		<p>- hat</p>";
echo "		<p>- virtualni crafting table (/wb)</p>";
echo "		<p>- /ec (enderchest)  </p>";
echo "		<p>- /ci (brisanje inventara)</p>";
echo "		<p>- promena vremena</p>";
echo "		<p>- promena spawnera (skeleton,spider,sheep,blaze(/spawner)</p>";
echo "		<p>- virtuelni double cest (/pv 1, /pv 2)</p>";
echo "		<p>- fly</p>";
echo "		<p>- creative</p>";
echo "      <h3><font color=\"#ff8c1a\">Kit Skeleton:</font></h3>";
echo "      <p><font color=\"#ff3300\" size=\"1\">Svakih 24h</font></p>";
echo "		<h6>- diamond sword (S5,knockback 2,FireAspect 2,Unbreaking 3)</h6>";
echo "		<h6>- Full Armor (Protection 4,unbreaking 3)</h6>";
echo "		<h6>- 5 napitka za regeneraciju</h6>";
echo "		<h6>- 3 napitka snaga 2</h6>";
echo "		<h6>- 15x Golden Apple</h6>";
echo "		<h6>- 2 enchanted golden apple</h6>";
echo "		<h6>- 1 spawner(skeleton)</h6>";
echo "		<h6>- 1 encantovana sekira (ef4,unbreaking 3)</h6>";
echo "		<h6>- 1 dijamntski kramp (ef 4,unreaking 3,fortune 2)</h6>";
echo "		<h6>- bow (infinity 1,unbreaking3,flame 1,punch 2,power 5)</h6>";
echo "		<h4><font color=\"#0073e6\">400  DIN</font></h4>";
echo "		<h6><font color=\"#0073e6\">3.23 EUR / 3 SMS-a</font></h6>";
echo "        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\" data-toggle=\"modal\" data-target=\"#kupi\">Kupi</a></p>";
echo "      </div>";
echo "   </div>";
echo " </div>";
  
echo "      <div class=\"col-sm-6 col-md-4\">";
echo "      <div class=\"thumbnail\">";
echo "      <img src=\"img/shovel.png\" alt=\"shovel\" height=\"80\" width=\"80\">";
echo "      <div class=\"caption\">";
echo "      <h3><font color=\"#ff9999\">CrazyF</font></h3>";
echo "      <p>- set diamond armor (protection 2,unbreaking 2)</p>";
echo "		<p>- diamond sword (s1,unbreaking 2,fire aspect 1)</p>";
echo "		<p>- 3 golden apple</p>";
echo "		<p>- 2 napitka za snagu (3 min)</p>";
echo "		<p>- 32 steak</p>";
echo "		<h4><font color=\"#0073e6\">2 nedelje aktivnosti</font></h4>";;
//echo "        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\" data-toggle=\"modal\" data-target=\"#kupi\">Kupi</a></p>";
echo "      </div>";
echo "   </div>";
echo " </div>";

echo "      <div class=\"col-sm-6 col-md-4\">";
echo "      <div class=\"thumbnail\">";
echo "      <img src=\"img/shovel.png\" alt=\"shovel\" height=\"80\" width=\"80\">";
echo "      <div class=\"caption\">";
echo "      <h3><font color=\"#ff9999\">CrazyF</font><font color=\"#ff3300\">+</font></h3>";
echo "      <p>-set diamond armor (protection 3,unbreaking 2)</p>";
echo "		<p>- diamond sword (s3,unreaking 3,fire aspect 1)</p>";
echo "		<p>- 5 golden apple</p>";
echo "		<p>- 64 bread</p>";
echo "		<p>- 8 ender pearls</p>";
echo "		<p>- bow (punch 2,unreaking 2)</p>";
echo "		<p>- fly</p>";
echo "		<h4><font color=\"#0073e6\">Mesec dana aktivnosti</font></h4>";;
//echo "        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\" data-toggle=\"modal\" data-target=\"#kupi\">Kupi</a></p>";
echo "      </div>";
echo "   </div>";
echo " </div>";
  
echo " </div></div>";

echo " <div id=\"youtubed\" class=\"hidden\">";
echo " <div class=\"starter-template\"><h1><center>Crazy Craft - Donacije</center></h1></div>";
echo "<h4><center>Za youtube rank potrebno je imati 1000 sub,ali nudimo sansu i sa manje suba onima koji zele da predstave nas server u najboljem svetlu!
Na nasem CrazyCraft sajtu Youtube rank dobija</center></h4>";
echo " <div class=\"row\">";

echo "      <div class=\"col-sm-6 col-md-4\">";
echo " </div>";

echo "      <div class=\"col-sm-6 col-md-4\">";
echo "      <div class=\"thumbnail\">";
echo "      <img src=\"img/shovel.png\" alt=\"shovel\" height=\"80\" width=\"80\">";
echo "      <div class=\"caption\">";
echo "      <h3><font color=\"#ff0000\">YouTube</font></h3>";
echo "      <p>- fly</p>";
echo "		<p>- free rank na podserverima na kojima vec postoji opcija ranka</p>";
echo "		<p>- Takodje yt rank mora postovati pravila servera u smislu:</p>";
echo "		<p>- Fly se ne sme koristiti tokom pvp-a,ukoliko zeli da igra a ne da snima.</p>";
echo "		<p>- Mora nedeljno bar 2 klipa izbaciti.</p>";
echo "		<p>- Ukoliko dodje do krsenja pravila,skidamo yt rank!</p>";
echo "		<p>- Takodje yt rank ne sme izbaciti pa obrisati video sa svog kanala,kazna je skidanje yt ranka!</p>";
echo "		<p>- Kao mladim pocetnicima i onim ozbiljnijim voljni smo da pomognemo kako bi nasa zajednica napredovala!</p>";
echo "		<h4><font color=\"#0073e6\">1000 SUBS</font></h4>";;
//echo "        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\" data-toggle=\"modal\" data-target=\"#kupi\">Kupi</a></p>";
echo "      </div>";
echo "   </div>";
echo " </div>";
  
echo " </div></div>";


echo " <div id=\"dodatcid\" class=\"hidden\">";
echo " <div class=\"starter-template\"><h1><center>Crazy Craft - Donacije</center></h1></div>";
echo " <div class=\"row\">";

echo "      <div class=\"col-sm-6 col-md-4\">";
echo "      <div class=\"thumbnail\">";
echo "      <img src=\"img/shovel.png\" alt=\"shovel\" height=\"80\" width=\"80\">";
echo "      <div class=\"caption\">";
echo "      <h3><font color=\"#0066ff\">Minecraft Premium</font></h3>";
echo "      <p>- Dobijate email</p>";
echo "      <p>- Dobijate sifru</p>";
echo "      <p>- Sami postavljate SQ</p>";
echo "      <p>- Nalog koji prodamo je 100% puzdan, ukoliko se nesto desi vrsimo povrat novca</p>";
echo "		<h4><font color=\"#0073e6\">1200 DIN</font></h4>";
echo "		<h6><font color=\"#0073e6\">10 EUR</font></h6>";
echo "        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\" data-toggle=\"modal\" data-target=\"#kupi\">Kupi</a></p>";
echo "      </div>";
echo "   </div>";
echo " </div>";

echo "      <div class=\"col-sm-6 col-md-4\">";
echo "      <div class=\"thumbnail\">";
echo "      <img src=\"img/shovel.png\" alt=\"shovel\" height=\"80\" width=\"80\">";
echo "      <div class=\"caption\">";
echo "      <h3><font color=\"#0066ff\">RolePlay</font></h3>";
echo "      <p>Premium plot</p>";
echo "		<h4><font color=\"#0073e6\">350 DIN</font></h4>";
echo "		<h6><font color=\"#0073e6\">2.83 EUR / 3 SMS-a</font></h6>";
echo "        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\" data-toggle=\"modal\" data-target=\"#kupi\">Kupi</a></p>";
echo "      </div>";
echo "   </div>";
echo " </div>";
  
echo " </div></div>";


echo " <div id=\"potvrdid\" class=\"hidden\">";
echo " <div class=\"starter-template\"><h1><center>Crazy Craft - Potrvrda Uplate</center></h1></div>";
echo " <form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"index.php\">";
echo " 	<div class=\"form-group\">";
echo " 		<label for=\"name\" class=\"col-sm-2 control-label\">IG Ime</label>";
echo " 		<div class=\"col-sm-10\">";
echo " 			<input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" value=\"$nick\" placeholder=\"Ime na serveru\">";
				echo "<p class='text-danger'>$errName</p>";
echo " 		</div>";
echo " 	</div>";
echo " 	<div class=\"form-group\">";
echo " 		<label for=\"namerl\" class=\"col-sm-2 control-label\">Ime</label>";
echo " 		<div class=\"col-sm-10\">";
echo " 			<input type=\"text\" class=\"form-control\" id=\"namerl\" name=\"namerl\" value=\"$namerl2\" placeholder=\"Ime i Prezime\">";
				echo "<p class='text-danger'>$errimep</p>";
echo " 		</div>";
echo " 	</div>";
echo " 	<div class=\"form-group\">";
echo " 		<label for=\"email\" class=\"col-sm-2 control-label\">Email</label>";
echo " 		<div class=\"col-sm-10\">";
echo " 			<input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" value=\"$email2\" placeholder=\"vas email:\">";
				echo "<p class='text-danger'>$errEmail</p>";
echo " 		</div>";
echo " 	</div>";

echo " 	<div class=\"form-group\">";
echo " 		<label for=\"brojt\" class=\"col-sm-2 control-label\">Broj</label>";
echo " 		<div class=\"col-sm-10\">";
echo " 			<input type=\"text\" class=\"form-control\" id=\"brojt\" name=\"brojt\" value=\"$brojt2\" placeholder=\"Vas broj telefona.\">";
echo " 		</div>";
echo " 	</div>";

echo " 	<div class=\"form-group\">";
echo " 		<label for=\"slikau\" class=\"col-sm-2 control-label\">Slika</label>";
echo " 		<div class=\"col-sm-10\">";
echo " 			<input type=\"text\" class=\"form-control\" id=\"slikau\" name=\"slikau\" value=\"$slikau2\" placeholder=\"Slika uplatnice donacije.\">";
echo " 		</div>";
echo " 	</div>";

echo " 	<div class=\"form-group\">";
echo " 		<label for=\"message\" class=\"col-sm-2 control-label\">Message</label>";
echo " 		<div class=\"col-sm-10\">";
echo " 			<textarea class=\"form-control\" rows=\"4\" name=\"message\" value=\"$message2\"></textarea>";
				echo "<p class='text-danger'>$errMessage</p>";
echo " 		</div>";
echo " 	</div>";
echo " 	<div class=\"form-group\">";
echo " 		<label for=\"human\" class=\"col-sm-2 control-label\">2 + 3 = ?</label>";
echo " 		<div class=\"col-sm-10\">";
echo " 			<input type=\"text\" class=\"form-control\" id=\"human\" name=\"human\" value=\"$human2\" placeholder=\"Vas Odgovor\">";
				echo "<p class='text-danger'>$errHuman</p>";
echo " 		</div>";
echo " 	</div>";

echo " 	<div class=\"form-group\">";
echo " 		<div class=\"col-sm-10 col-sm-offset-2\">";
echo " 			<input id=\"submit\" name=\"submit\" type=\"submit\" value=\"Send\" class=\"btn btn-primary\">";
echo " 		</div>";
echo " 	</div>";
echo " 	<div class=\"form-group\">";
echo " 		<div class=\"col-sm-10 col-sm-offset-2\">";
echo $result;
echo "<div class=\"alert alert-danger\">Ukoliko ste uplatiti preko telefona nije potrebno stavljati sliku uplatnice!<br>Ukoliko ste uplatili preko uplatnice nije potrebno stavljati broj telefona!</div>";
echo " 		</div>";
echo " 	</div>";
echo " </form>";
echo " </div>";

echo " <div id=\"kupi\" class=\"modal fade\" role=\"dialog\">";
echo "   <div class=\"modal-dialog\">";


echo "     <div class=\"modal-content\">";
echo "      <div class=\"modal-header\">";
echo "        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>";
echo "        <h4 class=\"modal-title\">Nacin Placanja</h4>";
echo "       </div>";
echo "       <div class=\"modal-body\">";
echo "         <p>Odaberite nacin placanja:</p>";
echo "       </div>";
echo "       <div class=\"modal-footer\">";
echo " 		<a id=\"fmp-button\" href=\"#\" rel=\"d2085ffe3f920aa68f53f7fac90887e7\"><button type=\"button\" class=\"btn btn-primary\" href=\"#\" data-dismiss=\"modal\">SMS</button></a>";
echo " 		<button type=\"button\" class=\"btn btn-primary\" href=\"#\" data-dismiss=\"modal\">Uplatnica</button>";
echo "       </div>";
echo "     </div>";

echo "   </div>";
echo " </div>";


echo " <div id=\"portald\" class=\"hidden\">";

echo " <h1><center>Izgradnja u toku...</center></h1>";

echo "     <header id=\"myCarousel\" class=\"carousel slide\">";

echo "         <ol class=\"carousel-indicators\">";
echo "             <li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>";
echo "             <li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>";
echo "             <li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>";
echo "         </ol>";


echo "         <div class=\"carousel-inner\">";
echo "             <div class=\"item active\">";
echo "                 <div class=\"fill\" style=\"background-image:url('http://placehold.it/1900x1080&text=Slide One');\"></div>";
echo "                 <div class=\"carousel-caption\">";
echo "                     <h2>Caption 1</h2>";
echo "                 </div>";
echo "             </div>";
echo "             <div class=\"item\">";
echo "                 <div class=\"fill\" style=\"background-image:url('http://placehold.it/1900x1080&text=Slide Two');\"></div>";
echo "                 <div class=\"carousel-caption\">";
echo "                     <h2>Caption 2</h2>";
echo "                 </div>";
echo "             </div>";
echo "             <div class=\"item\">";
echo "                 <div class=\"fill\" style=\"background-image:url('http://placehold.it/1900x1080&text=Slide Three');\"></div>";
echo "                 <div class=\"carousel-caption\">";
echo "                     <h2>Caption 3</h2>";
echo "                 </div>";
echo "             </div>";
echo "         </div>";
echo "         <a class=\"left carousel-control\" href=\"#myCarousel\" data-slide=\"prev\">";
echo "             <span class=\"icon-prev\"></span>";
echo "         </a>";
echo "         <a class=\"right carousel-control\" href=\"#myCarousel\" data-slide=\"next\">";
echo "             <span class=\"icon-next\"></span>";
echo "         </a>";
echo "     </header>";
echo "     <div class=\"container\">";
echo "         <div class=\"row\">";
echo "             <div class=\"col-lg-12\">";
echo "                 <h1>CrazyCraft minecraft server</h1>";
echo "                 <p>Novi balkanski minecraft server. TEXT TEXT TEXT TEXT TEXT TEXT TEXT TEXT TEXT TEXT TEXT TEXT TEXT TEXT TEXT TEXT TEXT TEXT TEXT</p>";
echo "             </div>";
echo "         </div>";
echo "         <hr>";
echo "             <div class=\"row\">";
echo "                 <div class=\"col-lg-12\">";
echo "                     <p>Copyright &copy; Crazycraft 2016</p>";
echo "                 </div>";
echo "            </div>";
echo "         </footer>";
echo "     </div>";
echo "    <script>";
echo "     $('.carousel').carousel({";
echo "         interval: 5000";
echo "     })";
echo "     </script>";

echo " </div></body>";
?>