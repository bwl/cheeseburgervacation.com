<?php $this->load->view('include/social'); ?>
<?php $this->load->view('include/header'); ?>

<section id="players">
    <div class="inn">
        <?php echo heading($player_name,2)?>
        
        <?php $this->load->view('include/mcInventory'); ?>
        
    </div>
</section>

<?php $this->load->view('include/footer'); ?>
<?php $this->load->view('include/scripts'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/application/pages/player/player.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/application/pages/player/common.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/application/pages/player/profile.js"></script>
