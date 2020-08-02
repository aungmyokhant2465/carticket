<template>
    <div class="card">
        <div class="card-body">
<!--            <table class="table table-borderless">-->
<!--                <tr>-->
<!--                    <td>From :</td>-->
<!--                    <td>{{percale.from}}</td>-->
<!--                    <td>To :</td>-->
<!--                    <td>{{percale.id}}</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>Transmitter's name :</td>-->
<!--                    <td>{{percale.transmitter_name}}</td>-->
<!--                    <td>Receiver's name :</td>-->
<!--                    <td>{{percale.receiver_name}}</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>Transmitter's phone :</td>-->
<!--                    <td><em>{{percale.transmitter_phone}}</em></td>-->
<!--                    <td>Receiver's phone :</td>-->
<!--                    <td><em>{{percale.receiver_phone}}</em></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>Member received Date :</td>-->
<!--                    <td><time>{{percale.to_received_date}}</time></td>-->
<!--                    <td>Received Date :</td>-->
<!--                    <td><time>{{percale.received_date}}</time></td>-->
<!--                </tr>-->
<!--            </table>-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "DetailPercale",
        props: {
            percale_id: {
                type: Number,
                require: true
            }
        },
        mounted() {
            console.log(this.percale_id)
        }
    }
</script>

<style scoped>

</style>