
<?php
$categorys = $this->Common->getCategory();
$features = $this->Common->getFeatures();
$brands = $this->Common->getBrands();
$pricerange = $this->Common->getpricerange();
//pr($brands); die;
?>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style type="text/css">
            a {
                color: #39c;
                text-decoration: none;
            }
            .header {
                background: #343c47;
                padding: 20px 0;
                margin-bottom: 20px;
            }
            .header .logo {
                float: left;
            }
            .header .logo a img {
                max-width: 180px;
                width: 100%;
                display: block;
            }
            .header .searchbox {
                float: right;
                width: 70%;
                background: #fff;
                margin: 5px 0;
            }
            .sbtn1 {
                position: absolute;
                right: -63px;
                width: 65px;
                height: 48px;
                text-indent: -999px;
                overflow: hidden;
                top: -2px;
                background: url(../img/searchW.png) 50% no-repeat #191d25;
            }
            .sbtn1 {
                padding: 0;
                margin: 0;
            }
            .sbtn1 {
                display: none;
            }
            .header .searchbox form {
                margin: 0;
                padding: 0;
            }
            .header .searchbox .sbox {
                background: url(https://www.spyprice.co.uk/resource/img/search.png) 5px 50% no-repeat #fff;
                color: #444;
                width: 80%;
                height: 30px;
                margin: 10px 0;
                display: block;
                text-indent: 36px;
                float: left;
            }
            .header .searchbox .sbox, .header .searchbox .sbtn {
                padding: 0;
                border: 0;
                line-height: 30px;
                font-size: 12pt;
            }
            .header .searchbox .sbtn {
                display: block;
                background: #39c;
                color: #fff;
                height: 50px;
                width: 20%;
                float: right;
                cursor: pointer;
                text-align: center;
            }
            .header .searchbox .sbox, .header .searchbox .sbtn {
                padding: 0;
                border: 0;
                line-height: 30px;
                font-size: 12pt;
            }
            a, img, input, select {
                outline: 0;
            }
            .catHeader {
                background: #f6f7f8;
                border: 1px solid #ddd;
                padding: 10px 15px 5px;
                /*height: 26px;*/
            }
            .cntHolder {
                border: 1px solid #ddd;
                border-top: 0;
                padding: 10px;
            }
            .sidebarheading {
                margin: 10px 0;
            }
            .skybluecolor {
                color: #39c;
            }
            .container ul {
                margin: 0;
                padding: 0;
            }
            .inner ul li {
                padding: 5px 0;
                font-size: 13px;
            }
            .container ul, .paginator ul, li, nav .nav li {
                list-style: none;
            }
            h6 {
                font-size: 18px;
            }

            h3, h5, h6 {
                font-weight: 600;
            }
            .filter label {
                text-decoration: underline;
                cursor: pointer;
                cursor: hand;
            }
            a, img, input, select {
                outline: 0;
            }
            .catHeader h1, .catHeader h2 {
                font-size: 1em;
                font-weight: 400;
                line-height: initial;
                margin-bottom: initial;
                padding-bottom: 10px;
                margin-top: 0px;
            }
            .paginator{
                text-align: right;
                margin-top: 10px;
            }
            .box{
                border: 1px solid #ddd;
                padding: 15px;
                margin-top: 15px;
                max-width: 209px;
                max-height: 287px;
                min-height: 287px;
            }
            .box-img{
                width: 100%;
                height: 180px;
                max-width: 164px;
                max-height: 156px;
            }
            .box-img img{
                width: 100%; 
                height: 100%;
                max-width: 164px;
                max-height: 156px;
                object-fit: contain;
            }
            .box-heading{
                font-size: 18px;
                text-align: center;
            }
            .box-price{
                font-size: 20px;
                text-align: center;
            }
            .box-review{
                font-size: 10px;
                text-align: center;
            }
            .nav {
                background: #e7e9eb;
                border-bottom: 1px solid #cfcfcf;
            }
            .container {
                max-width: 980px;
                margin: 0 auto;
                padding: 0 10px;
            }
            #cssmenu {
                width: auto;
                z-index: 1;
            }


        </style>
    </head>
    <body>


        <div class="header">
            <div class="container clearfix">
                <div class="logo"> <a href="<?= $this->Url->build(['controller' => 'Webnews', 'action' => 'index']) ?>"> <img src="https://www.spyprice.co.uk/resource/img/logo.png" alt="SpyPrice "> </a> </div>
                <div class="searchbox clearfix">
                    <a id="A1" href="#" class="sbtn1">Search</a>
                    <form id="searchform" method="GET" action="<?= $this->Url->build(['controller' => 'Webnews', 'action' => 'index']) ?>" autocomplete="off">
                        <input type="text" id="q" name="search" placeholder="Search..." class="sbox ui-autocomplete-input" value="" autocomplete="off">
                        <input type="submit" class="sbtn" value="Search">
                    </form>
                    <div class="mobileMenu"><span></span></div>
                </div>
                <div class="res_searchbox clearfix" style="display: none;">
                    <div class="searchbox1 clearfix">
                        <form id="searchform2" method="GET" action="/" autocomplete="off">
                            <input type="text" id="q2" name="q" placeholder="Search..." class="sbox1 ui-autocomplete-input" value="" autocomplete="off">
                            <input type="submit" class="sbtn2" value="Search">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <nav>

            <div class="container">
                <div id="cssmenu"><div id="menu-button">Menu</div>
                    <ul id="menu" class="nav clearfix">

                        <?php foreach ($categorys as $category): ?>
                            <li class=" <?php if($cataactive == $category->slug)
                            {
                                echo 'active';
                            }
                                ?>"><a href="<?= $this->Url->build(['controller' => 'Webnews', 'action' => 'index', $category->slug]) ?>"> <?= ucfirst($category->name) ?></a>
                      </li>
                            <?php endforeach; ?>
                      
                    <li class="active"><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'adminLogin']) ?>">Admin Login</a>
                      </li>    
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <!-- Navigation end here -->


        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="catHeader">
                            Filter Deals
                        </div>
                        <div id="filter-wrapper" class="cntHolder marBtm keepPad">
                            <form action="/digital-cameras.html" method="GET">
                                <div class="inner">
                                    <ul class="filter">
