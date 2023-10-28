<template>

<div>
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

    <div>ss
        <button class="border-indigo-500 opacity-0 hover:opacity-100">Hello</button>wwww
    </div>
</div>

</template>

<script>

    import ProfileBody from "../partials/community/ProfileBody";
    export default {
        name: "App",
        components: {ProfileBody},
        data() {
            return {
                html: '<p>hello .............</p> <h1>Hi Darling</h1>'
            };
        },

        methods: {}
    };
</script>




