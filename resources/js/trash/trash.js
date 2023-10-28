<!-- Dashboard -->
<!--                        <SidebarLinkGroup v-slot="parentLink"-->
<!--                                          :activeCondition="currentRoute.fullPath === '/' || currentRoute.fullPath.includes('dashboard')">-->
<!--                            <a class="block text-slate-200 hover:text-white truncate transition duration-150"-->
<!--                               :class="(currentRoute.fullPath === '/' || currentRoute.fullPath.includes('dashboard')) && 'hover:text-slate-200'"-->
<!--                               href="#0"-->
<!--                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">-->
<!--                                <div class="flex items-center justify-between">-->
<!--                                    <div class="flex items-center">-->
<!--                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">-->
<!--                                            <path class="fill-current text-slate-400"-->
<!--                                                  :class="(currentRoute.fullPath === '/' || currentRoute.fullPath.includes('dashboard')) && '!text-indigo-500'"-->
<!--                                                  d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z"/>-->
<!--                                            <path class="fill-current text-slate-600"-->
<!--                                                  :class="(currentRoute.fullPath === '/' || currentRoute.fullPath.includes('dashboard')) && 'text-indigo-600'"-->
<!--                                                  d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z"/>-->
<!--                                            <path class="fill-current text-slate-400"-->
<!--                                                  :class="(currentRoute.fullPath === '/' || currentRoute.fullPath.includes('dashboard')) && 'text-indigo-200'"-->
<!--                                                  d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z"/>-->
<!--                                        </svg>-->
<!--                                        <span-->
<!--                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dashboard</span>-->
<!--                                    </div>-->
<!--                                    &lt;!&ndash; Icon &ndash;&gt;-->
<!--                                    <div class="flex shrink-0 ml-2">-->
<!--                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"-->
<!--                                             :class="parentLink.expanded && 'transform rotate-180'" viewBox="0 0 12 12">-->
<!--                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>-->
<!--                                        </svg>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">-->
<!--                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">-->
<!--                                    <router-link to="/dashboard" custom v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Main</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/dashboard/analytics" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Analytics</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/dashboard/fintech" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Fintech</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </SidebarLinkGroup>-->
<!--                        &lt;!&ndash; E-Commerce  &ndash;&gt;-->
<!--                        <SidebarLinkGroup v-slot="parentLink"-->
<!--                                          :activeCondition="currentRoute.fullPath.includes('ecommerce')">-->
<!--                            <a class="block text-slate-200 hover:text-white truncate transition duration-150"-->
<!--                               :class="currentRoute.fullPath.includes('ecommerce') && 'hover:text-slate-200'" href="#0"-->
<!--                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">-->
<!--                                <div class="flex items-center justify-between">-->
<!--                                    <div class="flex items-center">-->
<!--                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">-->
<!--                                            <path class="fill-current text-slate-400"-->
<!--                                                  :class="currentRoute.fullPath.includes('ecommerce') && 'text-indigo-300'"-->
<!--                                                  d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z"/>-->
<!--                                            <path class="fill-current text-slate-700"-->
<!--                                                  :class="currentRoute.fullPath.includes('ecommerce') && '!text-indigo-600'"-->
<!--                                                  d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z"/>-->
<!--                                            <path class="fill-current text-slate-600"-->
<!--                                                  :class="currentRoute.fullPath.includes('ecommerce') && 'text-indigo-500'"-->
<!--                                                  d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z"/>-->
<!--                                        </svg>-->
<!--                                        <span-->
<!--                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">E-Commerce </span>-->
<!--                                    </div>-->
<!--                                    &lt;!&ndash; Icon &ndash;&gt;-->
<!--                                    <div class="flex shrink-0 ml-2">-->
<!--                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"-->
<!--                                             :class="parentLink.expanded && 'transform rotate-180'" viewBox="0 0 12 12">-->
<!--                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>-->
<!--                                        </svg>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">-->
<!--                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">-->
<!--                                    <router-link to="/ecommerce/customers" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Customers</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/ecommerce/orders" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Orders</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/ecommerce/invoices" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Invoices</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/ecommerce/shop" custom v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Shop</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/ecommerce/shop-2" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Shop 2</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/ecommerce/product" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Single Product</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/ecommerce/cart" custom v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Cart</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/ecommerce/cart-2" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Cart 2</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/ecommerce/cart-3" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Cart 3</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/ecommerce/pay" custom v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pay</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </SidebarLinkGroup>-->
<!--                        &lt;!&ndash; Community &ndash;&gt;-->
<!--                        <SidebarLinkGroup v-slot="parentLink"-->
<!--                                          :activeCondition="currentRoute.fullPath.includes('community')">-->
<!--                            <a class="block text-slate-200 hover:text-white truncate transition duration-150"-->
<!--                               :class="currentRoute.fullPath.includes('community') && 'hover:text-slate-200'" href="#0"-->
<!--                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">-->
<!--                                <div class="flex items-center justify-between">-->
<!--                                    <div class="flex items-center">-->
<!--                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">-->
<!--                                            <path class="fill-current text-slate-600"-->
<!--                                                  :class="currentRoute.fullPath.includes('community') && 'text-indigo-500'"-->
<!--                                                  d="M18.974 8H22a2 2 0 012 2v6h-2v5a1 1 0 01-1 1h-2a1 1 0 01-1-1v-5h-2v-6a2 2 0 012-2h.974zM20 7a2 2 0 11-.001-3.999A2 2 0 0120 7zM2.974 8H6a2 2 0 012 2v6H6v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5H0v-6a2 2 0 012-2h.974zM4 7a2 2 0 11-.001-3.999A2 2 0 014 7z"/>-->
<!--                                            <path class="fill-current text-slate-400"-->
<!--                                                  :class="currentRoute.fullPath.includes('community') && 'text-indigo-300'"-->
<!--                                                  d="M12 6a3 3 0 110-6 3 3 0 010 6zm2 18h-4a1 1 0 01-1-1v-6H6v-6a3 3 0 013-3h6a3 3 0 013 3v6h-3v6a1 1 0 01-1 1z"/>-->
<!--                                        </svg>-->
<!--                                        <span-->
<!--                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Community</span>-->
<!--                                    </div>-->
<!--                                    &lt;!&ndash; Icon &ndash;&gt;-->
<!--                                    <div class="flex shrink-0 ml-2">-->
<!--                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"-->
<!--                                             :class="parentLink.expanded && 'transform rotate-180'" viewBox="0 0 12 12">-->
<!--                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>-->
<!--                                        </svg>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">-->
<!--                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">-->
<!--                                    <router-link to="/community/users-tabs" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Users - Tabs</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/community/users-tiles" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Users - Tiles</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/community/profile" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Profile</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/community/feed" custom v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Feed</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/community/forum" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Forum</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/community/forum-post" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Forum - Post</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/community/meetups" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Meetups</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/community/meetups-post" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Meetups - Post</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </SidebarLinkGroup>-->
<!--                        &lt;!&ndash; Finance &ndash;&gt;-->
<!--                        <SidebarLinkGroup v-slot="parentLink"-->
<!--                                          :activeCondition="currentRoute.fullPath.includes('finance')">-->
<!--                            <a class="block text-slate-200 hover:text-white truncate transition duration-150"-->
<!--                               :class="currentRoute.fullPath.includes('finance') && 'hover:text-slate-200'" href="#0"-->
<!--                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">-->
<!--                                <div class="flex items-center justify-between">-->
<!--                                    <div class="flex items-center">-->
<!--                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">-->
<!--                                            <path class="fill-current text-slate-400"-->
<!--                                                  :class="currentRoute.fullPath.includes('finance') && 'text-indigo-300'"-->
<!--                                                  d="M13 6.068a6.035 6.035 0 0 1 4.932 4.933H24c-.486-5.846-5.154-10.515-11-11v6.067Z"/>-->
<!--                                            <path class="fill-current text-slate-700"-->
<!--                                                  :class="currentRoute.fullPath.includes('finance') && '!text-indigo-500'"-->
<!--                                                  d="M18.007 13c-.474 2.833-2.919 5-5.864 5a5.888 5.888 0 0 1-3.694-1.304L4 20.731C6.131 22.752 8.992 24 12.143 24c6.232 0 11.35-4.851 11.857-11h-5.993Z"/>-->
<!--                                            <path class="fill-current text-slate-600"-->
<!--                                                  :class="currentRoute.fullPath.includes('finance') && 'text-indigo-600'"-->
<!--                                                  d="M6.939 15.007A5.861 5.861 0 0 1 6 11.829c0-2.937 2.167-5.376 5-5.85V0C4.85.507 0 5.614 0 11.83c0 2.695.922 5.174 2.456 7.17l4.483-3.993Z"/>-->
<!--                                        </svg>-->
<!--                                        <span-->
<!--                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Finance</span>-->
<!--                                    </div>-->
<!--                                    &lt;!&ndash; Icon &ndash;&gt;-->
<!--                                    <div class="flex shrink-0 ml-2">-->
<!--                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"-->
<!--                                             :class="parentLink.expanded && 'transform rotate-180'" viewBox="0 0 12 12">-->
<!--                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>-->
<!--                                        </svg>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">-->
<!--                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">-->
<!--                                    <router-link to="/finance/cards" custom v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Cards</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/finance/transactions" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Transactions</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/finance/transaction-details" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Transaction Details</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </SidebarLinkGroup>-->
<!--                        &lt;!&ndash; Job Board &ndash;&gt;-->
<!--                        <SidebarLinkGroup v-slot="parentLink" :activeCondition="currentRoute.fullPath.includes('job')">-->
<!--                            <a class="block text-slate-200 hover:text-white truncate transition duration-150"-->
<!--                               :class="currentRoute.fullPath.includes('job') && 'hover:text-slate-200'" href="#0"-->
<!--                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">-->
<!--                                <div class="flex items-center justify-between">-->
<!--                                    <div class="flex items-center">-->
<!--                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">-->
<!--                                            <path class="fill-current text-slate-700"-->
<!--                                                  :class="currentRoute.fullPath.includes('job') && '!text-indigo-600'"-->
<!--                                                  d="M4.418 19.612A9.092 9.092 0 0 1 2.59 17.03L.475 19.14c-.848.85-.536 2.395.743 3.673a4.413 4.413 0 0 0 1.677 1.082c.253.086.519.131.787.135.45.011.886-.16 1.208-.474L7 21.44a8.962 8.962 0 0 1-2.582-1.828Z"/>-->
<!--                                            <path class="fill-current text-slate-600"-->
<!--                                                  :class="currentRoute.fullPath.includes('job') && '!text-indigo-500'"-->
<!--                                                  d="M10.034 13.997a11.011 11.011 0 0 1-2.551-3.862L4.595 13.02a2.513 2.513 0 0 0-.4 2.645 6.668 6.668 0 0 0 1.64 2.532 5.525 5.525 0 0 0 3.643 1.824 2.1 2.1 0 0 0 1.534-.587l2.883-2.882a11.156 11.156 0 0 1-3.861-2.556Z"/>-->
<!--                                            <path class="fill-current text-slate-400"-->
<!--                                                  :class="currentRoute.fullPath.includes('job') && '!text-indigo-300'"-->
<!--                                                  d="M21.554 2.471A8.958 8.958 0 0 0 18.167.276a3.105 3.105 0 0 0-3.295.467L9.715 5.888c-1.41 1.408-.665 4.275 1.733 6.668a8.958 8.958 0 0 0 3.387 2.196c.459.157.94.24 1.425.246a2.559 2.559 0 0 0 1.87-.715l5.156-5.146c1.415-1.406.666-4.273-1.732-6.666Zm.318 5.257c-.148.147-.594.2-1.256-.018A7.037 7.037 0 0 1 18.016 6c-1.73-1.728-2.104-3.475-1.73-3.845a.671.671 0 0 1 .465-.129c.27.008.536.057.79.146a7.07 7.07 0 0 1 2.6 1.711c1.73 1.73 2.105 3.472 1.73 3.846Z"/>-->
<!--                                        </svg>-->
<!--                                        <span-->
<!--                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Job Board</span>-->
<!--                                    </div>-->
<!--                                    &lt;!&ndash; Icon &ndash;&gt;-->
<!--                                    <div class="flex shrink-0 ml-2">-->
<!--                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"-->
<!--                                             :class="parentLink.expanded && 'transform rotate-180'" viewBox="0 0 12 12">-->
<!--                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>-->
<!--                                        </svg>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">-->
<!--                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">-->
<!--                                    <router-link to="/job/job-listing" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Listing</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/job/job-post" custom v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Job Post</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/job/company-profile" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Company Profile</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </SidebarLinkGroup>-->
<!--                        &lt;!&ndash; Tasks &ndash;&gt;-->
<!--                        <SidebarLinkGroup v-slot="parentLink"-->
<!--                                          :activeCondition="currentRoute.fullPath.includes('tasks')">-->
<!--                            <a class="block text-slate-200 hover:text-white truncate transition duration-150"-->
<!--                               :class="currentRoute.fullPath.includes('tasks') && 'hover:text-slate-200'" href="#0"-->
<!--                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">-->
<!--                                <div class="flex items-center justify-between">-->
<!--                                    <div class="flex items-center">-->
<!--                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">-->
<!--                                            <path class="fill-current text-slate-600"-->
<!--                                                  :class="currentRoute.fullPath.includes('tasks') && 'text-indigo-500'"-->
<!--                                                  d="M8 1v2H3v19h18V3h-5V1h7v23H1V1z"/>-->
<!--                                            <path class="fill-current text-slate-600"-->
<!--                                                  :class="currentRoute.fullPath.includes('tasks') && 'text-indigo-500'"-->
<!--                                                  d="M1 1h22v23H1z"/>-->
<!--                                            <path class="fill-current text-slate-400"-->
<!--                                                  :class="currentRoute.fullPath.includes('tasks') && 'text-indigo-300'"-->
<!--                                                  d="M15 10.586L16.414 12 11 17.414 7.586 14 9 12.586l2 2zM5 0h14v4H5z"/>-->
<!--                                        </svg>-->
<!--                                        <span-->
<!--                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Tasks</span>-->
<!--                                    </div>-->
<!--                                    &lt;!&ndash; Icon &ndash;&gt;-->
<!--                                    <div class="flex shrink-0 ml-2">-->
<!--                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"-->
<!--                                             :class="parentLink.expanded && 'transform rotate-180'" viewBox="0 0 12 12">-->
<!--                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>-->
<!--                                        </svg>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">-->
<!--                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">-->
<!--                                    <router-link to="/tasks/kanban" custom v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Kanban</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/tasks/list" custom v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">List</span>-->
    <!--                                            </a>-->
    <!--                                        </li>-->
    <!--                                    </router-link>-->
    <!--                                </ul>-->
    <!--                            </div>-->
    <!--                        </SidebarLinkGroup>-->
