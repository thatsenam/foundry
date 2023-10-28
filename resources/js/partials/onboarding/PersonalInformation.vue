<template>
    <div class="PersonalInformation">
        <form>
            <h1 class="text-3xl text-slate-800 font-bold mb-6">Your information ✨</h1>

            <div class="image-section flex items-center justify-between mb-4">
                <section>
                    <div class="flex items-center justify-between">
                        <div class="mr-4">
                            <img class="w-20 h-20 rounded-full" :src="avatar_preview"
                                 width="80" height="80" alt="User upload"/>
                        </div>
                        <button onclick="document.getElementById('pickAvatarImageButton').click()"
                                class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">Pick
                            Avatar
                        </button>

                        <input id="pickAvatarImageButton" hidden type="file" accept="image/*"
                               @change="previewImage"
                               class="form-control-file">
                    </div>
                </section>


                <section>
                    <div class="flex items-center">
                        <div class="mr-4">
                            <img class="w-20 h-20 " :src="banner_preview" width="80"
                                 height="80" alt="User upload"/>
                        </div>
                        <button onclick="document.getElementById('pickBannerImageButton').click()"
                                class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">Pick
                            Banner
                        </button>

                        <input
                            id="pickBannerImageButton" hidden type="file" accept="image/*"
                            @change="onBannerPick"
                            class="form-control-file">
                    </div>
                </section>
            </div>


            <div class="space-y-4 mb-8">
                <!-- Company Name -->
                <div>
                    <label class="block text-sm font-medium mb-1" for="company-name">Company Name
                        <span class="text-rose-500">*</span></label>
                    <input id="company-name" v-model="form.company_name" class="form-input w-full"
                           type="text"/>


                    <span v-for="error of v$.form.company_name.$errors" :key="error.$uid">
                                            <div class="text-xs mt-1 text-rose-500">{{ error.$message }}</div>
                                        </span>
                </div>
                <!-- City and Postal Code -->
                <div class="flex space-x-4">
                    <div class="flex-1">
                        <label class="block text-sm font-medium mb-1" for="city">City <span
                            class="text-rose-500">*</span></label>
                        <input id="city" v-model="form.company_city" class="form-input w-full"
                               type="text"/>


                        <span v-for="error of v$.form.company_city.$errors" :key="error.$uid">
                                            <div class="text-xs mt-1 text-rose-500">{{ error.$message }}</div>
                                        </span>
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-medium mb-1" for="postal-code">Postal Code
                            <span class="text-rose-500">*</span></label>
                        <input id="postal-code" v-model="form.company_postal_code"
                               class="form-input w-full" type="text"/>
                        <span v-for="error of v$.form.company_postal_code.$errors"
                              :key="error.$uid">
                                            <div class="text-xs mt-1 text-rose-500">{{ error.$message }}</div>
                                        </span>
                    </div>
                </div>
                <!-- Street Address -->
                <div>
                    <label class="block text-sm font-medium mb-1" for="street">Street Address <span
                        class="text-rose-500">*</span></label>
                    <input id="street" v-model="form.street_address" class="form-input w-full"
                           type="text"/>

                    <span v-for="error of v$.form.street_address.$errors" :key="error.$uid">
                                            <div class="text-xs mt-1 text-rose-500">{{ error.$message }}</div>
                                        </span>
                </div>
                <!-- Country -->
                <div>
                    <label class="block text-sm font-medium mb-1" for="country">Country <span
                        class="text-rose-500">*</span></label>
                    <select id="country" v-model="form.company_country" class="form-select w-full">
                        <option>USA</option>
                        <option>Italy</option>
                        <option>United Kingdom</option>
                    </select>
                    <span v-for="error of v$.form.company_country.$errors" :key="error.$uid">
                                            <div class="text-xs mt-1 text-rose-500">{{ error.$message }}</div>
                                        </span>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <router-link class="text-sm underline hover:no-underline" to="/onboarding-02">←
                    Back
                </router-link>
                <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white ml-auto"
                        @click="submitOnboarding">Next Step →
                </button>
            </div>
        </form>

    </div>
</template>

<script>
    import useVuelidate from '@vuelidate/core'
    import {required, email} from '@vuelidate/validators'


    export default {
        name: 'PersonalInformation',
        setup() {
            return {v$: useVuelidate()}
        },
        data() {
            return {
                preview: null,
                image: null,
                file: null,
                avatar_preview: "images/user-avatar-80.png",
                banner_preview: "images/user-avatar-80.png",
                community_banner: "",
                form: {
                    company_name: "",
                    company_city: "",
                    company_postal_code: "",
                    street_address: "",
                    company_country: "",
                    avatar_file: null,
                    banner_file: null,
                }
            }
        },

        validations() {
            return {
                form: {
                    company_name: {required},
                    company_city: {required},
                    company_postal_code: {required},
                    street_address: {required},
                    company_country: {required},

                }
            }
        },
        methods: {
            previewImage: function (event) {
                this.form.avatar_file = event.target.files[0];
                var input = event.target;
                if (input.files) {
                    var reader = new FileReader();
                    reader.onload = (e) => {
                        this.avatar_preview = e.target.result;
                    }
                    // this.image = input.files[0];
                    reader.readAsDataURL(input.files[0]);
                }
            }, onBannerPick: function (event) {
                this.form.banner_file = event.target.files[0];
                var input = event.target;
                if (input.files) {
                    var reader = new FileReader();
                    reader.onload = (e) => {
                        this.banner_preview = e.target.result;
                    }
                    // this.image = input.files[0];
                    reader.readAsDataURL(input.files[0]);
                }
            },


            submitOnboarding() {
                this.v$.$validate()
                this.v$.$touch()
                console.log(this.v$.$invalid)
                if (!this.v$.$invalid) {

                    this.$store.commit('auth/UPDATE_ONBOARDING03', {
                        'community_banner': this.form.community_banner,
                        'company_name': this.form.company_name,
                        'company_city': this.form.company_city,
                        'company_postal_code': this.form.company_postal_code,
                        'company_address': this.form.street_address,
                        'company_country': this.form.company_country,
                        'avatar': this.form.avatar_file,
                        'banner': this.form.banner_file,
                    })
                    this.$router.push('/onboarding-04')
                } else {

                }


            }

        },
        computed: {
            onboarding() {
                return this.$store.state.auth.onboarding;
            }
        }
    };
</script>
