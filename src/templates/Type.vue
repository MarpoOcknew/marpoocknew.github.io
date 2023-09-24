<template>
    <Layout>
        <div class="container mx-auto py-4 sm:py-20 w-full">
            <h2 class="text-4xl font-bold mb-8">Dice Type: #{{ $page.type.title }}</h2>

            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-8">
                <dice-card v-for="dice in $page.type.belongsTo.edges" :key="dice.id" :dice="dice" />
            </div>

            <pagination-posts v-if="$page.type.belongsTo.pageInfo.totalPages > 1" :base="`/type/${$page.type.title}`" :totalPages="$page.type.belongsTo.pageInfo.totalPages" :currentPage="$page.type.belongsTo.pageInfo.currentPage" />
        </div>
    </Layout>
</template>

<page-query>
query Type ($id: ID!, $page: Int) {
    type: type (id: $id) {
        title
        belongsTo (page: $page, perPage: 20) @paginate {
            totalCount
            pageInfo {
                totalPages
                currentPage
            }
            edges {
                node {
                    ...on Dice {
                        id
                        title
                        order
                        summary
                        path
                        types {
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
import DiceCard from '../components/DiceCard'

export default {
    metaInfo() {
        return {
            title: 'Dice Type: ' + this.$page.type.title
        }
    },
    components: {
        PaginationPosts,
        DiceCard
    }
};
</script>