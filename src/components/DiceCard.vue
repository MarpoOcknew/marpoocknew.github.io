<template>
    <div class="bg-blue-800 overflow-hidden shadow-lg rounded-lg h-auto cursor-pointer transition duration-500 ease-in-out transform hover:scale-105 hover:translate-y-5 hover:shadow-2xl">
        <g-link :to="dice.node.path" class="flex flex-col w-full h-full">
            <g-image alt="blog photo" :src="dice.node.image" class="h-40 w-full object-cover" />
            <div class="flex flex-col w-full h-full p-4">
                <p class="text-white text-xl font-medium mb-2">
                    {{ dice.node.title }}
                </p>
                <p class="font-light mb-4 text-gray-300 text-md">
                    {{ dice.node.summary }}
                </p>
                <div class="flex flex-wrap justify-starts items-center mt-auto border-t-2 pt-5">
                    <g-link :to="type.path" v-for="type in dice.node.types" :key="type.id" class="text-xs mr-2 mb-2 py-1.5 px-4 text-gray-600 bg-blue-200 rounded-2xl hover:bg-blue-300">
                        {{ type.title }}
                    </g-link>
                </div>
            </div>
        </g-link>
    </div>
</template>

<script>
export default {
    props: ['dice'],
};
</script>