<?php
$controller = $this->request['controller'];
$action = $this->request['action'];
?>



<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
<!--            <div class="image">
            </div>-->
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $usersdetail['users_name']; ?></div>
                <div class="email">  <div class="email"><?php echo $usersdetail['users_email']; ?></div></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href=""><i class="material-icons">input</i><?= __('Profile') ?></a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']); ?>"><i class="material-icons">input</i><?= __('Sign Out') ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header"><?= __('MAIN NAVIGATION') ?></li>
                 <li class="<?php if (($controller == 'Users' && ($action == 'dashboard'))){echo "active";}?>">
                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'dashboard']); ?>">
                        <i class="material-icons">home</i>
                        <span><?= __('Dashboard') ?></span>
                    </a>
                </li>
  
                        <li class="<?php if ($controller == 'Categories' && ($action == 'index'|| $action == 'add' || $action == 'edit' || $action == 'view')) {echo 'active';} ?>">
                        <?= $this->Html->link(__('Category'), ['controller' => 'Categories', 'action' => 'index']) ?>
                        </li>  
                        <li class="<?php if ($controller == 'Brands' && ($action == 'index'|| $action == 'add' || $action == 'edit' || $action == 'view')) {echo 'active';} ?>">
                        <?= $this->Html->link(__('Brands'), ['controller' => 'Brands', 'action' => 'index']) ?>
                        </li>  
                        <li class="<?php if ($controller == 'Features' && ($action == 'index'|| $action == 'add' || $action == 'edit' || $action == 'view')) {echo 'active';} ?>">
                        <?= $this->Html->link(__('Features'), ['controller' => 'Features', 'action' => 'index']) ?>
                        </li>  
                        <li class="<?php if ($controller == 'Product' && ($action == 'index'|| $action == 'add' || $action == 'edit' || $action == 'view')) {echo 'active';} ?>">
                        <?= $this->Html->link(__('Product'), ['controller' => 'Product', 'action' => 'index']) ?>
                        </li>  
                  
               
              
            </ul>

        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2018 <a href="javascript:void(0);"><?= __('Spyprice Admin') ?></a>.
            </div>
            <div class="version">
                <b><?= __('Version') ?>: </b> 1.0.4
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    
</section>
