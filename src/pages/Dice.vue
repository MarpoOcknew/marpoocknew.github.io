<template>
    <Layout>
        <div class="container mx-auto py-4 sm:py-20 w-full">
            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-8">
                <dice-card v-for="dice in $page.dices.edges" :key="dice.id" :dice="dice" />
            </div>

            <pagination-posts v-if="$page.dices.pageInfo.totalPages > 1" base="/dice" :totalPages="$page.dices.pageInfo.totalPages" :currentPage="$page.dices.pageInfo.currentPage" />
        </div>
    </Layout>
</template>

<page-query>
query Dices ($page: Int) {
    dices: allDice (sortBy: "order", order: DESC, perPage: 20, page: $page) @paginate {
        totalCount
        pageInfo {
            totalPages
            currentPage
        }
        edges {
            node {
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
</page-query>

<script>
import PaginationPosts from '../components/PaginationPosts'
import DiceCard from '../components/DiceCard'

export default {
    metaInfo: {
        title: 'Dice'
    },
    components: {
        PaginationPosts,
        DiceCard
    }
};
</script>