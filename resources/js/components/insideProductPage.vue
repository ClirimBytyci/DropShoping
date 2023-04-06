<template>
    <div>
        <p>Product Number: {{productNumber}}</p><br>
        <p>Product title; {{name}}</p><br>
        <p>Product ID:{{ id }}</p><br>
        <button type="submit" @click="checkOut(id)">
            Sent Id
        </button>
    </div>
</template>

<script>
export default {
    props: [
        'id',
        'productNumber',
        'name'
    ],

    methods: {
        checkOut(id){
            axios.post('/test',{
                id : this.id
            })
        }
    }

}
</script>
