<?php 
	
	$navbarsideleft=array(
		array(
			'path' => 'home', 
			'label' => 'Home', 
			'icon' => '<i class="fa fa-home "></i>'
		),
		
		array(
			'path' => 'products', 
			'label' => 'Products', 
			'icon' => '<i class="fa fa-cart-plus "></i>'
		),
		
		array(
			'path' => 'users', 
			'label' => 'Users', 
			'icon' => '<i class="fa fa-user "></i>','submenu' => array(
		array(
			'path' => 'users/Index', 
			'label' => 'Users', 
			'icon' => '<i class="fa fa-user "></i>'
		),
		
		array(
			'path' => 'users', 
			'label' => 'Menu 1', 
			'icon' => ''
		),
		
		array(
			'path' => 'users', 
			'label' => 'Menu 3', 
			'icon' => ''
		),
		
		array(
			'path' => 'users', 
			'label' => 'Menu 4', 
			'icon' => ''
		)
	)
		),
		
		array(
			'path' => 'menu4', 
			'label' => 'Menu 4', 
			'icon' => '','submenu' => array(
		array(
			'path' => 'menu4/Index', 
			'label' => 'Menu 4', 
			'icon' => ''
		),
		
		array(
			'path' => 'menu4', 
			'label' => 'Menu 1', 
			'icon' => ''
		),
		
		array(
			'path' => 'menu4', 
			'label' => 'Menu 3', 
			'icon' => ''
		),
		
		array(
			'path' => 'menu4', 
			'label' => 'Menu 4', 
			'icon' => ''
		),
		
		array(
			'path' => 'menu4', 
			'label' => 'Menu 5', 
			'icon' => ''
		)
	)
		)
	);

	$navbartopleft=array(
		array(
			'path' => 'menu2', 
			'label' => 'Menu 2', 
			'icon' => ''
		),
		
		array(
			'path' => 'menu1', 
			'label' => 'Menu 1', 
			'icon' => '','submenu' => array(
		array(
			'path' => 'menu1/Index', 
			'label' => 'Menu 1', 
			'icon' => ''
		),
		
		array(
			'path' => 'menu1', 
			'label' => 'Menu 1', 
			'icon' => ''
		),
		
		array(
			'path' => 'menu1', 
			'label' => 'Menu 3', 
			'icon' => ''
		),
		
		array(
			'path' => 'menu1', 
			'label' => 'Menu 4', 
			'icon' => ''
		)
	)
		),
		
		array(
			'path' => 'menu3', 
			'label' => 'Menu 3', 
			'icon' => ''
		)
	);

	$navbartopright=array(
		array(
			'path' => 'menu2', 
			'label' => 'Menu 2', 
			'icon' => '','submenu' => array(
		array(
			'path' => 'menu2/Index', 
			'label' => 'Menu 2', 
			'icon' => ''
		),
		
		array(
			'path' => 'menu2', 
			'label' => 'Menu 1', 
			'icon' => ''
		),
		
		array(
			'path' => 'menu2', 
			'label' => 'Menu 3', 
			'icon' => ''
		)
	)
		)
	);

		
	
?>
<template id="AppHeader">
	<div>