<!-- Messages -->
<!-- Inbox -->
<!--                        <router-link to="/inbox" custom v-slot="{ href, navigate, isExactActive }">-->
<!--                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'">-->
<!--                                <a class="block text-slate-200 hover:text-white truncate transition duration-150"-->
<!--                                   :class="isExactActive && 'hover:text-slate-200'" :href="href" @click="navigate">-->
<!--                                    <div class="flex items-center">-->
<!--                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">-->
<!--                                            <path class="fill-current text-slate-600"-->
<!--                                                  :class="isExactActive && 'text-indigo-500'"-->
<!--                                                  d="M16 13v4H8v-4H0l3-9h18l3 9h-8Z"/>-->
<!--                                            <path class="fill-current text-slate-400"-->
<!--                                                  :class="isExactActive && 'text-indigo-300'"-->
<!--                                                  d="m23.72 12 .229.686A.984.984 0 0 1 24 13v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-8c0-.107.017-.213.051-.314L.28 12H8v4h8v-4H23.72ZM13 0v7h3l-4 5-4-5h3V0h2Z"/>-->
<!--                                        </svg>-->
<!--                                        <span-->
<!--                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Inbox</span>-->
<!--                                    </div>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                        </router-link>-->
<!--                        &lt;!&ndash; Calendar &ndash;&gt;-->
<!--                        <router-link to="/calendar" custom v-slot="{ href, navigate, isExactActive }">-->
<!--                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'">-->
<!--                                <a class="block text-slate-200 hover:text-white truncate transition duration-150"-->
<!--                                   :class="isExactActive && 'hover:text-slate-200'" :href="href" @click="navigate">-->
<!--                                    <div class="flex items-center">-->
<!--                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">-->
<!--                                            <path class="fill-current text-slate-600"-->
<!--                                                  :class="isExactActive && 'text-indigo-500'" d="M1 3h22v20H1z"/>-->
<!--                                            <path class="fill-current text-slate-400"-->
<!--                                                  :class="isExactActive && 'text-indigo-300'"-->
<!--                                                  d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z"/>-->
<!--                                        </svg>-->
<!--                                        <span-->
<!--                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Calendar</span>-->
<!--                                    </div>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                        </router-link>-->
<!--                        &lt;!&ndash; Campaigns &ndash;&gt;-->
<!--                        <router-link to="/campaigns" custom v-slot="{ href, navigate, isExactActive }">-->
<!--                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'">-->
<!--                                <a class="block text-slate-200 hover:text-white truncate transition duration-150"-->
<!--                                   :class="isExactActive && 'hover:text-slate-200'" :href="href" @click="navigate">-->
<!--                                    <div class="flex items-center">-->
<!--                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">-->
<!--                                            <path class="fill-current text-slate-600"-->
<!--                                                  :class="isExactActive && 'text-indigo-500'"-->
<!--                                                  d="M20 7a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 0120 7zM4 23a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 014 23z"/>-->
<!--                                            <path class="fill-current text-slate-400"-->
<!--                                                  :class="isExactActive && 'text-indigo-300'"-->
<!--                                                  d="M17 23a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 010-2 4 4 0 004-4 1 1 0 012 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1zM7 13a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 110-2 4 4 0 004-4 1 1 0 112 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1z"/>-->
<!--                                        </svg>-->
<!--                                        <span-->
<!--                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Campaigns</span>-->
    <!--                                    </div>-->
    <!--                                </a>-->
    <!--                            </li>-->
    <!--                        </router-link>-->
