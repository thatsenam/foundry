<template>
    <div class="grow flex flex-col md:translate-x-0 transform transition-transform duration-300 ease-in-out ml-4"
         :class="profileSidebarOpen ? 'translate-x-1/3' : 'translate-x-0'">

        <!-- Profile background -->
        <div class="relative h-56 bg-slate-200">
            <img class="object-cover h-full w-full" src="../../images/profile-bg.jpg" width="979" height="220"
                 alt="Profile background"/>
            <!-- Close button -->
            <button
                class="md:hidden absolute top-4 left-4 sm:left-6 text-white opacity-80 hover:opacity-100"
                @click.stop="$emit('toggle-profilesidebar')"
                aria-controls="profile-sidebar"
                :aria-expanded="profileSidebarOpen"
            >
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"/>
                </svg>
            </button>
        </div>

        <!-- Content -->
        <div class="relative px-4 sm:px-6 pb-8">

            <!-- Pre-header -->
            <div class="-mt-16 mb-6 sm:mb-3">

                <div class="flex flex-col items-center sm:flex-row sm:justify-between sm:items-end">

                    <!-- Avatar -->
                    <div class="inline-flex -ml-1 -mt-1 mb-4 sm:mb-0">
                        <img class="rounded-full border-4 border-white " :src="user.avatar_url" width="128" height="128"
                             alt="Avatar"/>
                    </div>

                    <!-- Actions -->
                    <div class="flex space-x-2 sm:mb-2">
                        <button class="p-1.5 shrink-0 rounded border border-slate-200 hover:border-slate-300 shadow-sm">
                            <svg class="w-4 h-1 fill-current text-slate-400" viewBox="0 0 16 4">
                                <circle cx="8" cy="2" r="2"/>
                                <circle cx="2" cy="2" r="2"/>
                                <circle cx="14" cy="2" r="2"/>
                            </svg>
                        </button>
                        <button class="p-1.5 shrink-0 rounded border border-slate-200 hover:border-slate-300 shadow-sm">
                            <svg class="w-4 h-4 fill-current text-indigo-500" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7Zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8Z"/>
                            </svg>
                        </button>
                        <button class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">
                            <svg class="fill-current shrink-0" width="11" height="8" viewBox="0 0 11 8">
                                <path d="m.457 4.516.969-.99 2.516 2.481L9.266.702l.985.99-6.309 6.284z"/>
                            </svg>
                            <span class="ml-2">Following</span>
                        </button>
                    </div>

                </div>

            </div>

            <!-- Header -->
            <header class="text-center sm:text-left mb-6">
                <!-- Name -->
                <div class="inline-flex items-start mb-2">
                    <h1 class="text-2xl text-slate-800 font-bold">{{ user.name }}</h1>
                    <svg class="w-4 h-4 fill-current shrink-0 text-amber-500 ml-2" viewBox="0 0 16 16">
                        <path
                            d="M13 6a.75.75 0 0 1-.75-.75 1.5 1.5 0 0 0-1.5-1.5.75.75 0 1 1 0-1.5 1.5 1.5 0 0 0 1.5-1.5.75.75 0 1 1 1.5 0 1.5 1.5 0 0 0 1.5 1.5.75.75 0 1 1 0 1.5 1.5 1.5 0 0 0-1.5 1.5A.75.75 0 0 1 13 6ZM6 16a1 1 0 0 1-1-1 4 4 0 0 0-4-4 1 1 0 0 1 0-2 4 4 0 0 0 4-4 1 1 0 1 1 2 0 4 4 0 0 0 4 4 1 1 0 0 1 0 2 4 4 0 0 0-4 4 1 1 0 0 1-1 1Z"/>
                    </svg>
                </div>
                <!-- Bio -->
                <div class="text-sm mb-3">Fitness Fanatic, Design Enthusiast, Mentor, Meetup Organizer & PHP Lover.
                </div>

                <!-- Meta -->
                <div class="flex flex-wrap justify-center sm:justify-start space-x-4">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 fill-current shrink-0 text-slate-400" viewBox="0 0 16 16">
                            <path
                                d="M8 8.992a2 2 0 1 1-.002-3.998A2 2 0 0 1 8 8.992Zm-.7 6.694c-.1-.1-4.2-3.696-4.2-3.796C1.7 10.69 1 8.892 1 6.994 1 3.097 4.1 0 8 0s7 3.097 7 6.994c0 1.898-.7 3.697-2.1 4.996-.1.1-4.1 3.696-4.2 3.796-.4.3-1 .3-1.4-.1Zm-2.7-4.995L8 13.688l3.4-2.997c1-1 1.6-2.198 1.6-3.597 0-2.798-2.2-4.996-5-4.996S3 4.196 3 6.994c0 1.399.6 2.698 1.6 3.697 0-.1 0-.1 0 0Z"/>
                        </svg>
                        <span class="text-sm font-medium whitespace-nowrap text-slate-500 ml-2">Milan, IT</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 fill-current shrink-0 text-slate-400" viewBox="0 0 16 16">
                            <path
                                d="M11 0c1.3 0 2.6.5 3.5 1.5 1 .9 1.5 2.2 1.5 3.5 0 1.3-.5 2.6-1.4 3.5l-1.2 1.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l1.1-1.2c.6-.5.9-1.3.9-2.1s-.3-1.6-.9-2.2C12 1.7 10 1.7 8.9 2.8L7.7 4c-.4.4-1 .4-1.4 0-.4-.4-.4-1 0-1.4l1.2-1.1C8.4.5 9.7 0 11 0ZM8.3 12c.4-.4 1-.5 1.4-.1.4.4.4 1 0 1.4l-1.2 1.2C7.6 15.5 6.3 16 5 16c-1.3 0-2.6-.5-3.5-1.5C.5 13.6 0 12.3 0 11c0-1.3.5-2.6 1.5-3.5l1.1-1.2c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4L2.9 8.9c-.6.5-.9 1.3-.9 2.1s.3 1.6.9 2.2c1.1 1.1 3.1 1.1 4.2 0L8.3 12Zm1.1-6.8c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-4.2 4.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l4.2-4.2Z"/>
                        </svg>
                        <a class="text-sm font-medium whitespace-nowrap text-indigo-500 hover:text-indigo-600 ml-2"
                           href="#0">{{ user.email }}</a>
                    </div>
                </div>
            </header>


            <!-- Profile content -->
            <div class="flex flex-col xl:flex-row xl:space-x-16">

                <!-- Main content -->
                <div class="space-y-5 mb-8 xl:mb-0">

                    <!-- About Me -->
                    <div class="hidden">
                        <h2 class="text-slate-800 font-semibold mb-2">About Me</h2>
                        <div class="text-sm space-y-2">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <p>Consectetur adipiscing elit, sed do eiusmod tempor magna aliqua.</p>
                        </div>
                    </div>



                    <!-- Work History -->
                    <div>
                        <h2 class="text-slate-800 font-semibold mb-2">Posts</h2>
                        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full">

                            <!-- Page content -->
                            <div class="max-w-5xl mx-auto flex flex-col lg:flex-row lg:space-x-8 xl:space-x-16" v-for="post in posts" :key="post.post">

                                <!-- Content -->
                                <div class="w-full">

                                    <div class="text-sm font-semibold text-indigo-500 uppercase mb-2">
                                        {{post.post_date}}
                                    </div>
                                    <header class="mb-4">
                                        <!-- Title -->
                                        <h1 class="text-2xl md:text-3xl text-slate-800 font-bold mb-2">
                                            {{post.name}}
                                        </h1>
                                    </header>

                                    <!-- Meta -->
                                    <div class="space-y-3 sm:flex sm:items-center sm:justify-between sm:space-y-0 mb-6">
                                        <!-- Author -->
                                        <div class="flex items-center sm:mr-4">
                                            <a class="block mr-2 shrink-0" href="#0">
                                                <img class="rounded-full" :src="post.user.avatar_url" width="32"
                                                     height="32" alt="User 04"/>
                                            </a>
                                            <div class="text-sm whitespace-nowrap">{{post.user.name}}</div>
                                        </div>
                                        <!-- Right side -->
                                        <div class="flex flex-wrap items-center sm:justify-end space-x-2 hidden">
                                            <div
                                                class="text-xs inline-flex font-medium uppercase bg-emerald-100 text-emerald-600 rounded-full text-center px-2.5 py-1">
                                                Free
                                            </div>
                                        </div>
                                    </div>



                                    <!-- Post content -->
                                    <div>
                                        <p class="mb-6 w-full text-justify" >
                                            {{post.body}}
                                        </p>
                                        <hr class="my-6 border-t border-slate-200"/>
                                    </div>
                                </div>





                            </div>
                            <div>


                                <!-- Photos -->
                                <div class="hidden">
                                    <h2 class="text-xl leading-snug text-slate-800 font-bold mb-2">Photos (3)</h2>
                                    <div class="grid grid-cols-3 gap-4 my-6">
                                        <a class="block" href="#0">
                                            <img class="w-full rounded-sm" src="../../images/meetup-photo-01.jpg"
                                                 width="203" height="152" alt="Meetup photo 01"/>
                                        </a>
                                        <a class="block" href="#0">
                                            <img class="w-full rounded-sm" src="../../images/meetup-photo-02.jpg"
                                                 width="203" height="152" alt="Meetup photo 02"/>
                                        </a>
                                        <a class="block" href="#0">
                                            <img class="w-full rounded-sm" src="../../images/meetup-photo-03.jpg"
                                                 width="203" height="152" alt="Meetup photo 03"/>
                                        </a>
                                    </div>
                                </div>

                                <hr class="my-6 border-t border-slate-200"/>

                                <!-- Comments -->
                                <div class="hidden">
                                    <h2 class="text-xl leading-snug text-slate-800 font-bold mb-2">Comments (3)</h2>
                                    <ul class="space-y-5 my-6">
                                        <!-- Comment -->
                                        <li class="flex items-start">
                                            <a class="block mr-3 shrink-0" href="#0">
                                                <img class="rounded-full" src="../../images/user-32-07.jpg"
                                                     width="32" height="32" alt="User 07"/>
                                            </a>
                                            <div class="grow">
                                                <div class="text-sm font-semibold text-slate-800 mb-2">Taylor
                                                    Nieman
                                                </div>
                                                <div class="italic">“Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                                    dolore magna aliqua. Ut enim ad minim veniam.”
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Comment -->
                                        <li class="flex items-start">
                                            <a class="block mr-3 shrink-0" href="#0">
                                                <img class="rounded-full" src="../../images/user-32-08.jpg"
                                                     width="32" height="32" alt="User 08"/>
                                            </a>
                                            <div class="grow">
                                                <div class="text-sm font-semibold text-slate-800 mb-2">Meagan
                                                    Loyst
                                                </div>
                                                <div class="italic">“Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                                    dolore magna aliqua. Ut enim ad minim veniam.”
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Comment -->
                                        <li class="flex items-start">
                                            <a class="block mr-3 shrink-0" href="#0">
                                                <img class="rounded-full" src="../../images/user-32-02.jpg"
                                                     width="32" height="32" alt="User 02"/>
                                            </a>
                                            <div class="grow">
                                                <div class="text-sm font-semibold text-slate-800 mb-2">Frank Malik
                                                </div>
                                                <div class="italic">“Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                                    dolore magna aliqua. Ut enim ad minim veniam.”
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>


                            </div>

                        </div>
                    </div>

                </div>

                <!-- Sidebar -->
                <aside class="xl:min-w-56 xl:w-56 space-y-3">
                    <div class="text-sm">
                        <h3 class="font-medium text-slate-800">Title</h3>
                        <div>Senior Product Designer</div>
                    </div>
                    <div class="text-sm">
                        <h3 class="font-medium text-slate-800">Location</h3>
                        <div>Milan, IT - Remote</div>
                    </div>
                    <div class="text-sm">
                        <h3 class="font-medium text-slate-800">Email</h3>
                        <div>{{ user.email }}</div>
                    </div>
                    <div class="text-sm">
                        <h3 class="font-medium text-slate-800">Birthdate</h3>
                        <div>4 April, 1987</div>
                    </div>
                    <div class="text-sm">
                        <h3 class="font-medium text-slate-800">Joined Acme</h3>
                        <div>7 April, 2017</div>
                    </div>
                </aside>

            </div>

        </div>

    </div>
</template>

<script>
import ModalBasic from '../../components/ModalBasic.vue'

export default {
    name: 'ProfileBody',
    props: ['profileSidebarOpen'],

    components: {
        ModalBasic,
    },
    data() {
        return {
            feedbackModalOpen: false,
            posts: [],
        }
    },
    mounted() {

        fetch('/api/myPosts/')
            .then(response => response.json())
            .then(response => {
                this.posts = response.data
            });

    },
    computed: {
        user() {
            return this.$store.state.auth.user
        }
    }

}
</script>