<!--					            <li><label><input name="rateFilter" class="filter_rate" type="radio" value="5"><span class="amazon-rate rate5"></span></label></li>
                                      <li><label><input name="rateFilter" class="filter_rate" type="radio" value="4"><span class="amazon-rate rate4"></span></label></li>
                                      <li><label><input name="rateFilter" class="filter_rate" type="radio" value="3"><span class="amazon-rate rate3"></span></label></li>-->
                                        <div class="inner">
                                            <div class="sidebarheading">
                                                <h6 class="skybluecolor">Features</h6>
                                            </div>
                                            <ul class="filter"  id="checkboxfeature" >
                                                <?php foreach ($features as $key => $feature) :  ?>
                                                <li><label><input type="checkbox" class="filter_feature" name="featureFilter<?= $key  ?>" value="<?= $key  ?>" onClick="filterFunction(this.id)"><?= $feature  ?></label></li>
                                            <?php endforeach;   ?>
                                            </ul>
                                        </div>
                                        <div class="inner">
                                            <div class="sidebarheading">
                                                <h6 class="skybluecolor">Brand</h6>
                                            </div>
                                            <ul class="filter" id="checkboxbrand">
                                                  <?php foreach ($brands as $key => $brand) :  ?>
                                                <li><label><input class="filter_brand" name="brandFilter<?= $key  ?>" type="checkbox" value="<?= $key  ?>" onClick="filterFunction(this.id)"><?= $brand  ?></label></li>
                                               <?php endforeach;   ?> 
                                            </ul>
                                        </div>
                                        <div class="inner">
                                            <div class="select-m">
                                <?= $this->Form->control('price_id', ['name' => 'price_id', 'class' => 'form-control select', 'type' => 'select', 'options' => $pricerange,'onchange'=>'filterFunction(this.id)',  'empty' => 'Select Price']) ?>          
                                </div>
                                        </div>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="catHeader">
                            <div class="pull-left">
                                <div class="left">
                                    <h1><?= $categoryname ?></h1>
                                </div>
                            </div>
