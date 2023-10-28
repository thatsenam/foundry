<template>
    <div class="CommunityMember">

        <div class="overflow-x-auto">
            <h3 class="text-xl leading-snug text-slate-800 font-bold mb-1">Embed Your Community</h3>
            <div class="text-sm">It’s easy to embed your community into your No-Code application
                like Webflow, Carrd,
                Framer Sites or more.
            </div>
            <div class="category-section">
                <div class="py-3">
                    <div class="text-slate-800 font-semibold">Community widget</div>
                    <div class="text-sm">Add a community icon to the bottom right-hand corner of your website. When
                        users click on the icon, your community will pop up in a modal. <br> You'll need to copy this
                        code to
                        the head section of your website.
                    </div>
                </div>


            </div>

            <!-- Start -->
            <div class="flex items-center gap-4">

                <!-- Start -->
                <button class="btn bg-black hover:bg-indigo-600 text-white">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-50 shrink-0" width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <rect x="8" y="8" width="12" height="12" rx="2"/>
                        <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"/>
                    </svg>
                    <span class="ml-2" @click="copy">Copy Link..</span>
                </button>
            </div>

            <input
                v-on:focus="$event.target.select()"
                ref="myinput"
                class="form-input w-full px-2 py-2 mt-4 mb-4"
                readonly
                :value="communityEmbed"/>

            <section v-for="channel in channels">

                <h3 class="text-xl leading-snug text-slate-800 font-bold mb-1">Embed #{{ channel.name }} channel</h3>

                <!-- Start -->
                <div class="flex items-center gap-4">
                    <textarea
                        v-on:focus="$event.target.select()"
                        :ref="channelRef(channel.id)"
                        class="form-input w-full px-2 py-8 mt-4 mb-4 "
                        readonly
                        :value="generateChannelCode(channel)"></textarea>

                    <!-- Start -->
                    <div class="flex-1" style="min-width: 150px">
                        <button class="btn bg-black hover:bg-indigo-600 text-white">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-50 shrink-0" width="24"
                                 height="24"
                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <rect x="8" y="8" width="12" height="12" rx="2"/>
                                <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"/>
                            </svg>
                            <span class="ml-2"
                                  @click.stop="copyChannelEmbed(generateChannelCode(channel))">Copy Link</span>
                        </button>
                    </div>

                </div>


            </section>

            <section class="hidden">
                <div class="category-section">
                    <div class="py-3">
                        <div class="text-slate-800 font-semibold">Post widget</div>
                        <div class="text-sm">Using an iFrame, embed the comments section of a post to a page on your
                            website. Unless a user is logged in, this will only work for publicly visible posts.
                        </div>
                    </div>


                </div>

                <!-- Start -->
                <div class="flex items-center gap-4">

                    <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-50 shrink-0" width="20"
                             height="20"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <circle cx="12" cy="12" r="2"/>
                            <path
                                d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/>
                        </svg>
                        <span class="ml-2">Preview</span>
                    </button>

                    <!-- Start -->
                    <button class="btn bg-black hover:bg-indigo-600 text-white">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-50 shrink-0" width="24"
                             height="24"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <rect x="8" y="8" width="12" height="12" rx="2"/>
                            <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"/>
                        </svg>
                        <span class="ml-2">Copy Link</span>
                    </button>
                </div>

                <pre class="lang-html s-code-block"><code class="hljs language-xml">


                &lt;iframe src="https://www.google.com" style="border:none;" title="Embed to Your website"&gt;  &lt;/iframe &gt;
                </code>
            </pre>
            </section>
        </div>

        <input class="absolute" style="left: -999999px" ref="tempText" type="text" v-model="tempText">
    </div>
</template>

<script>


    import ModalBasic from "../../components/ModalBasic";
    import {getCurrentInstance} from 'vue'
    import {notification} from 'ant-design-vue';

    export default {
        name: 'CommunityEmbed',
        components: {
            ModalBasic
        },
        data() {
            let community_id = getCurrentInstance().vnode.key;
            return {
                community_id,
                html: '<td >Hello World</td>',
                text: 'copied!',
                channels: [],
                tempText: ''
            }
        },
        computed: {
            communityEmbed() {
                let domain = window.location.host;
                // let name = window.location.hostname;
                let community_id = this.$store.state.community.active_community.slug;
                let link;
                link = '<iframe src="' + 'https://' + domain + '/#/' + community_id + '/?type=embed" style="width: 100vw;height: 100vh;"></iframe>';
                return link;
            },
            user() {
                return this.$store.state.auth.user;
            },
            community() {
                return this.$store.state.community.active_community;
            },
            authenticated() {
                return this.$store.state.auth.authenticated;
            },
        },
        methods: {

            toast(msg) {
                notification['success']({
                    message: msg
                });
            },
            copy() {
                this.$refs.myinput.focus();
                document.execCommand('copy');
            },
            copyChannelEmbed(code) {
                this.tempText = code

                setTimeout(() => {
                    this.$refs.tempText.focus();
                    this.$refs.tempText.select();
                    document.execCommand('copy');

                }, 100)
            },
            generateChannelCode(channel) {
                let domain = window.location.host;

                let urlToEmbed = '';
                let gUrl = this.$router.resolve({name: 'channel', params: {chat_id: channel.uid}})
                urlToEmbed = gUrl.href

                let code = '<iframe src="' + 'https://' + domain + '/#/' + 'messages/'+ this.community.slug+'/' + channel.uid +'/channel' + '/?type=embed" style="width: 100vw;height: 100vh;"></iframe>';

                return code
            },
            channelRef(id) {
                return "channelRef" + id;
            }
        },
        mounted() {
            this.$store.dispatch('post/loadChannels', this.community_id)
                .then((response) => {
                    this.channels = response.data;
                })
        }
    };
</script>
