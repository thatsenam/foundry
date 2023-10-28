<template>
    <div class="grow">
        <!-- Panel body -->
        <div class="p-6 space-y-6">
            <h2 class="text-2xl text-slate-800 font-bold mb-5">My Account</h2>
            <!-- Picture -->


            <section>
                <div class="flex items-center ">
                    <div class="flex items-center justify-between">
                        <div class="mr-4">
                            <img class="w-20 h-20 rounded-full" :src="user_form.avatar_preview"
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
                </div>

            </section>
            <!-- Business Profile -->
            <section class="">
                <h3 class="text-xl leading-snug text-slate-800 font-bold mb-1">User Profile</h3>
                <div class="text-sm">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                    mollit.
                </div>

            </section>
            <div class="flex">
                <div >
                    <h3 class="text-xl leading-snug text-slate-800 font-bold mb-1 ">Name</h3>
                    <div class="flex  mt-5 ">
                        <div class="mr-2 ">
                            <label class="sr-only" for="name"> name</label>
                            <input id="name" v-model="user_form.name" class="form-input w-full" type="text"/>
                            <span v-for="error of v$.user_form.name.$errors" :key="error.$uid">
                                <div class="text-xs mt-1 text-rose-500">Name is required</div>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Email -->
                <div >
                    <h3 class="text-xl leading-snug text-slate-800 font-bold mb-1 ">Email</h3>
                    <div class="flex  mt-5 ">
                        <div class="mr-2">
                            <label class="sr-only" for="email">Business email</label>
                            <input id="email" v-model="user_form.email" class="form-input w-full" type="email"/>
                            <span v-for="error of v$.user_form.email.$errors" :key="error.$uid">
                             <div class="text-xs mt-1 text-rose-500">{{ error.$message }}</div>
                             </span>
                        </div>
                    </div>
                </div>
            </div>

            <section>
                <h3 class="text-xl leading-snug text-slate-800 font-bold mb-1">About Me</h3>
                <div class="flex flex-wrap mt-5">
                    <div class="mr-2 sm:w-1/3">
                        <label class="sr-only" for="about"> name</label>
                        <textarea name="about" id="about" cols="83" rows="5" v-model="user_form.about">

                        </textarea>
                        <!--                        <span v-for="error of v$.user_form.about.$errors" :key="error.$uid">-->
                        <!--                         <div class="text-xs mt-1 text-rose-500">Name is required</div>-->
                        <!--                        </span>-->
                    </div>
                </div>

            </section>
            <div class="flex ">
                <div class="mr-2 sm:w-1/3">
                    <label class="block text-sm font-medium mb-1" for="date"> Birthdate</label>
                    <input type="date" id="date" class="form-input w-full">
                </div>
                <div class="mr-2 sm:w-1/3">
                    <label class="block text-sm font-medium mb-1" for="location"> Location</label>
                    <input type="text" id="location" class="form-input w-full">
                </div>
            </div>
            <!-- Password -->
            <section>
                <h3 class="text-xl leading-snug text-slate-800 font-bold mb-1">Password</h3>
                <!--                <div class="text-sm">You can set a permanent password if you don't want to use temporary login codes.</div>-->
                <div class="sm:flex  space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/3 h-20">
                        <label class="block text-sm font-medium mb-1" for="name">Password </label>
                        <input id="password" class="form-input w-full" v-model="user_form.password" type="password"/>
                        <span v-for="error of v$.user_form.password.$errors" :key="error.$uid">
                            <div class="text-xs mt-1 text-rose-500">{{ error.$message }}</div>
                        </span>
                    </div>
                    <div class="sm:w-1/3 h-20">
                        <label class="block text-sm font-medium mb-1">Password Confirm</label>
                        <input id="password1" class="form-input w-full" v-model="user_form.password1" type="password"/>
                        <span v-for="error of v$.user_form.password1.$errors" :key="error.$uid">
                             <div class="text-xs mt-1 text-rose-500">{{ error.$message }}</div>
                        </span>
                    </div>

                </div>

            </section>

        </div>
        <!-- Panel footer -->
        <footer>
            <div class="flex flex-col px-6 py-5 border-t border-slate-200">
                <div class="flex self-end">
                    <button class="btn border-slate-200 hover:border-slate-300 text-slate-600">Cancel</button>
                    <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white ml-3" @click="updateProfile">Save
                        Changes
                    </button>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
import {required, sameAs, email} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import {notification} from "ant-design-vue";

export default {
    name: 'AccountPanel',
    data() {
        return {
            user_form: {
                avatar_preview: "images/user-avatar-80.png",
                id: null,
                avatar_file: null,
                password: null,
                password1: null,
                name: null,
                email: null,
            }
        }
    },
    setup(props, {emit, context}) {
        return {
            v$: useVuelidate()
        }
    },
    computed: {
        user() {
            return this.$store.state.auth.user;
        }
    },
    validations() {
        return {
            user_form: {
                name: {required},
                email: {required, email},
                avatar_preview: {},
                avatar_file: {},
                password: {},
                password1: {
                    sameAsPassword: sameAs(this.user_form.password),
                },
            }
        }
    },
    methods: {

        updateProfile() {
            this.v$.$touch()

            if (!this.v$.$invalid) {

                if (this.user_form.avatar_file != null) {
                    this.user_form.avatar = this.user_form.avatar_file;
                } else {
                    this.user_form.avatar = "blank";
                }
                var form_data = new FormData();
                for (var key in this.user_form) {
                    form_data.append(key, this.user_form[key]);
                }
                console.log('file', this.avatar_file)

                this.$store.dispatch('auth/updateProfile', form_data).then(response => {
                    notification['success']({
                        message: 'Profile Update Successful!'
                    });
                    this.password = null,
                        this.password1 = null
                })

            }

        },
        previewImage: function (event) {
            this.user_form.avatar_file = event.target.files[0];
            var input = event.target;
            if (input.files) {
                var reader = new FileReader();
                reader.onload = (e) => {
                    this.user_form.avatar_preview = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        },
        init(user) {
            this.user_form.avatar_preview = user.avatar_url;
            this.user_form.name = user.name;
            this.user_form.email = user.email;
            this.user_form.id = user.id;
        }
    },
    watch: {
        user: function (_new_user) {
            if (_new_user) {
                this.init(_new_user)
            }
        }
    },
    mounted() {
        this.init(this.user)
    }
}
</script>