<!--                        &lt;!&ndash; Settings &ndash;&gt;-->

<!--                        &lt;!&ndash; Utility &ndash;&gt;-->
<!--                        &lt;!&ndash; Authentication &ndash;&gt;-->
<!--                        <SidebarLinkGroup v-slot="parentLink">-->
<!--                            <a class="block text-slate-200 hover:text-white truncate transition duration-150"-->
<!--                               :class="parentLink.expanded && 'hover:text-slate-200'" href="#0"-->
<!--                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">-->
<!--                                <div class="flex items-center justify-between">-->
<!--                                    <div class="flex items-center">-->
<!--                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">-->
<!--                                            <path class="fill-current text-slate-600"-->
<!--                                                  d="M8.07 16H10V8H8.07a8 8 0 110 8z"/>-->
<!--                                            <path class="fill-current text-slate-400" d="M15 12L8 6v5H0v2h8v5z"/>-->
<!--                                        </svg>-->
<!--                                        <span-->
<!--                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Authentication</span>-->
<!--                                    </div>-->
<!--                                    &lt;!&ndash; Icon &ndash;&gt;-->
<!--                                    <div class="flex shrink-0 ml-2">-->
<!--                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"-->
<!--                                             :class="parentLink.expanded && 'transform rotate-180'" viewBox="0 0 12 12">-->
<!--                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>-->
<!--                                        </svg>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">-->
<!--                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">-->
<!--                                    <router-link to="/signin" custom v-slot="{ href, navigate }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :href="href" @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Sign in</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/signup" custom v-slot="{ href, navigate }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :href="href" @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Sign up</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/reset-password" custom v-slot="{ href, navigate }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :href="href" @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Reset Password</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </SidebarLinkGroup>-->
<!--                        &lt;!&ndash; Onboarding &ndash;&gt;-->
<!--                        <SidebarLinkGroup v-slot="parentLink">-->
<!--                            <a class="block text-slate-200 hover:text-white truncate transition duration-150"-->
<!--                               :class="parentLink.expanded && 'hover:text-slate-200'" href="#0"-->
<!--                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">-->
<!--                                <div class="flex items-center justify-between">-->
<!--                                    <div class="flex items-center">-->
<!--                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">-->
<!--                                            <path class="fill-current text-slate-600"-->
<!--                                                  d="M19 5h1v14h-2V7.414L5.707 19.707 5 19H4V5h2v11.586L18.293 4.293 19 5Z"/>-->
<!--                                            <path class="fill-current text-slate-400"-->
<!--                                                  d="M5 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm14 0a4 4 0 1 1 0-8 4 4 0 0 1 0 8ZM5 23a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm14 0a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z"/>-->
<!--                                        </svg>-->
<!--                                        <span-->
<!--                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Onboarding</span>-->
<!--                                    </div>-->
<!--                                    &lt;!&ndash; Icon &ndash;&gt;-->
<!--                                    <div class="flex shrink-0 ml-2">-->
<!--                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"-->
<!--                                             :class="parentLink.expanded && 'transform rotate-180'" viewBox="0 0 12 12">-->
<!--                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>-->
<!--                                        </svg>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">-->
<!--                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">-->
<!--                                    <router-link to="/onboarding-01" custom v-slot="{ href, navigate }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :href="href" @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Step 1</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/onboarding-02" custom v-slot="{ href, navigate }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :href="href" @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Step 2</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/onboarding-03" custom v-slot="{ href, navigate }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :href="href" @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Step 3</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/onboarding-04" custom v-slot="{ href, navigate }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :href="href" @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Step 4</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </SidebarLinkGroup>-->
<!--                        &lt;!&ndash; Components  &ndash;&gt;-->
<!--                        <SidebarLinkGroup v-slot="parentLink"-->
<!--                                          :activeCondition="currentRoute.fullPath.includes('component')">-->
<!--                            <a class="block text-slate-200 hover:text-white truncate transition duration-150"-->
<!--                               :class="currentRoute.fullPath.includes('component') && 'hover:text-slate-200'" href="#0"-->
<!--                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">-->
<!--                                <div class="flex items-center justify-between">-->
<!--                                    <div class="flex items-center">-->
<!--                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">-->
<!--                                            <circle class="fill-current text-slate-600"-->
<!--                                                    :class="currentRoute.fullPath.includes('component') && 'text-indigo-500'"-->
<!--                                                    cx="16" cy="8" r="8"/>-->
<!--                                            <circle class="fill-current text-slate-400"-->
<!--                                                    :class="currentRoute.fullPath.includes('component') && 'text-indigo-300'"-->
<!--                                                    cx="8" cy="16" r="8"/>-->
<!--                                        </svg>-->
<!--                                        <span-->
<!--                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Components </span>-->
<!--                                    </div>-->
<!--                                    &lt;!&ndash; Icon &ndash;&gt;-->
<!--                                    <div class="flex shrink-0 ml-2">-->
<!--                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"-->
<!--                                             :class="parentLink.expanded && 'transform rotate-180'" viewBox="0 0 12 12">-->
<!--                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>-->
<!--                                        </svg>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">-->
<!--                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">-->
<!--                                    <router-link to="/component/button" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Button</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/component/form" custom v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Input Form</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/component/dropdown" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dropdown</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/component/alert" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Alert & Banner</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/component/modal" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Modal</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/component/pagination" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pagination</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/component/tabs" custom v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Tabs</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/component/breadcrumb" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Breadcrumb</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/component/badge" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Badge</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/component/avatar" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Avatar</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/component/tooltip" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Tooltip</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/component/accordion" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Accordion</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/component/icons" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Icons</span>-->
    <!--                                            </a>-->
    <!--                                        </li>-->
    <!--                                    </router-link>-->
    <!--                                </ul>-->
    <!--                            </div>-->
    <!--                        </SidebarLinkGroup>-->

