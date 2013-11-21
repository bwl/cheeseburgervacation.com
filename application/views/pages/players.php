        <section id="players">


            <?php echo heading($player_name,2); ?>

            <div class="inn">
            
                <div id="inventory">
                    <div class="row">
                        <div class="cell">
                            <img src="http://hydra-media.cursecdn.com/minecraft.gamepedia.com/2/27/Grid_Block_of_Emerald.png" />
                            <span>64</span>
                        </div>
                        <div class="cell">
                            <img src="http://hydra-media.cursecdn.com/minecraft.gamepedia.com/5/58/Grid_Minecart.png" />
                            <span>64</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="cell">
                            <img src="http://hydra-media.cursecdn.com/minecraft.gamepedia.com/1/13/Grid_Shears.png" />
                            <span>64</span>
                        </div>
                        <div class="cell">
                            <img src="http://hydra-media.cursecdn.com/minecraft.gamepedia.com/3/32/Grid_Torch.png" />
                            <span>64</span>
                        </div>
                    </div>
                </div>
                <!--
                <div>
                    <img id="avatar" class="hidden" src="" alt="avatar" />
                    <h3 id="username" class="panel-title panel-loading">Loading data…</h3>
                </div>
                <div>
                    <div id="user-info">
                        <p id="user-description" class="panel-loading">Loading user data…</p>
                        <p id="fav-item" class="hidden">Favorite item: </p>
                        <p id="social-links" class="hidden"></p>
                        <div class="inventory-opt-out pull-left">
                            <h2 id="inventory">Inventory</h2>
                            <table id="main-inventory" class="inventory-table">
                                <tbody>
                                    <tr class="loading">
                                        <td>loading…</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="height: 29px;"></div>
                            <table id="hotbar-table" class="inventory-table">
                                <tbody>
                                    <tr class="loading">
                                        <td>loading…</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="inventory-opt-out">
                            <h2 id="enderchest">Ender chest</h2>
                            <table id="ender-chest-table" class="inventory-table">
                                <tbody>
                                    <tr class="loading">
                                        <td>loading…</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                    <h2>Statistics</h2>

                    <ul id="pagination" class="nav nav-tabs">
                        <li><a id="tab-stats-general" class="tab-item" href="#general">General</a></li>
                        <li><a id="tab-stats-blocks" class="tab-item" href="#blocks">Blocks</a></li>
                        <li><a id="tab-stats-items" class="tab-item" href="#items">Items</a></li>
                        <li><a id="tab-stats-mobs" class="tab-item" href="#mobs">Mobs</a></li>
                        <li><a id="tab-stats-achievements" class="tab-item" href="#achievements">Achievements</a></li>
                    </ul>

                    <div id="stats-general" class="stats-section">
                        <table id="stats-general-table" class="table table-responsive stats-table">
                            <tbody>
                                <tr>
                                    <th>Stat</th>
                                    <th>Info</th>
                                </tr>
                                <tr id="loading-stat-general-table" class="loading-stat">
                                    <td colspan="7">Loading stat data…</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="stats-blocks" class="stats-section hidden">
                        <table id="stats-blocks-table" class="table table-responsive stats-table">
                            <tbody>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>Block</th>
                                    <th>Times Crafted</th>
                                    <th>Times Used</th>
                                    <th>Times Mined</th>
                                </tr>
                                <tr id="loading-stat-blocks-table" class="loading-stat">
                                    <td colspan="7">Loading stat data…</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="stats-items" class="stats-section hidden">
                        <table id="stats-items-table" class="table table-responsive stats-table">
                            <tbody>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>Item</th>
                                    <th>Times Depleted</th>
                                    <th>Times Crafted</th>
                                    <th>Times Used</th>
                                </tr>
                                <tr id="loading-stat-items-table" class="loading-stat">
                                    <td colspan="7">Loading stat data…</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="stats-mobs" class="stats-section hidden">
                        <table id="stats-mobs-table" class="table table-responsive stats-table">
                            <tbody>
                                <tr>
                                    <th>Mob</th>
                                    <th>Killed</th>
                                    <th>Killed By</th>
                                </tr>
                                <tr id="loading-stat-mobs-table" class="loading-stat">
                                    <td colspan="7">Loading stat data…</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="stats-achievements" class="stats-section hidden">
                        <table id="stats-achievements-table" class="table table-responsive stats-table">
                            <tbody>
                                <tr>
                                    <th>Achievement</th>
                                    <th>Value</th>
                                </tr>
                                <tr id="loading-stat-achievements-table" class="loading-stat">
                                    <td colspan="7">Loading stat data…</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                -->
            </div>
        </section>
        
        <script type="text/javascript" src=" <?=site_url('asset/js/application/shared/common.js'); ?> "></script>
        <script type="text/javascript" src=" <?=site_url('asset/js/application/shared/profile.js'); ?> "></script>