<!--                            <div class="pull-right">
                                <label class="sort">Sort by:</label> 
                                <select id="sort" name="sort">
                                    <option value="popularity" selected="">Popularity</option>
                                    <option value="rating">Average rating</option>
                                    <option value="price-high-low">Price: High to low</option>
                                    <option value="price-low-high">Price: Low to high</option>
                                    <option value="newest">Newest products</option>
                                </select>
                            </div>-->
                            <div class="clearfix"></div>
                        </div>
                        <div class="paginator clearfix">
                            <div class="paginator">
                                <ul class="pagination">
                                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                    <?= $this->Paginator->numbers() ?>
                                    <?= $this->Paginator->next(__('next') . ' >') ?>
                                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                                </ul>
                            </div>
                        </div>
                        <div class="row" id="filterdata">
                             <?php 
                 
                 if(isset($Products) && !empty($Products))
                 {
                 foreach ($Products as $product): ?>
                                <div class="col-sm-4">
                                    <div class="box">
                                        <div class="box-img">
                                            <?php
                                            $cover = '/img/' . $product->images;

                                            if ($product->images == '') {
                                                $cover = '/img/placeholder.jpg';
                                            }
                                            ?>
                                            <?= $this->Html->image($cover, ['alt' => 'related-news', 'class' => 'img-rounded ', 'accept' => 'image/*']); ?>
                                        </div>
                                        <div class="box-heading">
                                            <?= $this->Common->turnCatefun($product->name,50 )?>
                                        </div>
                                        <div class="box-price">
                                            <strong>&#8360; <?= $product->price ?></strong>
                                        </div>

                                    </div>
                                </div>
                 <?php endforeach; } else { ?>
                           <div class="col-sm-12">
                                    <div class="box">
                                        <h1>  No Data found Try again </h1>    
                                         <div class="box-img">
                                            <?php
                                            
                                                $cover = '/img/placeholder.jpg';
                                           
                                            ?>
                                            <?= $this->Html->image($cover, ['alt' => 'related-news', 'class' => 'img-rounded ', 'accept' => 'image/*']); ?>
                                        </div>
                                       </div>
                                </div> 

                 <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>




<!--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
        <script>
            
            function filterFunction()
    {
        
        var price_id = $('#price-id').val(); 
        //alert(price_id);
        var chkArrayfeature = [];
      $("#checkboxfeature input:checked").each(function() {
		chkArrayfeature.push($(this).val());
	});
        var chkArraybrand = [];
      $("#checkboxbrand input:checked").each(function() {
		chkArraybrand.push($(this).val());
	});
        //alert(chkArraybrand);
        //alert(chkArrayfeature);
        var urls = '<?= $this->Url->build(['controller' =>'Webnews', 'action' =>'getFilter'])?>';
       //alert(urls)
        //urllinkr = urlr + '/' + searcbankid + '/' + searcstateid + '/' + bank_district ;
        var data = '&chkArrayfeature=' + escape(chkArrayfeature) +'&chkArraybrand=' + escape(chkArraybrand)+'&price_id=' + escape(price_id);
     // alert(data);
            $.ajax({
                type: "POST",
                cache:false,
                data: data,
                url: urls,
                success: function(html){
                  //alert(html);
                    $('#filterdata').html(html); 
                } 
            });
       return false;    
        
        
       
    }
            function filterpFunction(id)
    {
        alert(id);
        
        var price_id = $('#price-id').val(); 
        alert(price_id);
        var chkArrayfeature = [];
      $("#checkboxfeature input:checked").each(function() {
		chkArrayfeature.push($(this).val());
	});
        var chkArraybrand = [];
      $("#checkboxbrand input:checked").each(function() {
		chkArraybrand.push($(this).val());
	});
        //alert(chkArraybrand);
        //alert(chkArrayfeature);
        var urls = '<?= $this->Url->build(['controller' =>'Webnews', 'action' =>'getFilter'])?>';
       //alert(urls)
        //urllinkr = urlr + '/' + searcbankid + '/' + searcstateid + '/' + bank_district ;
        var data = '&chkArrayfeature=' + escape(chkArrayfeature) +'&chkArraybrand=' + escape(chkArraybrand);
        alert(data);
            $.ajax({
                type: "POST",
                cache:false,
                data: data,
                url: urls,
                success: function(html){
                  //alert(html);
                    $('#filterdata').html(html); 
                } 
            });
       return false;    
        
        
       
    }
            
            
            
            </script>
        
    </body>
</html>