<!--                        <SidebarLinkGroup v-slot="parentLink"-->
<!--                                          :activeCondition="currentRoute.fullPath.includes('utility')">-->
<!--                            <a class="block text-slate-200 hover:text-white truncate transition duration-150"-->
<!--                               :class="currentRoute.fullPath.includes('utility') && 'hover:text-slate-200'" href="#0"-->
<!--                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">-->
<!--                                <div class="flex items-center justify-between">-->
<!--                                    <div class="flex items-center">-->
<!--                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">-->
<!--                                            <circle class="fill-current text-slate-400"-->
<!--                                                    :class="currentRoute.fullPath.includes('utility') && 'text-indigo-300'"-->
<!--                                                    cx="18.5" cy="5.5" r="4.5"/>-->
<!--                                            <circle class="fill-current text-slate-600"-->
<!--                                                    :class="currentRoute.fullPath.includes('utility') && 'text-indigo-500'"-->
<!--                                                    cx="5.5" cy="5.5" r="4.5"/>-->
<!--                                            <circle class="fill-current text-slate-600"-->
<!--                                                    :class="currentRoute.fullPath.includes('utility') && 'text-indigo-500'"-->
<!--                                                    cx="18.5" cy="18.5" r="4.5"/>-->
<!--                                            <circle class="fill-current text-slate-400"-->
<!--                                                    :class="currentRoute.fullPath.includes('utility') && 'text-indigo-300'"-->
<!--                                                    cx="5.5" cy="18.5" r="4.5"/>-->
<!--                                        </svg>-->
<!--                                        <span-->
<!--                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Utility</span>-->
<!--                                    </div>-->
<!--                                    &lt;!&ndash; Icon &ndash;&gt;-->
<!--                                    <div class="flex shrink-0 ml-2">-->
<!--                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"-->
<!--                                             :class="parentLink.expanded && 'transform rotate-180'" viewBox="0 0 12 12">-->
<!--                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>-->
<!--                                        </svg>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">-->
<!--                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">-->
<!--                                    <router-link to="/utility/changelog" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Changelog</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/utility/roadmap" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Roadmap</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/utility/faqs" custom v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">FAQs</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/utility/empty-state" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Empty State</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/utility/404" custom v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">404</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                    <router-link to="/utility/knowledge-base" custom-->
<!--                                                 v-slot="{ href, navigate, isExactActive }">-->
<!--                                        <li class="mb-1 last:mb-0">-->
<!--                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"-->
<!--                                               :class="isExactActive && '!text-indigo-500'" :href="href"-->
<!--                                               @click="navigate">-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Knowledge Base</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </router-link>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </SidebarLinkGroup>-->
<!-- Comment -->
<li class="relative pl-9 space-y-5">
    <!-- Comment wrapper -->
