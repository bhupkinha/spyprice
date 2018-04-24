
<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="pull-left">
                               <?= __('View Features') ?>
                            </h2>
                          <?= $this->Common->getBreadcrumbAdminTwoLevel('Features', 'index', 'Features', __('View Category')); ?>
                        </div>
                        <div class="body">
                            
                             <div class="text-right" style="margin-bottom: 15px;">
                                            <a href="<?= $this->Url->build([ 'controller' => 'Features','action' => 'edit', $features['id']]);?>" class="btn btn-primary waves-effect">
                                                Edit
                                            </a>
                                           
                                            <a href="<?= $this->Url->build([ 'controller' => 'Features','action' => 'delete', $features['id']]);?>" class="btn btn-primary waves-effect" style="margin-left: 15px;">
                                                Delete
                                            </a>
                                        </div>
                        
                            <div class="contacts view large-9 medium-8 columns content">
                            
                            <table class="vertical-table">
                                <tr>
                                    <th scope="row"><?= __('Name') ?></th>
                                    <td><?= $features->name ?></td>
                                </tr>
                               
                                <tr>
                                    <th scope="row"><?= __('Status') ?></th>
                                    <td><?= ($features->status)? 'Active' : 'Inactive' ?></td>
                                </tr>
                              
                                
                                <tr>
                                    <th scope="row"><?= __('Created Date') ?></th>
                                    <td><?= $features->created ?></td>
                                </tr>
                                
                            </table>
                           
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

