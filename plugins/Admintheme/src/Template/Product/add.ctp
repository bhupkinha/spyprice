<?php
$status = $this->Common->getstatus();
$vendors = $this->Common->getvendors();

?>
<section class="content">
    <div class="container-fluid">
        <!-- <div class="block-header">
            <h2>
                FORM VALIDATION
                <small>Taken from <a href="https://jqueryvalidation.org/" target="_blank">jqueryvalidation.org</a></small>
            </h2>
        </div> -->
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= $this->Flash->render() ?>
                <div class="card add-news">
                    <div class="header">
                        <h2>
              
                            <?= __('Product Add') ?>
                        </h2>
                        <?= $this->Common->getBreadcrumbAdminTwoLevel('Product', 'index', 'Product', __('Add Product')); ?>

                    </div>
                    <div class="body">
                        <?= $this->Form->create($product, ['enctype' => 'multipart/form-data', 'templates' => ['inputContainer' => '{{content}}'], 'id' => 'Product']) ?>

                        <div class="row">
                            <div class="col-sm-8">

                               
                           <div class="select-m">
                                    <?= $this->Form->control('category_id', ['class' => 'form-control select2', 'type' => 'select', 'options' => $categories, 'label' => 'Category', 'empty' => 'Choose Category']) ?>          
                                </div>
                                <div class="select-m">
                                <?= $this->Form->control('feature_id', ['name' => 'feature_id', 'class' => 'form-control select', 'type' => 'select', 'options' => $features,  'empty' => 'Select feature']) ?>          
                                </div>
                                <br>
                              
                                <div class="select-m">
                                    <?= $this->Form->control('brand_id', ['class' => 'form-control select', 'type' => 'select', 'options' => $brands, 'label' => 'Brand', 'empty' => 'Choose Brand']) ?>          
                                </div>
                                
                               
                                <br>
 <div class="form-group form-float">
                            <div class="form-line">
                                <?= $this->Form->control('name', ['class' => 'form-control', 'type' => 'text', 'label' => false]) ?> 
                                <label class="form-label">Product Name</label>
                            </div>
                        </div>
                           <div class="form-group form-float">
                            <div class="form-line">
                                <?= $this->Form->control('price', ['class' => 'form-control', 'type' => 'number', 'label' => false]) ?> 
                                <label class="form-label">Price</label>
                            </div>
                        </div> 
                     <div class="form-group form-float">
                                    <div class="form-line image">
                                                    <?= $this->Form->control('images', ['label' => 'Image', 'class' => 'form-control', 'type' => 'file', 'onchange' => "ImageFilesize1();"]) ?>            
                                                </div>
                                </div>  
                                 <br>
                              
                                <div class="select-m">
                                    <?= $this->Form->control('status', ['class' => 'form-control select2', 'type' => 'select', 'options' => $status, 'empty' => 'Select Status']) ?>          
                                </div>
                                 <br>
                              
                                <div class="select-m">
                                    <?= $this->Form->control('vendor', ['class' => 'form-control select2', 'type' => 'select', 'options' => $vendors, 'empty' => 'Select Vendor']) ?>          
                                </div>
                            </div>
                        </div>
                         <div class="text-center">
                           <button type="submit" class="btn btn-primary">Submit</button>
                        </div> 
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
    #category-id-error, #city-id-error{
        display:block;
    }
</style>
<script type="text/javascript">

    $(document).ready(function () {
        $('.select2').select2();
    });


    function ImageFilesize() {
        var Extension = '';
        if (window.ActiveXObject) {
            var fso = new ActiveXObject("Scripting.FileSystemObject");
            var filepath = document.getElementById('images').value;
            var thefile = fso.getFile(filepath);
            var sizeinbytes = thefile.size;
        } else {
            var filepath = document.getElementById('images').value;
            var Extension = filepath.substring(filepath.lastIndexOf('.') + 1).toLowerCase();
            var sizeinbytes = document.getElementById('images').files[0].size;
        }
        var size = sizeinbytes / 1024 / 1024;
        if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
            if (size <= 2) {
            } else {
                alert('Allowed maximum image sizes is 2MB.');
                document.getElementById('images').value = '';
            }
        } else {
            alert('Allowed only .gif,.png,.bmp,.jpg,.jpeg image files.');
            document.getElementById('images').value = '';
        }

    }
</script>


