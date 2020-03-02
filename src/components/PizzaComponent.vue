<template>
    <div class="product-item">
        <a href="#" class="images-product">
            <img :src="pizza.images.preview" alt="">
        </a>
        <div class="desc-product">
            <p class="title-product">{{ pizza.title }}</p>
            <p class="structure-product">{{ pizza.structure.join(', ') }}</p>
        </div>
        <div class="price-product-wrapper">
            <div class="price-broduct">от {{ pizza.price.s }} &#8381;</div>
            <a href="#" class="btn btn-product">Выбрать</a>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        pizza: Object
    }
}
</script>