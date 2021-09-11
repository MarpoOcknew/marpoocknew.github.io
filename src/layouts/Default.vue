<template>
    <div class="content-wrapper bg-background-primary font-sans text-copy-primary leading-normal flex flex-col min-h-screen" :class="theme">
        <header class="top-0 left-0 z-40 fixed w-full border-t-14 border-blue-700">
            <nav class="container mx-auto flex flex-wrap justify-between items-center py-8">
                <div>
                    <g-link to="/" @click.native="scrollToTop" class="logo flex items-center">
                        <g-image src="../../static/logo.png" class="w-20" alt="logo" />
                        <span class="ml-8 text-2xl text-white">Martin Pollock</span>
                    </g-link>
                </div>

                <div class="block lg:hidden">
                    <button @click="toggle" class="flex items-center px-3 py-2 border rounded border-gray-500 hover:text-gray-600 hover:border-gray-600" data-cypress="hamburger">
                        <svg class="current-color h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" fill="gray" />
                        </svg>
                    </button>
                </div>

                <ul class="uppercase tracking-wide font-bold w-full block flex-grow lg:space-x-8 space-y-6 lg:space-y-0 lg:flex lg:flex-initial lg:w-auto items-center mt-8 lg:mt-0" :class="isOpen ? 'block': 'hidden'" data-cypress="menu">
                    <li class="mb-6 lg:mb-0">
                        <search-input />
                    </li>
                    <li>
                        <theme-switcher :theme="theme" @themeChanged="updateTheme" />
                    </li>
                    <li>
                        <a v-if="$route.path === '/'" href="/#skills" v-scroll-to="{ el: '#skills', offset: -25 }" class="text-copy-primary hover:text-gray-600" data-cypress="projects">Skills</a>
                        <g-link v-else to="/#skills" class="text-copy-primary hover:text-gray-600">Skills</g-link>
                    </li>
                    <li>
                        <a v-if="$route.path === '/'" href="/#about" v-scroll-to="{ el: '#about', offset: -90 }" class="text-copy-primary hover:text-gray-600" data-cypress="about">About</a>
                        <g-link v-else to="/#about" class="text-copy-primary hover:text-gray-600">About</g-link>
                    </li>
                    <li>
                        <a v-if="$route.path === '/'" href="/#contact" v-scroll-to="{ el: '#contact', offset: -25 }" class="text-copy-primary hover:text-gray-600" data-cypress="contact">Contact</a>
                        <g-link v-else to="/#contact" class="text-copy-primary hover:text-gray-600">Contact</g-link>
                    </li>
                    <li>
                        <g-link to="/portfolio" class="text-copy-primary hover:text-gray-600" data-cypress="portfolio">Portfolio</g-link>
                    </li>
                </ul>
            </nav>
        </header>

        <main class="flex flex-col flex-grow overflow-hidden pt-40">
            <slot />
        </main>

        <footer class="bg-blue-900 text-white">
            <div class="container mx-auto flex flex-col lg:flex-row items-center justify-between py-8">
                <div class="mb-8 lg:mb-0">
                    <div>Copyright {{ new Date().getFullYear() }}. All rights reserved.</div>
                </div>

                <div class="mb-8 lg:mb-0">
                    <div>Based on the <a href="https://github.com/drehimself/gridsome-portfolio-starter" class="text-white hover:text-gray-400 font-normal" target="_blank">Gridsome Portfolio Starter</a></div>
                </div>
            </div>
        </footer>

        <div style="display:none">
            <svg id="dots-triangle" width="170" height="170" xmlns="http://www.w3.org/2000/svg">
                <path d="M168.152 170a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm-18.478-18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0 18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm-18.478 0a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0-18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0-18.479a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm-18.479 0a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm0 18.479a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0 18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0-55.435a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zM94.24 133.043a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm0 18.479a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0 18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0-55.435a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm0-18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm-18.478 36.956a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm0 18.479a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0 18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0-55.435a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm0-18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0-18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm-18.478 55.434a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm0 18.479a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0 18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0-55.435a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm0-18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0-18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0-18.479a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm-18.479 73.913a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm0 18.479a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0 18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0-55.435a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm0-18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0-18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0-18.479a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm0-18.478a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm-18.478 92.391a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm0 18.479a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0 18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0-55.435a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm0-18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0-18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0-18.479a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm0-18.478a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm0-18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zM1.848 133.044a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.695zm0 18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0 18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0-55.435a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm0-18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0-18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0-18.479a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm0-18.478a1.848 1.848 0 1 1 0-3.695 1.848 1.848 0 0 1 0 3.695zm0-18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696zm0-18.478a1.848 1.848 0 1 1 0-3.696 1.848 1.848 0 0 1 0 3.696z" fill="#2C8056" fill-rule="evenodd" opacity=".503" />
            </svg>
        </div>
    </div>
</template>

<static-query>
query {
    metadata {
        siteName
    }
}
</static-query>

<script>
import SearchInput from '../components/SearchInput'
import ThemeSwitcher from '../components/ThemeSwitcher'

export default {
    components: {
        SearchInput,
        ThemeSwitcher
    },
    mounted() {
        this.theme = localStorage.getItem('theme') || 'theme-dark'
    },
    data() {
        return {
            isOpen: false,
            theme: '',
        }
    },
    methods: {
        scrollToTop() {
            window.scrollTo(0, 0);
        },
        toggle() {
            this.isOpen = !this.isOpen
        },
        updateTheme(theme) {
            this.theme = theme
        }
    }
};
</script>

<style src="../css/main.css" />