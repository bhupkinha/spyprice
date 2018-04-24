<?php
$status = $this->Common->getstatus();
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">

        </div>
        <!-- Basic Validation -->
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= $this->Flash->render() ?>
                <div class="card">
                    <div class="header">
                        <h2>
                            <?= __('Edit Brands') ?>
                        </h2>
 <?= $this->Common->getBreadcrumbAdminTwoLevel('Brands', 'index', 'Brands', __('Edit Brands')); ?>
                    </div>
                    <div class="body">
                       <?= $this->Form->create($brands, ['id' => 'addbody', 'templates' => ['inputContainer' => '{{content}}']]) ?>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <?= $this->Form->control('name', ['class' => 'form-control', 'type' => 'text', 'label' => false]) ?> 
                                <label class="form-label">Name</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?= $this->Form->control('description', ['class' => 'form-control', 'type' => 'text', 'label' => false]) ?> 
                                <label class="form-label">Description</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <?= $this->Form->input('status', ['empty' => __('Select status'), 'options' => $status, 'class' => 'form-control']); ?>
                            </div>
                        </div>
                        <?= $this->Form->button('Edit Brands', ['class' => 'btn btn-primary waves-effect']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>