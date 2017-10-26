<div class="sidebar sidebar-main">
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="" data-original-title="Main pages"></i></li>

                    <!-- User Page -->
                    <li class="{{ Request::is('admin/users*')? 'active': '' }}">
                        <a href="{{URL::to('admin/users')}}"><i class="icon-people"></i> <span>Users</span></a>
                    </li>

                    <!-- Vendor Page -->
                    <li class="{{ Request::is('admin/vendors*')? 'active': '' }}">
                        <a href="{{URL::to('admin/vendors')}}"><i class="icon-people"></i> <span>Vendors</span></a>
                    </li>

                    <!-- Category Page -->
                    <li class="{{( Request::is('admin/categories*') || Request::is('admin/category*') )? 'active': '' }}">
                        <a href="{{URL::to('admin/categories')}}"><i class="icon-grid"></i><span>Categories</span></a>
                    </li>

                    <!-- Studio Page -->
                    <li class="{{ Request::is('admin/studios*')? 'active': '' }}">
                        <a href="{{URL::to('admin/studios')}}"><i class="icon-server"></i> <span>Studios</span></a>
                    </li>

                    <!-- Activity Page -->
                    <li class="{{ Request::is('admin/activities*')? 'active': '' }}">
                        <a href="{{URL::to('admin/activities')}}"><i class="icon-stars"></i> <span>Activities</span></a>
                    </li>

                    <!-- Reservation Page -->
                    <li class="{{ Request::is('admin/reservations*')? 'active': '' }}">
                        <a href="{{URL::to('admin/reservations')}}"><i class="icon-file-locked2"></i> <span>Reservations</span></a>
                    </li>

                    <!-- Transaction Page -->
                    <li class="{{ Request::is('admin/transactions*')? 'active': '' }}">
                        <a href="{{URL::to('admin/transactions')}}"><i class="icon-coins"></i> <span>Transactions</span></a>
                    </li>
                    

                     <!-- Setting Page -->
                    <li class="{{ Request::is('admin/setting*')? 'active': '' }}">
                        <a href="{{URL::to('admin/setting')}}"><i class="icon-cog2"></i> <span>Settings</span></a>
                    </li>
                     <!-- FAQ Page -->
                    <li class="{{ Request::is('admin/faq*')? 'active': '' }}">
                        <a href="{{URL::to('admin/faq')}}"><i class="icon-cog2"></i> <span>FAQ</span></a>
                    </li>

                    <!-- Support Page -->
                    <li class="{{ Request::is('admin/support*')? 'active': '' }}">
                        <a href="{{URL::to('admin/support')}}"><i class="icon-cog2"></i> <span>Support</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>