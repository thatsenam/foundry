<template>
    <div class="CommunityMember">

        <div class="flex justify-between items-center">
            <div class="text-xs font-semibold text-slate-400 uppercase mb-3">All Member</div>
            <InviteMemberModal text="Invite Member">
                <button class="btn bg-white hover:bg-indigo-900 text-white bg-indigo-500 btn-full w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="20"
                         height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                        <line x1="9" y1="12" x2="15" y2="12"></line>
                        <line x1="12" y1="9" x2="12" y2="15"></line>
                    </svg>
                    <span class="ml-2">Add New Member</span>
                </button>
            </InviteMemberModal>

        </div>


        <div class="col-span-full bg-white shadow-lg rounded-sm border border-slate-200">
            <header class="px-5 py-4 border-b border-slate-100">
                <h2 class="font-semibold text-slate-800">Market Trends</h2>
            </header>
            <div class="p-3">

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <!-- Table header -->
                        <thead class="text-xs uppercase text-slate-400 bg-slate-50 rounded-sm">
                        <tr>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Avatar</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Name</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Email</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Location</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Post</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Status</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Action</div>
                            </th>
                        </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody class="text-sm font-medium divide-y divide-slate-100">
                        <!-- Row -->
                        <tr v-for="customer in customers">
                            <td class="p-2 whitespace-nowrap ">
                                <div class="flex items-center">
                                    <img :src="customer.avatar_url" v-if="customer.avatar_url"  alt="avatar_url" class="w-10">
                                </div>
                            </td>

                            <td class="p-2 whitespace-nowrap">
                                <div class="font-normal text-left">{{ customer.name }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="font-normal text-left">{{ customer.email }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="font-normal text-left">{{ customer.Location }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="font-normal text-left">{{ customer.post_count }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="font-normal text-left">{{ customer.status }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="font-normal text-left" v-if="customer.status!=='pending'">
                                    <a-popconfirm
                                        title="Sure to delete?"
                                        @confirm="deleteMember(customer.email)">
                                        <a>Delete</a>
                                    </a-popconfirm>
                                </div>
                                <div class="font-normal text-left" v-else>
                                    <a-popconfirm
                                        title="Sure to delete?"
                                        @confirm="removeInvite(customer.email)">
                                        <a>Cancel Invite</a>
                                    </a-popconfirm>
                                </div>


                            </td>

                        </tr>
                        <!-- Row -->

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <!--        <a-table :columns="columns" :data-source="customers">-->
        <!--            <template #bodyCell="{ column, text ,id }">-->

        <!--                <template v-if="column.dataIndex === 'name'">-->
        <!--                    <a>{{ text }}</a>-->
        <!--                </template>-->
        <!--                <template v-if="column.dataIndex === 'avatar_url'">-->
        <!--                    <img :src="text" v-if="text" alt="avatar_url" class="w-10">-->
        <!--                </template>-->
        <!--                <template v-else-if="column.dataIndex === 'edit'">-->
        <!--                    <a-popconfirm-->
        <!--                        title="Sure to delete?"-->
        <!--                        @confirm="deleteMember(id)">-->
        <!--                        <a>Delete</a>-->
        <!--                    </a-popconfirm>-->
        <!--                </template>-->


        <!--            </template>-->
        <!--        </a-table>-->

    </div>
</template>

<script>

import Image01 from '../../images/user-40-01.jpg'
import Image02 from '../../images/user-40-02.jpg'
import Image03 from '../../images/user-40-03.jpg'
import Image04 from '../../images/user-40-04.jpg'
import Image05 from '../../images/user-40-05.jpg'
import Image06 from '../../images/user-40-06.jpg'
import Image07 from '../../images/user-40-07.jpg'
import Image08 from '../../images/user-40-08.jpg'
import Image09 from '../../images/user-40-09.jpg'
import Image10 from '../../images/user-40-10.jpg'
import InviteMemberModal from "../../components/modal/InviteMemberModal";

export default {
    name: 'CommunityMember',
    components: {InviteMemberModal},
    data() {
        return {

            columns: [
                {
                    title: 'Avatar',
                    dataIndex: 'avatar_url',
                    key: 'avatar_url',
                },
                {
                    title: 'Name',
                    dataIndex: 'name',
                    key: 'name',
                },
                {
                    title: 'Email',
                    dataIndex: 'email',
                    key: 'email',
                    ellipsis: true,
                },
                {
                    title: 'Location',
                    dataIndex: 'Location',
                    key: 'location',
                    ellipsis: true,
                },
                {
                    title: 'Post',
                    dataIndex: 'post_count',
                    key: 'post',
                    ellipsis: true,
                },
                {
                    title: 'Status',
                    dataIndex: 'status',
                    key: 'status',
                    ellipsis: true,
                },
                {
                    title: 'Edit',
                    dataIndex: 'edit',
                    key: 'edit',
                    width: 80,
                },

            ],
        }
    },
    created() {
        this.$store.dispatch('member/get_member', this.community.id)

    },
    computed: {
        customers() {
            return this.$store.state.member.members
        },
        community(){
            return this.$store.state.community.active_community;
        }
    },
    methods: {
        deleteMember(email) {
            this.$store.dispatch('member/remove_member', {'email':email,'community_id':this.community.id})
            this.$store.dispatch('member/get_member', this.community.id)
        },
        removeInvite(email) {
            this.$store.dispatch('member/removeInvite', {'email':email,'community_id':this.community.id})
            this.$store.dispatch('member/get_member', this.community.id)
        }
    }
};
</script>

<style scoped>
.ant-table-cell {
    padding: 4px !important;
}

.ant-table-tbody > tr > td {
    padding: 2px !important;

}
</style>