<div class="flex items-start">
    <!-- Comment upvote -->
<div class="absolute top-0 left-0">
    <button
class="text-xs font-semibold text-left w-6 rounded-sm flex flex-col justify-center items-center">
    <svg class="inline-flex fill-indigo-500 mt-1.5 mb-1.5" width="12" height="6"
xmlns="http://www.w3.org/2000/svg">
    <path d="m0 6 6-6 6 6z"/>
    </svg>
    <div>27</div>
    </button>
    </div>
    <!-- Comment content -->
    <div>
    <!-- Comment text -->
<div class="grow text-sm text-slate-800 space-y-2 mb-2">
    <p>If you are a SaaS product and are looking for early adopters, AppSumo seems to be
a
great place to list on. Most of the users there seem to be early-adopters.
    Life-time
deals seem to be the norm there.</p>
</div>
<!-- Comment footer -->
<div class="flex flex-wrap text-xs">
    <div
class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
    <a class="block mr-2" href="#0">
    <img class="rounded-full" src="../../images/user-28-01.jpg" width="24"
height="24" alt="User 01"/>
    </a>
    <a class="font-medium text-indigo-500 hover:text-indigo-600"
href="#0">markcuttik</a>
    </div>
    <div
class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
    <a class="font-medium text-slate-500 hover:text-slate-600" href="#0">Reply</a>
    </div>
    <div
