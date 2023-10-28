<template>
    <div v-if="!is_embed ">
        <div v-if="authenticate">
            <!-- Sidebar backdrop (mobile only) -->
            <div
                class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
                :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true"></div>

            <!-- Sidebar -->

            <!--lg:sidebar-expanded:!w-64 2xl:!w-64-->
            <div
                id="sidebar"
                ref="sidebar"
                class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 transform h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 sm:sidebar-expanded  shrink-0 bg-slate-800 p-4 transition-all duration-200 ease-in-out"
                :class="compactClass"

            >

                <!-- Sidebar header -->
                <div class="flex justify-between mb-5 pr-3 sm:px-2">
                    <!-- Close button -->
                    <button
                        ref="trigger"
                        class="lg:hidden text-slate-500 hover:text-slate-400"
                        @click.stop="$emit('close-sidebar')"
                        aria-controls="sidebar"
                        :aria-expanded="sidebarOpen"
                    >
                        <span class="sr-only">Close sidebar</span>
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"/>
                        </svg>
                    </button>
                    <!-- Logo -->
                    <div class="current-community w-full">
                        <div class="flex items-center justify-between">
                            <img src="/images/brand-logo.png"  class="mr-2" alt="" width="30" height="30">

                            <div class="grow flex items-center text-white" v-if="$store.state.auth.authenticated">

                                <img :src="user.current_community.avatar_url" alt="" height="24" width="24">
                                <span
                                    class="text-sm font-medium ml-3 duration-200"
                                    :class="sidebarExpanded?'block':'hidden'">{{ user.current_community.name }}</span>
                            </div>
                            <!-- Badge -->
                            <div class="flex ml-2" :class="sidebarExpanded?'block':'hidden'">
                                <button class="rounded px-2 py-1 bg-indigo-500 hover:bg-indigo-600 text-white"
                                        @click.stop="communityModalOpen = true">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="icon icon-tabler icon-tabler-circle-plus"
                                         width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff"
                                         fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <circle cx="12" cy="12" r="9"/>
                                        <line x1="9" y1="12" x2="15" y2="12"/>
                                        <line x1="12" y1="9" x2="12" y2="15"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>


                <!-- Links -->
                <div class="space-y-8">
                    <ul class="mt-3">
                        <router-link to="/community_browse" custom v-slot="{ href, navigate, isExactActive }">
                            <li class="px-3 py-2 rounded-sm mb-0.5" :class="isExactActive && 'bg-slate-900'">
                                <a class="block text-slate-200 hover:text-white truncate transition duration-150"
                                   :class="isExactActive && 'hover:text-slate-200'" :href="href" @click="navigate">
                                    <div class="flex items-center justify-between">
                                        <div class="grow flex items-center">
                                            <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                <path class="fill-current text-slate-600"
                                                      d="M8.07 16H10V8H8.07a8 8 0 110 8z"/>
                                                <path class="fill-current text-slate-400" d="M15 12L8 6v5H0v2h8v5z"/>
                                            </svg>
                                            <span
                                                class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                Explore Communities
                                            </span>
                                        </div>

                                    </div>
                                </a>
                            </li>
                        </router-link>
                    </ul>
                    <!-- Pages group -->
                    <div>
                        <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">

                                 <span class=" text-center w-6"
                                       :class="!sidebarExpanded?'block':'hidden'"
                                       aria-hidden="true">•••</span>

                            <span class=" text-center w-6"
                                  :class="sidebarExpanded?'block':'hidden'">Communities</span>
                        </h3>
                        <ul class="mt-3">

                        <span v-for="community in communities">


                        <router-link :to="{ name: getRouteName(community),params:{id:community.slug}}"
                            custom v-slot="{ href, navigate, isExactActive }">
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" :class="isExactActive && 'bg-slate-900'"
                                @click="onCommunityChange(community)">
                                <a class="block text-slate-200 hover:text-white truncate transition duration-150"
                                   :class="isExactActive && 'hover:text-slate-200'" :href="href" @click="navigate">
                                    <div class="flex items-center justify-between">
                                        <div class="grow flex items-center">
                                            <img :src="community.avatar_url" alt="" height="24" width="24">
                                            <span
                                                class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ community.name }}</span>
                                        </div>
                                        <!-- Badge -->
                                        <div class="flex flex-shrink-0 ml-2" v-if="community.unread > 0">
                                            <span
                                                class="inline-flex items-center justify-center h-5 text-xs font-medium text-white bg-indigo-500 px-2 rounded">{{ community.unread }}</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </router-link>


                        </span>

                        </ul>
                    </div>
                    <!-- More group -->
                    <div>
                        <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">

                          <span class=" text-center w-6"
                                :class="!sidebarExpanded?'block':'hidden'"
                                aria-hidden="true">•••</span>

                            <span :class="sidebarExpanded?'block':'hidden'">More</span>
                        </h3>
                        <ul class="mt-3">

                            <router-link to="/settings/apps" custom v-slot="{ href, navigate, isExactActive }">
                                <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0"
                                    :class="isExactActive && 'bg-slate-900'">
                                    <a class="block text-slate-200 hover:text-white truncate transition duration-150"
                                       :class="isExactActive && 'hover:text-slate-200'" :href="href" @click="navigate">
                                        <div class="flex items-center">
                                            <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                <path class="fill-current text-slate-600"
                                                      :class="isExactActive && 'text-indigo-500'"
                                                      d="M20 7a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 0120 7zM4 23a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 014 23z"/>
                                                <path class="fill-current text-slate-400"
                                                      :class="isExactActive && 'text-indigo-300'"
                                                      d="M17 23a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 010-2 4 4 0 004-4 1 1 0 012 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1zM7 13a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 110-2 4 4 0 004-4 1 1 0 112 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1z"/>
                                            </svg>
                                            <span
                                                class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Apps</span>
                                        </div>
                                    </a>
                                </li>
                            </router-link>
                            <SidebarLinkGroup v-slot="parentLink"
                                              :activeCondition="currentRoute.fullPath.includes('settings')">
                                <a class="block text-slate-200 hover:text-white truncate transition duration-150"
                                   :class="currentRoute.fullPath.includes('settings') && 'hover:text-slate-200'"
                                   href="#0"
                                   @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                <path class="fill-current text-slate-600"
                                                      :class="currentRoute.fullPath.includes('settings') && 'text-indigo-500'"
                                                      d="M19.714 14.7l-7.007 7.007-1.414-1.414 7.007-7.007c-.195-.4-.298-.84-.3-1.286a3 3 0 113 3 2.969 2.969 0 01-1.286-.3z"/>
                                                <path class="fill-current text-slate-400"
                                                      :class="currentRoute.fullPath.includes('settings') && 'text-indigo-300'"
                                                      d="M10.714 18.3c.4-.195.84-.298 1.286-.3a3 3 0 11-3 3c.002-.446.105-.885.3-1.286l-6.007-6.007 1.414-1.414 6.007 6.007z"/>
                                                <path class="fill-current text-slate-600"
                                                      :class="currentRoute.fullPath.includes('settings') && 'text-indigo-500'"
                                                      d="M5.7 10.714c.195.4.298.84.3 1.286a3 3 0 11-3-3c.446.002.885.105 1.286.3l7.007-7.007 1.414 1.414L5.7 10.714z"/>
                                                <path class="fill-current text-slate-400"
                                                      :class="currentRoute.fullPath.includes('settings') && 'text-indigo-300'"
                                                      d="M19.707 9.292a3.012 3.012 0 00-1.415 1.415L13.286 5.7c-.4.195-.84.298-1.286.3a3 3 0 113-3 2.969 2.969 0 01-.3 1.286l5.007 5.006z"/>
                                            </svg>
                                            <span
                                                class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Settings</span>
                                        </div>
                                        <!-- Icon -->
                                        <div class="flex shrink-0 ml-2">
                                            <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                                 :class="parentLink.expanded && 'transform rotate-180'"
                                                 viewBox="0 0 12 12">
                                                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                                <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                    <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">
                                        <router-link :to="{ name: 'settingsAccount'}" custom
                                                     v-slot="{ href, navigate, isExactActive }">
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"
                                                   :class="isExactActive && '!text-indigo-500'" :href="href"
                                                   @click="navigate">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">My Account</span>
                                                </a>
                                            </li>
                                        </router-link>
                                        <router-link to="/settings/notifications" custom
                                                     v-slot="{ href, navigate, isExactActive }">
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"
                                                   :class="isExactActive && '!text-indigo-500'" :href="href"
                                                   @click="navigate">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">My Notifications</span>
                                                </a>
                                            </li>
                                        </router-link>
                                        <router-link to="/settings/apps" custom
                                                     v-slot="{ href, navigate, isExactActive }">
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"
                                                   :class="isExactActive && '!text-indigo-500'" :href="href"
                                                   @click="navigate">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Connected Apps</span>
                                                </a>
                                            </li>
                                        </router-link>
                                        <router-link to="/settings/plans" custom
                                                     v-slot="{ href, navigate, isExactActive }">
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"
                                                   :class="isExactActive && '!text-indigo-500'" :href="href"
                                                   @click="navigate">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100
                                                     2xl:opacity-100 duration-200">Plans</span>
                                                </a>
                                            </li>
                                        </router-link>
                                        <router-link to="/settings/billing" custom
                                                     v-slot="{ href, navigate, isExactActive }">
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"
                                                   :class="isExactActive && '!text-indigo-500'" :href="href"
                                                   @click="navigate">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Billing & Invoices</span>
                                                </a>
                                            </li>
                                        </router-link>
                                        <router-link to="/settings/feedback" custom
                                                     v-slot="{ href, navigate, isExactActive }">
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"
                                                   :class="isExactActive && '!text-indigo-500'" :href="href"
                                                   @click="navigate">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Give Feedback</span>
                                                </a>
                                            </li>
                                        </router-link>
                                    </ul>
                                </div>
                            </SidebarLinkGroup>

                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                        <span class=" text-center w-6"
                              :class="!sidebarExpanded?'block':'hidden'"
                              aria-hidden="true">•••</span>
                            <span :class="sidebarExpanded?'block':'hidden'">Help</span>
                        </h3>
                        <ul class="mt-3">

                            <router-link to="/index/resources" custom v-slot="{ href, navigate, isExactActive }">
                                <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0"
                                    :class="isExactActive && 'bg-slate-900'">
                                    <a class="block text-slate-200 hover:text-white truncate transition duration-150"
                                       :class="isExactActive && 'hover:text-slate-200'" :href="href" @click="navigate">
                                        <div class="flex items-center justify-between">
                                            <div class="grow flex items-center">
                                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                    <path class="fill-current text-slate-600"
                                                          d="M8.07 16H10V8H8.07a8 8 0 110 8z"/>
                                                    <path class="fill-current text-slate-400"
                                                          d="M15 12L8 6v5H0v2h8v5z"/>
                                                </svg>
                                                <span
                                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Resources</span>
                                            </div>

                                        </div>
                                    </a>
                                </li>
                            </router-link>

                            <router-link to="/index/change-log" custom v-slot="{ href, navigate, isExactActive }">
                                <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0"
                                    :class="isExactActive && 'bg-slate-900'">
                                    <a class="block text-slate-200 hover:text-white truncate transition duration-150"
                                       :class="isExactActive && 'hover:text-slate-200'" :href="href" @click="navigate">
                                        <div class="flex items-center justify-between">
                                            <div class="grow flex items-center">
                                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                    <circle class="fill-current text-slate-400"
                                                            :class="currentRoute.fullPath.includes('utility') && 'text-indigo-300'"
                                                            cx="18.5" cy="5.5" r="4.5"/>
                                                    <circle class="fill-current text-slate-600"
                                                            :class="currentRoute.fullPath.includes('utility') && 'text-indigo-500'"
                                                            cx="5.5" cy="5.5" r="4.5"/>
                                                    <circle class="fill-current text-slate-600"
                                                            :class="currentRoute.fullPath.includes('utility') && 'text-indigo-500'"
                                                            cx="18.5" cy="18.5" r="4.5"/>
                                                    <circle class="fill-current text-slate-400"
                                                            :class="currentRoute.fullPath.includes('utility') && 'text-indigo-300'"
                                                            cx="5.5" cy="18.5" r="4.5"/>
                                                </svg>
                                                <span
                                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Changelog</span>
                                            </div>

                                        </div>
                                    </a>
                                </li>
                            </router-link>
