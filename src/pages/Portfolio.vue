<template>
    <Layout>
        <div class="container mx-auto py-20 w-full">
            <div class="grid grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-8">
                <portfolio-card v-for="post in $page.posts.edges" :key="post.id" :post="post" />
            </div>

            <pagination-posts v-if="$page.posts.pageInfo.totalPages > 1" base="/portfolio" :totalPages="$page.posts.pageInfo.totalPages" :currentPage="$page.posts.pageInfo.currentPage" />
        </div>
    </Layout>
</template>

<page-query>
query Posts ($page: Int) {
    posts: allPost (sortBy: "date", order: DESC, perPage: 8, page: $page) @paginate {
        totalCount
        pageInfo {
            totalPages
            currentPage
        }
        edges {
            node {
                id
                title
                date (format: "MMMM D, Y")
                summary
                timeToRead
                path
                tags {
                    title
                    path
                }
                image
            }
        }
    }
}
</page-query>

<script>
import PaginationPosts from '../components/PaginationPosts'
import PortfolioCard from '../components/PortfolioCard'

export default {
    metaInfo: {
        title: 'Portfolio'
    },
    components: {
        PaginationPosts,
        PortfolioCard
    }
};
</script>