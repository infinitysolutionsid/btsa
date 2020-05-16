<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="float-right">
                    <ul>
                        <li class="header-icon dib"><i class="far fa-bell"></i><span class="badgenotif">5</span>
                            <div class="drop-down">
                                <div class="dropdown-content-heading">
                                    <span class="text-left">Recent Notifications</span>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34
                                                        PM</small>
                                                    <div class="notification-heading">Mr. John</div>
                                                    <div class="notification-text">5 members joined today </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="header-icon dib"><i class="far fa-comments"></i><span class="badgenotif">3</span>
                            <div class="drop-down">
                                <div class="dropdown-content-heading">
                                    <span class="text-left">2 New Messages</span>
                                    <a href="#"><i class="ti-pencil-alt pull-right"></i></a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="notification-unread">
                                            <a href="#">
                                                <img class="pull-left m-r-10 avatar-img"
                                                    src="assets/images/avatar/1.jpg" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">To all users</div>
                                                    <div class="notification-text">This features is on developing...
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="text-center">
                                            <a href="#" class="more-link">See All</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="header-icon dib"><span class="user-avatar">{{auth()->user()->nama_lengkap}} <i
                                    class="ti-angle-down f-s-10"></i></span>
                            <div class="drop-down dropdown-profile">
                                <div class="dropdown-content-heading">
                                    <span class="text-left">{{auth()->user()->nama_lengkap}}</span>
                                    <p class="trial-day"><span style="color:green;"><i class="fas fa-circle"></i>
                                            Online</span></p>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="/member/{{auth()->user()->id}}/edit"><i class="ti-settings"></i>
                                                <span>Setting</span></a></li>
                                        <li><a href="/logout"><i class="ti-power-off"></i> <span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