<b-navbar ref="navbar" toggleable="md" fixed="top" type="dark" variant="primary">
	<b-navbar-brand href="<?php print_link(""); ?>">
		<img class="img-responsive" src="<?php print_link(SITE_LOGO); ?>" /> 
		<?php echo SITE_NAME ?>
	</b-navbar-brand>
	<b-navbar-toggle target="nav_collapse"></b-navbar-toggle>
	<?php
			if(user_login_status() == true ){
		?>
	<b-collapse is-nav id="nav_collapse">
		<b-navbar-nav ref="sidebar" class="navbar-fixed-left navbar-dark bg-primary">
			
			<div class="menu-profile">
				<a class="avatar" href="#account">
					<niceimg single width="90" height="90" imgclass="user-photo" path="<?php echo USER_PHOTO; ?>"></niceimg>
				</a>
				<h5 class="user-name">Hi <?php echo ucwords(USER_NAME); ?> ! </h5>
				<?php
					if(defined('USER_ROLE')){
					?>
						<small class="text-muted"><?php echo USER_ROLE; ?> </small>
					<?php
					}
				?>
				<div class="menu-dropdown">
					<b-nav-item-dropdown right>
						<template slot="button-content">
							<i class="fa fa-user"></i>
						</template>
						<b-dropdown-item href="#account"><i class="fa fa-user"></i> My Account</b-dropdown-item>
						<b-dropdown-item href="<?php print_link('index/logout?csrf_token='.Csrf::$token) ?>"><i class="fa fa-sign-out"></i> Logout</b-dropdown-item>
					</b-nav-item-dropdown>
				</div>
			</div>

			<?php render_menu($navbarsideleft  , 'left'); ?>
		</b-navbar-nav>
		<b-navbar-nav>
			<?php render_menu($navbartopleft  , 'left'); ?>
		</b-navbar-nav>

		<!-- Right aligned nav items -->
		<b-navbar-nav class="ml-auto">
			<?php render_menu($navbartopright  , 'right'); ?>
			
				<b-nav-item-dropdown right>
					<template slot="button-content">
						<niceimg single width="30" height="30" path="<?php echo USER_PHOTO; ?>"></niceimg>
						<span>Hi <?php echo ucwords(USER_NAME); ?> !</span>
					</template>
					<b-dropdown-item to="/account"><i class="fa fa-user"></i> My Account</b-dropdown-item>
					<b-dropdown-item href="<?php print_link('index/logout?csrf_token='.Csrf::$token) ?>"><i class="fa fa-sign-out"></i> Logout</b-dropdown-item>
				</b-nav-item-dropdown>

		</b-navbar-nav>
		
	</b-collapse>
	<?php
		}
	?>
</b-navbar>
</div>
</template>

<script>
	var AppHeader = Vue.component('AppHeader', {
		template:'#AppHeader',
		mounted:function(){
			//let height = this.$el.offsetHeight;
			if(this.$refs.navbar){
				var height = this.$refs.navbar.offsetHeight;
				document.body.style.paddingTop = height + 'px';
				
				if(this.$refs.sidebar){
					this.$refs.sidebar.style.top = height + 'px';
				}
			}
		}
	})
</script>

<?php
	/**
	 * Build Menu List From Array
	 * Support Multi Level Dropdown Menu Tree
	 * Set Active Menu Base on The Current Page || url
	 * @return  HTML
	 */
	function render_menu($arrMenu,$slot="left"){
		if(!empty($arrMenu)){
			foreach($arrMenu as $menuobj){
				$path = trim($menuobj['path'],"/");
				
				if(PageAccessManager::GetPageAccess($path)=='AUTHORIZED'){

					if(empty($menuobj['submenu'])){
						?>
						<b-nav-item to="/<?php echo ($path); ?>">
							<?php echo (!empty($menuobj['icon']) ? $menuobj['icon'] : null); ?> 
							<?php echo $menuobj['label']; ?>
						</b-nav-item>
						<?php
					}
					else{
						$smenu=$menuobj['submenu'];
						?>
						<b-nav-item-dropdown right>
							<template slot="button-content">
								<?php echo (!empty($menuobj['icon']) ? $menuobj['icon'] : null); ?> 
								<?php echo $menuobj['label']; ?>
								<?php if(!empty($smenu)){ ?><i class="caret"></i><?php } ?>
							</template>
							<?php
								if(!empty($smenu)){
									 render_submenu($smenu);
								}
							?>
						</b-nav-item-dropdown>
						<?php 
					}
				}
			}
		
		}
	}
	
	/**
	 * Render Multi Level Dropdown menu 
	 * Recursive Function
	 * @return  HTML
	 */
	function render_submenu($arrMenu){
		if(!empty($arrMenu)){
			foreach($arrMenu as $key=>$menuobj){
				$path =  trim($menuobj['path'],"/");
				if(PageAccessManager::GetPageAccess($path)=='AUTHORIZED'){
					?>
					<b-dropdown-item to="/<?php echo($path); ?>">
						<?php echo (!empty($menuobj['icon']) ? $menuobj['icon'] : null); ?> 
						<?php echo $menuobj['label']; ?>
						<?php
							if(!empty($menuobj['submenu'])){
								render_menu($menuobj['submenu']); 
							}
						?>
					</b-dropdown-item>
					<?php
				}
			}
		}
	}
?>