class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
    <a class="font-medium text-slate-500 hover:text-slate-600" href="#0">Share</a>
    </div>
    </div>
    </div>
    </div>
    </li>
    <!-- Comment -->
    <li class="relative pl-9 space-y-5">
    <!-- Comment wrapper -->
<div class="flex items-start">
    <!-- Comment upvote -->
<div class="absolute top-0 left-0">
    <button
class="text-xs font-semibold text-left w-6 rounded-sm flex flex-col justify-center items-center hover:text-indigo-500">
    <svg class="inline-flex fill-slate-400 mt-1.5 mb-1.5" width="12" height="6"
xmlns="http://www.w3.org/2000/svg">
    <path d="m0 6 6-6 6 6z"/>
    </svg>
    <div>24</div>
    </button>
    </div>
    <!-- Comment content -->
    <div>
    <!-- Comment text -->
<div class="grow text-sm text-slate-800 space-y-2 mb-2">
    <p>Thank you very much for all the people who are posting other alternatives! I will
launch my free product design course in February and I will make a notion
template
with all this information! :)</p>
</div>
<!-- Comment footer -->
<div class="flex flex-wrap text-xs">
    <div
class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
    <a class="block mr-2" href="#0">
    <img class="rounded-full" src="../../images/user-28-09.jpg" width="24"
height="24" alt="User 09"/>
    </a>
    <a class="font-medium text-indigo-500 hover:text-indigo-600"
href="#0">davidp1</a>
    </div>
    <div
class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
    <a class="font-medium text-slate-500 hover:text-slate-600" href="#0">Reply</a>
    </div>
    <div
class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
    <a class="font-medium text-slate-500 hover:text-slate-600" href="#0">Share</a>
    </div>
    </div>
    </div>
    </div>
    <!-- Nested comments -->
    <ul class="space-y-5">
    <!-- Comment -->
    <li class="relative pl-9 space-y-5">
    <!-- Comment wrapper -->
<div class="flex items-start">
    <!-- Comment upvote -->
<div class="absolute top-0 left-0">
    <button
class="text-xs font-semibold text-left w-6 rounded-sm flex flex-col justify-center items-center hover:text-indigo-500">
    <svg class="inline-flex fill-slate-400 mt-1.5 mb-1.5" width="12" height="6"
xmlns="http://www.w3.org/2000/svg">
    <path d="m0 6 6-6 6 6z"/>
    </svg>
    <div>2</div>
    </button>
    </div>
    <!-- Comment content -->
    <div>
    <!-- Comment text -->
<div class="grow text-sm text-slate-800 space-y-2 mb-2">
    <p>That sounds like an excellent idea. I'd love to take a look when you're
ready!</p>
</div>
<!-- Comment footer -->
<div class="flex flex-wrap text-xs">
    <div
class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
    <a class="block mr-2" href="#0">
    <img class="rounded-full" src="../../images/user-28-05.jpg"
width="24"
height="24" alt="User 05"/>
    </a>
    <a class="font-medium text-indigo-500 hover:text-indigo-600" href="#0">ellielong</a>
    </div>
    <div
class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
    <a class="font-medium text-slate-500 hover:text-slate-600"
href="#0">Reply</a>
    </div>
    <div
class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
    <a class="font-medium text-slate-500 hover:text-slate-600"
href="#0">Share</a>
    </div>
    </div>
    </div>
    </div>
    <!-- Nested comments -->
    <ul class="space-y-5">
    <!-- Comment -->
    <li class="relative pl-9 space-y-5">
    <!-- Comment wrapper -->
<div class="flex items-start">
    <!-- Comment upvote -->
<div class="absolute top-0 left-0">
    <button
class="text-xs font-semibold text-left w-6 rounded-sm flex flex-col justify-center items-center hover:text-indigo-500">
    <svg class="inline-flex fill-slate-400 mt-1.5 mb-1.5" width="12"
