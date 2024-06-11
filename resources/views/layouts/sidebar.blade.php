 <!--start sidebar -->
 <aside class="sidebar-wrapper" data-simplebar="true">
     <div class="sidebar-header">
         {{-- <div>
             <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
         </div> --}}
         <div>
             <h4 class="logo-text">VPS Hab</h4>
         </div>
         <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
         </div>
     </div>
     <!--navigation-->
     <ul class="metismenu" id="menu">
         <li class="{{ $activeLink(['admin.dashboard']) ? 'mm-active' : null }}">
             <a href="javascript:;" class="has-arrow"
                 aria-expanded="{{ $activeLink(['admin.dashboard']) ? 'true' : null }}">
                 <div class="parent-icon"><i class="bi bi-house-fill"></i>
                 </div>
                 <div class="menu-title">Dashboard</div>
             </a>
             <ul class="mm-collapse">
                 <li class="{{ request()->routeIs('admin.dashboard') ? 'mm-active' : null }}"> <a
                         href="{{ route('admin.dashboard') }}"><i class="bi bi-circle"></i>Dashboard</a>
                 </li>
             </ul>
         </li>
         <li
             class="{{ $activeLink(['banner-information.index', 'basic-information.index', 'map-information.index']) ? 'mm-active' : null }}">
             <a href="javascript:;" class="has-arrow" aria-expanded="{{ $activeLink(['dashboard']) ? 'true' : null }}">
                 <div class="parent-icon"><i class="lni lni-world"></i>
                 </div>
                 <div class="menu-title">Website</div>
             </a>
             <ul class="mm-collapse">
                 <li class="{{ request()->routeIs('basic-information.index') ? 'mm-active' : null }}"> <a
                         href="{{ route('basic-information.index') }}"><i class="bi bi-circle"></i>Basic Information</a>
                 </li>
                 <li class="{{ request()->routeIs('banner-information.index') ? 'mm-active' : null }}"> <a
                         href="{{ route('banner-information.index') }}"><i class="bi bi-circle"></i>Banner</a>
                 </li>
                 <li class="{{ request()->routeIs('map-information.index') ? 'mm-active' : null }}"> <a
                         href="{{ route('map-information.index') }}"><i class="bi bi-circle"></i>Map Information</a>
                 </li>
                 <li class="{{ request()->routeIs('page-information.index') ? 'mm-active' : null }}"> <a
                         href="{{ route('page-information.index') }}"><i class="bi bi-circle"></i>Page</a>
                 </li>
                 <li class="{{ request()->routeIs('specification.index') ? 'mm-active' : null }}"> <a
                         href="{{ route('specification.index') }}"><i class="bi bi-circle"></i>Specifications</a>
                 </li>
             </ul>
         </li>
         <li
             class="{{ $activeLink(['all-products.index', 'all-products.show', 'country.index', 'single-product.show']) ? 'mm-active' : null }}">
             <a href="javascript:;" class="has-arrow" aria-expanded="{{ $activeLink(['dashboard']) ? 'true' : null }}">
                 <div class="parent-icon"><i class="lni lni-cart"></i>
                 </div>
                 <div class="menu-title">Products</div>
             </a>
             <ul class="mm-collapse">
                 <li class="{{ request()->routeIs('all-products.index') ? 'mm-active' : null }}"> <a
                         href="{{ route('all-products.index') }}"><i class="bi bi-circle"></i>All Products</a>
                 </li>
                 <li class="{{ request()->routeIs('add-product.index') ? 'mm-active' : null }}"> <a
                         href="{{ route('add-product.index') }}"><i class="bi bi-circle"></i>Add Product</a>
                 </li>
                 <li class="{{ request()->routeIs('category.index') ? 'mm-active' : null }}"> <a
                         href="{{ route('category.index') }}"><i class="bi bi-circle"></i>Categories</a>
                 </li>
                 <li class="{{ request()->routeIs('country.index') ? 'mm-active' : null }}"> <a
                         href="{{ route('country.index') }}"><i class="bi bi-circle"></i>Vps Country</a>
                 </li>
                 <li class="{{ request()->routeIs('isp.index') ? 'mm-active' : null }}"> <a
                         href="{{ route("isp.index") }}"><i class="bi bi-circle"></i>ISP & Loction</a>
                 </li>
                 <li class="{{ request()->routeIs("cuppon.index") ? 'mm-active' : null }}"> <a
                    href="{{ route("cuppon.index") }}"><i class="bi bi-circle"></i>Genarate Cuppon</a>
                </li>
             </ul>
         </li>

         <li class="{{ $activeLink(['all-orders.index']) ? 'mm-active' : null }}">
             <a href="javascript:;" class="has-arrow" aria-expanded="{{ $activeLink(['dashboard']) ? 'true' : null }}">
                 <div class="parent-icon"><i class="lni lni-delivery"></i>
                 </div>
                 <div class="menu-title">Order</div>
             </a>
             <ul class="mm-collapse">
                 <li class="{{ request()->routeIs('all-orders.index') ? 'mm-active' : null }}"> <a
                         href="{{ route('all-orders.index') }}"><i class="bi bi-circle"></i>All Orders</a>
                 </li>
             </ul>
         </li>

         <li class="{{ $activeLink(['profile.index', "all-users.index"]) ? 'mm-active' : null }}">
             <a href="javascript:;" class="has-arrow" aria-expanded="{{ $activeLink(['dashboard']) ? 'true' : null }}">
                 <div class="parent-icon"><i class="bi bi-people-fill"></i>
                 </div>
                 <div class="menu-title">Users</div>
             </a>
             <ul class="mm-collapse">
                 <li class="{{ request()->routeIs('all-users.index') ? 'mm-active' : null }}"> <a
                         href="{{ route('all-users.index') }}"><i class="bi bi-circle"></i>All Users</a>
                 </li>
             </ul>
         </li>
         <li class="{{ $activeLink(['profile.index']) ? 'mm-active' : null }}">
             <a href="javascript:;" class="has-arrow" aria-expanded="{{ $activeLink(['dashboard']) ? 'true' : null }}">
                 <div class="parent-icon"><i class="lni lni-popup"></i>
                 </div>
                 <div class="menu-title">Information</div>
             </a>
             <ul class="mm-collapse">
                 <li class="{{ request()->routeIs("all-subscribe.index") ? 'mm-active' : null }}"> <a
                         href="{{ route("all-subscribe.index") }}"><i class="bi bi-circle"></i>Subscriber</a>
                 </li>
             </ul>
         </li>
         <li class="{{ $activeLink(['profile.index']) ? 'mm-active' : null }}">
             <a href="javascript:;" class="has-arrow"
                 aria-expanded="{{ $activeLink(['dashboard']) ? 'true' : null }}">
                 <div class="parent-icon"><i class="lni lni-protection"></i>
                 </div>
                 <div class="menu-title">Privacy Policy</div>
             </a>
             <ul class="mm-collapse">
                 <li class="{{ request()->routeIs('terms-condition.index') ? 'mm-active' : null }}"> <a
                         href="{{ route('terms-condition.index') }}"><i class="bi bi-circle"></i>Terms &
                         Condition</a>
                 </li>
                 <li class="{{ request()->routeIs('update-privacy-policy.index') ? 'mm-active' : null }}"> <a
                         href="{{ route('update-privacy-policy.index') }}"><i class="bi bi-circle"></i>Privacy
                         Policy</a>
                 </li>
                 <li class="{{ request()->routeIs('cookie-policy.index') ? 'mm-active' : null }}"> <a
                         href="{{ route('cookie-policy.index') }}"><i class="bi bi-circle"></i>Cookie
                         Statement</a>
                 </li>
                 <li class="{{ request()->routeIs("knowledgebase.index") ? 'mm-active' : null }}"> <a
                    href="{{ route("knowledgebase.index") }}"><i class="bi bi-circle"></i>Knowledgebase</a>
                </li>
                <li class="{{ request()->routeIs("frequently-sasked-questions.index") ? 'mm-active' : null }}"> <a
                    href="{{ route("frequently-sasked-questions.index") }}"><i class="bi bi-circle"></i>Faq</a>
                </li>
             </ul>
         </li>
         <li class="{{ $activeLink(['profile.index', 'announcement.index']) ? 'mm-active' : null }}">
             <a href="javascript:;" class="has-arrow"
                 aria-expanded="{{ $activeLink(['dashboard']) ? 'true' : null }}">
                 <div class="parent-icon"><i class="bi bi-telephone-fill"></i>
                 </div>
                 <div class="menu-title">Support</div>
             </a>
             <ul class="mm-collapse">
                 <li class="{{ request()->routeIs('support-information.index') ? 'mm-active' : null }}"> <a
                         href="{{ route('support-information.index') }}"><i class="bi bi-circle"></i>Support
                         Information</a>
                 </li>
                 @isset($support->slug)
                 <li class="{{ request()->routeIs("messages.index") ? 'mm-active' : null }}"> <a
                    href="{{ url("/admin/messages/$support->slug") }}"><i class="bi bi-circle"></i>Messages</a>
                </li>
                 @endisset
                 <li class="{{ request()->routeIs('announcement.index') ? 'mm-active' : null }}"> <a
                         href="{{ route('announcement.index') }}"><i class="bi bi-circle"></i>Announcements</a>
                 </li>
             </ul>
         </li>
     </ul>
     <!--end navigation-->
 </aside>
 <!--end sidebar -->
