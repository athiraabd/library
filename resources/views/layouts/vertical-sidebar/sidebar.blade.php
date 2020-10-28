<!-- start sidebar -->
<div class="sidebar-panel">
    <div class="gull-brand px-3 text-center my-4 d-flex justify-content-center align-items-center">
        <img class="ml-auto" src="{{ asset('images/book.png') }}" alt="">
        <!-- <span class=" item-name text-20 text-primary font-weight-700">GULL</span> -->
        <div class="sidebar-compact-switch ml-auto"><span></span></div>

    </div>
    <!-- user -->
    <div class="scroll-nav" data-perfect-scrollbar data-suppress-scroll-x="true">

        <!-- user close -->
        <!-- side-nav start -->
        <div class="side-nav">

            <div class="main-menu">
                <ul class="metismenu" id="menu">

                    <li class="Ul_li--hover">
                        <a class=" " href="{{ route('dashboard') }}">
                            <i class="i-Home-2 text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">Dashboard</span>
                        </a>
                    </li>
                    <li class="Ul_li--hover">
                        <a class=" " href="{{ route('books.index') }}">
                            <i class="i-Book text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">Books</span>
                        </a>
                    </li>

                    <li class="Ul_li--hover">
                        <a class=" " href="{{ route('magazines.index') }}">
                            <i class="i-Open-Book text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">Magazines</span>
                        </a>
                    </li>

                    <li class="Ul_li--hover">
                        <a class=" " href="{{ route('newspapers.index') }}">
                            <i class="i-Newspaper text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">Newspapers</span>
                        </a>
                    </li>

                    <li class="Ul_li--hover {{ (request()->path() == 'issued') ? 'mm-active' : '' }}" >
                        <a class="has-arrow" href="#">
                            <i class="i-Inbox-Into text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">Issued</span>
                        </a>
                        <ul class="mm-collapse">
                            <li class="item-name">
                                <a class=" " href="{{ route('issues.index') }}">
                                    <i class="i-Arrow-Barrier text-20 mr-2 text-muted"></i>
                                    <span class="item-name  text-muted">All Issued</span>
                                </a>
                            </li>

                            <li class="item-name">
                                <a class=" " href="{{ route('return') }}">
                                    <i class="i-Arrow-Around text-20 mr-2 text-muted"></i>
                                    <span class="item-name  text-muted">Returned</span>
                                </a>
                            </li>

                            <li class="item-name">
                                <a class=" " href="{{ route('latereturn') }}">
                                    <i class="i-Danger text-20 mr-2 text-muted"></i>
                                    <span class="item-name  text-muted">Late Returned</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="Ul_li--hover">
                        <a class=" " href="{{ route('monthly.report') }}">
                            <i class="i-Receipt text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">Reporting</span>
                        </a>
                    </li>

                    <li class="Ul_li--hover">
                        <a class="has-arrow">
                            <i class="i-Administrator text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="mm-collapse">
                            <li class="item-name">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="nav-icon i-Checked-User"></i>
                                    <span class="item-name">Sign Out</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <!-- side-nav-close -->
</div>
<!-- end sidebar -->
<div class="switch-overlay"></div>
