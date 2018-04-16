<header>
	        <nav class="mait-navbar">
	            <div class="mait-container">
	                <div class="mait-row">
	                    <div class="mait-col xs-6 sm-6 md-10">
	                     	<div class="datakon-flag">
	                        	<span class="flag flag-in"></span> <a href="<?= $this->Url->build(['controller' =>'Webnews', 'action' =>'index',])?>" class="country-name">India</a>
	                    	</div>
	                    </div>
	                    <div class="mait-col xs-6 sm-6 md-2 text-right">
	                    	<p>2.c</p>
	                    </div>
	                </div>
	            </div>
	        </nav>
         	<!-- This is a desktop navigation -->
         	<div class="nav-bar desktop">
         		<div class="mait-container">
         			<div class="mait-row">
         				<div class="mait-col sm-9">
         					<div class="desk-nav">
								<a href="#home" class="active">Land</a>
								<a href="#news">People</a>
								<a href="#contact">Economy</a>
								<a href="#about">Cultural Life</a>
								<a href="#about">History</a>
								<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
							</div>
         				</div>
<!--         				<div class="mait-col sm-3 desk-search">
         					<form class="searchbox">
				                <input type="search" placeholder="Search Keyword" name="search" class="searchbox-input" onkeyup="buttonUp();" required>
				                <input type="submit" class="searchbox-submit" value="Go">
				                <span class="searchbox-icon">
				                  <span class="fa fa-search"></span>
				                </span>
				            </form>
         				</div>-->
         			</div>
         		</div>
         	</div>
         	<!-- MObile navigation -->
         	<div class="nav-bar mobile-nav">
				<div class="mait-container">
					<div class="mait-row">
						<div class="mait-col">
							<div class="topnav" id="myTopnav">
								<a href="#home" class="active" style="margin-top: 45px;">Land</a>
								<a href="#news">People</a>
								<a href="#contact">Economy</a>
								<a href="#about">Cultural Life</a>
								<a href="#about">History</a>
								<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
							</div>
						</div>
						<div class="mait-col mobile-search">
							<form class="searchbox">
				                <input type="search" placeholder="Search Keyword" name="search" class="searchbox-input" onkeyup="buttonUp();" required>
				                <input type="submit" class="searchbox-submit" value="Go">
				                <span class="searchbox-icon">
				                  <span class="fa fa-search"></span>
				                </span>
				            </form>
						</div>
					</div>
				</div>
			</div>
        </header>