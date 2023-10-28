<template>
    <div class="PersonalInformation">
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
                    <textarea v-model="community.description" id="feedback" class="form-textarea w-full px-2 py-1"
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
                                    <input type="radio" name="radio-buttons" v-model="community.style" value="slack"
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
                                        type="radio" name="radio-buttons" v-model="community.style" value="reddit"
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

                <button class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white" @click="onCommunityFormSubmit">
                    Next ->
                </button>
            </div>
        </div>
    </div>
</template>

<script>

    import useVuelidate from '@vuelidate/core'
    import {required, email} from '@vuelidate/validators'

    export default {
        name: 'CommunityInformation',
        setup(props, {emit, context}) {
            return {
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
                    description: null

                }, community_logo: 'images/user-avatar-80.png'
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

                    this.$store.commit('auth/SET_PRE_CREATE_COMMUNITY', form_data)

                    this.$router.push('/onboarding-04')

                    // this.$store.dispatch('community/addCommunity', form_data).then((response) => {
                    //     this.communityModalOpen = false
                    //     this.community = {
                    //         name: null,
                    //         logo: null,
                    //         description: null
                    //
                    //     };
                    //     this.community_logo = "images/user-avatar-80.png";
                    //     notification['success']({
                    //         message: 'Community Created!!',
                    //         description: "You have created a new community. Explore it."
                    //     });
                    //
                    //     // this.$store.dispatch('community/loadCommunities')
                    // }).catch((error) => {
                    //     notification['error']({
                    //         message: 'Server Error',
                    //         description: error.message
                    //     });
                    // })

                }

            },
            onCommunityLogoPick(event) {
                // alert('test is working')
                this.$store.commit('community/SET_COMMUNITY_LOGO_FILE', event.target.files[0]);
                var input = event.target;
                if (input.files) {
                    var reader = new FileReader();
                    reader.onload = (e) => {
                        this.community_logo = e.target.result;
                    }
                    // this.image = input.files[0];
                    reader.readAsDataURL(input.files[0]);
                }
            }
        },
        computed: {
            user() {
                return this.$store.state.auth.user;
            }
            ,
            authenticate() {
                return this.$store.state.auth.authenticated;
            }
        }
        ,

    }
    ;
</script>
