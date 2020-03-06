<template>
    <div class="pizza-select-wrapper">
        <div class="pizza-select">
            <div class="pizza-size-image">
                <div class="small-radius radius"></div>
                <div class="middle-radius radius"></div>
                <div class="large-radius radius"></div>
                <img class="pizza-radius" src="/images/pizza/piper-bold.jpeg"/>
            </div>
            <div class="pizza-size-button">
                <div class="pizza-size-chekbox">
                    <input type="radio" name="size" id="s" value="s" v-model="size">
                    <label for="s">Маленькая</label>
                </div>
                <div class="pizza-size-chekbox">
                    <input type="radio" name="size" id="m" value="m" v-model="size">
                    <label for="m">Средняя</label>
                </div>
                <div class="pizza-size-chekbox">
                    <input type="radio" name="size" id="l" value="l" v-model="size">
                    <label for="l">Большая</label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data: function(){
        return{
            size: 's'
        }
    },
    mounted: function(){
        document.body.style.overflow = 'hidden';
    },
    // computed: {
    //     pizzaSel: function(){
            
    //     }
    // },
    methods: {
    }
}
</script>