height="6" xmlns="http://www.w3.org/2000/svg">
    <path d="m0 6 6-6 6 6z"/>
    </svg>
    <div>1</div>
    </button>
    </div>
    <!-- Comment content -->
    <div>
    <!-- Comment text -->
<div class="grow text-sm text-slate-800 space-y-2 mb-2">
    <p>Expect it! 👊</p>
</div>
<!-- Comment footer -->
<div class="flex flex-wrap text-xs">
    <div
class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
    <a class="block mr-2" href="#0">
    <img class="rounded-full" src="../../images/user-28-09.jpg"
width="24" height="24" alt="User 09"/>
    </a>
    <a class="font-medium text-indigo-500 hover:text-indigo-600"
href="#0">davidp1</a>
    </div>
    <div
class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
    <a class="font-medium text-slate-500 hover:text-slate-600"
href="#0">Reply</a>
    </div>
    <div
class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
    <a class="font-medium text-slate-500 hover:text-slate-600"
href="#0">Share</a>
    </div>
    </div>
    </div>
    </div>
    </li>
    </ul>
    </li>
    </ul>
    </li>
    <!-- Comment -->
    <li class="relative pl-9 space-y-5">
    <!-- Comment wrapper -->
<div class="flex items-start">
    <!-- Comment upvote -->
<div class="absolute top-0 left-0">
    <button
class="text-xs font-semibold text-left w-6 rounded-sm flex flex-col justify-center items-center hover:text-indigo-500">
    <svg class="inline-flex fill-slate-400 mt-1.5 mb-1.5" width="12" height="6"
xmlns="http://www.w3.org/2000/svg">
    <path d="m0 6 6-6 6 6z"/>
    </svg>
    <div>19</div>
    </button>
    </div>
    <!-- Comment content -->
    <div>
    <!-- Comment text -->
<div class="grow text-sm text-slate-800 space-y-2 mb-2">
    <p>Social Media (channels based on your target audience), and Slack channels</p>
</div>
<!-- Comment footer -->
<div class="flex flex-wrap text-xs">
    <div
class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
    <a class="block mr-2" href="#0">
    <img class="rounded-full" src="../../images/user-28-10.jpg" width="24"
height="24" alt="User 10"/>
    </a>
    <a class="font-medium text-indigo-500 hover:text-indigo-600"
href="#0">patrick2</a>
    </div>
    <div
class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
    <a class="font-medium text-slate-500 hover:text-slate-600" href="#0">Reply</a>
    </div>
    <div
class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-slate-400 after:px-2">
    <a class="font-medium text-slate-500 hover:text-slate-600" href="#0">Share</a>
    </div>
    </div>
    </div>
    </div>
    </li>


    <!-- Chat msg -->
    <!--            <div class="flex items-start mb-4 last:mb-0">-->
    <!--                <img class="rounded-full mr-4" src="../../images/user-40-11.jpg" width="40" height="40" alt="User 01"/>-->
    <!--                <div>-->
    <!--                    <div-->
    <!--                        class="text-sm bg-white text-slate-800 p-3 rounded-lg rounded-tl-none border border-slate-200 shadow-md mb-1">-->
    <!--                        Can anyone help? I have a question about Acme Professional-->
    <!--                    </div>-->
    <!--                    <div class="flex items-center justify-between">-->
    <!--                        <div class="text-xs text-slate-500 font-medium">2:40 PM</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            &lt;!&ndash; Chat msg &ndash;&gt;-->
<!--            <div class="flex items-start mb-4 last:mb-0">-->
<!--                <img class="rounded-full mr-4" src="../../images/user-40-12.jpg" width="40" height="40" alt="User 02"/>-->
<!--                <div>-->
<!--                    <div-->
<!--                        class="text-sm bg-indigo-500 text-white p-3 rounded-lg rounded-tl-none border border-transparent shadow-md mb-1">-->
<!--                        Hey Dominik Lamakani 👋<br/>-->
<!--                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim-->
<!--                        id-->
<!--                        est 🙌-->
<!--                    </div>-->
<!--                    <div class="flex items-center justify-between">-->
<!--                        <div class="text-xs text-slate-500 font-medium">2:40 PM</div>-->
<!--                        <svg class="w-5 h-3 shrink-0 fill-current text-emerald-500" viewBox="0 0 20 12">-->
<!--                            <path-->
<!--                                d="M10.402 6.988l1.586 1.586L18.28 2.28a1 1 0 011.414 1.414l-7 7a1 1 0 01-1.414 0L8.988 8.402l-2.293 2.293a1 1 0 01-1.414 0l-3-3A1 1 0 013.695 6.28l2.293 2.293L12.28 2.28a1 1 0 011.414 1.414l-3.293 3.293z"/>-->
<!--                        </svg>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            &lt;!&ndash; Chat msg &ndash;&gt;-->
<!--            <div class="flex items-start mb-4 last:mb-0">-->
<!--                <img class="rounded-full mr-4" src="../../images/user-40-11.jpg" width="40" height="40" alt="User 01"/>-->
<!--                <div>-->
<!--                    <div class="flex items-center">-->
<!--                        <img class="rounded-lg shadow-md mb-1" src="../../images/chat-image.jpg" width="240"-->
<!--                             height="180"-->
<!--                             alt="Chat"/>-->
<!--                        <button-->
<!--                            class="p-1.5 rounded-full border border-slate-200 ml-4 hover:bg-white transition duration-150">-->
<!--                            <span class="sr-only">Download</span>-->
    <!--                            <svg class="w-4 h-4 shrink-0 fill-current text-slate-400" viewBox="0 0 16 16">-->
    <!--                                <path-->
    <!--                                    d="M15 15H1a1 1 0 01-1-1V2a1 1 0 011-1h4v2H2v10h12V3h-3V1h4a1 1 0 011 1v12a1 1 0 01-1 1zM9 7h3l-4 4-4-4h3V1h2v6z"/>-->
    <!--                            </svg>-->
    <!--                        </button>-->
    <!--                    </div>-->
    <!--                    <div class="flex items-center justify-between">-->
    <!--                        <div class="text-xs text-slate-500 font-medium">2:48 PM</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            &lt;!&ndash; Chat msg &ndash;&gt;-->
