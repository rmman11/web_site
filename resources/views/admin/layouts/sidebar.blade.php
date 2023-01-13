


@include('admin.partial.topbar')
<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
         <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Panou de Administrator</div>
                            <a class="nav-link  {{ request()->is('admin/dashboard') || request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            @if(auth()->user()->role == 'admin')
                            <a class="nav-link  {{ request()->is('admin/users') || request()->is('admin/users') ? 'active' : '' }}" href="{{ route('users') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Users
                            </a>
                      
                            <a class="nav-link  {{ request()->is('admin/categories') || request()->is('admin/categories') ? 'active' : '' }}" 
                            href="{{ route('categories.index') }}">
                                <div class="sb-nav-link-icon"> <i class="fa fa-list-alt" aria-hidden="true"></i>
</div>
                                Category
                            </a>


                            <a class="nav-link  {{ request()->is('admin/products') || request()->is('admin/products') ? 'active' : '' }}"  
                            href="{{ route('products.index') }}">
                                <div class="sb-nav-link-icon"><i class="fa-fw fas fa-cogs nav-icon"></i></div>
                                Products
                            </a>
                          
                        
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Settings
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('pages.siteMap') }}"><div class="sb-nav-link-icon">
                                        <i class="fas fa-sitemap"></i></div>

                                    {{ __('Sitemap') }}</a>


                                    <a class="nav-link" href="{{ route('videos.index') }}"><div class="sb-nav-link-icon">
                                    

                                    <i class="fa-sharp fa-solid fa-video"></i></div>

                                    {{ __('Video') }}</a>


                                    <a class="nav-link" href="{{ route('pages.calendar') }}">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar"></i></div>





        


                                      {{ __('Calendar') }}</a>
                                    <a class="nav-link" href="{{ route('pages.chart') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-line-chart" style="font-size:12px"></i></div>
                                Chart
                            </a>

                            <a class="nav-link" href="{{ route('pages.cpuinfo') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cpu" viewBox="0 0 16 16">
  <path d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
</svg>
{{ __('CpInfo') }}
                            </a>



            <a class="nav-link" href="{{ route('orders.index') }}">
                <i class="app-menu__icon fa fa-bar-chart"></i>
                <span class="app-menu__label">Orders</span>
            </a>
        
                            
                                </nav>
                            </div>  @endif
                         

                            <a class="nav-link" href="{{ route('tasks.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Task
                            </a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:     {{ Auth::user()->name }}</div>
                        Control Panel
                    </div>

                </nav>
</div>
</div>
 
            

