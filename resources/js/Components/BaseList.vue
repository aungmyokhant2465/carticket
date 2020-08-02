<template>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0 d-inline-block w-75">
                <router-link :to="{name: 'detail.percale', params: {percale_id: percale.id}}" class="btn btn-link btn-block text-left collapsed" type="button">
                    {{percale.receiver_name}}
                </router-link>
            </h2>
            <a class="float-right">
                <span v-if="percale.received" class="text-success">Received</span>
                <span v-else-if="percale.to_received" class="text-secondary">Branch received</span>
                <span v-else class="text-warning">Delivering</span>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BaseList",
        props: {
            percale: {
                require: true
            }
        },
        mounted() {
            console.log(this.percale)
        }
    }
</script>

<style scoped>

</style>