<!--            <div class="flex items-start mb-4 last:mb-0">-->
<!--                <img class="rounded-full mr-4" src="../../images/user-40-11.jpg" width="40" height="40" alt="User 01"/>-->
<!--                <div>-->
<!--                    <div-->
<!--                        class="text-sm bg-white text-slate-800 p-3 rounded-lg rounded-tl-none border border-slate-200 shadow-md mb-1">-->
<!--                        What do you think? Duis aute irure dolor in reprehenderit 🔥-->
<!--                    </div>-->
<!--                    <div class="flex items-center justify-between">-->
<!--                        <div class="text-xs text-slate-500 font-medium">2:48 PM</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            &lt;!&ndash; Chat msg &ndash;&gt;-->
<!--            <div class="flex items-start mb-4 last:mb-0">-->
<!--                <img class="rounded-full mr-4" src="../../images/user-40-12.jpg" width="40" height="40" alt="User 02"/>-->
<!--                <div>-->
<!--                    <div-->
<!--                        class="text-sm bg-indigo-500 text-white p-3 rounded-lg rounded-tl-none border border-transparent shadow-md mb-1">-->
<!--                        Sed euismod nisi porta lorem mollis. Tellus elementum sagittis vitae et leo duis. Viverra justo-->
<!--                        nec-->
<!--                        ultrices dui.<br/>-->
<!--                        Sed lectus vestibulum mattis ullamcorper velit sed. Ut sem nulla pharetra diam sit amet 🎁-->
<!--                    </div>-->
<!--                    <div class="flex items-center justify-between">-->
<!--                        <div class="text-xs text-slate-500 font-medium">2:55 PM</div>-->
<!--                        <svg class="w-3 h-3 shrink-0 fill-current text-slate-400" viewBox="0 0 12 12">-->
<!--                            <path-->
<!--                                d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z"/>-->
<!--                        </svg>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            &lt;!&ndash; Date separator &ndash;&gt;-->
<!--            <div class="flex justify-center">-->
<!--                <div-->
<!--                    class="inline-flex items-center justify-center text-xs font-medium px-2.5 py-1 bg-white border border-slate-200 rounded-full my-5">-->
<!--                    Tuesday, 20 January-->
<!--                </div>-->
<!--            </div>-->
<!--            &lt;!&ndash; Chat msg &ndash;&gt;-->
<!--            <div class="flex items-start mb-4 last:mb-0">-->
<!--                <img class="rounded-full mr-4" src="../../images/user-40-12.jpg" width="40" height="40" alt="User 02"/>-->
<!--                <div>-->
<!--                    <div-->
<!--                        class="text-sm bg-indigo-500 text-white p-3 rounded-lg rounded-tl-none border border-transparent shadow-md mb-1">-->
<!--                        Can you join <a class="font-medium" href="#0">@dominik</a>? <a class="underline" href="#0">https://meet.google.com/haz-r3gt-idj</a>-->
<!--                    </div>-->
<!--                    <div class="flex items-center justify-between">-->
<!--                        <div class="text-xs text-slate-500 font-medium">10:15 AM</div>-->
<!--                        <svg class="w-3 h-3 shrink-0 fill-current text-slate-400" viewBox="0 0 12 12">-->
<!--                            <path-->
<!--                                d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z"/>-->
<!--                        </svg>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            &lt;!&ndash; Chat msg &ndash;&gt;-->
<!--            <div class="flex items-start mb-4 last:mb-0">-->
<!--                <img class="rounded-full mr-4" src="../../images/user-40-11.jpg" width="40" height="40" alt="User 01"/>-->
<!--                <div>-->
<!--                    <div-->
<!--                        class="text-sm bg-white text-slate-800 p-3 rounded-lg rounded-tl-none border border-slate-200 shadow-md mb-1">-->
<!--                        <svg class="fill-current text-slate-400" viewBox="0 0 15 3" width="15" height="3">-->
<!--                            <circle cx="1.5" cy="1.5" r="1.5">-->
<!--                                <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite"-->
<!--                                         begin="0.1"/>-->
<!--                            </circle>-->
<!--                            <circle cx="7.5" cy="1.5" r="1.5">-->
<!--                                <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite"-->
<!--                                         begin="0.2"/>-->
<!--                            </circle>-->
<!--                            <circle cx="13.5" cy="1.5" r="1.5">-->
<!--                                <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite"-->
<!--                                         begin="0.3"/>-->
<!--                            </circle>-->
<!--                        </svg>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!-- Chat msg -->
