<template>
    <div>
        <v-parallax dark src="https://i.pinimg.com/originals/3b/8a/d2/3b8ad2c7b1be2caf24321c852103598a.jpg" height="800" class="pa-5">
            <HelloWorld/>
        </v-parallax>

        <div class="home">
            <HelloWorld/>
        </div>
    </div>
</template>

<script>
import HelloWorld from "@/components/HelloWorld.vue";

export default {
    name: "Home",
    components: {
        HelloWorld,
    },
};
</script>
