<template>
    <footer class="footer-wrapper">
        <div class="social-line">
            <div class="container">
                <div class="text-social">
                    <img src="/images/megaphone-icon.svg"> Понравилась пицца! Расскажите о нас в социальных сетях
                </div>
                <ul class="list-social">
                    <li>
                        <a href="#" target="_blank">
                            <img src="/images/instagram.svg">
                        </a>
                    </li>
                    <li>
                        <a :href="vkShare" target="_blank">
                            <img src="/images/vkontakte.svg">
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <img src="/images/ok.svg">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer-menu">
            <div class="container">
                <div class="footer-list-menu">
                    <ul>
                        <li class="head-footer-menu">Наше меню</li>
                        <li><a href="#pizza" @click.prevent="scrollAnkhor">Пицца</a></li>
                        <li><a href="#souse" @click.prevent="scrollAnkhor">Соусы</a></li>
                        <li><a href="#zakuski" @click.prevent="scrollAnkhor">Закуски</a></li>
                        <li><a href="#sault" @click.prevent="scrollAnkhor">Салаты</a></li>
                        <li><a href="#drink" @click.prevent="scrollAnkhor">Напитки</a></li>
                    </ul>
                    <ul>
                        <li class="head-footer-menu">О нас</li>
                        <li><a href="#">Контакты</a></li>
                        <li><a href="#">Политика конфиденциальности</a></li>
                    </ul>
                </div>
                <div class="footer-list-number">
                    <a href="tel:880045657890">8 800 4565-78-90</a>
                    <p>Звонок бесплатный</p>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
import scrollTo from "scroll-to-element";

export default {
    methods: {
        scrollAnkhor: function(e){
            let idElem = e.target.hash;
            let elem = document.querySelector(idElem);
            scrollTo(elem, {
                offset: -70,
                ease: 'out-expo'
            });
        }
    },
    computed: {
        vkShare: function(){
            return `https://vk.com/share.php?url=https://epizza.su&title=Пицерия Ёpizza`;
        }
    }
}
</script>