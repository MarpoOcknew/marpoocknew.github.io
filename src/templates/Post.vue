<template>
    <Layout>
        <div class="container-inner mx-auto my-16">
            <h1 class="text-4xl font-bold leading-tight mb-4">{{ $page.post.title }}</h1>

            <div class="flex mb-8 text-sm">
                <g-link :to="tag.path" v-for="tag in $page.post.tags" :key="tag.id" class="bg-gray-300 rounded-full px-4 py-2 mr-4 hover:bg-blue-300">
                    {{ tag.title }}
                </g-link>
            </div>

            <div class="markdown-body mb-8" v-html="$page.post.content" />
            
            <div class="mb-8">
                <g-link to="/portfolio" class="bg-blue-700 font-bold hover:bg-blue-700 px-4 py-2 rounded text-white uppercase">Back to Portfolio</g-link>
            </div>
        </div>
    </Layout>
</template>

<page-query>
query Post ($path: String!) {
    post: post (path: $path) {
        title
        order
        content
        tags {
            title
            path
        }
        image
    }
}
</page-query>

<script>
export default {
    metaInfo() {
        return {
            title: this.$page.post.title
        }
    }
};
</script>

<style src="../css/github-markdown.css" />