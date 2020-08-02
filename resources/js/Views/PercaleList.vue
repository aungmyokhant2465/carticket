<template>
    <div>
        <div v-for="(percale, index) in percales" :id="index">
            <base-list :percale="percale"></base-list>
        </div>
    </div>
</template>

<script>
    import BaseList from '../Components/BaseList';

    export default {
        name: "PercaleList",
        components: {
            BaseList
        },
        props: {
            percales: {
                type: Array,
            }
        }
    }
</script>

<style scoped>

</style>