<!--                            <router-link to="/get-support" custom v-slot="{ href, navigate, isExactActive }">-->
<!--                                <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0"-->
<!--                                    :class="isExactActive && 'bg-slate-900'">-->
<!--                                    <a class="block text-slate-200 hover:text-white truncate transition duration-150"-->
<!--                                       :class="isExactActive && 'hover:text-slate-200'" :href="href" @click="navigate">-->
<!--                                        <div class="flex items-center justify-between">-->
<!--                                            <div class="grow flex items-center">-->
<!--                                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">-->
<!--                                                    <circle class="fill-current text-slate-600"-->
<!--                                                            :class="currentRoute.fullPath.includes('support') && 'text-indigo-500'"-->
<!--                                                            cx="16" cy="8" r="8"/>-->
<!--                                                    <circle class="fill-current text-slate-400"-->
<!--                                                            :class="currentRoute.fullPath.includes('support') && 'text-indigo-300'"-->
<!--                                                            cx="8" cy="16" r="8"/>-->
<!--                                                </svg>-->
<!--                                                <span-->
<!--                                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Get Support</span>-->
<!--                                            </div>-->

<!--                                        </div>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                            </router-link>-->

                        </ul>
                    </div>
                </div>

                <!-- Expand / collapse button -->
                <div class="pt-3 hidden lg:inline-flex justify-end mt-auto">
                    <div class="px-3 py-2">
                        <button @click.prevent="sidebarExpanded = !sidebarExpanded">
                            <span class="sr-only">Expand / collapse sidebar</span>

                            <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                                <path class="text-slate-400"
                                      d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z"/>
                                <path class="text-slate-600" d="M3 23H1V1h2z"/>
                            </svg>

                        </button>
                    </div>
                </div>

            </div>

            <ModalBasic id="community-modal" :modalOpen="communityModalOpen" @close-modal="communityModalOpen = false"
                        title="Create Community">
                <!-- Modal content -->
                <div class="px-5 py-4">
                    <div class="text-sm">
                        <div class="font-medium text-slate-800 mb-3">Create a community and share fun.</div>
                    </div>
                    <div class="space-y-3">
                        <section>
                            <div class="flex items-center flex-col justify-center">
                                <div class="mr-4">
                                    <img class="w-20 h-20 rounded-full" :src="community_logo"
                                         width="80" height="80" alt="User upload"/>
                                </div>
                                <button onclick="document.getElementById('pickCommunityLogoButton').click()"
                                        class="btn-sm mt-2 bg-indigo-500 hover:bg-indigo-600 text-white">Pick
                                    Community Logo
                                </button>

                                <input id="pickCommunityLogoButton" hidden type="file" accept="image/*"
                                       @change="onCommunityLogoPick"
                                       class="form-control-file">
                            </div>

                            <span v-for="error of v$.community.logo.$errors" :key="error.$uid">
                                                <div class="text-xs mt-1 text-rose-500">LOGO is required</div>
                                            </span>
                        </section>
                        <div>
                            <label class="block text-sm font-medium mb-1" for="name">Community Name <span
                                class="text-rose-500">*</span></label>
                            <input id="name" v-model="community.name" class="form-input w-full px-2 py-1" type="text"/>

                            <span v-for="error of v$.community.name.$errors" :key="error.$uid">
                                                <div class="text-xs mt-1 text-rose-500">{{ error.$message }}</div>
                                            </span>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1" for="feedback">Description </label>
                            <textarea v-model="community.description" id="feedback"
                                      class="form-textarea w-full px-2 py-1"
                                      rows="4"></textarea>
                            <span v-for="error of v$.community.description.$errors" :key="error.$uid">
                                                <div class="text-xs mt-1 text-rose-500">{{ error.$message }}</div>
                                            </span>
                        </div>

                        <div class="flex items-center justify-between gap-1">
                            <section class="mr-4">
                                <h3 class="text-sm leading-snug text-slate-800 font-bold mb-1 mt-4">Community Style</h3>

                                <div class=" -m-3 mt-4">
                                    <div class=" m-3"><!-- Start -->
                                        <label class="flex items-center">
                                            <input type="radio" name="radio-buttons" v-model="community.style"
                                                   value="slack"
                                                   class="form-radio h-5 w-5"><span
                                            class="text-sm text-slate-800 italic ml-2">Chat Style</span>
                                        </label><!-- End --></div>
                                    <div class="m-3"><!-- Start -->
                                        <label class="flex items-center"><input
                                            type="radio" name="radio-buttons" v-model="community.style" value="facebook"
                                            class="form-radio h-5 w-5"><span
                                            class="text-sm text-slate-800 italic ml-2">Facebook Style</span>
                                        </label><!-- End -->
                                    </div>
                                    <div class="m-3"><!-- Start -->
                                        <label class="flex items-center">
                                            <input
                                                type="radio" name="radio-buttons" v-model="community.style"
                                                value="reddit"
                                                class="form-radio h-5 w-5"><span
                                            class="text-sm text-slate-800 italic ml-2">Slack Style</span>
                                        </label><!-- End -->
                                    </div>

                                </div>
                            </section>
                            <section class="ml-4">
                                <h3 class="text-sm leading-snug text-slate-800 font-bold mb-1 mt-4">Brand Color</h3>

                                <div class="flex flex-wrap items-center -m-3 mt-1 ">
                                    <div class="border flex gap-6 items-center m-3 p-1.5 rounded"><!-- Start -->
                                        <span class=" mr-2 text-slate-800">Choose HEX</span>
                                        <label class="flex items-center">
                                            <input type="color" name="radio-buttons" v-model="community.color"
                                                   class=" h-10 w-10">
                                        </label><!-- End --></div>


                                </div>
                            </section>
                        </div>

                    </div>
                </div>
                <!-- Modal footer -->
                <div class="px-5 py-4 border-t border-slate-200">
                    <div class="flex flex-wrap justify-end space-x-2">
                        <button class="btn-sm border-slate-200 hover:border-slate-300 text-slate-600"
                                @click.stop="communityModalOpen = false">Cancel
                        </button>
                        <button class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white"
                                @click="onCommunityFormSubmit">
                            Send
                        </button>
                    </div>
                </div>
            </ModalBasic>

        </div>

    </div>
