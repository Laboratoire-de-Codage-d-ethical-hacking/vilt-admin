<template>
    <!-- Desktop sidebar -->
<aside
        class="fixed inset-y-0 left-0 rtl:left-auto rtl:right-0 z-20 flex flex-col h-screen overflow-hidden shadow-2xl transition-transform bg-white filament-sidebar lg:border-r w-80 lg:z-0 lg:translate-x-0 dark:bg-gray-800 dark:border-gray-700 -translate-x-full rtl:lg:-translate-x-0 rtl:translate-x-full"
>
    <div class=" text-gray-500 dark:text-gray-400">
        <header class="border-b h-[4.4rem] shrink-0 px-6 flex items-center filament-sidebar-header dark:border-gray-700">
                <Link :href="route('dashboard')">
                    <div class="text-xl font-bold tracking-tight filament-brand text-black dark:text-white">
                        {{ $page.props.appName }}
                    </div>
                </Link>
        </header>
        <ul class="mt-2" v-for="(item, key) in $page.props.menu" :key="key">
            <button @click.prevent="$store.sidebar.toggleCollapsedGroup(label)"
                class="px-4 py-4 flex items-center justify-between w-full">
                <p class="font-bold uppercase text-gray-600 text-xs tracking-wider dark:text-gray-300">
                    {{ item.name }}
                </p>
                <!-- <i class='bx bx-chevron-down' ></i> -->
            </button>
            <li v-for="(menu, index) in item.menu" :key="index" class="relative px-4 py-2">

                    <span v-show="route().current(menu.route)" class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                                <Link
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                :href="route(menu.route)" :active="route().current(menu.route)">
                                    <i :class="'bx '+menu.icon+' bx-xs'"></i>
                                    <span class="ml-2">{{ menu.title }}</span>
                                </Link>
            </li>
            <div class="mt-6 border-b dark:border-gray-700" v-if="key !== $page.props.menu.length - 1"></div>
            </ul>
    </div>
</aside>

</template>

<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import { HomeIcon, UserIcon } from "@heroicons/vue/outline"


export default defineComponent({
    components: {
        Link,
        HomeIcon,
        UserIcon
    },
    props: ["href", "active"],
    data(){
        return {
            isPagesMenuOpen: false
        }
    },
    methods: {
        togglePagesMenu(){
            if(this.isPagesMenuOpen){
                this.isPagesMenuOpen = false;
            }
            else {
                this.isPagesMenuOpen = true;
            }
        }
    }
});
</script>
