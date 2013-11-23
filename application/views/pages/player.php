<?php $this->load->view('include/social'); ?>
<?php $this->load->view('include/header'); ?>

<section id="players">
    <div class="inn">
        <?php echo heading($player_name,2)?>

        <div class="playerMeters">
            <div class="healthMeter">
                <?php 
                    $health = $player->Health;
                    
                    for($i=2; $i <= 20; $i +=2) {
                        $healthClass = '';
                        if ($health >= $i) {
                            $healthClass = 'full';
                        } else if ($health == $i -1) {
                            $healthClass = 'half';
                        }
                        echo '
                        <div class="health">
                            <div class="health-inn '.$healthClass.'"></div>
                        </div>';
                    }
                ?>
            </div>
    
            <div class="hungerMeter">
                <?php 
                    $hunger = $player->foodLevel;
                    for($i=20; $i > 0; $i -=2) {
                        $hungerClass = '';
                        if ($hunger >= $i) {
                            $hungerClass = 'full';
                        } else if ($hunger == $i -1) {
                            $hungerClass = 'half';
                        }
                        echo '
                        <div class="hunger">
                            <div class="hunger-inn '.$hungerClass.'"></div>
                        </div>';
                    }
                ?>
            </div>
            
            <div class="xpMeter">
                <div class="xpLevel"><?php echo $player->XpLevel; ?></div>
                <div class="xpMeter-inn" <?php echo 'style="width:' . $player->XpP*100 . '%"'; ?> ></div>
            </div>
        </div>
        
        <?php $this->load->view('include/mcInventory'); ?>

        <?php echo var_chart($player); ?>
        
    </div>
</section>

<?php $this->load->view('include/footer'); ?>
<?php $this->load->view('include/scripts'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/application/pages/player/player.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/application/pages/player/common.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/application/pages/player/profile.js"></script>
