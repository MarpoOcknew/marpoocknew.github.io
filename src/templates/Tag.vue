<template>
    <Layout>
        <div class="container mx-auto py-20 w-full">
            <h2 class="text-4xl font-bold mb-8">Portfolio Items Tagged: #{{ $page.tag.title }}</h2>

            <div class="grid grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-8">
                <portfolio-card v-for="post in $page.tag.belongsTo.edges" :key="post.id" :post="post" />
            </div>

            <pagination-posts v-if="$page.tag.belongsTo.pageInfo.totalPages > 1" :base="`/tag/${$page.tag.title}`" :totalPages="$page.tag.belongsTo.pageInfo.totalPages" :currentPage="$page.tag.belongsTo.pageInfo.currentPage" />
        </div>
    </Layout>
</template>

<page-query>
query Tag ($id: ID!, $page: Int) {
    tag: tag (id: $id) {
        title
        belongsTo (page: $page, perPage: 8) @paginate {
            totalCount
            pageInfo {
                totalPages
                currentPage
            }
            edges {
                node {
                    ...on Post {
                        id
                        title
                        order
                        summary
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
    }
}
</page-query>

<script>
import PaginationPosts from '../components/PaginationPosts'
import PortfolioCard from '../components/PortfolioCard'

export default {
    metaInfo() {
        return {
            title: 'Portfolio Items Tagged: ' + this.$page.tag.title
        }
    },
    components: {
        PaginationPosts,
        PortfolioCard
    }
};
</script>