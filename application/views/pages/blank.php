<?php $this->load->view('include/social'); ?>
<?php $this->load->view('include/header'); ?>

<section>
    <div class="inn">
        <?php echo $page_content; ?>
    </div>
</section>

<?php $this->load->view('include/footer'); ?>
<?php $this->load->view('include/scripts'); ?>

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/application/pages/player/common.js"></script>
