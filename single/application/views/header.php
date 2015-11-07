<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url() . index_page(); ?>/dashboard">Alg India</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!-- <li><a href="dashboard">Dashboard <span class="sr-only">(current)</span></a></li>-->

                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Queries <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo base_url() . index_page(); ?>/queries">List Queries</a></li>
                        <li><a href="<?php echo base_url() . index_page(); ?>/queries/logger">Queries Logger</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Alerts <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <?php
                        $this->db = $this->load->database('default', true);
                        $query = $this->db->get('DTS');
                        foreach ($query->result() as $row) {
                            $db[$row->name] = $row->db;
                            echo '<li><a href="' . base_url() . index_page() . '/alerts/' . $row->db . '">' . $row->name . ' Alerts</a></li>';
                        }
                        $this->db->close();
                        ?>
                    </ul>
                </li>
                <?php if ($this->session->userdata('role') == 1) { ?>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Alert Logger <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php
                            $this->db = $this->load->database('default', true);
                            $query = $this->db->get('DTS');
                            foreach ($query->result() as $row) {
                                $db[$row->name] = $row->db;
                                echo '<li><a href="' . base_url() . index_page() . '/logger/' . $row->db . '">' . $row->name . ' Alerts</a></li>';
                            }
                            $this->db->close();
                            ?>
                        </ul>
                    </li>
                <?php } ?>
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Alert Creator <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo base_url() . index_page(); ?>/newalert">New Alert</a></li>
                        <li><a href="<?php echo base_url() . index_page(); ?>/newalert/calendar">New Calendar Alert</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php if ($this->session->userdata('role') == 1) { ?>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">User <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo base_url() . index_page(); ?>/user/signup">Create New User</a></li>
                            <li><a href="<?php echo base_url() . index_page(); ?>/user/user_list">List/Update Users</a></li>
                        </ul>
                    </li>


                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">System <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"></a></li>
                            <li><a href="<?php echo base_url() . index_page(); ?>/user/change_password">Change Password</a></li>
                            <li><a href="#">Change Details</a></li>
                            <li class="divider"></li>

                            <li><a href="<?php echo base_url() . index_page() ?>/logout">Logout</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li><a href="<?php echo base_url() . index_page() ?>/logout">Logout</a></li>
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>