</template>

<script>
    import {ref, onMounted, onUnmounted, watch} from 'vue'
    import {useRouter} from 'vue-router'
    import {computed} from 'vue'
    import ModalBasic from '../components/ModalBasic'

    import useVuelidate from '@vuelidate/core'
    import {required, email} from '@vuelidate/validators'
    import SidebarLinkGroup from './SidebarLinkGroup.vue'
    import {mapState, useStore} from 'vuex'
    import community from "../store/community";
    import {notification} from 'ant-design-vue';
    import router from "../router";

    export default {
        name: 'Sidebar',
        props: ['sidebarOpen'],
        components: {
            SidebarLinkGroup,
            ModalBasic
        },
        setup(props, {emit, context}) {
            const store = useStore()

            const trigger = ref(null)
            const communityModalOpen = ref(false)
            const sidebar = ref(null)
            const community_logo = ref("images/user-avatar-80.png")
            let community_logo_file = null;
            // const communities = store.community.state.communities
            // const communities = context.root.$store.community.state.communities

            const storedSidebarExpanded = localStorage.getItem('sidebar-expanded')
            const sidebarExpanded = ref(storedSidebarExpanded === null ? false : storedSidebarExpanded === 'true')

            const currentRoute = useRouter().currentRoute.value

            const onCommunityLogoPick = (event) => {
                // alert('test is working')
                store.commit('community/SET_COMMUNITY_LOGO_FILE', event.target.files[0]);
                var input = event.target;
                if (input.files) {
                    var reader = new FileReader();
                    reader.onload = (e) => {
                        community_logo.value = e.target.result;
                    }
                    // this.image = input.files[0];
                    reader.readAsDataURL(input.files[0]);
                }
            };

            // close on click outside
            const clickHandler = ({target}) => {
                if (!sidebar.value || !trigger.value) return
                if (
                    !props.sidebarOpen ||
                    sidebar.value.contains(target) ||
                    trigger.value.contains(target)
                ) return
                emit('close-sidebar')
            }

            // close if the esc key is pressed
            const keyHandler = ({keyCode}) => {
                if (!props.sidebarOpen || keyCode !== 27) return
                emit('close-sidebar')
            }

            onMounted(() => {
                document.addEventListener('click', clickHandler)
                document.addEventListener('keydown', keyHandler)
            })

            onUnmounted(() => {
                document.removeEventListener('click', clickHandler)
                document.removeEventListener('keydown', keyHandler)
            })

            watch(sidebarExpanded, () => {
                localStorage.setItem('sidebar-expanded', sidebarExpanded.value)

                console.log('SidebarExpanded Value', sidebarExpanded)
                if (sidebarExpanded.value) {
                    document.querySelector('body').classList.add('sidebar-expanded')
                } else {
                    document.querySelector('body').classList.remove('sidebar-expanded')
                }
            })
            // console.info(store.state.community.communities, 'issue')
            return {
                trigger,
                sidebar,
                sidebarExpanded,
                currentRoute,
                communities: computed(() => store.state.community.communities),
                communityModalOpen,
                onCommunityLogoPick,
                community_logo,
                v$: useVuelidate()

            }
        },
        data() {
            return {
                community: {
                    name: null,
                    logo: null,
                    style: 'facebook',
                    color: '#6366F1',
                    description: undefined

                }
            }
        },
        validations() {
            return {
                community: {
                    name: {required},
                    logo: {required},
                    description: {}

                }
            }
        },
        methods: {
            getRouteName(community){
                if (community.style == 'reddit'){
                    return 'ForumPostContainer'
                }
                else{
                    return 'CommunityPost'
                }
            },
            onCommunityFormSubmit() {
                // this.v$.$validate()
                console.log(this)
                this.community.logo = this.$store.state.community.community_logo_file;
                this.community.avatar = this.$store.state.community.community_logo_file;
                this.v$.$touch()

                if (!this.v$.$invalid) {

                    var form_data = new FormData();
                    for (let key in this.community) {
                        form_data.append(key, this.community[key]);
                    }


                    this.$store.dispatch('community/addCommunity', form_data).then((response) => {
                        this.communityModalOpen = false
                        this.community = {
                            name: null,
                            logo: null,
                            description: null

                        };
                        this.community_logo = "images/user-avatar-80.png";
                        notification['success']({
                            message: 'Community Created!!',
                            description: "You have created a new community. Explore it."
                        });

                        // this.$store.dispatch('community/loadCommunities')
                    }).catch((error) => {
                        notification['error']({
                            message: 'Server Error',
                            description: error.message
                        });
                    })

                }

            },
            onCommunityChange(community) {
                // alert('testing works')
                this.$store.commit('auth/UPDATE_CURRENT_COMMUNITY', community)
            },
            isMobile() {
                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    return true
                } else {
                    return false
                }
            }

        },

        computed: {
            user() {
                return this.$store.state.auth.user;
            },
            authenticate() {
                return this.$store.state.auth.authenticated;
            },
            compactClass() {
                if (this.isMobile()) {
                    return this.sidebarOpen ? 'translate-x-0 lg:sidebar-expanded:!w-64 2xl:!w-64' : '-translate-x-64'

                } else {
                    return this.sidebarExpanded ? 'translate-x-0 lg:sidebar-expanded:!w-64 2xl:!w-64' : '-translate-x-64'

                }
            },
            is_embed() {
                return this.$store.state.auth.is_embed;
            }
        },
        mounted() {

            if (this.$route.params.id === '') {
                const current_community_id = this.user.current_community_id;
                router.push({name: 'dashboard', params: {id: current_community_id}})

            }
        }


    }
</script>
