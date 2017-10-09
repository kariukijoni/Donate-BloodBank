<div class="content-wrapper" style="background-color: #ffffff">
    <div class="row" style="margin: 2px">

        <h3 class="text-center">
            <strong>User Manual</strong>
        </h3>
        <!--     if ($role == ROLE_EMPLOYEE) {
                    ?-->
        <div class="panel-group" id="accordion">
            <?php
            if ($role == ROLE_ADMIN) {
                ?>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                <b>
                                    Managing Users
                                </b>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row" style="margin-left: 2px;">
                                <div class="col-md-6">
                                    <h4>
                                        Adding New Users
                                        <hr>
                                    </h4>
                                    <li>Login into the system as an <b>administrator</b></li>
                                    <li>Navigate to users module on the dashboard</li>
                                    <li>Click <b>add new user</b> button</li>
                                    <li> A new window is opened where administrator of the system is prompted
                                        to input data of a new user
                                    </li>
                                    <li>All input fields must be filled</li>
                                    <li>All the input fields must not have <b>zero</b> as first element</li>
                                    <li>Phone numbers start with the second digit, i.e 0717978086 <b>to</b> 717978086</li>
                                    <li>User's role must be defined with caution</li>
                                    <li>Correct email address should be used as will be required during resetting of passwords</li>
                                    <li>All donors should be atleast <b>18yrs</b> and maximum of <b>55yrs</b> of age</li>
                                    <li>After feeding data on all input fields submit button to save users details</li>
                                </div>
                                <div class="col-md-6">
                                    <h4>
                                        Editing Users
                                        <hr> 
                                    </h4>
                                    <li>Login into the system as an administrator</li>
                                    <li>Navigate to <b>Users</b> module in the dashboard</li>
                                    <li>Click on edit button in the users listing table</li>
                                    <li>Edit the users details and match his/her user privelledges with alot of caution</li>
                                    <li>Click submit button to save the changes</li>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>
                                        Delete Users
                                        <hr>
                                    </h4>
                                    <li>Login into the system as system administrator</li>
                                    <li>Navigate to users module in the dashboard</li>
                                    <li>In the user listing window search the user you want to delete in the search button using 
                                        <b>name, email or mobile number</b>
                                    </li>
                                    <li>Click on delete button on the user listing table to remove user from the system</li>
                                </div>
                                <div class="col-md-6">
                                    <h4>
                                        Search Users
                                        <hr> 
                                    </h4>
                                    <li>Login into the system as system administrator</li>
                                    <li>Navigate to users module in the dashboard</li>
                                    <li>In the user listing window search the user you want to delete in the search button using 
                                        <b>name, email or mobile number</b>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if ($role == ROLE_ADMIN || $role == ROLE_MANAGER) {
                ?>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                <b>
                                    Donation Process
                                </b>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <h4>
                                    Potential Donors
                                    <hr>
                                </h4>
                                <li>Login into the system as an administrator or an employee</li>
                                <li>Navigate into <b>all donors</b> module in the dashboard</li>
                                <li>The table potential donors highlights all the probable donors who can do donate blood 
                                    at that moment</li>
                                <li>Click <b>donate</b> button to trigger donation process of that specific donor</li>
                            </div>
                            <div class="col-md-6">
                                <h4>
                                    Next Probable Donors
                                    <hr>
                                </h4>
                                <li>The table next probable donors highlights the next safe donors</li>
                                <li>This donors are ready to donate blood after expiration of their set frequency days</li>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if ($role == ROLE_EMPLOYEE) {
                ?>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                <b>
                                    Donor
                                </b>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <h4>
                                    Made Requests
                                    <hr>
                                </h4>
                                <li>Login into the system as a donor</li>
                                <li>Navigate to donors module in the dashboard </li>
                                <li>The link will direct you to made requests table</li>
                                <li>The table has a bell (notification) icon which counts the unread notifications</li>
                                <li>The table can be filtered using any of the table columns</li>
                            </div>
                            <div class="col-md-6">
                                <h4>
                                    Donation Reports
                                    <hr>
                                </h4>
                                <li>Login into the system as a donor</li>
                                <li>The table donation reports is used to highlight specific donor donation records</li>
                                <li>The table can be filtered using any of the table columns</li>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>