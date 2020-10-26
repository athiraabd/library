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
                    <li class="py-10 text-center">
                        <a class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <h5 class="d-inline-block text-dark">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </h5>
                        </a>

                        @php $customer = Auth::user()->id  @endphp
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
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

                    <li class="Ul_li--hover">
                        <a class=" " href="{{ route('issues.index') }}">
                            <i class="i-Arrow-Barrier text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">Issued</span>
                        </a>
                    </li>

                    <li class="Ul_li--hover">
                        <a class=" " href="{{ route('return') }}">
                            <i class="i-Arrow-Around text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">Returned</span>
                        </a>
                    </li>

                    <li class="Ul_li--hover">
                        <a class=" " href="{{ route('latereturn') }}">
                            <i class="i-Danger text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">Late Returned</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <!-- side-nav-close -->
</div>
<!-- end sidebar -->
<div class="switch-overlay"></div>
