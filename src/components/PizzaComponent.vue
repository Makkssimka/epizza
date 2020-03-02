<template>
    <div class="product-item">
        {{ pizza.title }}
    </div>
</template>

<script>
export default {
    props: {
        pizza: Object
    }
}
</script>