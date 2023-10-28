<template>
    <div class="relative">
        <div class="p-1">
            <div class="flex justify-center items-end "
                 style="height: 14rem; background-image: url('https://images.unsplash.com/photo-1494959764136-6be9eb3c261e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80')">
                <div class="">
                    <img :src="user.avatar_url" alt="" width="100" height="100"
                         class="rounded-full border-4 border-white profile_img">
                </div>
            </div>

            <div class="p-5 mt-12 m-1">
                <div class="text-center">
                    <h1 class="text-2xl text-slate-800 font-bold">{{user.name}}</h1>
                    <h1 class="text-lg font-medium whitespace-nowrap text-slate-500 ml-2">Front end Developer</h1>

                </div>
                <hr class="my-3">
                <div>
                    <p class="text-lg mb-3 mt-3">If several languages coalesce, the
                        grammar of the resulting language is
                        more simple.
                    </p>
                </div>

                <ul class="flex flex-nowrap md:block mr-3 md:mr-0 mt-9">
                    <li class="mr-0.5 md:mr-0 md:mb-0.5"><a
                        class="flex items-center px-2.5  rounded whitespace-nowrap">
                        <svg class="w-4 h-4 shrink-0 fill-current text-slate-400 mr-2" viewBox="0 0 16 16">
                            <path
                                d="M12.311 9.527c-1.161-.393-1.85-.825-2.143-1.175A3.991 3.991 0 0012 5V4c0-2.206-1.794-4-4-4S4 1.794 4 4v1c0 1.406.732 2.639 1.832 3.352-.292.35-.981.782-2.142 1.175A3.942 3.942 0 001 13.26V16h14v-2.74c0-1.69-1.081-3.19-2.689-3.733zM6 4c0-1.103.897-2 2-2s2 .897 2 2v1c0 1.103-.897 2-2 2s-2-.897-2-2V4zm7 10H3v-.74c0-.831.534-1.569 1.33-1.838 1.845-.624 3-1.436 3.452-2.422h.436c.452.986 1.607 1.798 3.453 2.422A1.943 1.943 0 0113 13.26V14z"></path>
                        </svg>
                        <span class="text-sm font-medium text-slate-600 hover:text-slate-700">Adam Zampa</span></a></li>
                    <li class="mr-0.5 md:mr-0 md:mb-0.5"><a
                        class="flex items-center px-2.5 py-2 rounded whitespace-nowrap">
                        <svg class="w-4 h-4 shrink-0 fill-current text-slate-400 mr-2" viewBox="0 0 16 16">
                            <path
                                d="M14.3.3c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-8 8c-.2.2-.4.3-.7.3-.3 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l8-8zM15 7c.6 0 1 .4 1 1 0 4.4-3.6 8-8 8s-8-3.6-8-8 3.6-8 8-8c.6 0 1 .4 1 1s-.4 1-1 1C4.7 2 2 4.7 2 8s2.7 6 6 6 6-2.7 6-6c0-.6.4-1 1-1z"></path>
                        </svg>
                        <span
                            class="text-sm font-medium text-slate-600 hover:text-slate-700">adc@123.com</span></a>
                    </li>
                    <li class="mr-0.5 md:mr-0 md:mb-0.5"><a
                        class="flex items-center px-2.5 py-2 rounded whitespace-nowrap">
                        <svg class="w-4 h-4 shrink-0 fill-current text-slate-400 mr-2" viewBox="0 0 16 16">
                            <path
                                d="M3.414 2L9 7.586V16H7V8.414l-5-5V6H0V1a1 1 0 011-1h5v2H3.414zM15 0a1 1 0 011 1v5h-2V3.414l-3.172 3.172-1.414-1.414L12.586 2H10V0h5z"></path>
                        </svg>
                        <span class="text-sm font-medium text-slate-600 hover:text-slate-700">California, USA</span></a>
                    </li>
                </ul>

                <section>
                    <h1 class="text-lg">Media</h1>
                    <div class="flex flex-col-4 gap-4 ">
                        <img src="/images/user-avatar-80.png" alt="" width="100" height="100"
                             class=" rounded border-4 border-white ">
                        <img src="/images/user-avatar-80.png" alt="" width="100" height="100"
                             class=" rounded border-4 border-white ">
                        <img src="/images/user-avatar-80.png" alt="" width="100" height="100"
                             class=" rounded border-4 border-white ">
                        <img src="/images/user-avatar-80.png" alt="" width="100" height="100"
                             class=" rounded border-4 border-white ">
                    </div>
                    <hr class="my-3">
                </section>

               <section class="mt-4">
                   <p class="text-lg mt-2">LIKED, REPLIED OR UPVOTED POSTS</p>

                   <div class="border rounded border-slate-100 shadow-lg p-4 mb-4" v-for="post in member.posts">
                       <div class="flex  items-center">
                           <img :src="user.avatar_url" alt="" width="40" height="40"
                                class=" rounded-full border-4 border-white m-3 ">
                           <p class="">{{post.name}} </p>
                       </div>
                       <span>{{post.post_date}}</span>
                       <div class="flex justify-between items-center mt-2">
                           <div class="flex gap-2">
                               <div class="flex gap-2  items-center">
                                   <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                             d="M9.89313 0.888635C10.8867 0.887249 11.8397 1.28202 12.5413 1.98552C13.2436 2.68786 13.6382 3.64044 13.6382 4.6337C13.6382 5.62696 13.2436 6.57954 12.5413 7.28187L6.9803 12.5399L1.4193 7.28187C0.348201 6.21079 0.0277825 4.59996 0.607453 3.20052C1.18712 1.80108 2.55272 0.888621 4.06747 0.888635C5.20702 0.881184 6.28457 1.40672 6.9803 2.30926C7.67553 1.4061 8.7534 0.880408 9.89313 0.888635ZM6.9804 10.2485L11.3763 6.09064H11.3788C11.9657 5.49249 12.1365 4.60057 11.8121 3.82788C11.4876 3.05519 10.7313 2.55259 9.89323 2.5528C8.69647 2.5528 7.96827 3.11955 6.9804 4.73742C5.9917 3.11955 5.2635 2.5528 4.06757 2.5528C3.23097 2.5539 2.4764 3.05598 2.15225 3.82723C1.82809 4.59848 1.99741 5.48887 2.58203 6.08731L6.9804 10.2485Z"
                                             fill="#6366F1"/>
                                   </svg>
                                   {{post.react}}
                               </div>
                               <div class="flex gap-2 justify-between items-center">
                                   <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                             d="M0.779785 5.88156C0.779785 2.63584 3.77584 0.0559082 7.43768 0.0559082C11.0995 0.0559082 14.0956 2.63584 14.0956 5.88156C14.0956 7.37959 13.4298 8.71117 12.4311 9.70985V13.3717L7.93702 11.7072H7.43768C3.77584 11.7072 0.779785 9.12729 0.779785 5.88156ZM10.7665 10.9582V9.04401C10.7665 9.04401 12.431 7.71243 12.431 5.88151C12.431 3.55125 10.184 1.72033 7.43758 1.72033C4.6912 1.72033 2.44416 3.55125 2.44416 5.88151C2.44416 8.21177 4.6912 10.0427 7.43758 10.0427H8.18659L10.7665 10.9582Z"
                                             fill="#6366F1"/>
                                   </svg>
                                   {{post.comment.length}}
                               </div>
                           </div>
                           <div class="flex gap-2">
                               <router-link  :to="{ name: 'dashboard', params: { id: post.community_id } }">Replied</router-link>
                               <router-link class="text-blue-500" :to="{ name: 'dashboard', params: { id: post.community_id } }">Go to Post</router-link>

                           </div>
                       </div>
                   </div>

               </section>
            </div>
        </div>
    </div>
</template>

<script>

import axios from "axios";

export default {
    name: 'UserProfile',
    props:[
        'user'
    ],
    data(){
        return{
            member:{
                posts:[],
            }
        }
    },


    mounted() {
        axios.post('/api/getUserInfo/' + this.user.id ).then(({data}) => {
            console.log('returned user', data)
            this.member.posts = data
        })

    }

}
</script>
<style>
.profile_img {
    margin-bottom: -50px;
    border: 8px solid #d9d3d3;
}
</style>
